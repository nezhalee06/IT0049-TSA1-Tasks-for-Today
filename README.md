# Tasks for Today — IT0049 TSA1

GitHub: https://github.com/nezhalee06/IT0049-TSA1-Tasks-for-Today

Hosted application: https://it0049-tasks-today.42web.io/

No login is required.

A simple CodeIgniter application with four read-only pages. CodeIgniter 4.7.6, PHP and MySQL/MariaDB. Built on the official CodeIgniter application starter.

Developers: Dela Cruz, John Paul (Designer) & Rodriguez, Robert Enzo (Encoder). BSIT – AGD, Section AX 31. Professor: Merlin Marfa.

## Pages

| Route | Page | Data |
| --- | --- | --- |
| `/` | Welcome / Today's Tasks | Only tasks whose task_date equals today's Philippine date |
| `/tasks` | Task List | All tasks, ordered by task_date then id, ascending |
| `/profile` | Profile | The single demo user |
| `/about` | About | Static developer and course information |

Nine sample tasks span yesterday, today and tomorrow. There is exactly one demo user, Enzo_Rodriguez. Set `demo.email` in your private `.env` before running the seeder to personalize the email. The SQL import uses a non-personal example address; deployed profile data may be personalized separately. This assessment does not require login, CRUD forms or file uploads, so the app stays focused on the four requested pages.

## Run the included local copy

Double-click `START-LOCAL.cmd` and open http://localhost:8086/ . Keep the console open. No username or password is needed. The local preview uses `writable/tasks.sqlite`; the hosted application uses MySQL.

The source-only ZIP/repository excludes installed dependencies and `.env`. For a fresh copy, run `composer install --no-dev`, create `.env` as described below and enable SQLite3 if using the local preview. The launcher expects PHP at `C:\xampp\php\php.exe` or on PATH. It runs the migration and seeder before starting the local PHP server.

Example local `.env`:

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8086/'
app.indexPage = ''
database.default.DBDriver = SQLite3
database.default.database = tasks.sqlite
```

## MySQL setup / hosting

1. Use PHP 8.2+ with intl, mbstring, mysqli/mysqlnd and fileinfo. Create an empty, dedicated MySQL/MariaDB database.
2. Run `composer install --no-dev --optimize-autoloader`.
3. Copy `.env.example` to `.env`. Set your public base URL, including its trailing slash, and actual database credentials. Never commit `.env`.
4. Run `php spark migrate --all`, followed by `php spark db:seed TaskSeeder`.
5. Point the web-server document root at `public/` and give the PHP account write access to `writable/`. The included root `.htaccess` also supports Apache shared hosting with a fixed project-root document root by forwarding requests to public and blocking private directories.
6. Open each of the four pages and check the records.

Alternative without shell access: import `it0049_tsa1.sql` into the empty dedicated database instead of running migrations/seeding. Do not run the migration/seeder again on the SQL-imported schema, because the SQL alternative does not include framework migration tracking.

The seeder/import calculates sample dates when it runs. Stored task dates remain fixed afterward. On later dates the Welcome page may correctly show an empty state, while `/tasks` continues to show all records. The system always filters against the actual current Asia/Manila date. For a fresh demonstration on a later date, initialize a new empty demo database using the seeder/import.

## MVC structure

- `TaskModel` provides the today filter and date-ordered full query.
- `UserModel` retrieves the demo profile from the users table.
- `Tasks` and `Pages` controllers pass data to the four views.
- `layout.php` shares navigation and page structure.
- `public/tasks.css` contains the small responsive stylesheet.
- Database migration and `TaskSeeder` reproduce the schema and sample data.
- Dynamic text is escaped before display; auto-routing is disabled.

## Checks

Run `python tests/smoke.py` against the running LOCAL SQLite preview. It checks the record counts/dates, today-only filtering, complete date order, profile, credits, empty-today state and HTML escaping. It temporarily changes generated sample task data and restores it, so use it only on the included disposable local preview.

## Submission

Submit the GitHub repository link and the hosted working website link in the IT0049 TSA1 assignment page. All four pages are public; no demo login is needed. The submission guide supplied beside the project lists final links when deployment is complete.

Framework reference: https://codeigniter4.github.io/userguide/
