<?php 
class Connection
{
	protected static function connect()
	{
		require "../config/connection.php";
		try
		{
    		return new PDO("mysql:host=$hostname; dbname=$database", "$username", "$password");
		}
		catch(PDOException $e) 
		{
    		echo 'Connection failed: ' . $e->getMessage();
		}
	
	}
}

class Model extends Connection
{
	
	public static function listUsersM()
	{
		static $table = "Roles";
		$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt->close();
	}

	public static function addUsersM($date)
	{
		static $table = "Roles";
		$stmt = Connection::connect()->prepare("INSERT INTO $table (name, group_name, faculty, average_score) VALUES (:name, :group_name, :faculty, :average_score)");    

        $stmt->bindParam(":name", $date->name_a, PDO::PARAM_STR);
        $stmt->bindParam(":group_name", $date->group_name, PDO::PARAM_STR);
		$stmt->bindParam(":faculty", $date->faculty, PDO::PARAM_STR);
		$stmt->bindParam(":average_score", $date->average_score, PDO::PARAM_INT);
       
        if($stmt->execute())
			return true;
			
        $stmt->close();
	}

	public static function editUsersM($date)
	{
		static $table = "Roles";
		$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, group_name = :group_name, faculty = :faculty, average_score = :average_score  WHERE id = :id");

        $stmt->bindParam(":name", $date->name, PDO::PARAM_STR);
        $stmt->bindParam(":group_name", $date->group_name, PDO::PARAM_STR);
		$stmt->bindParam(":faculty", $date->faculty, PDO::PARAM_STR);
		$stmt->bindParam(":average_score", $date->average_score, PDO::PARAM_INT);
        $stmt->bindParam(":id", $date->id, PDO::PARAM_INT);
		

        if($stmt->execute())
			return true;
        $stmt->close();
	}
	public static function deleteUsersM($id)
    {
		static $table = "Roles";
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute())
			return true;
        
        $stmt->close();
    }
}
?>