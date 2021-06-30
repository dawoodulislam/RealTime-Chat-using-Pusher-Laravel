@extends('admin.master')

@section('body')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div>
                @if( $msg = Session::get('message') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $msg }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ route('update-service') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-3">Service Name</label>
                        <div class="col-9">
                            <input type="text" name="name" value="{{ $service->name }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $service->id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Service Description</label>
                        <div class="col-9">
                            <textarea name="description" class="form-control">{{ $service->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Service Status</label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{ $service->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Published</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{ $service->status == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3"></label>
                        <div class="col-9">
                            <input type="submit" name="btn" class="btn btn-primary" value="Update Service">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection