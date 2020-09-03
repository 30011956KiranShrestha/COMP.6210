<?php
include 'connection/connection.php';

try
{
	$id=isset($_GET['id'])? $_GET['id']:die('Error:Record Id not found.');

	//delete query
	$query="delete from scpp where id =:id";
	$statement=$conn->prepare($query);
	$statement->bindParam(":id",$id);
	if($statement->execute())
	{
               //redirect back to index page with deleteget value
          header('Location:index.php?action=deleted');

	}
	else
	{
		die('unable to delete record.');
	}
}
catch(PDOException $exception)
{
	die('Error: '. $exception->getmessage());
}


?>