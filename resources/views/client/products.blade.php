@extends('layouts.client')
@section('page-id', 'products')
@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
    <main>
        <section class="subCategory-top pt-section">
            <div class="container">
                <div class="top_product-top">
                    <div class="">
                        <h2 class="title">Products of {{ $productListName }}</h2>
                    </div>
                </div>
                <div class="filter">
                    <span class="filter_title">Filter by
                        <select id="filter-list">
                            <option value="hide">-- Type --</option>
                            <option value="hot">Hot products</option>
                            <option value="increase">Prices go up</option>
                            <option value="decrease">Prices go down</option>
                            <option value="increase-char">Names from A-Z</option>
                            <option value="decrease-char">Names from Z-A</option>
                            <option value="oldest">Oldest</option>
                            <option value="newest">Newest</option>
                            <option value="selling">Selling products</option>
                        </select>
                </div>
            </div>
        </section>
        <section class="detail_category-products">
            <div class="container">
                @if (!empty('productList'))
                    <div class="top_product-list">
                        @foreach ($productList as $item)
                            <div class="top_product-item">
                                <div class="top_product-img">
                                    <img src="{{ $item->feature_image_path }}" alt="{{ $item->feature_image_name }}" />
                                </div>
                                <div class="top_product-desc">
                                    <p class="name">{{ $item->name }}</p>
                                    <div class="bottom">
                                        <p class="price">{{ $item->price }}₫</p>
                                        <a href="{{ route('client.detail', ['id' => $item->id]) }}" class="view-detail">View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="row justify-content-center mt-4">
                    {{ $productList->links() }}
                </div>
            </div>

        </section>
    </main>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>

@endsection
