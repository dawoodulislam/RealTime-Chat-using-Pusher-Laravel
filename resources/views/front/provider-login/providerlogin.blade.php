@extends('front.master')

@section('body')

<section class="shop login section" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form">
                    <h2 class="text-center">Log In</h2>
                    <p class="text-center">You are logging in as Provider</p>

                    @if( $msg = Session::get('message') )

                    <h4>{{ $msg }}</h4>

                    @endif
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('check-provider') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Email<span>*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Password<span>*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Login</button>
                                    <a href="{{ route('new-provider') }}" class="btn">Register</a>
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