@if($name && $label && $options)
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <select class="form-control selectpicker" id="multiSelect1" multiple="multiple" data-live-search="true" name="{{$name}}">
                @foreach($options as $option)
                    <option value="{{$option->id}}">{{$option->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif



