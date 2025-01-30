<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    include './admin/config.php';
    include 'form-submit.php';
    include 'modal.php';
    ?>
    <title>Pagosa Cabin | Room</title>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Rooms</li>
                </ul>
                <h3>Rooms</h3>
            </div>
        </div>
    </div>

    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-sm-8 col-lg-8 mb-4">
                        <div id="roomSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/room-new/room1.jpg" class="d-block" alt="Room Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room2.jpg" class="d-block" alt="Room Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room4.jpg" class="d-block" alt="Room Image 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room10.jpg" class="d-block" alt="Room Image 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room5.jpg" class="d-block" alt="Room Image 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room7.jpg" class="d-block" alt="Room Image 6">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room8.jpg" class="d-block" alt="Room Image 7">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room9.jpg" class="d-block" alt="Room Image 8">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room11.jpg" class="d-block" alt="Room Image 9">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/room-new/room12.jpg" class="d-block" alt="Room Image 10">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#roomSlider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#roomSlider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="slider-details mt-4">
                            <h2 class="heading">Room Description</h2>
                            <p class="description">Nestled on the mountainside of the San Juan River Resort, this lovely
                                3
                                bedroom 2 bath mountain home w/studio apartment for a 4th bedroom and 3rd bath has high
                                speed, reliable Starlnks internet, and a magnificent panoramic view of the San Juan
                                Mountains from inside and outside the home. It is located 7 miles east of Pagosa Springs
                                and
                                20 minutes from Wolf Creek Ski Area. Serendipity has a large front porch and wrap around
                                deck with propane BBQ to relax or entertain on and enjoy the breathtaking views. There
                                are 3
                                million acres of San Juan National Forest outside your back door and you are walking
                                distance to the San Juan River and private stocked trout pond.</p>

                            <p class="bold">About The Area</p>
                            <p>Pagosa Springs, Co is a "Little Piece of Heaven" in Colorado!</p>
                            <p class="bold">House Rules</p>
                            <p>Military discounts offered. No smoking.Pets allowed upon approval.</p>
                            <p class="bold">Suitability</p>
                            <p>Couples, family, weddings and groups.</p>
                        </div>
                        <!--Room Details-->
                        <h2 class="heading mb-4">Room Details</h2>
                        <div class="container">
                            <div class="row">
                                <!-- Sleeping Arrangements -->
                                <div class="col-lg-12 col-md-12">
                                    <h5 class="text-center mb-3">Sleeping Arrangements</h5>
                                    <hr>
                                    <!-- <div class="row g-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/sofa_bed.png" alt="" class="img-fluid">
                                                    <img src="images/roombed.png" alt="" class="img-fluid ms-2">
                                                </div>
                                                <h6 class="mt-2">3 Bedroom in Studio</h6>
                                                <span>1 Double</span>&nbsp;<span>1 Sofa Bed</span>
                                                <br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/sofa_bed.png" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="mt-2">Master Bedroom</h6>
                                                <span>1 Queen</span>
                                                <br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/sofa_bed.png" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="mt-2">2nd Queen Bedroom</h6>
                                                <span>1 Queen</span>
                                                <br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/single_bed.png" alt="" class="img-fluid">
                                                    <img src="images/single_bed.png" alt="" class="img-fluid ms-2">
                                                </div>
                                                <h6 class="mt-2">2 Twins</h6>
                                                <span>2 Single</span>
                                                <br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/couch.png" alt="" class="img-fluid">
                                                </div>
                                                <h6 class="mt-2">Main Living/Dining Room</h6>
                                                <span>1 Couch</span>
                                                <br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                    </div> -->

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"><strong>Rooms</strong></th>
                                                <th scope="col"><strong>Details</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>4th Bedroom in Studio</strong></td>
                                                <td>1 Double, 1 Sofa Bed, Upstairs/Downstairs, Ceiling Fan</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Master Bedroom</strong></td>
                                                <td>1 Queen, Upstairs/Downstairs, Ceiling Fan, Closet/Clothes Rack, TV
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>2nd Queen Bedroom</strong></td>
                                                <td>1 Queen, Main Level, Closet/Clothes Rack</td>
                                            </tr>
                                            <tr>
                                                <td><strong>2 Twins</strong></td>
                                                <td>2 Single, Upstairs/Downstairs, Ceiling Fan, Closet/Clothes Rack</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Main Living/Dining Room</strong></td>
                                                <td>1 Couch</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Bathroom Arrangements -->
                                <div class="col-lg-12 col-md-12">
                                    <h5 class="text-center mb-3">Bathroom Arrangements</h5>
                                    <hr>
                                    <!-- <div class="row g-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/amin.png" alt="" class="img-fluid me-2">
                                                    <img src="images/shower.png" alt="" class="img-fluid me-2">
                                                    <img src="images/toi.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/hotel_am.png" alt="" class="img-fluid me-2">
                                                </div>
                                                <h6 class="mt-2">Studio 3/4 Bath</h6>
                                                <span>Full</span><br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/amin.png" alt="" class="img-fluid me-2">
                                                    <img src="images/shower.png" alt="" class="img-fluid me-2">
                                                    <img src="images/toi.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/hotel_am.png" alt="" class="img-fluid me-2">
                                                </div>
                                                <h6 class="mt-2">Upstairs Bath</h6>
                                                <span>Full</span><br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="bg-light text-dark text-center custom-box p-3 h-100">
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/amin.png" alt="" class="img-fluid me-2">
                                                    <img src="images/shower.png" alt="" class="img-fluid me-2">
                                                    <img src="images/toi.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <img src="images/hotel_am.png" alt="" class="img-fluid me-2">
                                                </div>
                                                <h6 class="mt-2">Downstairs Bath</h6>
                                                <span>Full</span><br>
                                                <a href="javascript:void(0);" class="custom-style">More</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"><strong>Room</strong></th>
                                                <th scope="col"><strong>Details</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Studio 3/4 Bath, Full</strong></td>
                                                <td>Sink, Shower, Toilet, Hotel Amenities</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Upstairs Bath, Full</strong></td>
                                                <td>Sink, Toilet, Combination Tub/Shower, Hotel Amenities</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Downstairs Bath, Full</strong></td>
                                                <td>Sink, Shower, Toilet, Hotel Amenities</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--End Room Details-->
                        <h2 class="heading mb-4 mt-4">Room Rates</h2>
                        <table class="table table-striped table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th>Rate Type</th>
                                    <th>Nightly</th>
                                    <th>Week</th>
                                    <th>Month</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>High Rate Main House (Ski Season)</td>
                                    <td>$260</td>
                                    <td>$1,560</td>
                                    <td>$5,000</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$300</td>
                                    <td>$1,800</td>
                                    <td>$5,500</td>
                                </tr>
                                <tr>
                                    <td>Major Holidays and Spring Break</td>
                                    <td>$300</td>
                                    <td>$1,800</td>
                                    <td>$5,500</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$340</td>
                                    <td>$2,040</td>
                                    <td>$5,700</td>
                                </tr>
                                <tr>
                                    <td>Labor Day (3 night min.)</td>
                                    <td>$260</td>
                                    <td>$1,560</td>
                                    <td>$5,000</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$300</td>
                                    <td>$1,800</td>
                                    <td>$5,500</td>
                                </tr>
                                <tr>
                                    <td>Fall Colors</td>
                                    <td>$275</td>
                                    <td>$1,650</td>
                                    <td>$5,200</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$315</td>
                                    <td>$1,890</td>
                                    <td>$5,600</td>
                                </tr>
                                <tr>
                                    <td>Early April, Nov, & Late Oct. (No Skiing)</td>
                                    <td>$210</td>
                                    <td>$1,260</td>
                                    <td>N/A</td>
                                </tr>
                                <tr>
                                    <td>Memorial Day</td>
                                    <td>$260</td>
                                    <td>$1,560</td>
                                    <td>$5,000</td>
                                </tr>
                                <tr>
                                    <td>May & June</td>
                                    <td>$230</td>
                                    <td>$1,380</td>
                                    <td>$4,500</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$270</td>
                                    <td>$1,620</td>
                                    <td>$5,250</td>
                                </tr>
                                <tr>
                                    <td>Low Rate Main House (Summer, non-holiday)</td>
                                    <td>$250</td>
                                    <td>$1,500</td>
                                    <td>$4,700</td>
                                </tr>
                                <tr>
                                    <td>add Studio (4th bedroom, 3rd bath)</td>
                                    <td>$290</td>
                                    <td>$1,740</td>
                                    <td>$5,100</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center bold">We Accept all Major Credit Cards | Pets Allowed with Permission | No
                            Smoking
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 col-sm-4 col-md-4">
                        <div class="side-bar-form">
                            <h3>Booking</h3>
                            <?php

                            ?>
                            <form method="post" action="">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter Your name"
                                                    name="name" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class="bx bxs-user"></i>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Your Email Address" name="email" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class="bx bxs-envelope"></i>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <div class="input-group">
                                                <input type="tel" class="form-control"
                                                    placeholder="Enter Your Contact Number" name="phone" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class="bx bxs-phone"></i>
                                        </div>
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input id="datetimepicker" type="text" class="form-control"
                                                    placeholder="Select Check in" name="checkin" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class="bx bxs-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input id="datetimepicker-check" type="text" class="form-control"
                                                    placeholder="Select Check out" name="checkout" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class="bx bxs-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Numbers of Adults</label>
                                            <select class="form-control" name="no_of_adults" required>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Numbers of Childrens</label>
                                            <select class="form-control custom-select" name="no_of_children" required>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three" name="submit_booking">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="side-bar-plan">
                            <h3>Amenities</h3>
                            <p class="bold">Facilities</p>
                            <ul>
                                <li class="strikethrough">Air Conditioning</li>
                                <li>Balcony</li>
                                <li>WiFi</li>
                                <li>Heating</li>
                                <li>Parking</li>
                                <li class="strikethrough">Patio</li>
                                <li class="strikethrough">Private Pool</li>
                                <li class="strikethrough">Shared Pool</li>
                                <li>Terrace</li>
                                <li>Internet</li>
                                <li class="strikethrough">Pool Table</li>
                                <li>Satellite/cable</li>
                                <li class="strikethrough">Hot Tub/Spa</li>
                                <li class="strikethrough">Pool Heat</li>
                                <li>Garage Parking</li>
                            </ul>
                            <p class="bold">Appliances</p>
                            <ul>
                                <li>CD Player</li>
                                <li>Ceiling Fan</li>
                                <li>Coffee Maker</li>
                                <li>Dishwasher</li>
                                <li>DVD Player</li>
                                <li>Hair Dryer</li>
                                <li class="strikethrough">Ice Maker</li>
                                <li>Iron</li>
                                <li>Microwave</li>
                                <li>Oven</li>
                                <li>Stereo</li>
                                <li>Stove</li>
                                <li>Telephone</li>
                                <li>Washing Machine</li>
                                <li>Clothes Dryer</li>
                                <li>TV</li>
                                <li>Refrigerator</li>
                                <li>BBQ Grill</li>
                            </ul>
                            <p class="bold">NearBy Activities</p>
                            <ul>
                                <li>Beach</li>
                                <li>Golf</li>
                                <li>Grocery Store</li>
                                <li class="strikethrough">Fitness Centre</li>
                                <li>Lake</li>
                                <li class="strikethrough">Ocean</li>
                                <li class="strikethrough">Playground</li>
                                <li>Restaurants</li>
                                <li>Shopping Area</li>
                                <li class="strikethrough">Tennis</li>
                                <li>Hiking</li>
                                <li class="strikethrough">Beach Front</li>
                                <li>Ocean Front</li>
                                <li class="strikethrough">Lake Front</li>
                                <li class="strikethrough">Ski Front View</li>
                                <li class="strikethrough">Downtown View</li>
                                <li class="strikethrough">Golf Front View</li>
                            </ul>
                            <p class="bold">More features</p>
                            <ul>
                                <li>Closest to Wolf Creek Ski Area, Best Views, National Forrest Access, Kids Fishing
                                    Ponds, High Speed Reliable Starlinks WiFi, Access to the San Juan River.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("testimonials.php");
        ?>
        <div class="text-center">
            <a href="reviews.php" class="default-btn btn-bg-three text-decoration">Read all Reviews</a>
        </div>
    </div>

    <?php
    include("footer.php");
    include("script.php");
    ?>

</body>

</html>