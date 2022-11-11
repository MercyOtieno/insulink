(()=>{function e(e,a){for(var t=0;t<a.length;t++){var n=a[t];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var a=function(){function a(){!function(e,a){if(!(e instanceof a))throw new TypeError("Cannot call a class as a function")}(this,a)}var t,n,l;return t=a,l=[{key:"formatState",value:function(e){return!e.id||e.element.value.toLowerCase().includes("...")?e.text:$('<span><img src="'+$("#language_flag_path").val()+e.element.value.toLowerCase()+'.svg" class="img-flag" width="16"/> '+e.text+"</span>")}},{key:"createOrUpdateLanguage",value:function(e,a,t,n,l,r,o,g){var i=route("languages.store");g&&(i=route("languages.edit")+"?lang_code="+n),$("#btn-language-submit").addClass("button-loading"),$.ajax({url:i,type:"POST",data:{lang_id:e,lang_name:a,lang_locale:t,lang_code:n,lang_flag:l,lang_order:r,lang_is_rtl:o},success:function(a){a.error?Botble.showError(a.message):(g?$(".table-language").find("tr[data-id="+e+"]").replaceWith(a.data):$(".table-language").append(a.data),Botble.showSuccess(a.message)),$("#language_id").val("").trigger("change"),$("#lang_name").val(""),$("#lang_locale").val(""),$("#lang_code").val(""),$("#flag_list").val("").trigger("change"),$(".lang_is_ltr").prop("checked",!0),$("#btn-language-submit-edit").prop("id","btn-language-submit").text("Add new language"),$("#btn-language-submit").removeClass("button-loading")},error:function(e){$("#btn-language-submit").removeClass("button-loading"),Botble.handleError(e)}})}}],(n=[{key:"bindEventToElement",value:function(){var e=this;jQuery().select2&&$(".select-search-language").select2({width:"100%",templateResult:a.formatState,templateSelection:a.formatState});var t=$(".table-language");$(document).on("change","#language_id",(function(e){var a=$(e.currentTarget).find("option:selected").data("language");void 0!==a&&a.length>0&&($("#lang_name").val(a[2]),$("#lang_locale").val(a[0]),$("#lang_code").val(a[1]),$("#flag_list").val(a[4]).trigger("change"),$(".lang_is_"+a[3]).prop("checked",!0),$("#btn-language-submit-edit").prop("id","btn-language-submit").text("Add new language"))})),$(document).on("click","#btn-language-submit",(function(e){e.preventDefault();var t=$("#lang_name").val(),n=$("#lang_locale").val(),l=$("#lang_code").val(),r=$("#flag_list").val(),o=$("#lang_order").val(),g=$(".lang_is_rtl").prop("checked")?1:0;a.createOrUpdateLanguage(0,t,n,l,r,o,g,0)})),$(document).on("click","#btn-language-submit-edit",(function(e){e.preventDefault();var t=$("#lang_id").val(),n=$("#lang_name").val(),l=$("#lang_locale").val(),r=$("#lang_code").val(),o=$("#flag_list").val(),g=$("#lang_order").val(),i=$(".lang_is_rtl").prop("checked")?1:0;a.createOrUpdateLanguage(t,n,l,r,o,g,i,1)})),t.on("click",".deleteDialog",(function(e){e.preventDefault(),$(".delete-crud-entry").data("section",$(e.currentTarget).data("section")),$(".modal-confirm-delete").modal("show")})),$(".delete-crud-entry").on("click",(function(a){a.preventDefault(),$(".modal-confirm-delete").modal("hide");var n=$(a.currentTarget).data("section");$(e).prop("disabled",!0).addClass("button-loading"),$.ajax({url:n,type:"DELETE",success:function(a){a.error?Botble.showError(a.message):(a.data&&(t.find("i[data-id="+a.data+"]").unwrap(),$(".tooltip").remove()),t.find('a[data-section="'+n+'"]').closest("tr").remove(),Botble.showSuccess(a.message)),$(e).prop("disabled",!1).removeClass("button-loading")},error:function(a){$(e).prop("disabled",!1).removeClass("button-loading"),Botble.handleError(a)}})})),t.on("click",".set-language-default",(function(e){e.preventDefault();var a=$(e.currentTarget);$.ajax({url:a.data("section"),type:"GET",success:function(e){if(e.error)Botble.showError(e.message);else{var n=t.find("td > i");n.replaceWith('<a data-section="'+route("languages.set.default")+"?lang_id="+n.data("id")+'" class="set-language-default tip" data-original-title="Choose '+n.data("name")+' as default language">'+n.closest("td").html()+"</a>"),a.find("i").unwrap(),$(".tooltip").remove(),Botble.showSuccess(e.message)}},error:function(e){Botble.handleError(e)}})})),t.on("click",".edit-language-button",(function(e){e.preventDefault();var a=$(e.currentTarget);$.ajax({url:route("languages.get")+"?lang_id="+a.data("id"),type:"GET",success:function(e){if(e.error)Botble.showError(e.message);else{var a=e.data;$("#lang_id").val(a.lang_id),$("#lang_name").val(a.lang_name),$("#lang_locale").val(a.lang_locale),$("#lang_code").val(a.lang_code),$("#flag_list").val(a.lang_flag).trigger("change"),a.lang_rtl&&$(".lang_is_rtl").prop("checked",!0),$("#lang_order").val(a.lang_order),$("#btn-language-submit").prop("id","btn-language-submit-edit").text("Update")}},error:function(e){Botble.handleError(e)}})})),$(document).on("click",".button-save-language-settings",(function(e){e.preventDefault();var a=$(e.currentTarget);a.addClass("button-loading");var t=a.closest("form");$.ajax({url:t.prop("action"),type:"POST",data:t.serialize(),success:function(e){a.removeClass("button-loading"),e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),t.removeClass("dirty"))},error:function(e){a.removeClass("button-loading"),Botble.handleError(e)}})}))}}])&&e(t.prototype,n),l&&e(t,l),Object.defineProperty(t,"prototype",{writable:!1}),a}();$(document).ready((function(){(new a).bindEventToElement()}))})();