<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Home Services</title> -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- css -->
    <link href="{{ asset('/') }}front/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/') }}front/simple-line-icons/css/simple-line-icons.css">
    <link href="{{ asset('/') }}front/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/css/flexslider.css" rel="stylesheet" />
    <link href="{{ asset('/') }}front/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/css/style.css" rel="stylesheet" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper" class="home-page">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('/') }}"><img src="{{ asset('/') }}front/img/logo.png" alt="logo" /></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('/') }}">Home</a></li>


                            @if(Session::get('provider_id'))

                            <li><a href="{{ route('create-post') }}">Create Service Post</a></li>

                            <li><a href="{{ route('view-post') }}">View Post</a></li>

                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('providerLogout').submit();">Logout</a></li>
                            <form action="{{ route('provider-logout') }}" method="post" id="providerLogout">
                                @csrf
                            </form>
                            @elseif(Session::get('customer_id'))
                            <li><a href="{{ route('service-post') }}">Find Services</a></li>

                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('customerLogout').submit();">Logout</a></li>
                            <form action="{{ route('customer-logout') }}" method="post" id="customerLogout">
                                @csrf
                            </form>
                            @else
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Sign Up <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('new-provider') }}">As Service Provider</a></li>
                                    <li><a href="{{ route('new-customer') }}">As Customer</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Log In <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('provider-login') }}">As Service Provider</a></li>
                                    <li><a href="{{ route('customer-login') }}">As Customer</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

        @yield('body')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widgetheading">Our Contact</h5>
                            <address>
                                <strong>Home Services company Inc</strong><br>
                                JC Main Road, Near Silnile tower<br>
                                Pin-21542 NewYork US.
                            </address>
                            <p>
                                <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
                                <i class="icon-envelope-alt"></i> email@domainname.com
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widgetheading">Quick Links</h5>
                            <ul class="link-list">
                                <li><a href="#">Latest Events</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widgetheading">Latest posts</h5>
                            <ul class="link-list">
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                                <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widgetheading">Recent News</h5>
                            <ul class="link-list">
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                                <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; Home Services 2018 All right reserved. <a href="http://webthemez.com/tag/free" target="_blank">Free Websites</a> By WebThemez</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="social-network">
                                <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <input type="hidden" value="{{ Session::get('provider_id') }}" id="provider_val">
    <input type="hidden" value="{{ Session::get('customer_id') }}" id="customer_val">
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('/') }}front/js/jquery.js"></script>
    <script src="{{ asset('/') }}front/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('/') }}front/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}front/js/jquery.fancybox.pack.js"></script>
    <script src="{{ asset('/') }}front/js/jquery.fancybox-media.js"></script>
    <script src="{{ asset('/') }}front/js/portfolio/jquery.quicksand.js"></script>
    <script src="{{ asset('/') }}front/js/portfolio/setting.js"></script>
    <script src="{{ asset('/') }}front/js/jquery.flexslider.js"></script>
    <script src="{{ asset('/') }}front/js/animate.js"></script>
    <script src="{{ asset('/') }}front/js/custom.js"></script>
    <script src="{{ asset('/') }}front/js/owl-carousel/owl.carousel.js"></script>

    <script>
        var provider_id = document.getElementById('provider_val').value;
        let customer_id = document.getElementById('customer_val').value;
        var post_id = document.getElementById('post_id').value;
        var receiver_id = '';

        if (provider_id != '') {
            var my_id = provider_id;
        } else if (customer_id != '') {
            var my_id = customer_id;
        }


        // console.log(my_id);
        // alert(customer_id);

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            Pusher.logToConsole = true;

            var pusher = new Pusher('3cd157e90f0c7eec7883', {
                cluster: 'ap2'
            });


            var channel = pusher.subscribe('my-channel');
            // window.Echo.private('my-channel').listen('my-event', function(e) {})
            channel.bind('my-event', function(data) {

                // alert(JSON.stringify(data));
                // // console.log(data);
                // // alert(my_id);
                if (my_id == data.provider_id) {
                    // $('#messages').click();
                    // scrollToBottomFunc();
                    // alert('sender');
                    $('#' + data.customer_id).click();
                } else if (my_id == data.customer_id) {
                    if (receiver_id == data.provider_id) {
                        $('#' + data.provider_id).click();
                    } else {
                        var pending = parseInt($('#' + data.provider_id).find('.pending').html());

                        if (pending) {
                            $('#' + data.provider_id).find('.pending').html(pending + 1)
                        } else {
                            $('#' + data.provider_id).append('<span class="pending">1</span>');
                        }
                    }
                }
            });


            $('.user').click(function() {
                $('.user').removeClass('active');
                $(this).addClass('active');
                // $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');

                var url = '{{ route("message", ":id") }}';
                url = url.replace(':id', receiver_id);

                // alert(url);

                $.ajax({
                    type: "GET",
                    url: url,
                    data: "",
                    cache: false,
                    success: function(data) {
                        // alert(data);
                        $('#messages').html(data);


                        scrollToBottomFunc();

                    }
                });
            });

            $(document).on('keyup', '.input-message input', function(e) {
                var message = $(this).val();

                console.log(e.keyCode);

                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val('');

                    var datastr = "receiver_id=" + receiver_id + "&message=" + message + "&post_id=" + post_id;
                    // alert(datastr);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('messages') }}",
                        data: datastr,
                        cache: false,
                        success: function(data) {

                        },
                        error: function(jqXHR, status, err) {

                        },
                        complete: function() {
                            scrollToBottomFunc();
                        }
                    });
                }

            });
        });

        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }
    </script>

    
</body>

</html>