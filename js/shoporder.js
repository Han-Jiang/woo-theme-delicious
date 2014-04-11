/************************************工具函数************************************/
function jsTrim(str) 
{
	return str.replace(/(^\s*)|(\s*$)/g,"");
}

//将小数点清零
function returnFloat0(value) 
{      
	value = Math.round(parseFloat(value));
    return value;
}
 
 //保留一位小数点
function returnFloat1(value) 
{    
	value = Math.round(parseFloat(value) * 10) / 10;
    if (value.toString().indexOf(".") < 0)
    	value = value.toString() + ".0";
    return value;
}
 
  //保留两位小数点
function returnFloat(value)
{    
	value = Math.round(parseFloat(value) * 100) / 100;
    if (value.toString().indexOf(".") < 0) 
    {
    	value = value.toString() + ".00";
    }
    return value;
}

/************************************ 全局js ***********************************/
//显示加载器  
function showLoader() {
    $.mobile.loading('show', {
        text: '加载中...',		//加载器中显示的文字  
        textVisible: false,	//是否显示文字  
        theme: 'a',			//加载器主题样式a-e  
        textonly: false,	//是否只显示文字  
        html: ""			//要显示的html内容，如图片等  
    });
}

//隐藏加载器
function hideLoader()
{
    //隐藏加载器
    $.mobile.loading('hide');
}

function ShowAttention(data)
{
	document.getElementById('attention-content').innerHTML = data;
	$('#popupAttention').popup('open');
	setTimeout(function(){$('#popupAttention').popup('close');}, 1500);
}

/********************************* 购物界面js **************************************/
function foodtypeClick(foodtypeId, destUrl)
{	
	if (foodtypeId == curTypeId)
	{
		return;
	}
	
	function onFoodtypeSuccess(data, status)
	{	
		hideLoader();
		
		//先更新右侧内容
		myScroll2.scrollTo(0, 0, 200, 0);
		$("#scroller2").empty();	
	    $("#scroller2").html(data);
	    myScroll2.refresh();
	    
	    //再更新左侧选中按钮
	    document.getElementById('foodtype_' + curTypeId).className = "";
	    curTypeId = foodtypeId;
	    document.getElementById('foodtype_' + curTypeId).className = "active";
	    
	    curFoodId = 0; //更新curFoodId防止切换的时候，详情点击展示出错
	}

	function onFoodtypeError(data, status)
	{
		hideLoader();
	    // handle an error
	}
	
	showLoader();
	
	$.ajax({
        type: "GET",
        url: destUrl,
        dataType : "html",
        cache : false,
        success: onFoodtypeSuccess,
        error: onFoodtypeError,
    });
}

function foodtitleClick(food_id)
{
	var fooddetailObj = document.getElementById('fooddetail_' + food_id);
	if (fooddetailObj.style.display == "none")
	{
		fooddetailObj.style.display = "";
	}
	else
	{
		fooddetailObj.style.display = "none";
	}
	myScroll2.refresh();
	
	if (curFoodId == food_id)
	{
		return;
	}
	
	if (curFoodId != 0)
	{
		document.getElementById('fooddetail_' + curFoodId).style.display = "none";
	}
	curFoodId = food_id;
}

function OnOrderAddfoodSuccess(data, status)
{
	if (data.status == "error")
	{
		if(data.errorcode == -1)
		{

		}
		if(data.errorcode == -2)
		{

		}
		if(data.errorcode == -3)
		{

		}
		ShowAttention(data.message);
		
		return;
	}
	
	//好吧，没有错误的话，就开始更新显示界面
	var food_id = data.data.food_id;
	var food_num = data.data.food_num;
	var totalNum = data.data.totalNum;
	var totalPrice = data.data.totalPrice;
	
	//先改变数值
	document.getElementById('order_totalnum').innerHTML = totalNum;
	document.getElementById('order_totalprice').innerHTML = totalPrice;
	
	document.getElementById('order_foodnum_' + food_id).innerHTML = food_num;
	
	//再改变显示
	if (food_num > 0)
	{
		document.getElementById('foodattention_' + food_id).className = "foodattention-active";
	}
	else
	{
		document.getElementById('foodattention_' + food_id).className = "foodattention";
	}	
}

function OnOrderAddfoodFailed(data, status)
{
	
}

function order_plus_onclick(food_id, destUrl)
{
	var curNum = parseInt(document.getElementById('order_foodnum_' + food_id).innerHTML);
	if(curNum >= 99)
	{
		return;
	}
	
	$.ajax({
        type: "GET",
        url: destUrl,
        dataType : "json",  
        cache : false,
        success: OnOrderAddfoodSuccess,
        error: OnOrderAddfoodFailed,
    });
}

function OnOrderReducefoodSuccess(data, status)
{
	if (data.status == "error")
	{
		if(data.errorcode == -1)
		{

		}
		if(data.errorcode == -2)
		{

		}
		ShowAttention(data.message);
		
		return;
	}
	
	//好吧，没有错误的话，就开始更新显示界面
	var food_id = data.data.food_id;
	var food_num = data.data.food_num;
	var totalNum = data.data.totalNum;
	var totalPrice = data.data.totalPrice;
	
	document.getElementById('order_totalnum').innerHTML = totalNum;
	document.getElementById('order_totalprice').innerHTML = totalPrice;
	
	document.getElementById('order_foodnum_' + food_id).innerHTML = food_num;
	
	//再改变显示
	if (food_num > 0)
	{
		document.getElementById('foodattention_' + food_id).className = "foodattention-active";
	}
	else
	{
		document.getElementById('foodattention_' + food_id).className = "foodattention";
	}
}

function OnOrderReducefoodFailed(data, status)
{
	
}

function order_dec_onclick(food_id, destUrl)
{
	var curNum = parseInt(document.getElementById('order_foodnum_' + food_id).innerHTML);
	if(curNum <= 0)
	{
		return;
	}
	
	$.ajax({
        type: "GET",
        url: destUrl,
        dataType : "json",  
        cache : false,
        success: OnOrderReducefoodSuccess,
        error: OnOrderReducefoodFailed,
    });
}


/**************************** 购物车选项 ************************************/
function OnCartAddfoodSuccess(data, status)
{
	if (data.status == "error")
	{
		if(data.errorcode == -1)
		{

		}
		if(data.errorcode == -2)
		{

		}
		if(data.errorcode == -3)
		{

		}
		ShowAttention(data.message);
		
		return;
	}
	
	//好吧，没有错误的话，就开始更新显示界面
	var food_id = data.data.food_id;
	var food_num = data.data.food_num;
	var totalNum = data.data.totalNum;
	
	totalPrice = parseFloat(data.data.totalPrice);
	
	document.getElementById('cart_totalnum').innerHTML = totalNum;
	
	var totalShowPrice;
	if ((delivery_fee_valid == 1 && totalPrice < basicprice) || always_delivery_fee == 1)
	{
		totalShowPrice = totalPrice + delivery_fee;
		document.getElementById('delivery_fee').style.display = "";
	}
	else
	{
		totalShowPrice = totalPrice;
		document.getElementById('delivery_fee').style.display = "none";
	}
	
	//改变总价
	document.getElementById('cart_totalprice').innerHTML = totalShowPrice;
	//如果有会员价，改变会员价
	if (isShowMemberPrice == 1)
	{
		var memberShowPrice = totalPrice * mebmerPriceCount/10;
		if ((delivery_fee_valid == 1 && totalPrice < basicprice) || always_delivery_fee == 1)
		{
			memberShowPrice = memberShowPrice + delivery_fee;
		}	
		
		//取1位小数
		memberShowPrice = returnFloat1(memberShowPrice);
		document.getElementById('cart_memberprice').innerHTML = memberShowPrice;
	}
	
	document.getElementById('cart_foodnum_' + food_id).innerHTML = food_num;
	
	if (food_num > 0)
	{
		document.getElementById('foodname_' + food_id).style.textDecoration = "";
	}
}

function OnCartAddfoodFailed(data, status)
{
	
}

function cart_plus_onclick(food_id, destUrl)
{
	var curNum = parseInt(document.getElementById('cart_foodnum_' + food_id).innerHTML);
	if(curNum >= 99)
	{
		return;
	}
	
	$.ajax({
        type: "GET",
        url: destUrl,
        dataType : "json",  
        cache : false,
        success: OnCartAddfoodSuccess,
        error: OnCartAddfoodFailed,
    });
}

function OnCartReducefoodSuccess(data, status)
{
	if (data.status == "error")
	{
		if(data.errorcode == -1)
		{

		}
		if(data.errorcode == -2)
		{

		}
		ShowAttention(data.message);
		
		return;
	}
	
	//好吧，没有错误的话，就开始更新显示界面
	var food_id = data.data.food_id;
	var food_num = data.data.food_num;
	var totalNum = data.data.totalNum;
	
	totalPrice = parseFloat(data.data.totalPrice);
	
	document.getElementById('cart_totalnum').innerHTML = totalNum;
	
	var totalShowPrice;
	if ((delivery_fee_valid == 1 && totalPrice < basicprice) || always_delivery_fee == 1)
	{
		totalShowPrice = totalPrice + delivery_fee;
		document.getElementById('delivery_fee').style.display = "";
	}
	else
	{
		totalShowPrice = totalPrice;
		document.getElementById('delivery_fee').style.display = "none";
	}
	
	//改变总价
	document.getElementById('cart_totalprice').innerHTML = totalShowPrice;
	//如果有会员价，改变会员价
	if (isShowMemberPrice == 1)
	{
		var memberShowPrice = totalPrice * mebmerPriceCount/10;
		if ((delivery_fee_valid == 1 && totalPrice < basicprice) || always_delivery_fee == 1)
		{
			memberShowPrice = memberShowPrice + delivery_fee;
		}	
		
		//取1位小数
		memberShowPrice = returnFloat1(memberShowPrice);
		document.getElementById('cart_memberprice').innerHTML = memberShowPrice;
	}
	
	document.getElementById('cart_foodnum_' + food_id).innerHTML = food_num;
	
	if (food_num == 0)
	{
		document.getElementById('foodname_' + food_id).style.textDecoration = "line-through";
	}
}

function OnCartReducefoodFailed(data, status)
{
	
}

function cart_dec_onclick(food_id, destUrl)
{
	var curNum = parseInt(document.getElementById('cart_foodnum_' + food_id).innerHTML);
	if(curNum <= 0)
	{
		return;
	}
	
	$.ajax({
        type: "GET",
        url: destUrl,
        dataType : "json",  
        cache : false,
        success: OnCartReducefoodSuccess,
        error: OnCartReducefoodFailed,
    });
}

function valiForm(){
	var mobilePattern = /^1\d{10}$/;
	var phonePattern = /^[-0-9]*$/;
	
	var flag = false;
	
	var name = jsTrim(document.getElementById("name").value);
	var phone = jsTrim(document.getElementById("phone").value);
	var address = jsTrim(document.getElementById("address").value);
	
	document.getElementById("name").value = name;
	document.getElementById("phone").value = phone;
	document.getElementById("address").value = address;
	
	if(name.length < 1){
		document.getElementById("nameinfo-layout").style.display = "";
		document.getElementById("nameinfo").innerHTML = "亲，留下您的大名吧！";
		flag = true;
	}
	else{
		document.getElementById("nameinfo-layout").style.display = "none";
	}
	
	var phoneShowInfo = false;
	if(phone.length < 5 || phone.length > 20)
	{
		document.getElementById("phoneinfo-layout").style.display = "";
		document.getElementById("phoneinfo").innerHTML = "亲，电话长度不对哦！";
		flag = true;
		phoneShowInfo = true;
	}
	if(!(phonePattern.test(phone))){
		document.getElementById("phoneinfo-layout").style.display = "";
		document.getElementById("phoneinfo").innerHTML = "亲，您的电话格式有误，电话只能包含数字或横线-";
		flag = true;
		phoneShowInfo = true;
	}
	if (phoneShowInfo == false)
	{
		document.getElementById("phoneinfo-layout").style.display = "none";
	}
	
	if(address.length < 1){
		document.getElementById("addressinfo-layout").style.display = "";
		document.getElementById("addressinfo").innerHTML = "亲，地址不能为空的哦！";
		flag = true;
	}
	else{
		document.getElementById("addressinfo-layout").style.display = "none";
	}
	
	return flag;
}

function time(btn) {
    if(wait == 0)
    {
    	btn.text("重新获取");
    	btn.button('enable');
    	btn.button('refresh');
    	
		wait = 180;
    } 
    else 
    {
    	//btn.setAttribute("disabled", true);
    	btn.text(wait+"秒后重发");
    	btn.button('disable');
    	btn.button('refresh');
    	
    	//document.getElementById("cart-captchainfo").innerHTML = "您的验证码已经成功发送，请输入您收到的短信验证码完成手机号码验证。";
    	
        wait--;
        setTimeout(function() {
            time(btn);
        },
        1000)
    }
}

function sendCaptcha(customer_id, wxusername, admin_id, shop_id)
{	
	var phone = jsTrim(document.getElementById("phone").value);
	$.ajax({
        type: "GET",
        url: "/index.php?r=sms/sendcaptcha&phone=" + phone + "&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id, 
        cache : false,
        success: function(data){
        	if (data == "true")
    		{
        		document.getElementById("cart-captchainfo").innerHTML = "您的验证码已经成功发送，请输入您收到的短信验证码完成手机号码验证。";
    		}
        	else if (data == "false")
    		{
        		document.getElementById("cart-captchainfo").innerHTML = "您的短信验证码发送失败，请稍后重试。";
    		}
        	else
    		{
        		//验证次数超过3次的情况
        		document.getElementById("cart-captchainfo").innerHTML = "您今天获取验证码次数已超过3次，请明天再试！";
				
				return false;
    		}
        },
    });
	
	$("#getcaptcha").button('disable');
	time($("#getcaptcha"));
	
	return true;
}

function submitOnclick(customer_id, wxusername, admin_id, shop_id)
{
	//先判断购物车是否为空
	var totalNum = parseInt(document.getElementById('cart_totalnum').innerHTML);
	if (totalNum <= 0)
	{
		ShowAttention("您的购物车为空，不能提交订单！");
		return;
	}
	
	//先判断格式是否错误
	if (valiForm() == true)
	{
		return;
	}
	
	//判断是否是会员余额支付
	if ($("input[name='pay_type']:checked").val() == "balance" && isMember == 0)
	{
		ShowAttention("您不是该店铺的会员，无法使用余额支付！");
		return;
	}
	
	//判断是否填写了交易密码
	if ($("input[name='pay_type']:checked").val() == "balance" && isMember == 1)
	{
		var paypassword = document.getElementById("paypassword").value;
		if(paypassword.length < 1){
			document.getElementById("paypasswordinfo-layout").style.display = "";
			document.getElementById("paypasswordinfo").innerHTML = "余额支付必须填写交易密码！";
			
			return;
		}
		else{
			document.getElementById("paypasswordinfo-layout").style.display = "none";
		}
	}
	
	var lastPrice;
	if (isShowMemberPrice == 1)
	{
		lastPrice = parseFloat(document.getElementById('cart_memberprice').innerHTML);
	}
	else
	{
		lastPrice = parseFloat(document.getElementById('cart_totalprice').innerHTML);
	}

	//如果是余额支付，判断余额足不足
	if (isMember == 1)
	{
		var balanceValue = parseFloat(document.getElementById('cart-balance-value').innerHTML);
		if ($("input[name='pay_type']:checked").val() == "balance" && lastPrice - balanceValue > 0)
		{
			ShowAttention("您的余额不足，无法提交订单！");
			return;
		}
	}
	
	//开始正式提交订单
	showLoader();
	$('#submit-btn').addClass('ui-disabled');
	
	//如果都验证通过了，判断是否需要短信验证
	var phone = jsTrim(document.getElementById("phone").value);
	$.ajax({
        type: "GET",
        url: "/index.php?r=sms/smsneed&phone=" + phone + "&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id, 
        cache : false,
        success: function(data){
        	if (data == "true")
    		{
        		if (document.getElementById('captcha').value == "")
    			{
        			//需要验证手机号码
            		document.getElementById('captcha-layout').style.display = '';
            		
            		hideLoader();
					$('#submit-btn').removeClass('ui-disabled');
					
            		return;
    			}
        		else
    			{
        			//如果填写了验证码，就判断验证码是否正确
        			var captcha = document.getElementById('captcha').value;
        			$.ajax({
        		        type: "GET",
        		        url: "/index.php?r=sms/captcharight&captcha=" + captcha + "&phone=" + phone + "&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id, 
        		        cache : false,
        		        success: function(data){
        		        	//如果验证码正确，那么就开始提交订单
        		        	if (data == "true")
    		        		{
        		        		$.ajax({
        					        type: "POST",
        					        url: "/index.php?r=cart/sendorder&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id,
        					        dataType : "json",
        					        data: $("#cart_form").serialize(),
        					        cache : false,
        					        success: function(data){
        								if (data.status == "error")
        								{
        									if (data.errorcode == -1)
        									{
        										//交易密码错误
        										document.getElementById("paypasswordinfo-layout").style.display = "";
        										document.getElementById("paypasswordinfo").innerHTML = "交易密码错误，请重新输入！";
        									}
        									else
        									{
        										ShowAttention(data.message);
        									}
        									
        									hideLoader();
        									$('#submit-btn').removeClass('ui-disabled');
        									
        		        	    			return;
        								}
        								else
        								{
        									$.mobile.changePage("/index.php?r=cart/ordersuccessful&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id, 'none', false, false);
        								}
        					        },
        					        error: function(data){
        					        	hideLoader();
        								$('#submit-btn').removeClass('ui-disabled');
        					        },
        					    });
    		        		}
        		        	else
    		        		{
        		        		//如果验证码不正确，那么就给予提示
        		        		document.getElementById("cart-captchainfo").innerHTML = "您的验证码不正确，请输入正确的验证码进行手机号验证。";
        		        		
        		        		hideLoader();
								$('#submit-btn').removeClass('ui-disabled');
								
        						return;
    		        		}
        		        },
        			});
    			}
    		}
        	else
    		{
        		//如果不需要验证码，那么就直接走提交流程了        		
        		$.ajax({
			        type: "POST",
			        url: "/index.php?r=cart/sendorder&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id,
			        dataType : "json",
			        data: $("#cart_form").serialize(),
			        cache : false,
			        success: function(data){
						if (data.status == "error")
						{
							if (data.errorcode == -1)
							{
								//交易密码错误
								document.getElementById("paypasswordinfo-layout").style.display = "";
								document.getElementById("paypasswordinfo").innerHTML = "交易密码错误，无法提交订单！";
							}
							else
							{
								ShowAttention(data.message);
							}
							
							hideLoader();
							$('#submit-btn').removeClass('ui-disabled');
							
        	    			return;
						}
						else if (data.status == "paying")
						{
							var token_id = data.token_id;
							var url = "https://wap.tenpay.com/cgi-bin/wappayv2.0/wappay_gate.cgi?token_id=" + token_id;
							window.location.href = url;
							
							//hideLoader();
							//$('#submit-btn').removeClass('ui-disabled');
						}
						else
						{
							$.mobile.changePage("/index.php?r=cart/ordersuccessful&customer_id=" + customer_id + "&wxusername=" + wxusername + "&admin_id=" + admin_id + "&shop_id=" + shop_id, 'none', false, false);
						}
			        },
			        error: function(data){
			        	hideLoader();
						$('#submit-btn').removeClass('ui-disabled');
			        },
			    });
    		}
        },
    });	
}

