(function($,window,document,undefined){var pluginName="backgroundcover",defaults={image:null,safearea:"0%,0%,100%,100%",resizeInterval:250};function Plugin(element,options){this.$element=$(element);this._defaults=defaults;this._name=pluginName;this.settings=$.extend({},defaults,this.$element.data(),options);this.setOptions(this.settings);this.init()}Plugin.prototype={init:function(){var me=this;setInterval(function(){me._checkResize()},this.settings.resizeInterval)},setOptions:function(options){this.settings=$.extend({},defaults,this.$element.data(),options);if(typeof options.image!=="undefined"){this.setImage(options.image)}else{if(options.safearea){this.setSafearea(options.safearea)}}},_checkResize:function(){var width=this.$element.width(),height=this.$element.height();if(width!==this.elementLastWidth||height!==this.elementLastHeight){this.layout()}},setImage:function(image){var me=this,cssImage,found,img,src;this.image=image;if(!this.image){cssImage=this.$element.css("background-image");if(!cssImage){throw new Error("No background image available")}found=cssImage.match(/url\([\"\']?([^\"\']*)[\"\']?\)/i);if(!found){throw new Error("Background image could not be retrieved from CSS property")}this.image=found[1]}if(typeof this.$element.css("background-size")==="undefined"){this.mode="img";this.$img=$('<img src="'+this.image+'" />').css("position","absolute");if(this.$element.css("position")==="static"){this.$element.css("position","relative")}this.$element.css("background-image","none").css("overflow","hidden").prepend(this.$img)}else{this.mode="css";this.$element.css("background-image","url("+this.image+")")}this.loaded=false;img=new Image;function _onload(img){me.imageWidth=img.width;me.imageHeight=img.height;me.loaded=true;me.setSafearea(me.settings.safearea)}img.onload=function(){_onload(this)};src=this.image;if(navigator.userAgent.match(/msie/i)){src+="?"+(new Date).valueOf()}img.src=src;if(img.complete){_onload(img)}},setSafearea:function(safearea){safearea=safearea||defaults.safearea;this.settings.safearea=safearea;if(!this.loaded){return}var safe=safearea.split(","),absSize=function(size,base){if(typeof size==="number"){return size}if(typeof size.trim==="function"){size=size.trim()}if(size.charAt(size.length-1)==="%"){var percentage=parseFloat(size);return Math.round(percentage/100*base)}return Math.round(parseFloat(size))};this.safearea={x1:absSize(safe[0],this.imageWidth),y1:absSize(safe[1],this.imageHeight),x2:absSize(safe[2],this.imageWidth),y2:absSize(safe[3],this.imageHeight)};this.layout()},layout:function(){if(!this.loaded){return}var nodeW=this.$element.width(),nodeH=this.$element.height(),nodeAspect=nodeW/nodeH,x1=this.safearea.x1,y1=this.safearea.y1,x2=this.safearea.x2,y2=this.safearea.y2,safeW=x2-x1,safeH=y2-y1,w=this.imageWidth,h=this.imageHeight,aspect=w/h,safeWPercentage=safeW/w,safeHPercentage=safeH/h,bgW,bgH,offsetX,offsetY,overX1,overY1,overX2,overY2,scale;if(nodeAspect>aspect){bgW=nodeW;bgH=Math.round(bgW/aspect);scale=bgW/w;if(safeH*scale>nodeH){bgH=Math.round(nodeH/safeHPercentage);bgW=Math.round(bgH*aspect);scale=bgW/w}}else{bgH=nodeH;bgW=Math.round(bgH*aspect);scale=bgW/w;if(safeW*scale>nodeW){bgW=Math.round(nodeW/safeWPercentage);bgH=Math.round(bgW/aspect);scale=bgW/w}}offsetY=(bgH-nodeH)/2;offsetX=(bgW-nodeW)/2;overY1=y1*scale-offsetY;overY2=bgH-y2*scale-offsetY;if(overY1<0){offsetY+=overY1}else if(overY2<0){offsetY-=overY2}overX1=x1*scale-offsetX;overX2=bgW-x2*scale-offsetX;if(overX1<0){offsetX+=overX1}else if(overX2<0){offsetX-=overX2}offsetX=Math.round(-offsetX);offsetY=Math.round(-offsetY);this.elementLastWidth=nodeW;this.elementLastHeight=nodeH;this._update(bgW,bgH,offsetX,offsetY)},_update:function(width,height,offsetX,offsetY){if(this.mode==="css"){this.$element.css("background-position",offsetX+"px "+offsetY+"px").css("background-size",width+"px "+height+"px")}else if(this.mode==="img"){this.$img.css("width",width+"px").css("height",height+"px").css("top",offsetY+"px").css("left",offsetX+"px")}}};$.fn[pluginName]=function(options){return this.each(function(){if(!$.data(this,pluginName)){$.data(this,pluginName,new Plugin(this,options))}else{$.data(this,pluginName).setOptions(options)}})}})($,window,document);