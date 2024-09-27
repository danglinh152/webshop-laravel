 @extends('client.layout.homepage-layout')
 @section('productDetail')
 <!-- Single Product Start -->
 <div class="container-fluid py-5 mt-2">
     <div class="container py-5">
         <div class="row g-4 mb-5">
             <div class="col-lg-11 col-xl-11">
                 <div class="row g-4">
                     <div>
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Product
                                     detail
                                 </li>
                             </ol>
                         </nav>
                     </div>
                     @foreach ($get_product as $key => $get_product)
                     <?php
                        if (!$get_product) {
                            echo '<div class="col-lg-6">
                            Nothing        
                            </div>
                            ';
                        }
                        ?>
                     <div class="col-lg-6">
                         <div class="border rounded">
                             <a href="#">
                                 <img src="{{asset('public/backend/products-images/' . $get_product->product_image)}}"
                                     class="img-fluid rounded" alt="Image" style="height: 450px;">
                             </a>
                         </div>
                     </div>

                     <div class="col-lg-6">
                         <h4 class="fw-bold mb-3">{{$get_product->product_name}}</h4>
                         <p class="mb-3">{{$get_product->product_fact}}</p>
                         <h5 class="fw-bold mb-3">
                             {{number_format($get_product->product_price, 0, ',', '.')}} đ
                         </h5>
                         <div class="d-flex mb-4">
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star text-warning"></i>
                             <i class="fa fa-star"></i>
                         </div>
                         <p class="mb-4">Short detail: {{$get_product->product_short_desc}}</p>
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
                                 <p>{{$get_product->product_long_desc}}</p>
                             </div>
                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>

         </div>

     </div>
 </div>
 @stop