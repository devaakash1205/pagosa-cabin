<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    require_once("./admin/config.php");
    include('form-submit.php');
    require_once("./admin/dashboard/controller/ContactUsPageController.php");
    $contactData = new Contact($conn);
    $contactDetails =  $contactData->getContact();
    ?>
    <title>Pagosa Cabin | Contact</title>
</head>

<body>
    <?php
    include("header.php");

    ?>
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Contact</li>
                </ul>
                <h3>Contact</h3>
            </div>
        </div>
    </div>
    <div class="contact-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="contact-form">
                            <form method="post" action="">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit"
                                            class="default-btn btn-bg-three"
                                            name="send_contact">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-another-content">
                        <div class="section-title">
                            <h2>Contacts Info</h2>
                            <p>
                                <?php echo isset($contactDetails) && !empty($contactDetails['description']) ? $contactDetails['description'] : ""; ?>
                            </p>
                        </div>
                        <div class="contact-item">
                            <ul>
                                <li>
                                    <i class="bx bx-home-alt"></i>
                                    <div class="content">
                                        <span> <?php echo isset($contactDetails) && !empty($contactDetails['address']) ? $contactDetails['address'] : ""; ?></span>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-phone-call"></i>
                                    <div class="content">
                                        <span><a href="tel:<?php echo isset($contactDetails) && !empty($contactDetails['phone']) ? $contactDetails['phone'] : ""; ?>">+<?php echo isset($contactDetails) && !empty($contactDetails['phone']) ? $contactDetails['phone'] : ""; ?></a></span>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-envelope"></i>
                                    <div class="content">
                                        <span>
                                            <a href="mailto:<?php echo isset($contactDetails) && !empty($contactDetails['email']) ? $contactDetails['email'] : ""; ?>">
                                                <?php echo isset($contactDetails) && !empty($contactDetails['email']) ? $contactDetails['email'] : ""; ?>
                                            </a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    include("script.php")
    ?>
</body>

</html>