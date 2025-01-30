<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    include('form-submit.php');
    ?>
    <title>Pagosa Cabin | Room</title>
</head>

<body>
    <?php
    include("header.php");
    // 
    $reviewsData = new Reviews($conn);

    ?>
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Reviews</li>
                </ul>
                <h3>Reviews</h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <?php
        $reviews = $reviewsData->getAllReviews();
        if (!empty($reviews) && is_array($reviews)) {
            foreach ($reviews as $review) {
                ?>
                <div class="col-lg-11 col-md-11 col-sm-11 col-11 mb-4">
                    <div class="review-card">
                        <div class="review-header">
                            <i class="fas fa-quote-left quote-icon"></i>
                            <div>
                                <div class="reviewer-name"><?php echo htmlspecialchars($review['name']); ?></div>
                                <div><?php echo htmlspecialchars($review['address']); ?></div>
                            </div>
                        </div>
                        <div class="review-content">
                            "<?php echo htmlspecialchars($review['description']); ?>"
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 text-center">
                <p>No reviews found.</p>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="col-12 col-lg-10 col-sm-10 col-md-10">
            <div class="side-bar-form">
                <h2 class="text-center">Submit Your Review</h2>
                <form method="post" action="">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Your name" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Enter Your Email Address"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" placeholder="Enter Your Contact Number"
                                        name="phone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Address"
                                        name="address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Enter Your Review</label>
                                <textarea class="form-control" placeholder="Enter Your Review" name="description"
                                    rows="4" required></textarea>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12">
                                <button type="submit" class="default-btn btn-bg-three w-100" name="submit_review">
                                    Submit Review
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    include("script.php");
    ?>

</body>

</html>