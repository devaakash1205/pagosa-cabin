<?php
require_once("./admin/config.php");
require_once("./admin/dashboard/controller/ReviewController.php");
$reviewData = new Reviews($conn);
?>
<div class="testimonials-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>What Our Clients Say</h2>
        </div>
        <?php
        $reviews = $reviewData->getAllReviews();
        if (!empty($reviews) && is_array($reviews)) {
        ?>
            <!-- Initialize the testimonials slider only once -->
            <div class="testimonials-slider owl-carousel owl-theme pt-45">
                <?php foreach ($reviews as $review) { ?>
                    <div class="testimonials-item">
                        <i class="flaticon-left-quote"></i>
                        <p>
                            <?php echo $review['description']; ?>
                        </p>
                        <h3> <?php echo $review['name']; ?></h3>
                        <span> <?php echo $review['address']; ?></span>
                    </div>
                <?php } ?>
            </div>
        <?php
        } else {
        ?>
            <div class="col-12 text-center">
                <p>No reviews found.</p>
            </div>
        <?php
        }
        ?>
    </div>
</div>