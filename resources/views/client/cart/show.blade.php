@extends('client.layout.homepage-layout')
@section('cartShow')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Giỏ Hàng</li>
                </ol>
            </nav>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá cả</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($cart as $key => $cart_value)
                    <tr>
                        <th scope="row" class="d-flex align-items-center gap-3">
                            <div class="checkCart">
                                <input class="form-check-input" type="checkbox" name="selected_products[]"
                                    value="{{ $cart_value->product_id }}" id="check-cart-detail{{ $i }}">
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('public/backend/products-images/' . $cart_value->product_image) }}"
                                    class="me-5" style="width: 80px; height: 80px; object-fit: contain;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">
                                <a href="{{ URL::to('/product/' . $cart_value->product_id) }}" target="_blank">
                                    {{ $cart_value->product_name }}
                                </a>
                            </p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4" id="price{{ $i }}">
                                {{ number_format($cart_value->product_price, 0, ',', ',') }}đ
                            </p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border mt-0"
                                        data-cart-id="{{ $cart_value->cart_id }}"
                                        data-product-id="{{ $cart_value->product_id }}">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="{{ $cart_value->quantity }}" disabled style="background: transparent">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border mt-0"
                                        data-cart-id="{{ $cart_value->cart_id }}"
                                        data-product-id="{{ $cart_value->product_id }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4" id="total{{ $i }}"
                                data_cart_detail_total="{{ $cart_value->product_price * $cart_value->quantity }}">
                                {{ number_format($cart_value->product_price * $cart_value->quantity, 0, ',', ',') }}đ
                            </p>
                        </td>
                        <td>
                            <form method="post" action="{{ URL::to('/product/delete-product-from-cart/' . $cart_value->product_id) }}">
                                @csrf
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5 row g-4 justify-content-start">
            <div class="col-md-7">
                <h4 class="mb-2">Mã giảm giá</h4>

                <div class="overflow-auto w-75" style="height: 20rem;">
                    @foreach ($voucher as $vc)
                    <div class="mt-2">
                        <div class="voucher border rounded d-flex justify-content-between align-items-center px-1 py-1 mb-2"
                            style="width: 30rem">
                            <div class="w-100 d-flex">
                                <img src="{{ asset('public/frontend/client/img/voucher.png') }}" alt=""
                                    style="height: 6rem; border-radius:5px">
                                <div class="px-3 pt-2">
                                    <h6>{{$vc->voucher_name}}</h6>
                                    <p class="discount" style="display:none">{{$vc->discount_value}}</p>
                                    <p style="font-size: 15px; margin-bottom: 1px; margin-top: 1px">{{$vc->voucher_desc}}</p>
                                    <p style="margin-top: 1px" style="font-size: 15px">Hạn sử dụng: {{$vc-> end_date}}</p>
                                </div>
                            </div>
                            <input class="form-check-input mx-2" type="radio" name="voucher" value=""
                                id="" required>
                        </div>

                    </div>
                    @endforeach
                </div>

                <button id="cancel" class="btn border-secondary rounded-pill px-4 py-3 text-primary"
                    style="display: none">Bỏ
                    chọn voucher</button>
            </div>
            <div class="col-12 col-md-5">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h4 class="mb-4">Thông tin đơn hàng</h4>
                        <div class="d-flex justify-content-between mb-4 text-dark">
                            <p class="mb-0 me-4">Tạm tính:</p>
                            <p class="mb-0" id="subtotal" data-cart-total-price="0">0 đ</p> <!-- Added ID here -->
                        </div>
                        <div class="d-flex justify-content-between mb-4 text-dark">
                            <p class="mb-0 me-4">Voucher:</p>
                            <p class="mb-0" id="discountPrice" data-cart-total-price="0">0 đ</p> <!-- Added ID here -->
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 me-4 text-dark">Phí vận chuyển:</p>
                            <div class="">
                                <p class="mb-0 text-dark">20.000 đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <p class="mb-0 ps-4 me-4 text-dark">Tổng số tiền:</p>
                        <p class="mb-0 pe-4 text-dark" id="totalAmount" data-cart-total-price="0">0 đ</p>
                        <!-- Added ID here -->
                    </div>
                    <form action="{{ URL::to('/client/checkout') }}" method="post" id="checkoutForm">
                        @csrf
                        <button type="button"
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4 ms-4"
                            id="confirmOrderButton">Xác nhận đơn hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const btnMinus = document.querySelectorAll(".btn-minus"); // Quantity input fields (minus)
        const btnPlus = document.querySelectorAll(".btn-plus"); // Quantity input fields (plus)
        const subtotalElement = document.getElementById('subtotal');
        const discountPriceElement = document.getElementById('discountPrice');
        const totalAmountElement = document.getElementById('totalAmount');
        const discounts = document.querySelectorAll('input[name="voucher"]');
        const cancelBtn = document.getElementById('cancel');


        // Function to update totals
        function updateTotals() {
            let subtotal = 0;
            let discountVal = 1;
            let discountPrice = 0;
            let totalPrice = 0;
            checkboxes.forEach(checkbox => {
                const row = checkbox.closest('tr');
                const quantity = parseInt(row.querySelector('input[type="text"]').value,
                    10); // Get the quantity
                const price = parseFloat(row.querySelector('p[id^="price"]').innerText.replace('đ',
                    '').replace(/,/g, '')); // Get price without formatting
                const total = price * quantity; // Calculate total for this item
                row.querySelector('p[id^="total"]').innerText = new Intl.NumberFormat('vi-VN')
                    .format(total) + 'đ'; // Update total in the row
                if (checkbox.checked) {
                    subtotal += total; // Add the row's total to the subtotal
                }
            });
            discounts.forEach(function(discount) {
                if (discount.checked) {
                    cancelBtn.style.display = "block"
                    discountVal = discount.closest('.voucher').querySelector('.discount').innerText;
                    subtotal = subtotal;
                    discountPrice = subtotal * discountVal;
                    totalPrice = subtotal - discountPrice + 20000;

                }
            })


            // Update subtotal and total amount
            subtotalElement.innerText = new Intl.NumberFormat('vi-VN').format(subtotal) +
                ' đ';
            discountPriceElement.innerText = '-' + Intl.NumberFormat('vi-VN').format(discountPrice) + ' đ';
            if (totalPrice) {
                totalAmountElement.innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) +
                    ' đ';
                localStorage.setItem('totalPrice', totalPrice);
            } else {
                totalAmountElement.innerText = new Intl.NumberFormat('vi-VN').format(subtotal + 20000) +
                    ' đ';
                localStorage.setItem('totalPrice', subtotal + 20000);
            }
            // Assuming no shipping costs
            localStorage.setItem('subtotal', subtotal);
            localStorage.setItem('discountVal', discountVal);
            localStorage.setItem('discountPrice', discountPrice);
        }

        // Update totals when checkbox is toggled
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateTotals);
        });
        discounts.forEach(function(discount) {
            discount.addEventListener('change', updateTotals);
        });
        cancelBtn.onclick = function() {
            discounts.forEach(function(discount) {
                discount.checked = false;
            });
            updateTotals();
            cancelBtn.style.display = "none"
        }

        // Update quantity when minus button is clicked
        btnMinus.forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = button.closest('div.input-group')
                    .querySelector(
                        'input[type="text"]');
                let quantity = parseInt(quantityInput.value, 10);
                if (quantity > 1) {
                    // quantity--;
                    quantityInput.value = quantity; // Update the displayed quantity
                }
                updateTotals(); // Recalculate totals when quantity changes
            });
        });

        // Update quantity when plus button is clicked
        btnPlus.forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = button.closest('div.input-group')
                    .querySelector(
                        'input[type="text"]');
                let quantity = parseInt(quantityInput.value, 10);
                // quantity++;
                quantityInput.value = quantity; // Update the displayed quantity
                updateTotals(); // Recalculate totals when quantity changes
            });
        });

        // Initial calculation
        updateTotals();
    });


    document.getElementById('confirmOrderButton').addEventListener('click', function() {
        const selectedProducts = [];
        const quantities = [];
        const form = document.getElementById('checkoutForm');

        // Gather selected products and their details
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

        checkboxes.forEach((checkbox) => {
            selectedProducts.push(checkbox.value); // Push the selected product ID

            // Find the row related to the checkbox to get additional details
            const row = checkbox.closest('tr');
            const quantity = row.querySelector('input[type="text"]').value; // Get quantity

            quantities.push(quantity); // Push the quantity

            // Create hidden inputs for selected product IDs and quantities
            const productIdInput = document.createElement('input');
            productIdInput.type = 'hidden';
            productIdInput.name = 'selected_products[]'; // Array for product IDs
            productIdInput.value = checkbox.value;
            form.appendChild(productIdInput);

            const quantityInput = document.createElement('input');
            quantityInput.type = 'hidden';
            quantityInput.name = 'quantities[]'; // Array for quantities
            quantityInput.value = quantity;
            form.appendChild(quantityInput);
        });

        // Submit the form with selected products and quantities
        form.submit();
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Get all plus buttons
        var plusButtons = document.querySelectorAll('.btn-plus');
        plusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var cartId = button.getAttribute('data-cart-id');
                var productId = button.getAttribute('data-product-id');
                console.log("plus");

                var xhr = new XMLHttpRequest();
                xhr.open('POST', "{{ URL::to('/cart/increment-quantity') }}", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // // Handle success response
                            // var response = JSON.parse(xhr.responseText);
                            // var newQuantity = response.new_quantity;
                            // var price = response.price; // Assuming you send back the price
                            // var totalElement = document.getElementById('total' + response.index);
                            // totalElement.textContent = new Intl.NumberFormat().format(price * newQuantity) + 'đ';
                            // var quantityInput = document.querySelector('input[value="' + productId + '"]');
                            // quantityInput.value = newQuantity;
                        } else {
                            console.error('Error updating quantity:', xhr.statusText);
                        }
                    }
                };

                xhr.send('cart_id=' + encodeURIComponent(cartId) + '&product_id=' + encodeURIComponent(productId));
            });
        });

        // Get all minus buttons
        var minusButtons = document.querySelectorAll('.btn-minus');
        minusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var cartId = button.getAttribute('data-cart-id');
                var productId = button.getAttribute('data-product-id');

                var xhr = new XMLHttpRequest();
                xhr.open('POST', "{{ URL::to('/cart/decrement-quantity') }}", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Handle success response
                            // var response = JSON.parse(xhr.responseText);
                            // var newQuantity = response.new_quantity;
                            // var price = response.price; // Assuming you send back the price
                            // var totalElement = document.getElementById('total' + response.index);
                            // totalElement.textContent = new Intl.NumberFormat().format(price * newQuantity) + 'đ';
                            // var quantityInput = document.querySelector('input[value="' + productId + '"]');
                            // quantityInput.value = newQuantity;
                        } else {
                            console.error('Error updating quantity:', xhr.statusText);
                        }
                    }
                };

                xhr.send('cart_id=' + encodeURIComponent(cartId) + '&product_id=' + encodeURIComponent(productId));
            });
        });
    });
</script>
@stop