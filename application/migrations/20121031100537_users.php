<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => FALSE
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE,
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => FALSE
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => FALSE,
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => TRUE,
                        ),
                        'remember_token' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => null
                        ),
                        'created' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                                'unsigned' => true,
                                'null' => TRUE,
                                'comment' => 'Unix timestamp'
                        ),
                        'updated' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                                'unsigned' => true,
                                'null' => TRUE,
                                'comment' => 'Unix timestamp'
                        ),
                        'deleted' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                                'unsigned' => true,
                                'default' => null,
                                'comment' => 'Unix timestamp'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}