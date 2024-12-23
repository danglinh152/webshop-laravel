@extends('client.layout.homepage-layout')
@section('productShow')
<!-- Product Show -->
<div class="container-fluid fruite" style="padding-top: 112px;">
    <div class="container">
        <div class="tab-class">
            <div class="row justify-content-between">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                        </ol>
                    </nav>
                </div>
                <form action="{{ URL::to('/product-filter') }}" class="input-group w-25 mx-auto d-flex">
                    <input type="search" name="product-name" class="form-control py-1 px-3" placeholder="Nhập tên sản phẩm"
                        aria-describedby="search-icon-1">
                    <button type="submit" id="search-icon-1" class="input-group-text py-1"><i class="fa fa-search"></i></button type="submit">
                </form>
            </div>

            <div class="tab-content mt-3">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-12 col-md-3">
                            <form action="{{ URL::to('/product-filter') }}" method="GET">
                                <div class="row g-4">
                                    <div class="col-12" id="factoryFilter">
                                        <div class="mb-2"><b>Hãng sản xuất</b></div>
                                        @foreach (['Dell', 'Acer', 'Macbook', 'Asus', 'Lenovo', 'Msi', 'HP', 'Gigabyte', 'LG', 'Iphone', 'Oppo', 'Xiaomi', 'Samsung'] as $factory)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                id="factory-{{ strtolower($factory) }}" value="{{ $factory }}"
                                                name="factory[]"
                                                {{ in_array($factory, $factories) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="factory-{{ strtolower($factory) }}">{{ $factory }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="col-12" id="targetFilter">
                                        <div class="mb-2"><b>Mục đích sử dụng</b></div>
                                        @foreach (['Gaming', 'Văn phòng', 'Đồ họa'] as $target)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                id="target-{{ strtolower($target) }}" value="{{ $target }}"
                                                name="target[]" {{ in_array($target, $targets) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="target-{{ strtolower($target) }}">{{ $target }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="col-12" id="priceFilter">
                                        <div class="mb-2"><b>Mức giá</b></div>
                                        @foreach (['1015' => 'Từ 10 - 15 triệu', '1520' => 'Từ 15 - 20 triệu', '20' => 'Trên 20 triệu'] as $price => $label)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                id="price-{{ $loop->index + 3 }}" value="{{ $price }}"
                                                name="price[]" {{ in_array($price, $prices) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="price-{{ $loop->index + 3 }}">{{ $label }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-2"><b>Sắp xếp</b></div>
                                        @foreach ([
                                        'gia-tang-dan' => 'Giá tăng dần',
                                        'gia-giam-dan' => 'Giá giảm dần',
                                        'gia-nothing' => 'Không sắp xếp',
                                        ] as $value => $label)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                id="sort-{{ $loop->index + 1 }}" value="{{ $value }}"
                                                name="radio-sort" {{ $sort === $value ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="sort-{{ $loop->index + 1 }}">{{ $label }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <a id="reset-filter"
                                    class="mx-auto btn border rounded-pill px-4 py-2 text-primary mt-2">
                                    Xóa bộ lọc
                                </a>
                                <button type="submit"
                                    class="mx-auto btn border rounded-pill px-4 py-2 text-primary mt-2">
                                    Lọc Sản Phẩm
                                </button>
                            </form>
                            <img class="col-9 mt-2" src="{{ asset('public/frontend/client/img/xmas3.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="row g-2 d-flex text-center mb-4">
                                <?php
                                if ($all_product->isEmpty()) {
                                    echo '<div>Không tìm thấy sản phẩm</div>';
                                }
                                ?>
                                @foreach ($all_product as $key => $pro)
                                <div class="" style="width: 19.5rem">
                                    <div class="card mb-3 product-cart">
                                        <img src="{{ asset('public/backend/products-images/' . $pro->product_image) }}"
                                            class="card-img-top card-image">
                                        <div class="card-body text-center ">
                                            <a href="{{ URL::to('/product/' . $pro->product_id) }}"
                                                class="item-name text-wrap">{{ $pro->product_name }}</a>
                                            <p class="item-desc">{{ $pro->product_short_desc }}</p>
                                            <p class="item-price">
                                                {{ number_format($pro->product_price, 0, '.', '.') }}
                                                đ
                                            </p>
                                            <button type="button"
                                                class="mx-auto btn border rounded-pill px-3 text-primary"
                                                onclick="addToCart('{{ $pro->product_id }}', event)">
                                                <i class="fa fa-shopping-bag me-2"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example mb-4">
                                {{ $all_product->links('vendor.pagination.custom-pagination') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const addToCart = function(product_id, event) {
        event.preventDefault(); // Prevent the default form submission

        var xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ URL::to('/product/add-to-card/') }}/" + product_id, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle success response
                    const cart = document.getElementById('cart');
                    cart.innerHTML = `<i class="fa-solid fa-exclamation"></i>`;
                    showSuccessMessage('Added to cart successfully!');
                } else {
                    console.error('Error updating quantity:', xhr.statusText);
                }
            }
        };

        xhr.send(); // Sending the request without additional data
    };



    function showSuccessMessage(message) {
        // Create a div for the success message
        var messageDiv = document.createElement('div');
        messageDiv.textContent = message;
        messageDiv.style.position = 'fixed';
        messageDiv.style.top = '100px';
        messageDiv.style.right = '20px';
        messageDiv.style.backgroundColor = '#28a745'; // Green background
        messageDiv.style.color = '#fff'; // White text
        messageDiv.style.padding = '10px 20px';
        messageDiv.style.borderRadius = '5px';
        messageDiv.style.zIndex = '1000';
        messageDiv.style.transition = 'opacity 0.5s ease-in-out';
        messageDiv.style.opacity = '1';

        // Append to body
        document.body.appendChild(messageDiv);

        // Fade out after 3 seconds
        setTimeout(function() {
            messageDiv.style.opacity = '0';
            setTimeout(function() {
                document.body.removeChild(messageDiv);
            }, 500); // Remove after fade out
        }, 3000);
    }


    const resetFilterBtn = document.getElementById("reset-filter");
    resetFilterBtn.onclick = function() {
        const checkboxItem = document.querySelectorAll(`input[type="checkbox"]`);
        checkboxItem.forEach(checkbox => {
            checkbox.checked = false;
        });
        const radioItem = document.querySelectorAll(`#priceFilter input[type="radio"]`);
        radioItem.forEach(radio => {
            radio.checked = false;
        });
    }
</script>
@stop