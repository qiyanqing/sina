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
	    	console.log(ID,password)
		    $.ajax({
		    	url:"",
		    	type:"post",
		    	data:{
		    		user_id:ID,
		    		user_password:password
		    	},
		    	dataType:"json",
		    	success:function(){

		    	}
		    })
	    })
	    
})