<?php 
  if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_clients";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM clients WHERE Id = $id";
    $conn -> query($sql);
  }

  header("location: /PHPs/demoPostMysql2/index.php");
  exit;
?>