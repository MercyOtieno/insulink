(()=>{function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}!function(t,a){"use strict";var n=function(e,a){var n=e.ajax.params();return n.action=a,n._token=t('meta[name="csrf-token"]').attr("content"),n},o=function(e,a){var n=e+"/export",o=new XMLHttpRequest;o.open("POST",n,!0),o.responseType="arraybuffer",o.onload=function(){if(200===this.status){var e="",t=o.getResponseHeader("Content-Disposition");if(t&&-1!==t.indexOf("attachment")){var a=/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/.exec(t);null!=a&&a[1]&&(e=a[1].replace(/['"]/g,""))}var n=o.getResponseHeader("Content-Type"),l=new Blob([this.response],{type:n});if(void 0!==window.navigator.msSaveBlob)window.navigator.msSaveBlob(l,e);else{var r=window.URL||window.webkitURL,s=r.createObjectURL(l);if(e){var c=document.createElement("a");void 0===c.download?window.location=s:(c.href=s,c.download=e,document.body.appendChild(c),c.trigger("click"))}else window.location=s;setTimeout((function(){r.revokeObjectURL(s)}),100)}}},o.setRequestHeader("Content-type","application/x-www-form-urlencoded"),o.send(t.param(a))},l=function(e,a){var n=e.ajax.url()||"",o=e.ajax.params();return o.action=a,n.indexOf("?")>-1?n+"&"+t.param(o):n+"?"+t.param(o)};a.ext.buttons.excel={className:"buttons-excel",text:function(e){return'<i class="far fa-file-excel"></i> '+e.i18n("buttons.excel",BotbleVariables.languages.tables.excel?BotbleVariables.languages.tables.excel:"Excel")},action:function(e,t){window.location=l(t,"excel")}},a.ext.buttons.postExcel={className:"buttons-excel",text:function(e){return'<i class="far fa-file-excel"></i> '+e.i18n("buttons.excel",BotbleVariables.languages.tables.excel?BotbleVariables.languages.tables.excel:"Excel")},action:function(e,t){var a=t.ajax.url()||window.location.href,l=n(t,"excel");o(a,l)}},a.ext.buttons.export={extend:"collection",className:"buttons-export",text:function(e){return'<i class="fa fa-download"></i> '+e.i18n("buttons.export",BotbleVariables.languages.tables.export?BotbleVariables.languages.tables.export:"Export")+'&nbsp;<span class="caret"/>'},buttons:["csv","excel"]},a.ext.buttons.csv={className:"buttons-csv",text:function(e){return'<i class="fas fa-file-csv"></i> '+e.i18n("buttons.csv",BotbleVariables.languages.tables.csv?BotbleVariables.languages.tables.csv:"CSV")},action:function(e,t){window.location=l(t,"csv")}},a.ext.buttons.postCsv={className:"buttons-csv",text:function(e){return'<i class="fas fa-file-csv"></i> '+e.i18n("buttons.csv",BotbleVariables.languages.tables.csv?BotbleVariables.languages.tables.csv:"CSV")},action:function(e,t){var a=t.ajax.url()||window.location.href,l=n(t,"csv");o(a,l)}},a.ext.buttons.pdf={className:"buttons-pdf",text:function(e){return'<i class="far fa-file-pdf"></i> '+e.i18n("buttons.pdf","PDF")},action:function(e,t){window.location=l(t,"pdf")}},a.ext.buttons.postPdf={className:"buttons-pdf",text:function(e){return'<i class="far fa-file-pdf"></i> '+e.i18n("buttons.pdf","PDF")},action:function(e,t){var a=t.ajax.url()||window.location.href,l=n(t,"pdf");o(a,l)}},a.ext.buttons.print={className:"buttons-print",text:function(e){return'<i class="fa fa-print"></i> '+e.i18n("buttons.print",BotbleVariables.languages.tables.print?BotbleVariables.languages.tables.print:"Print")},action:function(e,t){window.location=l(t,"print")}},a.ext.buttons.reset={className:"buttons-reset",text:function(e){return'<i class="fa fa-undo"></i> '+e.i18n("buttons.reset",BotbleVariables.languages.tables.reset?BotbleVariables.languages.tables.reset:"Reset")},action:function(){t(".table thead input").val("").keyup(),t(".table thead select").val("").change()}},a.ext.buttons.reload={className:"buttons-reload",text:function(e){return'<i class="fas fa-sync"></i> '+e.i18n("buttons.reload",BotbleVariables.languages.tables.reload?BotbleVariables.languages.tables.reload:"Reload")},action:function(e,t){t.draw(!1)}},a.ext.buttons.create={className:"buttons-create",text:function(e){return'<i class="fa fa-plus"></i> '+e.i18n("buttons.create","Create")},action:function(){window.location=window.location.href.replace(/\/+$/,"")+"/create"}},void 0!==a.ext.buttons.copyHtml5&&t.extend(a.ext.buttons.copyHtml5,{text:function(e){return'<i class="fa fa-copy"></i> '+e.i18n("buttons.copy","Copy")}}),void 0!==a.ext.buttons.colvis&&t.extend(a.ext.buttons.colvis,{text:function(e){return'<i class="fa fa-eye"></i> '+e.i18n("buttons.colvis","Column visibility")}});var r=function(){function a(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,a),this.init(),this.handleActionsRow(),this.handleActionsExport()}var n,o,l;return n=a,(o=[{key:"init",value:function(){t(document).on("change",".table-check-all",(function(e){var a=t(e.currentTarget),n=a.attr("data-set"),o=a.prop("checked");t(n).each((function(e,a){o?t(a).prop("checked",!0):t(a).prop("checked",!1)}))})),t(document).on("change",".checkboxes",(function(e){var a=t(e.currentTarget),n=a.closest(".table-wrapper").find(".table").prop("id"),o=[],l=t("#"+n);l.find(".checkboxes:checked").each((function(e,a){o[e]=t(a).val()})),o.length!==l.find(".checkboxes").length?a.closest(".table-wrapper").find(".table-check-all").prop("checked",!1):a.closest(".table-wrapper").find(".table-check-all").prop("checked",!0)})),t(document).on("click",".btn-show-table-options",(function(e){e.preventDefault(),t(e.currentTarget).closest(".table-wrapper").find(".table-configuration-wrap").slideToggle(500)})),t(document).on("click",".action-item",(function(e){e.preventDefault();var a=t(e.currentTarget).find("span[data-href]"),n=a.data("action"),o=a.data("href");n&&"#"!==o&&(window.location.href=o)}))}},{key:"handleActionsRow",value:function(){var e=this;t(document).on("click",".deleteDialog",(function(e){e.preventDefault();var a=t(e.currentTarget);t(".delete-crud-entry").data("section",a.data("section")).data("parent-table",a.closest(".table").prop("id")),t(".modal-confirm-delete").modal("show")})),t(".delete-crud-entry").on("click",(function(e){e.preventDefault();var a=t(e.currentTarget);a.addClass("button-loading");var n=a.data("section");t.ajax({url:n,type:"DELETE",success:function(e){e.error?Botble.showError(e.message):(window.LaravelDataTables[a.data("parent-table")].row(t('a[data-section="'+n+'"]').closest("tr")).remove().draw(),Botble.showSuccess(e.message)),a.closest(".modal").modal("hide"),a.removeClass("button-loading")},error:function(e){Botble.handleError(e),a.removeClass("button-loading")}})})),t(document).on("click",".delete-many-entry-trigger",(function(e){e.preventDefault();var a=t(e.currentTarget),n=a.closest(".table-wrapper").find(".table").prop("id"),o=[];if(t("#"+n).find(".checkboxes:checked").each((function(e,a){o[e]=t(a).val()})),0===o.length)return Botble.showError(BotbleVariables.languages.tables.please_select_record?BotbleVariables.languages.tables.please_select_record:"Please select at least one record to perform this action!"),!1;t(".delete-many-entry-button").data("href",a.prop("href")).data("parent-table",n).data("class-item",a.data("class-item")),t(".delete-many-modal").modal("show")})),t(".delete-many-entry-button").on("click",(function(e){e.preventDefault();var a=t(e.currentTarget);a.addClass("button-loading");var n=t("#"+a.data("parent-table")),o=[];n.find(".checkboxes:checked").each((function(e,a){o[e]=t(a).val()})),t.ajax({url:a.data("href"),type:"DELETE",data:{ids:o,class:a.data("class-item")},success:function(e){e.error?Botble.showError(e.message):Botble.showSuccess(e.message),n.find(".table-check-all").prop("checked",!1),window.LaravelDataTables[a.data("parent-table")].draw(),a.closest(".modal").modal("hide"),a.removeClass("button-loading")},error:function(e){Botble.handleError(e),a.removeClass("button-loading")}})})),t(document).on("click",".bulk-change-item",(function(a){a.preventDefault();var n=t(a.currentTarget),o=n.closest(".table-wrapper").find(".table").prop("id"),l=[];if(t("#"+o).find(".checkboxes:checked").each((function(e,a){l[e]=t(a).val()})),0===l.length)return Botble.showError(BotbleVariables.languages.tables.please_select_record?BotbleVariables.languages.tables.please_select_record:"Please select at least one record to perform this action!"),!1;e.loadBulkChangeData(n),t(".confirm-bulk-change-button").data("parent-table",o).data("class-item",n.data("class-item")).data("key",n.data("key")).data("url",n.data("save-url")),t(".modal-bulk-change-items").modal("show")})),t(document).on("click",".confirm-bulk-change-button",(function(e){e.preventDefault();var a=t(e.currentTarget),n=a.closest(".modal").find(".input-value").val(),o=a.data("key"),l=t("#"+a.data("parent-table")),r=[];l.find(".checkboxes:checked").each((function(e,a){r[e]=t(a).val()})),a.addClass("button-loading"),t.ajax({url:a.data("url"),type:"POST",data:{ids:r,key:o,value:n,class:a.data("class-item")},success:function(e){e.error?Botble.showError(e.message):Botble.showSuccess(e.message),l.find(".table-check-all").prop("checked",!1),t.each(r,(function(e,t){window.LaravelDataTables[a.data("parent-table")].row(l.find('.checkboxes[value="'+t+'"]').closest("tr")).remove().draw()})),a.closest(".modal").modal("hide"),a.removeClass("button-loading")},error:function(e){Botble.handleError(e),a.removeClass("button-loading")}})}))}},{key:"loadBulkChangeData",value:function(e){var a=t(".modal-bulk-change-items");t.ajax({type:"GET",url:a.find(".confirm-bulk-change-button").data("load-url"),data:{class:e.data("class-item"),key:e.data("key")},success:function(e){var n=t.map(e.data,(function(e,t){return{id:t,name:e}}));t(".modal-bulk-change-content").html(e.html);var o=a.find("input[type=text].input-value");o.length&&(o.typeahead({source:n}),o.data("typeahead").source=n),Botble.initResources()},error:function(e){Botble.handleError(e)}})}},{key:"handleActionsExport",value:function(){t(document).on("click",".export-data",(function(e){var a=t(e.currentTarget),n=a.closest(".table-wrapper").find(".table").prop("id"),o=[];t("#"+n).find(".checkboxes:checked").each((function(e,a){o[e]=t(a).val()})),e.preventDefault(),t.ajax({type:"POST",url:a.prop("href"),data:{"ids-checked":o},success:function(e){var t=document.createElement("a");t.href=e.file,t.download=e.name,document.body.appendChild(t),t.trigger("click"),t.remove()},error:function(e){Botble.handleError(e)}})}))}}])&&e(n.prototype,o),l&&e(n,l),Object.defineProperty(n,"prototype",{writable:!1}),a}();t(document).ready((function(){new r}))}(jQuery,jQuery.fn.dataTable)})();