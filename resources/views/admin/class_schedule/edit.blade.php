@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.edit_class_schedule'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.class_schedules') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('schedules.index') }}" class="text-muted">{{ __('words.show_class_schedules') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.edit_class_schedule') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('schedules.update', $schedule->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $schedule->id }}">
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.edit_class_schedule') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                @include('admin.components.image', [
                    'label' => __('words.cover'),
                    'value' => old('cover', $schedule->cover),
                    'name' => 'cover',
                    'id' => 'kt_image_2',
                    'required' => false,
                ])

                @include('admin.components.image', [
                    'label' => __('words.image'),
                    'value' => old('image', $schedule->image),
                    'name' => 'image',
                    'id' => 'kt_image_3',
                    'required' => false,
                ])

                @include('admin.components.switch', [
                    'label' => __('words.status'),
                    'name' => 'status',
                    'val' => old('status', $schedule->status),
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
