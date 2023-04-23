<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/rate/css/rate.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/
    apple-touch-icon-57-precomposed.png') }}">
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

    
</head><!--/head-->
<body>
	@include('frontend.layoutfe.header')
	
    @include('frontend.layoutfe.slider')
    <section>
        <div class="container">
            <div class="row">
                @include('frontend.layoutfe.menuleft')
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
	@include('frontend.layoutfe.footer')
</body>

<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/js/price-range.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

 <script type="text/javascript">
                $('.account').click(function(){
                    var checklogin= "{{Auth::check()}}";
                    console.log(checklogin);
                    if(checklogin)
                    {
                        //alert('da dang nhap');
                        
                    }
                    else
                    {
                        alert('yeu cau dang nhap');
                        //$(this).addclass('form');
                        //$("#hide").show();
                        return false;
                        
                    }
                    
                })
                $(".price-range").click(function () {
                                //alert(111);
                                 var pricerange = $('.tooltip-inner').text();
                                  //alert(pricerange);


                                $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                    $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/searchprice') }}",
                                    data: {
                                        'pricerange': pricerange,
                                    },
                                    success:function(res){
                                        //console.log(res);
                                        
                                         //var arrproductprice = res.productprice;
                                         var html='';

                                         res.map(function(value) {
                                            var getArr = JSON.parse(value.image);
                                            var img = "{{url('frontend/imageproduct').'/'}}"+ getArr[0];
                                            //console.log(img);
                                            html+="<div class='col-sm-4'>" +
                                            "<div class='product-image-wrapper'>" +
                                            "<div class='single-products'>" +
                                            "<div class='productinfo text-center'>"+
                                             "<img src='"+ img + "' alt='' />" +
                                            
                                            "<h2>"+value.price+"</h2>"+
                                            "<p>"+value.name+"</p>"+
                                            "<a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"+
                                            "</div>"+
                                            "<div class='product-overlay'>"+
                                                "<div class='overlay-content'>"+
                                                    "<h2 >"+value.price+"</h2>"+
                                                    "<p >"+value.name+"</p>"+
                                                     "<a href='#id=" +  value.id + "' class='btn btn-default add-to-cart'><i id='" + value.id + "'></i>Add to cart</a>" +
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                            "<div class='choose'>" +
                                                "<ul class='nav nav-pills nav-justified'>" +
                                                    "<li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>" +
                                                    "<li><a href='#'><i class='fa fa-plus-square'></i>Add to compare</a></li>" +
                                                "</ul>" +
                                                "</div>"+
                                            "</div>"+
                                        "</div>";
                                        //console.log(arrproductprice[value]);
                                         });
                                         //console.log(html);
                                         $(".product").html(html);
                                        
                                        
                                    }

                                });
                             });

</script>
@yield('js')
</body>
</html>