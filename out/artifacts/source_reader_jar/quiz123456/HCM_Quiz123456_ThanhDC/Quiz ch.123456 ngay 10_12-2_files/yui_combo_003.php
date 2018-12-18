/*
YUI 3.17.2 (build 9c3c78e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-simulate",function(e,t){(function(){function v(t,n,a,f,l,c,h,p,d,v,m){t||e.error("simulateKeyEvent(): Invalid target.");if(i(n)){n=n.toLowerCase();switch(n){case"textevent":n="keypress";break;case"keyup":case"keydown":case"keypress":break;default:e.error("simulateKeyEvent(): Event type '"+n+"' not supported.")}}else e.error("simulateKeyEvent(): Event type must be a string.");s(a)||(a=!0),s(f)||(f=!0),o(l)||(l=e.config.win),s(c)||(c=!1),s(h)||(h=!1),s(p)||(p=!1),s(d)||(d=!1),u(v)||(v=0),u(m)||(m=0);var g=null;if(r(e.config.doc.createEvent)){try{g=e.config.doc.createEvent("KeyEvents"),g.initKeyEvent(n,a,f,l,c,h,p,d,v,m)}catch(y){try{g=e.config.doc.createEvent("Events")}catch(b){g=e.config.doc.createEvent("UIEvents")}finally{g.initEvent(n,a,f),g.view=l,g.altKey=h,g.ctrlKey=c,g.shiftKey=p,g.metaKey=d,g.keyCode=v,g.charCode=m}}t.dispatchEvent(g)}else o(e.config.doc.createEventObject)?(g=e.config.doc.createEventObject(),g.bubbles=a,g.cancelable=f,g.view=l,g.ctrlKey=c,g.altKey=h,g.shiftKey=p,g.metaKey=d,g.keyCode=m>0?m:v,t.fireEvent("on"+n,g)):e.error("simulateKeyEvent(): No event simulation framework present.")}function m(t,n,l,c,h,p,d,v,m,g,y,b,w,E,S,x){t||e.error("simulateMouseEvent(): Invalid target."),i(n)?!a[n.toLowerCase()]&&!f[n]&&e.error("simulateMouseEvent(): Event type '"+n+"' not supported."):e.error("simulateMouseEvent(): Event type must be a string."),s(l)||(l=!0),s(c)||(c=n!=="mousemove"),o(h)||(h=e.config.win),u(p)||(p=1),u(d)||(d=0),u(v)||(v=0),u(m)||(m=0),u(g)||(g=0),s(y)||(y=!1),s(b)||(b=!1),s(w)||(w=!1),s(E)||(E=!1),u(S)||(S=0),x=x||null;var T=null;if(r(e.config.doc.createEvent))T=e.config.doc.createEvent("MouseEvents"),T.initMouseEvent?T.initMouseEvent(n,l,c,h,p,d,v,m,g,y,b,w,E,S,x):(T=e.config.doc.createEvent("UIEvents"),T.initEvent(n,l,c),T.view=h,T.detail=p,T.screenX=d,T.screenY=v,T.clientX=m,T.clientY=g,T.ctrlKey=y,T.altKey=b,T.metaKey=E,T.shiftKey=w,T.button=S,T.relatedTarget=x),x&&!T.relatedTarget&&(n==="mouseout"?T.toElement=x:n==="mouseover"&&(T.fromElement=x)),t.dispatchEvent(T);else if(o(e.config.doc.createEventObject)){T=e.config.doc.createEventObject(),T.bubbles=l,T.cancelable=c,T.view=h,T.detail=p,T.screenX=d,T.screenY=v,T.clientX=m,T.clientY=g,T.ctrlKey=y,T.altKey=b,T.metaKey=E,T.shiftKey=w;switch(S){case 0:T.button=1;break;case 1:T.button=4;break;case 2:break;default:T.button=0}T.relatedTarget=x,t.fireEvent("on"+n,T)}else e.error("simulateMouseEvent(): No event simulation framework present.")}function g(t,n,a,f,l,p){t||e.error("simulateUIEvent(): Invalid target."),i(n)?(n=n.toLowerCase(),c[n]||e.error("simulateUIEvent(): Event type '"+n+"' not supported.")):e.error("simulateUIEvent(): Event type must be a string.");var d=null;s(a)||(a=n in h),s(f)||(f=n==="submit"),o(l)||(l=e.config.win),u(p)||(p=1),r(e.config.doc.createEvent)?(d=e.config.doc.createEvent("UIEvents"),d.initUIEvent(n,a,f,l,p),t.dispatchEvent(d)):o(e.config.doc.createEventObject)?(d=e.config.doc.createEventObject(),d.bubbles=a,d.cancelable=f,d.view=l,d.detail=p,t.fireEvent("on"+n,d)):e.error("simulateUIEvent(): No event simulation framework present.")}function y(t,n,r,i,s,o,u,a,f,l,c,h,p,v,m,g){var y;(!e.UA.ios||e.UA.ios<2)&&e.error("simulateGestureEvent(): Native gesture DOM eventframe is not available in this platform."),t||e.error("simulateGestureEvent(): Invalid target."),e.Lang.isString(n)?(n=n.toLowerCase(),d[n]||e.error("simulateTouchEvent(): Event type '"+n+"' not supported.")):e.error("simulateGestureEvent(): Event type must be a string."),e.Lang.isBoolean(r)||(r=!0),e.Lang.isBoolean(i)||(i=!0),e.Lang.isObject(s)||(s=e.config.win),e.Lang.isNumber(o)||(o=2),e.Lang.isNumber(u)||(u=0),e.Lang.isNumber(a)||(a=0),e.Lang.isNumber(f)||(f=0),e.Lang.isNumber(l)||(l=0),e.Lang.isBoolean(c)||(c=!1),e.Lang.isBoolean(h)||(h=!1),e.Lang.isBoolean(p)||(p=!1),e.Lang.isBoolean(v)||(v=!1),e.Lang.isNumber(m)||(m=1),e.Lang.isNumber(g)||(g=0),y=e.config.doc.createEvent("GestureEvent"),y.initGestureEvent(n,r,i,s,o,u,a,f,l,c,h,p,v,t,m,g),t.dispatchEvent(y)}function b(t,n,r,i,s,o,u,a,f,l,c,h,d,v,m,g,y,b,w){var E;t||e.error("simulateTouchEvent(): Invalid target."),e.Lang.isString(n)?(n=n.toLowerCase(),p[n]||e.error("simulateTouchEvent(): Event type '"+n+"' not supported.")):e.error("simulateTouchEvent(): Event type must be a string."),n==="touchstart"||n==="touchmove"?m.length===0&&e.error("simulateTouchEvent(): No touch object in touches"):n==="touchend"&&y.length===0&&e.error("simulateTouchEvent(): No touch object in changedTouches"),e.Lang.isBoolean(r)||(r=!0),e.Lang.isBoolean(i)||(i=n!=="touchcancel"),e.Lang.isObject(s)||(s=e.config.win),e.Lang.isNumber(o)||(o=1),e.Lang.isNumber(u)||(u=0),e.Lang.isNumber(a)||(a=0),e.Lang.isNumber(f)||(f=0),e.Lang.isNumber(l)||(l=0),e.Lang.isBoolean(c)||(c=!1),e.Lang.isBoolean(h)||(h=!1),e.Lang.isBoolean(d)||(d=!1),e.Lang.isBoolean(v)||(v=!1),e.Lang.isNumber(b)||(b=1),e.Lang.isNumber(w)||(w=0),e.Lang.isFunction(e.config.doc.createEvent)?(e.UA.android?e.UA.android<4?(E=e.config.doc.createEvent("MouseEvents"),E.initMouseEvent(n,r,i,s,o,u,a,f,l,c,h,d,v,0,t),E.touches=m,E.targetTouches=g,E.changedTouches=y):(E=e.config.doc.createEvent("TouchEvent"),E.initTouchEvent(m,g,y,n,s,u,a,f,l,c,h,d,v)):e.UA.ios?e.UA.ios>=2?(E=e.config.doc.createEvent("TouchEvent"),E.initTouchEvent(n,r,i,s,o,u,a,f,l,c,h,d,v,m,g,y,b,w)):e.error("simulateTouchEvent(): No touch event simulation framework present for iOS, "+e.UA.ios+"."):e.error("simulateTouchEvent(): Not supported agent yet, "+e.UA.userAgent),t.dispatchEvent(E)):e.error("simulateTouchEvent(): No event simulation framework present.")}var t=e.Lang,n=e.config.win,r=t.isFunction,i=t.isString,s=t.isBoolean,o=t.isObject,u=t.isNumber,a={click:1,dblclick:1,mouseover:1,mouseout:1,mousedown:1,mouseup:1,mousemove:1,contextmenu:1},f=n&&n.PointerEvent?{pointerover:1,pointerout:1,pointerdown:1,pointerup:1,pointermove:1}:{MSPointerOver:1,MSPointerOut:1,MSPointerDown:1,MSPointerUp:1,MSPointerMove:1},l={keydown:1,keyup:1,keypress:1},c={submit:1,blur
:1,change:1,focus:1,resize:1,scroll:1,select:1},h={scroll:1,resize:1,reset:1,submit:1,change:1,select:1,error:1,abort:1},p={touchstart:1,touchmove:1,touchend:1,touchcancel:1},d={gesturestart:1,gesturechange:1,gestureend:1};e.mix(h,a),e.mix(h,l),e.mix(h,p),e.Event.simulate=function(t,n,r){r=r||{},a[n]||f[n]?m(t,n,r.bubbles,r.cancelable,r.view,r.detail,r.screenX,r.screenY,r.clientX,r.clientY,r.ctrlKey,r.altKey,r.shiftKey,r.metaKey,r.button,r.relatedTarget):l[n]?v(t,n,r.bubbles,r.cancelable,r.view,r.ctrlKey,r.altKey,r.shiftKey,r.metaKey,r.keyCode,r.charCode):c[n]?g(t,n,r.bubbles,r.cancelable,r.view,r.detail):p[n]?e.config.win&&"ontouchstart"in e.config.win&&!e.UA.phantomjs&&!(e.UA.chrome&&e.UA.chrome<6)?b(t,n,r.bubbles,r.cancelable,r.view,r.detail,r.screenX,r.screenY,r.clientX,r.clientY,r.ctrlKey,r.altKey,r.shiftKey,r.metaKey,r.touches,r.targetTouches,r.changedTouches,r.scale,r.rotation):e.error("simulate(): Event '"+n+"' can't be simulated. Use gesture-simulate module instead."):e.UA.ios&&e.UA.ios>=2&&d[n]?y(t,n,r.bubbles,r.cancelable,r.view,r.detail,r.screenX,r.screenY,r.clientX,r.clientY,r.ctrlKey,r.altKey,r.shiftKey,r.metaKey,r.scale,r.rotation):e.error("simulate(): Event '"+n+"' can't be simulated.")}})()},"3.17.2",{requires:["event-base"]});
/*
YUI 3.17.2 (build 9c3c78e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("async-queue",function(e,t){e.AsyncQueue=function(){this._init(),this.add.apply(this,arguments)};var n=e.AsyncQueue,r="execute",i="shift",s="promote",o="remove",u=e.Lang.isObject,a=e.Lang.isFunction;n.defaults=e.mix({autoContinue:!0,iterations:1,timeout:10,until:function(){return this.iterations|=0,this.iterations<=0}},e.config.queueDefaults||{}),e.extend(n,e.EventTarget,{_running:!1,_init:function(){e.EventTarget.call(this,{prefix:"queue",emitFacade:!0}),this._q=[],this.defaults={},this._initEvents()},_initEvents:function(){this.publish({execute:{defaultFn:this._defExecFn,emitFacade:!0},shift:{defaultFn:this._defShiftFn,emitFacade:!0},add:{defaultFn:this._defAddFn,emitFacade:!0},promote:{defaultFn:this._defPromoteFn,emitFacade:!0},remove:{defaultFn:this._defRemoveFn,emitFacade:!0}})},next:function(){var e;while(this._q.length){e=this._q[0]=this._prepare(this._q[0]);if(!e||!e.until())break;this.fire(i,{callback:e}),e=null}return e||null},_defShiftFn:function(e){this.indexOf(e.callback)===0&&this._q.shift()},_prepare:function(t){if(a(t)&&t._prepared)return t;var r=e.merge(n.defaults,{context:this,args:[],_prepared:!0},this.defaults,a(t)?{fn:t}:t),i=e.bind(function(){i._running||i.iterations--,a(i.fn)&&i.fn.apply(i.context||e,e.Array(i.args))},this);return e.mix(i,r)},run:function(){var e,t=!0;if(this._executing)return this._running=!0,this;for(e=this.next();e&&!this.isRunning();e=this.next()){t=e.timeout<0?this._execute(e):this._schedule(e);if(!t)break}return e||this.fire("complete"),this},_execute:function(e){this._running=e._running=!0,this._executing=e,e.iterations--,this.fire(r,{callback:e});var t=this._running&&e.autoContinue;return this._running=e._running=!1,this._executing=!1,t},_schedule:function(t){return this._running=e.later(t.timeout,this,function(){this._execute(t)&&this.run()}),!1},isRunning:function(){return!!this._running},_defExecFn:function(e){e.callback()},add:function(){return this.fire("add",{callbacks:e.Array(arguments,0,!0)}),this},_defAddFn:function(t){var n=this._q,r=[];e.Array.each(t.callbacks,function(e){u(e)&&(n.push(e),r.push(e))}),t.added=r},pause:function(){return this._running&&u(this._running)&&this._running.cancel(),this._running=!1,this},stop:function(){return this._q=[],this._running&&u(this._running)&&(this._running.cancel(),this._running=!1),this._executing||this.run(),this},indexOf:function(e){var t=0,n=this._q.length,r;for(;t<n;++t){r=this._q[t];if(r===e||r.id===e)return t}return-1},getCallback:function(e){var t=this.indexOf(e);return t>-1?this._q[t]:null},promote:function(e){var t={callback:e},n;return this.isRunning()?n=this.after(i,function(){this.fire(s,t),n.detach()},this):this.fire(s,t),this},_defPromoteFn:function(e){var t=this.indexOf(e.callback),n=t>-1?this._q.splice(t,1)[0]:null;e.promoted=n,n&&this._q.unshift(n)},remove:function(e){var t={callback:e},n;return this.isRunning()?n=this.after(i,function(){this.fire(o,t),n.detach()},this):this.fire(o,t),this},_defRemoveFn:function(e){var t=this.indexOf(e.callback);e.removed=t>-1?this._q.splice(t,1)[0]:null},size:function(){return this.isRunning()||this.next(),this._q.length}})},"3.17.2",{requires:["event-custom"]});
/*
YUI 3.17.2 (build 9c3c78e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("gesture-simulate",function(e,t){function T(n){n||e.error(t+": invalid target node"),this.node=n,this.target=e.Node.getDOMNode(n);var r=this.node.getXY(),i=this._getDims();a=r[0]+i[0]/2,f=r[1]+i[1]/2}var t="gesture-simulate",n=e.config.win&&"ontouchstart"in e.config.win&&!e.UA.phantomjs&&!(e.UA.chrome&&e.UA.chrome<6),r={tap:1,doubletap:1,press:1,move:1,flick:1,pinch:1,rotate:1},i={touchstart:1,touchmove:1,touchend:1,touchcancel:1},s=e.config.doc,o,u=20,a,f,l={HOLD_TAP:10,DELAY_TAP:10,HOLD_PRESS:3e3,MIN_HOLD_PRESS:1e3,MAX_HOLD_PRESS:6e4,DISTANCE_MOVE:200,DURATION_MOVE:1e3,MAX_DURATION_MOVE:5e3,MIN_VELOCITY_FLICK:1.3,DISTANCE_FLICK:200,DURATION_FLICK:1e3,MAX_DURATION_FLICK:5e3,DURATION_PINCH:1e3},c="touchstart",h="touchmove",p="touchend",d="gesturestart",v="gesturechange",m="gestureend",g="mouseup",y="mousemove",b="mousedown",w="click",E="dblclick",S="x",x="y";T.prototype={_toRadian:function(e){return e*(Math.PI/180)},_getDims:function(){var e,t,n;return this.target.getBoundingClientRect?(e=this.target.getBoundingClientRect(),"height"in e?n=e.height:n=Math.abs(e.bottom-e.top),"width"in e?t=e.width:t=Math.abs(e.right-e.left)):(e=this.node.get("region"),t=e.width,n=e.height),[t,n]},_calculateDefaultPoint:function(t){var n;return!e.Lang.isArray(t)||t.length===0?t=[a,f]:(t.length==1&&(n=this._getDims[1],t[1]=n/2),t[0]=this.node.getX()+t[0],t[1]=this.node.getY()+t[1]),t},rotate:function(n,r,i,s,o,u,a){var f,l=i,c=s;if(!e.Lang.isNumber(l)||!e.Lang.isNumber(c)||l<0||c<0)f=this.target.offsetWidth<this.target.offsetHeight?this.target.offsetWidth/4:this.target.offsetHeight/4,l=f,c=f;e.Lang.isNumber(a)||e.error(t+"Invalid rotation detected."),this.pinch(n,r,l,c,o,u,a)},pinch:function(n,r,i,s,o,a,f){var g,y,b=u,w,E=0,S=i,x=s,T,N,C,k,L,A,O,M,_,D={start:[],end:[]},P={start:[],end:[]},H,B;r=this._calculateDefaultPoint(r),(!e.Lang.isNumber(S)||!e.Lang.isNumber(x)||S<0||x<0)&&e.error(t+"Invalid startRadius and endRadius detected.");if(!e.Lang.isNumber(o)||o<=0)o=l.DURATION_PINCH;if(!e.Lang.isNumber(a))a=0;else{a%=360;while(a<0)a+=360}e.Lang.isNumber(f)||(f=0),e.AsyncQueue.defaults.timeout=b,g=new e.AsyncQueue,N=r[0],C=r[1],O=a,M=a+f,D.start=[N+S*Math.sin(this._toRadian(O)),C-S*Math.cos(this._toRadian(O))],D.end=[N+x*Math.sin(this._toRadian(M)),C-x*Math.cos(this._toRadian(M))],P.start=[N-S*Math.sin(this._toRadian(O)),C+S*Math.cos(this._toRadian(O))],P.end=[N-x*Math.sin(this._toRadian(M)),C+x*Math.cos(this._toRadian(M))],k=1,L=s/i,g.add({fn:function(){var t,n,r,i;t={pageX:D.start[0],pageY:D.start[1],clientX:D.start[0],clientY:D.start[1]},n={pageX:P.start[0],pageY:P.start[1],clientX:P.start[0],clientY:P.start[1]},i=this._createTouchList([e.merge({identifier:E++},t),e.merge({identifier:E++},n)]),r={pageX:(D.start[0]+P.start[0])/2,pageY:(D.start[0]+P.start[1])/2,clientX:(D.start[0]+P.start[0])/2,clientY:(D.start[0]+P.start[1])/2},this._simulateEvent(this.target,c,e.merge({touches:i,targetTouches:i,changedTouches:i,scale:k,rotation:O},r)),e.UA.ios>=2&&this._simulateEvent(this.target,d,e.merge({scale:k,rotation:O},r))},timeout:0,context:this}),H=Math.floor(o/b),T=(x-S)/H,A=(L-k)/H,_=(M-O)/H,B=function(t){var n=S+T*t,r=N+n*Math.sin(this._toRadian(O+_*t)),i=C-n*Math.cos(this._toRadian(O+_*t)),s=N-n*Math.sin(this._toRadian(O+_*t)),o=C+n*Math.cos(this._toRadian(O+_*t)),u=(r+s)/2,a=(i+o)/2,f,l,c,p;f={pageX:r,pageY:i,clientX:r,clientY:i},l={pageX:s,pageY:o,clientX:s,clientY:o},p=this._createTouchList([e.merge({identifier:E++},f),e.merge({identifier:E++},l)]),c={pageX:u,pageY:a,clientX:u,clientY:a},this._simulateEvent(this.target,h,e.merge({touches:p,targetTouches:p,changedTouches:p,scale:k+A*t,rotation:O+_*t},c)),e.UA.ios>=2&&this._simulateEvent(this.target,v,e.merge({scale:k+A*t,rotation:O+_*t},c))};for(y=0;y<H;y++)g.add({fn:B,args:[y],context:this});g.add({fn:function(){var t=this._getEmptyTouchList(),n,r,i,s;n={pageX:D.end[0],pageY:D.end[1],clientX:D.end[0],clientY:D.end[1]},r={pageX:P.end[0],pageY:P.end[1],clientX:P.end[0],clientY:P.end[1]},s=this._createTouchList([e.merge({identifier:E++},n),e.merge({identifier:E++},r)]),i={pageX:(D.end[0]+P.end[0])/2,pageY:(D.end[0]+P.end[1])/2,clientX:(D.end[0]+P.end[0])/2,clientY:(D.end[0]+P.end[1])/2},e.UA.ios>=2&&this._simulateEvent(this.target,m,e.merge({scale:L,rotation:M},i)),this._simulateEvent(this.target,p,e.merge({touches:t,targetTouches:t,changedTouches:s,scale:L,rotation:M},i))},context:this}),n&&e.Lang.isFunction(n)&&g.add({fn:n,context:this.node}),g.run()},tap:function(t,r,i,s,o){var u=new e.AsyncQueue,a=this._getEmptyTouchList(),f,h,d,v,m;r=this._calculateDefaultPoint(r);if(!e.Lang.isNumber(i)||i<1)i=1;e.Lang.isNumber(s)||(s=l.HOLD_TAP),e.Lang.isNumber(o)||(o=l.DELAY_TAP),h={pageX:r[0],pageY:r[1],clientX:r[0],clientY:r[1]},f=this._createTouchList([e.merge({identifier:0},h)]),v=function(){this._simulateEvent(this.target,c,e.merge({touches:f,targetTouches:f,changedTouches:f},h))},m=function(){this._simulateEvent(this.target,p,e.merge({touches:a,targetTouches:a,changedTouches:f},h))};for(d=0;d<i;d++)u.add({fn:v,context:this,timeout:d===0?0:o}),u.add({fn:m,context:this,timeout:s});i>1&&!n&&u.add({fn:function(){this._simulateEvent(this.target,E,h)},context:this}),t&&e.Lang.isFunction(t)&&u.add({fn:t,context:this.node}),u.run()},flick:function(n,r,i,s,o){var u;r=this._calculateDefaultPoint(r),e.Lang.isString(i)?(i=i.toLowerCase(),i!==S&&i!==x&&e.error(t+"(flick): Only x or y axis allowed")):i=S,e.Lang.isNumber(s)||(s=l.DISTANCE_FLICK),e.Lang.isNumber(o)?o>l.MAX_DURATION_FLICK&&(o=l.MAX_DURATION_FLICK):o=l.DURATION_FLICK,Math.abs(s)/o<l.MIN_VELOCITY_FLICK&&(o=Math.abs(s)/l.MIN_VELOCITY_FLICK),u={start:e.clone(r),end:[i===S?r[0]+s:r[0],i===x?r[1]+s:r[1]]},this._move(n,u,o)},move:function(t,n,r){var i;e.Lang.isObject(n)?(e.Lang.isArray(n.point)?n.point=this._calculateDefaultPoint(n.point):n.point=this._calculateDefaultPoint([]),e.Lang.isNumber(n.xdist)||(n.xdist=l.DISTANCE_MOVE),e.Lang.isNumber(n.ydist)||(n.ydist=0)):n={point:this._calculateDefaultPoint([]),xdist:l.
DISTANCE_MOVE,ydist:0},e.Lang.isNumber(r)?r>l.MAX_DURATION_MOVE&&(r=l.MAX_DURATION_MOVE):r=l.DURATION_MOVE,i={start:e.clone(n.point),end:[n.point[0]+n.xdist,n.point[1]+n.ydist]},this._move(t,i,r)},_move:function(t,n,r){var i,s,o=u,d,v,m,g=0,y;e.Lang.isNumber(r)?r>l.MAX_DURATION_MOVE&&(r=l.MAX_DURATION_MOVE):r=l.DURATION_MOVE,e.Lang.isObject(n)?(e.Lang.isArray(n.start)||(n.start=[a,f]),e.Lang.isArray(n.end)||(n.end=[a+l.DISTANCE_MOVE,f])):n={start:[a,f],end:[a+l.DISTANCE_MOVE,f]},e.AsyncQueue.defaults.timeout=o,i=new e.AsyncQueue,i.add({fn:function(){var t={pageX:n.start[0],pageY:n.start[1],clientX:n.start[0],clientY:n.start[1]},r=this._createTouchList([e.merge({identifier:g++},t)]);this._simulateEvent(this.target,c,e.merge({touches:r,targetTouches:r,changedTouches:r},t))},timeout:0,context:this}),d=Math.floor(r/o),v=(n.end[0]-n.start[0])/d,m=(n.end[1]-n.start[1])/d,y=function(t){var r=n.start[0]+v*t,i=n.start[1]+m*t,s={pageX:r,pageY:i,clientX:r,clientY:i},o=this._createTouchList([e.merge({identifier:g++},s)]);this._simulateEvent(this.target,h,e.merge({touches:o,targetTouches:o,changedTouches:o},s))};for(s=0;s<d;s++)i.add({fn:y,args:[s],context:this});i.add({fn:function(){var t={pageX:n.end[0],pageY:n.end[1],clientX:n.end[0],clientY:n.end[1]},r=this._createTouchList([e.merge({identifier:g},t)]);this._simulateEvent(this.target,h,e.merge({touches:r,targetTouches:r,changedTouches:r},t))},timeout:0,context:this}),i.add({fn:function(){var t={pageX:n.end[0],pageY:n.end[1],clientX:n.end[0],clientY:n.end[1]},r=this._getEmptyTouchList(),i=this._createTouchList([e.merge({identifier:g},t)]);this._simulateEvent(this.target,p,e.merge({touches:r,targetTouches:r,changedTouches:i},t))},context:this}),t&&e.Lang.isFunction(t)&&i.add({fn:t,context:this.node}),i.run()},_getEmptyTouchList:function(){return o||(o=this._createTouchList([])),o},_createTouchList:function(n){var r=[],i,o=this;return!!n&&e.Lang.isArray(n)?e.UA.android&&e.UA.android>=4||e.UA.ios&&e.UA.ios>=2?(e.each(n,function(t){t.identifier||(t.identifier=0),t.pageX||(t.pageX=0),t.pageY||(t.pageY=0),t.screenX||(t.screenX=0),t.screenY||(t.screenY=0),r.push(s.createTouch(e.config.win,o.target,t.identifier,t.pageX,t.pageY,t.screenX,t.screenY))}),i=s.createTouchList.apply(s,r)):e.UA.ios&&e.UA.ios<2?e.error(t+": No touch event simulation framework present."):(i=[],e.each(n,function(e){e.identifier||(e.identifier=0),e.clientX||(e.clientX=0),e.clientY||(e.clientY=0),e.pageX||(e.pageX=0),e.pageY||(e.pageY=0),e.screenX||(e.screenX=0),e.screenY||(e.screenY=0),i.push({target:o.target,identifier:e.identifier,clientX:e.clientX,clientY:e.clientY,pageX:e.pageX,pageY:e.pageY,screenX:e.screenX,screenY:e.screenY})}),i.item=function(e){return i[e]}):e.error(t+": Invalid touchPoints passed"),i},_simulateEvent:function(t,r,s){var o;i[r]?n?e.Event.simulate(t,r,s):this._isSingleTouch(s.touches,s.targetTouches,s.changedTouches)?(r={touchstart:b,touchmove:y,touchend:g}[r],s.button=0,s.relatedTarget=null,o=r===g?s.changedTouches:s.touches,s=e.mix(s,{screenX:o.item(0).screenX,screenY:o.item(0).screenY,clientX:o.item(0).clientX,clientY:o.item(0).clientY},!0),e.Event.simulate(t,r,s),r==g&&e.Event.simulate(t,w,s)):e.error("_simulateEvent(): Event '"+r+"' has multi touch objects that can't be simulated in your platform."):e.Event.simulate(t,r,s)},_isSingleTouch:function(e,t,n){return e&&e.length<=1&&t&&t.length<=1&&n&&n.length<=1}},e.GestureSimulation=T,e.GestureSimulation.defaults=l,e.GestureSimulation.GESTURES=r,e.Event.simulateGesture=function(n,i,s,o){n=e.one(n);var u=new e.GestureSimulation(n);i=i.toLowerCase(),!o&&e.Lang.isFunction(s)&&(o=s,s={}),s=s||{};if(r[i])switch(i){case"tap":u.tap(o,s.point,s.times,s.hold,s.delay);break;case"doubletap":u.tap(o,s.point,2);break;case"press":e.Lang.isNumber(s.hold)?s.hold<l.MIN_HOLD_PRESS?s.hold=l.MIN_HOLD_PRESS:s.hold>l.MAX_HOLD_PRESS&&(s.hold=l.MAX_HOLD_PRESS):s.hold=l.HOLD_PRESS,u.tap(o,s.point,1,s.hold);break;case"move":u.move(o,s.path,s.duration);break;case"flick":u.flick(o,s.point,s.axis,s.distance,s.duration);break;case"pinch":u.pinch(o,s.center,s.r1,s.r2,s.duration,s.start,s.rotation);break;case"rotate":u.rotate(o,s.center,s.r1,s.r2,s.duration,s.start,s.rotation)}else e.error(t+": Not a supported gesture simulation: "+i)}},"3.17.2",{requires:["async-queue","event-simulate","node-screen"]});
/*
YUI 3.17.2 (build 9c3c78e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("node-event-simulate",function(e,t){e.Node.prototype.simulate=function(t,n){e.Event.simulate(e.Node.getDOMNode(this),t,n)},e.Node.prototype.simulateGesture=function(t,n,r){e.Event.simulateGesture(this,t,n,r)}},"3.17.2",{requires:["node-base","event-simulate","gesture-simulate"]});
YUI.add("moodle-core-actionmenu",function(e,t){var n=e.one(e.config.doc.body),r={MENUSHOWN:"action-menu-shown"},i={CAN_RECEIVE_FOCUS_SELECTOR:'input:not([type="hidden"]), a[href], button, textarea, select, [tabindex]',MENU:".moodle-actionmenu[data-enhance=moodle-core-actionmenu]",MENUBAR:'[role="menubar"]',MENUITEM:'[role="menuitem"]',MENUCONTENT:".menu[data-rel=menu-content]",MENUCONTENTCHILD:"li a",MENUCHILD:".menu li a",TOGGLE:".toggle-display",KEEPOPEN:'[data-keepopen="1"]',MENUBARITEMS:['[role="menubar"] > [role="menuitem"]','[role="menubar"] > [role="presentation"] > [role="menuitem"]'],MENUITEMS:['> [role="menuitem"]','> [role="presentation"] > [role="menuitem"]']},s,o={TL:"tl",TR:"tr",BL:"bl",BR:"br"};s=function(){s.superclass.constructor.apply(this,arguments)},s.prototype={dialogue:null,events:[],owner:null,menulink:null,menuChildren:null,firstMenuChild:null,lastMenuChild:null,initializer:function(){e.all(i.MENU).each(this.enhance,this),n.delegate("key",this.moveMenuItem,"down:37,39",i.MENUBARITEMS.join(","),this),n.delegate("click",this.toggleMenu,i.MENU+" "+i.TOGGLE,this),n.delegate("key",this.showIfHidden,"down:enter,38,40",i.MENU+" "+i.TOGGLE,this),n.delegate("key",function(e){e.currentTarget.simulate("click"),e.preventDefault()},"down:32",i.MENUBARITEMS.join(","))},enhance:function(e){var t=e.one(i.MENUCONTENT),n;if(!t)return!1;n=t.getData("align")||this.get("align").join("-"),e.one(i.TOGGLE).set("aria-haspopup",!0),t.set("aria-hidden",!0),t.hasClass("align-"+n)||t.addClass("align-"+n),t.hasChildNodes()&&e.setAttribute("data-enhanced","1")},moveMenuItem:function(e){var t,n=e.target.ancestor(i.MENUITEM,!0);return e.keyCode===37?t=this.getMenuItem(n,!0):e.keyCode===39&&(t=this.getMenuItem(n)),t&&t.focus(),this},getMenuItem:function(e,t){var n=e.ancestor(i.MENUBAR),r,s;if(!n)return null;r=n.all(i.MENUITEMS.join(","));if(!r)return null;var o=r.size();if(o===1)return null;var u=0,a=1,f=0;for(u=0;u<o;u++)if(r.item(u)===e)break;if(r.item(u)!==e)return null;t&&(a=-1);do u+=a,s=r.item(u),f++;while(s&&s.hasAttribute("hidden"));return s},hideMenu:function(e){this.dialogue&&(this.dialogue.removeClass("show"),this.dialogue.one(i.MENUCONTENT).set("aria-hidden",!0),this.dialogue=null);for(var t in this.events)this.events[t].detach&&this.events[t].detach();this.events=[],this.owner&&(this.owner.removeClass(r.MENUSHOWN),this.owner=null),this.menulink&&(e.type!="click"&&this.menulink.focus(),this.menulink=null)},showIfHidden:function(e){var t=e.target.ancestor(i.MENU),n=t.hasClass("show");return n||(e.preventDefault(),this.showMenu(e,t)),this},toggleMenu:function(e){var t=e.target.ancestor(i.MENU),n=t.hasClass("show");e.halt(!0),this.hideMenu(e);if(n)return;this.showMenu(e,t)},handleKeyboardEvent:function(e){var t,n=function(e){e.preventDefault(),e.stopPropagation()};if(e.currentTarget.ancestor(i.TOGGLE,!0))return(e.keyCode===40||e.keyCode===9&&!e.shiftKey)&&this.firstMenuChild?(this.firstMenuChild.focus(),n(e)):e.keyCode===38&&this.lastMenuChild?(this.lastMenuChild.focus(),n(e)):e.keyCode===9&&e.shiftKey&&(this.hideMenu(e),n(e)),this;if(e.keyCode===27)this.hideMenu(e),n(e);else if(e.keyCode===32)n(e),e.currentTarget.simulate("click");else if(e.keyCode===9)e.target===this.firstMenuChild&&e.shiftKey?(this.hideMenu(e),n(e)):e.target===this.lastMenuChild&&!e.shiftKey&&this.hideMenu(e)&&(t=this.menulink.next(i.CAN_RECEIVE_FOCUS_SELECTOR),t&&(t.focus(),n(e)));else if(e.keyCode===38||e.keyCode===40){var r=!1,s=0,o=1,u=0;while(!r&&s<this.menuChildren.size())this.menuChildren.item(s)===e.currentTarget?r=!0:s++;if(!r)return;e.keyCode===38&&(o=-1);do s+=o,s<0?s=this.menuChildren.size()-1:s>=this.menuChildren.size()&&(s=0),t=this.menuChildren.item(s),u++;while(u<this.menuChildren.size()&&t!==e.currentTarget&&t.hasClass("hidden"));t&&(t.focus(),n(e))}},hideIfOutside:function(e){e.target.ancestor(i.MENUCONTENT,!0)||this.hideMenu(e)},showMenu:function(e,t){var s=t.getData("owner"),o=t.one(i.MENUCONTENT);return this.owner=s?t.ancestor(s):null,this.dialogue=t,t.addClass("show"),this.owner?(this.owner.addClass(r.MENUSHOWN),this.menulink=this.owner.one(i.TOGGLE)):this.menulink=e.target.ancestor(i.TOGGLE,!0),this.constrain(o.set("aria-hidden",!1)),this.menuChildren=this.dialogue.all(i.MENUCHILD),this.menuChildren&&(this.firstMenuChild=this.menuChildren.item(0),this.lastMenuChild=this.menuChildren.item(this.menuChildren.size()-1),this.firstMenuChild.focus()),this.events.push(n.on("key",this.hideMenu,"esc",this)),this.events.push(n.on("click",this.hideIfOutside,this)),this.events.push(n.delegate("focus",this.hideIfOutside,"*",this)),this.events.push(t.delegate("key",this.handleKeyboardEvent,"down:9, 27, 38, 40, 32",i.MENUCHILD+", "+i.TOGGLE,this)),this.events.push(t.delegate("click",function(e){if(e.currentTarget.test(i.KEEPOPEN))return;this.hideMenu(e)},i.MENUCHILD,this)),!0},constrain:function(e){var t=e.getData("constraint"),n=e.getX(),r=e.getY(),i=e.get("offsetWidth"),s=e.get("offsetHeight"),o=0,u=0,a,f,l="auto",c=null,h=null,p=null,d=null,v=null;t&&(t=e.ancestor(t)),t?(a=t.get("offsetWidth"),f=t.get("offsetHeight"),o=t.getX(),u=t.getY(),l=t.getStyle("overflow")||"auto"):(a=e.get("docWidth"),f=e.get("docHeight")),i>a?(c=i=a,p=n=o):n<o?p=n=o:n+i>=o+a&&(p=o+a-i),s>f&&l.toLowerCase()==="hidden"&&(h=s=f,e.setStyle("overflow","auto"));if(r>=u&&r+s>u+f){d=u+f-s;try{v=e.getStyle("boxShadow").replace(/.*? (\d+)px \d+px$/,"$1"),(new RegExp(/^\d+$/)).test(v)&&d-u>v&&(d-=v)}catch(m){}}p!==null&&e.setX(p),d!==null&&e.setY(d),c!==null&&e.setStyle("width",c.toString()+"px"),h!==null&&e.setStyle("height",h.toString()+"px")}},e.extend(s,e.Base,s.prototype,{NAME:"moodle-core-actionmenu",ATTRS:{align:{value:[o.TR,o.BR]}}}),M.core=M.core||{},M.core.actionmenu=M.core.actionmenu||{},M.core.actionmenu.instance=null,M.core.actionmenu.init=M.core.actionmenu.init||function(e){M.core.actionmenu.instance=M.core.actionmenu.instance||new s(e)},M.core.actionmenu.newDOMNode=function(e){if(M.core.actionmenu.instance===null)return!0;e.all(i.
MENU).each(M.core.actionmenu.instance.enhance,M.core.actionmenu.instance)}},"@VERSION@",{requires:["base","event","node-event-simulate"]});
