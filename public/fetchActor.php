<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "nova_team");
	define("DB_PASS", "sjsuteam3");
	define("DB_NAME", "nova_movie");

  // 1. Create a database connection
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
	if(mysqli_connect_errno()) {
		die("Database connection failed: " . 
			mysqli_connect_error() . 
			" (" . mysqli_connect_errno() . ")"
    );
  }
  
  $id = $_GET['movieId'];
  $query = "select name,gender from actor,cast where actor_id=actor.id and movie_id=" .$id;
  $result = mysqli_query($connection, $query);	
  $arr = array();
  while (($actor = mysqli_fetch_assoc($result)) != null) {
    array_push($arr, $actor);
  };
  echo json_encode($arr);
?>