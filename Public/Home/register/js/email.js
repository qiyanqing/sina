$(function(){
	$(".inp").click(function(){
		var user_email=$(".email input").val()
		var user_password=$(".password").val()
		console.log(user_email)
		$.ajax({
		    	url:"/index.php/Api/Homepage/register",
		    	type:"post",
		    	data:{
		    		email:user_email,
		    		password:user_password
		    	},
		    	dataType:"json",
		    	success:function(res){
		    		if (res.status==1) {alert("未输入邮箱")}
		    		if (res.status==2) {alert("邮箱已存在")}
		    		if (res.status==3) {alert("未输入密码")}
		    		if (res.status==4) {alert("注册成功")}
		    	}
		    })
	})  
	//验证码
	var code; //在全局 定义验证码  
		function createCode() {
		  code = "";
		  var codeLength = 6;//验证码的长度  
		  var checkCode = document.getElementById("checkCode");
		  var selectChar = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的  
		  
		  for (var i = 0; i < codeLength; i++) {
		    var charIndex = Math.floor(Math.random() * 36);
		    code += selectChar[charIndex];
		  }
		  //alert(code);
		  if (checkCode) {
		    checkCode.className = "code";
		    checkCode.value = code;
		  }
		}
		  
		function validate() {
		  var inputCode = document.getElementById("input1").value;
		  if (inputCode.length <= 0) {
		    alert("请输入验证码！");
		  } else if (inputCode != code) {
		    alert("验证码输入错误！");
		  createCode();//刷新验证码  
		  } else {
		  alert("^-^ OK");
		  }
		}


		<form action="#">
  <input type="text" id="input1" /> <input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged" style="width: 80px" /><br />
  <input id="Button1" onclick="validate();" type="button" value="确定" />
</form>
})