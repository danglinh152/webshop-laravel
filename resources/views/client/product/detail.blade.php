 @extends('client.layout.homepage-layout')
 @section('productDetail')
 <!-- Single Product Start -->
 <div class="container-fluid py-5 mt-2">
     <div class="container py-5">
         <div class="row g-4 mb-5">
             <div class="col-lg-8 col-xl-9">
                 <div class="row g-4">
                     <div>
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Product
                                     detail
                                 </li>
                             </ol>
                         </nav>
                     </div>
                     <div class="col-lg-6">
                         <div class="border rounded">
                             <a href="#">
                                 <img src="{{asset('public/backend/products-images/lenovo-loq.jpg')}}"
                                     class="img-fluid rounded" alt="Image">
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <h4 class="fw-bold mb-3">Laptop Lenovo LOQ</h4>
                         <p class="mb-3">Lenovo - Graphic</p>
                         <h5 class="fw-bold mb-3">
                             19,000,000 đ
                         </h5>
                         <div class="d-flex mb-4">
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star"></i>
                         </div>
                         <p class="mb-4">Short detail: Intel Core
                             i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                         <div class="input-group quantity mb-5" style="width: 100px;">
                             <div class="input-group-btn">
                                 <button
                                     class="btn btn-sm btn-minus rounded-circle bg-light border">
                                     <i class="fa fa-minus"></i>
                                 </button>
                             </div>
                             <input type="text"
                                 class="form-control form-control-sm text-center border-0"
                                 value="1">
                             <div class="input-group-btn">
                                 <button
                                     class="btn btn-sm btn-plus rounded-circle bg-light border">
                                     <i class="fa fa-plus"></i>
                                 </button>
                             </div>
                         </div>
                         <form action="#"
                             method="post">
                             <input type="hidden" name="quantity" id="quantity" value="1">
                             <button type="submit"
                                 class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                     class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                 cart</button>
                         </form>

                     </div>
                     <div class="col-lg-12">
                         <nav>
                             <div class="nav nav-tabs mb-3">
                                 <button class="nav-link active border-white border-bottom-0"
                                     type="button" role="tab" id="nav-about-tab"
                                     data-bs-toggle="tab" data-bs-target="#nav-about"
                                     aria-controls="nav-about"
                                     aria-selected="true">Description</button>
                             </div>
                         </nav>
                         <div class="tab-content mb-5">
                             <div class="tab-pane active" id="nav-about" role="tabpanel"
                                 aria-labelledby="nav-about-tab">
                                 <p>Trong thế giới laptop gaming đầy
                                     cạnh tranh hiện nay, việc tìm kiếm một chiếc máy vừa đáp ứng nhu cầu hiệu suất cao vừa
                                     thể hiện phong cách cá nhân có thể là một thách thức. Tuy nhiên, Lenovo LOQ 15IAX9
                                     83FQ0005VN dường như đã giải quyết
                                     được vấn đề này với cấu hình mạnh mẽ và thiết kế đột phá, đem đến một lựa chọn hấp dẫn
                                     cho game thủ và những người yêu
                                     thích công nghệ.</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-xl-3">
                 <div class="row g-4 fruite">
                     <div class="col-lg-12">
                         <div class="mb-4">
                             <h4>Categories</h4>
                             <ul class="list-unstyled fruite-categorie">
                                 <li>
                                     <div class="d-flex justify-content-between fruite-name">
                                         <a href="#"><i
                                                 class="fas fa-apple-alt me-2"></i>Lenovo</a>
                                         <span>(3)</span>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex justify-content-between fruite-name">
                                         <a href="#"><i
                                                 class="fas fa-apple-alt me-2"></i>Acer</a>
                                         <span>(5)</span>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex justify-content-between fruite-name">
                                         <a href="#"><i
                                                 class="fas fa-apple-alt me-2"></i>Asus</a>
                                         <span>(2)</span>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex justify-content-between fruite-name">
                                         <a href="#"><i class="fas fa-apple-alt me-2"></i>MSI</a>
                                         <span>(8)</span>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex justify-content-between fruite-name">
                                         <a href="#"><i
                                                 class="fas fa-apple-alt me-2"></i>Dell</a>
                                         <span>(5)</span>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 @stop