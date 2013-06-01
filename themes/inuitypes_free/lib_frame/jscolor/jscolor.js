var jscolor={dir:"",bindClass:"color",binding:true,preloading:true,install:function(){jscolor.addEvent(window,"load",jscolor.init)},init:function(){if(jscolor.binding){jscolor.bind()}if(jscolor.preloading){jscolor.preload()}},getDir:function(){if(!jscolor.dir){var a=jscolor.detectDir();jscolor.dir=a!==false?a:"jscolor/"}return jscolor.dir},detectDir:function(){var c=location.href;var d=document.getElementsByTagName("base");for(var a=0;a<d.length;a+=1){if(d[a].href){c=d[a].href}}var d=document.getElementsByTagName("script");for(var a=0;a<d.length;a+=1){if(d[a].src&&/(^|\/)jscolor\.js([?#].*)?$/i.test(d[a].src)){var f=new jscolor.URI(d[a].src);var b=f.toAbsolute(c);b.path=b.path.replace(/[^\/]+$/,"");b.query=null;b.fragment=null;return b.toString()}}return false},bind:function(){var matchClass=new RegExp("(^|\\s)("+jscolor.bindClass+")\\s*(\\{[^}]*\\})?","i");var e=document.getElementsByTagName("input");for(var i=0;i<e.length;i+=1){var m;if(!e[i].color&&e[i].className&&(m=e[i].className.match(matchClass))){var prop={};if(m[3]){try{eval("prop="+m[3])}catch(eInvalidProp){}}e[i].color=new jscolor.color(e[i],prop)}}},preload:function(){for(var a in jscolor.imgRequire){if(jscolor.imgRequire.hasOwnProperty(a)){jscolor.loadImage(a)}}},images:{pad:[181,101],sld:[16,101],cross:[15,15],arrow:[7,11]},imgRequire:{},imgLoaded:{},requireImage:function(a){jscolor.imgRequire[a]=true},loadImage:function(a){if(!jscolor.imgLoaded[a]){jscolor.imgLoaded[a]=new Image();jscolor.imgLoaded[a].src=jscolor.getDir()+a}},fetchElement:function(a){return typeof a==="string"?document.getElementById(a):a},addEvent:function(a,c,b){if(a.addEventListener){a.addEventListener(c,b,false)}else{if(a.attachEvent){a.attachEvent("on"+c,b)}}},fireEvent:function(a,c){if(!a){return}if(document.createEvent){var b=document.createEvent("HTMLEvents");b.initEvent(c,true,true);a.dispatchEvent(b)}else{if(document.createEventObject){var b=document.createEventObject();a.fireEvent("on"+c,b)}else{if(a["on"+c]){a["on"+c]()}}}},getElementPos:function(c){var d=c,b=c;var a=0,f=0;if(d.offsetParent){do{a+=d.offsetLeft;f+=d.offsetTop}while(d=d.offsetParent)}while((b=b.parentNode)&&b.nodeName.toUpperCase()!=="BODY"){a-=b.scrollLeft;f-=b.scrollTop}return[a,f]},getElementSize:function(a){return[a.offsetWidth,a.offsetHeight]},getRelMousePos:function(b){var a=0,c=0;if(!b){b=window.event}if(typeof b.offsetX==="number"){a=b.offsetX;c=b.offsetY}else{if(typeof b.layerX==="number"){a=b.layerX;c=b.layerY}}return{x:a,y:c}},getViewPos:function(){if(typeof window.pageYOffset==="number"){return[window.pageXOffset,window.pageYOffset]}else{if(document.body&&(document.body.scrollLeft||document.body.scrollTop)){return[document.body.scrollLeft,document.body.scrollTop]}else{if(document.documentElement&&(document.documentElement.scrollLeft||document.documentElement.scrollTop)){return[document.documentElement.scrollLeft,document.documentElement.scrollTop]}else{return[0,0]}}}},getViewSize:function(){if(typeof window.innerWidth==="number"){return[window.innerWidth,window.innerHeight]}else{if(document.body&&(document.body.clientWidth||document.body.clientHeight)){return[document.body.clientWidth,document.body.clientHeight]}else{if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){return[document.documentElement.clientWidth,document.documentElement.clientHeight]}else{return[0,0]}}}},URI:function(a){this.scheme=null;this.authority=null;this.path="";this.query=null;this.fragment=null;this.parse=function(d){var c=d.match(/^(([A-Za-z][0-9A-Za-z+.-]*)(:))?((\/\/)([^\/?#]*))?([^?#]*)((\?)([^#]*))?((#)(.*))?/);this.scheme=c[3]?c[2]:null;this.authority=c[5]?c[6]:null;this.path=c[7];this.query=c[9]?c[10]:null;this.fragment=c[12]?c[13]:null;return this};this.toString=function(){var c="";if(this.scheme!==null){c=c+this.scheme+":"}if(this.authority!==null){c=c+"//"+this.authority}if(this.path!==null){c=c+this.path}if(this.query!==null){c=c+"?"+this.query}if(this.fragment!==null){c=c+"#"+this.fragment}return c};this.toAbsolute=function(e){var e=new jscolor.URI(e);var d=this;var c=new jscolor.URI;if(e.scheme===null){return false}if(d.scheme!==null&&d.scheme.toLowerCase()===e.scheme.toLowerCase()){d.scheme=null}if(d.scheme!==null){c.scheme=d.scheme;c.authority=d.authority;c.path=b(d.path);c.query=d.query}else{if(d.authority!==null){c.authority=d.authority;c.path=b(d.path);c.query=d.query}else{if(d.path===""){c.path=e.path;if(d.query!==null){c.query=d.query}else{c.query=e.query}}else{if(d.path.substr(0,1)==="/"){c.path=b(d.path)}else{if(e.authority!==null&&e.path===""){c.path="/"+d.path}else{c.path=e.path.replace(/[^\/]+$/,"")+d.path}c.path=b(c.path)}c.query=d.query}c.authority=e.authority}c.scheme=e.scheme}c.fragment=d.fragment;return c};function b(e){var c="";while(e){if(e.substr(0,3)==="../"||e.substr(0,2)==="./"){e=e.replace(/^\.+/,"").substr(1)}else{if(e.substr(0,3)==="/./"||e==="/."){e="/"+e.substr(3)}else{if(e.substr(0,4)==="/../"||e==="/.."){e="/"+e.substr(4);c=c.replace(/\/?[^\/]*$/,"")}else{if(e==="."||e===".."){e=""}else{var d=e.match(/^\/?[^\/]*/)[0];e=e.substr(d.length);c=c+d}}}}}return c}if(a){this.parse(a)}},color:function(target,prop){this.required=true;this.adjust=true;this.hash=false;this.caps=true;this.slider=true;this.valueElement=target;this.styleElement=target;this.onImmediateChange=null;this.hsv=[0,0,1];this.rgb=[1,1,1];this.pickerOnfocus=true;this.pickerMode="HSV";this.pickerPosition="bottom";this.pickerSmartPosition=true;this.pickerButtonHeight=20;this.pickerClosable=false;this.pickerCloseText="Close";this.pickerButtonColor="ButtonText";this.pickerFace=10;this.pickerFaceColor="ThreeDFace";this.pickerBorder=1;this.pickerBorderColor="ThreeDHighlight ThreeDShadow ThreeDShadow ThreeDHighlight";this.pickerInset=1;this.pickerInsetColor="ThreeDShadow ThreeDHighlight ThreeDHighlight ThreeDShadow";this.pickerZIndex=10000;for(var p in prop){if(prop.hasOwnProperty(p)){this[p]=prop[p]}}this.hidePicker=function(){if(isPickerOwner()){removePicker()}};this.showPicker=function(){if(!isPickerOwner()){var tp=jscolor.getElementPos(target);var ts=jscolor.getElementSize(target);var vp=jscolor.getViewPos();var vs=jscolor.getViewSize();var ps=getPickerDims(this);var a,b,c;switch(this.pickerPosition.toLowerCase()){case"left":a=1;b=0;c=-1;break;case"right":a=1;b=0;c=1;break;case"top":a=0;b=1;c=-1;break;default:a=0;b=1;c=1;break}var l=(ts[b]+ps[b])/2;if(!this.pickerSmartPosition){var pp=[tp[a],tp[b]+ts[b]-l+l*c]}else{var pp=[-vp[a]+tp[a]+ps[a]>vs[a]?(-vp[a]+tp[a]+ts[a]/2>vs[a]/2&&tp[a]+ts[a]-ps[a]>=0?tp[a]+ts[a]-ps[a]:tp[a]):tp[a],-vp[b]+tp[b]+ts[b]+ps[b]-l+l*c>vs[b]?(-vp[b]+tp[b]+ts[b]/2>vs[b]/2&&tp[b]+ts[b]-l-l*c>=0?tp[b]+ts[b]-l-l*c:tp[b]+ts[b]-l+l*c):(tp[b]+ts[b]-l+l*c>=0?tp[b]+ts[b]-l+l*c:tp[b]+ts[b]-l-l*c)]}drawPicker(pp[a],pp[b])}};this.importColor=function(){if(!valueElement){this.exportColor()}else{if(!this.adjust){if(!this.fromString(valueElement.value,leaveValue)){styleElement.style.backgroundImage=styleElement.jscStyle.backgroundImage;styleElement.style.backgroundColor=styleElement.jscStyle.backgroundColor;styleElement.style.color=styleElement.jscStyle.color;this.exportColor(leaveValue|leaveStyle)}}else{if(!this.required&&/^\s*$/.test(valueElement.value)){valueElement.value="";styleElement.style.backgroundImage=styleElement.jscStyle.backgroundImage;styleElement.style.backgroundColor=styleElement.jscStyle.backgroundColor;styleElement.style.color=styleElement.jscStyle.color;this.exportColor(leaveValue|leaveStyle)}else{if(this.fromString(valueElement.value)){}else{this.exportColor()}}}}};this.exportColor=function(flags){if(!(flags&leaveValue)&&valueElement){var value=this.toString();if(this.caps){value=value.toUpperCase()}if(this.hash){value="#"+value}valueElement.value=value}if(!(flags&leaveStyle)&&styleElement){styleElement.style.backgroundImage="none";styleElement.style.backgroundColor="#"+this.toString();styleElement.style.color=0.213*this.rgb[0]+0.715*this.rgb[1]+0.072*this.rgb[2]<0.5?"#FFF":"#000"}if(!(flags&leavePad)&&isPickerOwner()){redrawPad()}if(!(flags&leaveSld)&&isPickerOwner()){redrawSld()}};this.fromHSV=function(h,s,v,flags){h<0&&(h=0)||h>6&&(h=6);s<0&&(s=0)||s>1&&(s=1);v<0&&(v=0)||v>1&&(v=1);this.rgb=HSV_RGB(h===null?this.hsv[0]:(this.hsv[0]=h),s===null?this.hsv[1]:(this.hsv[1]=s),v===null?this.hsv[2]:(this.hsv[2]=v));this.exportColor(flags)};this.fromRGB=function(r,g,b,flags){r<0&&(r=0)||r>1&&(r=1);g<0&&(g=0)||g>1&&(g=1);b<0&&(b=0)||b>1&&(b=1);var hsv=RGB_HSV(r===null?this.rgb[0]:(this.rgb[0]=r),g===null?this.rgb[1]:(this.rgb[1]=g),b===null?this.rgb[2]:(this.rgb[2]=b));if(hsv[0]!==null){this.hsv[0]=hsv[0]}if(hsv[2]!==0){this.hsv[1]=hsv[1]}this.hsv[2]=hsv[2];this.exportColor(flags)};this.fromString=function(hex,flags){var m=hex.match(/^\W*([0-9A-F]{3}([0-9A-F]{3})?)\W*$/i);if(!m){return false}else{if(m[1].length===6){this.fromRGB(parseInt(m[1].substr(0,2),16)/255,parseInt(m[1].substr(2,2),16)/255,parseInt(m[1].substr(4,2),16)/255,flags)}else{this.fromRGB(parseInt(m[1].charAt(0)+m[1].charAt(0),16)/255,parseInt(m[1].charAt(1)+m[1].charAt(1),16)/255,parseInt(m[1].charAt(2)+m[1].charAt(2),16)/255,flags)}return true}};this.toString=function(){return((256|Math.round(255*this.rgb[0])).toString(16).substr(1)+(256|Math.round(255*this.rgb[1])).toString(16).substr(1)+(256|Math.round(255*this.rgb[2])).toString(16).substr(1))};function RGB_HSV(r,g,b){var n=Math.min(Math.min(r,g),b);var v=Math.max(Math.max(r,g),b);var m=v-n;if(m===0){return[null,0,v]}var h=r===n?3+(b-g)/m:(g===n?5+(r-b)/m:1+(g-r)/m);return[h===6?0:h,m/v,v]}function HSV_RGB(h,s,v){if(h===null){return[v,v,v]}var i=Math.floor(h);var f=i%2?h-i:1-(h-i);var m=v*(1-s);var n=v*(1-s*f);switch(i){case 6:case 0:return[v,n,m];case 1:return[n,v,m];case 2:return[m,v,n];case 3:return[m,n,v];case 4:return[n,m,v];case 5:return[v,m,n]}}function removePicker(){delete jscolor.picker.owner;document.getElementsByTagName("body")[0].removeChild(jscolor.picker.boxB)}function drawPicker(x,y){if(!jscolor.picker){jscolor.picker={box:document.createElement("div"),boxB:document.createElement("div"),pad:document.createElement("div"),padB:document.createElement("div"),padM:document.createElement("div"),sld:document.createElement("div"),sldB:document.createElement("div"),sldM:document.createElement("div"),btn:document.createElement("div"),btnS:document.createElement("span"),btnT:document.createTextNode(THIS.pickerCloseText)};for(var i=0,segSize=4;i<jscolor.images.sld[1];i+=segSize){var seg=document.createElement("div");seg.style.height=segSize+"px";seg.style.fontSize="1px";seg.style.lineHeight="0";jscolor.picker.sld.appendChild(seg)}jscolor.picker.sldB.appendChild(jscolor.picker.sld);jscolor.picker.box.appendChild(jscolor.picker.sldB);jscolor.picker.box.appendChild(jscolor.picker.sldM);jscolor.picker.padB.appendChild(jscolor.picker.pad);jscolor.picker.box.appendChild(jscolor.picker.padB);jscolor.picker.box.appendChild(jscolor.picker.padM);jscolor.picker.btnS.appendChild(jscolor.picker.btnT);jscolor.picker.btn.appendChild(jscolor.picker.btnS);jscolor.picker.box.appendChild(jscolor.picker.btn);jscolor.picker.boxB.appendChild(jscolor.picker.box)}var p=jscolor.picker;p.box.onmouseup=p.box.onmouseout=function(){target.focus()};p.box.onmousedown=function(){abortBlur=true};p.box.onmousemove=function(e){if(holdPad||holdSld){holdPad&&setPad(e);holdSld&&setSld(e);if(document.selection){document.selection.empty()}else{if(window.getSelection){window.getSelection().removeAllRanges()}}dispatchImmediateChange()}};p.padM.onmouseup=p.padM.onmouseout=function(){if(holdPad){holdPad=false;jscolor.fireEvent(valueElement,"change")}};p.padM.onmousedown=function(e){switch(modeID){case 0:if(THIS.hsv[2]===0){THIS.fromHSV(null,null,1)}break;case 1:if(THIS.hsv[1]===0){THIS.fromHSV(null,1,null)}break}holdPad=true;setPad(e);dispatchImmediateChange()};p.sldM.onmouseup=p.sldM.onmouseout=function(){if(holdSld){holdSld=false;jscolor.fireEvent(valueElement,"change")}};p.sldM.onmousedown=function(e){holdSld=true;setSld(e);dispatchImmediateChange()};var dims=getPickerDims(THIS);p.box.style.width=dims[0]+"px";p.box.style.height=dims[1]+"px";p.boxB.style.position="absolute";p.boxB.style.clear="both";p.boxB.style.left=x+"px";p.boxB.style.top=y+"px";p.boxB.style.zIndex=THIS.pickerZIndex;p.boxB.style.border=THIS.pickerBorder+"px solid";p.boxB.style.borderColor=THIS.pickerBorderColor;p.boxB.style.background=THIS.pickerFaceColor;p.pad.style.width=jscolor.images.pad[0]+"px";p.pad.style.height=jscolor.images.pad[1]+"px";p.padB.style.position="absolute";p.padB.style.left=THIS.pickerFace+"px";p.padB.style.top=THIS.pickerFace+"px";p.padB.style.border=THIS.pickerInset+"px solid";p.padB.style.borderColor=THIS.pickerInsetColor;p.padM.style.position="absolute";p.padM.style.left="0";p.padM.style.top="0";p.padM.style.width=THIS.pickerFace+2*THIS.pickerInset+jscolor.images.pad[0]+jscolor.images.arrow[0]+"px";p.padM.style.height=p.box.style.height;p.padM.style.cursor="crosshair";p.sld.style.overflow="hidden";p.sld.style.width=jscolor.images.sld[0]+"px";p.sld.style.height=jscolor.images.sld[1]+"px";p.sldB.style.display=THIS.slider?"block":"none";p.sldB.style.position="absolute";p.sldB.style.right=THIS.pickerFace+"px";p.sldB.style.top=THIS.pickerFace+"px";p.sldB.style.border=THIS.pickerInset+"px solid";p.sldB.style.borderColor=THIS.pickerInsetColor;p.sldM.style.display=THIS.slider?"block":"none";p.sldM.style.position="absolute";p.sldM.style.right="0";p.sldM.style.top="0";p.sldM.style.width=jscolor.images.sld[0]+jscolor.images.arrow[0]+THIS.pickerFace+2*THIS.pickerInset+"px";p.sldM.style.height=p.box.style.height;try{p.sldM.style.cursor="pointer"}catch(eOldIE){p.sldM.style.cursor="hand"}function setBtnBorder(){var insetColors=THIS.pickerInsetColor.split(/\s+/);var pickerOutsetColor=insetColors.length<2?insetColors[0]:insetColors[1]+" "+insetColors[0]+" "+insetColors[0]+" "+insetColors[1];p.btn.style.borderColor=pickerOutsetColor}p.btn.style.display=THIS.pickerClosable?"block":"none";p.btn.style.position="absolute";p.btn.style.left=THIS.pickerFace+"px";p.btn.style.bottom=THIS.pickerFace+"px";p.btn.style.padding="0 15px";p.btn.style.height="18px";p.btn.style.border=THIS.pickerInset+"px solid";setBtnBorder();p.btn.style.color=THIS.pickerButtonColor;p.btn.style.font="12px sans-serif";p.btn.style.textAlign="center";try{p.btn.style.cursor="pointer"}catch(eOldIE){p.btn.style.cursor="hand"}p.btn.onmousedown=function(){THIS.hidePicker()};p.btnS.style.lineHeight=p.btn.style.height;switch(modeID){case 0:var padImg="hs.png";break;case 1:var padImg="hv.png";break}p.padM.style.backgroundImage="url('"+jscolor.getDir()+"cross.gif')";p.padM.style.backgroundRepeat="no-repeat";p.sldM.style.backgroundImage="url('"+jscolor.getDir()+"arrow.gif')";p.sldM.style.backgroundRepeat="no-repeat";p.pad.style.backgroundImage="url('"+jscolor.getDir()+padImg+"')";p.pad.style.backgroundRepeat="no-repeat";p.pad.style.backgroundPosition="0 0";redrawPad();redrawSld();jscolor.picker.owner=THIS;document.getElementsByTagName("body")[0].appendChild(p.boxB)}function getPickerDims(o){var dims=[2*o.pickerInset+2*o.pickerFace+jscolor.images.pad[0]+(o.slider?2*o.pickerInset+2*jscolor.images.arrow[0]+jscolor.images.sld[0]:0),o.pickerClosable?4*o.pickerInset+3*o.pickerFace+jscolor.images.pad[1]+o.pickerButtonHeight:2*o.pickerInset+2*o.pickerFace+jscolor.images.pad[1]];return dims}function redrawPad(){switch(modeID){case 0:var yComponent=1;break;case 1:var yComponent=2;break}var x=Math.round((THIS.hsv[0]/6)*(jscolor.images.pad[0]-1));var y=Math.round((1-THIS.hsv[yComponent])*(jscolor.images.pad[1]-1));jscolor.picker.padM.style.backgroundPosition=(THIS.pickerFace+THIS.pickerInset+x-Math.floor(jscolor.images.cross[0]/2))+"px "+(THIS.pickerFace+THIS.pickerInset+y-Math.floor(jscolor.images.cross[1]/2))+"px";var seg=jscolor.picker.sld.childNodes;switch(modeID){case 0:var rgb=HSV_RGB(THIS.hsv[0],THIS.hsv[1],1);for(var i=0;i<seg.length;i+=1){seg[i].style.backgroundColor="rgb("+(rgb[0]*(1-i/seg.length)*100)+"%,"+(rgb[1]*(1-i/seg.length)*100)+"%,"+(rgb[2]*(1-i/seg.length)*100)+"%)"}break;case 1:var rgb,s,c=[THIS.hsv[2],0,0];var i=Math.floor(THIS.hsv[0]);var f=i%2?THIS.hsv[0]-i:1-(THIS.hsv[0]-i);switch(i){case 6:case 0:rgb=[0,1,2];break;case 1:rgb=[1,0,2];break;case 2:rgb=[2,0,1];break;case 3:rgb=[2,1,0];break;case 4:rgb=[1,2,0];break;case 5:rgb=[0,2,1];break}for(var i=0;i<seg.length;i+=1){s=1-1/(seg.length-1)*i;c[1]=c[0]*(1-s*f);c[2]=c[0]*(1-s);seg[i].style.backgroundColor="rgb("+(c[rgb[0]]*100)+"%,"+(c[rgb[1]]*100)+"%,"+(c[rgb[2]]*100)+"%)"}break}}function redrawSld(){switch(modeID){case 0:var yComponent=2;break;case 1:var yComponent=1;break}var y=Math.round((1-THIS.hsv[yComponent])*(jscolor.images.sld[1]-1));jscolor.picker.sldM.style.backgroundPosition="0 "+(THIS.pickerFace+THIS.pickerInset+y-Math.floor(jscolor.images.arrow[1]/2))+"px"}function isPickerOwner(){return jscolor.picker&&jscolor.picker.owner===THIS}function blurTarget(){if(valueElement===target){THIS.importColor()}if(THIS.pickerOnfocus){THIS.hidePicker()}}function blurValue(){if(valueElement!==target){THIS.importColor()}}function setPad(e){var mpos=jscolor.getRelMousePos(e);var x=mpos.x-THIS.pickerFace-THIS.pickerInset;var y=mpos.y-THIS.pickerFace-THIS.pickerInset;switch(modeID){case 0:THIS.fromHSV(x*(6/(jscolor.images.pad[0]-1)),1-y/(jscolor.images.pad[1]-1),null,leaveSld);break;case 1:THIS.fromHSV(x*(6/(jscolor.images.pad[0]-1)),null,1-y/(jscolor.images.pad[1]-1),leaveSld);break}}function setSld(e){var mpos=jscolor.getRelMousePos(e);var y=mpos.y-THIS.pickerFace-THIS.pickerInset;switch(modeID){case 0:THIS.fromHSV(null,null,1-y/(jscolor.images.sld[1]-1),leavePad);break;case 1:THIS.fromHSV(null,1-y/(jscolor.images.sld[1]-1),null,leavePad);break}}function dispatchImmediateChange(){if(THIS.onImmediateChange){if(typeof THIS.onImmediateChange==="string"){eval(THIS.onImmediateChange)}else{THIS.onImmediateChange(THIS)}}}var THIS=this;var modeID=this.pickerMode.toLowerCase()==="hvs"?1:0;var abortBlur=false;var valueElement=jscolor.fetchElement(this.valueElement),styleElement=jscolor.fetchElement(this.styleElement);var holdPad=false,holdSld=false;var leaveValue=1<<0,leaveStyle=1<<1,leavePad=1<<2,leaveSld=1<<3;jscolor.addEvent(target,"focus",function(){if(THIS.pickerOnfocus){THIS.showPicker()}});jscolor.addEvent(target,"blur",function(){if(!abortBlur){window.setTimeout(function(){abortBlur||blurTarget();abortBlur=false},0)}else{abortBlur=false}});if(valueElement){var updateField=function(){THIS.fromString(valueElement.value,leaveValue);dispatchImmediateChange()};jscolor.addEvent(valueElement,"keyup",updateField);jscolor.addEvent(valueElement,"input",updateField);jscolor.addEvent(valueElement,"blur",blurValue);valueElement.setAttribute("autocomplete","off")}if(styleElement){styleElement.jscStyle={backgroundImage:styleElement.style.backgroundImage,backgroundColor:styleElement.style.backgroundColor,color:styleElement.style.color}}switch(modeID){case 0:jscolor.requireImage("hs.png");break;case 1:jscolor.requireImage("hv.png");break}jscolor.requireImage("cross.gif");jscolor.requireImage("arrow.gif");this.importColor()}};jscolor.install();