<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>王盼_个人博客</title>
	<link rel="icon" href="http://localhost/blog_web/image/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <script src="http://localhost/blog_web/js/jquery.min.js"></script>
    <style>
        .head_pic{
            margin-top: 20px;
            height: 280px;
            overflow: hidden;
        }
        .head_pic image{
            width: 100%;
        }
        .dqwz{
            background: #989b9c;
            width: 98%;
            margin: 5px auto;
            border-radius: 1%;
            padding-left: 3%;
            color: #FFFFFF;
            height: 50px;
        }
        .dqwz h3{
            line-height: 10px;
            display: inline-block;
        }
        .dqwz span{
            font-size: 24px;
        }
        .video{
            background: #989b9c;
            text-align: center;
            width:98%;
            margin: auto;
            padding: 30px ;
        }
    </style>
</head>
<body style="background: #2E2E2E;">
<div class="head"></div>
<div class="head_pic">
    <img style="width:100%;height:100%;" src="http://localhost/blog_web/image/article_list_head_pic.gif">
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
$wj=$_GET["wjm"];
$name=$_GET['name'];
$date=date("Y-m-d");
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM video_message where wj_name= '$wj'";
    $result = $conn->query($sql);
?>
<div class="dqwz">
    <h3>当前位置：</h3>
    <span>视频分享</span>
    <span class="fa fa-angle-double-right"></span>
    <span><?php echo $name; ?></span>
</div>
<div class="video">
    
<?php
while($row=$result->fetch()){//操作数据
		echo "<h2 style='color:#FFFFFF;font-weight:bold;'>".$row['title']."</h2>";
		echo"<video width='920' height='540' controls >";
        echo "<source src='".$row['url'].$row['wj_name']."."."mp4' type='video/mp4'>";
        echo"<source src='".$row['url'].$row['wj_name']."."."ogg' type='video/ogg'>";
        echo "<source src='".$row['url'].$row['wj_name']."."."webm' type='video/webm'>";
        echo "<object data='".$row['url'].$row['wj_name']."."."mp4' width='320' height='240'>";
        echo  "<embed width='320' height='240' src='".$row['url'].$row['wj_name']."."."swf'>";
        echo  "</object>";
    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
 ?>
    </video>
</div>
<div class="foot" style="position: relative; top: 20px; width: 100%;overflow: hidden; "></div>
</body>
<script>
    $(".head").load("http://localhost/blog_web/html/head.html");
    $(".foot").load("http://localhost/blog_web/html/foot.html");

</script>