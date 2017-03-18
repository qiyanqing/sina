$(function(){
	 var TIMER;//定义全局变量
	    $(window).scroll(function(){
	        clearTimeout(TIMER);//必须要有这句
	        if( $(document).scrollTop() > 0 ){
	            TIMER = setTimeout(function(){
	                $(".webTop").addClass("abc").css({"background-color":"#6fbfd"});
	            },50);
	        }else{
	            TIMER = setTimeout(function(){
	                $(".webTop").removeClass("abc");
	            },50);
	        }
	    });
})