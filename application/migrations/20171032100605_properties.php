<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Properties extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => FALSE,
                                'unsigned' => true
                        ),
                        'title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => false,
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                        ),
                        'slug' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => FALSE,
                        ),
                        'price' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                        'price_text' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
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
                $this->dbforge->create_table('properties');
                $this->db->query(add_foreign_key('properties', 'user_id', 'users(id)', 'CASCADE', 'CASCADE'));
        }

        public function down()
        {
                $this->dbforge->drop_table('properties');
        }
}