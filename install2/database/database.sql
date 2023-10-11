-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 10:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easydownload`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `phone`, `photo`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'admin@gmail.com', '01976814812', '1636439198163117815416172094771577767645team.png', '$2y$10$woBi3Dw6C/p/2zsVEXaG4OJr5eNFS4ABjzwk.E.7h49dR0S7ScXFC', 1, NULL, NULL, '2021-11-09 13:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `is_default`, `language`, `file`, `name`, `rtl`, `created_at`, `updated_at`) VALUES
(1, 1, 'En', '1603880510hWH6gk7S.json', '1603880510hWH6gk7S', 0, NULL, NULL),
(12, 0, 'Arab', '1646644020Dzghc7Te.json', '1646644020Dzghc7Te', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_conversations`
--

CREATE TABLE `admin_user_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_messages`
--

CREATE TABLE `admin_user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attributable_id` int(11) DEFAULT NULL,
  `attributable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_status` tinyint(4) NOT NULL DEFAULT 1,
  `details_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `author_badges`
--

CREATE TABLE `author_badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_badges`
--

INSERT INTO `author_badges` (`id`, `name`, `days`, `icon`, `status`, `created_at`, `updated_at`, `time`) VALUES
(1, 'Power', 0, '16364342671st.svg', 1, NULL, NULL, 1),
(2, 'Milestone', 0, '16364343342year.svg', 1, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `author_levels`
--

CREATE TABLE `author_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_levels`
--

INSERT INTO `author_levels` (`id`, `name`, `rate`, `amount`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Golden', 5, 1000, '1636434118golden.svg', 1, NULL, NULL),
(2, 'Elite', 10, 5000, '1636434175gold-medal.svg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `details`, `photo`, `source`, `views`, `meta_tag`, `meta_description`, `tags`, `created_at`, `updated_at`) VALUES
(1, 4, '40 best web design blogs', '40-best-web-design-blogs', 'Web design is a largely creative role. And working in any creative role can be very rewarding, but only if you’re constantly inspired. How many creatives have you met that love hitting a brick wall when given a new client brief or design problem? Probably none.\r\n\r\nThat’s why it pays to follow the best web design blogs on the internet. They help you stay current on the latest design trends and provide you with a regular source of inspiration.', '1638446020rsz_pexels-photo-3760368.jpg', 'https://www.justinmind.com/blog/web-design-blogs/', 3, NULL, NULL, NULL, '2021-11-09 13:16:48', '2021-12-02 05:53:40'),
(2, 1, 'How to Start a WordPress Blog', 'how-to-start-a-wordpress-blog', 'Do you want to start a WordPress blog the right way? We know that starting a blog can be a terrifying thought specially when you are not geeky. Guess what – you are not alone. Having helped over 400,000+ users create a blog, we have decided to create the most comprehensive guide on how to start a WordPress blog without any technical knowledge.', '1638446032rsz_pexels-photo-4185957.jpg', 'https://www.wpbeginner.com/start-a-wordpress-blog/', 4, NULL, NULL, NULL, '2021-11-09 13:13:30', '2021-12-02 05:53:52'),
(4, 2, 'How to learn JavaScript', 'how-to-learn-javascript', 'JavaScript is a free scripting language that works on client-side as well as server-side. It is text-based and works along-side HTML and CSS to enhance code functionality and add interactive elements. In short, JS can bring life to otherwise boring and static web pages. JS is interpreted, which means the code need not be compiled. For huge projects that use a lot of interactive content, separate JavaScript files with the extension .js are created. However, JS can also be embedded in HTML code using <script> tag. Some common use-cases of JS are interactive maps, live news updates, form validations, creating landing pages, etc.', '16383494851636449768graphic-design-geometric-wallpaper_52683-34399.jpg', 'https://hackr.io/blog/how-to-learn-javascript', 3, NULL, NULL, NULL, '2021-11-09 13:18:25', '2021-11-09 20:53:22'),
(5, 3, '11 Best PHP Blog Scripts', '11-best-php-blog-scripts-and-blogging-platforms', 'I\'m excited to be taking you through this long awaited tutorial, finally. I\'ll show you how to build a complete blog application from scratch using PHP and MySQL database. A blog as you know it is an application where some users (Admin users) can create, edit, update and publish articles to make them available in the public to read and maybe comment on. Users and the public can browse through a catalog of these articles and click to anyone to read more about the article and comment on them.', '1636449905pexels-photo-196644.jpeg', 'https://codewithawa.com/posts/how-to-create-a-blog-in-php-and-mysql-database', 3, NULL, NULL, NULL, '2021-11-09 13:05:54', '2022-03-02 02:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog__categories`
--

CREATE TABLE `blog__categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog__categories`
--

INSERT INTO `blog__categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `colors`) VALUES
(1, 'Wordpress', 'Wordpress', NULL, NULL, '#0b7551'),
(2, 'Javascript', 'Javascript', NULL, NULL, '#b0350c'),
(3, 'PHP Script', 'PHP-Script', NULL, NULL, '#3b39d0'),
(4, 'Design', 'Design', NULL, NULL, '#f4c33e');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_buyer_fee` decimal(11,2) DEFAULT NULL,
  `extended_buyer_fee` decimal(11,2) DEFAULT NULL,
  `demo_url_status` tinyint(4) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `regular_buyer_fee`, `extended_buyer_fee`, `demo_url_status`, `photo`, `status`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'PHP Scripts', 'php-scripts', '5.00', '5.00', 1, '1636430661download.png', 1, 1, '2021-11-09 11:04:21', '2021-11-09 11:04:31'),
(3, 'JavaScripts', 'java-scripts', '5.00', '5.00', 1, '1636431063download(1).png', 1, 1, '2021-11-09 11:11:03', '2021-11-09 11:11:39'),
(6, 'WordPress', 'wordpress', '5.00', '5.00', 1, '163643123361091cf26a8181627987186.png', 1, 1, '2021-11-09 11:13:53', '2021-11-09 11:14:17'),
(7, 'NET Core', 'net-core', '5.00', '5.00', 1, '1636433444NET_Core_Logo.svg.png', 1, 1, '2021-11-09 11:50:44', '2021-11-09 12:16:46'),
(8, 'HTML5', 'html', '5.00', '5.00', 1, '1636431349logo-2582748_640.png', 1, 1, '2021-11-09 11:15:49', '2021-11-09 11:18:13'),
(10, 'CSS3', 'css3', '5.00', '5.00', 1, '1636446032logo-2582747_1280.png', 1, 0, '2021-11-09 15:20:32', '2021-11-09 15:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `subcategory_id`, `name`, `slug`, `created_at`, `updated_at`, `category_id`) VALUES
(3, 3, 'eCommerce', 'ecommerce', '2021-12-06 22:37:44', '2021-12-06 22:37:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `price` double NOT NULL,
  `times` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `price`, `times`, `used`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'proco', 1, 5, NULL, 0, 1, '2021-11-29', '2021-12-18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `value`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 1, 1, NULL, NULL),
(2, 'INR', '₹', 74.27, 0, NULL, NULL),
(5, 'BRL', 'R$', 5.61, 0, NULL, NULL),
(6, 'NGN', '₦', 409.74, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderedItem_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seller` tinyint(4) NOT NULL DEFAULT 0,
  `is_buyer` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disputes`
--

INSERT INTO `disputes` (`id`, `orderedItem_id`, `user_id`, `text`, `is_seller`, `is_buyer`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'don\'t want', 0, 1, '2021-12-07 05:47:46', '2021-12-07 05:47:46'),
(2, 19, 1, 'gduy', 0, 1, '2022-03-02 04:41:26', '2022-03-02 04:41:26'),
(3, 19, 2, 'no u can not', 1, 0, '2022-03-02 04:43:07', '2022-03-02 04:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'new_purchase', 'Successfully Purchased', '<p>Hello<b> {customer_name}</b>,</p><p><br>Your Order Number is <b>{order_number}</b><br>You have purchased items successfully</p><p>We have attached an invoice in this mail.</p><p>Please check it.</p><p><br></p><p>Thank you.</p>', 1, '2021-08-14 06:48:00', '2021-08-14 06:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Why are marketplaces growing?', 'Why are marketplaces growing?\r\nAs Covid continues to move more shoppers toward online purchases, and as new security features make filling the top of the funnel trickier for merchants, it\'s not surprising brands are becoming more involved with online marketplaces.', 0, NULL, NULL),
(4, 'Why is the digital marketplace important?', 'Why is the digital marketplace important?\r\nDigital marketplaces help businesses sell their products, grow, and be profitable. Operators of digital marketplaces have streamlined the process of selling and servicing, so it\'s seamless and painless for everyone involved.', 0, NULL, NULL),
(5, 'How does digital marketplace work?', 'A digital marketplace is a platform creating a venue for both buyers and sellers to transact over a product or a service.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1-text, 2-select, 3-checkbox, 5-radio',
  `label` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `category_id`, `type`, `label`, `name`, `placeholder`, `note`, `required`, `created_at`, `updated_at`) VALUES
(10, 2, 3, 'Compatible Browser', 'compatible_browser', NULL, 'tyweryer', 0, '2021-07-17 04:39:37', '2021-07-17 04:39:37'),
(11, 2, 5, 'High Resolution', 'high_resolution', NULL, 'gtrt', 0, '2021-07-17 04:41:15', '2021-07-17 04:41:15'),
(12, 2, 3, 'FIles Included', 'files_included', NULL, NULL, 0, '2021-07-17 04:44:11', '2021-07-17 04:44:11'),
(13, 2, 3, 'Software Framework', 'software_framework', NULL, NULL, 0, '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(15, 1, 5, 'Gutenburg Optimize', 'gutenburg_optimize', NULL, NULL, 0, '2021-09-06 06:50:21', '2021-09-06 06:50:21'),
(16, 1, 5, 'High Resoulation', 'high_resoulation', NULL, NULL, 0, '2021-09-06 06:51:53', '2021-09-06 06:51:53'),
(17, 1, 3, 'Compatible Browser', 'compatible_browser', NULL, NULL, 0, '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(18, 1, 3, 'Compatible With', 'compatible_with', NULL, NULL, 0, '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(19, 1, 3, 'File Included', 'file_included', NULL, NULL, 0, '2021-09-06 07:00:52', '2021-09-06 07:00:52'),
(22, 3, 5, 'High Resoulation', 'high_resoulation', NULL, NULL, 0, '2021-09-06 07:11:44', '2021-09-06 07:11:44'),
(23, 3, 3, 'Compatible Browser', 'compatible_browser', NULL, NULL, 0, '2021-09-06 07:12:54', '2021-09-06 07:12:54'),
(24, 3, 3, 'Software Version', 'software_version', NULL, NULL, 0, '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(26, 4, 5, 'High Resoulation', 'high_resoulation', NULL, NULL, 0, '2021-09-06 07:38:36', '2021-09-06 07:38:36'),
(27, 4, 3, 'Compatible Browser', 'compatible_browser', NULL, NULL, 0, '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(28, 4, 3, 'File Included', 'file_included', NULL, NULL, 0, '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(29, 4, 3, 'Software Version', 'software_version', NULL, NULL, 0, '2021-09-06 07:41:35', '2021-09-06 07:41:35'),
(30, 6, 5, 'Gutenburg Optimize', 'gutenburg_optimize', NULL, NULL, 0, '2021-09-19 05:28:04', '2021-09-19 05:28:04'),
(31, 6, 5, 'High Resoulation', 'high_resoulation', NULL, NULL, 0, '2021-09-19 05:28:46', '2021-09-19 05:28:46'),
(32, 6, 3, 'Compatible Browser', 'compatible_browser', NULL, NULL, 0, '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(33, 6, 5, 'Compatible With', 'compatible_with', NULL, NULL, 0, '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(34, 6, 3, 'Compatible With (Optional)', 'compatible_with_optional', NULL, NULL, 0, '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(35, 6, 3, 'Files Included', 'files_included', NULL, NULL, 0, '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(36, 7, 5, 'High Resoulation', 'high_resoulation', NULL, NULL, 0, '2021-09-19 05:49:41', '2021-09-19 05:49:41'),
(37, 7, 3, 'Compatible Browser', 'compatible_browser', NULL, NULL, 0, '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(38, 7, 3, 'Files Included', 'files_included', NULL, NULL, 0, '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(39, 7, 3, 'Software Version', 'software_version', NULL, NULL, 0, '2021-09-19 05:54:41', '2021-09-19 05:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` tinyint(4) NOT NULL,
  `follower_id` tinyint(4) NOT NULL,
  `following_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `font_family`, `font_value`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Rubik', 'Rubik', 1, '2021-09-07 22:34:28', '2021-11-07 15:54:13'),
(2, 'Roboto', 'Roboto', 0, '2021-09-07 22:35:10', '2021-11-07 15:54:13'),
(3, 'New Tegomin', 'New+Tegomin', 0, '2021-09-07 22:35:23', '2021-11-07 15:54:13'),
(5, 'Open Sans', 'Open+Sans', 0, '2021-09-07 22:44:49', '2021-11-07 15:54:13'),
(7, 'sanssarif', 'sanssarif', 0, '2021-09-12 02:47:49', '2021-11-07 15:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(191) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loader` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_loader` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_talkto` tinyint(1) NOT NULL DEFAULT 1,
  `talkto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_language` tinyint(1) NOT NULL DEFAULT 1,
  `is_loader` tinyint(1) NOT NULL DEFAULT 1,
  `map_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disqus` tinyint(1) NOT NULL DEFAULT 0,
  `disqus` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_contact` tinyint(1) NOT NULL DEFAULT 0,
  `currency_format` tinyint(1) NOT NULL DEFAULT 0,
  `withdraw_fee` double NOT NULL DEFAULT 0,
  `withdraw_charge` double NOT NULL DEFAULT 0,
  `refund_time_limit` int(11) NOT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `is_currency` tinyint(1) NOT NULL DEFAULT 1,
  `is_affilate` tinyint(1) NOT NULL DEFAULT 1,
  `affilate_charge` int(100) NOT NULL DEFAULT 0,
  `affilate_banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_commission` double NOT NULL DEFAULT 0,
  `is_admin_loader` tinyint(1) NOT NULL DEFAULT 0,
  `is_verification_email` tinyint(1) NOT NULL DEFAULT 0,
  `is_capcha` tinyint(1) NOT NULL DEFAULT 0,
  `is_cookie` tinyint(5) NOT NULL DEFAULT 0,
  `error_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popup` tinyint(1) NOT NULL DEFAULT 0,
  `popup_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_time` int(191) NOT NULL DEFAULT 0,
  `invoice_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_secure` tinyint(1) NOT NULL DEFAULT 0,
  `footer_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_maintain` tinyint(1) NOT NULL DEFAULT 0,
  `maintain_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcumb_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_id` int(11) NOT NULL DEFAULT 0,
  `preloaded` int(11) NOT NULL DEFAULT 0,
  `mail_driver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deactivated_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_notify_popup` tinyint(1) NOT NULL DEFAULT 0,
  `notify_popup_time` int(191) NOT NULL DEFAULT 0,
  `cert_sign` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cert_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_api_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_youtube_api` tinyint(1) NOT NULL DEFAULT 0,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_duration` int(11) NOT NULL DEFAULT 0,
  `tax` int(11) NOT NULL DEFAULT 0,
  `support_script` double NOT NULL DEFAULT 0,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `captacha_site_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
  `captcha_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
  `captcha_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://www.google.com/recaptcha/api/siteverify'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `logo`, `favicon`, `title`, `header_email`, `header_phone`, `footer`, `copyright`, `colors`, `loader`, `admin_loader`, `is_talkto`, `talkto`, `is_language`, `is_loader`, `map_key`, `is_disqus`, `disqus`, `is_contact`, `currency_format`, `withdraw_fee`, `withdraw_charge`, `refund_time_limit`, `mail_host`, `mail_port`, `mail_user`, `mail_pass`, `from_email`, `from_name`, `is_smtp`, `is_currency`, `is_affilate`, `affilate_charge`, `affilate_banner`, `percentage_commission`, `is_admin_loader`, `is_verification_email`, `is_capcha`, `is_cookie`, `error_banner`, `is_popup`, `popup_background`, `popup_time`, `invoice_logo`, `is_secure`, `footer_logo`, `email_encryption`, `is_maintain`, `maintain_text`, `breadcumb_banner`, `register_id`, `preloaded`, `mail_driver`, `mail_encryption`, `deactivated_text`, `is_notify_popup`, `notify_popup_time`, `cert_sign`, `cert_text`, `youtube_api_key`, `is_youtube_api`, `user_image`, `support_duration`, `tax`, `support_script`, `theme`, `details`, `captacha_site_key`, `captcha_secret_key`, `captcha_url`) VALUES
(1, '16380718371637051459ll.png', '16364344781571567283favicon.png', 'Easy Downloads', 'smtp', '0123 456789', 'Easy Downloads is the Multivendor Digital product marketplace which provides Premium Features to make Online Business. It’s developed for those people who want to start their Digital item marketplace business website.', 'COPYRIGHT © 2021. All Rights Reserved By GeniusOcean.com', '#2980b9', '16364345451636280720158183637715739824491563333857loader.gif', '1636280720158183637715739824491563333857loader.gif', 0, '<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5bc2019c61d0b77092512d03/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>', 1, 1, 'AIzaSyB1GpE4qeoJ__70UZxvX9CTMUTZRZNHcu8', 0, '<div id=\"disqus_thread\">         \r\n    <script>\r\n    /**\r\n    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.\r\n    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/\r\n    /*\r\n    var disqus_config = function () {\r\n    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page\'s canonical URL variable\r\n    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable\r\n    };\r\n    */\r\n    (function() { // DON\'T EDIT BELOW THIS LINE\r\n    var d = document, s = d.createElement(\'script\');\r\n    s.src = \'https://junnun.disqus.com/embed.js\';\r\n    s.setAttribute(\'data-timestamp\', +new Date());\r\n    (d.head || d.body).appendChild(s);\r\n    })();\r\n    </script>\r\n    <noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>\r\n    </div>', 1, 0, 5, 2, 8, 'smtp.gmail.com', '587', '16103080@iubat.edu', 'dogltnmgepuaynfj', '16103080@iubat.edu', 'Digital Market', 1, 1, 1, 8, '15587771131554048228onepiece.jpeg', 5, 1, 1, 0, 1, '16364359001566878455404.png', 1, NULL, 0, '16380718571637051462lll.png', 0, '16380718521637051462lll.png', NULL, 0, '<i><b>UNDER MAINTENANCE</b></i>', '1636434652c8b2f212cf9e453c70683e7329702c34.jpg', 0, 0, 'smtp', 'Tls', '<div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><b style=\"font-size: 4rem;\">We are building your site...</b></div><div style=\"text-align: center;\"><b style=\"font-size: 4rem;\">We\'ll be there in a moment. Thanks!!!</b></div>', 0, 0, '1601963396sign.png', 'This is to certify that {student_name} has successfully completed the {course_title} course in {website_title}.', 'AIzaSyBM9KfqFsOzI7x2gRSLBk9PV-XAPyQDZtY', 1, NULL, 2, 0, 5, 'theme1', 'details-1', '6LcnPoEaAAAAAF6QhKPZ8V4744yiEnr41li3SYDn', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe', 'https://www.google.com/recaptcha/api/siteverify');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_settings`
--

CREATE TABLE `homepage_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_theme_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_theme_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_theme_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_theme_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_theme_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_section_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_section_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `newsletter_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_settings`
--

INSERT INTO `homepage_settings` (`id`, `hero_bg`, `hero_photo`, `hero_title`, `hero_text`, `checkout_theme_title`, `checkout_theme_text`, `featured_theme_title`, `featured_theme_text`, `featured_theme_bg`, `blog_section_title`, `blog_section_text`, `newsletter_title`, `newsletter_text`, `created_at`, `updated_at`, `newsletter_bg`, `newsletter_photo`) VALUES
(1, '#8be0f4', '1636436069banner.png', '57422 WP Themes & Templates', 'A marketplace of Quality And Professional Digital Products', 'Check Out Recent Products', 'Browse Recent Categorized Script with High quality and functionality standard.', 'Featured Products of The Month', 'Explore the Best Products of the Month, Every month there are new freebies ready for you to enjoy on Easy Downloads.', '#f7eade', 'Latest Updates & News', 'Discover ideas, trends and tools to inspire your creative projects with Get the Recent Update and News.', 'Subscribe Now!', 'Get discounts and gifts every week!', NULL, NULL, '#516bb8', '1636436534landing-bg.png');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `attributes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_imagename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_imagename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_screenshots_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extended_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','completed','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_feature` tinyint(4) NOT NULL DEFAULT 0,
  `approval_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outcome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Resubmission` tinyint(4) NOT NULL DEFAULT 0,
  `temp_mainfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_preview_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_screenshot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_status` enum('pending','completed','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_status` tinyint(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `category_id`, `subcategory_id`, `childcategory_id`, `attributes`, `name`, `slug`, `main_filename`, `thumbnail_imagename`, `preview_imagename`, `preview_screenshots_filename`, `description`, `demo_link`, `tags`, `regular_price`, `extended_price`, `sell`, `status`, `is_feature`, `approval_date`, `created_at`, `updated_at`, `outcome`, `Resubmission`, `temp_mainfile`, `temp_thumbnail_image`, `temp_preview_image`, `temp_screenshot`, `temp_status`, `comment`, `temp_comment`, `access_status`) VALUES
(1, 1, 1, NULL, NULL, '{\"gutenburg_optimize\":[\"Yes\"],\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"IE10\",\"Firefox\",\"Opera\",\"Chrome\"],\"compatible_with\":[\"bbPress 2.6.x\",\"bbPress 2.5.x\"],\"file_included\":[\"PHP\",\"HTML\",\"CSS\",\"XML\",\"SQL\"]}', 'GeniusCart APP - Multi-vendor eCommerce', 'geniuscart-app-multi-vendor-ecommerce-h8ditemwff', '618a19a9cd984.zip', '16384446981.jpg', '16384446981.jpg', NULL, 'If you want to run this app then you must purchase the All in ONE single vendor and multivendor store name GeniusCart. You can get complete details of GeniusCart here', 'https://codecanyon.net/user/geniusocean', 'movie script, pixel php', '54', '59', 0, 'completed', 1, '2022-03-21 08:44:08', '2022-03-01 13:48:09', '2022-03-21 02:44:08', 'Provide excellent support with a fast response rate.,,,Patch and fix any bugs or broken content.,,,Help get you setup and installed!', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 1),
(2, 1, 3, NULL, NULL, '{\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"Firefox\",\"Chrome\",\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"IE10\"],\"software_version\":[\"Angular JS\",\"React JS\",\"Node.JS\"]}', 'KingCommerce APP - Multi vendor eCommerce.', 'kingcommerce-app-multi-vendor-ecommerce-dcmitemm9y', '618a1af84ce8a.zip', '16384447662.jpg', '16384447662.jpg', NULL, 'Reward your favourite creators hard work\r\n\r\nThe best platform where content creators meet their audience. Supporters can subscribe and support to their favourite creators and everyone\'s on win-win.\r\n\r\nStart your own website like OnlyFans.com or Patreon.com and grow like mad. It’s like a social network but allows content creators to directly earn MONEY from their FANS for their PREMIUM content.', 'https://dev.geniusocean.net/digitalmarket/admin/products', 'creator\r\npaid content\r\njavascript', '44', '49', 0, 'completed', 1, '2022-03-02 08:52:30', '2022-03-01 13:53:44', '2021-12-02 05:51:40', 'They get a tip from someone,,,They have an invoice processed,,,They have a payment issue,,,They have a comment on a post,,,They’re @mentioned in a post', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0),
(3, 3, 6, NULL, NULL, '{\"gutenburg_optimize\":[\"N/A\"],\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"Firefox\",\"Chrome\"],\"compatible_with\":[\"BuddyPress 6.4.x\"],\"compatible_with_optional\":[\"bbPress 2.3.x\",\"BuddyPress 6.4.x\",\"BuddyPress 6.3.x\",\"BuddyPress 6.2.x\"],\"files_included\":[\"HTML\",\"CSS\",\"PHP\",\"SQL\"]}', 'Booking Genius - Ultimate Travel Agency and Booking system', 'booking-genius-ultimate-travel-agency-and-booking-system-egwitem3qy', '618a25091b915.zip', '16384451513.jpg', '16384451513.jpg', NULL, 'Olima- is Modern Personal Blog HTML5 Template which is perfectly suitable for the travel, lifestyle, food, fashion or photography blogs, and more. This eye catching template is looking gorgeous for its clean and smooth design.\r\n\r\nThis template is easily customizable, fully responsive and supports all modern browser and device.\r\n\r\nBuild your blog website with our awesome Olima – Modern Personal Blog HTML Template!', 'https://codecanyon.net/user/geniusocean', 'portfolio\r\npersonal blog\r\nnews', '54', '64', 3, 'completed', 1, '2022-03-07 09:48:07', '2021-11-09 14:36:41', '2022-03-07 03:48:07', 'Easy To Customize,,,Cross-browser Compatible,,,Font Awesome Icon Font,,,Well Documented,,,And Much More....', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0),
(5, 3, 3, NULL, NULL, '{\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"Firefox\",\"Chrome\",\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"IE10\",\"IE11\"],\"software_version\":[\"Angular JS\",\"JQuery\",\"Node.JS\"]}', 'eCommerce DON - Multitenancy Multi vendor and Single vendor Online Store Platform', 'ecommerce-don-multitenancy-multi-vendor-and-single-vendor-online-store-platform-mggitemglm', '618a2cf808a15.zip', '16384453344.jpg', '16384453344.jpg', NULL, 'eCommerce DON is all in one eCommerce multitenancy platform where anyone can join and create their own single vendor store or multi vendor store within few minute. Everything is dynamic from admin panel. Admin can create unlimited plans for single vendor store and multi Store with different pricing and features. Owners can sell anything like physical product, Digital product, license key or any external affliate products using this saas store. This platform is the most powerful platform to create any types of eCommerce business like Single vendor Store, Multivendor Store, Classified affilate store which can sell everyting like fashion item, electronics item, digital products, Organic products, Jewelerry items, License key etc.', 'https://codecanyon.net/user/geniusocean', 'woocommerce\r\ncart\r\nmart', '34', '44', 6, 'completed', 1, '2022-03-21 08:46:27', '2021-11-09 15:10:32', '2022-03-21 02:46:27', 'Advanced Typography,,,Unlimited Color Scheme,,,Size Guide,,,Optimized for Speed,,,Mobile Optimized', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 1),
(6, 3, 7, NULL, NULL, '{\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"Firefox\",\"Chrome\",\"Opera\"],\"files_included\":[\"HTML\",\"CSS\"],\"software_version\":[\".NET 3.5\",\".NET 3.7\",\".NET 4.0\"]}', 'AffiliatePRO - Affiliate Store CMS with CSV', 'affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm', '618a3192295c1.zip', '16384456645.jpg', '16384456645.jpg', NULL, 'AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.', 'https://codecanyon.net/user/geniusocean', 'business\r\nPHP\r\nConstruction', '42', '46', 7, 'completed', 1, '2021-12-12 10:33:13', '2021-11-09 15:30:10', '2021-12-12 04:33:13', 'Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0),
(8, 2, 7, NULL, NULL, '{\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"IE6\",\"IE7\",\"IE8\",\"IE9\",\"IE10\",\"Firefox\",\"Chrome\"],\"files_included\":[\"Active Server Page ASPX\",\"Visual Basic VB\"],\"software_version\":[\".NET 3.5\",\".NET 3.7\",\".NET 4.0\"]}', 'CarSpace - Car Listing Directory CMS with Subscription System', 'carspace-car-listing-directory-cms-with-subscription-system-alkitemmro', '618a4e44d680b.zip', '163645447316364539561628484970browse-1(1).png', '163645447316364539561628484970browse-1(1).png', NULL, '“CarSpace” is a subscription based classified site for cars. It has 2 panels – Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.', 'https://codecanyon.net/user/geniusocean', 'carspace\r\ncar rent', '26', '34', 20, 'completed', 0, '2022-03-21 08:45:07', '2021-11-09 17:32:36', '2022-03-21 02:45:07', 'Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 1),
(9, 1, 1, 3, NULL, '{\"gutenburg_optimize\":[\"option\"],\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"Firefox\",\"Safari\",\"Opera\"],\"compatible_with\":[\"bbPress 2.6.x\",\"bbPress 2.5.x\",\"bbPress 2.2.x\"],\"file_included\":[\"PHP\",\"HTML\",\"CSS\",\"XML\"]}', 'Glamour - Subscription Based Fashion Model and Actor Directory', 'glamour-subscription-based-fashion-model-and-actor-directory-euaitemswx', '61af01bff02e4.zip', '1638859199featured.jpg', '1638859199featured.jpg', NULL, 'Glamour is a complete solution for any Model Agency or Model directory System. This CMS Includes everything you need to do a Model Agency System or website. It has beautiful photo slider for models which is fully dynamic. This script is fully responsive for any device. Models can register them in this system by paying a monthly subscription system which can be setup from admin panel. PayPal and Stripe are integrated as payment method. Admin can manage complete website without single line of coding knowledge. It has strong SQL injection protection system which will keep away this system from hackers.', 'https://codecanyon.net/user/geniusocean', 'glamour', '55', '60', 0, 'pending', 0, '2021-12-07 00:39:59', '2021-12-07 00:39:59', '2021-12-07 00:39:59', 'They get a tip from someone', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0),
(10, 1, 1, NULL, NULL, '{\"gutenburg_optimize\":[\"option\"],\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"Firefox\",\"Safari\",\"Opera\"],\"compatible_with\":[\"bbPress 2.6.x\",\"bbPress 2.5.x\",\"bbPress 2.2.x\"],\"file_included\":[\"PHP\",\"HTML\",\"CSS\",\"XML\"]}', 'GeniusCart - Single or Multi vendor Ecommerce System with Physical and Digital Product Marketplace', 'geniuscart-single-or-multi-vendor-ecommerce-system-with-physical-and-digital-product-marketplace-ztpitemsu5', '61af028327fa5.zip', '1638859395featured1.jpg', '1638859395featured.jpg', NULL, 'Become successful in eCommerce Industry depends on Entrepreneurs planning, Hard Work, Store Features, Good support and mostly the marketing cost to attract new customers.\r\n\r\nIf you are looking for Single eCommerce store or Multivendor eCommerce Store then GeniusCart is the all in one solution for you. This Software has been developed for the people who wants to create an online store which can sell everything! Regular online store can sell only one type of product such as physical product, Digital Product or License key product. But in GeniusCart you will have the ability to sell everything in one MegaStore or you can create separate Store for each category. So, you can run any types or online store such as Fashion Store, Jewellery Store, Electronic Store, Grocery Store, Ebook Store, Software license key store or all products in a single eCommerce store.', 'https://codecanyon.net/user/geniusocean', 'glamour', '55', '60', 0, 'pending', 0, '2022-03-02 06:49:35', '2021-12-07 00:43:15', '2021-12-07 00:43:15', 'They get a tip from someone', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0),
(11, 1, 1, 3, 3, '{\"gutenburg_optimize\":[\"option\"],\"high_resoulation\":[\"Yes\"],\"compatible_browser\":[\"Firefox\",\"Safari\",\"Opera\"],\"compatible_with\":[\"bbPress 2.6.x\",\"bbPress 2.5.x\",\"bbPress 2.2.x\"],\"file_included\":[\"PHP\",\"HTML\",\"CSS\",\"XML\"]}', 'ModelAgency - Complete Model Agency and Directory System', 'modelagency-complete-model-agency-and-directory-system-igfitemicn', '61af032f88b19.zip', '1638859567featured2.jpg', '1638859567featured2.jpg', NULL, '“ModelAgency” is a complete solution for any Model Agency System. This CMS Includes everything you need to do a Model Agency System or website. It has beautiful photo slider for models which is fully dynamic. This script is fully responsive for any device. Models can register them in thys system by paying a fee which can be setup from admin panel. PayPal and Stripe are integrated as payment method. Admin can manage complete website without single line of coding knowledge. It has strong SQL injection protection system which will keep away this system from hackers.', 'https://codecanyon.net/user/geniusocean', 'glamour', '55', '60', 0, 'pending', 0, '2021-12-07 00:46:07', '2021-12-07 00:46:07', '2021-12-07 00:46:07', 'They get a tip from someone', 0, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `rtl`, `is_default`, `language`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'EN', '1636017050KyjRNauw', '1636017050KyjRNauw.json', NULL, NULL),
(12, 0, 0, 'US', '1646643996UrAvoB1o', '1646643996UrAvoB1o.json', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_28_074406_create_admins_table', 1),
(5, '2021_06_29_053753_create_categories_table', 1),
(6, '2021_06_29_060748_create_currencies_table', 1),
(7, '2021_06_29_070548_create_generalsettings_table', 1),
(8, '2021_06_29_075426_create_email_templates_table', 1),
(9, '2021_06_29_090355_create_attributes_table', 1),
(10, '2021_06_29_090522_create_attribute_options_table', 1),
(11, '2021_06_29_103657_create_roles_table', 1),
(12, '2021_06_30_033858_create_blog__categories_table', 1),
(13, '2021_06_30_040756_create_blogs_table', 1),
(14, '2021_06_30_051536_create_pagesettings_table', 1),
(15, '2021_06_30_053628_create_pages_table', 1),
(16, '2021_06_30_063837_create_subcategories_table', 1),
(17, '2021_06_30_064342_create_childcategories_table', 1),
(18, '2021_06_30_082411_create_faqs_table', 1),
(19, '2021_07_01_054409_create_fields_table', 1),
(20, '2021_07_01_055722_create_options_table', 1),
(21, '2021_07_01_085134_create_socialsettings_table', 2),
(22, '2021_07_01_100411_create_seotools_table', 3),
(23, '2021_07_03_061729_create_payment_gateways_table', 4),
(24, '2021_07_04_034610_create_admin_languages_table', 5),
(25, '2021_07_04_034647_create_languages_table', 5),
(26, '2021_07_04_052257_create_subscribers_table', 6),
(27, '2021_07_03_052906_add_some_fields_to_categories_table', 7),
(28, '2021_07_05_031936_create_coupons_table', 8),
(29, '2021_07_05_064427_create_coupons_table', 9),
(30, '2021_07_07_063008_add_details_to_users_table', 10),
(31, '2021_07_07_081013_create_transactions_table', 11),
(32, '2021_07_07_092121_add_userimage_to_generalsettings_table', 11),
(33, '2021_07_05_050041_create_items_table', 12),
(34, '2021_07_12_044838_create_author_levels_table', 13),
(35, '2021_07_12_064340_create_author_badges_table', 14),
(36, '2021_07_12_070313_add_time_to_author_badges', 15),
(37, '2021_07_15_072534_add_category_id_to_childcategories', 16),
(38, '2021_07_17_055518_create_items_table', 16),
(39, '2021_07_17_093136_add_colors_to_blog__categories_table', 17),
(40, '2021_07_26_040343_add_outcome_to_items_table', 17),
(41, '2021_07_26_094254_create_homepage_settings_table', 18),
(42, '2021_07_27_053050_add_newsletter_bg_to_homepage_settings_table', 19),
(43, '2021_07_27_100730_add_is_author_to_users_table', 20),
(44, '2021_08_01_062004_add_dashboard_to_users_table', 21),
(45, '2021_08_01_063819_add_dashboard_to_users_table', 22),
(46, '2021_08_03_053832_add_newsletter_to_homepage_settings_table', 23),
(47, '2021_08_08_091635_add_duration_to_generalsettings_table', 24),
(48, '2021_08_09_045546_add_script_to_generalsettings_table', 24),
(49, '2021_08_10_092501_create_follows_table', 25),
(50, '2021_08_12_051759_create_orders_table', 26),
(51, '2021_08_12_053101_create_ordered_items_table', 27),
(52, '2021_08_11_091435_add_following_to_follows_table', 28),
(53, '2021_08_16_101411_add_newname_to_users_table', 29),
(54, '2021_08_22_062420_add_totalsell_to_users_table', 30),
(55, '2021_08_22_064554_add_author_to_ordered_items_table', 31),
(56, '2021_08_24_052818_create_withdraws_table', 32),
(58, '2021_08_29_033857_add_refund_to_generalsettings_table', 33),
(59, '2021_08_31_050445_create_ratings_table', 34),
(60, '2021_09_01_044145_add_additional_columns_to_author_levels_table', 35),
(61, '2021_09_02_070222_create_comments_table', 36),
(62, '2021_09_02_070246_create_replies_table', 36),
(63, '2021_09_04_054158_create_wishlists_table', 37),
(64, '2021_09_04_092147_create_subscribes_table', 38),
(65, '2021_09_07_091239_create_partners_table', 39),
(66, '2021_09_07_094919_add_theme_to_generalsettings_table', 40),
(67, '2021_09_08_034701_add_hero_to_homepage_settings_table', 41),
(68, '2021_09_08_033752_create_fonts_table', 42),
(69, '2021_09_08_045709_create_sitemaps_table', 42),
(70, '2021_09_08_063755_add_details_to_generalsettings', 42),
(72, '2021_09_15_085624_create_disputes_table', 43),
(73, '2021_09_19_062334_add_temporary_to_items_table', 44),
(74, '2021_09_20_035257_add_comment_to_items_table', 45),
(75, '2021_10_10_035431_add_slug_to_blogs_table', 46),
(76, '2021_10_18_104402_create_admin_user_conversations_table', 46),
(77, '2021_10_18_104451_create_admin_user_messages_table', 46),
(78, '2021_11_07_110744_create_screenshots_table', 47),
(79, '2021_11_29_060240_create_register_bonuses_table', 47),
(80, '2021_12_02_040351_create_trendings_table', 48),
(81, '2021_12_23_042929_add_captcha_to_generalsettings_table', 49);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `field_id`, `name`, `created_at`, `updated_at`) VALUES
(61, 15, 'option', '2021-07-14 10:13:19', '2021-07-14 10:13:19'),
(74, 10, 'IE6', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(75, 10, 'IE7', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(76, 10, 'IE8', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(77, 10, 'IE9', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(78, 10, 'IE10', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(79, 10, 'IE11', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(80, 10, 'Firefox', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(81, 10, 'Safari', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(82, 10, 'Opera', '2021-07-17 04:40:22', '2021-07-17 04:40:22'),
(86, 11, 'Yes', '2021-07-17 04:41:36', '2021-07-17 04:41:36'),
(87, 11, 'No', '2021-07-17 04:41:36', '2021-07-17 04:41:36'),
(88, 11, 'N/A', '2021-07-17 04:41:36', '2021-07-17 04:41:36'),
(97, 12, 'JavaScript', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(98, 12, 'JavaScript Json', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(99, 12, 'HTML', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(100, 12, 'XML', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(101, 12, 'CSS', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(102, 12, 'PHP', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(103, 12, 'SQL', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(104, 12, 'Layered PHP', '2021-07-17 04:44:44', '2021-07-17 04:44:44'),
(105, 13, 'CakePHP', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(106, 13, 'Codeigniter', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(107, 13, 'Kohana', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(108, 13, 'Laravel', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(109, 13, 'Lithium', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(110, 13, 'Solar', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(111, 13, 'Symphony', '2021-07-17 04:46:57', '2021-07-17 04:46:57'),
(112, 15, 'Yes', '2021-09-06 06:50:21', '2021-09-06 06:50:21'),
(113, 15, 'No', '2021-09-06 06:50:21', '2021-09-06 06:50:21'),
(114, 15, 'N/A', '2021-09-06 06:50:21', '2021-09-06 06:50:21'),
(115, 16, 'Yes', '2021-09-06 06:51:53', '2021-09-06 06:51:53'),
(116, 16, 'No', '2021-09-06 06:51:53', '2021-09-06 06:51:53'),
(117, 16, 'N/A', '2021-09-06 06:51:53', '2021-09-06 06:51:53'),
(118, 17, 'IE6', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(119, 17, 'IE7', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(120, 17, 'IE8', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(121, 17, 'IE9', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(122, 17, 'IE10', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(123, 17, 'Firefox', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(124, 17, 'Safari', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(125, 17, 'Opera', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(126, 17, 'Chrome', '2021-09-06 06:54:52', '2021-09-06 06:54:52'),
(127, 18, 'Aesop Story Engine', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(128, 18, 'bbPress 2.6.x', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(129, 18, 'bbPress 2.5.x', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(130, 18, 'bbPress 2.4.x', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(131, 18, 'bbPress 2.3.x', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(132, 18, 'bbPress 2.2.x', '2021-09-06 06:57:05', '2021-09-06 06:57:05'),
(142, 19, 'PHP', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(143, 19, 'JavaScript JS', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(144, 19, 'JavaScript JSON', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(145, 19, 'HTML', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(146, 19, 'CSS', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(147, 19, 'XML', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(148, 19, 'SQL', '2021-09-06 07:04:52', '2021-09-06 07:04:52'),
(149, 22, 'Yes', '2021-09-06 07:11:44', '2021-09-06 07:11:44'),
(150, 22, 'No', '2021-09-06 07:11:44', '2021-09-06 07:11:44'),
(151, 22, 'N/A', '2021-09-06 07:11:44', '2021-09-06 07:11:44'),
(160, 23, 'Firefox', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(161, 23, 'Chrome', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(162, 23, 'Safari', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(163, 23, 'Opera', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(164, 23, 'Edge', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(165, 23, 'IE6', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(166, 23, 'IE7', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(167, 23, 'IE8', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(168, 23, 'IE9', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(169, 23, 'IE10', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(170, 23, 'IE11', '2021-09-06 07:13:38', '2021-09-06 07:13:38'),
(171, 24, 'Angular JS', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(172, 24, 'React JS', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(173, 24, 'JQuery', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(174, 24, 'MooTools 1.2', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(175, 24, 'MooTools 1.3', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(176, 24, 'MooTools 1.4', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(177, 24, 'MooTools 1.4.5', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(178, 24, 'YUI 2', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(179, 24, 'YUI 3', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(180, 24, 'Node.JS', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(181, 24, 'Other', '2021-09-06 07:15:38', '2021-09-06 07:15:38'),
(182, 26, 'Yes', '2021-09-06 07:38:36', '2021-09-06 07:38:36'),
(183, 26, 'No', '2021-09-06 07:38:36', '2021-09-06 07:38:36'),
(184, 26, 'N/A', '2021-09-06 07:38:36', '2021-09-06 07:38:36'),
(185, 27, 'IE6', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(186, 27, 'IE7', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(187, 27, 'IE8', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(188, 27, 'IE9', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(189, 27, 'IE10', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(190, 27, 'IE11', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(191, 27, 'Safari', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(192, 27, 'Opera', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(193, 27, 'Chrome', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(194, 27, 'Edge', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(195, 27, 'Firefox', '2021-09-06 07:39:47', '2021-09-06 07:39:47'),
(196, 28, 'JavaScript JS', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(197, 28, 'Javascript Json', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(198, 28, 'HTML', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(199, 28, 'XML', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(200, 28, 'CSS', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(201, 28, 'LESS', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(202, 28, 'Sass', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(203, 28, 'SQL', '2021-09-06 07:41:02', '2021-09-06 07:41:02'),
(204, 29, 'CSS2', '2021-09-06 07:41:35', '2021-09-06 07:41:35'),
(205, 29, 'CSS3', '2021-09-06 07:41:35', '2021-09-06 07:41:35'),
(206, 29, 'Other', '2021-09-06 07:41:35', '2021-09-06 07:41:35'),
(207, 30, 'Yes', '2021-09-19 05:28:04', '2021-09-19 05:28:04'),
(208, 30, 'No', '2021-09-19 05:28:04', '2021-09-19 05:28:04'),
(209, 30, 'N/A', '2021-09-19 05:28:04', '2021-09-19 05:28:04'),
(210, 31, 'Yes', '2021-09-19 05:28:46', '2021-09-19 05:28:46'),
(211, 31, 'No', '2021-09-19 05:28:46', '2021-09-19 05:28:46'),
(212, 31, 'N/A', '2021-09-19 05:28:46', '2021-09-19 05:28:46'),
(213, 32, 'IE6', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(214, 32, 'IE7', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(215, 32, 'IE8', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(216, 32, 'IE9', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(217, 32, 'IE10', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(218, 32, 'Firefox', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(219, 32, 'Safari', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(220, 32, 'Opera', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(221, 32, 'Chrome', '2021-09-19 05:31:11', '2021-09-19 05:31:11'),
(222, 33, 'bbPress 2.6.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(223, 33, 'bbPress 2.5.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(224, 33, 'bbPress 2.4.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(225, 33, 'bbPress 2.3.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(226, 33, 'bbPress 2.2.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(227, 33, 'BuddyPress 6.4.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(228, 33, 'BuddyPress 6.3.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(229, 33, 'BuddyPress 6.2.x', '2021-09-19 05:35:38', '2021-09-19 05:35:38'),
(230, 34, 'bbPress 2.6.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(231, 34, 'bbPress 2.5.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(232, 34, 'bbPress 2.4.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(233, 34, 'bbPress 2.3.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(234, 34, 'bbPress 2.2.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(235, 34, 'BuddyPress 6.4.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(236, 34, 'BuddyPress 6.3.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(237, 34, 'BuddyPress 6.2.x', '2021-09-19 05:37:05', '2021-09-19 05:37:05'),
(238, 35, 'JavaScript JS', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(239, 35, 'JavaScript JSON', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(240, 35, 'HTML', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(241, 35, 'CSS', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(242, 35, 'PHP', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(243, 35, 'SQL', '2021-09-19 05:43:27', '2021-09-19 05:43:27'),
(244, 36, 'Yes', '2021-09-19 05:49:41', '2021-09-19 05:49:41'),
(245, 36, 'No', '2021-09-19 05:49:41', '2021-09-19 05:49:41'),
(246, 36, 'N/A', '2021-09-19 05:49:41', '2021-09-19 05:49:41'),
(247, 37, 'IE6', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(248, 37, 'IE7', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(249, 37, 'IE8', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(250, 37, 'IE9', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(251, 37, 'IE10', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(252, 37, 'Firefox', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(253, 37, 'Safari', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(254, 37, 'Chrome', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(255, 37, 'Opera', '2021-09-19 05:50:57', '2021-09-19 05:50:57'),
(256, 38, 'Active Server Control ASCX', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(257, 38, 'Active Server Page ASPX', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(258, 38, 'Visual Basic VB', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(259, 38, 'C# CS', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(260, 38, 'XML', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(261, 38, 'HTML', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(262, 38, 'CSS', '2021-09-19 05:53:10', '2021-09-19 05:53:10'),
(263, 39, '.NET 2.0', '2021-09-19 05:54:41', '2021-09-19 05:54:41'),
(264, 39, '.NET 3.0', '2021-09-19 05:54:41', '2021-09-19 05:54:41'),
(265, 39, '.NET 3.5', '2021-09-19 05:54:41', '2021-09-19 05:54:41'),
(266, 39, '.NET 3.7', '2021-09-19 05:54:41', '2021-09-19 05:54:41'),
(267, 39, '.NET 4.0', '2021-09-19 05:54:41', '2021-09-19 05:54:41'),
(268, 39, '.NET 4.5', '2021-09-19 05:54:41', '2021-09-19 05:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `author_id` tinyint(4) NOT NULL,
  `author_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `included_support` decimal(8,2) DEFAULT NULL,
  `extended_support` decimal(8,2) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `author_profit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `admin_profit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `support_valid_till` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - not sent, 1 - pending, 2 - approve, 3 - reject',
  `refund_seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - new refund which has not been seen yet, 1 - refund which has been seen already',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `order_id`, `author_id`, `author_info`, `invoice_number`, `item_id`, `item_info`, `support`, `license`, `included_support`, `extended_support`, `price`, `total_price`, `author_profit`, `admin_profit`, `support_valid_till`, `refund`, `refund_seen`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-09T11:41:34.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1224.35\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1224.35\"}', '61b56f4668aca', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":10,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-09 17:41:34\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-09T11:41:34.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 03:40:54am', 0, 0, '2022-02-25 21:40:54', '2021-12-11 21:40:54'),
(2, 2, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-09T09:57:23.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"152.95\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"152.95\"}', '61b56fbc8d758', 6, '{\"id\":6,\"user_id\":3,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\",\\\"Opera\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"AffiliatePRO - Affiliate Store CMS with CSV\",\"slug\":\"affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm\",\"main_filename\":\"618a3192295c1.zip\",\"thumbnail_imagename\":\"16384456645.jpg\",\"preview_imagename\":\"16384456645.jpg\",\"preview_screenshots_filename\":null,\"description\":\"AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"business\\r\\nPHP\\r\\nConstruction\",\"regular_price\":\"42\",\"extended_price\":\"46\",\"sell\":2,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-09 15:57:23\",\"created_at\":\"2021-11-09T21:30:10.000000Z\",\"updated_at\":\"2021-12-09T09:57:23.000000Z\",\"outcome\":\"Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 42, '42.00', '35.15', '6.85', '2022-02-12 03:42:52am', 0, 0, '2021-12-11 21:42:52', '2021-12-11 21:42:52'),
(3, 3, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T03:42:52.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"188.10\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"188.10\"}', '61b5701733d37', 5, '{\"id\":5,\"user_id\":3,\"category_id\":3,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"Firefox\\\",\\\"Chrome\\\",\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"IE11\\\"],\\\"software_version\\\":[\\\"Angular JS\\\",\\\"JQuery\\\",\\\"Node.JS\\\"]}\",\"name\":\"eCommerce DON - Multitenancy Multi vendor and Single vendor Online Store Platform\",\"slug\":\"ecommerce-don-multitenancy-multi-vendor-and-single-vendor-online-store-platform-r4bitemw0v\",\"main_filename\":\"618a2cf808a15.zip\",\"thumbnail_imagename\":\"16384453344.jpg\",\"preview_imagename\":\"16384453344.jpg\",\"preview_screenshots_filename\":null,\"description\":\"eCommerce DON is all in one eCommerce multitenancy platform where anyone can join and create their own single vendor store or multi vendor store within few minute. Everything is dynamic from admin panel. Admin can create unlimited plans for single vendor store and multi Store with different pricing and features. Owners can sell anything like physical product, Digital product, license key or any external affliate products using this saas store. This platform is the most powerful platform to create any types of eCommerce business like Single vendor Store, Multivendor Store, Classified affilate store which can sell everyting like fashion item, electronics item, digital products, Organic products, Jewelerry items, License key etc.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"woocommerce\\r\\ncart\\r\\nmart\",\"regular_price\":\"34\",\"extended_price\":\"44\",\"sell\":3,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-07 17:18:35\",\"created_at\":\"2021-11-09T21:10:32.000000Z\",\"updated_at\":\"2021-12-07T11:18:35.000000Z\",\"outcome\":\"Advanced Typography,,,Unlimited Color Scheme,,,Size Guide,,,Optimized for Speed,,,Mobile Optimized\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 34, '34.00', '27.55', '6.45', '2022-02-12 03:44:23am', 0, 0, '2021-12-11 21:44:23', '2021-12-11 21:44:23'),
(4, 4, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T03:44:23.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"215.65\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"215.65\"}', '61b573a1273c8', 5, '{\"id\":5,\"user_id\":3,\"category_id\":3,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"Firefox\\\",\\\"Chrome\\\",\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"IE11\\\"],\\\"software_version\\\":[\\\"Angular JS\\\",\\\"JQuery\\\",\\\"Node.JS\\\"]}\",\"name\":\"eCommerce DON - Multitenancy Multi vendor and Single vendor Online Store Platform\",\"slug\":\"ecommerce-don-multitenancy-multi-vendor-and-single-vendor-online-store-platform-r4bitemw0v\",\"main_filename\":\"618a2cf808a15.zip\",\"thumbnail_imagename\":\"16384453344.jpg\",\"preview_imagename\":\"16384453344.jpg\",\"preview_screenshots_filename\":null,\"description\":\"eCommerce DON is all in one eCommerce multitenancy platform where anyone can join and create their own single vendor store or multi vendor store within few minute. Everything is dynamic from admin panel. Admin can create unlimited plans for single vendor store and multi Store with different pricing and features. Owners can sell anything like physical product, Digital product, license key or any external affliate products using this saas store. This platform is the most powerful platform to create any types of eCommerce business like Single vendor Store, Multivendor Store, Classified affilate store which can sell everyting like fashion item, electronics item, digital products, Organic products, Jewelerry items, License key etc.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"woocommerce\\r\\ncart\\r\\nmart\",\"regular_price\":\"34\",\"extended_price\":\"44\",\"sell\":4,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 09:44:23\",\"created_at\":\"2021-11-09T21:10:32.000000Z\",\"updated_at\":\"2021-12-12T03:44:23.000000Z\",\"outcome\":\"Advanced Typography,,,Unlimited Color Scheme,,,Size Guide,,,Optimized for Speed,,,Mobile Optimized\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 34, '34.00', '27.55', '6.45', '2022-02-12 03:59:29am', 0, 0, '2021-12-11 21:59:29', '2021-12-11 21:59:29'),
(5, 5, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T03:59:29.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"243.20\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"243.20\"}', '61b57445f2378', 3, '{\"id\":3,\"user_id\":3,\"category_id\":6,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"gutenburg_optimize\\\":[\\\"N\\/A\\\"],\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"compatible_with\\\":[\\\"BuddyPress 6.4.x\\\"],\\\"compatible_with_optional\\\":[\\\"bbPress 2.3.x\\\",\\\"BuddyPress 6.4.x\\\",\\\"BuddyPress 6.3.x\\\",\\\"BuddyPress 6.2.x\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\",\\\"PHP\\\",\\\"SQL\\\"]}\",\"name\":\"Booking Genius - Ultimate Travel Agency and Booking system\",\"slug\":\"booking-genius-ultimate-travel-agency-and-booking-system-egwitem3qy\",\"main_filename\":\"618a25091b915.zip\",\"thumbnail_imagename\":\"16384451513.jpg\",\"preview_imagename\":\"16384451513.jpg\",\"preview_screenshots_filename\":null,\"description\":\"Olima- is Modern Personal Blog HTML5 Template which is perfectly suitable for the travel, lifestyle, food, fashion or photography blogs, and more. This eye catching template is looking gorgeous for its clean and smooth design.\\r\\n\\r\\nThis template is easily customizable, fully responsive and supports all modern browser and device.\\r\\n\\r\\nBuild your blog website with our awesome Olima \\u2013 Modern Personal Blog HTML Template!\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"portfolio\\r\\npersonal blog\\r\\nnews\",\"regular_price\":\"54\",\"extended_price\":\"64\",\"sell\":0,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-02 17:39:25\",\"created_at\":\"2021-11-09T20:36:41.000000Z\",\"updated_at\":\"2021-12-02T11:39:25.000000Z\",\"outcome\":\"Easy To Customize,,,Cross-browser Compatible,,,Font Awesome Icon Font,,,Well Documented,,,And Much More....\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 54, '54.00', '46.55', '7.45', '2022-02-12 04:02:13am', 0, 0, '2021-12-11 22:02:13', '2021-12-11 22:02:14'),
(6, 6, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T04:02:14.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"289.75\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"289.75\"}', '61b577991727e', 5, '{\"id\":5,\"user_id\":3,\"category_id\":3,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"Firefox\\\",\\\"Chrome\\\",\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"IE11\\\"],\\\"software_version\\\":[\\\"Angular JS\\\",\\\"JQuery\\\",\\\"Node.JS\\\"]}\",\"name\":\"eCommerce DON - Multitenancy Multi vendor and Single vendor Online Store Platform\",\"slug\":\"ecommerce-don-multitenancy-multi-vendor-and-single-vendor-online-store-platform-r4bitemw0v\",\"main_filename\":\"618a2cf808a15.zip\",\"thumbnail_imagename\":\"16384453344.jpg\",\"preview_imagename\":\"16384453344.jpg\",\"preview_screenshots_filename\":null,\"description\":\"eCommerce DON is all in one eCommerce multitenancy platform where anyone can join and create their own single vendor store or multi vendor store within few minute. Everything is dynamic from admin panel. Admin can create unlimited plans for single vendor store and multi Store with different pricing and features. Owners can sell anything like physical product, Digital product, license key or any external affliate products using this saas store. This platform is the most powerful platform to create any types of eCommerce business like Single vendor Store, Multivendor Store, Classified affilate store which can sell everyting like fashion item, electronics item, digital products, Organic products, Jewelerry items, License key etc.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"woocommerce\\r\\ncart\\r\\nmart\",\"regular_price\":\"34\",\"extended_price\":\"44\",\"sell\":5,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 09:59:29\",\"created_at\":\"2021-11-09T21:10:32.000000Z\",\"updated_at\":\"2021-12-12T03:59:29.000000Z\",\"outcome\":\"Advanced Typography,,,Unlimited Color Scheme,,,Size Guide,,,Optimized for Speed,,,Mobile Optimized\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 34, '34.00', '27.55', '6.45', '2022-02-12 04:16:25am', 0, 0, '2021-12-11 22:16:25', '2021-12-11 22:16:25'),
(7, 8, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T04:16:25.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"317.30\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"317.30\"}', '61b5960e20516', 6, '{\"id\":6,\"user_id\":3,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\",\\\"Opera\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"AffiliatePRO - Affiliate Store CMS with CSV\",\"slug\":\"affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm\",\"main_filename\":\"618a3192295c1.zip\",\"thumbnail_imagename\":\"16384456645.jpg\",\"preview_imagename\":\"16384456645.jpg\",\"preview_screenshots_filename\":null,\"description\":\"AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"business\\r\\nPHP\\r\\nConstruction\",\"regular_price\":\"42\",\"extended_price\":\"46\",\"sell\":3,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 09:42:52\",\"created_at\":\"2021-11-09T21:30:10.000000Z\",\"updated_at\":\"2021-12-12T03:42:52.000000Z\",\"outcome\":\"Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 42, '42.00', '35.15', '6.85', '2022-02-12 06:26:22am', 0, 0, '2021-12-12 00:26:22', '2021-12-12 00:26:22'),
(8, 9, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T03:40:54.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1243.25\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1243.25\"}', '61b596cd1a831', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":11,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 09:40:54\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T03:40:54.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 06:29:33am', 0, 0, '2021-12-12 00:29:33', '2021-12-12 00:29:33'),
(9, 10, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T06:29:33.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1262.15\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1262.15\"}', '61b5b84a4e879', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":12,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 12:29:33\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T06:29:33.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 08:52:26am', 0, 0, '2021-12-12 02:52:26', '2021-12-12 02:52:26'),
(10, 11, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T08:52:26.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1281.05\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1281.05\"}', '61b5bd6973c77', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":13,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 14:52:26\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T08:52:26.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 09:14:17am', 0, 0, '2021-12-12 03:14:17', '2021-12-12 03:14:17'),
(11, 12, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T09:14:17.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1299.95\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1299.95\"}', '61b5c0d6903e6', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":14,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 15:14:17\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T09:14:17.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 09:28:54am', 0, 0, '2021-12-12 03:28:54', '2021-12-12 03:28:54'),
(12, 13, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T09:28:54.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1318.85\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1318.85\"}', '61b5cf16242e7', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":15,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 15:28:54\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T09:28:54.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 10:29:42am', 0, 0, '2021-12-12 04:29:42', '2021-12-12 04:29:42');
INSERT INTO `ordered_items` (`id`, `order_id`, `author_id`, `author_info`, `invoice_number`, `item_id`, `item_info`, `support`, `license`, `included_support`, `extended_support`, `price`, `total_price`, `author_profit`, `admin_profit`, `support_valid_till`, `refund`, `refund_seen`, `created_at`, `updated_at`) VALUES
(13, 14, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T10:29:42.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1337.75\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1337.75\"}', '61b5cf1a5f6f8', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":16,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 16:29:42\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T10:29:42.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 10:29:46am', 0, 0, '2021-12-12 04:29:46', '2021-12-12 04:29:46'),
(14, 15, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T06:26:22.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"352.45\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"352.45\"}', '61b5cf3f9a6db', 6, '{\"id\":6,\"user_id\":3,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\",\\\"Opera\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"AffiliatePRO - Affiliate Store CMS with CSV\",\"slug\":\"affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm\",\"main_filename\":\"618a3192295c1.zip\",\"thumbnail_imagename\":\"16384456645.jpg\",\"preview_imagename\":\"16384456645.jpg\",\"preview_screenshots_filename\":null,\"description\":\"AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"business\\r\\nPHP\\r\\nConstruction\",\"regular_price\":\"42\",\"extended_price\":\"46\",\"sell\":4,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 12:26:22\",\"created_at\":\"2021-11-09T21:30:10.000000Z\",\"updated_at\":\"2021-12-12T06:26:22.000000Z\",\"outcome\":\"Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 42, '42.00', '35.15', '6.85', '2022-02-12 10:30:23am', 0, 0, '2021-12-12 04:30:23', '2021-12-12 04:30:23'),
(15, 16, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T10:30:23.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"387.60\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"387.60\"}', '61b5cf75ec1e6', 6, '{\"id\":6,\"user_id\":3,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\",\\\"Opera\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"AffiliatePRO - Affiliate Store CMS with CSV\",\"slug\":\"affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm\",\"main_filename\":\"618a3192295c1.zip\",\"thumbnail_imagename\":\"16384456645.jpg\",\"preview_imagename\":\"16384456645.jpg\",\"preview_screenshots_filename\":null,\"description\":\"AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"business\\r\\nPHP\\r\\nConstruction\",\"regular_price\":\"42\",\"extended_price\":\"46\",\"sell\":5,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 16:30:23\",\"created_at\":\"2021-11-09T21:30:10.000000Z\",\"updated_at\":\"2021-12-12T10:30:23.000000Z\",\"outcome\":\"Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 42, '42.00', '35.15', '6.85', '2022-02-12 10:31:17am', 0, 0, '2021-12-12 04:31:17', '2021-12-12 04:31:17'),
(16, 17, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T10:31:17.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"422.75\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"422.75\"}', '61b5cfe900795', 6, '{\"id\":6,\"user_id\":3,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\",\\\"Opera\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"AffiliatePRO - Affiliate Store CMS with CSV\",\"slug\":\"affiliatepro-affiliate-store-cms-with-csv-e5vitem4bm\",\"main_filename\":\"618a3192295c1.zip\",\"thumbnail_imagename\":\"16384456645.jpg\",\"preview_imagename\":\"16384456645.jpg\",\"preview_screenshots_filename\":null,\"description\":\"AffiliatePRO is one of the best affilate CMS in envato market. Anyone can start his personal affiliate sotre using this system. If admin wants to make a multivendor affilate store and invite other affiliate marketers then admin can setup it from admin panel or turn off the feature from admin panel and use this as his personal affiliate store. Everything is dynamic and admin can manage everything without single line of coding knowledge. It has clean code and well documented code for future updates by any laravel developer. This system has subscription system so admin can earn more and more from this website. Anyone can register and purchase a subscription plan to upload affilate products. It has CSV feature so thousands of product can be added in a very short time.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"business\\r\\nPHP\\r\\nConstruction\",\"regular_price\":\"42\",\"extended_price\":\"46\",\"sell\":6,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 16:31:17\",\"created_at\":\"2021-11-09T21:30:10.000000Z\",\"updated_at\":\"2021-12-12T10:31:17.000000Z\",\"outcome\":\"Bootstrap 5 & SASS,,,SCSS files included,,,SEO-ready commented HTML5 files\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 42, '42.00', '35.15', '6.85', '2022-02-12 10:33:13am', 0, 0, '2021-12-12 04:33:13', '2021-12-12 04:33:13'),
(17, 18, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T10:29:46.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1356.65\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1356.65\"}', '61b5d26a69a48', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":17,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 16:29:46\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T10:29:46.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 10:43:54am', 0, 0, '2021-12-12 04:43:54', '2021-12-12 04:43:54'),
(18, 19, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T10:43:54.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1375.55\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1375.55\"}', '61b5d4835d95a', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":18,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 16:43:54\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T10:43:54.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-02-12 10:52:51am', 0, 0, '2021-12-12 04:52:51', '2021-12-12 04:52:51'),
(19, 20, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2021-12-12T10:52:51.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1394.45\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1394.45\"}', '621f49b485e4a', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":19,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2021-12-12 16:52:51\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2021-12-12T10:52:51.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-05-02 10:40:52am', 1, 1, '2022-03-02 04:40:52', '2022-03-02 04:43:43'),
(20, 21, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2021-12-12T10:33:13.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"457.90\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"457.90\"}', '6225d4d7940c1', 3, '{\"id\":3,\"user_id\":3,\"category_id\":6,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"gutenburg_optimize\\\":[\\\"N\\/A\\\"],\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"compatible_with\\\":[\\\"BuddyPress 6.4.x\\\"],\\\"compatible_with_optional\\\":[\\\"bbPress 2.3.x\\\",\\\"BuddyPress 6.4.x\\\",\\\"BuddyPress 6.3.x\\\",\\\"BuddyPress 6.2.x\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\",\\\"PHP\\\",\\\"SQL\\\"]}\",\"name\":\"Booking Genius - Ultimate Travel Agency and Booking system\",\"slug\":\"booking-genius-ultimate-travel-agency-and-booking-system-egwitem3qy\",\"main_filename\":\"618a25091b915.zip\",\"thumbnail_imagename\":\"16384451513.jpg\",\"preview_imagename\":\"16384451513.jpg\",\"preview_screenshots_filename\":null,\"description\":\"Olima- is Modern Personal Blog HTML5 Template which is perfectly suitable for the travel, lifestyle, food, fashion or photography blogs, and more. This eye catching template is looking gorgeous for its clean and smooth design.\\r\\n\\r\\nThis template is easily customizable, fully responsive and supports all modern browser and device.\\r\\n\\r\\nBuild your blog website with our awesome Olima \\u2013 Modern Personal Blog HTML Template!\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"portfolio\\r\\npersonal blog\\r\\nnews\",\"regular_price\":\"54\",\"extended_price\":\"64\",\"sell\":1,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2021-12-12 10:02:14\",\"created_at\":\"2021-11-09T20:36:41.000000Z\",\"updated_at\":\"2021-12-12T04:02:14.000000Z\",\"outcome\":\"Easy To Customize,,,Cross-browser Compatible,,,Font Awesome Icon Font,,,Well Documented,,,And Much More....\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 54, '54.00', '46.55', '7.45', '2022-05-07 09:48:07am', 0, 0, '2022-03-07 03:48:07', '2022-03-07 03:48:07'),
(21, 21, 3, '{\"id\":3,\"name\":\"Professional Freelance Designer and Developer\",\"username\":\"User3\",\"email\":\"user3@gmail.com\",\"email_verified_at\":\"2021-10-17T09:12:49.000000Z\",\"created_at\":\"2021-10-17T09:12:39.000000Z\",\"updated_at\":\"2022-03-07T09:48:07.000000Z\",\"photo\":\"1636445246admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"bangladesh\",\"state\":\"uttara\",\"address\":\"comilla\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":1,\"verification_link\":\"90f1df73d7236a866de7762c18095748\",\"f_url\":\"http:\\/\\/localhost\\/projecta\\/digitalmarket\\/user\\/settings\",\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"504.45\",\"is_author\":1,\"dashboard_title\":\"This is Dashboard\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"504.45\"}', '6225d4d79bbd8', 3, '{\"id\":3,\"user_id\":3,\"category_id\":6,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"gutenburg_optimize\\\":[\\\"N\\/A\\\"],\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"compatible_with\\\":[\\\"BuddyPress 6.4.x\\\"],\\\"compatible_with_optional\\\":[\\\"bbPress 2.3.x\\\",\\\"BuddyPress 6.4.x\\\",\\\"BuddyPress 6.3.x\\\",\\\"BuddyPress 6.2.x\\\"],\\\"files_included\\\":[\\\"HTML\\\",\\\"CSS\\\",\\\"PHP\\\",\\\"SQL\\\"]}\",\"name\":\"Booking Genius - Ultimate Travel Agency and Booking system\",\"slug\":\"booking-genius-ultimate-travel-agency-and-booking-system-egwitem3qy\",\"main_filename\":\"618a25091b915.zip\",\"thumbnail_imagename\":\"16384451513.jpg\",\"preview_imagename\":\"16384451513.jpg\",\"preview_screenshots_filename\":null,\"description\":\"Olima- is Modern Personal Blog HTML5 Template which is perfectly suitable for the travel, lifestyle, food, fashion or photography blogs, and more. This eye catching template is looking gorgeous for its clean and smooth design.\\r\\n\\r\\nThis template is easily customizable, fully responsive and supports all modern browser and device.\\r\\n\\r\\nBuild your blog website with our awesome Olima \\u2013 Modern Personal Blog HTML Template!\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"portfolio\\r\\npersonal blog\\r\\nnews\",\"regular_price\":\"54\",\"extended_price\":\"64\",\"sell\":2,\"status\":\"completed\",\"is_feature\":1,\"approval_date\":\"2022-03-07 15:48:07\",\"created_at\":\"2021-11-09T20:36:41.000000Z\",\"updated_at\":\"2022-03-07T09:48:07.000000Z\",\"outcome\":\"Easy To Customize,,,Cross-browser Compatible,,,Font Awesome Icon Font,,,Well Documented,,,And Much More....\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 54, '54.00', '46.55', '7.45', '2022-05-07 09:48:07am', 0, 0, '2022-03-07 03:48:07', '2022-03-07 03:48:07'),
(22, 21, 2, '{\"id\":2,\"name\":\"Welcome to Softtree\",\"username\":\"User2\",\"email\":\"user2@gmail.com\",\"email_verified_at\":\"2021-09-06T05:24:18.000000Z\",\"created_at\":\"2021-09-06T05:23:58.000000Z\",\"updated_at\":\"2022-03-02T10:43:43.000000Z\",\"photo\":\"16364430781630918686admin.jpg\",\"zip\":\"1230\",\"city\":\"comilla\",\"country\":\"Bangladesh\",\"state\":\"uttara\",\"address\":\"uttara\",\"phone\":\"010000000000\",\"fax\":null,\"is_provider\":0,\"status\":0,\"verification_link\":\"b846a51a6ca8c56df8979b22d4c41478\",\"f_url\":null,\"g_url\":null,\"t_url\":null,\"l_url\":null,\"f_check\":0,\"g_check\":0,\"t_check\":0,\"l_check\":0,\"mail_sent\":0,\"current_balance\":0,\"date\":null,\"ban\":0,\"balance\":\"1394.45\",\"is_author\":1,\"dashboard_title\":\"Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.\",\"dashboard_details\":\"Hi!\\r\\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\\r\\n\\r\\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\\r\\n\\r\\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.\",\"dashboard_banner\":\"laravel.jpg\",\"total_sell\":\"1413.35\"}', '6225d4d7a1311', 8, '{\"id\":8,\"user_id\":2,\"category_id\":7,\"subcategory_id\":null,\"childcategory_id\":null,\"attributes\":\"{\\\"high_resoulation\\\":[\\\"Yes\\\"],\\\"compatible_browser\\\":[\\\"IE6\\\",\\\"IE7\\\",\\\"IE8\\\",\\\"IE9\\\",\\\"IE10\\\",\\\"Firefox\\\",\\\"Chrome\\\"],\\\"files_included\\\":[\\\"Active Server Page ASPX\\\",\\\"Visual Basic VB\\\"],\\\"software_version\\\":[\\\".NET 3.5\\\",\\\".NET 3.7\\\",\\\".NET 4.0\\\"]}\",\"name\":\"CarSpace - Car Listing Directory CMS with Subscription System\",\"slug\":\"carspace-car-listing-directory-cms-with-subscription-system-w5litemsiq\",\"main_filename\":\"618a4e44d680b.zip\",\"thumbnail_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_imagename\":\"163645447316364539561628484970browse-1(1).png\",\"preview_screenshots_filename\":null,\"description\":\"\\u201cCarSpace\\u201d is a subscription based classified site for cars. It has 2 panels \\u2013 Admin and seller panel. Here Admin will create some plans and seller have to buy those packages to post ads. Different plans allows sellers to post different numbers of ads. This plan also has an expiration date. If you want to start a car classified site then this is the perfect site to launch your business.\",\"demo_link\":\"https:\\/\\/codecanyon.net\\/user\\/geniusocean\",\"tags\":\"carspace\\r\\ncar rent\",\"regular_price\":\"26\",\"extended_price\":\"34\",\"sell\":19,\"status\":\"completed\",\"is_feature\":0,\"approval_date\":\"2022-03-02 16:43:43\",\"created_at\":\"2021-11-09T23:32:36.000000Z\",\"updated_at\":\"2022-03-02T10:43:43.000000Z\",\"outcome\":\"Easy Installation.,,,100% Dynamic Management System.,,,Bootstrap based fully responsive design for any device.,,,Cross Browser Support.\",\"Resubmission\":0,\"temp_mainfile\":null,\"temp_thumbnail_image\":null,\"temp_preview_image\":null,\"temp_screenshot\":null,\"temp_status\":\"pending\",\"comment\":null,\"temp_comment\":null}', '2 months', 'regular', '0.00', '0.00', 26, '26.00', '18.90', '7.10', '2022-05-07 09:48:07am', 0, 0, '2022-03-07 03:48:07', '2022-03-07 03:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `txnid` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'buyer id',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `txnid`, `order_number`, `user_id`, `method`, `billing_first_name`, `billing_last_name`, `billing_company_name`, `billing_email_address`, `billing_country`, `billing_state`, `billing_zipcode`, `billing_address`, `created_at`, `updated_at`) VALUES
(1, '2692227', '100000000000', 1, 'flutterwave', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-11 21:40:54', '2021-12-11 21:40:54'),
(2, '8JU444278H683794P', '100000000002', 1, 'paypal', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-11 21:42:52', '2021-12-11 21:42:52'),
(4, '6ba878404cb74b7ea187e46374ce96b5', '100000000003', 1, 'instamojo', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-11 21:59:29', '2021-12-11 21:59:29'),
(5, '1244534959', '100000000005', 1, 'marcadopago', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-11 22:02:13', '2021-12-11 22:02:13'),
(6, 'txn_3K5jU4JlIV5dN9n718KQX7ZO', '100000000006', 1, 'stripe', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-11 22:16:25', '2021-12-11 22:16:25'),
(7, '20211212111212800110168453203277874', '100000000007', 1, 'flutterwave', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 00:25:33', '2021-12-12 00:25:33'),
(8, '20211212111212800110168453203277874', '100000000008', 1, 'paytm', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 00:26:22', '2021-12-12 00:26:22'),
(9, '20211212111212800110168240103242622', '100000000009', 1, 'Paytm', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 00:29:33', '2021-12-12 00:29:33'),
(10, '2692648', '100000000010', 1, 'flutterwave', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 02:52:26', '2021-12-12 02:52:26'),
(18, NULL, '100000000011', 1, 'paystack', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 04:43:54', '2021-12-12 04:43:54'),
(19, '741223350', '100000000019', 1, 'paystack', 'This is Dashboard', 'User', NULL, 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2021-12-12 04:52:51', '2021-12-12 04:52:51'),
(20, '27T70678LU171862P', '100000000020', 1, 'paypal', 'This is Dashboard', 'User', 'geniusocean', 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2022-03-02 04:40:52', '2022-03-02 04:40:52'),
(21, '6YT3845991840141Y', '100000000021', 1, 'paypal', 'This is Dashboard', 'User', 'geniusocean', 'user@gmail.com', 'Alias saepe facilis', 'Voluptates accusamus', '89536', 'Fugiat adipisicing r', '2022-03-07 03:48:07', '2022-03-07 03:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `meta_tag`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'about-us', '<h2 style=\"outline: none; line-height: 36px; font-size: 30px; color: rgb(26, 39, 78); font-family: Jost, sans-serif;\"></h2><h2 style=\"\"><b><span style=\"font-family: &quot;Times New Roman&quot;;\">Let\'s Short Story About&nbsp; MediPure&nbsp;</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 1.75rem;\">Pro Clinic.</span></b></h2><h2 style=\"\"><b><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 1.75rem;\"><br></span></b></h2><p style=\"outline: none; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(45, 67, 121); font-family: Muli, sans-serif; font-size: 15px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure undertakes laborious</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(45, 67, 121); font-family: Muli, sans-serif; font-size: 15px;\"><br></p><p style=\"outline: none; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(45, 67, 121); font-family: Muli, sans-serif; font-size: 15px;\"><span style=\"color: rgb(0, 0, 0); font-family: sans-serif; font-size: 1rem;\">&nbsp; &nbsp;<b> &nbsp;1.</b> At vero eos et accusamus et iusto odio dignissimos</span></p><p style=\"outline: none; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(45, 67, 121); font-family: Muli, sans-serif; font-size: 15px;\"><span style=\"color: rgb(0, 0, 0); font-family: sans-serif; font-size: 1rem;\">&nbsp; &nbsp; <b>&nbsp;2.&nbsp;</b></span>Nam libero tempore, cum soluta nobis est eligendi</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(45, 67, 121); font-family: Muli, sans-serif; font-size: 15px;\">&nbsp; &nbsp; <b>&nbsp; 3. </b>At vero eos et accusamus et iusto odio dignissimos</p>', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pagesettings`
--

CREATE TABLE `pagesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesettings`
--

INSERT INTO `pagesettings` (`id`, `contact_email`, `street`, `phone`, `fax`, `email`, `site`, `hero_bg`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'Uttara-10', '+8801000000000', NULL, 'admin@gmail.com', 'https://geniusocean.com/', '#e5cdc8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `photo`, `link`, `created_at`, `updated_at`) VALUES
(1, '163884958561757793c8a101635088275.png', 'https://codecanyon.net/user/geniusocean/portfolio', '2021-11-09 12:50:01', '2021-12-06 21:59:45'),
(3, '16388495386175776e39fa91635088238.png', 'https://codecanyon.net/user/geniusocean/portfolio', '2021-11-09 12:51:22', '2021-12-06 21:58:58'),
(4, '16388495136175771fbe0fc1635088159.png', 'https://codecanyon.net/user/geniusocean/portfolio', '2021-11-09 12:51:52', '2021-12-06 21:58:33'),
(5, '16364372521571567292logo.png', 'https://codecanyon.net/user/geniusocean/portfolio', '2021-11-09 12:54:12', '2021-11-09 12:54:12'),
(6, '16388496366175773e450c11635088190.png', 'Digitalside', '2021-12-06 22:00:36', '2021-12-06 22:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('manual','automatic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `information` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `subtitle`, `title`, `details`, `name`, `type`, `information`, `keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'stripe', 'automatic', '{\"key\":\"pk_test_UnU1Coi1p5qFGwtpjZMRMgJM\",\"secret\":\"sk_test_QQcg3vGsKRPlW6T3dXcNJsor\",\"text\":\"Pay via your Credit Card.\"}', 'stripe', 1, NULL, NULL),
(2, NULL, NULL, NULL, 'Paystack', 'automatic', '{\"key\":\"pk_test_162a56d42131cbb01932ed0d2c48f9cb99d8e8e2\",\"email\":\"junnuns@gmail.com\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', 1, NULL, NULL),
(3, NULL, NULL, NULL, 'Mercadopago', 'automatic', '{\"public_key\":\"TEST-6f72a502-51c8-4e9a-8ca3-cb7fa0addad8\",\"token\":\"TEST-6068652511264159-022306-e78da379f3963916b1c7130ff2906826-529753482\",\"sandbox_check\":1,\"text\":\"Pay Via MercadoPago\"}', 'mercadopago', 1, NULL, NULL),
(4, NULL, NULL, NULL, 'Instamojo', 'automatic', '{\"key\":\"test_172371aa837ae5cad6047dc3052\",\"token\":\"test_4ac5a785e25fc596b67dbc5c267\",\"sandbox_check\":1,\"text\":\"Pay via your Instamojo account.\"}', 'instamojo', 1, '2021-08-18 04:22:52', NULL),
(5, NULL, NULL, NULL, 'Flutter Wave', 'automatic', '{\"public_key\":\"FLWPUBK_TEST-299dc2c8bf4c7f14f7d7f48c32433393-X\",\"secret_key\":\"FLWSECK_TEST-afb1f2a4789002d7c0f2185b830450b7-X\",\"text\":\"Pay via your Flutter Wave account.\"}', 'flutterwave', 1, NULL, NULL),
(6, NULL, NULL, NULL, 'Paytm', 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"sandbox_check\":1,\"text\":\"Pay via your Paytm account.\"}', 'paytm', 1, NULL, NULL),
(15, NULL, NULL, NULL, 'paypal', 'automatic', '{\"client_id\":\"AcWYnysKa_elsQIAnlfsJXokR64Z31CeCbpis9G3msDC-BvgcbAwbacfDfEGSP-9Dp9fZaGgD05pX5Qi\",\"client_secret\":\"EGZXTq6d6vBPq8kysVx8WQA5NpavMpDzOLVOb9u75UfsJ-cFzn6aeBXIMyJW2lN1UZtJg5iDPNL9ocYE\",\"sandbox_check\":1,\"text\":\"Pay via your PayPal account.\"}', 'paypal', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_bonuses`
--

CREATE TABLE `register_bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Registration',
  `bonus` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_bonuses`
--

INSERT INTO `register_bonuses` (`id`, `type`, `bonus`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Registration', 20, 0, '2021-11-29 06:34:23', '2021-11-29 00:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `section`, `created_at`, `updated_at`) VALUES
(3, 'saas demo', 'Manage Blog , Menupage Setting , Social Setting , Fonts , Subscribers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `item_id`, `photo`, `created_at`, `updated_at`) VALUES
(5, 4, '163644495704.jpg', '2021-11-09 15:02:37', '2021-11-09 15:02:37'),
(8, 7, '16364511661628484970browse-1.webp', '2021-11-09 16:46:06', '2021-11-09 16:46:06'),
(9, 8, '16364539561628485021browse-1.webp', '2021-11-09 17:32:36', '2021-11-09 17:32:36'),
(10, 1, '16384446981.jpg', '2021-12-02 05:31:38', '2021-12-02 05:31:38'),
(11, 2, '16384447662.jpg', '2021-12-02 05:32:46', '2021-12-02 05:32:46'),
(12, 3, '16384451513.jpg', '2021-12-02 05:39:11', '2021-12-02 05:39:11'),
(13, 5, '16384453004.jpg', '2021-12-02 05:41:40', '2021-12-02 05:41:40'),
(14, 6, '16384456645.jpg', '2021-12-02 05:47:44', '2021-12-02 05:47:44'),
(15, 9, '1638859199featured.jpg', '2021-12-07 00:39:59', '2021-12-07 00:39:59'),
(16, 10, '1638859395featured1.jpg', '2021-12-07 00:43:15', '2021-12-07 00:43:15'),
(17, 11, '1638859567featured2.jpg', '2021-12-07 00:46:07', '2021-12-07 00:46:07'),
(18, 12, '1645509953611c931952efa.jpg', '2022-02-22 00:05:53', '2022-02-22 00:05:53'),
(19, 13, '1645511825611c931952efa.jpg', '2022-02-22 00:37:05', '2022-02-22 00:37:05'),
(20, 14, '1645596029p7.jpg', '2022-02-23 00:00:29', '2022-02-23 00:00:29'),
(21, 15, '1646646998profile.png', '2022-03-07 03:56:38', '2022-03-07 03:56:38'),
(22, 16, '164664807854.png', '2022-03-07 04:14:38', '2022-03-07 04:14:38'),
(23, 17, '164671666454.png', '2022-03-07 23:17:44', '2022-03-07 23:17:44'),
(24, 18, '1647841033blog1.jpeg', '2022-03-20 23:37:13', '2022-03-20 23:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `seotools`
--

CREATE TABLE `seotools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seotools`
--

INSERT INTO `seotools` (`id`, `google_analytics`, `meta_keys`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitemap_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialsettings`
--

CREATE TABLE `socialsettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_status` tinyint(4) NOT NULL DEFAULT 1,
  `g_status` tinyint(4) NOT NULL DEFAULT 1,
  `t_status` tinyint(4) NOT NULL DEFAULT 1,
  `l_status` tinyint(4) NOT NULL DEFAULT 1,
  `i_status` tinyint(4) NOT NULL DEFAULT 1,
  `f_check` tinyint(4) DEFAULT 0,
  `g_check` tinyint(4) DEFAULT 0,
  `fclient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fclient_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fredirect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gclient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gclient_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gredirect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialsettings`
--

INSERT INTO `socialsettings` (`id`, `facebook`, `gplus`, `twitter`, `linkedin`, `instagram`, `f_status`, `g_status`, `t_status`, `l_status`, `i_status`, `f_check`, `g_check`, `fclient_id`, `fclient_secret`, `fredirect`, `gclient_id`, `gclient_secret`, `gredirect`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://plus.google.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://instagram.com/', 1, 1, 1, 1, 1, 1, 1, '503140663460329', 'f66cd670ec43d14209a2728af26dcc43', 'https://localhost/digitalmarket/easydownload/update/auth/facebook/callback', '904681031719-sh1aolu42k7l93ik0bkcboghbpcfi.apps.googleusercontent.com', 'J1gm6PohXAHFhN1cYdSDf7B8', 'http://localhost/digitalmarket/easydownload/update/auth/google/callback', NULL, '2021-07-01 03:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'laravel', 'laravel', 1, 1, '2021-12-06 22:37:21', '2021-12-06 22:37:21'),
(4, 'eCommerce', 'ecommerce', 1, 1, '2022-02-22 23:50:07', '2022-02-22 23:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', NULL, NULL),
(2, 'pronobsarker16@gmail.com', NULL, NULL),
(3, 'pronob@gmail.com', NULL, NULL),
(4, 'admin@gmail.com', NULL, NULL),
(5, 'userfg@gmail.com', NULL, NULL),
(6, 'user12341@gmail.com', NULL, NULL),
(7, 'showrav@gmail.com', NULL, NULL),
(8, 'user123@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trendings`
--

CREATE TABLE `trendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trendings`
--

INSERT INTO `trendings` (`id`, `name`, `icon`, `day`, `sell`, `status`, `created_at`, `updated_at`) VALUES
(1, 'super', '1638870175trending.svg', 7, 2, 1, '2021-12-02 05:04:43', '2021-12-01 23:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_provider` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `verification_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_check` tinyint(4) NOT NULL DEFAULT 0,
  `g_check` tinyint(4) NOT NULL DEFAULT 0,
  `t_check` tinyint(4) NOT NULL DEFAULT 0,
  `l_check` tinyint(4) NOT NULL DEFAULT 0,
  `mail_sent` tinyint(4) NOT NULL DEFAULT 0,
  `current_balance` double NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `ban` tinyint(4) NOT NULL DEFAULT 0,
  `balance` decimal(11,2) NOT NULL,
  `is_author` tinyint(4) NOT NULL DEFAULT 0,
  `dashboard_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'This is Dashboard',
  `dashboard_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dashboard.jpg',
  `total_sell` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `zip`, `city`, `country`, `state`, `address`, `phone`, `fax`, `is_provider`, `status`, `verification_link`, `f_url`, `g_url`, `t_url`, `l_url`, `f_check`, `g_check`, `t_check`, `l_check`, `mail_sent`, `current_balance`, `date`, `ban`, `balance`, `is_author`, `dashboard_title`, `dashboard_details`, `dashboard_banner`, `total_sell`) VALUES
(1, 'This is Dashboard', 'User', 'user@gmail.com', '2021-09-01 04:39:16', '$2y$10$RHK9H3Cr4O8SdqnQthZoB.ju9/7xNyWbp.9XwZZew5KZT22FOlfta', NULL, '2021-09-05 22:36:16', '2022-03-02 04:43:43', '16364411091557343012img.jpg', '89536', 'Corporis porro ducim', 'Alias saepe facilis', 'Voluptates accusamus', 'Fugiat adipisicing r', '+1 (373) 382-3566', '+1 (793) 582-5463', 0, 0, 'e2c0923bcbbf42023cb027384ae2cb3d', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, '26.00', 1, 'This is Dashboard', 'Hi!\r\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\r\n\r\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\r\n\r\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.', '1636446799laravel.jpg', '0.00'),
(2, 'Welcome to Softtree', 'User2', 'user2@gmail.com', '2021-09-05 23:24:18', '$2y$10$RpRL2sDootkk86g4fuvn9uSzS7u0dvjHahjiSSLVbWiCB5peKDQXK', NULL, '2021-09-05 23:23:58', '2022-03-07 03:48:07', '16364430781630918686admin.jpg', '1230', 'comilla', 'Bangladesh', 'uttara', 'uttara', '010000000000', NULL, 0, 0, 'b846a51a6ca8c56df8979b22d4c41478', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, '1413.35', 1, 'Welcome to Themez Hub - Delivering Hign Quality and Clean Designs.', 'Hi!\r\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\r\n\r\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\r\n\r\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.', 'laravel.jpg', '1432.25'),
(3, 'Professional Freelance Designer and Developer', 'User3', 'user3@gmail.com', '2021-10-17 03:12:49', '$2y$10$YnzYAXpc0FsWZs.NJ57aquoYLD3N1l9ObryNO07bcfHAF.P/gQKaq', NULL, '2021-10-17 03:12:39', '2022-03-07 03:48:07', '1636445246admin.jpg', '1230', 'comilla', 'bangladesh', 'uttara', 'comilla', '010000000000', NULL, 0, 1, '90f1df73d7236a866de7762c18095748', 'http://localhost/projecta/digitalmarket/user/settings', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, '551.00', 1, 'This is Dashboard', 'Hi!\r\nWe are GeniusOcean, expert in any kind of Graphic Design, Web Design and Web Development work. We are working as freelancer since 2011 and Completed more than 400 projects all over the world. We are one of the most loved PHP script seller at codecanyon and we have sold more than $75000 USD and became ELITE AUTHOR here.\r\n\r\nWe are working to produce few quality products for codecanyon. We always believe in quality and our coding is very clean for both frontend and backend.\r\n\r\nWe not only sell products here but also take custom orders for any kind of web and android projects. We also customize our products according to clients needs for extra reliable charge.', 'laravel.jpg', '551.00'),
(21, 'shaon32', 'user4', 'shourav@gmail.com', NULL, '$2y$10$HP7uo9bOSZQx05jJ2ZCkzuI0RgTyC1l027675ArPhSjxUSSN3Eqe2', NULL, '2022-02-23 02:14:15', '2022-02-23 02:14:15', NULL, NULL, NULL, 'Bangladesh', NULL, NULL, '01976814812', NULL, 0, 0, '83d74670f21c65ff5ced5e78b5332a3d', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, '20.00', 0, 'This is Dashboard', 'update your Dashboard Details', 'dashboard.jpg', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','completed','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_badges`
--
ALTER TABLE `author_badges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `author_badges_name_unique` (`name`);

--
-- Indexes for table `author_levels`
--
ALTER TABLE `author_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog__categories`
--
ALTER TABLE `blog__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_settings`
--
ALTER TABLE `homepage_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesettings`
--
ALTER TABLE `pagesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_bonuses`
--
ALTER TABLE `register_bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seotools`
--
ALTER TABLE `seotools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialsettings`
--
ALTER TABLE `socialsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trendings`
--
ALTER TABLE `trendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author_badges`
--
ALTER TABLE `author_badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author_levels`
--
ALTER TABLE `author_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog__categories`
--
ALTER TABLE `blog__categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=692;

--
-- AUTO_INCREMENT for table `homepage_settings`
--
ALTER TABLE `homepage_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagesettings`
--
ALTER TABLE `pagesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_bonuses`
--
ALTER TABLE `register_bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seotools`
--
ALTER TABLE `seotools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socialsettings`
--
ALTER TABLE `socialsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trendings`
--
ALTER TABLE `trendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
