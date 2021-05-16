<?php
	
	$method = $_SERVER["REQUEST_METHOD"];

	switch($method)
	{
		case 'GET':
			
			require_once "controller.php";

			$r = (new Сontroller)->listUsers();
			echo json_encode($r);

		break;

	}
?>