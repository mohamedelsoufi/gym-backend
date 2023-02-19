@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.news_letters'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.news_letters') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.show_news_letters') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-title">{{ __('words.show_news_letters') }}</h3>
            </div>

            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <div class="dropdown dropdown-inline mr-2">
                    <!--begin::Button-->

                </div>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('words.message') }}</th>
                        <th>{{ __('words.created_at') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ formatDate($user->created_at) }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>

    </div>
@endsection
