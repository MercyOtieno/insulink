/*! For license information please see plugin.js.LICENSE.txt */
(()=>{function t(e){return t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},t(e)}function e(t,e){var n="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!n){if(Array.isArray(t)||(n=function(t,e){if(!t)return;if("string"==typeof t)return r(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return r(t,e)}(t))||e&&t&&"number"==typeof t.length){n&&(t=n);var o=0,a=function(){};return{s:a,n:function(){return o>=t.length?{done:!0}:{done:!1,value:t[o++]}},e:function(t){throw t},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,u=!0,c=!1;return{s:function(){n=n.call(t)},n:function(){var t=n.next();return u=t.done,t},e:function(t){c=!0,i=t},f:function(){try{u||null==n.return||n.return()}finally{if(c)throw i}}}}function r(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}function n(){"use strict";n=function(){return r};var e,r={},o=Object.prototype,a=o.hasOwnProperty,i=Object.defineProperty||function(t,e,r){t[e]=r.value},u="function"==typeof Symbol?Symbol:{},c=u.iterator||"@@iterator",l=u.asyncIterator||"@@asyncIterator",s=u.toStringTag||"@@toStringTag";function f(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{f({},"")}catch(e){f=function(t,e,r){return t[e]=r}}function p(t,e,r,n){var o=e&&e.prototype instanceof b?e:b,a=Object.create(o.prototype),u=new C(n||[]);return i(a,"_invoke",{value:P(t,r,u)}),a}function h(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}r.wrap=p;var d="suspendedStart",v="suspendedYield",m="executing",g="completed",y={};function b(){}function w(){}function x(){}var k={};f(k,c,(function(){return this}));var E=Object.getPrototypeOf,j=E&&E(E(B([])));j&&j!==o&&a.call(j,c)&&(k=j);var O=x.prototype=b.prototype=Object.create(k);function L(t){["next","throw","return"].forEach((function(e){f(t,e,(function(t){return this._invoke(e,t)}))}))}function S(e,r){function n(o,i,u,c){var l=h(e[o],e,i);if("throw"!==l.type){var s=l.arg,f=s.value;return f&&"object"==t(f)&&a.call(f,"__await")?r.resolve(f.__await).then((function(t){n("next",t,u,c)}),(function(t){n("throw",t,u,c)})):r.resolve(f).then((function(t){s.value=t,u(s)}),(function(t){return n("throw",t,u,c)}))}c(l.arg)}var o;i(this,"_invoke",{value:function(t,e){function a(){return new r((function(r,o){n(t,e,r,o)}))}return o=o?o.then(a,a):a()}})}function P(t,r,n){var o=d;return function(a,i){if(o===m)throw new Error("Generator is already running");if(o===g){if("throw"===a)throw i;return{value:e,done:!0}}for(n.method=a,n.arg=i;;){var u=n.delegate;if(u){var c=_(u,n);if(c){if(c===y)continue;return c}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(o===d)throw o=g,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);o=m;var l=h(t,r,n);if("normal"===l.type){if(o=n.done?g:v,l.arg===y)continue;return{value:l.arg,done:n.done}}"throw"===l.type&&(o=g,n.method="throw",n.arg=l.arg)}}}function _(t,r){var n=r.method,o=t.iterator[n];if(o===e)return r.delegate=null,"throw"===n&&t.iterator.return&&(r.method="return",r.arg=e,_(t,r),"throw"===r.method)||"return"!==n&&(r.method="throw",r.arg=new TypeError("The iterator does not provide a '"+n+"' method")),y;var a=h(o,t.iterator,r.arg);if("throw"===a.type)return r.method="throw",r.arg=a.arg,r.delegate=null,y;var i=a.arg;return i?i.done?(r[t.resultName]=i.value,r.next=t.nextLoc,"return"!==r.method&&(r.method="next",r.arg=e),r.delegate=null,y):i:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,y)}function $(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function T(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function C(t){this.tryEntries=[{tryLoc:"root"}],t.forEach($,this),this.reset(!0)}function B(r){if(r||""===r){var n=r[c];if(n)return n.call(r);if("function"==typeof r.next)return r;if(!isNaN(r.length)){var o=-1,i=function t(){for(;++o<r.length;)if(a.call(r,o))return t.value=r[o],t.done=!1,t;return t.value=e,t.done=!0,t};return i.next=i}}throw new TypeError(t(r)+" is not iterable")}return w.prototype=x,i(O,"constructor",{value:x,configurable:!0}),i(x,"constructor",{value:w,configurable:!0}),w.displayName=f(x,s,"GeneratorFunction"),r.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===w||"GeneratorFunction"===(e.displayName||e.name))},r.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,x):(t.__proto__=x,f(t,s,"GeneratorFunction")),t.prototype=Object.create(O),t},r.awrap=function(t){return{__await:t}},L(S.prototype),f(S.prototype,l,(function(){return this})),r.AsyncIterator=S,r.async=function(t,e,n,o,a){void 0===a&&(a=Promise);var i=new S(p(t,e,n,o),a);return r.isGeneratorFunction(e)?i:i.next().then((function(t){return t.done?t.value:i.next()}))},L(O),f(O,s,"Generator"),f(O,c,(function(){return this})),f(O,"toString",(function(){return"[object Generator]"})),r.keys=function(t){var e=Object(t),r=[];for(var n in e)r.push(n);return r.reverse(),function t(){for(;r.length;){var n=r.pop();if(n in e)return t.value=n,t.done=!1,t}return t.done=!0,t}},r.values=B,C.prototype={constructor:C,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=e,this.done=!1,this.delegate=null,this.method="next",this.arg=e,this.tryEntries.forEach(T),!t)for(var r in this)"t"===r.charAt(0)&&a.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=e)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var r=this;function n(n,o){return u.type="throw",u.arg=t,r.next=n,o&&(r.method="next",r.arg=e),!!o}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],u=i.completion;if("root"===i.tryLoc)return n("end");if(i.tryLoc<=this.prev){var c=a.call(i,"catchLoc"),l=a.call(i,"finallyLoc");if(c&&l){if(this.prev<i.catchLoc)return n(i.catchLoc,!0);if(this.prev<i.finallyLoc)return n(i.finallyLoc)}else if(c){if(this.prev<i.catchLoc)return n(i.catchLoc,!0)}else{if(!l)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return n(i.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var n=this.tryEntries[r];if(n.tryLoc<=this.prev&&a.call(n,"finallyLoc")&&this.prev<n.finallyLoc){var o=n;break}}o&&("break"===t||"continue"===t)&&o.tryLoc<=e&&e<=o.finallyLoc&&(o=null);var i=o?o.completion:{};return i.type=t,i.arg=e,o?(this.method="next",this.next=o.finallyLoc,y):this.complete(i)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),y},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),T(r),y}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;T(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,r,n){return this.delegate={iterator:B(t),resultName:r,nextLoc:n},"next"===this.method&&(this.arg=e),y}},r}function o(t,e,r,n,o,a,i){try{var u=t[a](i),c=u.value}catch(t){return void r(t)}u.done?e(c):Promise.resolve(c).then(n,o)}function a(t){return function(){var e=this,r=arguments;return new Promise((function(n,a){var i=t.apply(e,r);function u(t){o(i,n,a,u,c,"next",t)}function c(t){o(i,n,a,u,c,"throw",t)}u(void 0)}))}}function i(e,r){for(var n=0;n<r.length;n++){var o=r[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,(a=o.key,i=void 0,i=function(e,r){if("object"!==t(e)||null===e)return e;var n=e[Symbol.toPrimitive];if(void 0!==n){var o=n.call(e,r||"default");if("object"!==t(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===r?String:Number)(e)}(a,"string"),"symbol"===t(i)?i:String(i)),o)}var a,i}var u=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var r,o,u,c,l;return r=t,o=[{key:"init",value:function(){var t=this;$(document).on("click",".btn-trigger-remove-plugin",(function(t){t.preventDefault(),$("#confirm-remove-plugin-button").data("plugin",$(t.currentTarget).data("plugin")),$("#remove-plugin-modal").modal("show")})),$(document).on("click","#confirm-remove-plugin-button",(function(t){t.preventDefault();var e=$(t.currentTarget);e.addClass("button-loading");var r=$("#remove-plugin-modal");$.ajax({url:route("plugins.remove",{plugin:e.data("plugin")}),type:"POST",data:{_method:"DELETE"},success:function(t){t.error?Botble.showError(t.message):(Botble.showSuccess(t.message),window.location.reload()),e.removeClass("button-loading"),r.modal("hide")},error:function(t){Botble.handleError(t),e.removeClass("button-loading"),r.modal("hide")}})})),$(document).on("click",".btn-trigger-update-plugin",(function(t){t.preventDefault();var e=$(t.currentTarget),r=e.data("uuid"),n=e.data("name");e.addClass("button-loading"),e.attr("disabled",!0),$.ajax({url:route("plugins.marketplace.ajax.update",{id:r,name:n}),type:"POST",success:function(t){t.error?(Botble.showError(t.message),e.removeClass("button-loading"),e.removeAttr("disabled",!0),t.data&&t.data.redirect&&window.location.href):(Botble.showSuccess(t.message),setTimeout((function(){window.location.reload()}),2e3))},error:function(t){Botble.handleError(t),e.removeClass("button-loading"),e.removeAttr("disabled",!0)}})})),$(document).on("click",".btn-trigger-change-status",function(){var e=a(n().mark((function e(r){var o,i;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(r.preventDefault(),(o=$(r.currentTarget)).addClass("button-loading"),i=o.data("plugin"),1!==o.data("status")){e.next=8;break}return e.next=7,t.activateOrDeactivatePlugin(i);case 7:return e.abrupt("return");case 8:$.ajax({url:route("plugins.check-requirement",{name:i}),type:"POST",success:function(){var e=a(n().mark((function e(r){var a,u,c,l;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(a=r.error,u=r.data,c=r.message,!a){e.next=13;break}if(!u||!u.existing_plugins_on_marketplace){e.next=10;break}return(l=$("#confirm-install-plugin-modal")).find(".modal-body #requirement-message").html(c),l.find('input[name="plugin_name"]').val(i),l.find('input[name="ids"]').val(u.existing_plugins_on_marketplace),l.modal("show"),o.removeClass("button-loading"),e.abrupt("return");case 10:Botble.showError(c),e.next=15;break;case 13:return e.next=15,t.activateOrDeactivatePlugin(i);case 15:o.removeClass("button-loading");case 16:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}(),error:function(t){Botble.handleError(t),o.removeClass("button-loading")}});case 9:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}()),$(document).on("click","#confirm-install-plugin-button",function(){var r=a(n().mark((function r(o){var a,i,u,c,l,s,f,p,h,d,v,m;return n().wrap((function(r){for(;;)switch(r.prev=r.next){case 0:(a=$(o.currentTarget)).addClass("button-loading"),i=a.parent().parent(),u=i.find('input[name="plugin_name"]').val(),c=i.find('input[name="ids"]').val(),l=[],s=e(c.split(",")),r.prev=7,s.s();case 9:if((f=s.n()).done){r.next=17;break}return p=f.value,r.next=13,t.installPlugin(p);case 13:(h=r.sent)&&l.push(h.name);case 15:r.next=9;break;case 17:r.next=22;break;case 19:r.prev=19,r.t0=r.catch(7),s.e(r.t0);case 22:return r.prev=22,s.f(),r.finish(22);case 25:d=0,v=l;case 26:if(!(d<v.length)){r.next=33;break}return m=v[d],r.next=30,t.activateOrDeactivatePlugin(m,!1);case 30:d++,r.next=26;break;case 33:return r.next=35,t.activateOrDeactivatePlugin(u);case 35:a.removeClass("button-loading"),a.text(a.data("text"));case 37:case"end":return r.stop()}}),r,null,[[7,19,22,25]])})));return function(t){return r.apply(this,arguments)}}()),this.checkUpdate()}},{key:"checkUpdate",value:function(){$.ajax({url:route("plugins.marketplace.ajax.check-update"),type:"POST",success:function(t){t.data&&Object.keys(t.data).forEach((function(e){var r=t.data[e];$('button[data-check-update="'+r.name+'"]').data("uuid",r.id).show()}))}})}},{key:"activateOrDeactivatePlugin",value:(l=a(n().mark((function t(e){var r,o=arguments;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r=!(o.length>1&&void 0!==o[1])||o[1],t.next=3,$.ajax({url:route("plugins.change.status",{name:e}),type:"POST",data:{_method:"PUT"},success:function(t){if(!t.error)return Botble.showSuccess(t.message),void(r&&($("#plugin-list #app-"+e).load(window.location.href+" #plugin-list #app-"+e+" > *"),window.location.reload()));Botble.showError(t.message)},error:function(t){Botble.handleError(t)}});case 3:case"end":return t.stop()}}),t)}))),function(t){return l.apply(this,arguments)})},{key:"installPlugin",value:(c=a(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r=null,t.next=3,$.ajax({method:"POST",url:route("plugins.marketplace.ajax.install",{id:e}),success:function(t){return r=t.error?[]:t.data},error:function(t){Botble.handleError(t)}});case 3:return t.abrupt("return",r);case 4:case"end":return t.stop()}}),t)}))),function(t){return c.apply(this,arguments)})}],o&&i(r.prototype,o),u&&i(r,u),Object.defineProperty(r,"prototype",{writable:!1}),t}();$(document).ready((function(){(new u).init()}))})();