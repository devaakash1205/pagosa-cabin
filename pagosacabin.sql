-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 01:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagosacabin`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page_details`
--

CREATE TABLE `about_page_details` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `dest` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page_details`
--

INSERT INTO `about_page_details` (`id`, `name`, `description`, `dest`, `status`, `created_at`) VALUES
(1, '', '<h2><strong>About TKC Consult Inc</strong></h2><p>&nbsp;</p><p><span class=\"text-big\">T</span>KC Consult Inc. is a US-based Visionary company established in April 2020 that specializes in recruiting services, logistics and hospitality. Since then, we have continued to deliver innovative solutions that expand the capacity of businesses in multiple sectors to adapt to changing realities and leverage emerging opportunities under the leadership of President Chidi Nuwaubian and Vice President Teresa Nwaubani. By closing deals with professional staffing agencies and using a data-driven approach, we are your trusted partner for customized, timely and effective solutions.</p>', '', 1, '2024-11-23 12:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_login` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `auth_token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `is_login`, `status`, `auth_token`, `created_at`) VALUES
(1, 'admin', '$2y$10$utBP21SRwHm1Cz7gmtAuc.d1OnkKH8qhOsbTmQoxxh9hYZX48m8Uy', 0, 1, '', '2024-11-20 15:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `guests` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`id`, `name`, `email`, `phone`, `checkin`, `checkout`, `guests`, `created_at`) VALUES
(2, 'Aakash', '1205.aakash@gmail.com', '8797222161', '0000-00-00', '0000-00-00', 3, '2024-11-25 15:16:01'),
(3, 'Aakash', '1205.aakash@gmail.com', '8797222161', '11/27/2024', '11/20/2024', 0, '2024-11-25 15:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `contact_number1` varchar(15) NOT NULL,
  `contact_number2` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `enable_twitter` tinyint(1) DEFAULT 0,
  `facebook_link` varchar(255) DEFAULT NULL,
  `enable_facebook` tinyint(1) DEFAULT 0,
  `instagram_link` varchar(255) DEFAULT NULL,
  `enable_instagram` tinyint(1) DEFAULT 0,
  `youtube_link` varchar(255) DEFAULT NULL,
  `enable_youtube` tinyint(1) DEFAULT 0,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `enable_linkedin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `office_address`, `contact_number1`, `contact_number2`, `email`, `twitter_link`, `enable_twitter`, `facebook_link`, `enable_facebook`, `instagram_link`, `enable_instagram`, `youtube_link`, `enable_youtube`, `linkedin_link`, `enable_linkedin`, `created_at`, `updated_at`) VALUES
(1, '91 University Place 1, Irvington, NJ 07111, United States of America', '+1 (186) 227-07', '', 'tkcconsult5@gmail.com', '', 0, '', 0, '', 0, '', 0, '', 0, '2024-11-23 16:08:51', '2024-11-25 16:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(4, 'index.php', '1205.aakash@gmail.com', 'wadwda', 'awdawdawd', '2024-11-23 17:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `flags` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_banner_slider`
--

CREATE TABLE `home_page_banner_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page_banner_slider`
--

INSERT INTO `home_page_banner_slider` (`id`, `name`, `dest`, `status`, `created_at`) VALUES
(2, 'Screenshot (4).png', 'uploads/home/slider/6745bf50a2e346.92410493.png', 0, '2024-11-26 12:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_details`
--

CREATE TABLE `home_page_details` (
  `id` int(11) NOT NULL,
  `banner_text` text NOT NULL,
  `btn_name` varchar(100) NOT NULL,
  `btn_url` varchar(100) NOT NULL,
  `enable_btn` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page_details`
--

INSERT INTO `home_page_details` (`id`, `banner_text`, `btn_name`, `btn_url`, `enable_btn`, `status`, `created_at`) VALUES
(6, 'Let’s Make your stay unforgettable', 'Book Now', 'http://localhost/tkc/services.php', 1, 0, '2024-11-25 10:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dest` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `name`, `dest`, `status`, `created_at`) VALUES
(6, 'owner.jpeg', 'uploads/logo/674200282601f9.53483760.jpeg', 1, '2024-11-23 16:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `url`, `status`) VALUES
(1, 'Home', 'home-page.php', 1),
(2, 'About Us', 'about-us-page.php', 1),
(3, 'Services', 'service-page.php', 1),
(4, 'Our Villas', 'our-villa-page.php', 1),
(5, 'Gallery', 'gallery-page.php', 1),
(6, 'Blog', 'blog-page.php', 1),
(7, 'Contact', 'contact-page.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `company_name`, `country`, `address`, `phone`, `email`, `twitter_link`, `instagram_link`, `facebook_link`, `linkedin_link`) VALUES
(1, 'Deepak Sharma', 'apex', 'india', 'noida', '85959 63585', 'deepak@gmail.com', 'https://www.instagram.com/accounts/login/?hl=en', 'https://www.instagram.com/accounts/login/?hl=en', 'https://www.instagram.com/accounts/login/?hl=en', '');

-- --------------------------------------------------------

--
-- Table structure for table `villas`
--

CREATE TABLE `villas` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` longtext NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villas`
--

INSERT INTO `villas` (`id`, `name`, `image_url`, `description`, `status`, `created_at`) VALUES
(1, 'TKC Homes', '[\"uploads/villa/674479d7f2e6c9.70282231.jpg\",\"uploads/villa/674479d7f311f8.78417715.jpg\",\"uploads/villa/674479d7f33e89.06973500.jpg\",\"uploads/villa/674479d80135f4.44365250.jpg\",\"uploads/villa/674479d8016d76.27974381.jpg\",\"uploads/villa/674479d801a324.48676474.jpg\",\"uploads/villa/674479d801f843.42235674.jpg\",\"uploads/villa/674479d80222e2.77526746.jpg\",\"uploads/villa/674479d8024ed1.01808661.jpg\",\"uploads/villa/674479d8028b08.16577495.jpg\",\"uploads/villa/674479d802ac71.98629731.jpg\",\"uploads/villa/674479d802cc74.88198486.jpg\",\"uploads/villa/674479d802e921.44604251.jpg\",\"uploads/villa/674479d8030807.86508154.jpg\",\"uploads/villa/674479d8032b13.10536687.jpg\",\"uploads/villa/674479d80347c3.78581947.jpg\",\"uploads/villa/674479d8036701.11922094.jpg\",\"uploads/villa/674479d8038d33.56575229.jpg\",\"uploads/villa/674479d803aa83.61657174.jpg\",\"uploads/villa/674479d803cb44.65256436.jpg\"]', '<h2 class=\"mb-4\">TKC Homes</h2>\n<p>TKC Homes offers accommodations in Irvington, 3.3 miles from Prudential Center and 3.4 miles from New Jersey Performing Arts Center. The property is located within a short distance of local attractions, including:</p>\n\n<ul>\n    <li>MetLife Stadium – 12 miles</li>\n    <li>Statue of Liberty – 13 miles</li>\n    <li>Newark Liberty International Airport – 5.6 miles</li>\n</ul>\n\n<h4>Amenities:</h4>\n<ul class=\"\">\n    <li class=\"me-3\">Free Wifi</li>\n    <li class=\"me-3\">Private Parking</li>\n    <li class=\"me-3\">Non-smoking rooms</li>\n    <li class=\"me-3\">Family rooms</li>\n    <li class=\"me-3\">Tea/Coffee Maker in All Rooms</li>\n</ul>\n\n<h4>Accommodation Features:</h4>\n<p>The guest house features well-equipped rooms that include:</p>\n<ul>\n    <li>A seating area</li>\n    <li>A dining area</li>\n    <li>A fully equipped kitchen with an oven, microwave, fridge, and stovetop</li>\n    <li>Kitchenware and a kettle</li>\n    <li>Air conditioning</li>\n    <li>Flat-screen TV</li>\n</ul>\n\n<p>Guests can also relax in the shared lounge area.</p>\n\n<p><strong>Couples\' Rating:</strong> Couples particularly like the location, with a rating of 8.9 for a two-person trip.</p>\n', 1, '2024-11-25 13:21:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page_details`
--
ALTER TABLE `about_page_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flags` (`flags`);

--
-- Indexes for table `home_page_banner_slider`
--
ALTER TABLE `home_page_banner_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_details`
--
ALTER TABLE `home_page_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villas`
--
ALTER TABLE `villas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page_details`
--
ALTER TABLE `about_page_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page_banner_slider`
--
ALTER TABLE `home_page_banner_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_page_details`
--
ALTER TABLE `home_page_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villas`
--
ALTER TABLE `villas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`flags`) REFERENCES `flags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
