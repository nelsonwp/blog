<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
<style>
ul li{
	margin:0;
	padding:0;
	list-style:none;
}
.bg{
	background-color:#7ebeea;
	 background-size:100% 100%;
	 padding-bottom:10px;
	width:100%;
	padding-top:10px;
	padding-bottom:15px;
	height:500px;
}
.libg{
	background-color:rgba(256, 255, 255, 0.5);
	background-size:100% 100%;
	margin:10px;
	
}
.libg div{
	padding-left:25px;
	font-weight:bold;
	font-size:24px;
	color:#e801a9;
}
.libg p{
	color:#dc8458;
	font-weight:bold;
	text-indent:25px;
}
.libg:hover{
	background-color:rgba(256, 255, 255, 0.8);
	cursor:pointer;
	transform: scale(1.03);
}
.libg:hover p{
	color:#403c44;
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
$sql = "SELECT * from grxd  ORDER BY id DESC LIMIT 5";
//where datetime= '$date'
$result = $conn->query($sql);
    ?>
<div class="bg">
<span style="font-size:20px; color:#ef1010; font-weight:bold; margin-left:10px; /*margin-top:10px; margin-bottom:8px;*/"><span class="fa fa-book"></span>&nbsp;近期日志</span>
<a class="btn btn-warning" style="margin-left:70%;/*margin-top:10px; margin-bottom:8px;*/" href="http://localhost/blog_web/html/xd_list.html">更多>></a>
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
