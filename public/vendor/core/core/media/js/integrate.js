(()=>{"use strict";var e={33809:(e,t,n)=>{n.d(t,{O:()=>r,s:()=>o});var r=$.parseJSON(localStorage.getItem("MediaConfig"))||{},i={app_key:RV_MEDIA_CONFIG.random_hash?RV_MEDIA_CONFIG.random_hash:"21d06709fe1d3abcc0efddda89c4b279",request_params:{view_type:"tiles",filter:"everything",view_in:"all_media",sort_by:"created_at-desc",folder_id:0},hide_details_pane:!1,icons:{folder:"fa fa-folder"},actions_list:{basic:[{icon:"fa fa-eye",name:"Preview",action:"preview",order:0,class:"rv-action-preview"}],file:[{icon:"fa fa-link",name:"Copy link",action:"copy_link",order:0,class:"rv-action-copy-link"},{icon:"far fa-edit",name:"Rename",action:"rename",order:1,class:"rv-action-rename"},{icon:"fa fa-copy",name:"Make a copy",action:"make_copy",order:2,class:"rv-action-make-copy"}],user:[{icon:"fa fa-star",name:"Favorite",action:"favorite",order:2,class:"rv-action-favorite"},{icon:"fa fa-star",name:"Remove favorite",action:"remove_favorite",order:3,class:"rv-action-favorite"}],other:[{icon:"fa fa-download",name:"Download",action:"download",order:0,class:"rv-action-download"},{icon:"fa fa-trash",name:"Move to trash",action:"trash",order:1,class:"rv-action-trash"},{icon:"fa fa-eraser",name:"Delete permanently",action:"delete",order:2,class:"rv-action-delete"},{icon:"fa fa-undo",name:"Restore",action:"restore",order:3,class:"rv-action-restore"}]}};r.app_key&&r.app_key===i.app_key||(r=i),r.request_params.search="";var o=$.parseJSON(localStorage.getItem("RecentItems"))||[]},63363:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(33809);function i(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var o=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n,o;return t=e,o=[{key:"getUrlParam",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;t||(t=window.location.search);var n=new RegExp("(?:[?&]|&)"+e+"=([^&]+)","i"),r=t.match(n);return r&&r.length>1?r[1]:null}},{key:"asset",value:function(e){if("//"===e.substring(0,2)||"http://"===e.substring(0,7)||"https://"===e.substring(0,8))return e;var t="/"!==RV_MEDIA_URL.base_url.substr(-1,1)?RV_MEDIA_URL.base_url+"/":RV_MEDIA_URL.base_url;return"/"===e.substring(0,1)?t+e.substring(1):t+e}},{key:"showAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-main");e.addClass("on-loading").append($("#rv_media_loading").html())}},{key:"hideAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-main");e.removeClass("on-loading").find(".loading-wrapper").remove()}},{key:"isOnAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-items");return e.hasClass("on-loading")}},{key:"jsonEncode",value:function(e){return void 0===e&&(e=null),JSON.stringify(e)}},{key:"jsonDecode",value:function(e,t){if(!e)return t;if("string"==typeof e){var n;try{n=$.parseJSON(e)}catch(e){n=t}return n}return e}},{key:"getRequestParams",value:function(){return window.rvMedia.options&&"modal"===window.rvMedia.options.open_in?$.extend(!0,r.O.request_params,window.rvMedia.options||{}):r.O.request_params}},{key:"setSelectedFile",value:function(e){void 0!==window.rvMedia.options?window.rvMedia.options.selected_file_id=e:r.O.request_params.selected_file_id=e}},{key:"getConfigs",value:function(){return r.O}},{key:"storeConfig",value:function(){localStorage.setItem("MediaConfig",e.jsonEncode(r.O))}},{key:"storeRecentItems",value:function(){localStorage.setItem("RecentItems",e.jsonEncode(r.s))}},{key:"addToRecent",value:function(e){e instanceof Array?_.each(e,(function(e){r.s.push(e)})):(r.s.push(e),this.storeRecentItems())}},{key:"getItems",value:function(){var e=[];return $(".js-media-list-title").each((function(t,n){var r=$(n),i=r.data()||{};i.index_key=r.index(),e.push(i)})),e}},{key:"getSelectedItems",value:function(){var e=[];return $(".js-media-list-title input[type=checkbox]:checked").each((function(t,n){var r=$(n).closest(".js-media-list-title"),i=r.data()||{};i.index_key=r.index(),e.push(i)})),e}},{key:"getSelectedFiles",value:function(){var e=[];return $(".js-media-list-title[data-context=file] input[type=checkbox]:checked").each((function(t,n){var r=$(n).closest(".js-media-list-title"),i=r.data()||{};i.index_key=r.index(),e.push(i)})),e}},{key:"getSelectedFolder",value:function(){var e=[];return $(".js-media-list-title[data-context=folder] input[type=checkbox]:checked").each((function(t,n){var r=$(n).closest(".js-media-list-title"),i=r.data()||{};i.index_key=r.index(),e.push(i)})),e}},{key:"isUseInModal",value:function(){return"select-files"===e.getUrlParam("media-action")||window.rvMedia&&window.rvMedia.options&&"modal"===window.rvMedia.options.open_in}},{key:"resetPagination",value:function(){RV_MEDIA_CONFIG.pagination={paged:1,posts_per_page:40,in_process_get_media:!1,has_more:!0}}}],(n=null)&&i(t.prototype,n),o&&i(t,o),Object.defineProperty(t,"prototype",{writable:!1}),e}()},95498:(e,t,n)=>{n.d(t,{b:()=>s});var r=n(33809),i=n(63363),o=n(96554);function a(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var s=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n,s;return t=e,s=[{key:"handleDropdown",value:function(){var t=_.size(i.Z.getSelectedItems());e.renderActions(),t>0?$(".rv-dropdown-actions").removeClass("disabled"):$(".rv-dropdown-actions").addClass("disabled")}},{key:"handlePreview",value:function(){var e=[];_.each(i.Z.getSelectedFiles(),(function(t){_.includes(["image","pdf","text","video"],t.type)&&(e.push({src:t.full_url}),r.s.push(t.id))})),_.size(e)>0?($.fancybox.open(e),i.Z.storeRecentItems()):this.handleGlobalAction("download")}},{key:"handleCopyLink",value:function(){var e="";_.each(i.Z.getSelectedFiles(),(function(t){_.isEmpty(e)||(e+="\n"),e+=t.full_url}));var t=$(".js-rv-clipboard-temp");t.data("clipboard-text",e),new Clipboard(".js-rv-clipboard-temp",{text:function(){return e}}),o.e.showMessage("success",RV_MEDIA_CONFIG.translations.clipboard.success,RV_MEDIA_CONFIG.translations.message.success_header),t.trigger("click")}},{key:"handleGlobalAction",value:function(t,n){var r=[];switch(_.each(i.Z.getSelectedItems(),(function(e){r.push({is_folder:e.is_folder,id:e.id,full_url:e.full_url})})),t){case"rename":$("#modal_rename_items").modal("show").find("form.rv-form").data("action",t);break;case"copy_link":e.handleCopyLink();break;case"preview":e.handlePreview();break;case"trash":$("#modal_trash_items").modal("show").find("form.rv-form").data("action",t);break;case"delete":$("#modal_delete_items").modal("show").find("form.rv-form").data("action",t);break;case"empty_trash":$("#modal_empty_trash").modal("show").find("form.rv-form").data("action",t);break;case"download":var a=RV_MEDIA_URL.download,s=0;_.each(i.Z.getSelectedItems(),(function(e){_.includes(i.Z.getConfigs().denied_download,e.mime_type)||(a+=(0===s?"?":"&")+"selected["+s+"][is_folder]="+e.is_folder+"&selected["+s+"][id]="+e.id,s++)})),a!==RV_MEDIA_URL.download?window.open(a,"_blank"):o.e.showMessage("error",RV_MEDIA_CONFIG.translations.download.error,RV_MEDIA_CONFIG.translations.message.error_header);break;default:e.processAction({selected:r,action:t},n)}}},{key:"processAction",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;$.ajax({url:RV_MEDIA_URL.global_actions,type:"POST",data:e,dataType:"json",beforeSend:function(){i.Z.showAjaxLoading()},success:function(e){i.Z.resetPagination(),e.error?o.e.showMessage("error",e.message,RV_MEDIA_CONFIG.translations.message.error_header):o.e.showMessage("success",e.message,RV_MEDIA_CONFIG.translations.message.success_header),t&&t(e)},complete:function(){i.Z.hideAjaxLoading()},error:function(e){o.e.handleError(e)}})}},{key:"renderRenameItems",value:function(){var e=$("#rv_media_rename_item").html(),t=$("#modal_rename_items .rename-items").empty();_.each(i.Z.getSelectedItems(),(function(n){var r=e.replace(/__icon__/gi,n.icon||"fa fa-file").replace(/__placeholder__/gi,"Input file name").replace(/__value__/gi,n.name),i=$(r);i.data("id",n.id),i.data("is_folder",n.is_folder),i.data("name",n.name),t.append(i)}))}},{key:"renderActions",value:function(){var e=i.Z.getSelectedFolder().length>0,t=$("#rv_action_item").html(),n=0,r=$(".rv-dropdown-actions .dropdown-menu");r.empty();var o=$.extend({},!0,i.Z.getConfigs().actions_list);e&&(o.basic=_.reject(o.basic,(function(e){return"preview"===e.action})),o.file=_.reject(o.file,(function(e){return"copy_link"===e.action})),_.includes(RV_MEDIA_CONFIG.permissions,"folders.create")||(o.file=_.reject(o.file,(function(e){return"make_copy"===e.action}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.edit")||(o.file=_.reject(o.file,(function(e){return _.includes(["rename"],e.action)})),o.user=_.reject(o.user,(function(e){return _.includes(["rename"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.trash")||(o.other=_.reject(o.other,(function(e){return _.includes(["trash","restore"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.destroy")||(o.other=_.reject(o.other,(function(e){return _.includes(["delete"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.favorite")||(o.other=_.reject(o.other,(function(e){return _.includes(["favorite","remove_favorite"],e.action)}))));var a=i.Z.getSelectedFiles(),s=!1;_.each(a,(function(e){_.includes(["image","pdf","text","video"],e.type)&&(s=!0)})),s||(o.basic=_.reject(o.basic,(function(e){return"preview"===e.action}))),a.length>0&&(_.includes(RV_MEDIA_CONFIG.permissions,"files.create")||(o.file=_.reject(o.file,(function(e){return"make_copy"===e.action}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.edit")||(o.file=_.reject(o.file,(function(e){return _.includes(["rename"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.trash")||(o.other=_.reject(o.other,(function(e){return _.includes(["trash","restore"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.destroy")||(o.other=_.reject(o.other,(function(e){return _.includes(["delete"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.favorite")||(o.other=_.reject(o.other,(function(e){return _.includes(["favorite","remove_favorite"],e.action)})))),_.each(o,(function(e,o){_.each(e,(function(e,a){var s=!1;switch(i.Z.getRequestParams().view_in){case"all_media":_.includes(["remove_favorite","delete","restore"],e.action)&&(s=!0);break;case"recent":_.includes(["remove_favorite","delete","restore","make_copy"],e.action)&&(s=!0);break;case"favorites":_.includes(["favorite","delete","restore","make_copy"],e.action)&&(s=!0);break;case"trash":_.includes(["preview","delete","restore","rename","download"],e.action)||(s=!0)}if(!s){var c=t.replace(/__action__/gi,e.action||"").replace(/__icon__/gi,e.icon||"").replace(/__name__/gi,RV_MEDIA_CONFIG.translations.actions_list[o][e.action]||e.name);!a&&n&&(c='<li role="separator" class="divider"></li>'+c),r.append(c)}})),e.length>0&&n++}))}}],(n=null)&&a(t.prototype,n),s&&a(t,s),Object.defineProperty(t,"prototype",{writable:!1}),e}()},19353:(e,t,n)=>{n.d(t,{L:()=>a});var r=n(95498),i=n(63363);function o(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var a=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n,a;return t=e,a=[{key:"initContext",value:function(){jQuery().contextMenu&&($.contextMenu({selector:'.js-context-menu[data-context="file"]',build:function(){return{items:e._fileContextMenu()}}}),$.contextMenu({selector:'.js-context-menu[data-context="folder"]',build:function(){return{items:e._folderContextMenu()}}}))}},{key:"_fileContextMenu",value:function(){var e={preview:{name:"Preview",icon:function(e,t,n,r){return t.html('<i class="fa fa-eye" aria-hidden="true"></i> '+r.name),"context-menu-icon-updated"},callback:function(){r.b.handlePreview()}}};_.each(i.Z.getConfigs().actions_list,(function(t,n){_.each(t,(function(t){e[t.action]={name:t.name,icon:function(e,r,i,o){return r.html('<i class="'+t.icon+'" aria-hidden="true"></i> '+(RV_MEDIA_CONFIG.translations.actions_list[n][t.action]||o.name)),"context-menu-icon-updated"},callback:function(){$('.js-files-action[data-action="'+t.action+'"]').trigger("click")}}}))}));var t=[];switch(i.Z.getRequestParams().view_in){case"all_media":t=["remove_favorite","delete","restore"];break;case"recent":t=["remove_favorite","delete","restore","make_copy"];break;case"favorites":t=["favorite","delete","restore","make_copy"];break;case"trash":e={preview:e.preview,rename:e.rename,download:e.download,delete:e.delete,restore:e.restore}}_.each(t,(function(t){e[t]=void 0})),i.Z.getSelectedFolder().length>0&&(e.preview=void 0,e.copy_link=void 0,_.includes(RV_MEDIA_CONFIG.permissions,"folders.create")||(e.make_copy=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.edit")||(e.rename=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.trash")||(e.trash=void 0,e.restore=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.destroy")||(e.delete=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.favorite")||(e.favorite=void 0,e.remove_favorite=void 0));var n=i.Z.getSelectedFiles();n.length>0&&(_.includes(RV_MEDIA_CONFIG.permissions,"files.create")||(e.make_copy=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.edit")||(e.rename=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.trash")||(e.trash=void 0,e.restore=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.destroy")||(e.delete=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.favorite")||(e.favorite=void 0,e.remove_favorite=void 0));var o=!1;return _.each(n,(function(e){_.includes(["image","pdf","text","video"],e.type)&&(o=!0)})),o||(e.preview=void 0),e}},{key:"_folderContextMenu",value:function(){var t=e._fileContextMenu();return t.preview=void 0,t.copy_link=void 0,t}},{key:"destroyContext",value:function(){jQuery().contextMenu&&$.contextMenu("destroy")}}],(n=null)&&o(t.prototype,n),a&&o(t,a),Object.defineProperty(t,"prototype",{writable:!1}),e}()},96554:(e,t,n)=>{function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}n.d(t,{e:()=>i});var i=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n,i;return t=e,i=[{key:"showMessage",value:function(e,t){toastr.options={closeButton:!0,progressBar:!0,positionClass:"toast-bottom-right",onclick:null,showDuration:1e3,hideDuration:1e3,timeOut:1e4,extendedTimeOut:1e3,showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};var n="";switch(e){case"error":n=RV_MEDIA_CONFIG.translations.message.error_header;break;case"success":n=RV_MEDIA_CONFIG.translations.message.success_header}toastr[e](t,n)}},{key:"handleError",value:function(t){void 0===t.responseJSON||_.isArray(t.errors)?void 0!==t.responseJSON?void 0!==t.responseJSON.errors?422===t.status&&e.handleValidationError(t.responseJSON.errors):void 0!==t.responseJSON.message?e.showMessage("error",t.responseJSON.message):$.each(t.responseJSON,(function(t,n){$.each(n,(function(t,n){e.showMessage("error",n)}))})):e.showMessage("error",t.statusText):e.handleValidationError(t.responseJSON.errors)}},{key:"handleValidationError",value:function(t){var n="";$.each(t,(function(e,t){n+=t+"<br />",$('*[name="'+e+'"]').addClass("field-has-error"),$('*[name$="['+e+']"]').addClass("field-has-error")})),e.showMessage("error",n)}}],(n=null)&&r(t.prototype,n),i&&r(t,i),Object.defineProperty(t,"prototype",{writable:!1}),e}()}},t={};function n(r){var i=t[r];if(void 0!==i)return i.exports;var o=t[r]={exports:{}};return e[r](o,o.exports,n),o.exports}n.d=(e,t)=>{for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e=n(63363),t=n(33809),r=n(19353);function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function a(e,t,n){return t&&o(e.prototype,t),n&&o(e,n),Object.defineProperty(e,"prototype",{writable:!1}),e}var s=function(){function t(){i(this,t)}return a(t,null,[{key:"editorSelectFile",value:function(t){var n=e.Z.getUrlParam("CKEditor")||e.Z.getUrlParam("CKEditorFuncNum");if(window.opener&&n){var r=_.first(t);window.opener.CKEDITOR.tools.callFunction(e.Z.getUrlParam("CKEditorFuncNum"),r.full_url),window.opener&&window.close()}}}]),t}(),c=a((function n(o,a){i(this,n),window.rvMedia=window.rvMedia||{};var s=$("body");a=$.extend(!0,{multiple:!0,type:"*",onSelectFiles:function(e,t){}},a);var c=function(n){n.preventDefault();var i=$(n.currentTarget);$("#rv_media_modal").modal(),window.rvMedia.options=a,window.rvMedia.options.open_in="modal",window.rvMedia.$el=i,t.O.request_params.filter="everything",e.Z.storeConfig();var o=window.rvMedia.$el.data("rv-media");void 0!==o&&o.length>0&&(o=o[0],window.rvMedia.options=$.extend(!0,window.rvMedia.options,o||{}),void 0!==o.selected_file_id?window.rvMedia.options.is_popup=!0:void 0!==window.rvMedia.options.is_popup&&(window.rvMedia.options.is_popup=void 0)),0===$("#rv_media_body .rv-media-container").length?$("#rv_media_body").load(RV_MEDIA_URL.popup,(function(t){t.error&&alert(t.message),$("#rv_media_body").removeClass("media-modal-loading").closest(".modal-content").removeClass("bb-loading"),$(document).find(".rv-media-container .js-change-action[data-type=refresh]").trigger("click"),"everything"!==e.Z.getRequestParams().filter&&$(".rv-media-actions .btn.js-rv-media-change-filter-group.js-filter-by-type").hide(),r.L.destroyContext(),r.L.initContext()})):$(document).find(".rv-media-container .js-change-action[data-type=refresh]").trigger("click")};"string"==typeof o?s.off("click",o).on("click",o,c):o.off("click").on("click",c)}));window.RvMediaStandAlone=c,$(".js-insert-to-editor").off("click").on("click",(function(t){t.preventDefault();var n=e.Z.getSelectedFiles();_.size(n)>0&&s.editorSelectFile(n)})),$.fn.rvMedia=function(n){var r=$(this);t.O.request_params.filter="everything",$(document).find(".js-insert-to-editor").prop("disabled","trash"===t.O.request_params.view_in),e.Z.storeConfig(),new c(r,n)}})()})();