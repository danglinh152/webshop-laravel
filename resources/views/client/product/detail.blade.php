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
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ol>
                        </nav>
                    </div>
                    @forelse ($get_product as $product)
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{ asset('public/backend/products-images/' . $product->product_image) }}"
                                    class="img-fluid rounded" alt="Image" style="height: 450px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{ $product->product_name }}</h4>
                        <p class="mb-3">{{ $product->product_fact }}</p>
                        <h5 class="fw-bold mb-2">{{ number_format($product->product_price, 0, ',', '.') }} đ</h5>
                        <p class="mb-4">Short detail: {{ $product->product_short_desc }}</p>

                        <form action="{{ URL::to('/product/add-to-card/'.$product->product_id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" id="quantity" name="quantity" class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary" onclick="addToCart('{{ $product->product_id }}', event)">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </form>
                    </div>


                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Description</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>{{ $product->product_long_desc }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ url('/client/review/addComment') }}" method="POST" id="review-form">
                        @csrf
                        <h4 class="fw-bold mb-5">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <textarea required name="review_content" id="comment" class="form-control border-0" cols="30" rows="8" placeholder="Your Review" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div id="rating" class="d-flex align-items-center">
                                            <input type="hidden" name="rating" id="rating-input" value="0">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="me-1 star" style="width: 16px; height: 16px; color: #E4E4E4;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                @endfor
                                                <p id="rating-text" class="mb-0 ms-1 text-muted">Rating: 0 stars</p>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit-btn" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="comment-block">
                        @if (!$all_review->isEmpty())
                        @foreach ($all_review as $review)
                        <div class="container mt-3">
                            <p class="m-0 fs-5" style="max-width: 840px;">{{ $review->comment }}</p>
                            <div class="rating-block d-flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="position-relative">
                                    <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: {{ ($i <= $review->rating) ? '100%' : '0%' }}%;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#FFC107" />
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4" />
                                    </svg>
                            </div>
                            @endfor
                        </div>
                        <p class="m-0 fw-bold" style="max-width: 840px; font-size: 11px;"> User Id: {{ $review->user_id }}</p>
                        <span class="mt-1 text-muted small">{{ $review->updated_at }}</span>
                    </div>
                    @endforeach
                    @endif
                </div>
                @empty
                <div class="col-lg-6">No products found.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
</div>

<script>
    const stars = document.querySelectorAll('#rating .star');
    const ratingText = document.getElementById('rating-text');
    const ratingInput = document.getElementById('rating-input');
    const submitBtn = document.getElementById('submit-btn');
    const commentTextarea = document.getElementById('comment');

    const addToCart = function(product_id, event) {
        event.preventDefault(); // Prevent the default form submission

        var quantity = document.getElementById("quantity").value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ URL::to('/product/add-to-cart/') }}/" + product_id + "/" + quantity, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle success response
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

    let selectedRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            selectedRating = index + 1;
            updateStars(selectedRating);
            ratingInput.value = selectedRating;
        });
    });

    function updateStars(rating) {
        stars.forEach((star, i) => {
            star.style.color = i < rating ? '#FFC107' : '#E4E4E4';
        });
        ratingText.innerHTML = `Rating: ${rating} star${rating > 1 ? 's' : ''}`;
    }

    submitBtn.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent the default form submission

        if (selectedRating > 0 && commentTextarea.value.trim() !== "") {
            const formData = new FormData(document.getElementById('review-form'));
            // AJAX request
            fetch("{{ url('/client/review/addComment') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI with the new comment
                        const newComment = `
                    <div class="container mt-3">
                        <p class="m-0 fs-5" style="max-width: 840px;">${data.comment}</p>
                        <div class="m-0 rating-block d-flex">
                            ${generateStars(data.rating)}
                        </div>
                        <p class="m-0 fw-bold" style="max-width: 840px; font-size: 11px;"> User Id: ${data.user_id}</p>
                        <span class="mt-1 text-muted small">${data.updated_at}</span>
                    </div>`;
                        document.querySelector('#comment-block').insertAdjacentHTML('beforeend', newComment);
                        commentTextarea.value = ""; // Clear the textarea
                        selectedRating = 0; // Reset rating
                        updateStars(0); // Reset visual stars
                    } else {
                        alert('Failed to post comment. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        } else {
            alert('Please select a rating and enter your comment before submitting.');
        }
    });

    function generateStars(rating) {
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            const fillColor = i <= rating ? '#FFC107' : '#E4E4E4';
            starsHtml += `
                <div class="position-relative">
                    <div class="position-absolute top-0 start-0 h-100 overflow-hidden" style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="${fillColor}"/>
                        </svg>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="#E4E4E4"/>
                    </svg>
                </div>`;
        }
        return starsHtml;
    }
</script>
@endsection