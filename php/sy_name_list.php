<style>
    a{
        color: #3b97d7;
        text-decoration: none;
    }
    a:visited   {
        color: #FFFFFF;
    }
    a:hover{
        color: #FFFFFF;
    }

    .listleft{
        padding: 0 ;
        width: 100%;
        color: #FFFFFF;
        text-align: left;
        padding-left: 5%;

    }
    .listleft li{
        font-weight: bold;
        font-size: 18px;
        padding-top: 8px;
    }

</style>
<?php
$CORT = $_GET['lm'];
$servername = "db4free.net";
$username = "nelsonwp";
$password = "9c3563f1";
$dbname="db_blogwp";
try {
$sqli="1=1";
switch ($CORT){
    case "全部":$sqli="1=1";break;
    case "编程语言":$sqli="lm_name='编程语言'";break;
    case "数据库":$sqli="lm_name='数据库'";break;
    case "Linux系统":$sqli="lm_name='Linux系统'";break;
    default:$sqli="1=1";
}
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT xh,title ,lm_name FROM article_list,sslm WHERE article_list.sslm=sslm.ID and $sqli order by update_time desc limit 10 ";
//$result=$conn->query("SELECT * FROM article_list WHERE 1=1".$exsql);
$result = $conn->query($sql);
?>

<?php
    while($row=$result->fetch()){//操作数据

        ?>
<div class="listleft">
    <ul>
        <?php
        echo "<li><a href='http://localhost/blog_web/php/content.php?id=".$row['xh']."' target='_blank' >".$row['title']."</a><span style='float: right; color: #c2ccd1;'>".$row['lm_name']."</span></li>";
        ?>

    </ul>
</div>

<?php

    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>


