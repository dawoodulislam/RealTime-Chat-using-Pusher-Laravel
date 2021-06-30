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
                <form action="{{ route('update-post') }}" method="POST">
                    @csrf
            
                    <div class="form-group row">
                        <label class="col-3">Change Post Status</label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approve" id="inlineRadio1" value="0" {{ $post->approve == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approve" id="inlineRadio2" value="1" {{ $post->approve == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Approve</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approve" id="inlineRadio2" value="2" {{ $post->approve == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Rejected</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $post->id }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-3"></label>
                        <div class="col-9">
                            <input type="submit" name="btn" class="btn btn-primary" value="Update Post">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection