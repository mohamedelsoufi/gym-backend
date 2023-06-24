@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.edit_comment'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.comments') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('comments.index') }}" class="text-muted">{{ __('words.show_comments') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.edit_comment') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('comments.update', $comment->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $comment->id }}">

    <div class="card card-custom">
        <div class="card-body">
            <div class="form-group row">
                <div class="col">
                    <label for="status">{{__('words.status')}}</label>
                    <select class="form-control form-select-lg" name="status" aria-label="status" id="status" {{$comment->status !== 'pending' ? 'disabled' : ''}}>
                        <option
                            value="pending" {{old('status',$comment->status) == 'pending' ? "selected" : ""}}>{{__('words.pending')}}</option>
                        <option
                            value="approve" {{old('status',$comment->status) == 'approve' ? "selected" : ""}}>{{__('words.approve')}}</option>
                        <option
                            value="reject" {{old('status',$comment->status) == 'reject' ? "selected" : ""}}>{{__('words.reject')}}</option>
                    </select>
                </div>
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
