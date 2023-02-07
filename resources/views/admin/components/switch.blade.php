@if($name && $label || $val)
    <div class="col-md-6 col-sm-12 input">
        <label for="active" class="checkbox-inline">{{$label}}</label>

        <span class="switch switch-icon">
        <label>
            <input type="checkbox" id="{{$name}}"
                   name="{{$name}}" value="1" {{ !isset($val) ? "checked" : "" }}  {{$val == 1 ? "checked" : ""}}/>
            <span></span>
        </label>
    </span>
    </div>
@endif
