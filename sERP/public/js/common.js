
//===========================工具类函数
//选取元素
function $(obj){
	return typeof obj=='object'?obj:document.getElementById(obj);
}


//json转换函数
function getJson(str){
	return eval("("+str+")");
}

//调试函数
function n(s){
	console.log(s);
}

//给obj增加事件的自定义函数：兼容IE/chrome/ff
function myAddEvent(obj,ev,fn){
	if(obj.addEventListener){
		//ff:addEventListener
		obj.addEventListener(ev,fn,false);
	}else{
		//IE:attachEvent
		obj.attachEvent('on'+ev,fn);
	}
}



//=========================================特定函数
//加入到dom中

//展示复杂的dom结构
	function show(obj, oParent){
		for(var key in obj){
			if(obj[key].length==0){continue;}//如果长度为0，则直接跳过
			//1.组装obj
			var oP=document.createElement('p');
			oP.innerHTML=key=='status'?'今天签到时间':'今天花费';
			var oBox=document.createElement('div');
			oBox.setAttribute('class','box');
			
			oBox.appendChild(oP);
			//2.获取dom
			var oUl=getDomUl(obj[key]);
			oBox.appendChild(oUl);
			
			oParent.appendChild(oBox);
		}
	}
	
	//获得ul的dom
	function getDomUl(obj,showDelBtn){
		var showDelBtn=showDelBtn==undefined?true:showDelBtn;
		var oUl=document.createElement('ul');
		for(var i=0;i<obj.length;i++){
			var oLi=getDomLi(obj[i],showDelBtn);
			oUl.appendChild(oLi);
		}
		
		return oUl;
	}
	//获得li的dom
	function getDomLi(obj,showDelBtn){
		//大标签
		var oLi=document.createElement('li');
		//时间
		var oB=document.createElement('b');
		oB.innerHTML=obj['add_time'];
		oLi.appendChild(oB);
		//花费的类别
		if(obj['category']!=undefined){
			//路费
			var cate=['','路费','住宿'];
			var oSpan0=document.createElement('span');
			oSpan0.innerHTML=cate[ obj['category'] ];
			oLi.appendChild(oSpan0);
		}
		
		//花费的数额
		var oSpan=document.createElement('span');
		if(obj['status']==undefined){
			oSpan.innerHTML=obj['fee']+' 元';
		}else{
			oSpan.innerHTML=obj['status'];
		}
		oLi.appendChild(oSpan);
		//删除按钮
		if(obj['category']!=undefined){
			if(showDelBtn){
				var oBtnSpan=document.createElement('span');
				var oBtn=document.createElement('a');
				oBtn.innerHTML='删除';
				oBtn.setAttribute('href','javascript:del('+obj['id']+')');
				oBtnSpan.appendChild(oBtn);
				oLi.appendChild(oBtnSpan);
			}
		}
		
		return oLi;
	}

//删除花费	
function del(id){
	//
	var isCon=confirm('确定要删除该条记录吗？');
	if(isCon){
		var oForm=document.createElement('form');
		oForm.setAttribute('action','index.php?a=delMoney&id='+id);
		oForm.setAttribute('method','post');
		var oSend=document.createElement('input');
		oSend.setAttribute('name','send');
		oSend.setAttribute('value','delMoney');
		oForm.appendChild(oSend);
		oForm.submit();
	}
}