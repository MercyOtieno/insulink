!function(e){var n={};function t(a){if(n[a])return n[a].exports;var r=n[a]={i:a,l:!1,exports:{}};return e[a].call(r.exports,r,r.exports,t),r.l=!0,r.exports}t.m=e,t.c=n,t.d=function(e,n,a){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:a})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(t.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var r in e)t.d(a,r,function(n){return e[n]}.bind(null,r));return a},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="/",t(t.s=431)}({122:function(e,n,t){"use strict";t.r(n),t.d(n,"EditorService",(function(){return c}));var a=t(2),r=t(6),i=t(27);function o(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}function s(e,n){for(var t=0;t<n.length;t++){var a=n[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}var c=function(){function e(){o(this,e)}var n,t,r;return n=e,r=[{key:"editorSelectFile",value:function(e){var n=a.a.getUrlParam("CKEditor")||a.a.getUrlParam("CKEditorFuncNum");if(window.opener&&n){var t=_.first(e);window.opener.CKEDITOR.tools.callFunction(a.a.getUrlParam("CKEditorFuncNum"),t.full_url),window.opener&&window.close()}}}],(t=null)&&s(n.prototype,t),r&&s(n,r),e}(),l=function e(n,t){o(this,e),window.rvMedia=window.rvMedia||{};var s=$("body");t=$.extend(!0,{multiple:!0,type:"*",onSelectFiles:function(e,n){}},t);var c=function(e){e.preventDefault();var n=$(e.currentTarget);$("#rv_media_modal").modal(),window.rvMedia.options=t,window.rvMedia.options.open_in="modal",window.rvMedia.$el=n,r.a.request_params.filter="everything",a.a.storeConfig();var o=window.rvMedia.$el.data("rv-media");void 0!==o&&o.length>0&&(o=o[0],window.rvMedia.options=$.extend(!0,window.rvMedia.options,o||{}),void 0!==o.selected_file_id?window.rvMedia.options.is_popup=!0:void 0!==window.rvMedia.options.is_popup&&(window.rvMedia.options.is_popup=void 0)),0===$("#rv_media_body .rv-media-container").length?$("#rv_media_body").load(RV_MEDIA_URL.popup,(function(e){e.error&&alert(e.message),$("#rv_media_body").removeClass("media-modal-loading").closest(".modal-content").removeClass("bb-loading"),$(document).find(".rv-media-container .js-change-action[data-type=refresh]").trigger("click"),i.a.destroyContext(),i.a.initContext()})):$(document).find(".rv-media-container .js-change-action[data-type=refresh]").trigger("click")};"string"==typeof n?s.off("click",n).on("click",n,c):n.off("click").on("click",c)};window.RvMediaStandAlone=l,$(".js-insert-to-editor").off("click").on("click",(function(e){e.preventDefault();var n=a.a.getSelectedFiles();_.size(n)>0&&c.editorSelectFile(n)})),$.fn.rvMedia=function(e){var n=$(this);r.a.request_params.filter="everything",$(document).find(".js-insert-to-editor").prop("disabled","trash"===r.a.request_params.view_in),a.a.storeConfig(),new l(n,e)}},13:function(e,n,t){"use strict";function a(e,n){for(var t=0;t<n.length;t++){var a=n[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}t.d(n,"a",(function(){return r}));var r=function(){function e(){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,t,r;return n=e,r=[{key:"showMessage",value:function(e,n){toastr.options={closeButton:!0,progressBar:!0,positionClass:"toast-bottom-right",onclick:null,showDuration:1e3,hideDuration:1e3,timeOut:1e4,extendedTimeOut:1e3,showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};var t="";switch(e){case"error":t=RV_MEDIA_CONFIG.translations.message.error_header;break;case"success":t=RV_MEDIA_CONFIG.translations.message.success_header}toastr[e](n,t)}},{key:"handleError",value:function(n){void 0===n.responseJSON||_.isArray(n.errors)?void 0!==n.responseJSON?void 0!==n.responseJSON.errors?422===n.status&&e.handleValidationError(n.responseJSON.errors):void 0!==n.responseJSON.message?e.showMessage("error",n.responseJSON.message):$.each(n.responseJSON,(function(n,t){$.each(t,(function(n,t){e.showMessage("error",t)}))})):e.showMessage("error",n.statusText):e.handleValidationError(n.responseJSON.errors)}},{key:"handleValidationError",value:function(n){var t="";$.each(n,(function(e,n){t+=n+"<br />",$('*[name="'+e+'"]').addClass("field-has-error"),$('*[name$="['+e+']"]').addClass("field-has-error")})),e.showMessage("error",t)}}],(t=null)&&a(n.prototype,t),r&&a(n,r),e}()},14:function(e,n,t){"use strict";t.d(n,"a",(function(){return s}));var a=t(6),r=t(2),i=t(13);function o(e,n){for(var t=0;t<n.length;t++){var a=n[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}var s=function(){function e(){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,t,s;return n=e,s=[{key:"handleDropdown",value:function(){var n=_.size(r.a.getSelectedItems());e.renderActions(),n>0?$(".rv-dropdown-actions").removeClass("disabled"):$(".rv-dropdown-actions").addClass("disabled")}},{key:"handlePreview",value:function(){var e=[];_.each(r.a.getSelectedFiles(),(function(n){_.includes(["image","pdf","text","video"],n.type)&&(e.push({src:n.full_url}),a.b.push(n.id))})),_.size(e)>0?($.fancybox.open(e),r.a.storeRecentItems()):this.handleGlobalAction("download")}},{key:"handleCopyLink",value:function(){var e="";_.each(r.a.getSelectedFiles(),(function(n){_.isEmpty(e)||(e+="\n"),e+=n.full_url}));var n=$(".js-rv-clipboard-temp");n.data("clipboard-text",e),new Clipboard(".js-rv-clipboard-temp",{text:function(){return e}}),i.a.showMessage("success",RV_MEDIA_CONFIG.translations.clipboard.success,RV_MEDIA_CONFIG.translations.message.success_header),n.trigger("click")}},{key:"handleGlobalAction",value:function(n,t){var a=[];switch(_.each(r.a.getSelectedItems(),(function(e){a.push({is_folder:e.is_folder,id:e.id,full_url:e.full_url})})),n){case"rename":$("#modal_rename_items").modal("show").find("form.rv-form").data("action",n);break;case"copy_link":e.handleCopyLink();break;case"preview":e.handlePreview();break;case"trash":$("#modal_trash_items").modal("show").find("form.rv-form").data("action",n);break;case"delete":$("#modal_delete_items").modal("show").find("form.rv-form").data("action",n);break;case"empty_trash":$("#modal_empty_trash").modal("show").find("form.rv-form").data("action",n);break;case"download":var o=RV_MEDIA_URL.download,s=0;_.each(r.a.getSelectedItems(),(function(e){_.includes(r.a.getConfigs().denied_download,e.mime_type)||(o+=(0===s?"?":"&")+"selected["+s+"][is_folder]="+e.is_folder+"&selected["+s+"][id]="+e.id,s++)})),o!==RV_MEDIA_URL.download?window.open(o,"_blank"):i.a.showMessage("error",RV_MEDIA_CONFIG.translations.download.error,RV_MEDIA_CONFIG.translations.message.error_header);break;default:e.processAction({selected:a,action:n},t)}}},{key:"processAction",value:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;$.ajax({url:RV_MEDIA_URL.global_actions,type:"POST",data:e,dataType:"json",beforeSend:function(){r.a.showAjaxLoading()},success:function(e){r.a.resetPagination(),e.error?i.a.showMessage("error",e.message,RV_MEDIA_CONFIG.translations.message.error_header):i.a.showMessage("success",e.message,RV_MEDIA_CONFIG.translations.message.success_header),n&&n(e)},complete:function(){r.a.hideAjaxLoading()},error:function(e){i.a.handleError(e)}})}},{key:"renderRenameItems",value:function(){var e=$("#rv_media_rename_item").html(),n=$("#modal_rename_items .rename-items").empty();_.each(r.a.getSelectedItems(),(function(t){var a=e.replace(/__icon__/gi,t.icon||"fa fa-file").replace(/__placeholder__/gi,"Input file name").replace(/__value__/gi,t.name),r=$(a);r.data("id",t.id),r.data("is_folder",t.is_folder),r.data("name",t.name),n.append(r)}))}},{key:"renderActions",value:function(){var e=r.a.getSelectedFolder().length>0,n=$("#rv_action_item").html(),t=0,a=$(".rv-dropdown-actions .dropdown-menu");a.empty();var i=$.extend({},!0,r.a.getConfigs().actions_list);e&&(i.basic=_.reject(i.basic,(function(e){return"preview"===e.action})),i.file=_.reject(i.file,(function(e){return"copy_link"===e.action})),_.includes(RV_MEDIA_CONFIG.permissions,"folders.create")||(i.file=_.reject(i.file,(function(e){return"make_copy"===e.action}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.edit")||(i.file=_.reject(i.file,(function(e){return _.includes(["rename"],e.action)})),i.user=_.reject(i.user,(function(e){return _.includes(["rename"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.trash")||(i.other=_.reject(i.other,(function(e){return _.includes(["trash","restore"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.destroy")||(i.other=_.reject(i.other,(function(e){return _.includes(["delete"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"folders.favorite")||(i.other=_.reject(i.other,(function(e){return _.includes(["favorite","remove_favorite"],e.action)}))));var o=r.a.getSelectedFiles(),s=!1;_.each(o,(function(e){_.includes(["image","pdf","text","video"],e.type)&&(s=!0)})),s||(i.basic=_.reject(i.basic,(function(e){return"preview"===e.action}))),o.length>0&&(_.includes(RV_MEDIA_CONFIG.permissions,"files.create")||(i.file=_.reject(i.file,(function(e){return"make_copy"===e.action}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.edit")||(i.file=_.reject(i.file,(function(e){return _.includes(["rename"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.trash")||(i.other=_.reject(i.other,(function(e){return _.includes(["trash","restore"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.destroy")||(i.other=_.reject(i.other,(function(e){return _.includes(["delete"],e.action)}))),_.includes(RV_MEDIA_CONFIG.permissions,"files.favorite")||(i.other=_.reject(i.other,(function(e){return _.includes(["favorite","remove_favorite"],e.action)})))),_.each(i,(function(e,i){_.each(e,(function(e,o){var s=!1;switch(r.a.getRequestParams().view_in){case"all_media":_.includes(["remove_favorite","delete","restore"],e.action)&&(s=!0);break;case"recent":_.includes(["remove_favorite","delete","restore","make_copy"],e.action)&&(s=!0);break;case"favorites":_.includes(["favorite","delete","restore","make_copy"],e.action)&&(s=!0);break;case"trash":_.includes(["preview","delete","restore","rename","download"],e.action)||(s=!0)}if(!s){var c=n.replace(/__action__/gi,e.action||"").replace(/__icon__/gi,e.icon||"").replace(/__name__/gi,RV_MEDIA_CONFIG.translations.actions_list[i][e.action]||e.name);!o&&t&&(c='<li role="separator" class="divider"></li>'+c),a.append(c)}})),e.length>0&&t++}))}}],(t=null)&&o(n.prototype,t),s&&o(n,s),e}()},2:function(e,n,t){"use strict";t.d(n,"a",(function(){return i}));var a=t(6);function r(e,n){for(var t=0;t<n.length;t++){var a=n[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}var i=function(){function e(){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,t,i;return n=e,i=[{key:"getUrlParam",value:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;n||(n=window.location.search);var t=new RegExp("(?:[?&]|&)"+e+"=([^&]+)","i"),a=n.match(t);return a&&a.length>1?a[1]:null}},{key:"asset",value:function(e){if("//"===e.substring(0,2)||"http://"===e.substring(0,7)||"https://"===e.substring(0,8))return e;var n="/"!==RV_MEDIA_URL.base_url.substr(-1,1)?RV_MEDIA_URL.base_url+"/":RV_MEDIA_URL.base_url;return"/"===e.substring(0,1)?n+e.substring(1):n+e}},{key:"showAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-main");e.addClass("on-loading").append($("#rv_media_loading").html())}},{key:"hideAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-main");e.removeClass("on-loading").find(".loading-wrapper").remove()}},{key:"isOnAjaxLoading",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:$(".rv-media-items");return e.hasClass("on-loading")}},{key:"jsonEncode",value:function(e){return void 0===e&&(e=null),JSON.stringify(e)}},{key:"jsonDecode",value:function(e,n){if(!e)return n;if("string"==typeof e){var t;try{t=$.parseJSON(e)}catch(e){t=n}return t}return e}},{key:"getRequestParams",value:function(){return window.rvMedia.options&&"modal"===window.rvMedia.options.open_in?$.extend(!0,a.a.request_params,window.rvMedia.options||{}):a.a.request_params}},{key:"setSelectedFile",value:function(e){void 0!==window.rvMedia.options?window.rvMedia.options.selected_file_id=e:a.a.request_params.selected_file_id=e}},{key:"getConfigs",value:function(){return a.a}},{key:"storeConfig",value:function(){localStorage.setItem("MediaConfig",e.jsonEncode(a.a))}},{key:"storeRecentItems",value:function(){localStorage.setItem("RecentItems",e.jsonEncode(a.b))}},{key:"addToRecent",value:function(e){e instanceof Array?_.each(e,(function(e){a.b.push(e)})):(a.b.push(e),this.storeRecentItems())}},{key:"getItems",value:function(){var e=[];return $(".js-media-list-title").each((function(n,t){var a=$(t),r=a.data()||{};r.index_key=a.index(),e.push(r)})),e}},{key:"getSelectedItems",value:function(){var e=[];return $(".js-media-list-title input[type=checkbox]:checked").each((function(n,t){var a=$(t).closest(".js-media-list-title"),r=a.data()||{};r.index_key=a.index(),e.push(r)})),e}},{key:"getSelectedFiles",value:function(){var e=[];return $(".js-media-list-title[data-context=file] input[type=checkbox]:checked").each((function(n,t){var a=$(t).closest(".js-media-list-title"),r=a.data()||{};r.index_key=a.index(),e.push(r)})),e}},{key:"getSelectedFolder",value:function(){var e=[];return $(".js-media-list-title[data-context=folder] input[type=checkbox]:checked").each((function(n,t){var a=$(t).closest(".js-media-list-title"),r=a.data()||{};r.index_key=a.index(),e.push(r)})),e}},{key:"isUseInModal",value:function(){return"select-files"===e.getUrlParam("media-action")||window.rvMedia&&window.rvMedia.options&&"modal"===window.rvMedia.options.open_in}},{key:"resetPagination",value:function(){RV_MEDIA_CONFIG.pagination={paged:1,posts_per_page:40,in_process_get_media:!1,has_more:!0}}}],(t=null)&&r(n.prototype,t),i&&r(n,i),e}()},27:function(e,n,t){"use strict";t.d(n,"a",(function(){return o}));var a=t(14),r=t(2);function i(e,n){for(var t=0;t<n.length;t++){var a=n[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}var o=function(){function e(){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,t,o;return n=e,o=[{key:"initContext",value:function(){jQuery().contextMenu&&($.contextMenu({selector:'.js-context-menu[data-context="file"]',build:function(){return{items:e._fileContextMenu()}}}),$.contextMenu({selector:'.js-context-menu[data-context="folder"]',build:function(){return{items:e._folderContextMenu()}}}))}},{key:"_fileContextMenu",value:function(){var e={preview:{name:"Preview",icon:function(e,n,t,a){return n.html('<i class="fa fa-eye" aria-hidden="true"></i> '+a.name),"context-menu-icon-updated"},callback:function(){a.a.handlePreview()}}};_.each(r.a.getConfigs().actions_list,(function(n,t){_.each(n,(function(n){e[n.action]={name:n.name,icon:function(e,a,r,i){return a.html('<i class="'+n.icon+'" aria-hidden="true"></i> '+(RV_MEDIA_CONFIG.translations.actions_list[t][n.action]||i.name)),"context-menu-icon-updated"},callback:function(){$('.js-files-action[data-action="'+n.action+'"]').trigger("click")}}}))}));var n=[];switch(r.a.getRequestParams().view_in){case"all_media":n=["remove_favorite","delete","restore"];break;case"recent":n=["remove_favorite","delete","restore","make_copy"];break;case"favorites":n=["favorite","delete","restore","make_copy"];break;case"trash":e={preview:e.preview,rename:e.rename,download:e.download,delete:e.delete,restore:e.restore}}_.each(n,(function(n){e[n]=void 0})),r.a.getSelectedFolder().length>0&&(e.preview=void 0,e.copy_link=void 0,_.includes(RV_MEDIA_CONFIG.permissions,"folders.create")||(e.make_copy=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.edit")||(e.rename=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.trash")||(e.trash=void 0,e.restore=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.destroy")||(e.delete=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"folders.favorite")||(e.favorite=void 0,e.remove_favorite=void 0));var t=r.a.getSelectedFiles();t.length>0&&(_.includes(RV_MEDIA_CONFIG.permissions,"files.create")||(e.make_copy=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.edit")||(e.rename=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.trash")||(e.trash=void 0,e.restore=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.destroy")||(e.delete=void 0),_.includes(RV_MEDIA_CONFIG.permissions,"files.favorite")||(e.favorite=void 0,e.remove_favorite=void 0));var i=!1;return _.each(t,(function(e){_.includes(["image","pdf","text","video"],e.type)&&(i=!0)})),i||(e.preview=void 0),e}},{key:"_folderContextMenu",value:function(){var n=e._fileContextMenu();return n.preview=void 0,n.copy_link=void 0,n}},{key:"destroyContext",value:function(){jQuery().contextMenu&&$.contextMenu("destroy")}}],(t=null)&&i(n.prototype,t),o&&i(n,o),e}()},431:function(e,n,t){e.exports=t(122)},6:function(e,n,t){"use strict";t.d(n,"a",(function(){return a})),t.d(n,"b",(function(){return i}));var a=$.parseJSON(localStorage.getItem("MediaConfig"))||{},r={app_key:"483a0xyzytz1242c0d520426e8ba366c530c3d9d3xs",request_params:{view_type:"tiles",filter:"everything",view_in:"all_media",search:"",sort_by:"created_at-desc",folder_id:0},hide_details_pane:!1,icons:{folder:"fa fa-folder"},actions_list:{basic:[{icon:"fa fa-eye",name:"Preview",action:"preview",order:0,class:"rv-action-preview"}],file:[{icon:"fa fa-link",name:"Copy link",action:"copy_link",order:0,class:"rv-action-copy-link"},{icon:"far fa-edit",name:"Rename",action:"rename",order:1,class:"rv-action-rename"},{icon:"fa fa-copy",name:"Make a copy",action:"make_copy",order:2,class:"rv-action-make-copy"}],user:[{icon:"fa fa-star",name:"Favorite",action:"favorite",order:2,class:"rv-action-favorite"},{icon:"fa fa-star",name:"Remove favorite",action:"remove_favorite",order:3,class:"rv-action-favorite"}],other:[{icon:"fa fa-download",name:"Download",action:"download",order:0,class:"rv-action-download"},{icon:"fa fa-trash",name:"Move to trash",action:"trash",order:1,class:"rv-action-trash"},{icon:"fa fa-eraser",name:"Delete permanently",action:"delete",order:2,class:"rv-action-delete"},{icon:"fa fa-undo",name:"Restore",action:"restore",order:3,class:"rv-action-restore"}]}};a.app_key&&a.app_key===r.app_key||(a=r);var i=$.parseJSON(localStorage.getItem("RecentItems"))||[]}});