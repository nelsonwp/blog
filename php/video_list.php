<?php
$servername = "db4free.net";
$username = "nelsonwp";
$password = "9c3563f1";
$dbname="db_blogwp";
$lm=$_GET["lm"];
$name=$_GET['name'];
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$sql = "SELECT * FROM article_list ";
//$result=$conn->query("SELECT * FROM article_list WHERE 1=1".$exsql);
$sql = "SELECT pic_message.id,pic_message.wj_name,pic_message.url,video_message.title,video_message.url AS 'video_url',sslm_video.lm_name FROM pic_message,video_message,sslm_video WHERE pic_message.sslm_id=sslm_video.ID AND pic_message.wj_name=video_message.wj_name AND sslm_video.ID = '$lm' order by pic_message.id desc";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>王盼_个人博客</title>
	<link rel="icon" href="https://nelsonwp.github.io/blog/image/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <script src="https://nelsonwp.github.io/blog/js/jquery.min.js"></script>
    <style>
		.ul{
			margin:0 auto; 
			padding:0; 
			width:80%;
		}
		.ili{
			magrin:10px;
			padding:0;
			list-style:none;
			 width:32%; 
			 height:200px;
			 display:inline-block;
			 margin-left:5px;
			 overflow:hidden;
			 border-radius:5%;
		}
		.limg{width:100%; 
			  height:100%;
			  object-fit: cover;
			  
              cursor: pointer;
              transition: all 0.6s;
			  }
		.limg:hover{
			transform: scale(1.4);
		}
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
        .wzlb{
            width: 98%;
            margin: auto;
            background: #4D4D4D;
            overflow: hidden;
			padding:20px
        }
        .wzlb li{
            margin-top: 5px;
        }
        .lbmc{
            display: block;
            color: #4D4D4D;
            font-size: 20px;
            width: 90%;
            margin: auto;
            padding: 10px 20px;
        }
        .lbmc:hover{
            color: #ff0000;
            text-decoration: none;
        }
        .lbmc span{
            float: right;
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
					Z-index:99999;
				}
				.ttop:hover{
					cursor:pointer;
				}
    </style>
</head>
<body style="background: #2E2E2E;">
<div class="head"></div>
<div class="head_pic">
    <img style="width:100%; height:100%;" src="https://nelsonwp.github.io/blog/image/article_list_head_pic.gif">
</div>
<div class="dqwz">
    <h3>当前位置：</h3>
    <span>视频分享</span>
    <span class="fa fa-angle-double-right"></span>
    <span><?php echo $name; ?></span>
</div>
<div class="wzlb">
<ul class="ul">
    <?php
    while($row=$result->fetch()){//操作数据
        /*echo "<a href='https://nelsonwp.github.io/blog/php/content.php?id=".$row['xh']."' target='_blank'  class='lbmc bg-success'>".$row['title']."<span>".$row['up_date']."</span></a>";*/
		echo "<li class='ili'><a href='https://nelsonwp.github.io/blog/php/video_play.php?wjm=".$row['wj_name']."&name=".$name."'><img class='limg' src='".$row['url']."'></a></li>";
    }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    ?>
</div>
		<div class="ttop">
			<span class="fa fa-arrow-up" title="返回顶部"></span>
		</div>
<div class="foot" style="position: relative; top: 20px; width: 100%;overflow: hidden; "></div>
</body>
<script>
    $(".head").load("https://nelsonwp.github.io/blog/html/head.html");
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
</html>
