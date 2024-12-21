@extends('client.layout.homepage-layout')
@section('order-history')
<div class="container-fluid contact py-5 history-page">
    <div class="container py-5 ">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-4">
            @if ($groupedOrders->isEmpty())
            <p class="text-center">Không có lịch sử mua hàng nào.</p>
            @else
            @foreach ($groupedOrders as $order_id => $orderDetails)
            <div class="mb-5 history-item p-4" id="order-{{ $order_id }}">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Mã đơn hàng: {{ $order_id }}</h6>
                    <div class="d-flex align-items-center status">
                        @php
                        $status = $orderDetails->first()->status;
                        @endphp
                        @if ($status == 'Cancelled')
                        <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/cancelled.png') }}" style="width: 30px" alt="">
                        <h6 class="text-danger">ĐÃ HỦY ĐƠN HÀNG</h6>
                        @elseif ($status == 'Pending')
                        <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/pendding.png') }}" style="width: 30px" alt="">
                        <h6 class="text-warning">ĐANG XỬ LÝ</h6>
                        @elseif ($status == 'Shipping')
                        <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/shipped.png') }}" style="width: 30px" alt="">
                        <h6 class="text-success">ĐANG GIAO HÀNG</h6>
                        @elseif ($status == 'Completed')
                        <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/shipped.png') }}" style="width: 30px" alt="">
                        <h6 class="text-success">GIAO HÀNG THÀNH CÔNG</h6>
                        @endif
                    </div>
                </div>
                @foreach ($orderDetails as $detail)
                <div class="d-flex card-history py-2">
                    <div class="col-1">
                        <img src="{{ asset('public/backend/products-images/'. $detail->product_image) }}" class="img-fluid me-5" alt="">
                    </div>
                    <div class="col-11">
                        <p class="mb-0 mt-1" style="font-weight:600">
                            <a href="{{ URL::to('/product/'.$detail->product_id) }}" target="_blank">
                                {{ $detail->product_name }}
                            </a>
                        </p>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">x{{ $detail->quantity }}</p>
                            <p class="mb-0 mt-0">{{ number_format($detail->product_price, 0, ',', '.') }}đ</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-between text-dark">
                    <p>{{ $orderDetails->first()->receiverPhone }} | {{ $orderDetails->first()->receiverAddress }}</p>
                    <p>Thành tiền: {{ number_format($orderDetails->first()->payment_cost, 0, ',', '.') }}đ</p>
                </div>
                @if ($status == 'Pending' || $status == 'Shipping')
                <div class="d-flex justify-content-end">
                    <button style="width:13%"
                        class="btn btn-cancel border rounded-pill py-2 text-danger"
                        data-order-id="{{ $order_id }}">
                        Hủy đơn hàng
                    </button>
                </div>
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cancelButtons = document.querySelectorAll('.btn-cancel');

        cancelButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const orderId = this.dataset.orderId;
                if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')) {
                    fetch(`{{ url('/order/cancel') }}/${orderId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                const orderElement = document.querySelector(`#order-${orderId}`);
                                const statusElement = orderElement.querySelector('.status');

                                statusElement.innerHTML = `
                                    <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/cancelled.png') }}" style="width: 30px" alt="">
                                    <h6 class="text-danger">ĐÃ HỦY ĐƠN HÀNG</h6>
                                `;

                                const cancelButton = orderElement.querySelector('.btn-cancel');
                                if (cancelButton) {
                                    cancelButton.remove();
                                }
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                            alert('Có lỗi xảy ra, vui lòng thử lại.');
                        });
                }
            });
        });
    });
</script>
@stop