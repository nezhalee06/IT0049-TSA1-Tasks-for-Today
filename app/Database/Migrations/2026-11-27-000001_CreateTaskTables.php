<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateTaskTables extends Migration
{
    public function up()
    {
        $id = ['type'=>'INT','unsigned'=>true,'auto_increment'=>true];
        $this->forge->addField([
            'id'=>$id,
            'title'=>['type'=>'VARCHAR','constraint'=>150],
            'status'=>['type'=>'VARCHAR','constraint'=>20,'default'=>'pending'],
            'task_date'=>['type'=>'DATE'],
            'created_at'=>['type'=>'DATETIME'],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('tasks',true);
        $this->forge->addField([
            'id'=>$id,
            'username'=>['type'=>'VARCHAR','constraint'=>50],
            'full_name'=>['type'=>'VARCHAR','constraint'=>100],
            'email'=>['type'=>'VARCHAR','constraint'=>100],
            'created_at'=>['type'=>'DATETIME'],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('users',true);
    }
    public function down()
    {
        $this->forge->dropTable('tasks',true);
        $this->forge->dropTable('users',true);
    }
}
