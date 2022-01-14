@extends('base')
@section('main')

        <!-- Cart Offcanvas Start -->
        <div class="cart-offcanvas-wrapper">
            <div class="offcanvas-overlay"></div>

            <!-- Cart Offcanvas Inner Start -->
            <div class="cart-offcanvas-inner">

                <!-- Button Close Start -->
                <div class="offcanvas-btn-close">
                    <i class="pe-7s-close"></i>
                </div>
                <!-- Button Close End -->

                <!-- Offcanvas Cart Content Start -->
                <div class="offcanvas-cart-content">

                    <!-- Cart Product/Price Start -->
                    <div class="cart-product-wrapper mb-4 pb-4 border-bottom">

                        <!-- Single Cart Product Start -->
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href="single-product.html"><img src="{{asset('assets/images/products/small-product/1.jpg')}}" alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="single-product.html">New badge product</a></h3>
                                <div class="product-quty-price">
                                    <span class="cart-quantity">3 <strong> × </strong></span>
                                    <span class="price">
											<span class="new">$70.00</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single Cart Product End -->

                        <!-- Product Remove Start -->
                        <div class="cart-product-remove">
                            <a href="#"><i class="pe-7s-close"></i></a>
                        </div>
                        <!-- Product Remove End -->

                    </div>
                    <!-- Cart Product/Price End -->

                    <!-- Cart Product/Price Start -->
                    <div class="cart-product-wrapper mb-4 pb-4 border-bottom">

                        <!-- Single Cart Product Start -->
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href="single-product.html"><img src="{{asset('assets/images/products/small-product/2.jpg')}}" alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="single-product.html">Soldout new product</a></h3>
                                <div class="product-quty-price">
                                    <span class="cart-quantity">4 <strong> × </strong></span>
                                    <span class="price">
											<span class="new">$80.00</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single Cart Product End -->

                        <!-- Product Remove Start -->
                        <div class="cart-product-remove">
                            <a href="#"><i class="pe-7s-close"></i></a>
                        </div>
                        <!-- Product Remove End -->

                    </div>
                    <!-- Cart Product/Price End -->

                    <!-- Cart Product/Price Start -->
                    <div class="cart-product-wrapper mb-4 pb-4 border-bottom">

                        <!-- Single Cart Product Start -->
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href="single-product.html"><img src="{{asset('assets/images/products/small-product/1.jpg')}}" alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="single-product.html">New badge product</a></h3>
                                <div class="product-quty-price">
                                    <span class="cart-quantity">2 <strong> × </strong></span>
                                    <span class="price">
											<span class="new">$50.00</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single Cart Product End -->

                        <!-- Product Remove Start -->
                        <div class="cart-product-remove">
                            <a href="#"><i class="pe-7s-close"></i></a>
                        </div>
                        <!-- Product Remove End -->

                    </div>
                    <!-- Cart Product/Price End -->

                    <!-- Cart Product Total Start -->
                    <div class="cart-product-total mb-4 pb-4 border-bottom">
                        <span class="value">Total</span>
                        <span class="price">220$</span>
                    </div>
                    <!-- Cart Product Total End -->

                    <!-- Cart Product Button Start -->
                    <div class="cart-product-btn mt-4">
                        <a href="cart.html" class="btn btn-light btn-hover-primary w-100"><i class="fa fa-shopping-cart"></i> View cart</a>
                        <a href="checkout.html" class="btn btn-light btn-hover-primary w-100 mt-4"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                    <!-- Cart Product Button End -->

                </div>
                <!-- Offcanvas Cart Content End -->

            </div>
            <!-- Cart Offcanvas Inner End -->
        </div>
        <!-- Cart Offcanvas End -->

    </div>
    <!-- Header Section End -->

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{asset('assets/images/slider/slider1-1.png')}}" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="title m-0">Get -30% off</h2>
                            <p>Latest baby product & toy collections.</p>
                            <a href="shop.html" class="btn btn-primary btn-hover-light">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="{{asset('assets/images/slider/slider1-2.png')}}" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="title m-0"> New Arrivals <br />Get flat 50% off </h2>
                            <a href="shop.html" class="btn btn-primary btn-hover-light">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-lg-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none"><i class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none"><i class="pe-7s-angle-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Banner Section Start -->
    <div class="section section-margin">
        <div class="container">
            <!-- Banners Start -->
            <div class="row mb-n6">

                <!-- Banner Start -->
                <div class="col-md-6 col-12 mb-6 pe-lg-2 pe-md-3">
                    <a href="shop.html" class="banner" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{asset('assets/images/banner/1.png')}}" alt="Banner Image" />
                    </a>
                </div>
                <!-- Banner End -->

                <!-- Banner Start -->
                <div class="col-md-6 col-12 mb-6 ps-lg-2 ps-md-3">
                    <a href="shop.html" class="banner" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{asset('assets/images/banner/2.png')}}" alt="Banner Image" />
                    </a>
                </div>
                <!-- Banner End -->

            </div>
            <!-- Banners End -->
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Product Section Start -->
    <div class="section section-margin mt-0 position-relative">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row mb-lg-8 mb-6">
                <!-- Section Title Start -->
                <div class="col-lg col-12">
                    <div class="section-title mb-0 text-center" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="title mb-2">Featured Collection</h2>
                        <p>Add featured products to weekly lineup</p>
                    </div>
                </div>
                <!-- Section Title End -->

            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="600">
                    <div class="product-carousel arrow-outside-container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/1.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/3.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="sale">-18%</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Dinosaur Toys for Baby</a></h5>
                                                <span class="price">
														<span class="new">
															$12.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/2.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/4.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Mini Car Toy for Kids</a></h5>
                                                <span class="price">
														<span class="new">
															$28.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/5.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/7.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="sale">-20%</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Happy Kids With Gift</a></h5>
                                                <span class="price">
														<span class="new">$38.50</span>
                                                <span class="old">$42.85</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/4.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/6.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="sale">-20%</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Baby Cat Doll</a></h5>
                                                <span class="price">
														<span class="new">$38.50</span>
                                                <span class="old">$42.85</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/8.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/10.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="new">New</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Happy Kids With Gift</a></h5>
                                                <span class="price">
														<span class="new">
															$28.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/9.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/11.jpg')}}" alt="Product" />
                                                </a>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Dinosaur Toys for Baby</a></h5>
                                                <span class="price">
														<span class="new">
															$25.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product End -->

                                <!-- Product Start -->
                                <div class="swiper-slide">
                                    <div class="product-wrapper">
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/12.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/1.jpg')}}" alt="Product" />
                                                </a>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Baby Rocking Horse</a></h5>
                                                <span class="price">
														<span class="new">
															$25.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img class="fit-image" src="{{asset('assets/images/products/medium-product/7.jpg')}}" alt="Product" />
                                                    <img class="second-image fit-image" src="{{asset('assets/images/products/medium-product/5.jpg')}}" alt="Product" />
                                                </a>
                                                <span class="badges">
														<span class="sale">-18%</span>
                                                </span>
                                                <div class="actions">
                                                    <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                <div class="add-cart-btn">
                                                    <button class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href="single-product.html">Baby Cat Doll</a></h5>
                                                <span class="price">
														<span class="new">
															$12.50
														</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product End -->
                            </div>

                            <div class="swiper-pagination d-block d-md-none"></div>
                            <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                            <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->

    <!-- Testimonial Section Start -->
    <div class="section testimonial-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="section-title text-center" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="title text-white">Testimonials</h2>
                        <p class="sub-title text-white">What they say</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Testimonial Carousel Start -->
                    <div class="testimonial-carousel" data-aos="fade-up" data-aos-delay="400">
                        <div class="swiper-container testimonial-gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/images/testimonial/thumb-1.png')}}" alt="Product Image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/images/testimonial/thumb-2.png')}}" alt="Product Image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/images/testimonial/thumb-3.png')}}" alt="Product Image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/images/testimonial/thumb-4.png')}}" alt="Product Image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container testimonial-gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- Testimonial Content Start -->
                                    <div class="testimonial-content text-center">
                                        <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                        <span class="ratings justify-content-center mb-3">
												<span class="rating-wrap text-white">
													<span class="star text-warning" style="width: 80%"></span>
                                        </span>
                                        <span class="rating-num text-light">(3)</span>
                                        </span>
                                        <h4 class="testimonial-author mb-0">Anamika lusy</h4>
                                    </div>
                                    <!-- Testimonial Content End -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Testimonial Content Start -->
                                    <div class="testimonial-content text-center">
                                        <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                        <span class="ratings justify-content-center mb-3">
												<span class="rating-wrap text-white">
													<span class="star text-warning" style="width: 80%"></span>
                                        </span>
                                        <span class="rating-num text-light">(3)</span>
                                        </span>
                                        <h4 class="testimonial-author mb-0">Tinsy Nilom</h4>
                                    </div>
                                    <!-- Testimonial Content End -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Testimonial Content Start -->
                                    <div class="testimonial-content text-center">
                                        <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                        <span class="ratings justify-content-center mb-3">
												<span class="rating-wrap text-white">
													<span class="star text-warning" style="width: 80%"></span>
                                        </span>
                                        <span class="rating-num text-light">(3)</span>
                                        </span>
                                        <h4 class="testimonial-author mb-0">Cristal Aryan</h4>
                                    </div>
                                    <!-- Testimonial Content End -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Testimonial Content Start -->
                                    <div class="testimonial-content text-center">
                                        <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                        <span class="ratings justify-content-center mb-3">
												<span class="rating-wrap text-white">
													<span class="star text-warning" style="width: 80%"></span>
                                        </span>
                                        <span class="rating-num text-light">(3)</span>
                                        </span>
                                        <h4 class="testimonial-author mb-0">Jems Jhon</h4>
                                    </div>
                                    <!-- Testimonial Content End -->
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white d-none"></div>
                            <div class="swiper-button-prev swiper-button-white d-none"></div>
                        </div>
                    </div>
                    <!-- Testimonial Carousel End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Product List Banner Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n6">

                <!-- Banner Start -->
                <div class="col-lg-4 col-md-12 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="200">
                        <a href="shop.html"><img src="{{asset('assets/images/banner/3.png')}}" alt="Banner Image" /></a>
                    </div>
                </div>
                <!-- Banner End -->

                <!-- Product List Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">

                    <!-- Product List Wrapper Start -->
                    <div class="product-list-wrapper" data-aos="fade-up" data-aos-delay="400">
                        <!-- Product List Title Start -->
                        <div class="product-list-title mb-5">
                            <h4 class="title">Best Seller Product</h4>
                        </div>
                        <!-- Product List Title End -->

                        <!-- Product List Carousel Start -->
                        <div class="product-list-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/1.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/10.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Happy Kids With Gift</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 67%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$12.50</span>
                                                <span class="old">$15.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/2.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/9.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Cat Doll</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 80%"></span>
                                                </span>
                                                <span class="rating-num">(3)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$10.50</span>
                                                <span class="old">$12.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/3.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/8.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Mini Car Toy for Kids</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 50%"></span>
                                                </span>
                                                <span class="rating-num">(6)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$22.50</span>
                                                <span class="old">$25.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/4.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/7.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Dinosaur Toys for Baby</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 60%"></span>
                                                </span>
                                                <span class="rating-num">(5)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$18.50</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/5.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/6.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Robotics for Kids </a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 75%"></span>
                                                </span>
                                                <span class="rating-num">(9)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$20.50</span>
                                                <span class="old">$22.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                    </div>

                                    <div class="swiper-slide">

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/18.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/17.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Happy Kids With Gift</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 67%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$13.00</span>
                                                <span class="old">$16.00</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/16.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/15.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Mini Car Toy for Kids</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 80%"></span>
                                                </span>
                                                <span class="rating-num">(3)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$14.50</span>
                                                <span class="old">$15.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/14.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/13.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Rocking Horse</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 50%"></span>
                                                </span>
                                                <span class="rating-num">(6)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$26.50</span>
                                                <span class="old">$27.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/12.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/11.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Cat Doll</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 60%"></span>
                                                </span>
                                                <span class="rating-num">(5)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$19.50</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/10.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/9.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Dinosaur Toys for Baby</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 75%"></span>
                                                </span>
                                                <span class="rating-num">(9)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$21.50</span>
                                                <span class="old">$22.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                    </div>
                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>

                        </div>
                        <!-- Product List Carousel End -->
                    </div>
                    <!-- Product List Wrapper End -->

                </div>
                <!-- Product List End -->

                <!-- Product List Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">

                    <!-- Product List Wrapper Start -->
                    <div class="product-list-wrapper" data-aos="fade-up" data-aos-delay="600">

                        <!-- Product List Title Start -->
                        <div class="product-list-title mb-5">
                            <h4 class="title">On-Sale Product</h4>
                        </div>
                        <!-- Product List Title End -->

                        <!-- Product List Carousel Start -->
                        <div class="product-list-carousel-2">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/18.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/17.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Happy Kids With Gift</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 67%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$13.00</span>
                                                <span class="old">$16.00</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/16.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/15.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Mini Car Toy for Kids</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 80%"></span>
                                                </span>
                                                <span class="rating-num">(3)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$14.50</span>
                                                <span class="old">$15.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/14.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/13.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Rocking Horse</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 50%"></span>
                                                </span>
                                                <span class="rating-num">(6)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$26.50</span>
                                                <span class="old">$27.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/12.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/11.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Cat Doll</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 60%"></span>
                                                </span>
                                                <span class="rating-num">(5)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$19.50</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/10.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/9.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Dinosaur Toys for Baby</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 75%"></span>
                                                </span>
                                                <span class="rating-num">(9)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$21.50</span>
                                                <span class="old">$22.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                    </div>

                                    <div class="swiper-slide">

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/1.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/10.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Happy Kids With Gift</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 67%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$12.50</span>
                                                <span class="old">$15.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/2.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/9.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Baby Cat Doll</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 80%"></span>
                                                </span>
                                                <span class="rating-num">(3)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$10.50</span>
                                                <span class="old">$12.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/3.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/8.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Mini Car Toy for Kids</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 50%"></span>
                                                </span>
                                                <span class="rating-num">(6)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$22.50</span>
                                                <span class="old">$25.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list mb-4">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/4.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/7.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Dinosaur Toys for Baby</a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 60%"></span>
                                                </span>
                                                <span class="rating-num">(5)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$18.50</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                        <!-- Single Product List Start -->
                                        <div class="single-product-list">

                                            <!-- Product List Thumb Start -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="fit-image first-image" src="{{asset('assets/images/products/small-product/5.jpg')}}" alt="Product Image">
                                                        <img class="fit-image second-image" src="{{asset('assets/images/products/small-product/6.jpg')}}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product List Thumb End -->

                                            <!-- Product List Content Start -->
                                            <div class="product-list-content">
                                                <h6 class="product-name">
                                                    <a href="single-product.html">Robotics for Kids </a>
                                                </h6>
                                                <span class="ratings justify-content-start mb-3">
														<span class="rating-wrap">
															<span class="star" style="width: 75%"></span>
                                                </span>
                                                <span class="rating-num">(9)</span>
                                                </span>
                                                <span class="price">
														<span class="new">$20.50</span>
                                                <span class="old">$22.85</span>
                                                </span>
                                            </div>
                                            <!-- Product List Content End -->

                                        </div>
                                        <!-- Single Product List End -->

                                    </div>
                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>

                        </div>
                        <!-- Product List Carousel End -->

                    </div>
                    <!-- Product List Wrapper End -->

                </div>
                <!-- Product List End -->

            </div>
        </div>
    </div>
    <!-- Product List Banner Section End -->

    <!-- Latest Blog Section Start -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Section Title Start -->
                    <div class="section-title text-center" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">Testimonials</h2>
                        <p class="sub-title">What they say</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Latest Blog Carousel Start -->
                    <div class="latest-blog-carousel arrow-outside-container" data-aos="fade-up" data-aos-delay="600">
                        <div class="swiper-container">

                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <!-- Single Blog Start -->
                                    <div class="single-blog">
                                        <!-- Blog Thumb Start -->
                                        <div class="blog-thumb">
                                            <a href="blog-details.html">
                                                <img class="fit-image" src="{{asset('assets/images/blog/blog-medium/1.jpg')}}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <!-- Blog Thumb End -->
                                        <!-- Blog Content Start -->
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p>03/11/2021 | <span>Admin</span></p>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="blog-details.html">It is a long established fact that a reader will be distracted</a>
                                            </h5>
                                        </div>
                                        <!-- Blog Content End -->
                                    </div>
                                    <!-- Single Blog End -->
                                </div>

                                <div class="swiper-slide">
                                    <!-- Single Blog Start -->
                                    <div class="single-blog">
                                        <!-- Blog Thumb Start -->
                                        <div class="blog-thumb">
                                            <a href="blog-details.html">
                                                <img class="fit-image" src="{{asset('assets/images/blog/blog-medium/2.jpg')}}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <!-- Blog Thumb End -->
                                        <!-- Blog Content Start -->
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p>03/11/2021 | <span>Admin</span></p>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="blog-details.html">There are many variations of passages of lorem ipsum</a>
                                            </h5>
                                        </div>
                                        <!-- Blog Content End -->
                                    </div>
                                    <!-- Single Blog End -->
                                </div>

                                <div class="swiper-slide">
                                    <!-- Single Blog Start -->
                                    <div class="single-blog">
                                        <!-- Blog Thumb Start -->
                                        <div class="blog-thumb">
                                            <a href="blog-details.html">
                                                <img class="fit-image" src="{{asset('assets/images/blog/blog-medium/3.jpg')}}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <!-- Blog Thumb End -->
                                        <!-- Blog Content Start -->
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p>03/11/2021 | <span>Admin</span></p>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="blog-details.html">The standard chunk of lorem ipsum used since</a>
                                            </h5>
                                        </div>
                                        <!-- Blog Content End -->
                                    </div>
                                    <!-- Single Blog End -->
                                </div>

                            </div>

                            <!-- Swiper Pagination Start -->
                            <div class="swiper-pagination d-block d-md-none"></div>
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-blog-button-next swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-blog-button-prev swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->
                        </div>
                    </div>
                    <!-- Latest Blog Carousel End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Blog Section End -->

    <!-- Brand Logo Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="border-top border-bottom">
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                        <!-- Brand Logo Wrapper Start -->
                        <div class="brand-logo-carousel arrow-outside-container">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href="#"><img src="{{asset('assets/images/brand-logo/1.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href="#"><img src="{{asset('assets/images/brand-logo/2.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href=""><img src="{{asset('assets/images/brand-logo/3.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href="#"><img src="{{asset('assets/images/brand-logo/4.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href="#"><img src="{{asset('assets/images/brand-logo/5.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo">
                                        <a href="#"><img src="{{asset('assets/images/brand-logo/6.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->

                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-logo-button-next swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-logo-button-prev swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                        </div>
                        <!-- Brand Logo Wrapper End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Section End -->
    @endsection