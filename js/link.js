$(document).ready(function(){
    $(".head").load("http://localhost/blog_web/html/head.html");
    $(".banners").load("http://localhost/blog_web/html/banner.html");
    $(".video").load("http://localhost/blog_web/php/sy_video.php");
    $(".name_list").load("http://localhost/blog_web/php/sy_name_list.php");
    $(".rili").load("http://localhost/blog_web/html/rili.html");
    $(".foot").load("http://localhost/blog_web/html/foot.html");
    $("#mrjz").load("http://localhost/blog_web/php/mryj.php");
    $(".link").load("http://localhost/blog_web/php/yqlink.php");
	$(".grxd").load("http://localhost/blog_web/php/newgrxd_list.php");
});
function aj(obj){
    var Cort=obj.value;
    $.ajax({
        type:"post",
        datatype: "JSON",
        url:"http://localhost/blog_web/php/sy_name_list.php?lm="+Cort,
        async:false,
        success:function(){
            $(".name_list").load("http://localhost/blog_web/php/sy_name_list.php?lm="+Cort);
        }
    })

}