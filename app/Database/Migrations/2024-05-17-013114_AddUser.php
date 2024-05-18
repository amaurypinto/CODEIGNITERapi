<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'BIGINT',
                'constraint'=>225,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'email'=>[
                'type'=>'VARCHAR',
                'unique'=>true,
                'constraint'=>225,
            ],
            'password'=>[
                'type'=>'VARCHAR',
                'constraint'=>225,
            ],
            'create_at'=>[
                'type'=>'TIMESTAMP',
                'null'=>true
            ],
            'updated_at'=>[
                'type'=>'TIMESTAMP',
                'null'=>true
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');

    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
