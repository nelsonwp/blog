<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
try {
	$title=$_GET['title'];
    $nr=$_GET["nr"];
    $update=$_GET["updatetime"];
	$name=$_GET['username'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET AUTOCOMMIT=0");
    $sql="INSERT INTO liuyan (username,message,updatetime,article_title)VALUES('$name','$nr','$update','$title')";
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