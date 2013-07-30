/**
 * BxSlider v4.0 - Fully loaded, responsive content slider
 * http://bxslider.com
 *
 * Copyright 2012, Steven Wanderski - http://stevenwanderski.com - http://bxcreative.com
 * Written while drinking Belgian ales and listening to jazz
 *
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 */
(function(t){var e={mode:"horizontal",slideSelector:"",infiniteLoop:!0,hideControlOnEnd:!1,speed:1500,easing:null,slideMargin:0,startSlide:0,captions:!1,ticker:!1,tickerHover:!1,adaptiveHeight:!1,adaptiveHeightSpeed:500,touchEnabled:!0,swipeThreshold:50,video:!1,useCSS:!0,pager:!0,pagerType:"full",pagerShortSeparator:" / ",pagerSelector:null,buildPager:null,pagerCustom:null,controls:!0,nextText:"Next",prevText:"Prev",nextSelector:null,prevSelector:null,autoControls:!1,startText:"Start",stopText:"Stop",autoControlsCombine:!1,autoControlsSelector:null,auto:!1,pause:7000,autoStart:!0,autoDirection:"next",autoHover:!1,autoDelay:0,minSlides:1,maxSlides:1,moveSlides:0,slideWidth:0,onSliderLoad:function(){},onSlideBefore:function(){},onSlideAfter:function(){},onSlideNext:function(){},onSlidePrev:function(){}};t.fn.bxSlider=function(n){if(this.length!=0){if(this.length>1)return this.each(function(){t(this).bxSlider(n)}),this;var s={},o=this,a=function(){s.settings=t.extend({},e,n),s.children=o.children(s.settings.slideSelector),s.active={index:s.settings.startSlide},s.carousel=s.settings.minSlides>1||s.settings.maxSlides>1,s.minThreshold=s.settings.minSlides*s.settings.slideWidth+(s.settings.minSlides-1)*s.settings.slideMargin,s.maxThreshold=s.settings.maxSlides*s.settings.slideWidth+(s.settings.maxSlides-1)*s.settings.slideMargin,s.working=!1,s.controls={},s.animProp=s.settings.mode=="vertical"?"top":"left",s.usingCSS=s.settings.useCSS&&s.settings.mode!="fade"&&function(){var t=document.createElement("div"),e=["WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var i in e)if(t.style[e[i]]!==void 0)return s.cssPrefix=e[i].replace("Perspective","").toLowerCase(),s.animProp="-"+s.cssPrefix+"-transform",!0;return!1}(),s.settings.mode=="vertical"&&(s.settings.maxSlides=s.settings.minSlides),r()},r=function(){if(o.wrap('<div class="bx-wrapper"><div class="bx-viewport"></div></div>'),s.viewport=o.parent(),s.loader=t('<div class="bx-loading" />'),s.viewport.prepend(s.loader),o.css({width:s.settings.mode=="horizontal"?s.children.length * 215 + '%':"auto",height:0,overflow:"hidden",position:"relative",margin:0,padding:0}),s.usingCSS&&s.settings.easing?o.css("-"+s.cssPrefix+"-transition-timing-function",s.settings.easing):s.settings.easing||(s.settings.easing="swing"),s.viewport.css({width:"100%",height:"50",overflow:"hidden",position:"relative"}),s.children.css({"float":s.settings.mode=="horizontal"?"left":"none",position:"relative",width:d(),listStyle:"none",marginRight:s.settings.mode=="horizontal"?s.settings.slideMargin:0,marginBottom:s.settings.mode=="vertical"?s.settings.slideMargin:0}),s.settings.mode=="fade"&&(s.children.css({position:"absolute",zIndex:0,display:"none"}),s.children.eq(s.settings.startSlide).css({zIndex:50,display:"block"})),s.controls.el=t('<div class="bx-controls" />'),s.settings.captions&&S(),s.settings.infiniteLoop&&s.settings.mode!="fade"&&!s.settings.ticker){var e=s.settings.mode=="vertical"?s.settings.minSlides:s.settings.maxSlides,i=s.children.slice(0,e).clone().addClass("bx-clone"),n=s.children.slice(-e).clone().addClass("bx-clone");o.append(i).prepend(n)}s.active.last=s.settings.startSlide==g()-1,s.settings.video&&o.fitVids(),s.settings.ticker||(s.settings.pager&&f(),s.settings.controls&&x(),s.settings.auto&&s.settings.autoControls&&m(),(s.settings.controls||s.settings.autoControls||s.settings.pager)&&s.viewport.after(s.controls.el)),setTimeout(function(){s.loader.remove(),o.css("overflow","visible"),h(),s.settings.mode=="vertical"&&(s.settings.adaptiveHeight=!0),s.viewport.animate({height:l()},200,function(){s.settings.onSliderLoad(s.active.index)}),s.settings.auto&&s.settings.autoStart&&z(),s.settings.ticker&&q(),s.settings.pager&&P(s.settings.startSlide),s.settings.controls&&y(),s.settings.touchEnabled&&!s.settings.ticker&&L()},10)},l=function(){var e=0,n=t();if(s.settings.mode=="vertical"||s.settings.adaptiveHeight)if(s.carousel){var o=s.settings.moveSlides==1?s.active.index:s.active.index*u();for(n=s.children.eq(o),i=1;s.settings.maxSlides-1>=i;i++)n=o+i>=s.children.length?n.add(s.children.eq(i-1)):n.add(s.children.eq(o+i))}else n=s.children.eq(s.active.index);else n=s.children;return s.settings.mode=="vertical"?(n.each(function(){e+=t(this).outerHeight()}),s.settings.slideMargin>0&&(e+=s.settings.slideMargin*(s.settings.minSlides-1))):e=Math.max.apply(Math,n.map(function(){return t(this).outerHeight()}).get()),e},d=function(){var t=s.settings.slideWidth,e=s.viewport.width();return s.settings.slideWidth==0?t=e:e>s.maxThreshold?t=(e-s.settings.slideMargin*(s.settings.maxSlides-1))/s.settings.maxSlides:s.minThreshold>e&&(t=(e-s.settings.slideMargin*(s.settings.minSlides-1))/s.settings.minSlides),t},c=function(){var t=1;if(s.settings.mode=="horizontal")if(s.minThreshold>s.viewport.width())t=s.settings.minSlides;else if(s.viewport.width()>s.maxThreshold)t=s.settings.maxSlides;else{var e=s.children.first().width();t=Math.floor(s.viewport.width()/e)}else s.settings.mode=="vertical"&&(t=s.settings.minSlides);return t},g=function(){var t=0;if(s.settings.moveSlides>0)if(s.settings.infiniteLoop)t=s.children.length/u();else{var e=0,i=0;while(s.children.length>e)++t,e=i+c(),i+=c()>=s.settings.moveSlides?s.settings.moveSlides:c()}else t=Math.ceil(s.children.length/c());return t},u=function(){return s.settings.moveSlides>0&&c()>=s.settings.moveSlides?s.settings.moveSlides:c()},h=function(){if(s.active.last){if(s.settings.mode=="horizontal"){var t=s.children.last(),e=t.position();p(-(e.left-(s.viewport.width()-t.width())),"reset",0)}else if(s.settings.mode=="vertical"){var i=s.children.length-s.settings.minSlides,e=s.children.eq(i).position();p(-e.top,"reset",0)}}else{var e=s.children.eq(s.active.index*u()).position();s.active.index==g()-1&&(s.active.last=!0),e!=void 0&&(s.settings.mode=="horizontal"?p(-e.left,"reset",0):s.settings.mode=="vertical"&&p(-e.top,"reset",0))}},p=function(t,e,i,n){if(s.usingCSS){var a=s.settings.mode=="vertical"?"translate3d(0, "+t+"px, 0)":"translate3d("+t+"px, 0, 0)";o.css("-"+s.cssPrefix+"-transition-duration",i/1e3+"s"),e=="slide"?(o.css(s.animProp,a),o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),A()})):e=="reset"?o.css(s.animProp,a):e=="ticker"&&(o.css("-"+s.cssPrefix+"-transition-timing-function","linear"),o.css(s.animProp,a),o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),p(n.resetValue,"reset",0),M()}))}else{var r={};r[s.animProp]=t,e=="slide"?o.animate(r,i,s.settings.easing,function(){A()}):e=="reset"?o.css(s.animProp,t):e=="ticker"&&o.animate(r,speed,"linear",function(){p(n.resetValue,"reset",0),M()})}},v=function(){var e="";pagerQty=g();for(var i=0;pagerQty>i;i++){var n="";s.settings.buildPager&&t.isFunction(s.settings.buildPager)?(n=s.settings.buildPager(i),s.pagerEl.addClass("bx-custom-pager")):(n=i+1,s.pagerEl.addClass("bx-default-pager")),e+='<div class="bx-pager-item"><a href="" data-slide-index="'+i+'" class="bx-pager-link">'+n+"</a></div>"}s.pagerEl.html(e)},f=function(){s.settings.pagerCustom?s.pagerEl=t(s.settings.pagerCustom):(s.pagerEl=t('<div class="bx-pager" />'),s.settings.pagerSelector?t(s.settings.pagerSelector).html(s.pagerEl):s.controls.el.addClass("bx-has-pager").append(s.pagerEl),v()),s.pagerEl.delegate("a","click",E)},x=function(){s.controls.next=t('<a class="bx-next" href="">'+s.settings.nextText+"</a>"),s.controls.prev=t('<a class="bx-prev" href="">'+s.settings.prevText+"</a>"),s.controls.next.bind("click",b),s.controls.prev.bind("click",w),s.settings.nextSelector&&t(s.settings.nextSelector).append(s.controls.next),s.settings.prevSelector&&t(s.settings.prevSelector).append(s.controls.prev),s.settings.nextSelector||s.settings.prevSelector||(s.controls.directionEl=t('<div class="bx-controls-direction" />'),s.controls.directionEl.append(s.controls.prev).append(s.controls.next),s.controls.el.addClass("bx-has-controls-direction").append(s.controls.directionEl))},m=function(){s.controls.start=t('<div class="bx-controls-auto-item"><a class="bx-start" href="">'+s.settings.startText+"</a></div>"),s.controls.stop=t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">'+s.settings.stopText+"</a></div>"),s.controls.autoEl=t('<div class="bx-controls-auto" />'),s.controls.autoEl.delegate(".bx-start","click",T),s.controls.autoEl.delegate(".bx-stop","click",C),s.settings.autoControlsCombine?s.controls.autoEl.append(s.controls.start):s.controls.autoEl.append(s.controls.start).append(s.controls.stop),s.settings.autoControlsSelector?t(s.settings.autoControlsSelector).html(s.controls.autoEl):s.controls.el.addClass("bx-has-controls-auto").append(s.controls.autoEl),k(s.settings.autoStart?"stop":"start")},S=function(){s.children.each(function(){var e=t(this).find("img:first").attr("title");e!=void 0&&t(this).append('<div class="bx-caption"><span>'+e+"</span></div>")})},b=function(t){s.settings.auto&&o.stopAuto(),o.goToNextSlide(),t.preventDefault()},w=function(t){s.settings.auto&&o.stopAuto(),o.goToPrevSlide(),t.preventDefault()},T=function(t){o.startAuto(),t.preventDefault()},C=function(t){o.stopAuto(),t.preventDefault()},E=function(e){s.settings.auto&&o.stopAuto();var i=t(e.currentTarget),n=parseInt(i.attr("data-slide-index"));n!=s.active.index&&o.goToSlide(n),e.preventDefault()},P=function(t){return s.settings.pagerType=="short"?(s.pagerEl.html(t+1+s.settings.pagerShortSeparator+s.children.length),void 0):(s.pagerEl.find("a").removeClass("active"),s.pagerEl.find("a").eq(t).addClass("active"),void 0)},A=function(){if(s.settings.infiniteLoop){var t="";s.active.index==0?t=s.children.eq(0).position():s.active.index==g()-1&&s.carousel?t=s.children.eq((g()-1)*u()).position():s.active.index==s.children.length-1&&(t=s.children.eq(s.children.length-1).position()),s.settings.mode=="horizontal"?p(-t.left,"reset",0):s.settings.mode=="vertical"&&p(-t.top,"reset",0)}s.working=!1,s.settings.onSlideAfter(s.children.eq(s.active.index),s.oldIndex,s.active.index)},k=function(t){s.settings.autoControlsCombine?s.controls.autoEl.html(s.controls[t]):(s.controls.autoEl.find("a").removeClass("active"),s.controls.autoEl.find("a:not(.bx-"+t+")").addClass("active"))},y=function(){!s.settings.infiniteLoop&&s.settings.hideControlOnEnd&&(s.active.index==0?(s.controls.prev.addClass("disabled"),s.controls.next.removeClass("disabled")):s.active.index==g()-1?(s.controls.next.addClass("disabled"),s.controls.prev.removeClass("disabled")):(s.controls.prev.removeClass("disabled"),s.controls.next.removeClass("disabled")))},z=function(){s.settings.autoDelay>0?setTimeout(o.startAuto,s.settings.autoDelay):o.startAuto(),s.settings.autoHover&&o.hover(function(){s.interval&&(o.stopAuto(!0),s.autoPaused=!0)},function(){s.autoPaused&&(o.startAuto(!0),s.autoPaused=null)})},q=function(){var e=0;if(s.settings.autoDirection=="next")o.append(s.children.clone().addClass("bx-clone"));else{o.prepend(s.children.clone().addClass("bx-clone"));var i=s.children.first().position();e=s.settings.mode=="horizontal"?-i.left:-i.top}p(e,"reset",0),s.settings.pager=!1,s.settings.controls=!1,s.settings.autoControls=!1,s.settings.tickerHover&&!s.usingCSS&&s.viewport.hover(function(){o.stop()},function(){var e=0;s.children.each(function(){e+=s.settings.mode=="horizontal"?t(this).outerWidth(!0):t(this).outerHeight(!0)});var i=s.settings.speed/e,n=s.settings.mode=="horizontal"?"left":"top",a=i*(e-Math.abs(parseInt(o.css(n))));M(a)}),M()},M=function(t){speed=t?t:s.settings.speed;var e={left:0,top:0},i={left:0,top:0};s.settings.autoDirection=="next"?e=o.find(".bx-clone").first().position():i=s.children.first().position();var n=s.settings.mode=="horizontal"?-e.left:-e.top,a=s.settings.mode=="horizontal"?-i.left:-i.top,r={resetValue:a};p(n,"ticker",speed,r)},L=function(){s.touch={start:{x:0,y:0},end:{x:0,y:0}},s.viewport.bind("touchstart",D)},D=function(t){if(s.working)t.preventDefault();else{s.touch.originalPos=o.position();var e=t.originalEvent;s.touch.start.x=e.changedTouches[0].pageX,s.touch.start.y=e.changedTouches[0].pageY,s.viewport.bind("touchmove",H),s.viewport.bind("touchend",I)}},H=function(t){if(t.preventDefault(),s.settings.mode!="fade"){var e=t.originalEvent,i=0;if(s.settings.mode=="horizontal"){var n=e.changedTouches[0].pageX-s.touch.start.x;i=s.touch.originalPos.left+n}else{var n=e.changedTouches[0].pageY-s.touch.start.y;i=s.touch.originalPos.top+n}p(i,"reset",0)}},I=function(t){s.viewport.unbind("touchmove",H);var e=t.originalEvent,i=0;if(s.touch.end.x=e.changedTouches[0].pageX,s.touch.end.y=e.changedTouches[0].pageY,s.settings.mode=="fade"){var n=Math.abs(s.touch.start.x-s.touch.end.x);n>=s.settings.swipeThreshold&&(s.touch.start.x>s.touch.end.x?o.goToNextSlide():o.goToPrevSlide(),o.stopAuto())}else{var n=0;s.settings.mode=="horizontal"?(n=s.touch.end.x-s.touch.start.x,i=s.touch.originalPos.left):(n=s.touch.end.y-s.touch.start.y,i=s.touch.originalPos.top),!s.settings.infiniteLoop&&(s.active.index==0&&n>0||s.active.last&&0>n)?p(i,"reset",200):Math.abs(n)>=s.settings.swipeThreshold?(0>n?o.goToNextSlide():o.goToPrevSlide(),o.stopAuto()):p(i,"reset",200)}s.viewport.unbind("touchend",I)};o.goToSlide=function(e,i){if(!s.working&&s.active.index!=e)if(s.working=!0,s.oldIndex=s.active.index,s.active.index=0>e?g()-1:e>=g()?0:e,s.settings.onSlideBefore(s.children.eq(s.active.index),s.oldIndex,s.active.index),i=="next"?s.settings.onSlideNext(s.children.eq(s.active.index),s.oldIndex,s.active.index):i=="prev"&&s.settings.onSlidePrev(s.children.eq(s.active.index),s.oldIndex,s.active.index),s.active.last=s.active.index>=g()-1,s.settings.pager&&P(s.active.index),s.settings.controls&&y(),s.settings.mode=="fade")s.settings.adaptiveHeight&&s.viewport.height()!=l()&&s.viewport.animate({height:l()},s.settings.adaptiveHeightSpeed),s.children.filter(":visible").fadeOut(s.settings.speed).css({zIndex:0}),s.children.eq(s.active.index).css("zIndex",51).fadeIn(s.settings.speed,function(){t(this).css("zIndex",50),A()});else{s.settings.adaptiveHeight&&s.viewport.height()!=l()&&s.viewport.animate({height:l()},s.settings.adaptiveHeightSpeed);var n=0,a={left:0,top:0};if(!s.settings.infiniteLoop&&s.carousel&&s.active.last)if(s.settings.mode=="horizontal"){var r=s.children.eq(s.children.length-1);a=r.position(),n=s.viewport.width()-r.width()}else{var d=s.children.length-s.settings.minSlides;a=s.children.eq(d).position()}else if(s.carousel&&s.active.last&&i=="prev"){var c=s.settings.moveSlides==1?s.settings.maxSlides-u():(g()-1)*u()-(s.children.length-s.settings.maxSlides),r=o.children(".bx-clone").eq(c);a=r.position()}else if(i=="next"&&s.active.index==0)a=o.find(".bx-clone").eq(s.settings.maxSlides).position(),s.active.last=!1;else if(e>=0){var h=e*u();a=s.children.eq(h).position()}var v=s.settings.mode=="horizontal"?-(a.left-n):-a.top;p(v,"slide",s.settings.speed)}},o.goToNextSlide=function(){if(s.settings.infiniteLoop||!s.active.last){var t=s.active.index+1;$(o).find('li').filter(":gt("+s.active.index+")").imagesLoaded(function(){o.goToSlide(t,"next");});}},o.goToPrevSlide=function(){if(s.settings.infiniteLoop||s.active.index!=0){var t=s.active.index-1;o.goToSlide(t,"prev")}},o.startAuto=function(t){s.interval||(s.interval=setInterval(function(){s.settings.autoDirection=="next"?o.goToNextSlide():o.goToPrevSlide()},s.settings.pause),s.settings.autoControls&&t!=1&&k("stop"))},o.stopAuto=function(t){s.interval&&(clearInterval(s.interval),s.interval=null,s.settings.autoControls&&t!=1&&k("start"))},o.getCurrentSlide=function(){return s.active.index},o.getSlideCount=function(){return s.children.length};var W=t(window).width(),N=t(window).height();return t(window).resize(function(){var e=t(window).width(),i=t(window).height();(W!=e||N!=i)&&(W=e,N=i,s.children.add(o.find(".bx-clone")).width(d()),s.viewport.css("height",l()),s.active.last&&(s.active.index=g()-1),s.active.index>=g()&&(s.active.last=!0),s.settings.pager&&!s.settings.pagerCustom&&(v(),P(s.active.index)),s.settings.ticker||h())}),a(),this}}})(jQuery),function(t,e){var i="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";t.fn.imagesLoaded=function(n){function s(){var e=t(g),i=t(u);r&&(u.length?r.reject(d,e,i):r.resolve(d)),t.isFunction(n)&&n.call(a,d,e,i)}function o(e,n){e.src===i||-1!==t.inArray(e,c)||(c.push(e),n?u.push(e):g.push(e),t.data(e,"imagesLoaded",{isBroken:n,src:e.src}),l&&r.notifyWith(t(e),[n,d,t(g),t(u)]),d.length===c.length&&(setTimeout(s),d.unbind(".imagesLoaded")))}var a=this,r=t.isFunction(t.Deferred)?t.Deferred():0,l=t.isFunction(r.notify),d=a.find("img").add(a.filter("img")),c=[],g=[],u=[];return t.isPlainObject(n)&&t.each(n,function(t,e){"callback"===t?n=e:r&&r[t](e)}),d.length?d.bind("load.imagesLoaded error.imagesLoaded",function(t){o(t.target,"error"===t.type)}).each(function(n,s){var a=s.src,r=t.data(s,"imagesLoaded");r&&r.src===a?o(s,r.isBroken):s.complete&&s.naturalWidth!==e?o(s,0===s.naturalWidth||0===s.naturalHeight):(s.readyState||s.complete)&&(s.src=i,s.src=a)}):s(),r?r.promise(a):a}}(jQuery)