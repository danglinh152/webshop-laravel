@extends('client.layout.homepage-layout')
@section('contact')
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">


            <div class="p-5 bg-light rounded">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h1 class="text-primary" style="font-size: 50px; font-family: 'Open Sans', sans-serif; font-weight: 700; margin-bottom: 30px;">Giới thiệu cửa hàng</h1>
                        <p class="lead mb-4" style="text-align: justify;">Chào mừng bạn đến với <b class="text-primary">10PM STORE</b>, nơi cung cấp những sản phẩm điện tử chất lượng cao với giá cả hợp lý. Chúng tôi chuyên cung cấp các thiết bị điện tử chính hãng như điện thoại, laptop, máy tính bảng và nhiều sản phẩm công nghệ khác. Với sứ mệnh mang đến cho khách hàng những sản phẩm tiên tiến, bền bỉ và tiện ích, chúng tôi cam kết luôn mang lại trải nghiệm mua sắm tuyệt vời, dịch vụ khách hàng tận tâm và giao hàng nhanh chóng.
                            Chúng tôi hiểu rằng công nghệ là một phần không thể thiếu trong cuộc sống hiện đại, và chúng tôi luôn nỗ lực không ngừng để cung cấp những sản phẩm tốt nhất với giá cả cạnh tranh nhất. Tại <b class="text-primary">10PM Store</b>, bạn sẽ tìm thấy những thiết bị điện tử phù hợp với mọi nhu cầu từ học tập, làm việc cho đến giải trí.
                            Chúng tôi rất hân hạnh được phục vụ bạn và hy vọng rằng bạn sẽ tìm thấy những sản phẩm ưng ý tại cửa hàng của chúng tôi.</p>
                        <iframe width="100%" height="600" src="https://www.youtube.com/embed/NNerzOwb8ew" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary" style="font-size: 50px; font-family: 'Open Sans', sans-serif; font-weight: 700;">Liên hệ với chúng tôi</h1>
                            <p class="mb-4">Dưới đây là một số thông tin của chúng tôi. Hãy liên hệ khi cần thiết</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="h-100 rounded">

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3545.7950312696466!2d106.80047917451817!3d10.870014157461517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiAtIMSQSFFHIFRQLkhDTQ!5e1!3m2!1svi!2s!4v1731642558669!5m2!1svi!2s"
                                class="rounded w-100" style="height: 400px;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 h-25">
                        <img style="width: 100%; height: 50%; object-fit:cover; border-radius:10px"
                            src="{{ asset('public/frontend/client/img/logo.png') }}" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex p-4 rounded mb-3 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Địa chỉ</h4>
                                <p class="mb-2">Đường Hàn Thuyên, khu phố 6 P, Thủ Đức, Hồ Chí Minh, Việt Nam</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-3 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Địa chỉ email</h4>
                                <a href= "mailto: tenpm@email.com"> tenpm@email.com </a>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Số điện thoại</h4>
                                <p class="mb-2">(+012) 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@stop
