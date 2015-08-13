//后台导航栏和二级菜单变色事件
$(document).ready(function(){
	href = location.href;
	href = decodeURIComponent(href);
	alllianjie = $("#nav li")
	//alert(href);
	for(i=0;i<alllianjie.length;i++)
	{
		lianjie=$(alllianjie[i]);
		//alert(lianjie.find('.nav-li').attr('nav'));
		if(href.indexOf(lianjie.find('.nav-li').attr('nav'))>=0)
		{	
			//alert(lianjie.find('.nav-li').attr('nav'));
			lianjie.find('div').css('background-color','#f7a336');
		}
	}
	alllianjie = $(".menu ul a");
	// alert(alllianjie.attr('href'));
	for(i=0;i<alllianjie.length;i++)
	{	
		lianjie=$(alllianjie[i]);
		//alert(lianjie.attr("href"));
		//alert(lianjie.find('a').attr('href'));
		if(href.indexOf(lianjie.find('li').text())>=0||href.indexOf(lianjie.attr("href"))>=0)
		{
			lianjie.find('li').css('color','#f7a336');
			lianjie.find('li').css("border-bottom",'5px solid #f7a336');
		}
	}
	
});

//上传图片
function uploadFile(){
	if(!$('#uploadImage').val){
		return;
	}
	$('#uploadfile').submit();
	// if(window.XMLHttpRequest){
 //        imageAjax = new XMLHttpRequest();
 //    }else{
 //        imageAjax = new ActiveXObject("Microsoft.XMLHTTP");
 //    }
 //    imageAjax.open('POST','admin/image/saveImage', true);  
 //    imageAjax.send(image);  
 //    imageAjax.onreadystatechange = function(){ 
 //        if(imageAjax.readyState == 4){ 
 //            if(imageAjax.status == 200){  
 //            	alert(imageAjax.responseText)
 //            	$('.uploadImage').attr("disabled","none");
	// 			$(".uploadImage").text("上传图片");
 //            }else{
 //                alert("失败")
 //            	$('.uploadImage').attr("disabled","none");
	// 			$(".uploadImage").text("上传图片");
 //            }
 //        }
 //    };
 		
}

//控制slideshow顺序的上移和下移
$(document).ready(function(){
	$('.moveUp').click(function(){
		clickingObj = $(this).parent().parent();
		previousObj = $(this).parent().parent().prev();
		if(previousObj!=null&&1==previousObj.find('.bianhao').length)
		{		
			  previousObj.find('.sort').text(parseInt(previousObj.find('.sort').text())+1);
			  clickingObj.find('.sort').text(parseInt(clickingObj.find('.sort').text())-1);
			  previousObj.before(clickingObj);
		}
	});

	$('.moveDown').click(function(){
		clickingObj = $(this).parent().parent();
		nextObj = $(this).parent().parent().next();
		if(nextObj!=null&&1==nextObj.find('.bianhao').length)
		{		
			  nextObj.find('.sort').text(parseInt(nextObj.find('.sort').text())-1);
			  clickingObj.find('.sort').text(parseInt(clickingObj.find('.sort').text())+1);
			  nextObj.after(clickingObj);
		}
	});
});

//提交slideshow的设置
$(document).ready(function(){
	$("#saveSettings").click(function(){
		allsort = $(".sort");
		jsonSettings=[];
		for(i=0 ; i<allsort.length;i++)
		{	
			sort=$(allsort[i]);
			jsonSettings[i]={};
			jsonSettings[i]['id']=sort.attr('imageid');
			jsonSettings[i]['sort']=sort.text();
		}
		//alert(jsonSettings[3]['sort']);
		jsonSettings=JSON.stringify(jsonSettings);
		var action = 'index.php/Admin/SlideShow/saveSettings';
		ajaxJson(action,jsonSettings);
	   });
});

//表单检查
$(document).ready(function(){
	$('.checkinput').click(function(){
		allInput = $('.edit');
		for(i=0;i<allInput.length;i++)
		{
			input = $(allInput[i]);
			if(!input.val())
			{
				alert(input.attr('name')+"不能为空");
				return;
			}
		}
		$('form').submit();
	});
});

//微信文本信息
$(document).ready(function(){
	$('.check-weixin-text').click(function(){
		allInput = $('#submit .edit');
		for(i=0;i<allInput.length;i++)
		{
			input = $(allInput[i]);
			if(!input.val())
			{
				alert(input.attr('name')+"不能为空");
				return;
			}
		}
		$('#change-info').submit();
	});
});

//微信图文信息
$(document).ready(function(){
	$('.check-weixin-news').click(function(){
		allInput = $('#editnewsform .edit');
		for(i=0;i<allInput.length;i++)
		{
			input = $(allInput[i]);
			if(!input.val())
			{
				alert(input.attr('name')+"不能为空");
				return;
			}
		}
		$('#editnewsform').submit();
	});
});

//密码输入框点击切换类型
$(document).ready(function(){
	$('.clearaway').click(function(){
		$(this).val('');
	});
	$('.lock').focus(function(){
		$(this).val('');
		$(this).attr('type','password');
		$(this).attr('onkeypress','if (event.keyCode == 13) { $(".uploadbutton").trigger("click");}');
	});
});


//点击出现文件修改名称框，微信文本信息编辑框，各种文本编辑框
$(document).ready(function(){
	$('.changedownload').click(function(){
		 $('.black-overlay').css('display','block');
		// var top  = ($('#submit').height())/2;
		var left = (1170-$('#submit').width())/2;
		// alert(top+"asdas"+left);
		$('#submit').css('left',left);
		$('#submit').css('top','20px');
		$('#change-info').attr('action',$(this).attr('action'));
		$('#submit').show();
	});

	$('#cancel').click(function(){
		$('#submit').hide();
		$('.black-overlay').css('display','none');
	});
});

//点击出现微信图文编辑框
$(document).ready(function(){
	$('.editnews').click(function(){
		 $('.black-overlay').css('display','block');
		var top  = ($(window).height()-$('#editnews').height())/2;
		var left = ($(window).width()-$('#editnews').width())/2;
		// alert(top+"asdas"+left);
		$('#editnews').css('left',left);
		$('#editnews').css('top',top);
		$('#editnewsform').attr('action',$(this).attr('action'));
		$('#editnews').show();
	});

	$('#cancel-editnews').click(function(){
		$('#editnews').hide();
		$('.black-overlay').css('display','none');
	});
});


//页面跳转

$(document).ready(function(){
	$('.jumpto').click(function(){
		var page 	= $('#pageTurn').val();
		var pageNum = parseInt($('#pageNum').text());
		if(page>pageNum){
			alert('输入的页数超过最大页数');
			return;
		}
		pageHref = "/p/"+page+".html";
		reg = new RegExp('/p/[0-9]*.html');
		href = location.href;
		//alert(reg.test(href));
		if(reg.test(href)){
			href = href.replace(reg,pageHref);
		}
		else{

			href = href.replace('.html',pageHref);
		}
		location.href = href;
	});
});


//友情链接的加行
function addRow(){
	var newRow = '<tr class="linkinfo">';
	newRow += '<td><input name="name" class="edit name"/></td>';
	newRow += '<td><input name="link" class="edit link"/></td>';
	newRow += '<td><select name="status"><option select>禁用</option><option>启用</option><select></td>';
	newRow += '<td><button class="operate" onclick="$(this).parent().parent().remove();">移除</button></td>';
	newRow += '</tr>';
    $('#friendLink').append(newRow);  
}




//获取友情链接的json字符串
$(document).ready(function(){
	$('#submit-friendLink').click(function(){
		var allInput = $('.edit');
		for(i=0;i<allInput.length;i++)
		{
			input = $(allInput[i]);
			if(!input.val())
			{
				alert(input.attr('name')+"不能为空");
				return;
			}
		}
		var allTrTag = $('.linkinfo');
		var links = [];
		for( i=0 ; i<allTrTag.length ; i++){
			var link = $(allTrTag[i]);
			links[i] = {};
			links[i]['name']   = link.find('.name').val();
			links[i]['link']   = link.find('.link').val();
			links[i]['status'] = link.find('select').val();
		}
		var jsonSettings = JSON.stringify(links);
		var action = $('#friendLink').attr('action');
		ajaxJson(action,jsonSettings);
	});
});


//ajax 传输json数据
function ajaxJson(action,json){
	if(window.XMLHttpRequest)
		{
        	Ajax = new XMLHttpRequest();
    	}else
    	{
        	Ajax = new ActiveXObject("Microsoft.XMLHTTP");
   		}
    	Ajax.open('POST',action);  
    	Ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    	Ajax.send("jsonSettings="+json);  
    	Ajax.onreadystatechange = function()
    	{ 
	        if(Ajax.readyState == 4)
	        { 
	            if(Ajax.status == 200)
	            {  
	            	alert(Ajax.responseText);
	            }else
	            {
	                alert("失败");
	            }
	        }
	    }
}


//修改密码
function modifyPassword(){
	allInput = $('.edit');
	for(i=0;i<allInput.length;i++)
	{
		input = $(allInput[i]);
		if(!input.val())
		{
			alert(input.attr('chinaname')+"不能为空");
			return;
		}
	}
	if($('#firstPassword').val()!=$('#secondPassword').val()){
		alert("两次输入的密码不一致");
		return;
	}
	$('form').submit();
}

//删除按钮的再次确认
$(document).ready(function(){
		$('.delete').click(function(){
		var url = $(this).attr('deleteUrl');
		if(confirm('确认删除吗？')){
			location.href = url;
		}
		else{
			return;
		}
	});
});

