<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pedagang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'telepon' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'TEXT',
				'null' => true,
			]

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pedagang');
	}

	public function down()
	{
		$this->forge->dropTable('pedagang');
	}
}
