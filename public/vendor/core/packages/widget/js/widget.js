(()=>{function e(e,t){for(var a=0;a<t.length;a++){var o=t[a];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var t=function(){function t(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t)}var a,o,i;return a=t,(o=[{key:"init",value:function(){var e=[{name:"wrap-widgets",pull:"clone",put:!1}];$.each($(".sidebar-item"),(function(){e.push({name:"wrap-widgets",pull:!0,put:!0})}));var t=function(e){if(e.length>0){var t=[];$.each(e.find("li[data-id]"),(function(e,a){t.push($(a).find("form").serialize())})),$.ajax({type:"POST",cache:!1,url:BWidget.routes.save_widgets_sidebar,data:{items:t,sidebar_id:e.data("id")},beforeSend:function(){Botble.showNotice("info",BotbleVariables.languages.notices_msg.processing_request)},success:function(t){t.error?Botble.showError(t.message):(e.find("ul").html(t.data),Botble.callScroll($(".list-page-select-widget")),Botble.initResources(),Botble.initMediaIntegrate(),Botble.showSuccess(t.message)),e.find(".widget_save i").remove()},error:function(t){Botble.handleError(t),e.find(".widget_save i").remove()}})}};e.forEach((function(e,a){Sortable.create(document.getElementById("wrap-widget-"+(a+1)),{sort:0!==a,group:e,delay:0,disabled:!1,store:null,animation:150,handle:".widget-handle",ghostClass:"sortable-ghost",chosenClass:"sortable-chosen",dataIdAttr:"data-id",forceFallback:!1,fallbackClass:"sortable-fallback",fallbackOnBody:!1,scroll:!0,scrollSensitivity:30,scrollSpeed:10,onEnd:function(e){e.from!==e.to&&t($(e.from).closest(".sidebar-item")),t($(e.item).closest(".sidebar-item"))}})}));var a=$("#wrap-widgets");a.on("click",".widget-control-delete",(function(e){e.preventDefault();var t=$(e.currentTarget),a=t.closest("li");t.addClass("button-loading"),$.ajax({type:"DELETE",cache:!1,url:BWidget.routes.delete,data:{widget_id:a.data("id"),position:a.data("position"),sidebar_id:t.closest(".sidebar-item").data("id")},beforeSend:function(){Botble.showNotice("info",BotbleVariables.languages.notices_msg.processing_request)},success:function(e){e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),a.fadeOut().remove()),a.find(".widget-control-delete").removeClass("button-loading")},error:function(e){Botble.handleError(e),a.find(".widget-control-delete").removeClass("button-loading")}})})),a.on("click","#added-widget .widget-handle",(function(e){var t=$(e.currentTarget);t.closest("li").find(".widget-content").slideToggle(300),t.find(".fa").toggleClass("fa-caret-up"),t.find(".fa").toggleClass("fa-caret-down")})),a.on("click",".widget_save",(function(e){e.preventDefault();var a=$(e.currentTarget);a.addClass("button-loading"),t(a.closest(".sidebar-item"))})),Botble.callScroll($(".list-page-select-widget"))}}])&&e(a.prototype,o),i&&e(a,i),t}();$(document).ready((function(){(new t).init()}))})();