$(function(){
	$(".inp").click(function(){
		var user_email=$(".email input").val()
		var user_password=$(".password").val()
		$.ajax({
		    	url:"/index.php/Api/Homepage/register",
		    	type:"post",
		    	data:{
		    		email:user_email,
		    		password:user_password
		    	},
		    	dataType:"json",
		    	success:function(res){
		    		if (status=1) {
		    			alert(邮箱已存在)
		    		}else{
		    			alert(注册成功)
		    		}
		    	}
		    })
	})  
})