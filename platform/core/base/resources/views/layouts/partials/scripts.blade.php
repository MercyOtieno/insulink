<link href="{{ asset('vendor/core/css/tailwind.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/core/common/uikit/css/uikit.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('vendor/core/common/uikit/js/uikit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/core/common/uikit/js/uikit-icons.min.js') }}"></script>
<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.js">
</script>
    <script>
    $(document).ready(function() {
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'print', 'excel', 'pdf'
                ]
            });
            $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
            })
        } );
</script>
<script type="text/javascript">
    $("body").on("click",".delete",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this item!",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".riot").click(function() {
            $("#riot_value").attr("disabled", true);
            if ($("input[name=riot_cond]:checked").val() == "exclusive") {
                $("#riot_value").attr("disabled", false);
            }
        });
        $(".loss_use").click(function() {
            $("#loss_use_value").attr("disabled", true);
            if ($("input[name=loss_use_cond]:checked").val() == "exclusive") {
                $("#loss_use_value").attr("disabled", false);
            }
        });
        $(".rescue").click(function() {
            $("#rescue_value").attr("disabled", true);
            if ($("input[name=rescue_cond]:checked").val() == "exclusive") {
                $("#rescue_value").attr("disabled", false);
            }
        });
        $(".pvt").click(function() {
            $("#pvt_value").attr("disabled", true);
            if ($("input[name=pvt_cond]:checked").val() == "exclusive") {
                $("#pvt_value").attr("disabled", false);
            }
        });
        $(".riot").click(function() {
            $("#riot_value").attr("disabled", true);
            if ($("input[name=riot_cond]:checked").val() == "exclusive") {
                $("#riot_value").attr("disabled", false);
            }
        });
        $(".excess").click(function() {
            $("#excess_value").attr("disabled", true);
            if ($("input[name=excess_cond]:checked").val() == "exclusive") {
                $("#excess_value").attr("disabled", false);
            }
        });
    });
</script>
<script>
    var easyMDE = new EasyMDE({element: document.getElementById('product_brochure')});
</script>