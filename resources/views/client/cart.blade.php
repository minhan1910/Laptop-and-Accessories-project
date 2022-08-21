@extends('layouts.client')
@section('page-id', 'cart')
@section('content')
    <main>
        <section class="main_cart">
            <div class="container">
                <h2 class="title">Cart</h2>
                <div class="cart-table">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Actions</th>
                        </tr>
                        <tr class="product_row">
                            <td>
                                <div class="cart-info">
                                    <img src="{{ asset('clients/img/product/test/product.jpg') }}" alt="">
                                    <p class="name">Laptop gaming 1</p>
                                </div>
                            </td>
                            <td>125.000đ</td>
                            <td><input type="number" value="1" min="1" max="10"></td>
                            <td>125.000đ</td>
                            <td><a href="" class="deletebtn">Delete</a></td>
                        </tr>
                        <tr class="product_row">
                            <td>
                                <div class="cart-info">
                                    <img src="{{ asset('clients/img/product/test/product.jpg') }}" alt="">
                                    <p class="name">Laptop gaming 1</p>
                                </div>
                            </td>
                            <td>125.000đ</td>
                            <td><input type="number" value="1" min="1" max="10"></td>
                            <td>125.000đ</td>
                            <td><a href="" class="deletebtn">Delete</a></td>
                        </tr>
                        <tr class="product_row">
                            <td>
                                <div class="cart-info">
                                    <img src="{{ asset('clients/img/product/test/product.jpg') }}" alt="">
                                    <p class="name">Laptop gaming 1</p>
                                </div>
                            </td>
                            <td>125.000đ</td>
                            <td><input type="number" value="1" min="1" max="10"></td>
                            <td>125.000đ</td>
                            <td><a href="" class="deletebtn">Delete</a></td>
                        </tr>
                    </table>
                </div>
                <div class="total_sum">
                    <div class="product_sum">Products quantity summary: 3 <span class="prod-total">5</span> products
                    </div>
                    <div class="price_sum">Total price: <span class="price-total">500.000</span>đ
                    </div>
                    <a href="" class="checkoutbtn">Checkout</a>
                </div>
            </div>

        </section>
    </main>
@endsection
