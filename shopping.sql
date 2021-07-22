-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2021 lúc 10:19 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quần áo', 0, 'quan-ao', '2021-06-22 00:34:01', '2021-06-22 00:34:01', NULL),
(2, 'Giày dép', 0, 'giay-dep', '2021-06-22 00:34:55', '2021-06-22 00:34:55', NULL),
(3, 'Quần áo nam', 1, 'quan-ao-nam', '2021-06-22 00:35:08', '2021-06-22 00:35:08', NULL),
(4, 'Giường tủ', 0, 'giuong-tu', '2021-06-22 00:42:37', '2021-06-22 00:42:37', NULL),
(5, 'Quần áo nam mùa đông', 3, 'quan-ao-nam-mua-dong', '2021-06-22 00:43:02', '2021-06-22 00:43:02', NULL),
(6, 'Quần áo nữ', 1, 'quan-ao-nu', '2021-06-22 00:43:28', '2021-06-22 00:43:28', NULL),
(7, 'Giày dép nam', 2, 'giay-dep-nam', '2021-06-22 00:43:55', '2021-06-22 00:43:55', NULL),
(8, 'Giường tủ gia đình', 4, 'giuong-tu-gia-dinh', '2021-06-22 00:44:20', '2021-06-22 02:26:44', NULL),
(10, 'Iphone', 1, 'iphone', '2021-06-22 02:42:26', '2021-06-22 02:42:35', '2021-06-22 02:42:35'),
(11, 'Dien thoai', 0, 'dien-thoai', '2021-06-28 18:47:32', '2021-06-28 18:47:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'Menu 1', 0, NULL, NULL, '', NULL),
(2, 'Menu 2', 0, NULL, NULL, '', NULL),
(3, 'Menu 3', 0, NULL, NULL, '', NULL),
(4, 'Menu 1.1', 1, NULL, NULL, '', NULL),
(5, 'Menu 1.2', 1, NULL, NULL, '', NULL),
(6, 'Menu 1.1.1', 4, NULL, NULL, '', NULL),
(7, 'Menu 1.2.1', 5, NULL, NULL, '', NULL),
(8, 'Menu 2.1', 2, NULL, NULL, '', NULL),
(9, 'Menu 3.1', 3, NULL, NULL, '', NULL),
(10, 'Truong Khong', 1, '2021-06-22 19:50:39', '2021-06-24 19:21:54', '', '2021-06-24 19:21:54'),
(11, 'Menu 3.2', 3, '2021-06-22 20:11:13', '2021-06-24 19:23:51', 'menu-32', '2021-06-24 19:23:51'),
(12, 'Menu 4', 0, '2021-06-23 02:33:00', '2021-06-24 20:21:37', 'menu-4', NULL),
(13, 'Menu 4.1', 12, '2021-06-24 18:41:07', '2021-06-24 18:41:07', 'menu-41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_20_085938_create_categories_table', 1),
(5, '2021_06_22_093326_add_column_deleted_at_table_categories', 2),
(6, '2021_06_23_002940_create_menus_table', 3),
(7, '2021_06_23_030258_add_column_slug_to_menus_table', 4),
(8, '2021_06_25_020906_add_column_soft_delete_to_menus_table', 5),
(9, '2021_06_26_010607_create_products_table', 6),
(10, '2021_06_26_010914_create_product_images_table', 6),
(11, '2021_06_26_011049_create_tags_table', 6),
(12, '2021_06_26_011127_create_product_tags_table', 6),
(13, '2021_06_28_103001_add_column_feature_image_name', 7),
(15, '2021_06_29_004122_add_column_image_name_to_table_product_image', 8),
(16, '2021_07_02_094651_add_column_delete_at_to_products_table', 9),
(17, '2021_07_03_125735_create_sliders_table', 10),
(18, '2021_07_05_095426_add_column_deleted_at_to_sliders_table', 11),
(19, '2021_07_05_100836_create_settings_table', 12),
(20, '2021_07_06_135248_add_column_type_to_settings_table', 13),
(21, '2021_07_09_093602_create_roles_table', 14),
(22, '2021_07_09_093630_create_permissions_table', 14),
(23, '2021_07_09_093900_create_user_role_table', 14),
(24, '2021_07_09_093954_create_permission_role_table', 14),
(26, '2021_07_13_104550_add_column_delete_at_users_table', 15),
(27, '2021_07_14_091059_add_column_parent_id_to_permission_table', 16),
(28, '2021_07_15_090247_add_column_key_permission_table', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'Danh mục sản phẩm', 'Danh mục sản phẩm', NULL, NULL, 0, ''),
(2, 'Danh sách danh mục', 'Danh sách danh mục', NULL, NULL, 1, 'list_category'),
(3, 'Thêm danh mục', 'Thêm danh mục', NULL, NULL, 1, 'add_category'),
(4, 'Sửa danh mục', 'Sửa danh mục', NULL, NULL, 1, 'edit_category'),
(5, 'Xóa danh mục', 'Xóa danh mục', NULL, NULL, 1, 'delete_category'),
(6, 'Menu', 'Menu', NULL, NULL, 0, ''),
(7, 'Danh sách Menu', 'Danh sách Menu', NULL, NULL, 6, 'list_menu'),
(8, 'Thêm Menu', 'Thêm Menu', NULL, NULL, 6, 'add_menu'),
(9, 'Sửa Menu', 'Sửa Menu', NULL, NULL, 6, 'edit_menu'),
(10, 'Xóa Menu', 'Xóa Menu', NULL, NULL, 6, 'delete_menu'),
(11, 'Slider', 'Slider', NULL, NULL, 0, ''),
(12, 'Danh sách Slider', 'Slider', NULL, NULL, 11, 'list_slider'),
(13, 'Thêm Slider', 'Slider', NULL, NULL, 11, 'add_slider'),
(14, 'Sửa Slider', 'Slider', NULL, NULL, 11, 'edit_slider'),
(15, 'Xóa Slider', 'Slider', NULL, NULL, 11, 'delete_slider'),
(16, 'Sản phẩm', 'Sản phẩm', NULL, NULL, 0, ''),
(17, 'Danh sách Sản phẩm', 'Danh sách Sản phẩm', NULL, NULL, 16, 'list_product'),
(18, 'Thêm phẩm', 'Thêm Sản phẩm', NULL, NULL, 16, 'add_product'),
(19, 'Sửa Sản phẩm', 'Sửa Sản phẩm', NULL, NULL, 16, 'edit_product'),
(20, 'Xóa Sản phẩm', 'Xóa Sản phẩm', NULL, NULL, 16, 'delete_product'),
(21, 'Setting', 'Setting', NULL, NULL, 0, ''),
(22, 'Danh sách Setting', 'Danh sách Setting', NULL, NULL, 21, 'list_setting'),
(23, 'Thêm Setting', 'Thêm Setting', NULL, NULL, 21, 'add_setting'),
(24, 'Sửa Setting', 'Sửa Setting', NULL, NULL, 21, 'edit_setting'),
(25, 'Xóa Setting', 'Xóa Setting', NULL, NULL, 21, 'delete_setting'),
(26, 'Nhân viên', 'Nhân viên', NULL, NULL, 0, ''),
(27, 'Danh sách nhân viên', 'Danh sách nhân viên', NULL, NULL, 26, 'list_user'),
(28, 'Thêm nhân viên', 'Thêm nhân viên', NULL, NULL, 26, 'add_user'),
(29, 'Sửa nhân viên', 'Sửa nhân viên', NULL, NULL, 26, 'edit_user'),
(30, 'Xóa nhân viên', 'Xóa nhân viên', NULL, NULL, 26, 'delete_user'),
(31, 'Vai trò', 'Vai trò', NULL, NULL, 0, ''),
(32, 'Danh sách Vai trò', 'Danh sách Vai trò', NULL, NULL, 31, 'list_role'),
(33, 'Thêm Vai trò', 'Thêm Vai trò', NULL, NULL, 31, 'add_role'),
(34, 'Sửa Vai trò', 'Sửa Vai trò', NULL, NULL, 31, 'edit_role'),
(35, 'Xóa Vai trò', 'Xóa Vai trò', NULL, NULL, 31, 'delete_role');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 5, 2, NULL, NULL),
(8, 1, 2, NULL, NULL),
(9, 1, 3, NULL, NULL),
(11, 2, 9, NULL, NULL),
(18, 1, 8, NULL, NULL),
(19, 4, 2, NULL, NULL),
(21, 4, 4, NULL, NULL),
(22, 4, 5, NULL, NULL),
(23, 4, 8, NULL, NULL),
(24, 6, 27, NULL, NULL),
(25, 6, 28, NULL, NULL),
(26, 6, 29, NULL, NULL),
(27, 6, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `feature_image_name`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IPhone 12 pro', '10000000', '/storage/products/1/16GSgc9LpkjnQXnbtbYk.jpg', 'logo1.jpg', '<p>san pham sang trong, danh cho gioio tre</p>', 1, 4, '2021-06-28 03:48:56', '2021-06-28 03:48:56', NULL),
(2, 'Iphone 12 Plus', '12000000', '/storage/products/1/hUfWmlC9Te2YLFwu5buY.jpg', 'logo1.jpg', '<p>ok</p>', 1, 11, '2021-06-28 18:48:05', '2021-06-28 18:48:05', NULL),
(3, 'Iphone 12 Plus', '12000000', '/storage/products/1/3FVZBIPKP7MZ1d7zVfiC.jpg', 'logo1.jpg', '<p>ok</p>', 1, 11, '2021-06-28 18:48:27', '2021-06-28 18:48:27', NULL),
(4, 'Iphone 12 Plus', '12000000', '/storage/products/1/RnxUDYjZtQ4AEDhLSwn0.jpg', 'logo1.jpg', '<p>ok</p>', 1, 11, '2021-06-28 18:48:42', '2021-06-28 18:48:42', NULL),
(5, 'Iphone 9', '900000', '/storage/products/1/F7MNilbobqD0dgrNXjvV.jpg', 'logo1.jpg', '<p>ok phet</p>', 1, 11, '2021-06-29 01:36:33', '2021-06-29 01:36:33', NULL),
(6, 'SamSung', '500000', '/storage/products/1/1ssRjcXTSAW7bSQsD85P.jpg', 'logo1.jpg', '<p>samsung</p>', 1, 11, '2021-06-29 01:42:05', '2021-07-15 02:41:03', '2021-07-15 02:41:03'),
(7, 'sony', '23.123', '/storage/products/1/Mb7EPWWa7uQvKLkMEKp3.jpg', 'logo1.jpg', '<p>this is sony</p>', 1, 11, '2021-06-29 01:56:54', '2021-06-29 01:56:54', NULL),
(8, 'Sony Experia', '232123', '/storage/products/1/PW5SgqwMWnLD2edNuy8b.jpg', 'logo1.jpg', '<p>sony</p>', 1, 11, '2021-06-29 01:58:40', '2021-06-29 01:58:40', NULL),
(9, 'iphone 3', '123123', '/storage/products/1/t5MlhgDvKFfPubg5wBfb.jpg', 'logo1.jpg', '<p>test tag</p>', 1, 11, '2021-06-29 02:17:31', '2021-06-29 02:17:31', NULL),
(10, 'iphone 3', '123123', '/storage/products/1/7yTlfyUVUNsr0NWPRtof.jpg', 'logo1.jpg', '<p>test tag</p>', 1, 11, '2021-06-29 02:18:04', '2021-07-15 02:40:54', '2021-07-15 02:40:54'),
(11, 'iphone 3 test', '1.212', '/storage/products/1/2MFDr4oDjVJqlJRAXKSg.jpg', 'logo1.jpg', '<p>test taag</p>', 1, 11, '2021-06-29 02:19:12', '2021-07-09 00:37:39', '2021-07-09 00:37:39'),
(12, 'iphone 3 test', '1.212', '/storage/products/1/JaYM7COABROP3r9NIFHQ.jpg', 'logo1.jpg', '<p>test taag</p>', 1, 11, '2021-06-29 02:34:29', '2021-07-03 01:53:05', '2021-07-03 01:53:05'),
(13, 'iphone 3 test', '1.212', '/storage/products/1/MzmCtjVWVA8drBRiuCzj.jpg', 'logo1.jpg', '<p>test taag</p>', 1, 11, '2021-06-29 02:34:41', '2021-07-03 01:53:01', '2021-07-03 01:53:01'),
(14, 'iphone 3 test', '1.212', '/storage/products/1/g0c89MX78isJp1HMHMDf.jpg', 'logo1.jpg', '<p>test taag</p>', 1, 11, '2021-06-29 02:34:51', '2021-07-09 00:37:36', '2021-07-09 00:37:36'),
(15, 'iphone 3 test', '1.212', '/storage/products/1/fMdqpXl3rTNUiZIWY13K.jpg', 'logo1.jpg', '<p>test taag</p>', 1, 11, '2021-06-29 02:34:59', '2021-07-02 02:53:53', '2021-07-02 02:53:53'),
(16, 'Iphone', '1.212', '/storage/products/1/OYTGs73UyhHem4tmeobJ.jpg', 'logo1.jpg', '<p>dasdsad</p>', 1, 11, '2021-06-29 02:40:41', '2021-07-02 02:50:18', '2021-07-02 02:50:18'),
(20, 'Giay lao', '123123', '/storage/products/1/ITw8Bhp4mU0zH55glKqM.jpg', 'logo1.jpg', '<p>dấdasd</p>', 1, 6, '2021-07-02 03:37:11', '2021-07-03 01:53:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '/storage/products/1/7kXeyXq45KzN1ajlADAK.jpg', 'logo1.jpg', 5, '2021-06-29 01:36:33', '2021-06-29 01:36:33'),
(2, '/storage/products/1/eMb4eRlnhFdRl8DRwelU.jpg', 'logo1d.jpg', 5, '2021-06-29 01:36:33', '2021-06-29 01:36:33'),
(3, '/storage/products/1/eNA1TCM3mCTgwfSeBc5O.jpg', 'logo1.jpg', 6, '2021-06-29 01:42:05', '2021-06-29 01:42:05'),
(4, '/storage/products/1/QZFqQQUDbaVXrwUkjZgu.jpg', 'logo3.jpg', 6, '2021-06-29 01:42:05', '2021-06-29 01:42:05'),
(5, '/storage/products/1/MglOSulZvxGA315HSVOU.jpg', 'logo1d.jpg', 8, '2021-06-29 01:58:40', '2021-06-29 01:58:40'),
(6, '/storage/products/1/NnqV8NPP9nzHyZZjAYmM.jpg', 'logo3.jpg', 8, '2021-06-29 01:58:40', '2021-06-29 01:58:40'),
(7, '/storage/products/1/M1mZ5aU6kVUK0OmpaJlC.jpg', 'logo3dd.jpg', 8, '2021-06-29 01:58:40', '2021-06-29 01:58:40'),
(8, '/storage/products/1/jjEPoUlE0h4g0xtEbcVs.jpg', 'logo3.jpg', 9, '2021-06-29 02:17:31', '2021-06-29 02:17:31'),
(9, '/storage/products/1/mWkmHpCytyPEKo16yxS7.jpg', 'logo3dd.jpg', 9, '2021-06-29 02:17:31', '2021-06-29 02:17:31'),
(10, '/storage/products/1/sBuvXDH1a9Cdzi3fvoYh.jpg', 'logo3.jpg', 10, '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(11, '/storage/products/1/14TV6jHjOTuH0ydGOClN.jpg', 'logo3dd.jpg', 10, '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(12, '/storage/products/1/hQEPCEaxLridYapUfXax.jpg', 'logo3.jpg', 11, '2021-06-29 02:19:12', '2021-06-29 02:19:12'),
(13, '/storage/products/1/dJxWInRnL7bRGv0wYqke.jpg', 'logo3dd.jpg', 11, '2021-06-29 02:19:12', '2021-06-29 02:19:12'),
(14, '/storage/products/1/xAvlMIfpHL55HStwELqt.jpg', 'logo3.jpg', 12, '2021-06-29 02:34:29', '2021-06-29 02:34:29'),
(15, '/storage/products/1/brgX2Fvsc3648wZwbkV0.jpg', 'logo3dd.jpg', 12, '2021-06-29 02:34:29', '2021-06-29 02:34:29'),
(16, '/storage/products/1/lrUWVX2C4W4czOp26tjI.jpg', 'logo3.jpg', 13, '2021-06-29 02:34:41', '2021-06-29 02:34:41'),
(17, '/storage/products/1/X5OlWXd5wXiHG8g8buND.jpg', 'logo3dd.jpg', 13, '2021-06-29 02:34:41', '2021-06-29 02:34:41'),
(18, '/storage/products/1/so65KOn3JoOIgiU83NJ0.jpg', 'logo3.jpg', 14, '2021-06-29 02:34:51', '2021-06-29 02:34:51'),
(19, '/storage/products/1/KpLv9zXqO0zLoIL68Ci7.jpg', 'logo3dd.jpg', 14, '2021-06-29 02:34:51', '2021-06-29 02:34:51'),
(20, '/storage/products/1/KDPLyWaV8cMvbDABx5qC.jpg', 'logo3.jpg', 15, '2021-06-29 02:34:59', '2021-06-29 02:34:59'),
(21, '/storage/products/1/935xbzvcgnaRTd2iXnPr.jpg', 'logo3dd.jpg', 15, '2021-06-29 02:34:59', '2021-06-29 02:34:59'),
(22, '/storage/products/1/zshaH0RD1lx5w0l8XXyM.jpg', 'logo1.jpg', 16, '2021-06-29 02:40:41', '2021-06-29 02:40:41'),
(23, '/storage/products/1/SHWI1Ha2IsvPeB0YV3AP.png', 'logo1.png', 16, '2021-06-29 02:40:41', '2021-06-29 02:40:41'),
(24, '/storage/products/1/qWcdzB3qXaCfdJ61Mbty.jpg', 'logo1d.jpg', 16, '2021-06-29 02:40:41', '2021-06-29 02:40:41'),
(25, '/storage/products/1/muIeiilVT8xdI1REWaep.jpg', 'logo1.jpg', 17, '2021-06-29 02:40:59', '2021-06-29 02:40:59'),
(26, '/storage/products/1/UohhXxRLiZ6QQsQ8X6Cl.png', 'logo1.png', 17, '2021-06-29 02:40:59', '2021-06-29 02:40:59'),
(27, '/storage/products/1/YkBwbe9CfraObowm9NrZ.jpg', 'logo1d.jpg', 17, '2021-06-29 02:40:59', '2021-06-29 02:40:59'),
(28, '/storage/products/1/p2lRPDg3vw7zWzkdB6UP.jpg', 'logo1.jpg', 18, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(29, '/storage/products/1/mXtGjTEeLeH3ARUmZU5l.png', 'logo1.png', 18, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(30, '/storage/products/1/rS7sXScNUh7un1ggwzkW.jpg', 'logo1d.jpg', 18, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(36, '/storage/products/1/qXhkv2M871Vi3lG73m6F.jpg', 'logo1.jpg', 19, '2021-07-02 01:41:15', '2021-07-02 01:41:15'),
(37, '/storage/products/1/OZXN6D9Q2uqxUrqo3vco.jpg', 'logo1.jpg', 20, '2021-07-02 03:37:11', '2021-07-02 03:37:11'),
(38, '/storage/products/1/xQ8ZNqsObeRnNjOw4lUJ.png', 'logo1.png', 20, '2021-07-02 03:37:11', '2021-07-02 03:37:11'),
(39, '/storage/products/1/6GqW72AIUa4BgYOW8ORR.jpg', 'logo1d.jpg', 20, '2021-07-02 03:37:11', '2021-07-02 03:37:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(2, 10, 2, '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(3, 10, 3, '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(4, 11, 1, '2021-06-29 02:19:12', '2021-06-29 02:19:12'),
(5, 11, 2, '2021-06-29 02:19:12', '2021-06-29 02:19:12'),
(6, 17, 3, NULL, NULL),
(7, 17, 4, NULL, NULL),
(8, 17, 5, NULL, NULL),
(9, 18, 3, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(10, 18, 4, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(11, 18, 5, '2021-06-29 02:41:58', '2021-06-29 02:41:58'),
(12, 19, 3, '2021-06-30 03:21:26', '2021-06-30 03:21:26'),
(14, 19, 7, '2021-07-02 01:14:49', '2021-07-02 01:14:49'),
(15, 19, 8, '2021-07-02 01:45:44', '2021-07-02 01:45:44'),
(16, 20, 9, '2021-07-02 03:37:11', '2021-07-02 03:37:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quan tri he thong', NULL, NULL),
(2, 'guest', 'Quan tri he thong', NULL, NULL),
(3, 'developer', 'Phat trien he thong', NULL, NULL),
(4, 'content', 'Chinh sua noi dung', NULL, '2021-07-22 01:15:31'),
(5, 'them posts', 'them cac bai dang', '2021-07-15 02:37:03', '2021-07-15 02:37:03'),
(6, 'test', 'ed', '2021-07-22 01:18:04', '2021-07-22 01:18:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 5, 1, NULL, NULL),
(4, 5, 3, NULL, NULL),
(5, 5, 4, NULL, NULL),
(21, 13, 1, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`) VALUES
(3, 'youtube_link', 'www.youtube.com', '2021-07-06 06:45:19', '2021-07-06 06:45:19', ''),
(4, 'phone_number1', '1231231231', '2021-07-06 06:58:19', '2021-07-06 06:58:19', 'Text'),
(8, 'bữa trưa', 'ok', '2021-07-12 02:13:12', '2021-07-12 02:13:12', 'Text');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slider 1', 'slider 1', '/storage/sliders/1/2Ir2JxonfpzZRUIuAonQ.jpg', 'i6.jpg', '2021-07-04 02:38:16', '2021-07-09 00:25:44', '2021-07-09 00:25:44'),
(2, 'Iphone', 'Iphone', '/storage/sliders/1/70EkMKw35wxQbuje0eFN.jpg', 'd7.jpg', '2021-07-04 02:42:20', '2021-07-05 01:39:22', NULL),
(3, 'Truong Khong', 'adsasd', '/storage/sliders/1/ygT6jzoWcLvd8c6ChwoK.jpg', 'inov8-trailfly-ultra-g-300-max-2.jpg', '2021-07-04 02:45:57', '2021-07-05 02:55:52', '2021-07-05 02:55:52'),
(5, 'Iphoned', 'dasdsad', '/storage/sliders/1/LmYm3OViEjJMWPnFX7HF.jpg', 'i1.jpg', '2021-07-09 00:36:28', '2021-07-09 00:37:26', '2021-07-09 00:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'iphone', '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(2, 'iphone 3', '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(3, 'iphone 4', '2021-06-29 02:18:04', '2021-06-29 02:18:04'),
(4, 'iphone 5', '2021-06-29 02:40:59', '2021-06-29 02:40:59'),
(5, 'iphone 5 pro', '2021-06-29 02:40:59', '2021-06-29 02:40:59'),
(6, 'opple', '2021-06-30 03:21:26', '2021-06-30 03:21:26'),
(7, 'test', '2021-07-02 01:14:49', '2021-07-02 01:14:49'),
(8, 'dasddas', '2021-07-02 01:45:44', '2021-07-02 01:45:44'),
(9, 'quan ao', '2021-07-02 03:37:11', '2021-07-02 03:37:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'nhatthang', 'nana@gmail.com', NULL, '$2y$10$uRueXNv7.ZHd9b7VStaNCujO6jek3ThuJ.ZTANSE/GRjj49GRpCD2', NULL, '2021-07-12 19:21:47', '2021-07-12 19:21:47', NULL),
(8, 'domdom', 'dom@gmail.com', NULL, '$2y$10$HNm9MK1d5ECi6eiqEjJD7uEJ06hc9swlyQ4naEKNvUD8Wqa1PKgX.', 'J5eCcXD1Kl6BDMFiFCiyO14pTKizkK0vJUDi9CsyyaChf26NBZ1mftsskD1w', '2021-07-12 19:39:29', '2021-07-15 01:04:05', NULL),
(13, 'dinhhop', 'dinhhop172da@gmail.com', NULL, '$2y$10$j0GbwZbQE30PgO9cKcGS8eGr568XPz1o1e7D.QRzqmjnqTTDXykwO', NULL, '2021-07-12 20:04:00', '2021-07-14 01:10:27', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
