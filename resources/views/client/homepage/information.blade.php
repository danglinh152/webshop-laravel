@extends('client.layout.homepage-layout')
@section('infor')
    <div class="container-fluid contact py-5">
        <div class="container py-5 ">
            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tài khoản của tôi</li>
                    </ol>
                </nav>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    <div class="row mt-4">
                        <div class="col-1">
                            <img class="" style="width: 30px; height:30px"
                                src="{{ asset('public/backend/users-images/profile.png') }}" alt="">
                        </div>
                        <div class="col">
                            <h5 class="text-dark ms-2 mt-1" style="font-weight:600">Lê Văn Đạt</h5>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="tab active" onclick="openTab(event, 'tab1')">Hồ sơ của tôi</div>
                        <div class="tab" onclick="openTab(event, 'tab2')">Mật khẩu</div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="content px-4">
                        <div id="tab1" class="info-content active">
                            <div class="">
                                <div class="d-flex justify-content-center">
                                    <div class="">
                                        <img style="width:52px; height:52px"
                                            src="{{ asset('public/frontend/client/img/bronze-medal.png') }}" alt="">
                                    </div>
                                    <div class="" style="display:none">
                                        <img style="width:52px; height:52px"
                                            src="{{ asset('public/frontend/client/img/silver-medal.png') }}" alt="">
                                    </div>
                                    <div class="" style="display:none">
                                        <img style="width:52px; height:52px"
                                            src="{{ asset('public/frontend/client/img/gold-medal.png') }}" alt="">
                                    </div>
                                    <div class="mt-1">
                                        <h6 style="font-weight:600">Hạng đồng</h6>
                                        <h6 style="font-weight:600">12000 điểm</h6>
                                    </div>
                                </div>

                                <form action="" class="px-2">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Họ:</label>
                                            <input class="form-control mt-1" type="text" name="" required />
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Tên:</label>
                                            <input class="form-control mt-1" type="text" name="" required />
                                        </div>
                                        <div class="form-group mt-3 col-6">
                                            <label>Email:</label>
                                            <input class="form-control mt-1" type="text" name="" required />
                                        </div>
                                        <div class="form-group mt-3 col-6">
                                            <label>Số điện thoại:</label>
                                            <input class="form-control mt-1" type="text" name="" required />
                                        </div>
                                        <div class="form-group mt-3 ">
                                            <label>Địa chỉ:</label>
                                            <textarea class="form-control mt-1" name=""></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button style="width:30%" type="submit"
                                            class="mt-3 btn border rounded-pill px-4 py-2 text-primary mt-2">
                                            Cập nhật
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="tab2" class="info-content">
                            <h5 class="text-center pt-4">Thay đổi mật khẩu</h5>
                            <form action="" class="px-2">
                                <div class="d-flex flex-wrap g-2 justify-content-center">
                                    <div class="form-group col-7 mt-3">
                                        <label>Mật khẩu hiện tại:</label>
                                        <input class="form-control mt-1" type="text" name="" required />
                                    </div>
                                    <div class="form-group col-7 mt-3">
                                        <label>Mật khẩu mới:</label>
                                        <input class="form-control mt-1" type="text" name="" required />
                                    </div>
                                    <div class="form-group mt-3 col-7">
                                        <label>Xác nhận mật khẩu:</label>
                                        <input class="form-control mt-1" type="text" name="" required />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button style="width:30%" type="submit"
                                        class="mt-3 btn border rounded-pill px-4 py-2 text-primary mt-2">
                                        Cập nhật
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openTab(event, tabId) {
            let tabs = document.querySelectorAll('.tab');
            let contents = document.querySelectorAll('.info-content');
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.classList.remove('active'));

            event.currentTarget.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }
    </script>

@stop
