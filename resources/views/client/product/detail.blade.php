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
                    @foreach ($get_product as $key => $product)
                    <?php
                    if (!$product) {
                        echo '<div class="col-lg-6">
                            Nothing
                            </div>
                            ';
                    }
                    ?>
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{asset('public/backend/products-images/' . $product->product_image)}}"
                                    class="img-fluid rounded" alt="Image" style="height: 450px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{$product->product_name}}</h4>
                        <p class="mb-3">{{$product->product_fact}}</p>
                        <h5 class="fw-bold mb-2">
                            {{number_format($product->product_price, 0, ',', '.')}} đ
                        </h5>
                        <?php
                            $sum = 0;
                            $count = 0;
                        ?>
                        @if (!$all_review->isEmpty())
                            @foreach ($all_review as $review)
                                <?php
                                    $sum += $review->rating;
                                    $count++;
                                ?>
                            @endforeach
                            <?php
                                $rating = $sum / $count;
                                $i = 1;
                                $percent = ($rating - floor($rating)) * 100;
                                echo'<div class="rating-block d-flex mb-2">';
                                while ($i < 6) {
                                    if ($i <= $rating) {
                                        echo    '<div class="position-relative">
                                                    <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: 100%;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#FFC107"/>
                                                        </svg>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                        <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4"/>
                                                    </svg>
                                                </div>';
                                        $i++;
                                    }
                                    else {
                                        echo    '<div class="position-relative">
                                                    <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: '.$percent.'%;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#FFC107"/>
                                                        </svg>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                        <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4"/>
                                                    </svg>
                                                </div>';
                                        $i++;
                                    }
                                }
                                echo'</div>';
                            ?>
                        @endif

                        <p class="mb-4">Short detail: {{$product->product_short_desc}}</p>
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
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
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
                                <p>{{$product->product_long_desc}}</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('/client/review/addComment') }}" method="POST">
                        @csrf
                        <h4 class="fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea required name="review_content" id="comment" class="form-control border-0" cols="30" rows="8" placeholder="Your Review" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div id="rating" class="d-flex align-items-center">
                                            <input type="hidden" name="rating" id="rating-input" value="0">
                                            <svg class="me-1" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="me-1" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="me-1" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="me-1" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="me-1" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <p id="rating-text" class="mb-0 ms-1 text-muted">Rating: 0 stars</p>
                                        </div>

                                    </div>
                                    <button type="submit" id="submit-btn" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div>
                        @if (!$all_review->isEmpty())
                        @foreach ($all_review as $key => $review)
                        <div class="container my-5">
                            <p class="mt-3" style="max-width: 840px;">
                                {{$review->user_first_name}} {{$review->user_last_name}}
                            </p>
                            <div class="mt-3 rating-block d-flex">
                                <?php
                                    $i = 1;
                                    $rating = $review->rating;
                                    $percent = ($rating - floor($rating)) * 100;
                                    while ($i < 6) {
                                        if ($i <= $rating) {
                                            echo    '<div class="position-relative">
                                                        <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: 100%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                                <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#FFC107"/>
                                                            </svg>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4"/>
                                                        </svg>
                                                    </div>';
                                            $i++;
                                        }
                                        else {
                                            echo    '<div class="position-relative">
                                                        <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: '.$percent.'%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                                <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#FFC107"/>
                                                            </svg>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4"/>
                                                        </svg>
                                                    </div>';
                                            $i++;
                                        }
                                    }
                                ?>
                            </div>
                            <span class="mt-1 text-muted small">{{$review->updated_at}}</span>
                            <p class="mt-3" style="max-width: 840px;">
                                {{$review->comment}}
                            </p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    const stars = document.querySelectorAll('#rating svg');
    const ratingText = document.getElementById('rating-text');
    const ratingInput = document.getElementById('rating-input')
    let selectedRating = 0;
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            selectedRating = index + 1;
            updateStars(selectedRating);
            ratingInput.value = selectedRating
        });
    });

    function updateStars(rating) {
        stars.forEach((star, i) => {
            if (i < rating) {
                star.classList.add('text-warning');
            } else {
                star.classList.remove('text-warning');
            }
        });
        ratingText.innerHTML = `Rating: ${rating} star${rating > 1 ? 's' : ''}`;
    }

    const submitBtn = document.getElementById('submit-btn');

    // submitBtn.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     if (selectedRating > 0) {
    //     } else {
    //         alert('Please select a rating before submitting.');
    //     }
    // });
</script>
@stop
