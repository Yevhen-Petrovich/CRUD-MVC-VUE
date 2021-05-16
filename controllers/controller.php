<?php
$method = $_SERVER["REQUEST_METHOD"];
$date = json_decode(file_get_contents("php://input"));

switch($method)
{
	case 'GET':
		$r = Сontroller::listUsers();
	break;

	case 'POST':
		if(!empty($date->id_drills))
			Сontroller::deleteUsers($date->id_drills);
		
		if(!empty($date->name_a))
			Сontroller::addUsers($date);
	
		if(!empty($date->id))
			Сontroller::editUsers($date);
	break;
}

class Сontroller
{
	public static function listUsers()
	{
		require_once "../models/model.php";
		$r = Model::listUsersM();
		echo json_encode($r);
	}

	public static function deleteUsers($id)
	{
		require_once "../models/model.php";
		$r = Model::deleteUsersM($id);
		echo json_encode($r);
	}

	public static function addUsers($date)
	{
		require_once "../models/model.php";
		$r = Model::addUsersM($date);
		echo json_encode($r);
	}

	public static function editUsers($date)
	{
		require_once "../models/model.php";
		$r = Model::editUsersM($date);
		echo json_encode($r);
	}
}

?>