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
                            <th>Customer Name</th>
                            <th>Provider Name</th>
                            <th>Approval Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deals as $key => $deal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $deal->customer->name }}</td>
                            <td>{{ $deal->provider->name }}</td>
                            <td>{{ $deal->approve == 0 ? 'Not Approve Yet' : 'Approved' }}</td>
                            <td>
                                <a href="{{ route('approve-deal', ['id' => $deal->id]) }}" class="btn btn-sm btn-success">Approve</a>
                                <a href="{{ route('see-messages', ['id' => $deal->id]) }}" class="btn btn-sm btn-info">See Messages</a>
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