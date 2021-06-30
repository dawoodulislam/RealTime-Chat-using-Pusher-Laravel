@extends('front.master')

@section('body')

<section class="shop login section" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form">
                    <h2 class="text-center">Create a Service Post</h2>

                    @if( $msg = Session::get('message') )

                    <h4>{{ $msg }}</h4>

                    @endif
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('add-post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Select Service</label>
                                    <select name="service_id" class="form-control" required="required">
                                        <option>.....Select Service...</option>
                                        @foreach($services as $key => $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Service Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Service Short Description</label>
                                    <textarea name="description" class="form-control" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Service Long Description</label>
                                    <textarea name="long_description" class="form-control" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Service Image</label>
                                    <input type="file" name="image" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Add Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection