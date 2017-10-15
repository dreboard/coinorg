// SpryPopupDialog.js - version 0.1 - Spry Pre-Release 1.6.1
var Spry;
if (!Spry) Spry = {};
if (!Spry.Widget) Spry.Widget = {};

Spry.Widget.BrowserSniff = function(){
	var b = navigator.appName.toString();
	var up = navigator.platform.toString();
	var ua = navigator.userAgent.toString();
	this.mozilla = this.ie = this.opera = this.safari = false;
	var re_opera = /Opera.([0-9\.]*)/i;
	var re_msie = /MSIE.([0-9\.]*)/i;
	var re_gecko = /gecko/i;
	var re_safari = /(applewebkit|safari)\/([\d\.]*)/i;
	var r = false;
	if ( (r = ua.match(re_opera))) {
		this.opera = true;
		this.version = parseFloat(r[1]);
	} else if ( (r = ua.match(re_msie))) {
		this.ie = true;
		this.version = parseFloat(r[1]);
	} else if ( (r = ua.match(re_safari))) {
		this.safari = true;
		if(parseFloat(r[2]) < 420)
			this.version = 2;
		else
			this.version = 3;		
	} else if (ua.match(re_gecko)) {
		var re_gecko_version = /rv:\s*([0-9\.]+)/i;
		r = ua.match(re_gecko_version);
		this.mozilla = true;
		this.version = parseFloat(r[1]);
	}
	this.windows = this.mac = this.linux = false;
	this.Platform = ua.match(/windows/i) ? "windows" :
					(ua.match(/linux/i) ? "linux" :
					(ua.match(/mac/i) ? "mac" :
					ua.match(/unix/i)? "unix" : "unknown"));
	this[this.Platform] = true;
	this.v = this.version;

	if (this.safari && this.mac && this.mozilla) {
		this.mozilla = false;
	}
};
Spry.is = new Spry.Widget.BrowserSniff();
Spry.Widget.PopupDialog = function(popupdialog_element, options){
	options = Spry.Widget.Utils.firstValid(options, {});
	this.init(popupdialog_element, options);
};
Spry.Widget.PopupDialog.prototype.init = function(popupdialog_element, options){
	var Utils = Spry.Widget.Utils;
	this.popupdialogElement = Utils.getElement(popupdialog_element);

	if (typeof this.popupdialogElement == 'undefined' || !this.popupdialogElement){
		this.showError('The element "' + popupdialog_element + '" do not exists in the page');
		return false;
	}
	this.currentState = 0;
	this.useEffect = false;
	this.shieldListenersAttached = false;
	this.bodySizeListenersAttached = false;
	this.shieldExists = false;
	Utils.setOptions(this, options);
	this.popupdialogElement.style.position = 'absolute';
	this.popupdialogElement.style.top = '0px';
	this.popupdialogElement.style.left = '-10000px';
	this.popupdialogElement.style.zindex = "500";
	this.popupdialogElement.style.height = "100%";
	this.popupdialogElement.style.width = "100%";
	this.popupVPosition = "middle";
	this.popupHPosition = "center";
	this.shieldLayer = document.createElement('div');

	if(typeof this.focusElement != 'undefined' && this.focusElement.length > 0){
		if(this.focusElement.indexOf("#")==0){
			this.focusElement = this.focusElement.substring(1);
		}
	}
	this.animator = null;
	
	if (this.useEffect){
			switch (this.useEffect.toString().toLowerCase()){
				case 'fade': this.useEffect = 'Fade'; break;
				default:
					this.useEffect = false;
			}
	}
	var box ="";
	var handle ="";
	this.popupbox_elements=this.popupdialogElement.getElementsByTagName('*');
	for (var i=0; i < this.popupbox_elements.length; i++){
		 if(this.popupbox_elements[i].className=="popupBox"){
			this.popupBox = box = this.popupbox_elements[i];
			this.popupBox.style.position = "absolute";
			if(this.popupVPosition=="middle"){
				if(Spry.is.ie && (Spry.is.version == '6' || Spry.is.version == '7')){
					this.popupBox.style.top=((screen.availHeight-180-this.popupBox.offsetHeight)/2)+"px";
				}else{
					this.popupBox.style.top=((this.popupdialogElement.offsetHeight-this.popupBox.offsetHeight)/2)+"px";
				}
			}
			if(this.popupHPosition=="center"){
				this.popupBox.style.left=((this.popupdialogElement.offsetWidth-this.popupBox.offsetWidth)/2)+"px";
			}
		 }
		if(this.popupbox_elements[i].className=="popupBar"){
			handle = this.popupbox_elements[i];
		 }
	}
	if(this.allowDrag){
		this.initDragPopUp();
		if(box!="" && handle!=""){
			handle.style.cursor="move";
			MoveEngine.init(handle, box);
		}
	}
};
Spry.Widget.PopupDialog.addLoadListener = function(handler){
	if (typeof window.addEventListener != 'undefined')
		window.addEventListener('load', handler, false);
	else if (typeof document.addEventListener != 'undefined')
		document.addEventListener('load', handler, false);
	else if (typeof window.attachEvent != 'undefined')
		window.attachEvent('onload', handler);
};
Spry.Widget.PopupDialog.prototype.showPopupDialog = function(){
		this.currentState = 1;
		var bodyElement = (Spry.is.safari) ? document.body : document.documentElement;
		this.popupdialogElement.style.visibility = 'hidden';
		this.popupdialogElement.style.left = '0px';
		this.popupdialogElement.style.zIndex = '9999';
		this.popupdialogElement.style.display = 'block';
		this.popupdialogElement.style.top = bodyElement.scrollTop+"px";		
		this.createShieldLayer(this.popupdialogElement);
		var shieldListener = Spry.Widget.Utils.addEventListener;
		var bodySizeListener = Spry.Widget.Utils.addEventListener;
		var self = this;
		if(!this.modal){
			if(!this.shieldListenersAttached){
			shieldListener((Spry.is.ie && Spry.is.version == '6')?this.shieldLayer:this.popupdialogElement, 'click', function(e) {
				var toppos=(Spry.is.ie && (Spry.is.version == '6' || Spry.is.version == '7'))?((parseInt(self.popupBox.style.top)+self.popupBox.offsetTop)/2):self.popupBox.offsetTop;
				if((e.clientX<self.popupBox.offsetLeft) || (e.clientX>self.popupBox.offsetLeft+self.popupBox.offsetWidth) || (e.clientY<toppos) || (e.clientY>toppos+self.popupBox.offsetHeight)){self.displayPopupDialog(false);};return true;}, false);
				this.shieldListenersAttached=true;
			}
		}
		if(!this.bodySizeListenersAttached){
			bodySizeListener(window, 'resize', function(e) {
				self.sizeShieldLayer();
				if(bodyElement.scrollHeight<=self.shieldLayer.offsetHeight+10){self.popupdialogElement.style.top = bodyElement.scrollTop +"px"}else{self.popupdialogElement.style.top = "0px";};
				self.popupBox.style.left=((self.popupdialogElement.offsetWidth-self.popupBox.offsetWidth)/2)+"px";return true;}, false);
				this.bodySizeListenersAttached=true;
		}
		if(!this.allowScroll){
			if(Spry.is.mozilla){var ff_top=bodyElement.scrollTop;}
			document.body.parentNode.style.overflow="hidden";
			self.sizeShieldLayer();
			if(Spry.is.mozilla){bodyElement.scrollTop=ff_top;}
		}else{
			document.body.parentNode.style.overflow="";
			bodySizeListener(window, 'scroll', function(e) {self.sizeShieldLayer();if(bodyElement.scrollHeight<=self.shieldLayer.offsetHeight+10){self.popupdialogElement.style.top = bodyElement.scrollTop +"px"; return true;}}, false);
		}
		if(Spry.is.ie && Spry.is.version == '6')
			this.createIframeLayer(this.popupdialogElement);
		
		if (this.useEffect){
			if (typeof this.showEffect == 'undefined')
				this.showEffect = new Spry.Widget.PopupDialog[this.useEffect](this.popupdialogElement, {from: 0, to: 1});

			this.showEffect.start();
		}
		else
			this.currentState = 0;
			this.popupdialogElement.style.visibility = 'visible';
			if(typeof(this.focusElement)!='undefined' && this.focusElement!="" && document.getElementById(this.focusElement)!=null)
				document.getElementById(this.focusElement).focus();
	
};
Spry.Widget.PopupDialog.prototype.hidePopupDialog = function(quick){
		this.currentState = 2;
		if(Spry.is.mozilla){var ff_top=document.documentElement.scrollTop;}
		this.removeShieldLayer();
		document.body.parentNode.style.overflow="";
		if(Spry.is.safari){scrollBy(0, 1);scrollBy(0,-1);}
		if (this.useEffect && !quick){
				if (typeof this.hideEffect == 'undefined')
					this.hideEffect = new Spry.Widget.PopupDialog[this.useEffect](this.popupdialogElement, {from: 1, to: 0});
	
				this.hideEffect.start();
		}else{
			if (typeof this.showEffect != 'undefined')
				this.showEffect.stop();
				this.popupdialogElement.style.visibility = 'hidden';
				this.popupdialogElement.style.left="-10000px";
				this.currentState = 0;
		}
		if(Spry.is.mozilla){document.documentElement.scrollTop=ff_top;}
		if(Spry.is.ie && Spry.is.version == '6')
			this.removeIframeLayer(this.popupdialogElement);
			
};
Spry.Widget.PopupDialog.prototype.displayPopupDialog = function(show) {
	if (this.popupdialogElement){
		if(this.currentState == 0){
			if (show){
				this.currentState = 1;
				if (this.hideTimer){
					clearInterval(this.hideTimer);
					delete(this.hideTimer);
				}
				var self = this;
				this.showTimer = setTimeout(function(){self.showPopupDialog()}, 0);
			}else{
				this.currentState = 2;
				if (this.showTimer){
					clearInterval(this.showTimer);
					delete(this.showTimer);
				}
				var self = this;
				this.hideTimer = setTimeout(function(){self.hidePopupDialog();}, 0);
			}
		}
	}
};
Spry.Widget.PopupDialog.prototype.destroy = function(){
	for (var k in this)
	{
		try{
				if (typeof this.k == 'object' && typeof this.k.destroy == 'function') this.k.destroy();
				delete this.k;
			}catch(err){}
	}
};
Spry.Widget.PopupDialog.prototype.checkDestroyed = function(){
	if (!this.popupdialogElement || this.popupdialogElement.parentNode == null)
		return true;

	return false;
};
Spry.Widget.PopupDialog.prototype.createIframeLayer = function(popupdialog){
	if (typeof this.iframeLayer == 'undefined'){
		var layer = document.createElement('iframe');
		layer.tabIndex = '-1';
		layer.src = 'javascript:"";';
		layer.scrolling = 'no';
		layer.frameBorder = '0';
		layer.className = 'iframePopupDialog';
		popupdialog.parentNode.appendChild(layer);
		this.iframeLayer = layer;
	}
	this.iframeLayer.style.left = popupdialog.offsetLeft + 'px';
	this.iframeLayer.style.top = popupdialog.offsetTop + 'px';
	this.iframeLayer.style.width = popupdialog.offsetWidth + 'px';
	this.iframeLayer.style.height = popupdialog.offsetHeight + 'px';
	this.iframeLayer.style.display = 'block';
};
Spry.Widget.PopupDialog.prototype.removeIframeLayer =  function(popupdialog){
	if (this.iframeLayer)
		this.iframeLayer.style.display = 'none';
};
Spry.Widget.PopupDialog.prototype.createShieldLayer = function(popupdialog){
	if(!this.shieldExists){
		this.shieldLayer.tabIndex = '-1';
		this.shieldLayer.className = 'shieldPopupDialog';
		this.shieldLayer.innerHTML="&nbsp;";
		this.shieldLayer.style.zindex = '499';
		this.shieldLayer.style.position = 'absolute';
		this.shieldLayer.style.top = '0px';
		popupdialog.parentNode.appendChild(this.shieldLayer);
	}
	this.shieldLayer.style.left = '0px';
	this.shieldExists=true;
	this.shieldLayer.style.display = 'inline';
	this.sizeShieldLayer();
};
Spry.Widget.PopupDialog.prototype.removeShieldLayer =  function(){
	if (this.shieldExists){
		this.shieldLayer.style.left="-10000px";
	}
};
Spry.Widget.PopupDialog.prototype.sizeShieldLayer = function(){
	var bodyElement = (Spry.is.safari) ? document.body : document.documentElement;
	if(Spry.is.ie && (Spry.is.version == '6' || Spry.is.version == '7')){
		this.shieldLayer.style.height = Number(bodyElement.offsetHeight)+"px";
	}else{
		this.shieldLayer.style.height = '100%';

	}
	this.shieldLayer.style.width = Number(bodyElement.scrollWidth)+"px";
	if(bodyElement.scrollHeight>this.shieldLayer.offsetHeight){
		this.shieldLayer.style.height = Number(bodyElement.scrollHeight)+"px";
	}
}

Spry.Widget.PopupDialog.prototype.initDragPopUp = function(){
	var popupdialogElement=this.popupdialogElement;
	var shieldLayer=this.shieldLayer;
	var bodyElement = (Spry.is.safari) ? document.body : document.documentElement;
	MoveEngine = {
	obj : null,
	init : function(o, oBox){
		o.onmousedown	= MoveEngine.start;
		o.box = oBox && oBox != null ? oBox : o ;
		o.xMapper = null;
		o.yMapper = null;
		o.box.onDragStart	= new Function();
		o.box.onDragEnd	= new Function();
		o.box.onDrag		= new Function();
	},
	start : function(e){
		var o = MoveEngine.obj = this;
		o.minX	= 0;
		o.maxX	= screen.availWidth-o.box.offsetWidth-34;
		o.minY = 0;
		o.maxY	= popupdialogElement.offsetHeight-o.box.offsetHeight-20;
		if(Spry.is.ie && (Spry.is.version == '6' || Spry.is.version == '7')){
			o.maxY=screen.availHeight-o.box.offsetHeight-160;
		}
		e = MoveEngine.fixE(e);
		var y = parseInt(o.box.style.top);
		var x = parseInt(o.box.style.left);
		o.box.onDragStart(x, y);
		o.lastMouseX	= e.clientX;
		o.lastMouseY	= e.clientY;
		if (o.minX != null)	o.minMouseX	= e.clientX - x + o.minX;
		if (o.maxX != null)	o.maxMouseX	= o.minMouseX + o.maxX - o.minX;
		if (o.minY != null)	o.minMouseY	= e.clientY - y + o.minY;
		if (o.maxY != null)	o.maxMouseY	= o.minMouseY + o.maxY - o.minY;
		document.onmousemove = MoveEngine.drag;
		document.onmouseup = MoveEngine.end;
		return false;
	},
	drag : function(e){
		e = MoveEngine.fixE(e);
		var o = MoveEngine.obj;
		var ey	= e.clientY;
		var ex	= e.clientX;
		var y = parseInt(o.box.style.top);
		var x = parseInt(o.box.style.left);
		var nx, ny;
		if (o.minX != null) ex = Math.max(ex, o.minMouseX);
		if (o.maxX != null) ex = Math.min(ex, o.maxMouseX);
		if (o.minY != null) ey = Math.min(ey, o.maxMouseY);
		if (o.maxY != null) ey = Math.max(ey, o.minMouseY);
		nx = x + (ex - o.lastMouseX);
		ny = y + (ey - o.lastMouseY);
		if (o.xMapper)		nx = o.xMapper(y)
		else if (o.yMapper)	ny = o.yMapper(x)
		
		o.box.style.left = nx + "px";
		o.box.style.top = ny + "px";
		o.lastMouseX	= ex;
		o.lastMouseY	= ey;
		o.box.onDrag(nx, ny);
		shieldLayer.style.width = Number(bodyElement.scrollWidth)+"px";
		return false;
	},
	end : function(){
		document.onmousemove = null;
		document.onmouseup   = null;
		MoveEngine.obj.box.onDragEnd(	parseInt(MoveEngine.obj.box.style.left), 
									parseInt(MoveEngine.obj.box.style.top));
		MoveEngine.obj = null;
	},
	fixE : function(e){
		if (typeof e == 'undefined') e = window.event;
		if (typeof e.layerX == 'undefined') e.layerX = e.offsetX;
		if (typeof e.layerY == 'undefined') e.layerY = e.offsetY;
		return e;
	}
};
}

Spry.Widget.PopupDialog.prototype.showError = function(msg){
	alert('Spry.Widget.PopupDialog ERR: ' + msg);
};


Spry.Widget.PopupDialog.Animator = function(element, opts){
	this.timer = null;
	this.fps = 60;
	this.duration = 500;
	this.startTime = 0;
	this.transition = Spry.Widget.PopupDialog.Animator.defaultTransition;
	this.onComplete = null;
	if (typeof element == 'undefined') return;
	this.element = Spry.Widget.Utils.getElement(element);
	Spry.Widget.Utils.setOptions(this, opts, true);
	this.interval = this.duration / this.fps;
	this.popupbox_elements=this.element.getElementsByTagName('*');
	for (var i=0; i < this.popupbox_elements.length; i++){
		 if(this.popupbox_elements[i].className=="popupBox"){
			this.popupBox = this.popupbox_elements[i];
		 }
	}
};
Spry.Widget.PopupDialog.Animator.defaultTransition = function(time, begin, finish, duration) { time /= duration; return begin + ((2 - time) * time * finish); };

Spry.Widget.PopupDialog.Animator.prototype.start = function(){
	var self = this;
	this.startTime = (new Date).getTime();
	this.beforeStart();
	this.timer = setInterval(function() { self.stepAnimation(); }, this.interval);
};
Spry.Widget.PopupDialog.Animator.prototype.stop = function(){
	if (this.timer)
		clearTimeout(this.timer);
		eval(this.element.id+".currentState = 0");

	this.timer = null;
};
Spry.Widget.PopupDialog.Animator.prototype.stepAnimation = function(){};
Spry.Widget.PopupDialog.Animator.prototype.beforeStart = function(){
	if (this.timer)
		clearTimeout(this.timer);

};
Spry.Widget.PopupDialog.Animator.prototype.destroy = function(){
	for (var k in this)
		try
		{
			delete this.k;
		}catch(err){}
};
Spry.Widget.PopupDialog.Fade = function(element, opts){
	Spry.Widget.PopupDialog.Animator.call(this, element, opts);
	if (Spry.is.ie)
		this.origOpacity = this.element.style.filter;
	else
		this.origOpacity = this.element.style.opacity;
};
Spry.Widget.PopupDialog.Fade.prototype = new Spry.Widget.PopupDialog.Animator();
Spry.Widget.PopupDialog.Fade.prototype.constructor = Spry.Widget.PopupDialog.Fade;
Spry.Widget.PopupDialog.Fade.prototype.stepAnimation = function(){
	var curTime = (new Date).getTime();
	var elapsedTime = curTime - this.startTime;
	var i, obj;
	if (elapsedTime >= this.duration)
	{
		this.beforeStop();
		this.stop();
		return;
	}
	var ht = this.transition(elapsedTime, this.from, this.to - this.from, this.duration);
	if (Spry.is.ie)
	{
		var filter = this.popupBox.currentStyle.filter.replace(/alpha\s*\(\s*opacity\s*=\s*[0-9\.]{1,3}\)/, '');
		this.popupBox.style.filter = filter+"alpha(opacity=" + parseInt(ht * 100, 10) + ")";
	}
	else
	{
		this.element.style.opacity = ht;
	}
	this.element.style.visibility = 'visible';
	this.element.style.display = 'block';
};
Spry.Widget.PopupDialog.Fade.prototype.beforeStop = function(){
	if (this.from > this.to)
		eval(this.element.id+".hidePopupDialog(true)");

	if (Spry.is.mozilla)
		this.element.style.filter = this.origOpacity;
	else
		this.element.style.opacity = this.origOpacity;
};
if (!Spry.Widget.Utils)	Spry.Widget.Utils = {};
Spry.Widget.Utils.setOptions = function(obj, optionsObj, ignoreUndefinedProps){
	if (!optionsObj)
		return;
	for (var optionName in optionsObj)
	{
		if (ignoreUndefinedProps && optionsObj[optionName] == undefined)
			continue;
		obj[optionName] = optionsObj[optionName];
	}
};
Spry.Widget.Utils.getElement = function(ele){
	if (ele && typeof ele == "string")
		return document.getElementById(ele);
	return ele;
};
Spry.Widget.Utils.firstValid = function(){
	var ret = null;
	var a = Spry.Widget.Utils.firstValid;
	for(var i=0; i< a.arguments.length; i++)
	{
		if (typeof(a.arguments[i]) != 'undefined')
		{
			ret = a.arguments[i];
			break;
		}
	}
	return ret;
};
Spry.Widget.Utils.addEventListener = function(element, eventType, handler, capture){
	try{
		if (element.addEventListener)
			element.addEventListener(eventType, handler, capture);
		else if (element.attachEvent)
			element.attachEvent("on" + eventType, handler);
	}
	catch (e) {}
};