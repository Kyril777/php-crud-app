<?php

// Connect to database.
class Database
{
  public $con;
  public function __construct(){
    $this->con = mysqli_connect("localhost", "", "", "");

  }
}

$obj = new Database;

?>
