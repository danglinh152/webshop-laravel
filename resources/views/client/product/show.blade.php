 @extends('client.layout.homepage_layout')
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
                             <div class="row g-4">
                                 <div class="col-12" id="factoryFilter">
                                     <div class="mb-2"><b>Hãng sản xuất</b></div>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="factory-1" value="MSI">
                                         <label class="form-check-label"
                                             for="factory-1">MSI</label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="factory-2" value="ASUS">
                                         <label class="form-check-label"
                                             for="factory-2">Asus</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="factory-3" value="LENOVO">
                                         <label class="form-check-label"
                                             for="factory-3">Lenovo</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="factory-6" value="ACER">
                                         <label class="form-check-label"
                                             for="factory-6">Acer</label>
                                     </div>
                                 </div>
                                 <div class="col-12" id="targetFilter">
                                     <div class="mb-2"><b>Mục đích sử dụng</b></div>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="target-1" value="Gaming">
                                         <label class="form-check-label"
                                             for="target-1">Gaming</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="target-2" value="Văn phòng">
                                         <label class="form-check-label" for="target-2">Sinh viên
                                             - văn
                                             phòng</label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="target-3" value="Đồ họa">
                                         <label class="form-check-label" for="target-3">Đồ
                                             họa</label>
                                     </div>



                                 </div>
                                 <div class="col-12" id="priceFilter">
                                     <div class="mb-2"><b>Mức giá</b></div>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="price-3" value="10-15-trieu">
                                         <label class="form-check-label" for="price-3">Từ 10 - 15
                                             triệu</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="price-4" value="15-20-trieu">
                                         <label class="form-check-label" for="price-4">Từ 15 - 20
                                             triệu</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="checkbox"
                                             id="price-5" value="tren-20-triệu">
                                         <label class="form-check-label" for="price-5">Trên 20
                                             triệu</label>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="mb-2"><b>Sắp xếp</b></div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="radio" id="sort-1"
                                             value="gia-tang-dan" name="radio-sort">
                                         <label class="form-check-label" for="sort-1">Giá tăng
                                             dần</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="radio" id="sort-2"
                                             value="gia-giam-dan" name="radio-sort">
                                         <label class="form-check-label" for="sort-2">Giá giảm
                                             dần</label>
                                     </div>

                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="radio" id="sort-3"
                                             value="gia-nothing" name="radio-sort" checked>
                                         <label class="form-check-label" for="sort-3">Không sắp
                                             xếp</label>
                                     </div>

                                 </div>
                                 <div class="col-12">
                                     <button id="btnFilter"
                                         class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4">
                                         Lọc Sản Phẩm
                                     </button>
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 col-md-8">
                             <div class="row g-4 d-flex text-center">
                                 <c:if test="${totalPages == 0}">
                                     <div>Không tìm thấy sản phẩm</div>
                                 </c:if>
                                 <div class="col-md-6 col-lg-4 col-xl-4">
                                     <div class="rounded position-relative fruite-item">
                                         <div class="fruite-img">
                                             <img src="{{asset('public/backend/products-images/lenovo-loq.jpg')}}"
                                                 class="w-100 rounded-top" alt="">
                                         </div>
                                         <div
                                             class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                             <h4 style="font-size: 16px;">
                                                 <a href="{{URL::to('/product/id')}}">Laptop Lenovo LOQ</a>
                                             </h4>
                                             <p style="font-size: 13px;">Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám
                                             </p>
                                             <div
                                                 class="d-flex flex-lg-wrap flex-column justify-content-between">
                                                 <p style="text-align: center; width: 100%;font-size: 16px;"
                                                     class="text-dark  fw-bold mb-2">
                                                     19,000,000 đ
                                                 </p>
                                                 <form
                                                     action="#"
                                                     method="post" class="">
                                                     <button
                                                         class="mx-auto btn border border-secondary rounded-pill px-3 text-primary "><i
                                                             class="fa fa-shopping-bag me-2 text-primary"></i>
                                                         Add to cart
                                                     </button>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <nav aria-label="Page navigation example mb-4">
                                     <ul class="pagination justify-content-center d-flex">
                                         <li class="page-item">
                                             <!-- <a class="page-link" onclick="return false"
                                                 aria-label="Previous">
                                                 <span aria-hidden="true">&laquo;</span>
                                             </a> -->
                                             <a class="page-link"
                                                 href="#"
                                                 aria-label="Previous">
                                                 <span aria-hidden="true">&laquo;</span>
                                             </a>
                                         </li>
                                         <li class="page-item">
                                             <a class="page-link"
                                                 href="#">1
                                             </a>
                                         </li>
                                         <li class="page-item">
                                             <a class="page-link"
                                                 href="#">2
                                             </a>
                                         </li>
                                         <li class="page-item">
                                             <a class="page-link"
                                                 href="#">3
                                             </a>
                                         </li>

                                         <li class="page-item">
                                             <!-- <a class="page-link" onclick="return false"
                                                     aria-label="Previous">
                                                     <span aria-hidden="true">&raquo;</span>
                                                 </a> -->
                                             <a class="page-link"
                                                 href="#"
                                                 aria-label="Previous">
                                                 <span aria-hidden="true">&raquo;</span>
                                             </a>
                                         </li>
                                     </ul>
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