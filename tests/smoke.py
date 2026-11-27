"""Local smoke test. Run after seeding, against the generated local SQLite DB."""
from pathlib import Path
import sqlite3,urllib.request,re,datetime
root=Path(__file__).resolve().parents[1]
db=sqlite3.connect(root/'writable/tasks.sqlite')
base='http://localhost:8086'
today=datetime.datetime.now(datetime.timezone(datetime.timedelta(hours=8))).date().isoformat()
def page(path):
 with urllib.request.urlopen(base+path) as response:
  assert response.status==200
  return response.read().decode()
rows=db.execute('SELECT id,title,status,task_date FROM tasks ORDER BY task_date,id').fetchall()
assert len(rows)>=8
assert len({x[3] for x in rows})>=3
assert db.execute('SELECT COUNT(*) FROM users').fetchone()[0]==1
html=page('/')
for _,title,_,day in rows:
 import html as escape
 assert (escape.escape(title,quote=True).replace('&#x27;','&#039;') in html)==(day==today),title
all_html=page('/tasks')
dates=re.findall(r'<td class="date">(.*?)</td>',all_html)
assert len(dates)==len(rows)
assert [datetime.datetime.strptime(d,'%b %d, %Y').date() for d in dates]==sorted(datetime.datetime.strptime(d,'%b %d, %Y').date() for d in dates)
assert 'Alex Santos' in page('/profile')
about=page('/about')
assert all(s in about for s in ['Dela Cruz, John Paul','Rodriguez, Robert Enzo','Merlin Marfa','AX 31'])
# Exercise the no-tasks-today branch and restore original sample dates.
try:
 db.execute('UPDATE tasks SET task_date=? WHERE task_date=?',('2099-01-01',today));db.commit()
 assert 'No tasks scheduled for today.' in page('/')
 assert len(re.findall(r'<td class="date">',page('/tasks')))==len(rows)
finally:
 for id,_,_,day in rows: db.execute('UPDATE tasks SET task_date=? WHERE id=?',(day,id))
 db.commit()
id,title,_,_=next(x for x in rows if x[3]==today)
try:
 db.execute('UPDATE tasks SET title=? WHERE id=?',('<script>alert(1)</script>',id));db.commit()
 output=page('/')
 assert '&lt;script&gt;alert(1)&lt;/script&gt;' in output
 assert '<script>alert(1)</script>' not in output
finally:
 db.execute('UPDATE tasks SET title=? WHERE id=?',(title,id));db.commit();db.close()
print('PASS: schema records, today filter, complete ordered list, profile, credits, empty state and output escaping.')
