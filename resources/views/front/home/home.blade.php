@extends('front.master')

@section('body')

<section id="banner">

    <!-- Slider -->
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="{{ asset('/') }}front/img/slides/1.jpg" alt="flexslider" />
                <div class="flex-caption">
                    <h3>Home Services</h3>
                    <p>Doloribus omnis minus temporibus perferendis ipsa architecto.</p>
                </div>
            </li>
            <li>
                <img src="{{ asset('/') }}front/img/slides/2.jpg" alt="flexslider" />
                <div class="flex-caption">
                    <h3>Affordable Services</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitincidunt.</p>
                </div>
            </li>
        </ul>
    </div>

    <!-- end slider -->

</section>
<section class="jumbobox">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h1>Services</h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur. Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.
                </div>

            </div>
        </div>
    </div>
</section>


<section id="content">


    <div class="container">
        <div class="row">
            <div class="skill-home">
                <div class="skill-home-solid clearfix">
                    @foreach($services as $key => $service)
                    <div class="col-md-3 text-center">
                        <div class="box">
                            @if($key == 0)
                            <span class="icons c1"><i class="icon-settings icons"></i></span>
                            @elseif($key ==1)
                            <span class="icons c2"><i class="icon-login icons"></i></span>
                            @elseif($key == 2)
                            <span class="icons c3"><i class="icon-user icons"></i></span>
                            @else
                            <span class="icons c4"><i class="icon-home icons"></i></span>
                            @endif
                            <div class="box-area">
                                <h3>{{ $service->name }}</h3>
                                <div style="height: 120px;">
                                    <p class="text-break">{{ $service->description }}</p>
                                </div>
                                <p><a href="#">Find Provider</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


    </div>
</section>


<section class="aboutUs" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="{{ asset('/') }}front/img/img1.png" class="img-center" alt="" /></div>
            <div class="col-md-6">
                <div>
                    <h2>Our Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur. Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur. Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.</p>
                </div>
                <br />
            </div>
        </div>

    </div>
</section>
<section class="clients">
    <div class="container">
        <div class="clients-slider">
            <h3 class="header-title">Our Clients</h3>
            <div class="clients-control pull-right">
                <a class="prev btn btn-gray btn-xs"><i class="fa fa-angle-left fa-2x"></i></a>
                <a class="next btn btn-gray btn-xs"><i class="fa fa-angle-right fa-2x"></i></a>
            </div>
            <span class="line"></span>
            <div id="clients-slider" class="owl-carousel">
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/amazon-grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/amazon.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/cisco_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/cisco.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/cityairline-grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/cityairline.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/dell-grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/dell.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/ebay-grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/ebay.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/google-grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/google.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/hp_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/hp.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/igneus_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/igneus.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/natural_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/natural.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/shell_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/shell.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/vadafone_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/vadafone.png" class="colored">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/walmart_grey.png">
                        <img alt="Our Client" src="{{ asset('/') }}front/img/OurClients/walmart.png" class="colored">
                    </a>
                </div>
            </div>
            <div class="fullwidth margin-bottom-20">
            </div>
        </div>
    </div>
</section>

@endsection