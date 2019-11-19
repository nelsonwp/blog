<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
<style>
ul li{
	margin:0;
	padding:0;
	list-style:none;
}
.bg{
	background:url("http://localhost/blog_web/image/xdbg.jpg") no-repeat  center;
	 background-size:100% 100%;
	width:80%;
	height:100%;
	margin:auto;
	padding:10px;
	overflow-y:scroll;
}
.libg{
	background-color:rgba(256, 255, 255, 0.5);
	background-size:100% 100%;
	padding:5px;
	margin:10px;
	
}
.libg div{
	padding-left:25px;
	font-weight:bold;
	font-size:24px;
	color:#e801a9;
}
.libg p{
	color:#53356d;
	font-weight:bold;
	text-indent:25px;
}
.libg:hover{
	background-color:rgba(256, 255, 255, 0.8);
	cursor:pointer;
	transform: scale(1.03);
}
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
$date=date("Y-m-d");
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * from grxd order by id DESC";
//where datetime= '$date'
$result = $conn->query($sql);
    ?>
<div class="bg">
	<ul style="padding:0;">
<?php
while($row=$result->fetch()){//操作数据
echo "<li class='libg'><div>".$row['updatetime']."</div><p>".$row['nr']."</p></li>";
}
?>
	</ul>
</div>
<?php
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
