<?php
$dbname="keewallet";
$servername="localhost";
$username="root";
$password="";

$con = new mysqli($servername, $username, $password, $dbname);

if($con->connect_error){
  die("Connection Failed". $con->connect_error);
}
$sql= "SELECT title, description from bankinfo";
$result=$con->query($sql);
$resultstr= "[";
if($result->num_rows>0){
  while($row = $result->fetch_assoc()){

    // echo json_encode($row);

$resultstr.='{"title":"'.$row["title"].'","description":"'.$row["description"].'"},';
  }
  $resultstr=substr($resultstr,0,strlen($resultstr)-1)."]";
  echo $resultstr;
}
$con->close();

?>
