<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'category_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'image' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'article' => [
				'type'           => 'TEXT',
				'null' 		     => true,
			],
			'user_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'status' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'is_delete' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null' 		     => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'		     => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('articles');
	}

	public function down()
	{
		$this->forge->dropTable('articles');
	}
}
