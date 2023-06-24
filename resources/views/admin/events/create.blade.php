@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.create_event'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.events') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('events.index') }}" class="text-muted">{{ __('words.show_events') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.create_event') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('events.store'))
@section('form_type', 'POST')

@section('form_content')
    @method('post')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.create_event') }}</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                               href="{{ '#' . $locale }}">{{ __('words.locale-' . $locale) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                         role="tabpanel">
                        <div class="col form-group">
                            <label>{{ __('words.title') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger">
                                    * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}"
                                       placeholder="{{ __('words.title') }}"
                                       class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                       value="{{ old($locale . '.title') }}">
                                @error($locale . '[title]')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.description') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea
                                class="form-control ckeditor @error($locale . '.description') is-invalid @enderror "
                                type="text"
                                name="{{ $locale . '[description]' }}"
                                rows="4">{{ old($locale . '.description') }} </textarea>
                            @error($locale . '[description]')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="form-group row">
                <div class="col">
                    <label for="duration">{{__('words.duration')}}</label>
                    <select class="form-control form-select-lg" name="duration" aria-label="duration" id="duration">
                        <option
                            value="daily" {{old('duration') == 'daily' ? "selected" : ""}}>{{__('words.daily')}}</option>
                        <option
                            value="weekly" {{old('duration') == 'weekly' ? "selected" : ""}}>{{__('words.weekly')}}</option>
                        <option
                            value="monthly" {{old('duration') == 'monthly' ? "selected" : ""}}>{{__('words.monthly')}}</option>
                        <option
                            value="yearly" {{old('duration') == 'yearly' ? "selected" : ""}}>{{__('words.yearly')}}</option>
                        <option
                            value="date" {{old('duration') == 'date' ? "selected" : ""}}>{{__('words.date')}}</option>
                    </select>
                </div>


                @include('admin.components.datePicker', [
               'label' => __('words.date'),
               'value' => old('date'),
               'name' => 'date',
                 ])

                @include('admin.components.timePicker', [
              'label' => __('words.from'),
              'value' => old('from'),
              'name' => 'from',
                ])

                @include('admin.components.timePicker', [
             'label' => __('words.to'),
             'value' => old('to'),
             'name' => 'to',
               ])
            </div>

            <div class="form-group row">
                @include('admin.components.image', [
                    'label' => __('words.image'),
                    'value' => old('image'),
                    'name' => 'image',
                    'id' => 'kt_image_3',
                    'required' => false,
                ])
            </div>

            <div class="form-group row">
                @include('admin.components.switch', [
                    'label' => __('words.status'),
                    'name' => 'status',
                    'val' => old('status'),
                    'required' => false,
                ])
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-block btn-outline-success">
                    {{ __('words.create') }}
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#duration').on('change', function () {
            if ($(this).val() === 'date') {
                $('.selected-date').removeClass('d-none');
            } else {
                $('.selected-date').addClass('d-none');
            }
        });
    </script>
@endsection
