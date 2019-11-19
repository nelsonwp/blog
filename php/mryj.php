<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
$date=date("Y-m-d");
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT jz from mryj order by rand() LIMIT 1";
//where datetime= '$date'
$result = $conn->query($sql);
while($row=$result->fetch()){//操作数据
    ?>
    <h3 style="margin: 10px 0;">每日一句</h3>
<p class="meiri" style="font-size: 18px;"><span>&minus;</span> <?php echo $row['jz'] ?><span>&minus;</span></p>
<?php
}
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
