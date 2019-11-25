<?php 
$servername = "db4free.net";
$username = "nelsonwp";
$password = "9c3563f1";
$dbname="db_blogwp";
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM yq_link ";
//$result=$conn->query("SELECT * FROM article_list WHERE 1=1".$exsql);
$result = $conn->query($sql);
?>
<style>
    .box{
        position: fixed;
        top: 55%;
        right:-150px;
        text-align: right;
        /*background: #FFFFFF;*/
    }
    .bleft{
        width:25px;
        background: #989b9c;
        color: #FFFFFF;
        text-align: center;
		float:left;
    }
    .bleft:hover{
        cursor: pointer;
    }
    .bright{
        width:150px;
        padding:0 10px;
        position: relative;
        /*top: -40px;*/
        display: inline-block;
        background: #FFFFFF;
        text-align: left;
    }
    .bright ul{
        margin: 0;
		position:relative;
		top:55%;
		background:#FFF;
		min-height:100px;
    }
    .al{
        color: #1b1e21;
    }
    .al:hover{
        color: #ff0000;
    }
    .bright a:hover{color: #00a2d4;}
</style>
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<div class="box">
    <div class="bleft" title="点我(￣▽￣)／">
    友情链接
    <span id="lr" class="fa fa-angle-double-left"></span>
    </div>
    <div class="bright">
        <ul>
            <?php
            while($row=$result->fetch()){//操作数据
                echo "<li><a style='color: #00a2d4; font-family: 楷体; font-size: 20px;' class='al' target='_blank' href='".$row['link']."'>".$row['name']."</a></li>";
            }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }?>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".box").click(function(){
            if($(".box").css("right")=="-150px"){
                $(".box").animate({right:0},700);
                $("#lr").removeClass("fa fa-angle-double-left");
                $("#lr").addClass("fa fa-angle-double-right");
            }else{
                $(".box").animate({right:'-150px'},700);
                $("#lr").removeClass("fa fa-angle-double-right");
                $("#lr").addClass("fa fa-angle-double-left");
            }
        });
    });
</script>
