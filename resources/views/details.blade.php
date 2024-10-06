@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo2.css') }}">
@endpush

@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $product->name }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index') }}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> <!-- Shop Section start -->

    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="details-image-1 ratio_asos">
                                            <div>
                                                <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $product->image }}"
                                                     class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload"
                                                     alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">
                                    <div class="details-image-concept">
                                        <h2>{{ $product->name }}</h2>
                                    </div>

                                    <h3 class="price-detail">
                                        @if($product->sale_price)
                                            ${{ $product->sale_price }}
                                         <del>${{ $product->regular_price }}</del>
                                            <span>
                                                {{ round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100) }}
                                                % off
                                            </span>
                                        @else
                                            {{ $product->regular_price }}
                                        @endif
                                    </h3>

                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                        <h6 class="product-title size-text">select size
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#sizemodal">size chart</a>
                                        </h6>

                                        <h6 class="error-message">please select size</h6>

                                        <div class="size-box">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">s</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">m</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">l</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">xl</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="product-title product-title-2 d-block">quantity</h6>

                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus"
                                                            onclick="updateQuantity()" data-type="minus" data-field="">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" id="quantity"
                                                       class="form-control input-number" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus"
                                                            onclick="updateQuantity()" data-type="plus" data-field="">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-buttons">
                                        <a href="javascript:void(0)" class="btn btn-solid">
                                            <i class="fa fa-bookmark fz-16 me-2"></i>
                                            <span>Wishlist</span>
                                        </a>
                                        <a href="javascript:void(0)"
                                           onclick="event.preventDefault(); document.getElementById('addtocart').submit()"
                                           id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span>

                                            <form id="addtocart" method="post" action="{{ route('cart.store') }}">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $product->id }}">

                                                <input type="hidden" name="quantity" id="qty" value="1">

                                            </form>

                                        </a>



                                    </div>

                                    <div class="mt-2 mt-md-3 border-product">
                                        <h6 class="product-title hurry-title d-block">
                                            @if($product->stock_status == 'instock')
                                                InStock
                                            @else
                                                Out of stock
                                            @endif
                                        </h6>
                                    </div>

                                    <div class="border-product">
                                        <h6 class="product-title d-block">share it</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="pe-0">
                                                    <a href="https://www.google.com/">
                                                        <i class="fas fa-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#desc" type="button">Description</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <h4>{{ $product->brand->name }}</h4>
                                <div class="shipping-chart">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
@endsection
