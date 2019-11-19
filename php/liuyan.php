<div style="width: 80%; margin: 20px auto; border: #6c757d 2px solid; padding:5px;">
    <h4>评论：</h4>
    <form class="ly_form">
        <textarea type="text" id="ly" class="form-control" style="width: 80%; height:200px; margin: auto;"></textarea>
			<span style="display:inline-block;color:red; position:absolute;left:40%; font-weight:bold; font-size:20px;"id="tip"></span>
        <input type="button" value="添 加 评 论" class="btn btn-warning btn_sub" style="margin-left: 80%; margin-top:10px;  margin-bottom: 10px;">
    </form>
	<input type="hidden" id="hid" style="border:1px solid #000;" >
	<input type="hidden" id="hid1" style="border:1px solid #000;" >
        <h4>历史评论：</h4>
    <ul id="ul" style="border: 1px solid #4D4D4D; width:80%; margin:auto;">
	<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="db_blog";
$title=$_GET['title'];
try {
    $nr=$_POST["nr"];
    $update=$_POST["updatetime"];
	$name=$_POST['username'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET AUTOCOMMIT=0");
    $sql="SELECT * from liuyan where article_title='$title'";
    $res=$conn->query($sql);
	
	while($row=$res->fetch()){//操作数据
				echo "<li class='btn-default' style='padding:10px;'><span>".$row['username']."：</span>".$row['message']."<span style='float:right;'>".$row['updatetime']."</span></li>";
    ?>

	<?php }
}
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
	?>
		<input type="text" id="hidde" style="display:none;" value="<?php echo $title; ?>">
		<li id="hli"style="display:none;">暂无评论</li>
    </ul>
</div>
<script>
$().ready(function(){
	//alert($("#ul li").length);
	if($("#ul li").length<2){
		$("#hli").css("display","block");
	}else{
		$("#hli").css("display","none");
	}
	$(".btn_sub").click(function(){
		if($("#ly").val()==""){
			$("#tip").html("您还未填写留言！");
		}else{
		$("#tip").html("");
			getRandomString(5);
			nowtime();
		$.ajax({
		type:"post",
		dataType:"json",
		url:"http://localhost/blog_web/php/liuyan_add.php?username="+$("#hid").val()+"&nr="+$("#ly").val()+"&updatetime="+$("#hid1").val()+"&title="+$("#hidde").val(),
		async:false,
		success:function(msg){
			if(msg == "1"){
				$("#tip").html("评论成功！");
				setTimeout(function () { window.location.reload(); }, 2000);
			}else if(msg == "0"){
				$("#main").html("评论失败，请重新填写！");
			}else{
				$("#main").html("操作失败");;
			}
		}
		});
		}
	});
	
function getRandomString(len) {
    len = len || 32;
    var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678秦朝李斯受命统一文字取消其他六国的异体字创造出许多有代表性的字体'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
    var maxPos = $chars.length;
    var pwd = '';
    for (i = 0; i < len; i++) {
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
    }
    $("#hid").val(pwd);
}
function getNow(s) {
return s < 10 ? '0' + s: s;
}
function nowtime(){
var myDate = new Date();             
var year=myDate.getFullYear();        //获取当前年
var month=myDate.getMonth()+1;   //获取当前月
var date=myDate.getDate();            //获取当前日
var h=myDate.getHours();              //获取当前小时数(0-23)
var m=myDate.getMinutes();          //获取当前分钟数(0-59)
var s=myDate.getSeconds();
var now=year+'-'+getNow(month)+"-"+getNow(date)+" "+getNow(h)+':'+getNow(m)+":"+getNow(s);
$("#hid1").val(now);
}
})
</script>