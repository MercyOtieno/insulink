(()=>{function e(e,o){for(var t=0;t<o.length;t++){var a=o[t];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}var o=function(){function o(){!function(e,o){if(!(e instanceof o))throw new TypeError("Cannot call a class as a function")}(this,o)}var t,a,r;return t=o,(a=[{key:"init",value:function(){var e=$("#table-backups");e.on("click",".deleteDialog",(function(e){e.preventDefault(),$(".delete-crud-entry").data("section",$(e.currentTarget).data("section")),$(".modal-confirm-delete").modal("show")})),e.on("click",".restoreBackup",(function(e){e.preventDefault(),$("#restore-backup-button").data("section",$(e.currentTarget).data("section")),$("#restore-backup-modal").modal("show")})),$(".delete-crud-entry").on("click",(function(o){o.preventDefault(),$(".modal-confirm-delete").modal("hide");var t=$(o.currentTarget).data("section");$.ajax({url:t,type:"DELETE",success:function(o){o.error?Botble.showError(o.message):(e.find('a[data-section="'+t+'"]').closest("tr").remove(),Botble.showSuccess(o.message))},error:function(e){Botble.handleError(e)}})})),$("#restore-backup-button").on("click",(function(e){e.preventDefault();var o=$(e.currentTarget);o.addClass("button-loading"),$.ajax({url:o.data("section"),type:"GET",success:function(e){o.removeClass("button-loading"),o.closest(".modal").modal("hide"),e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),window.location.reload())},error:function(e){o.removeClass("button-loading"),Botble.handleError(e)}})})),$(document).on("click","#generate_backup",(function(e){e.preventDefault(),$("#name").val(""),$("#description").val(""),$("#create-backup-modal").modal("show")})),$("#create-backup-modal").on("click","#create-backup-button",(function(o){o.preventDefault();var t=$(o.currentTarget);t.addClass("button-loading");var a=$("#name").val(),r=$("#description").val(),n=!1;""!==a&&null!==a||(n=!0,Botble.showError("Backup name is required!")),""!==r&&null!==r||(n=!0,Botble.showError("Backup description is required!")),n?t.removeClass("button-loading"):$.ajax({url:$("div[data-route-create]").data("route-create"),type:"POST",data:{name:a,description:r},success:function(o){t.removeClass("button-loading"),t.closest(".modal").modal("hide"),o.error?Botble.showError(o.message):(e.find(".no-backup-row").remove(),e.find("tbody").append(o.data),Botble.showSuccess(o.message))},error:function(e){t.removeClass("button-loading"),Botble.handleError(e)}})}))}}])&&e(t.prototype,a),r&&e(t,r),o}();$(document).ready((function(){(new o).init()}))})();