<?php

  $host = "localhost";
  $db = "a3001195_scp";
  $user = "a3001195_admin";
  $pwd = "toiohomai1234";

  $dsn = "mysql:host=$host; dbname=$db";


  try
  {
        $conn = new PDO($dsn, $user, $pwd);
  }
  catch(PDOException $error)
  {
        echo "<h3>Error</h3>" . $error->getMessage();
  }


?>