@extends('admin.master')

@section('body')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Deals</h1>
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
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Provider Name</th>
                            <th>Approval Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->provider->name }}</td>
                            <td>
                            <?php
                            if($post->approve == 0){
                                echo "Pending";
                            }
                            else if($post->approve == 1){
                                echo "Approved";
                            }
                            else{
                                echo "Rejected";
                            }
                            ?>
                            </td>
                            <td>
                                <a href="{{ route('approve-post', ['id' => $post->id]) }}" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection