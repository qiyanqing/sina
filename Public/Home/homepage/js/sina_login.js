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
	    $(".btn_login").click(function(){
	    	var ID=$(".accounts_login").val()
	    	var password=$(".accounts_password").val() 
		    $.ajax({
		    	url:"/index.php/Api/Homepage/handlelogin",
		    	type:"post",
		    	data:{
		    		user_id:ID,
		    		user_password:password
		    	},
		    	dataType:"json",
		    	success:function(res){
		    		console.log(res)
		    		var num=res.status
		    		console.log(num)
		    		if (num==1) {alert("请输入账号")}
		    		if (num==2) {alert("账号不存在")}
		    		if (num==3) {alert("请输入密码")}
		    		if (num==4) {alert("密码错误")}
		    		if (num==5) {alert("登陆成功")}
		    	}
		    })  
	    })
	// 左侧选中样式
	$(".webMain_left ul li").mouseover(function(){
		$(this).addClass("select")
	})
	$(".webMain_left ul li").mouseout(function(){
		$(this).removeClass("select")
	})
	$(".the_one").mouseout(function(){
		$(this).addClass("select")
	})
	// 吸顶选项样式
	$(".webTop_center .Web_top_nav ul li a,.webTop_center .Web_top_nav ul li").mouseover(function(){
		$(this).css("color","#eb7350")
	})
	$(".webTop_center .Web_top_nav ul li a,.webTop_center .Web_top_nav ul li").mouseout(function(){
		$(this).css("color","#808080")
	})
	// 登录样式
	$(".btn_login").mouseover(function(){
		$(this).css("background-color","#f77c3d")
	})
	$(".btn_login").mouseout(function(){
		$(this).css("background-color","#ff8140")
	})
})