<script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/plugins/simplebar/simplebar.min.js') }}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
<script src="{{ asset('dist/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/js/chart.js') }}"></script>
<script src="{{ asset('dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('dist/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('dist/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
<script src="{{ asset('dist/js/map.js') }}"></script>

<!-- Moment.js and DateRangePicker -->
<script src="{{ asset('dist/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('dist/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Toastr for notifications -->
<script src="{{ asset('dist/plugins/toaster/toastr.min.js') }}"></script>

<!-- Custom Mono JS -->
<script src="{{ asset('dist/js/mono.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        // Initialize Date Range Picker
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        // Handle Apply Action
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });

        // Handle Clear Action
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
            jQuery(this).val('');
        });
    });
</script>

<!-- jQuery -->
<script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 5 Bundle (contains both Bootstrap JS and Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
