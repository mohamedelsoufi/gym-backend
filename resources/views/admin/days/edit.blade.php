@extends('admin.layouts.master')
@section('day', settings()->website_day . ' | ' . __('words.edit_day'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.days') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('days.index') }}" class="text-muted">{{ __('words.show_days') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.edit_day') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('days.update', $day->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $day->id }}">
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-day">
                <h3 class="card-label">{{ __('words.edit_day') }}</h3>
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
                    <div class="tab-pane fade show @if ($key == 0) active @endif"
                        id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>{{ __('words.day') }} - {{ __('words.locale-' . $locale) }}<span class="text-danger">
                                    * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[day]' }}"
                                    placeholder="{{ __('words.day') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.day') is-invalid @enderror"
                                    value="{{ old($locale . '.day', $day->translate($locale)->day) }}">
                                @error($locale . '[day]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="form-group row">
                @include('admin.components.switch', [
                    'label' => __('words.status'),
                    'name' => 'status',
                    'val' => old('status', $day->status),
                    'required' => false,
                ])
            </div>

        </div>

    </div>


    <div class="card-footer">
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-block btn-outline-success">
                    {{ __('words.update') }}
                </button>
            </div>
        </div>
    </div>


@endsection
