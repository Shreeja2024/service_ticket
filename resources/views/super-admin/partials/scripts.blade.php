<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assetsBackend') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assetsBackend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assetsBackend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assetsBackend') }}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assetsBackend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('assetsBackend') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('assetsBackend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('assetsBackend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assetsBackend') }}/plugins/chart.js/Chart.min.js"></script>

<script src="{{ asset('assetsBackend') }}/dist/js/demo.js"></script>
<script src="{{ asset('assetsBackend') }}/dist/js/pages/dashboard2.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- <!-- Add ckeditor script-->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script> --}}
<!-- Include Summernote JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#content').summernote();
    // });
</script>


<script>
    $(document).ready(function() {
        // Add More functionality
        $('#add_more').on('click', function() {
            const newItem = `
            <div class="item-row d-flex align-items-center">
                <input type="text" name="item[]" class="form-control" placeholder="Enter item">
                <button type="button" class="btn btn-danger remove-item ml-2">Remove</button>
            </div></br>`;
            $('#items-container').append(newItem);
        });

        // Remove Item functionality
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item-row').remove();
        });
    });
</script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

