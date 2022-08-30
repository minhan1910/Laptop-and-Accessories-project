@extends('layouts.client')
@section('page-id', 'login')
@section('content')
    <main>
        <section class="detail_main">
            <div class="container">
                @if (!empty('product'))
                    <div class="product_img">
                        <div class="main">
                            <img src="{{ $product->feature_image_path }}" alt="" class="mainprod-img" />
                        </div>
                        <div class="sub-list">
                            @foreach ($product->images as $image)
                                <div class="sub_img">
                                    <img src="{{ $image->image_path }}" alt="{{ $image->image_name }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="product_info">
                        <h2 class="name">{{ $product->name }}</h2>
                        <ul class="benefits">
                            <li>12 months genuine warranty</li>
                            <li>Support renewal in 7 days</li>
                            <li>Windows copyright integrated</li>
                        </ul>
                        <div class="brand">Brand: {{ $product->brand->name ?? 'Origin' }}</div>
                        <p class="sell_price">
                            Sell price: <span class="sell-detail">{{ number_format($product->price) }}đ</span>
                        </p>
                        <div class="desc">
                            Product Description:
                            <span class="desc_detail">
                                {{ $product->content }}
                            </span>
                        </div>
                        <a href="" class="addtocart">Order Now</a>
                    </div>

                @endif
            </div>
        </section>
    </main>
@endsection
