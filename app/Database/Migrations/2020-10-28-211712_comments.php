<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
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
			'article_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'comment' => [
				'type'           => 'TEXT',
				'null' 		     => true,
			],
			'user_id' => [
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
		$this->forge->createTable('comments');
	}

	public function down()
	{
		$this->forge->dropTable('comments');
	}
}
