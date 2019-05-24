<?php
		// enter your own connection details here
        $host = ""; // host
        $user = ""; // username
        $pw = ""; // password
        $db = ""; // database
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if($conn->connect_error) {
          echo $conn->connect_error;
        }
?>