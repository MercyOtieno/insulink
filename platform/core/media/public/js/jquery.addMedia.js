!function(e){var t={};function r(a){if(t[a])return t[a].exports;var n=t[a]={i:a,l:!1,exports:{}};return e[a].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)r.d(a,n,function(t){return e[t]}.bind(null,n));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=429)}({429:function(e,t,r){e.exports=r(430)},430:function(e,t){function r(e){return(r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(e){"use strict";var t=function(t,r){this.options=r,e(t).rvMedia({multiple:!0,onSelectFiles:function(t,a){if(void 0!==t)switch(a.data("editor")){case"summernote":!function(t,r){if(0===r.length)return;for(var a=t.data("target"),n=0;n<r.length;n++)if("video"===r[n].type){var o=r[n].full_url;o=o.replace("watch?v=","embed/"),e(a).summernote("pasteHTML",'<iframe width="420" height="315" src="'+o+'" frameborder="0" allowfullscreen></iframe>')}else"image"===r[n].type?e(a).summernote("insertImage",r[n].full_url,r[n].basename):e(a).summernote("pasteHTML",'<a href="'+r[n].full_url+'">'+r[n].full_url+"</a>")}(a,t);break;case"wysihtml5":!function(e,t){if(0===t.length)return;for(var r="",a=0;a<t.length;a++)if("video"===t[a].type){var n=t[a].full_url;n=n.replace("watch?v=","embed/"),r+='<iframe width="420" height="315" src="'+n+'" frameborder="0" allowfullscreen></iframe>'}else"image"===t[a].type?r+='<img src="'+t[a].full_url+'" alt="'+t[a].name+'">':r+='<a href="'+t[a].full_url+'">'+t[a].full_url+"</a>";if(e.getValue().length>0){var o=e.getValue();e.composer.commands.exec("insertHTML",r),e.getValue()===o&&e.setValue(e.getValue()+r)}else e.setValue(e.getValue()+r)}(e(r.target).data("wysihtml5").editor,t);break;case"ckeditor":!function(t,r){var a=t.data("target").replace("#",""),n="";e.each(r,(function(e,t){var r=t.full_url;"youtube"===t.type?(r=r.replace("watch?v=","embed/"),n+='<iframe width="420" height="315" src="'+r+'" frameborder="0" allowfullscreen></iframe><br />'):"image"===t.type?n+='<img src="'+r+'" alt="'+t.name+'" /><br />':n+='<a href="'+r+'">'+t.name+"</a><br />"})),CKEDITOR.instances[a].insertHtml(n)}(a,t);break;case"tinymce":!function(t){var r="";e.each(t,(function(e,t){var a=t.full_url;"youtube"===t.type?(a=a.replace("watch?v=","embed/"),r+='<iframe width="420" height="315" src="'+a+'" frameborder="0" allowfullscreen></iframe><br />'):"image"===t.type?r+='<img src="'+a+'" alt="'+t.name+'" /><br />':r+='<a href="'+a+'">'+t.name+"</a><br />"})),tinymce.activeEditor.execCommand("mceInsertContent",!1,r)}(t)}}})};function a(a){return this.each((function(){var n=e(this),o=n.data("bs.media"),l=e.extend({},n.data(),"object"===r(a)&&a);o||n.data("bs.media",new t(this,l))}))}t.VERSION="1.1.0",e.fn.addMedia=a,e.fn.addMedia.Constructor=t,e(window).on("load",(function(){e('[data-type="rv-media"]').each((function(){var t=e(this);a.call(t,t.data())}))}))}(jQuery)}});