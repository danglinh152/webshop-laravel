(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', 0);
            }
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
        //add active class to header
        const navElement = $("#navbarCollapse");
        const currentUrl = window.location.pathname;
        navElement.find('a.nav-link').each(function () {
            const link = $(this); // Get the current link in the loop
            const href = link.attr('href'); // Get the href attribute of the link

            if (href === currentUrl) {
                link.addClass('active'); // Add 'active' class if the href matches the current URL
            } else {
                link.removeClass('active'); // Remove 'active' class if the href does not match
            }
        });
    });

    

    // Product Quantity
    $('.checkCart input').on("click", function () {
    const index = this.getAttribute("index");
    const checkElement = document.getElementById(`check-cart-detail${index}`);
        if (checkElement.checked === true) {
            const cartTotal = document.getElementById(`total${index}`).getAttribute("data_cart_detail_total");
            console.log(cartTotal);
            const totalPriceElement = $(`p[data-cart-total-price]`);
            if (totalPriceElement && totalPriceElement.length) {
                const currentTotal = totalPriceElement[0].getAttribute("data-cart-total-price");
                console.log(currentTotal);
                let newTotal = (+currentTotal) + (+cartTotal);
                //update
                totalPriceElement?.each(function (index, element) {
                    //update text
                    $(totalPriceElement[index]).text(formatCurrency(newTotal.toFixed(2)) + " đ");

                    //update data-attribute
                    $(totalPriceElement[index]).attr("data-cart-total-price", newTotal);
                });
            }
        }
        else {
            const cartTotal = document.getElementById(`total${index}`).getAttribute("data_cart_detail_total");
            console.log(cartTotal);
            const totalPriceElement = $(`p[data-cart-total-price]`);
            if (totalPriceElement && totalPriceElement.length) {
                const currentTotal = totalPriceElement[0].getAttribute("data-cart-total-price");
                console.log(currentTotal);
                let newTotal = (+currentTotal) - (+cartTotal);
                //update
                totalPriceElement?.each(function (index, element) {
                    //update text
                    $(totalPriceElement[index]).text(formatCurrency(newTotal.toFixed(2)) + " đ");

                    //update data-attribute
                    $(totalPriceElement[index]).attr("data-cart-total-price", newTotal);
                });
            }
        }
})

    $('.quantity button').on('click', function () {
        let change = 0;

        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
            change = 1;
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
                change = -1;
            } else {
                newVal = 1;
            }
        }
        const input = button.parent().parent().find('input');
        input.val(newVal);
        console.log(newVal);
        //set form index
        const index = input.attr("data-cart-detail-index")
        // const el = document.getElementById(`cartDetails${index}.quantity`);
        // $(el).val(newVal);

        const quantity = document.getElementById("quantity");
        $(quantity).val(newVal)


        //get price
        const price = input.attr("data-cart-detail-price");
        const priceElement = document.getElementById(`total${index}`);
        if (priceElement) {
            const newPrice = +price * newVal;
            priceElement.innerText = (formatCurrency(newPrice.toFixed(2)) + " đ");
            priceElement.setAttribute("data_cart_detail_total", newPrice);
        }
        

        const checkElement = document.getElementById(`check-cart-detail${index}`);
        if (checkElement.checked === true) {
            //update total cart price
            const totalPriceElement = $(`p[data-cart-total-price]`);

            if (totalPriceElement && totalPriceElement.length) {
                const currentTotal = totalPriceElement.first().attr("data-cart-total-price");
                let newTotal = +currentTotal;
                if (change === 0) {
                    newTotal = +currentTotal;
                } else {
                    newTotal = change * (+price) + (+currentTotal);
                }

                //reset change
                change = 0;

                //update
                totalPriceElement?.each(function (index, element) {
                    //update text
                    $(totalPriceElement[index]).text(formatCurrency(newTotal.toFixed(2)) + " đ");

                    //update data-attribute
                    $(totalPriceElement[index]).attr("data-cart-total-price", newTotal);
                });
            }
        }
    });

    

    function formatCurrency(value) {
        // Use the 'vi-VN' locale to format the number according to Vietnamese currency format
        // and 'VND' as the currency type for Vietnamese đồng
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'decimal',
            minimumFractionDigits: 0, // No decimal part for whole numbers
        });

        let formatted = formatter.format(value);
        // Replace dots with commas for thousands separator
        formatted = formatted.replace(/\./g, ',');
        return formatted;
    }



    //handle filter products
    $('#btnFilter').click(function (event) {
        event.preventDefault();

        let factoryArr = [];
        let targetArr = [];
        let priceArr = [];
        //factory filter
        $("#factoryFilter .form-check-input:checked").each(function () {
            factoryArr.push($(this).val());
        });

        //target filter
        $("#targetFilter .form-check-input:checked").each(function () {
            targetArr.push($(this).val());
        });

        //price filter
        $("#priceFilter .form-check-input:checked").each(function () {
            priceArr.push($(this).val());
        });

        //sort order
        let sortValue = $('input[name="radio-sort"]:checked').val();

        const currentUrl = new URL(window.location.href);
        // currentUrl.pathname = 'webshop-laravel/product-filter';
        // window.location.href = currentUrl.toString();


    });

    //handle auto checkbox after page loading
    // Parse the URL parameters
    const params = new URLSearchParams(window.location.search);

    // Set checkboxes for 'factory'
    if (params.has('factory')) {
        const factories = params.get('factory').split(',');
        factories.forEach(factory => {
            $(`#factoryFilter .form-check-input[value="${factory}"]`).prop('checked', true);
        });
    }

    // Set checkboxes for 'target'
    if (params.has('target')) {
        const targets = params.get('target').split(',');
        targets.forEach(target => {
            $(`#targetFilter .form-check-input[value="${target}"]`).prop('checked', true);
        });
    }

    // Set checkboxes for 'price'
    if (params.has('price')) {
        const prices = params.get('price').split(',');
        prices.forEach(price => {
            $(`#priceFilter .form-check-input[value="${price}"]`).prop('checked', true);
        });
    }

    // Set radio buttons for 'sort'
    if (params.has('sort')) {
        const sort = params.get('sort');
        $(`input[type="radio"][name="radio-sort"][value="${sort}"]`).prop('checked', true);
    }

})(jQuery);