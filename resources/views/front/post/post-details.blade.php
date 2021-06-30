@extends('front.master')

@section('body')

<style>
    .user-wrapper ul,
    .message-wrapper ul {
        margin: 0;
        padding: 0;
    }

    .user-wrapper li,
    .message-wrapper li {
        list-style: none;
    }

    .user-wrapper,
    .message-wrapper {
        border: 1px solid #dddddd;
        overflow-y: auto;
    }

    .user-wrapper {
        height: 600px;
    }

    .user {
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }

    .user:hover {
        background-color: #eee;
    }

    .user:last-child {
        margin-bottom: 0;
    }

    .media {
        margin-top: 0;
    }

    .pending {
        position: absolute;
        left: 23px;
        top: 25px;
        background-color: #055999;
        margin: 0;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        line-height: 18px;
        padding-left: 5px;
        color: #fff;
        font-size: 12px;
    }

    .media-left {
        margin: 0 10px;
    }

    .media-body p {
        margin: 6px 0;
    }

    .message-wrapper {
        overflow-y: auto;
        padding: 10px;
        height: 536px;
        background-color: #eee;
    }

    .messages .message {
        margin-bottom: 15px;
    }

    .messages .message:last-child {
        margin-bottom: 0;
    }

    .received,
    .sent {
        width: 45%;
        padding: 3px 10px;
        border-radius: 7px;
    }

    .received {
        background-color: #fff;
    }

    .sent {
        background-color: #FFC02A;
        float: right;
        text-align: right;
    }

    .message p {
        margin: 5px 0;
    }

    .date {
        color: #777;
        font-size: 12px;
    }

    .active {
        background-color: #FFC02A;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 5px;
        box-sizing: border-box;
        outline: none;
        border: 1px solid #ccc;
    }

    input[type=text]:focus {
        border: 1px solid #aaa;
    }

    .media-left,
    .media-right,
    .media-body {
        padding: 0 60px;
    }
</style>

<section class="section" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h2 class="text-center">Post Details</h2>
                    <div class="card border">
                        <div class="card-body">
                            <img src="{{ asset($post->image) }}" width="200px" height="200px" alt="">
                            <h3><b>Service Name</b>: {{ $post->service->name }}</h3>
                            <h5><b>Service Provider Name</b>: {{ $post->provider->name }}</h5>
                            {{ Session::put('provider', $post->provider->id) }}
                            <h6 style="margin: 12px 0 30px;"><b>Service Description</b>: {{ $post->description }}</h6>
                            <h4><b>Price</b>: ${{ $post->price }}</h4>
                            <!-- <input type="button" value="Chat with This Provider" class="btn" onclick="showMsgBox()" style="display: block;" id="msgBtn"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="chatWithProvider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Communicate with this provider:</h2>
                <!-- {{ Session::get('customer_id') }} -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $key => $user)
                        <li class="user" id="{{ $user->id }}">
                            <!-- @if($user->is_read)
                            <span class="pending">{{ $user->is_read }}</span>
                            @endif -->
                            <div class="media">
                                <div class="media-body">
                                    <p class="name">{{ $user->name }}</p>
                                    <input type="hidden" value="{{ $post->id }}" id="post_id">
                                    {{ Session::put('post_id', $post->id) }}
                                    <!-- {{ Session::put('customer', $user->id) }} -->
                                    <p class="service">{{ $user->access_label == 1 ? 'Provider' : 'Customer' }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8" id="messages">

            </div>
        </div>
    </div>
</section>


<!-- Post_id : {{ Session::get('post_id') }}
Customer: {{ Session::get('customer_id') }}
Provider: {{ Session::get('provider') }} -->

@php

$deal= App\Models\Deal::where(['post_id' => $post->id, 'customer_id'=> Session::get('customer_id'), 'provider_id'=> Session::get('provider')])->first();


if($deal != ''){
$provider = App\Models\Customer::where('id', $deal->provider_id)->first();
}

@endphp



<section style="padding: 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($deal) {
                ?>
                    @if($deal->approve == 0)
                    <div class="agree-div text-center">
                        <h5 id="agreeText">Thanks for the dealing with this provider. Wait for the admin approval. After approve you will able to see contact information of this Provider.</h5>
                    </div>
                    @else
                    <div class="agree-div text-center">
                        <h2>Admin Approved your Deal. Thank You..</h2>
                        <h3><b>Provider Name: </b>{{ $provider->name}}</h3>
                        <h4><b>Provider Phone: </b>{{ $provider->mobile}}</h4>
                        <h5><b>Provider Address: </b>{{ $provider->address}}</h5>
                    </div>
                    @endif
                <?php
                } else {
                ?>
                    <div class="agree text-center">
                        <input type="button" value="Deal With This Provider" class="btn" onclick="textDisappear()" id="mainFrameOne">
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>

<script>
    function textDisappear() {
        document.getElementById("mainFrameOne").style.display = "none";
        // document.getElementById("agreeText").style.display = "block";
        window.location.href = "{{ route('admin-approve')}}";
    }
</script>

@endsection