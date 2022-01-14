@extends('base')
@section('main')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active"> Shopping Cart Page</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="{{asset('assets/images/products/cart-product/1.jpg')}}" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Yellow Toy For Baby</a></td>
                                    <td class="pro-price"><span>$95.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$95.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="{{asset('assets/images/products/cart-product/2.jpg')}}" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Basic Toy Teddy</a></td>
                                    <td class="pro-price"><span>$75.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$75.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="{{asset('assets/images/products/cart-product/3.jpg')}}" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Basic Toy Teddy</a></td>
                                    <td class="pro-price"><span>$28.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$56.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="{{asset('assets/images/products/cart-product/4.jpg')}}" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Dinasor Toy For Kids</a></td>
                                    <td class="pro-price"><span>$20.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$40.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="pe-7s-close"></i></a></td>
                                </tr>
                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->

                    <!-- Cart Button Start -->
                    <div class="cart-button-section">
                        <a href="#" class="btn btn-primary btn-hover-dark">Update Cart</a>
                        <a href="#" class="btn btn-primary btn-hover-dark">Continue Shopping</a>
                        <a href="#" class="btn btn-primary btn-hover-dark">Clear Cart</a>
                    </div>
                    <!-- Cart Button End -->

                </div>
            </div>

            <div class="row mt-10 mb-n10">
                <div class="col-lg-6 mb-10">
                    <div class="delivery-date-wrapper mb-6">
                        <h3 class="title">Delivery Date</h3>
                        <form action="#" class="date-input-label">
                            <label class="date-label" for="date-link">Pick a delivery date:</label>
                            <span class="date-in">
                                    <input class="date-input" type="text" name="date" id="date-link">
                                </span>
                        </form>
                        <span>We do not deliver during the week-end.</span>
                    </div>

                    <div class="input-textarea">
                        <h3 class="title border-0 mb-0">Special instructions for seller</h3>
                        <textarea name="text" id="minitextarea" class="input-cupon-textarea" cols="30" rows="6"></textarea>
                    </div>
                </div>
                <div class="col-lg-6 mb-10">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$230</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$70</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">$300</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="checkout.html" class="btn btn-primary btn-hover-dark mt-6">Proceed To Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection