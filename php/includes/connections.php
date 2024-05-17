<?php

function connect() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "universe_one";

  $db = mysqli_connect($servername, $username, $password, $database);
  return $db;
}

?>