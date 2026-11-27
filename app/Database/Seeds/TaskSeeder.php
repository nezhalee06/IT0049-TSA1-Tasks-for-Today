<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class TaskSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        // Relative dates keep a fresh installation's Welcome page populated.
        if ($this->db->table('tasks')->countAllResults() === 0) {
            foreach ([
                ['Review the activity requirements','completed','-1 day'],
                ['Prepare the database design','completed','-1 day'],
                ['Create the project layout','completed','-1 day'],
                ['Check today\'s task schedule','completed','today'],
                ['Finish the Welcome page','pending','today'],
                ['Review the task list with the team','pending','today'],
                ['Update the project documentation','pending','+1 day'],
                ['Test all four application pages','pending','+1 day'],
                ['Prepare the submission links','pending','+1 day'],
            ] as [$title,$status,$day]) {
                $this->db->table('tasks')->insert(['title'=>$title,'status'=>$status,'task_date'=>date('Y-m-d',strtotime($day)),'created_at'=>$now]);
            }
        }
        if ($this->db->table('users')->countAllResults() === 0) {
            $this->db->table('users')->insert(['username'=>'demo_user','full_name'=>'Alex Santos','email'=>'alex.santos@example.com','created_at'=>$now]);
        }
    }
}
