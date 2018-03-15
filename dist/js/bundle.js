!function(t,e){"use strict";var r=t.jQuery||t.Zepto,a=0,n=!1;function i(a,i,o,l,u){var f=0,c=-1,s=-1,d=!1,A="afterLoad",g="load",h="error",m="img",b="src",v="srcset",p="sizes",y="background-image";function z(){var e,n,f,A;d=t.devicePixelRatio>1,o=w(o),i.delay>=0&&setTimeout(function(){B(!0)},i.delay),(i.delay<0||i.combined)&&(l.e=(e=i.throttle,n=function(t){"resize"===t.type&&(c=s=-1),B(t.all)},A=0,function(t,r){var o=+new Date-A;function l(){A=+new Date,n.call(a,t)}f&&clearTimeout(f),o>e||!i.enableThrottle||r?l():f=setTimeout(l,e-o)}),l.a=function(t){t=w(t),o.push.apply(o,t)},l.g=function(){return o=r(o).filter(function(){return!r(this).data(i.loadedName)})},l.f=function(t){for(var e=0;e<t.length;e++){var r=o.filter(function(){return this===t[e]});r.length&&B(!1,r)}},B(),r(i.appendScroll).on("scroll."+u+" resize."+u,l.e))}function w(t){for(var n=i.defaultImage,o=i.placeholder,l=i.imageBase,u=i.srcsetAttribute,f=i.loaderAttribute,c=i._f||{},s=0,d=(t=r(t).filter(function(){var t=r(this),a=D(this);return!t.data(i.handledName)&&(t.attr(i.attribute)||t.attr(u)||t.attr(f)||c[a]!==e)}).data("plugin_"+i.name,a)).length;s<d;s++){var A=r(t[s]),g=D(t[s]),h=A.attr(i.imageBaseAttribute)||l;g===m&&h&&A.attr(u)&&A.attr(u,I(A.attr(u),h)),c[g]===e||A.attr(f)||A.attr(f,c[g]),g===m&&n&&!A.attr(b)?A.attr(b,n):g===m||!o||A.css(y)&&"none"!==A.css(y)||A.css(y,"url('"+o+"')")}return t}function B(t,e){if(o.length){for(var n=e||o,l=!1,u=i.imageBase||"",f=i.srcsetAttribute,c=i.handledName,s=0;s<n.length;s++)if(t||e||T(n[s])){var d=r(n[s]),A=D(n[s]),g=d.attr(i.attribute),h=d.attr(i.imageBaseAttribute)||u,p=d.attr(i.loaderAttribute);d.data(c)||i.visibleOnly&&!d.is(":visible")||!((g||d.attr(f))&&(A===m&&(h+g!==d.attr(b)||d.attr(f)!==d.attr(v))||A!==m&&h+g!==d.css(y))||p)||(l=!0,d.data(c,!0),L(d,A,h,p))}l&&(o=r(o).filter(function(){return!r(this).data(c)}))}else i.autoDestroy&&a.destroy()}function L(t,e,a,n){++f;var o=function(){E("onError",t),N(),o=r.noop};E("beforeLoad",t);var l=i.attribute,u=i.srcsetAttribute,c=i.sizesAttribute,s=i.retinaAttribute,z=i.removeAttribute,w=i.loadedName,B=t.attr(s);if(n){var L=function(){z&&t.removeAttr(i.loaderAttribute),t.data(w,!0),E(A,t),setTimeout(N,1),L=r.noop};t.off(h).one(h,o).one(g,L),E(n,t,function(e){e?(t.off(g),L()):(t.off(h),o())})||t.trigger(h)}else{var T=r(new Image);T.one(h,o).one(g,function(){t.hide(),e===m?t.attr(p,T.attr(p)).attr(v,T.attr(v)).attr(b,T.attr(b)):t.css(y,"url('"+T.attr(b)+"')"),t[i.effect](i.effectTime),z&&(t.removeAttr(l+" "+u+" "+s+" "+i.imageBaseAttribute),c!==p&&t.removeAttr(c)),t.data(w,!0),E(A,t),T.remove(),N()});var D=(d&&B?B:t.attr(l))||"";T.attr(p,t.attr(c)).attr(v,t.attr(u)).attr(b,D?a+D:null),T.complete&&T.trigger(g)}}function T(e){var a=e.getBoundingClientRect(),n=i.scrollDirection,o=i.threshold,l=(s>=0?s:s=r(t).height())+o>a.top&&-o<a.bottom,u=(c>=0?c:c=r(t).width())+o>a.left&&-o<a.right;return"vertical"===n?l:"horizontal"===n?u:l&&u}function D(t){return t.tagName.toLowerCase()}function I(t,e){if(e){var r=t.split(",");t="";for(var a=0,n=r.length;a<n;a++)t+=e+r[a].trim()+(a!==n-1?",":"")}return t}function N(){--f,o.length||f||E("onFinishedAll")}function E(t,e,r){return!!(t=i[t])&&(t.apply(a,[].slice.call(arguments,1)),!0)}"event"===i.bind||n?z():r(t).on(g+"."+u,z)}function o(n,o){var l=this,u=r.extend({},l.config,o),f={},c=u.name+"-"+ ++a;return l.config=function(t,r){return r===e?u[t]:(u[t]=r,l)},l.addItems=function(t){return f.a&&f.a("string"===r.type(t)?r(t):t),l},l.getItems=function(){return f.g?f.g():{}},l.update=function(t){return f.e&&f.e({},!t),l},l.force=function(t){return f.f&&f.f("string"===r.type(t)?r(t):t),l},l.loadAll=function(){return f.e&&f.e({all:!0},!0),l},l.destroy=function(){return r(u.appendScroll).off("."+c,f.e),r(t).off("."+c),f={},e},i(l,u,n,f,c),u.chainable?n:l}r.fn.Lazy=r.fn.lazy=function(t){return new o(this,t)},r.Lazy=r.lazy=function(t,a,n){if(r.isFunction(a)&&(n=a,a=[]),r.isFunction(n)){t=r.isArray(t)?t:[t],a=r.isArray(a)?a:[a];for(var i=o.prototype.config,l=i._f||(i._f={}),u=0,f=t.length;u<f;u++)(i[t[u]]===e||r.isFunction(i[t[u]]))&&(i[t[u]]=n);for(var c=0,s=a.length;c<s;c++)l[a[c]]=t[0]}},o.prototype.config={name:"lazy",chainable:!0,autoDestroy:!0,bind:"load",threshold:500,visibleOnly:!1,appendScroll:t,scrollDirection:"both",imageBase:null,defaultImage:"data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==",placeholder:null,delay:-1,combined:!1,attribute:"data-src",srcsetAttribute:"data-srcset",sizesAttribute:"data-sizes",retinaAttribute:"data-retina",loaderAttribute:"data-loader",imageBaseAttribute:"data-imagebase",removeAttribute:!0,handledName:"handled",loadedName:"loaded",effect:"show",effectTime:0,enableThrottle:!0,throttle:250,beforeLoad:e,afterLoad:e,onError:e,onFinishedAll:e},r(t).on("load",function(){n=!0})}(window);
!function(e){function n(n){var o,a,t=n.find(".marker"),g={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},r=new google.maps.Map(n[0],g);return r.markers=[],t.each(function(){!function(e,n){var o=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),a=new google.maps.Marker({position:o,map:n});if(n.markers.push(a),e.html()){var t=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(a,"click",function(){t.open(n,a)})}}(e(this),r)}),o=r,a=new google.maps.LatLngBounds,e.each(o.markers,function(e,n){var o=new google.maps.LatLng(n.position.lat(),n.position.lng());a.extend(o)}),1==o.markers.length?(o.setCenter(a.getCenter()),o.setZoom(16)):o.fitBounds(a),r}e(document).ready(function(){e(".acf-map").each(function(){n(e(this))})})}(jQuery);
!function(e){var a,n,t,i,s;function r(){"block"===e(".menu-toggle").css("display")?(n.hasClass("toggled")?n.attr("aria-expanded","true"):n.attr("aria-expanded","false"),t.closest(".main-navigation").hasClass("toggled")?t.attr("aria-expanded","true"):t.attr("aria-expanded","false")):(n.removeAttr("aria-expanded"),t.removeAttr("aria-expanded"),n.removeAttr("aria-controls"))}i=e(".main-navigation"),s=e("<button />",{class:"menu-toggle","aria-expanded":!1}).append(e("<span />",{class:"dropdown-symbol",text:"+"})).append(e("<span />",{class:"screen-reader-text",text:sverigestamfagelforeningScreenReaderText.expand})),i.find(".menu-item-has-children > a, .page_item_has_children > a").after(s),i.find(".menu-toggle").click(function(a){var n=e(this),t=n.find(".screen-reader-text");dropdownSymbol=n.find(".dropdown-symbol"),dropdownSymbol.text("-"===dropdownSymbol.text()?"+":"-"),a.preventDefault(),n.toggleClass("toggled"),n.next(".children, .sub-menu").toggleClass("toggled"),n.attr("aria-expanded","false"===n.attr("aria-expanded")?"true":"false"),t.text(t.text()===sverigestamfagelforeningScreenReaderText.expand?sverigestamfagelforeningScreenReaderText.collapse:sverigestamfagelforeningScreenReaderText.expand)}),a=e("#masthead"),n=a.find(".menu-toggle"),t=a.find(".main-navigation > div > ul"),n.length&&(n.add(t).attr("aria-expanded","false"),n.on("click.sverigestamfagelforening",function(){e(t.closest(".main-navigation"),this).toggleClass("toggled"),e(this).add(t).attr("aria-expanded","false"===e(this).add(t).attr("aria-expanded")?"true":"false")})),function(){function a(){"none"===e(".menu-toggle").css("display")?(e(document.body).on("touchstart.sverigestamfagelforening",function(a){e(a.target).closest(".main-navigation li").length||e(".main-navigation li").removeClass("focus")}),t.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart.sverigestamfagelforening",function(a){var n=e(this).parent("li");n.hasClass("focus")||(a.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})):t.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart.sverigestamfagelforening")}t.length&&t.children().length&&("ontouchstart"in window&&(e(window).on("resize.sverigestamfagelforening",a),a()),t.find("a").on("focus.sverigestamfagelforening blur.sverigestamfagelforening",function(){e(this).parents(".menu-item, .page_item").toggleClass("focus")}))}(),e(document).ready(function(){e(window).on("load.sverigestamfagelforening",r),e(window).on("resize.sverigestamfagelforening",r)});var o=e(".menu-item-has-children");o.click(function(){o.hasClass("toggle"),e(this).find("ul").toggleClass("toggle")})}(jQuery);
!function(e){e(".onboard-slider");var t=e(".onboard-slider .holder"),n=e(".onboard-slider .slide"),i=e(".bli-medlem .slide-navigation"),d=0,l=0;t.css({width:100*n.length+"%"}),n.css({width:100/n.length+"%"}),e(n[d]).addClass("current"),e(".wpcf7").on("wpcf7mailsent",function(){o()}),e(".buttons .previous").click(function(){d>0&&function(){e(n[d]).removeClass("current"),e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).removeClass("active"),l<0&&(l+=100,e(n[--d]).addClass("current"),t.css({left:l+"%"}),e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).addClass("active"));c()}()}),e(".bli-medlem .begin").click(function(){n.length-1>d&&o()});var a=0;function o(){e(n[d]).removeClass("current"),e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).removeClass("active"),l>-(100*n.length-100)&&(l-=100,e(n[++d]).addClass("current"),t.css({left:l+"%"}),e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).addClass("active")),c()}function s(i){e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).removeClass("active"),l=-100*(d=i),e(n[d]).removeClass("current"),e(n[d]).addClass("current"),t.css({left:l+"%"}),e(document.querySelectorAll(".bli-medlem .slide-navigation div")[d]).addClass("active"),c()}function c(){0===d?(e(".previous").fadeOut(),e(".container h4:nth-of-type(2)").fadeOut(),setTimeout(function(){e(".buttons .begin").fadeIn(),e(".container h4:nth-of-type(1)").fadeIn()},400)):d!=n.length-1?(e(".buttons .begin").fadeOut(),e(".container h4:nth-of-type(1)").fadeOut(),setTimeout(function(){e(".container h4:nth-of-type(2)").fadeIn(),e(".previous").fadeIn()},400)):(i.fadeOut(),e(".container h4:nth-of-type(2)").fadeOut(),e(".buttons .previous").fadeOut(),setTimeout(function(){e(".container h4:nth-of-type(3)").fadeIn()},400))}n.map(function(e){0===a?i.append('<div class="active"></div>'):i.append("<div></div>"),a++}),i.find("div:not(:last-child)").click(function(){d<e(this).index()&&(e(this).removeClass("active"),s(e(this).index())),d>e(this).index()&&(e(this).removeClass("active"),s(e(this).index()))})}(jQuery);
function isMobile(){if(/Mobi/.test(navigator.userAgent))return!0}!function(o){var t=o(".site-header"),i=(o("html, body").scrollTop(),o(".main-navigation")),s=i.height(),n=i.offset().top;isMobile()?t.css({"padding-bottom":s}):o(window).scroll(function(){o("html, body").scrollTop()>n?(i.addClass("stick"),t.css({"padding-bottom":s})):(i.removeClass("stick"),t.css({"padding-bottom":0}))}),o(".lazy").Lazy()}(jQuery);
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1)}();
!function(s){s(".stf-slider");var e=s(".stf-slider ul"),l=s(".stf-slider ul .slide"),t=s(".stf-slider .previous"),d=s(".stf-slider .next"),n=0,i=0,r=setInterval(c,7e3);function c(){s(l[n]).find("div").removeClass("current"),i>-(100*l.length-100)?(i-=100,s(l[++n]).find("div").addClass("current"),s(".stf-slider ul").css({left:i+"%"})):(i=0,s(l[n=0]).find("div").addClass("current"),s(".stf-slider ul").css({left:i}))}1===l.length&&(t.css({display:"none"}),d.css({display:"none"})),e.css({width:100*l.length+"%"}),l.css({width:100/l.length+"%"}),s(l[n]).find("div").addClass("current"),t.click(function(){s(l[n]).find("div").removeClass("current"),i<0?(i+=100,s(l[--n]).find("div").addClass("current"),s(".stf-slider ul").css({left:i+"%"})):(n=l.length-1,i=-100*l.length+100,s(l[n]).find("div").addClass("current"),s(".stf-slider ul").css({left:i+"%"})),clearInterval(r),r=setInterval(c,7e3)}),d.click(function(){c(),clearInterval(r),r=setInterval(c,7e3)})}(jQuery);