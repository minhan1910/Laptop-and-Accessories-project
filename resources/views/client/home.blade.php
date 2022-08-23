@extends('layouts.client')
@section('page-id', 'homepage')
@section('content')
    <main>
        <section class="slider">
            <div class="container">
                <div class="slider_list">
                    <div class="slider_item">
                        <img src="{{ asset('clients/img/slider/slider_1.png') }}" alt="" />
                    </div>
                    <div class="slider_item">
                        <img src="{{ asset('clients/img/slider/slider_2.png') }}" alt="" />
                    </div>
                    <div class="slider_item">
                        <img src="{{ asset('clients/img/slider/slider_3.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="subslider">
            <div class="subslider_list">
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/keyboard.png') }}" alt="" />
                </div>
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/mouse.png') }}" alt="" />
                </div>
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/phone.png') }}" alt="" />
                </div>
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/pc.png') }}" alt="" />
                </div>
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/mouse.png') }}" alt="" />
                </div>
                <div class="subslider_item">
                    <img src="{{ asset('clients/img/banner/phone.png') }}" alt="" />
                </div>
            </div>
        </section>
        <section class="gaming-top">
            <div class="container">
                <div class="top_product-top">
                    <h2 class="title">Highend Laptop Gaming</h2>
                    <a href="{{ route('client.list', ['id' => $officeId]) }}" class="view_all">View all</a>
                </div>
                @if (!empty('gamingList'))
                    <div class="top_product-list">
                        @foreach ($gamingList as $gamingItem)
                            <div class="top_product-item">
                                <div class="top_product-img">
                                    <img src="{{ $gamingItem->feature_image_path }}"
                                        alt="{{ $gamingItem->feature_image_name }}" />
                                </div>
                                <div class="top_product-desc">
                                    <p class="name">{{ $gamingItem->name }}</p>
                                    <div class="bottom">
                                        <p class="price">{{ $gamingItem->price }}₫</p>
                                        <a href="{{ route('client.detail', ['id' => $gamingItem->id]) }}"
                                            class="view-detail">View details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <section class="office-top">
            <div class="container">
                @if (!empty('officeList'))
                    <div class="top_product-top">
                        <h2 class="title">Highend Laptop Office</h2>
                        <a href="{{ route('client.list', ['id' => $gamingId]) }}" class="view_all">View all</a>
                    </div>
                    <div class="top_product-list">
                        @foreach ($officeList as $officeItem)
                            <div class="top_product-item">
                                <div class="top_product-img">
                                    <img src="{{ $officeItem->feature_image_path }}" alt="" />
                                </div>
                                <div class="top_product-desc">
                                    <p class="name">{{ $officeItem->name }}</p>
                                    <div class="bottom">
                                        <p class="price">{{ $officeItem->price }}</p>
                                        <a href="{{ route('client.detail', ['id' => $officeItem->id]) }}"
                                            class="view-detail">View details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
