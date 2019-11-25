<?php
$id = $_GET['id'];
$servername = "db4free.net";
$username = "nelsonwp";
$password = "9c3563f1";
$dbname="db_blogwp";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT title,content,up_date FROM article_list where xh= $id";
    $result = $conn->query($sql);
    while($row=$result->fetch()){//操作数据
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo $row['title']; ?>_王盼个人博客</title>
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
			<link rel="icon" href="https://nelsonwp.github.io/blog/image/favicon.ico" type="image/x-icon"/>
			<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
            <style>
                .head_pic{
                    height: 280px;
                    overflow: hidden;
                }
                .head_pic image{
                    width: 100%;
                }
				.ttop{
					font-size:36px;
					color:#fff;
					width:3%;
					text-align:center;
					background:#63b6f6;
					position:fixed;
					top:70%;
					right:1%;
					display:none;
				}
				.ttop:hover{
					cursor:pointer;
				}
            </style>
        </head>
        <body style="background: #4D4D4D;">
        <div class="container" style="width: 90%; margin: auto; margin-top: 50px; background: #FFFFFF;">
            <div class="head"></div>
            <div class="head_pic">
                <img style="width:100%;height:100%;" src="https://nelsonwp.github.io/blog/image/article_list_head_pic.gif">
            </div>
            <div align="center">
                <h2>
				<input id="artitle" readonly="readonly" style="text-align:center;width:100%; border:none;" value="<?php echo $row['title'] ?>">
                </h2>
		
                <p><span>发布时间：<?php echo $row['up_date'] ?></span></p>
            </div>
			<div style=" width:95%; margin:auto;">
            <?php
            echo $row['content'];
            ?>
			</div>
			<div class="liuyan"></div>
        </div>
		<div class="ttop">
			<span class="fa fa-arrow-up" title="返回顶部"></span>
		</div>
        <div class="foot"></div>
        </body>
        </html>
        <?php

    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<script src="http://localhost/blog/js/jquery.js"></script>
<script>

    function _getRandomString(len) {
        len = len || 32;
        var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
        var maxPos = $chars.length;
        var pwd = '';
        for (i = 0; i < len; i++) {
            pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
        }
        return pwd;
    }
    $(".head").load("https://nelsonwp.github.io/blog/html/head.html");
	$(".liuyan").load("https://nelsonwp.github.io/blog/php/liuyan.php?title="+$("#artitle").val());
    $(".foot").load("https://nelsonwp.github.io/blog/html/foot.html");
	$(window).scroll(function(){
	// 滚动条距离顶部的距离 大于 200px时
	if($(window).scrollTop() >= 200){
	$(".ttop").fadeIn(1000); // 开始淡入
	} else{
	$(".ttop").stop(true,true).fadeOut(1000); // 如果小于等于 200 淡出
	}
	});
	$(".ttop").click(function(){
		$("html,body").animate({scrollTop:0}, 500);
	});
</script>
