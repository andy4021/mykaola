//

//功能：阻止浏览器默认行为的封装
//参数：事件对象
//返回值：无

function preventDefault1809(evt) {
	if(evt.returnValue){
		evt.returnValue = false;
	}else{
		evt.preventDefault();
	}
}

//功能：绑定事件
//参数：
	//事件源
	//事件类型名，不带on
	//事件处理函数,
	//是否冒泡
//返回值：无

function addEvent1809(domObj,eventType,func,isBubble){
	if(domObj.addEventListener){
		domObj.addEventListener(eventType,func,isBubble);
	}else if(domObj.attachEvent){
		domObj.attachEvent('on'+eventType,func);
	}else{
		domObj['on'+eventType] = func;
	}
}

//当对象的属性是变量时，不能用点，只能用方括号
/*
var obj = {
	id:'007'
}
obj.id;
var temp = "id";
obj[temp]
*/

