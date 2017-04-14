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
	    //左侧接口
		    $.ajax({
		    	url:"/index.php/Api/Homepage/category_left",
		    	type:"post",
		    	data:{
		    	},
		    	dataType:"json",
		    	success:function(res){
		    		// console.log(res)
		    		var a=""
		    		for (var i = 0; i < res.names.length; i++) {
		    			// console.log(res.names[i])
			    			a="<ul class='WebMain_nav'><li class='select the_one'><i class='fa fa-fire'></i><a href='#' style='color:#fff'>"+res.names[0]+"</a></li><li><div class='icon'></div><a href='# 'style='color:#fff' class='thin'>"+res.names[1]+"</a></li><li><div class='icon'></div><a href='# 'style='color:#fff' class='thin'>"+res.names[2]+"</a></li><li><div class='icon'></div><a href='#' style='color:#fff' class='thin'>"+res.names[3]+"</a></li><fieldset></fieldset></ul><ul class='WebHot'><li class'thin'><i class='fa fa-video-camera'></i><a href='# 'style='color:#fff' class='thin'>"+res.names[4]+"</a></li><fieldset></fieldset></ul><ul class='WebMain_nav'><li><i class='fa fa-flash'></i><a href='#' style='color:#fff' class='thin'>"+res.names[5]+"</a></li><li><div class='icon'></div><a href='# 'style='color:#fff' class='thin'>"+res.names[6]+"</a></li><li><div class='icon'></div><a href='#' style='color:#fff' class='thin'>"+res.names[7]+"</a></li><li><div class='icon'></div><a href='# 'style='color:#fff' class='thin'>"+res.names[8]+"</a></li><fieldset></fieldset></ul><ul class='WebHot'><li><i class='fa fa-video-camera'></i><a href='#' style='color:#fff' class='thin'>"+res.names[9]+"</a></li></ul>"
					   };
		    		$(".webMain_left").html(a)
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
					//左侧点击样式
					$(".webMain_left ul li").click(function(){
						$(this).css("background-color","#a9b9d2").parent().siblings().children().css("background-color","").removeClass("select")
						$(this).siblings().css("background-color","").removeClass("select")
						$(".the_one").mouseout(function(){
							$(this).removeClass("select")
						})
					})
					//字体加粗

		    	}
		    })  
		//点击登录调取接口
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
	//左侧单击样式
	$(".webMain_left ul li").click(function(){

	})
	//右侧接口拼接字符串方法
	// $.ajax({
	//     	url:"/index.php/Api/Homepage/category_right",
	//     	type:"post",
	//     	data:{
	//     	},
	//     	dataType:"json",
	//     	success:function(res){
	//     		console.log(res)
	//     		var a=""			
	//     		for (var i = 0; i < res.names.length; i++) {
	//     			for (var j = 0; j < res.names[i].child.length; j++) {
	//     				a+="<li><a href=''><img src=''><span>"+res.names[i].child[j].name+"</span></a></li>"
	// 	    			$(".ul_text").html(a)
	// a+="<h3>"+res.names[i].name+"</h3><ul class='ul_text clearfix'><li><a href=''><img src='__PUBLIC__/Home/homepage/images/star.png'><span>"+res.names[index].child[j].name+"</span></a></li></ul>"
	//     			};		
	//     		};
	//     	}
	//     })  
	//右侧接口tmpl方法
	$.ajax({
	    	url:"/index.php/Api/Homepage/category_right",
	    	type:"post",
	    	data:{
	    	},
	    	dataType:"json",
	    	success:function(res){
	    		console.log(res)
	    		var a=""
	    		var b=""
	    		var flag=0
	    		alert(12314124)
	    		for (var i = 0; i < res.names.length; i++) {    		
					a="<h3>"+res.names[i].name+"</h3>"
    				console.log(res.names[i].name)
    				$(".wb_find_bottom").append(a) 
    				 $(".wb_find_bottom").append("<ul>")  					
					for (var j = 0; j < res.names[i].child.length; j++) {
						b="<li><a href=''><img src='__PUBLIC__/Home/homepage/images/star.png'><span>"+res.names[i].child[j].name+"</span></a></li>"
	    				 console.log("11"+res.names[i].child[j].name)   
	    				$(".wb_find_bottom").append(b)
					};
	    				$(".wb_find_bottom").append("</ul>")  
	    		};

	    		// for (var i = 0; i < res.names.length; i++) {
	    		// 	b+="<h3>"+res.names[i].name+"</h3>"
	    		// 	$(".ul_text").before(b)
	    		// };
	   //  		var names = res.names;
				// $("#tmpl_all").tmpl(names).appendTo($(".allWeb"));
				// allFun();
	    	}
	    }) 
})