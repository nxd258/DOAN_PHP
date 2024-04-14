<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="$meta_keywords">
	<meta name="robots" content="index, follow">
	<link rel="canonical" href="{{$url_canonnial}}">
	<title>{{$meta_title}}</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/plugin.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
	<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('frontend/images/ico/favicon.ico')}}">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head><!--/head-->

<body>
<div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">
                       <!--header area -->
                        <div class="header_area">
                               <!--header top-->
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="switcher">
                                                <ul>
                                                    <li class="languages"><a href="#"><img src="assets\img\logo\fontlogo.jpg" alt="">+0993282493</a>
                                                    </li>
                                                    <li class="currency"><a href="#">NgoMtien@gmail.com</i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
												<?php
														$customer_id=Session()->get('customer_id');
														if($customer_id!=NULL)	{
														?>
														<li><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
													<?php
														}else
														{
													?>
													<li><a href="{{URL::to('/login-checkout')}}">Thanh toán</a></li>

													<?php
														}
													?>
													</a></li>
													<li><a href="{{URL::to('/giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
													<?php
														$customer_id=Session()->get('customer_id');
														if($customer_id!=NULL){
														?>
														<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
														<?php
														}else
														{
															?>
														<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng Nhập </a></li>
													<?php
														}
													?>
                                                </ul>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                <!--header top end-->

                                <!--header middel-->
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="index.html"><img src="{{('frontend/images/home/logo.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
												<form action="{{URL::to('/timkiem')}}" method="post">
													{{csrf_field()}}
													<input type="text" name="submit_keyword" placeholder="Nhập từ khóa..." type="text">
                                                        <button type="submit" value="Tìm kiếm"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                <div class="shopping_cart">
                                                    <a href="#"><i class="fa fa-shopping-cart"></i>3 mục <i class="fa fa-angle-down"></i></a>

                                                    <!--mini cart-->
                                                    <div class="mini_cart">
                                                            @if(Session()->get('cart'))
                                                                @foreach(Session()->get('cart') as $key =>$cart)
                                                                $i++;
                                                                 <div class="cart_item">
                                                                    <div class="cart_img">
                                                                        <a href="{{URL::to('/giohang')}}"><img src="{{asset('/upload/product/'.$cart['product_image'])}}" alt=""></a>
                                                                        <ul href="{{URL::to('/giohang')}}">{{$cart["product_price"]}}</ul>
                                                                    </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif


                                                       <div class="cart_button">
                                                            <a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--header middel end-->
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Shop</a>
                                                            <div class="mega_menu">
                                                                    <div class="mega_top fix">
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Danh mục</a></h3>
                                                                             @foreach($categorys as $key =>$cate)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/danh-sach-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Thương hiệu</a></h3>
                                                                            @foreach($brands as $key =>$brand)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/giohang')}}">Giỏ hàng</a>
                                                            </li>
                                                            <li><a href="#">Liên hệ</a>
                                                            </li>
                                                            <li><a href="blog.html">blog</a>
                                                            </li>
                                                            <li><a href="contact.html">contact us</a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Home</a>
                                                            </li>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Shop</a>
                                                                <div>
                                                                <div>
                                                                    <div class="mega_top fix">
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Danh mục</a></h3>
                                                                             @foreach($categorys as $key =>$cate)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/danh-sach-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="mega_items">
                                                                            <h3><a href="#">Thương hiệu</a></h3>
                                                                            @foreach($brands as $key =>$brand)
                                                                             <ul>
                                                                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>

                                                                            </ul>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                                                <div>

                                                                </div>
                                                            </li>
                                                            <li><a href="{{URL::to('/giohang')}}">Giỏ hàng</a>
                                                                <div>
                                                                    <div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><a href="#">pages</a>
                                                                <div>
                                                                </div>
                                                            </li>

                                                            <li><a href="#">blog</a>
                                                                <div>

                                                                </div>
                                                            </li>
                                                            <li><a href="#">contact us</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->

                                    <!--content-->
                                    <div class="featured_product">
                                        <div class="row">
											@yield('content')
                                        </div>
                                    </div>
                                    <!--content-->


                    </div>
                    <!--pos page inner end-->
                </div>
    </div>
	<footer id="footer" style="background-color: #00bba6; color: #fff;"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2 style="color: #fff; font-size: 25px; margin-top: 26px;"><span>SHOP</span>Colthing</h2>
							<p>Thời trang cao cấp, uy tín, chất lượng vận chuyển nhanh chóng!</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="footer-img">

									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{('frontend/images/home/map.png')}}" alt="" />
							<p>Quận Thanh Khê - Thành Phố Đà Nẵng</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">MUA HÀNG TRỰC TUYẾN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">0935938598</a></li>
								<li><a href="#">NgoMTien@gmail.com</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">HOTLINE GÓP Ý</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">0935938598</a></li>
								<li><a href="#">NgoMTien@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff ; font-size: 25px">Thông tin</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Đối tác</a></li>
								<li><a href="#">Tuyển dụng</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách đổi hàng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách bảo hành </a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2 style="color: #fff; font-size: 25px;">FAQ</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Địa chỉ email" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Nhận các bản cập nhật gần đây nhất từ
                                    trang web của chúng tôi và được cập nhật bản thân của bạn ...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 NMT.</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
    <script src="{{asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('frontend/js/popper.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('frontend/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/js/main.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Messenger Plugin chat Code -->
		<div id="fb-root"></div>

		<!-- Your Plugin chat code -->
		<div id="fb-customer-chat" class="fb-customerchat">
		</div>

		<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "107148281781373");
		chatbox.setAttribute("attribution", "biz_inbox");

		window.fbAsyncInit = function() {
			FB.init({
			xfbml            : true,
			version          : 'v12.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.send_order').click(function(){

			var shipping_email =$('.shipping_email').val();
			var shipping_name=$('.shipping_name').val();
			var shipping_phone=$('.shipping_phone').val();
			var shipping_address=$('.shipping_address').val();
			var shipping_notes=$('.shipping_notes').val();
			var payment_method=$('.payment_method').val();

			var _token=$('input[name="_token"]').val();


			$.ajax({
				url:"{{url('/order')}}",
				method:'post',
				data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_phone:shipping_phone,
					shipping_address:shipping_address,shipping_notes:shipping_notes,payment_method:payment_method,_token:_token},
					success:function(data){
						alert("Mua hàng thành công!");
						location.reload();
					}
			});
		});
	});
	</script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id=$(this).data('id');
                var cart_product_id =$('.cart_product_id_'+id).val();
                var cart_product_name=$('.cart_product_name_'+id).val();
                var cart_product_image=$('.cart_product_image_'+id).val();
                var cart_product_price=$('.cart_product_price_'+id).val();
                var cart_product_quantity=$('.cart_product_quantity_'+id).val();
                var cart_product_qty=$('.cart_product_qty_'+id).val();
                var cart_product_size = [];
                    $('.cart_product_size').each(function(){
                            if($(this).is(":checked"))
                            {
                                cart_product_size.push($(this).val());
                            }
                    });
                    cart_product_size = cart_product_size.toString();

                var _token=$('input[name="_token"]').val();


                $.ajax({
                    url:"{{url('/add-cart-ajax')}}",
                    method:'post',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,cart_product_quantity:cart_product_quantity,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size,_token:_token},
                        success:function(data){
                            swal("Đã thêm sản phẩm vào giỏ hàng!");
                            location.reload();
                        }
                });
            });
        });
        </script>
    </body>
</html>
