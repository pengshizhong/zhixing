
$(function(){
        $("#totop").hide();
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>100){
                    $("#totop").fadeIn();
                }
                else
                {
                    $("#totop").fadeOut();
                }
            });
            //当点击跳转链接后，回到页面顶部位置
            $("#totop").click(function(){
                $('body,html').animate({scrollTop:0},500);
                return false;
            });
        });
    }); 
