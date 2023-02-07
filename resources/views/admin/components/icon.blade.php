@if($label || $value)
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            <label>{{$label}}<span class="text-danger"> * </span></label>
            <div class="get-and-preview">
                <div class="icon-preview"
                     style="float: left;
                                                            width: 55px;
                                                            height: 55px;
                                                            margin: 0 15px 0 0;
                                                            border-radius: 5px;
                                                            background: #fff;
                                                            text-align: center;
                                                            font-size: 30px;
                                                            line-height: 65px;
                                                            color: #1e1e1e;"
                     data-toggle="tooltip" title="Preview of selected Icon">
                    <i id="IconPreview" style="font-size:40px" class="{{$value}}"></i>
                </div>

                <button type="button" class="btn btn-warning my-3" id="GetIconPicker"
                        data-iconpicker-input="input#IconInput"
                        data-iconpicker-preview="i#IconPreview">{{__('words.select_icon')}}</button>
                <input type="text" class="form-control iconpicker" id="IconInput" name="icon" value="{{$value}}" hidden>
            </div>
        </div>
    </div>
@endif
@section('scripts')
    <script>
        // Default options
        IconPicker.Init({
            // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
            jsonUrl:"{{ asset('dashboard/js/iconpicker-1.5.0.json') }}",// Optional: Change the buttons or search placeholder text according to the language.
            searchPlaceholder: 'Search Icon',
            showAllButton: "{{__('words.show_all')}}",
            cancelButton: "{{__('words.cancel')}}",
            noResultsFound: "{{__('message.no_result')}}", // v1.5.0 and the next versionsborderRadius: '20px', // v1.5.0 and the next versions
        });
        IconPicker.Run('#GetIconPicker');
    </script>
    @endsection
