$(document).ready(function(){
    $(".head").load("https://nelsonwp.github.io/blog/html/head.html");
    $(".banners").load("https://nelsonwp.github.io/blog/html/banner.html");
    $(".video").load("https://nelsonwp.github.io/blog/php/sy_video.php");
    $(".name_list").load("https://nelsonwp.github.io/blog/php/sy_name_list.php");
    $(".rili").load("https://nelsonwp.github.io/blog/html/rili.html");
    $(".foot").load("https://nelsonwp.github.io/blog/html/foot.html");
    $("#mrjz").load("https://nelsonwp.github.io/blog/php/mryj.php");
    $(".link").load("https://nelsonwp.github.io/blog/php/yqlink.php");
	$(".grxd").load("https://nelsonwp.github.io/blog/php/newgrxd_list.php");
});
function aj(obj){
    var Cort=obj.value;
    $.ajax({
        type:"post",
        datatype: "JSON",
        url:"https://nelsonwp.github.io/blog/php/sy_name_list.php?lm="+Cort,
        async:false,
        success:function(){
            $(".name_list").load("https://nelsonwp.github.io/blog/php/sy_name_list.php?lm="+Cort);
        }
    })

}
