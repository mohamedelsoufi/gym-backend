@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.show_contact_request'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.contact_requests') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('contact-requests.index') }}" class="text-muted">{{ __('words.show_contact_request') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.show_contact_request') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.show_contact_request') }}</h3>
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

        <div class="card card-custom">

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.name') }}:</h5>
                            </div>
                            <p class="m-0">{{ $contact->name}}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.date') }}:</h5>
                            </div>
                            <p class="m-0">
                                {{ $contact->email }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.phone') }}:</h5>
                            </div>
                            <p class="m-0" dir="ltr" style="text-align: match-parent;">
                                {{ $contact->phone }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.subject') }}:</h5>
                            </div>
                            <p class="m-0">
                                {{ $contact->subject }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.message') }}:</h5>
                            </div>
                            <p class="m-0">
                                {{ $contact->message }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.created_at') }}:</h5>
                            </div>
                            <p class="m-0">{{ formatDate($contact->created_at) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @permission('reply-contact_requests')
                <div class="card-footer">
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('contact-requests.reply', $contact->id) }}" class="btn btn-block btn-outline-info">
                                {{ __('words.reply') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endpermission
        </div>
    </div>
@endsection
