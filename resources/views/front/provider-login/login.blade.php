@extends('front.master')

@section('body')

<section class="shop login section" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form">
                    <h2 class="text-center">Register</h2>
                    <p class="text-center">You are registering as Provider</p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('add-provider') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Name<span>*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="" required="required">
                                    <input type="hidden" name="access_label" value="1">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Email<span>*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Mobile<span>*</span></label>
                                    <input type="number" name="mobile" class="form-control" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Address<span>*</span></label>
                                    <textarea name="address" class="form-control" required="required"></textarea>
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
                                    <button class="btn" type="submit">Register</button>
                                    <a href="{{ route('provider-login') }}" class="btn">Login</a>
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