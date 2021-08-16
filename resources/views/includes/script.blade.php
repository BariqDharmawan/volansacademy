@php
    $assets = [
        'jquery/jquery.min.js',
        'bootstrap/js/bootstrap.bundle.min.js',
        'overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'datatables/jquery.dataTables.min.js',
        'datatables-bs4/js/dataTables.bootstrap4.min.js',
        'datatables-responsive/js/dataTables.responsive.min.js',
        'datatables-responsive/js/responsive.bootstrap4.min.js',
        'select2/js/select2.full.min.js',
        'moment/moment.min.js',
        'inputmask/min/jquery.inputmask.bundle.min.js',
        'daterangepicker/daterangepicker.js',
        'tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'croppie/croppie.js',
    ];
@endphp

@foreach ($assets as $asset)
<script src="{{ asset('AdminLTE/plugins/' . $asset) }}"></script>
@endforeach

<script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>