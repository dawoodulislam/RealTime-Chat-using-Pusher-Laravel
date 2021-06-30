@extends('front.master')

@section('body')

<style>
    .imagebox {
        background-position: center;
        background-size: cover;
        height: 310px;
        position: relative;
    }

    .imagebox a {
        display: block;
        height: 100%;
    }
</style>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Services</h2>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            @foreach($posts as $key => $post)
            <div class="col-lg-4">
                <div class="imagebox" style="background-image: url('{{$post->image}}');">
                    <a href="{{ route('post-details-customer', ['id' => $post->id]) }}" style="border: 1px solid grey; display: block; padding: 10px 20px; margin-top: 25px;">
                        <div class="card border">
                            <div class="card-body">
                                <h4><b>Service Name</b>: {{ $post->service->name }}</h4>
                                <h5>Provider Name: {{ $post->provider->name }}</h5>
                                <p style="margin: 12px 0;"><b>Service Description</b>: {{ $post->description }}</p>
                                <h6><b>Price</b>: ${{ $post->price }}</h6>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection