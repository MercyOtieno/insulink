$(document).ready((function(){$(document).on("click",".button-save-theme-translations",(function(e){e.preventDefault();var o=$(e.currentTarget);o.addClass("button-loading");var t=o.closest("form");$.ajax({url:t.prop("action"),type:"POST",data:t.serialize(),success:function(e){o.removeClass("button-loading"),e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),t.removeClass("dirty"))},error:function(e){o.removeClass("button-loading"),Botble.handleError(e)}})}))}));