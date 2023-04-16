@if(Session::has('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "{{app()->getLocale() == 'ar' ? 'toast-top-left' : 'toast-top-right'}}",
            "preventDuplicates": false,
            // "onclick": null,
            "showDuration": "30000000000",
            "hideDuration": "100000000000",
            "timeOut": "5000000000",
            "extendedTimeOut": "10000000000000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.success("{{ Session::get('success') }}");
    </script>
@endif


