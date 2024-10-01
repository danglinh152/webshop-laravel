 @extends('client.layout.homepage-layout')
 @section('productShow')
 <!-- Laptop Shop -->
 <div class="container-fluid fruite" style="padding-top: 100px;">
     <div class="container">
         <div class="tab-class">
             <div>
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Sản phẩm
                         </li>
                     </ol>
                 </nav>
             </div>
             <div class="tab-content">
                 <div id="tab-1" class="tab-pane fade show p-0 active">
                     <div class="row g-4">
                         <div class="col-12 col-md-4">
                             <form action="{{ URL::to('/product-filter') }}" method="GET">
                                 <div class="row g-4">
                                     <div class="col-12" id="factoryFilter">
                                         <div class="mb-2"><b>Hãng sản xuất</b></div>
                                         @foreach(['Dell', 'Acer', 'Macbook', 'Asus', 'Lenovo', 'Msi', 'HP', 'Gigabyte', 'LG', 'Iphone', 'Oppo', 'Xiaomi', 'Samsung'] as $factory)
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="checkbox" id="factory-{{ strtolower($factory) }}" value="{{ $factory }}" name="factory[]"
                                                 {{ in_array($factory, $factories) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="factory-{{ strtolower($factory) }}">{{ $factory }}</label>
                                         </div>
                                         @endforeach
                                     </div>

                                     <div class="col-12" id="targetFilter">
                                         <div class="mb-2"><b>Mục đích sử dụng</b></div>
                                         @foreach(['Gaming', 'Văn phòng', 'Đồ họa'] as $target)
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="checkbox" id="target-{{ strtolower($target) }}" value="{{ $target }}" name="target[]"
                                                 {{ in_array($target, $targets) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="target-{{ strtolower($target) }}">{{ $target }}</label>
                                         </div>
                                         @endforeach
                                     </div>

                                     <div class="col-12" id="priceFilter">
                                         <div class="mb-2"><b>Mức giá</b></div>
                                         @foreach(['1015' => 'Từ 10 - 15 triệu', '1520' => 'Từ 15 - 20 triệu', '20' => 'Trên 20 triệu'] as $price => $label)
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="price-{{ $loop->index + 3 }}" value="{{ $price }}" name="price[]"
                                                 {{ in_array($price, $prices) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="price-{{ $loop->index + 3 }}">{{ $label }}</label>
                                         </div>
                                         @endforeach
                                     </div>

                                     <div class="col-12">
                                         <div class="mb-2"><b>Sắp xếp</b></div>
                                         @foreach([
                                         'gia-tang-dan' => 'Giá tăng dần',
                                         'gia-giam-dan' => 'Giá giảm dần',
                                         'gia-nothing' => 'Không sắp xếp'
                                         ] as $value => $label)
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="sort-{{ $loop->index + 1 }}" value="{{ $value }}" name="radio-sort"
                                                 {{ $sort === $value ? 'checked' : '' }}>
                                             <label class="form-check-label" for="sort-{{ $loop->index + 1 }}">{{ $label }}</label>
                                         </div>
                                         @endforeach
                                     </div>
                                 </div>
                                 <button type="submit"
                                     class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4">
                                     Lọc Sản Phẩm
                                 </button>
                             </form>


                         </div>
                         <div class="col-12 col-md-8">
                             <div class="row g-4 d-flex text-center mb-4">
                                 <?php
                                    if ($all_product->isEmpty()) {
                                        echo '<div>Không tìm thấy sản phẩm</div>';
                                    }
                                    ?>


                                 @foreach ($all_product as $key => $pro)
                                 <div class="col-md-6 col-lg-4 col-xl-4">
                                     <div class="rounded position-relative fruit-item">
                                         <a href=" {{URL::to('/product/'.$pro->product_id)}}">
                                             <div class="fruit-img">
                                                 <img src="{{asset('public/backend/products-images/'.$pro->product_image)}}"
                                                     class="w-100 rounded-top" alt="">
                                             </div>
                                             <div
                                                 class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                 <h4 style="font-size: 16px;">
                                                     {{$pro->product_name}}
                                                 </h4>
                                                 <p style="font-size: 13px;">{{$pro->product_short_desc}}
                                                 </p>
                                                 <div
                                                     class="d-flex flex-lg-wrap flex-column justify-content-between">
                                                     <p style="text-align: center; width: 100%;font-size: 16px;"
                                                         class="text-dark  fw-bold mb-2">
                                                         {{number_format($pro->product_price, 0, ',', '.')}} đ
                                                     </p>
                                                     
                                                    <form  action="{{URL::to('/product/add-to-card/'.$pro->product_id)}}" method="post" class="">
                                                        {{csrf_field()}}
                                                         <button
                                                             class="mx-auto btn border border-secondary rounded-pill px-3 text-primary "><i
                                                                 class="fa fa-shopping-bag me-2 text-primary"></i>
                                                             Add to cart
                                                         </button>
                                                     </form>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                             <nav aria-label="Page navigation example mb-4">
                                 {{ $all_product->links('vendor.pagination.custom-pagination') }} <!-- Use your custom view -->
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>
 @stop