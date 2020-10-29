<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$tables = $db->listTables();

		$data = [
			'title' => 'RestfulAPI News Portal',
			'subtitle' => "# This API is to make it easier to create a News Portal project.",
			'tables' => $tables,
		];

		return view('index', $data);
	}

	//--------------------------------------------------------------------
}
