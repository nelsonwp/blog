<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
try {
    $nr=$_GET["nr"];
    $update=$_GET["updatetime"];
	$email=$_GET['email'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET AUTOCOMMIT=0");
    $sql="INSERT INTO connect (email,message,updatetime)VALUES('$email','$nr','$update')";
    $res=$conn->query($sql);
        if($res){
            $conn->query("COMMIT");
            $json= json_encode(1);
            echo  $json;
        }else{
            $json= json_encode(0);
            echo  $json;
        }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}