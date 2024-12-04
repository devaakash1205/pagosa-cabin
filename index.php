<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    include("link.php");
    ?>
    <title>Pagosa Cabin | Home</title>
</head>


<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-cube-area">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>

<?php
include("header.php");
?>
<section class="banner-two">
    <div class="banner-two__carousel villoz-owl__carousel owl-carousel owl-theme" data-owl-option='{
     "items":1,
     "margin":0,
     "loop":true,
     "smartSpeed":700,
     "autoplay":true,
     "nav":true,
     "dots":false,
     "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
      "animateOut": "fadeOut",  
     }'>
        <!--Slider Image Here-->
        <?php
        if (!empty($banner_image) && is_array($banner_image)) {
            foreach ($banner_image as $key) {
        ?>
                <div class="item">
                    <div class="banner-two__image" style="background-image: url(<?php echo $key["dest"] ?>);"></div>
                </div>
        <?php
            }
        }
        ?>

    </div>
    <!--Banner Slider-->
    <div class="banner-two__content">
        <div class="container">
            <div class="banner-two__content__top wow fadeInUp" data-wow-delay="300ms">
                <h1 class="banner-two__title">
                    <?php
                    echo isset($homepage_details) && $homepage_details["banner_text"] != null ? $homepage_details["banner_text"] : "Let’s Make your stay unforgettable";
                    ?>
                </h1>
                <?php
                if (isset($homepage_details) && $homepage_details["btn_name"] != null && $homepage_details["btn_url"] != null && $homepage_details["enable_btn"] == 1) {
                    echo "<div style='text-align: center;'>
                                <a class='blog-card__link' href='" . $homepage_details["btn_url"] . "' style='display: inline-block; padding: 15px 20px; font-size: 14px; text-decoration: none; border-radius: 5px;'>
                                    " . $homepage_details["btn_name"] . "
                                </a>
                            </div>";
                }
                ?>


            </div>
        </div>
    </div>
</section>
<div class="banner-area">
    <div class="container">
        <div class="banner-content">
            <h1>Distinctively Different in the Heart of “Uptown” Saint John.</h1>
            <p>
                The hotel and resort business is one of the best and loyal business
                <br> in the global market.
            </p>
            <div class="banner-btn">

            </div>
        </div>
    </div>
</div>

<div class="about-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="assets/img/about/about-img.jpeg" alt="Images" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <span>About Us</span>
                        <h2>
                            A Pagosa Springs, Colorado Vacation Home in the Heart of the San Juan Mtns.
                        </h2>
                        <p>
                            Nestled on the mountain side of The San Juan River Village, this lovely mountain home with reliable high speed Starlinks wifi has a secluded setting and a magnificent panoramic view of the San Juan Mountains. It is located a convenient 7 miles East of
                            Pagosa Springs, Colorado and 50 min. east of Durango. It is just 20 minutes from the Wolf Creek Ski Area, which boasts the best ski powder in the State of Colorado. It is 10 minutes from the famous Pagosa Hots Springs with
                            outdoor pools that cascade down the hill to the river. Several of the pools are actually in the river!
                        </p>
                    </div>
                    <!-- <ul>
                            <li>
                                <i class="flaticon-restaurant"></i>
                                <div class="content">
                                    <h3>Deck and Gardens</h3>
                                    <p>
                                        We are one of the best company in the global market and we have a restaurant facilities for all of our guides and all of our guests.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-wifi-signal-1"></i>
                                <div class="content">
                                    <h3>TV</h3>
                                    <p>
                                        This is the place where you will get a free wifi zone on a reasonable price and this will help you to make a colourful happy moments.
                                    </p>
                                </div>
                            </li>
                        </ul> -->
                    <a href="" class="default-btn btn-bg-one border-radius-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="services-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Our Services</span>
            <h2>
                Our Services on the Global Market for Our Client's Reservation
            </h2>
        </div>
        <div class="services-slider owl-carousel owl-theme pt-45">
            <div class="services-item">
                <i class="flaticon-hotel"></i>
                <h3>
                    <a href="service-details.html">Standard Room </a>
                </h3>
                <p>
                    You can easily reserve a hotel room in a suitable place as you want. This will be able to make good feelings.
                </p>
                <a href="service-details.html" class="get-btn">Get Service</a>
            </div>
            <div class="services-item">
                <i class="flaticon-resort"></i>
                <h3>
                    <a href="service-details.html">Deluxe Room </a>
                </h3>
                <p>
                    One can easily reserve a resort room in a suitable place as you want. This will be able to make good feelings.
                </p>
                <a href="service-details.html" class="get-btn">Get Service</a>
            </div>
            <div class="services-item">
                <i class="flaticon-buildings"></i>
                <h3>
                    <a href="service-details.html">Suites Room
                    </a>
                </h3>
                <p>
                    Wedding hall reservation is possible in a suitable place as you want. This will be able to make good feelings.
                </p>
                <a href="service-details.html" class="get-btn">Get Service</a>
            </div>
        </div>
    </div>
</div>

<!-- <div class="reservation-area section-bg pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="reservation-content">
                        <div class="section-title">
                            <h2>
                                <a href="reservation.html">You Easily Reserve the Desire
                    Things That Makes All of Your
                    Happiness & Joys</a>
                            </h2>
                            <p>
                                This is one of the most important and crucial facts that helps us to make one of the booking easily. This booking will help you to make your journey and trip period easily. This will help you to make a journey more easier and that an easier journey is
                                more useful for you. So, let's start!
                            </p>
                        </div>
                        <a href="book.html" class="default-btn btn-bg-one border-radius-5">Quick Booking</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="reservation-img">
                        <img src="assets/img/reservation/reservation-img.jpg" alt="Images" />
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<div class="specialty-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>SPECIALTY</span>
            <h2>Our Specialization Sectors & All of the Other Details</h2>
        </div>
        <div class="row pt-45 align-items-center">
            <div class="col-lg-6 col-xxl-7">
                <div class="specialty-img">
                    <img src="assets/img/specialty/208232768.jpg" alt="Images" />
                </div>
            </div>
            <div class="col-lg-6 col-xxl-5">
                <div class="specialty-list">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="specialty-list-card">
                                <i class="flaticon-decoration"></i>
                                <h3>Well Decoration</h3>
                                <p>
                                    We are very careful about our room and all of the resort decorations. So, try us.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="specialty-list-card">
                                <i class="flaticon-wifi-signal-1"></i>
                                <h3>Wifi</h3>
                                <p>
                                    You can easily enjoy free access to a superstar bar at a reasonable price.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="specialty-list-card">
                                <i class="flaticon-vacuum"></i>

                                <h3>Laundry</h3>
                                <p>
                                    You can easily enjoy free access to a superstar bar at a reasonable price.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="specialty-list-card">
                                <i class="flaticon-beach-vacation"></i>
                                <h3>Deck and Gardens </h3>
                                <p>
                                    You can easily enjoy free access to a superstar bar at a reasonable price.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="specialty-list-card">
                                <i class="flaticon-fireworks"></i>
                                <h3>5 Stars Rettings</h3>
                                <p>
                                    Atoli is a Well Known Agency and the Agency is One of the Best by 5 Star Retting.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="room-area pt-100 pb-70 section-bg">
    <div class="container">
        <div class="section-title text-center">
            <span>ROOMS</span>
            <h2>Our Rooms & Rates</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/room-details-img2.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">High Rate Main House
                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:11px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $260</p>
                            <p><strong>Week:</strong> $1560</p>
                            <p><strong>Month:</strong> $5,000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/room-details-img3.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">
                                Major Spring Holidays
                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:11px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $300</p>
                            <p><strong>Week:</strong> $1,800</p>
                            <p><strong>Month:</strong> $5,500</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/room-details-img1.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">Labour Color
                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:11px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $300</p>
                            <p><strong>Week:</strong> $1,800</p>
                            <p><strong>Month:</strong> $5,500</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/480_IMG_0080.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">Fall Colors

                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:13px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $100</p>
                            <p><strong>Week:</strong> $650</p>
                            <p><strong>Month:</strong> $2000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/480_IMG_0078.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">Low Rate Main House

                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:11px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $100</p>
                            <p><strong>Week:</strong> $650</p>
                            <p><strong>Month:</strong> $2000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="room-card ">
                    <a href="room-details.html ">
                        <img src="assets/img/room/480_IMG_0050.jpg " alt="Images " />
                    </a>
                    <div class="content ">
                        <h3>
                            <a href="room-details.html ">Memorial Day

                            </a>
                        </h3>
                        <div class="rating ">
                            <p style="font-size:11px; ">(4th bedroom, 3rd bath)</p>
                        </div>
                        <div class="pricing">
                            <p><strong>Nightly:</strong> $100</p>
                            <p><strong>Week:</strong> $650</p>
                            <p><strong>Month:</strong> $2000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonials-area pt-100 pb-70 ">
                <div class="container ">
                    <div class="section-title text-center ">

                        <h2>What Our Client Says</h2>
                    </div>
                    <div class="testimonials-slider owl-carousel owl-theme pt-45 ">
                        <div class="testimonials-item ">
                            <i class="flaticon-left-quote "></i>
                            <p>
                                "Thank you-Thank you-Thank you! You guys own a piece of heaven! " Burke Family, Pasadena, CA </p>
                            <ul>
                                <li>
                                    <img src="assets/img/testimonials/testimonials-img1.jpg " alt="Images " />
                                    <h3>Mary Marden</h3>
                                    <span>New York City</span>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials-item ">
                            <i class="flaticon-left-quote "></i>
                            <p>
                                "What a great time we had. What a perfectly gorgeous time of year " The Snavely's, Harlington, TX </p>
                            <ul>
                                <li>
                                    <img src="assets/img/testimonials/testimonials-img2.jpg " alt="Images " />
                                    <h3>Harriet Johnson</h3>
                                    <span>London City</span>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials-item ">
                            <i class="flaticon-left-quote "></i>
                            <p>
                                "We really enjoyed your place. The snow was great and so was the neighborhood.The Snavely's, Harlington, TX
                            </p>
                            <ul>
                                <li>
                                    <img src="assets/img/testimonials/testimonials-img3.jpg " alt="Images " />
                                    <h3>Tyrone Morgan</h3>
                                    <span>New Jersey</span>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials-item ">
                            <i class="flaticon-left-quote "></i>
                            <p style="font-weight:normal;">
                                "The studio apartment was just perfect and the futon was so comfortable we are looking for a similar one for our guest room."
                            <ul>
                                <li>
                                    <img src="assets/img/testimonials/testimonials-img3.jpg " alt="Images " />
                                    <h3>Tyrone Morgan</h3>
                                    <span>New Jersey</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-area pt-100 pb-70 section-bg ">
                <div class="container ">
                    <div class="row align-items-center justify-content-center ">
                        <div class="col-lg-6 col-xxl-7 ">
                            <div class="faq-img ">
                                <img src="assets/img/faq/faq-img1.jpg " alt="Images " />
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-5 ">
                            <div class="faq-content ">
                                <div class="section-title ">
                                    <h2>
                                        Let's Start a Free of Questions And Get a Quick Support That Will Help You to Know Us
                                    </h2>
                                </div>
                                <div class="faq-accordion ">
                                    <ul class="accordion ">
                                        <li class="accordion-item ">
                                            <a class="accordion-title " href="javascript:void(0) ">
                                                <i class="bx bx-plus "></i> How I Will Book a Room or Resort?
                                            </a>
                                            <div class="accordion-content ">
                                                <p>
                                                    To book a room or resort in Pagosa Springs, visit our website or app to explore available options and select your dates. Complete the booking process by providing necessary details and payment information. You can also call our reservations team for personalized
                                                    assistance. Make sure to book in advance, especially during peak seasons, to secure your spot in beautiful Pagosa Springs!
                                                </p>
                                            </div>
                                        </li>
                                        <li class="accordion-item ">
                                            <a class="accordion-title " href="javascript:void(0) ">
                                                <i class="bx bx-plus "></i> How I Will Be Able to Add on the Admin Portal?
                                            </a>
                                            <div class="accordion-content ">
                                                <p>
                                                    To add a booking on the admin portal, log in to your account and navigate to the "Manage Bookings" section. Select "Add New Booking" and enter the required details, including the guest's information, room type, dates, and payment status. Once completed,
                                                    click "Save" or "Confirm" to finalize the booking. Ensure all information is accurate before submission. You can also view and modify existing bookings as needed from this section.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="accordion-item ">
                                            <a class="accordion-title " href="javascript:void(0) ">
                                                <i class="bx bx-plus "></i> What are the Benefits of These Agencies?
                                            </a>
                                            <div class="accordion-content ">
                                                <p>
                                                    <b>Expertise and Guidance: </b>Agencies provide knowledgeable advice on destinations, accommodations, and activities.
                                                    <br><b>Time-saving:</b> They handle all aspects of planning, from flights to accommodations, saving you time. <br> <b>Exclusive Deals: </b>Agencies often have access to special rates, discounts,
                                                    and packages not available to the public. <br><b>Convenience:</b> They offer hassle-free booking and customer service support, especially during emergencies. <br><b>Tailored Packages:</b> Agencies
                                                    can customize trips based on your preferences and budget.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="accordion-item ">
                                            <a class="accordion-title active " href="javascript:void(0) ">
                                                <i class="bx bx-plus "></i> How I Will Make Payment for Room Book?
                                            </a>
                                            <div class="accordion-content show ">
                                                <p>
                                                    <b>Online Payment:</b> After selecting your room and dates, proceed to checkout. Enter your payment details (credit/debit card or other payment methods) on the secure payment page. <br> <b>Payment Confirmation: </b> Once the payment is processed, you will receive a confirmation email with booking details and a receipt. <br><b>Alternative Methods:</b> Some hotels may also accept payments via bank transfer,
                                                    PayPal, or in person at the property.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog-area pb-70 ">
                <div class="container ">
                    <div class="section-title text-center ">
                        <span>BLOGS</span>
                        <h2>Our Latest Blogs to the Intranational Journal at a Glance
                        </h2>
                    </div>
                    <div class="row pt-45 ">
                        <div class="col-lg-6 ">
                            <div class="blog-card ">
                                <div class="row align-items-center justify-content-center ">
                                    <div class="col-lg-5 col-md-4 p-0 ">
                                        <div class="blog-img ">
                                            <a href="blog-details.html ">
                                                <img src="assets/img/blog/blog-img1.jpg " alt="Images " />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-8 p-0 ">
                                        <div class="blog-content ">
                                            <span>October 08, 2024</span>
                                            <h3>
                                                <a href="blog-details.html ">Hotel Management is
                                                    the Best Policy</a>
                                            </h3>
                                            <p>
                                                This is one of the best & quality full hotels in the world that will help you to make a good market.
                                            </p>
                                            <a href="blog-details.html " class="read-btn ">
                                                Read More </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="blog-card ">
                                <div class="row align-items-center justify-content-center ">
                                    <div class="col-lg-5 col-md-4 p-0 ">
                                        <div class="blog-img ">
                                            <a href="blog-details.html ">
                                                <img src="assets/img/blog/blog-img2.jpg " alt="Images " />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-8 p-0 ">
                                        <div class="blog-content ">
                                            <span>October 11, 2024</span>
                                            <h3>
                                                <a href="blog-details.html ">3d Hotel Models
                                                    Have a Royal Model</a>
                                            </h3>
                                            <p>
                                                Hotel has made a revolutionary into the global market by making a 3D model on the hotel.
                                            </p>
                                            <a href="blog-details.html " class="read-btn ">
                                                Read More </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include("footer.php");
            include("script.php");
            ?>


            </body>

</html>