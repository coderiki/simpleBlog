@push('styles')
    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Page level plugin JavaScript-->
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush