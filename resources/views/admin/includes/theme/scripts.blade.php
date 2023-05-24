<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>




<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('dashboard/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
{{--<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>--}}
<script src="{{asset('dashboard/plugins/custom/gmaps/gmaps.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dashboard/js/pages/widgets.js')}}"></script>
<!--end::Page Scripts-->

<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/ckeditor/ckeditor.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('dashboard/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('dashboard/js/pages/crud/file-upload/image-input.js')}}"></script>
<script src="{{asset('dashboard/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('dashboard/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('dashboard/js/pages/crud/forms/widgets/bootstrap-timepicker.js')}}"></script>
<script src="{{ asset('dashboard/js/iconpicker-1.5.0.js') }}"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dashboard/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<!--end::Page Scripts-->

{{--start for select all start like in roles--}}
<script>
    $('#check_all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });
</script>
{{--end for select all start like in roles--}}


<script>
    CKEDITOR.config.language = "{{App()->getLocale()}}";
    CKEDITOR.config.removeButtons = 'Maximize,ShowBlocks,NewPage,BidiLtr,BidiRtl,Language,Source,CreateDiv,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,About';
    // $('.yearpicker').yearpicker();
    $('#kt_datetimepicker_1').datetimepicker({
        format: 'YYYY/MM/DD hh:mm A'
    });

    $('#kt_datepicker_2').datepicker({
        format: 'yyyy/mm/dd'
    });

    $(window).resize(function(){
        //Redraw datable
        // $('#example1').dataTable().fnAdjustColumnSizing();//Automatically sets header size
    });
    $(function () {
        $.fn.dataTable.ext.errMode = 'none';
        $("#example1").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false, "bPaginate": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "oLanguage": {
                "sSearch": "{{__('words.dt_search')}}",
                "sLoadingRecords": "{{__('words.loading')}}",
                "sInfo": "{{__('words.dt_Showing')}} _START_ {{__('words.to')}} _END_ {{__('words.of')}} _TOTAL_ {{__('words.dt_entries')}}",
                "sInfoEmpty": "{{__('words.dt_Showing_zero_page')}}",
                "sEmptyTable": "{{__('words.zeroRecords')}}"
            },

            'buttons': [
                {
                    extend: 'copy', text: '{{__('words.copy')}}'
                },
                {
                    extend: 'csv', text: '{{__('words.csv')}}'
                },
                {
                    extend: 'excel', text: '{{__('words.excel')}}'
                },
                {
                    extend: 'pdf', text: '{{__('words.pdf')}}'
                },
                {
                    extend: 'print', text: '{{__('words.print')}}'
                },
                {
                    extend: 'colvis', text: '{{__('words.column_visibility')}}'
                },
            ],
            "language": {
                "paginate": {
                    "previous": "{{__('pagination.previous')}}",
                    "next": "{{__('pagination.next')}}",
                }
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('.modal').on('shown.bs.modal', function () {
            //Get the datatable which has previously been initialized
            var dataTable = $('#example1').DataTable();
            //recalculate the dimensions
            dataTable.columns.adjust().responsive.recalc();

        });

        $(".filter-option-inner-inner").each(function () {
            var text = $(this).text();
            text = text.replace("Nothing selected", "{{__('words.not_selected')}}");
            $(this).text(text);
        });
    });

</script>

@yield('scripts')
