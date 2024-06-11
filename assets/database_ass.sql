-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 02:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`) VALUES
(8, 117);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `quantity`) VALUES
(8, 62, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(3, 'Dụng cụ tập luyện', 'assets/uploads/17180326641718029681vp4.webp'),
(4, 'Dụng cụ bảo hộ và thi đấu', 'assets/uploads/17180326351718029661vp3.webp'),
(5, 'Aikido', 'assets/uploads/17180326001718029641vp2.webp'),
(6, 'Võ phục', 'assets/uploads/17180325711718029082vp1.webp'),
(14, 'Judo', 'assets/uploads/17180326871718029701vp5.webp'),
(15, 'Karatedo', 'assets/uploads/17180327041718029716vp6.webp'),
(16, 'MMA, MUAY, BOXING', 'assets/uploads/17180327271718029741vp7.webp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_phone` varchar(250) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `shipping_name` varchar(250) DEFAULT NULL,
  `shipping_email` varchar(250) DEFAULT NULL,
  `shipping_phone` varchar(250) DEFAULT NULL,
  `shipping_address` varchar(250) DEFAULT NULL,
  `status_delivery` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `status_payment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `status_delivery`, `status_payment`, `created_at`, `updated_at`) VALUES
(17, 117, 'Hồ Văn Quang', 'quang@gmail.com', '0338973258', 'Tu hoàng, Nam Từ Liêm, Hà Nội.', NULL, NULL, NULL, NULL, '0', 0, '2024-06-10 17:09:49', '2024-06-10 17:09:49'),
(18, 117, 'Quang', 'quang@gmail.com', '0338973258', 'Quỳnh Minh, Quỳnh Lưu, Nghệ An.', NULL, NULL, NULL, NULL, '0', 0, '2024-06-10 17:10:46', '2024-06-10 17:10:46'),
(19, 120, 'Nguyễn Hoàng', 'HoangBa@gmail.com', '0338973258', 'Quỳnh Bá, Hoàng Mai, Thanh Hóa', NULL, NULL, NULL, NULL, '0', 0, '2024-06-10 17:11:52', '2024-06-10 17:11:52'),
(20, 121, 'Nguyễn An', 'An@gmail.com', '0338973456', 'Vĩnh Nam, An Giang, Việt Nam', NULL, NULL, NULL, NULL, '0', 0, '2024-06-11 02:28:37', '2024-06-11 02:28:37'),
(21, 117, 'Quang', 'quang@gmail.com', '0338973258', 'Ngõ 35/31, Tu hoàng, Nam từ Liêm, hà Nội', NULL, NULL, NULL, NULL, '4', 0, '2024-06-11 02:30:28', '2024-06-11 02:30:28'),
(22, 122, 'Vô Danh', 'DoZanh@gmail.com', '0338256258', 'X1, Quỳnh Thiện, Quỳnh Bá, Nghệ An', NULL, NULL, NULL, NULL, '0', 0, '2024-06-11 02:32:10', '2024-06-11 02:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price_regular` int NOT NULL,
  `price_sale` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price_regular`, `price_sale`) VALUES
(20, 17, 56, 3, 500000, 490000),
(21, 17, 67, 5, 600000, NULL),
(22, 18, 65, 1, 200000, 189000),
(23, 18, 70, 1, 150000, 135000),
(24, 18, 58, 2, 10000, 85000),
(25, 19, 63, 4, 200000, 199000),
(26, 19, 69, 2, 500000, 450000),
(27, 20, 56, 3, 500000, 490000),
(28, 20, 69, 1, 500000, 450000),
(29, 21, 62, 4, 250000, 200000),
(30, 21, 65, 3, 200000, 189000),
(31, 21, 67, 3, 600000, NULL),
(32, 22, 66, 2, 185000, 150000),
(33, 22, 57, 2, 150000, 139000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `price_regular` int NOT NULL,
  `price_sale` int DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `content` text,
  `view` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img_thumbnail`, `price_regular`, `price_sale`, `overview`, `content`, `view`, `created_at`, `updated_at`) VALUES
(56, 3, 'Bao cát da Fairtex HB5 Thái Lan', 'assets/uploads/1718034124upload_30c8cd73de4146389b0ef5174bf92cf0_1024x1024.webp', 500000, 490000, '', 'Màu sắc: Đen.\r\n\r\nKích thước:\r\n\r\nChiều cao: 122cm\r\nĐường kính: 36cm\r\nKhối lượng: 40kg\r\nXuất xứ: Thái Lan.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nBao cát da Fairtex HB5 Thái Lan là sản phẩm chính hãng được Tân Việt nhập từ Thái Lan với chất liệu cao cấp: vỏ bao cát được làm bằng da thật, trong ruột là xốp EVA cao cấp và vả vụn, túi cát để tăng trọng lượng của bao cát.', 0, '2024-06-08 03:08:12', '2024-06-10 08:42:04'),
(57, 4, 'Găng tay Karate thi đấu Tân Việt', 'assets/uploads/1718034021upload_b1c2c412d1c44731845f17d908cc4a6c_1024x1024.webp', 150000, 139000, '', 'Màu sắc: Xanh, Đỏ.\r\n\r\nKích thước: Free size.\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cặp.\r\n\r\nChú ý: Bảo quản sản phẩm nơi khô mát, tránh tiếp xúc trực tiếp với ánh nắng\r\n\r\nGăng tay Karate là sản phẩm thiết yếu cho những vận động viên thi đấu môn võ Karatedo chuyên nghiệp, tạo phong thái chuyên nghiệp trên sàn đấu đồng sản phẩm còn giúp bảo vệ tối đa đôi tay của các võ sĩ Karate.', 0, '2024-06-08 03:08:56', '2024-06-10 08:40:21'),
(58, 4, 'Bảo hộ hạ bộ nam hiệu Black Eagle', 'assets/uploads/1718033954upload_5c638bf11bae4746b10cc20c6cadf6e2_1024x1024.webp', 10000, 85000, '', 'Màu sắc: Trắng.\r\n\r\nKích thước: size S, M, L, XL.\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nChú ý: Bảo quản sản phẩm nơi khô mát, tránh tiếp xúc trực tiếp với ánh nắng\r\n\r\n*Tên gọi khác: Kuki nam BE\r\n\r\nĐi học võ với những bài tập thể chất, bài quyền hay tập luyện với bao cát để nâng cao các kỹ thuật đòn thế. Còn những bài tập đối kháng giúp bạn có thể thực hành các kỹ thuật được học và hiểu được cách vận dụng những đòn thế như thế nào là chính xác và hiệu quả nhất.', 0, '2024-06-08 03:09:36', '2024-06-10 08:39:14'),
(59, 4, 'Băng quấn tay boxing hiệu Black Eagle', 'assets/uploads/1718033872bang_quan_tay_co_gian_be-640x640_1024x1024.webp', 50000, 49000, '', 'Kích thước:\r\n\r\nBản: 4cm.\r\nDài: 300cn, 350cm, 400cm, 450cm, 50cm\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cặp.\r\n\r\nNắm đấm là một “vũ khí” quạn trọng, sử dụng hiệu quả và dường như không thể thiếu đối với bất kỳ môn võ nào. Tuy nhiên, nắm đấm cũng là một bộ phận rất dễ tổn thương bởi bàn tay được cấu tạo từ nhiều xương nhỏ. Chính vì vậy mà trong tập luyện hay cả thi đấu các võ sĩ chuyên nghiệp thường sử dụng băng quấn tay để giảm thiểu chấn thương. ', 0, '2024-06-08 03:10:02', '2024-06-10 08:37:52'),
(61, 5, 'Váy Hakama Aikido hiệu Tân Việt Đỏ xuất khẩu', 'assets/uploads/1718033785upload_75dca492ea2c4f63b43772f5feee6b8c_1024x1024.webp', 300000, 250000, '10', 'Khởi thủy, Hakama được thiết kế dùng để bảo vệ chân của các kị sỹ khỏi các nhánh cây, bụi rậm… gần giống như kiểu quần da của các chàng cao bồi Viễn Tây. Do chất liệu da thuộc khá hiếm ở Nhật Bản nên các loại vải dày và nặng được dùng thay thế. Sau khi tầng lớp samurai (võ sĩ đạo) không còn cưỡi ngựa và trở thành bộ binh, họ vẫn khăng khăng giữ lại trang phục kị sỹ này như một đặc trưng không thể thiếu của tầng lớp mình.', 0, '2024-06-09 09:26:56', '2024-06-10 08:36:25'),
(62, 5, 'Kiếm gỗ Aikido (bokken) Tân Việt (loại đặc biệt)', 'assets/uploads/1718034860upload_ac48d9b6df6b42d796f571b72cc135ff_1024x1024.webp', 250000, 200000, '11111', 'Kiếm Nhật bằng gỗ cho môn võ Aikido của nhãn hàng Tân Việt được sản xuất với thiết kế hơi cong đúng thiết kế kiểu truyền thống của kiếm Nhật với lưỡi vát sâu và sống lưng kiếm dày tròn, vát nhọn về phía đầu, tạo ra sức mạnh cho đòn đánh. Sản phẩm làm bằng chất liệu gỗ cây dẻ, thân trơn, dùng để tập luyện hoặc biểu diễn.', 0, '2024-06-09 10:03:28', '2024-06-10 08:54:20'),
(63, 6, 'Võ phục Vovinam hiệu Tân Việt Đỏ xuất khẩu', 'assets/uploads/1718033520vvn_tvd_1024x1024-768x768.jpg', 200000, 199000, '', '1. Chất lượng đạt tiêu chuẩn thi đấu quốc tế.\r\n2. Chính sách bảo hành - đổi trả. Quyền lợi khách hàng luôn được đảm bảo.\r\n3. Vận chuyển tận nơi trên toàn bộ lãnh thổ Việt Nam.\r\n4. Đa dạng, mẫu mã luôn bắt kịp với sự thay đổi của thị trường.\r\n5. Các sản phẩm cá nhân hóa theo yêu cầu của khách hàng.', 0, '2024-06-09 10:03:50', '2024-06-10 08:32:00'),
(64, 6, 'Võ phục Cổ truyền đen hiệu Tân Việt Đỏ (loại đặc biệt)', 'assets/uploads/1718034893vo_phuc_vct_1024x1024-768x768.webp', 20000, 189000, '', '1. Chất lượng đạt tiêu chuẩn thi đấu quốc tế.\r\n2. Chính sách bảo hành - đổi trả. Quyền lợi khách hàng luôn được đảm bảo.\r\n3. Vận chuyển tận nơi trên toàn bộ lãnh thổ Việt Nam.\r\n4. Đa dạng, mẫu mã luôn bắt kịp với sự thay đổi của thị trường.\r\n5. Các sản phẩm cá nhân hóa theo yêu cầu của khách hàng.', 0, '2024-06-09 10:04:08', '2024-06-10 08:54:53'),
(65, 6, 'áo Judo hiệu Tân Việt Đỏ (loại đặc biệt)', 'assets/uploads/17180371641717927430803f020bdf37e02ccc7d7fd733737d4b.jpg_320x320.jpg_550x550-removebg-preview.png', 200000, 189000, '', '1. Chất lượng đạt tiêu chuẩn thi đấu quốc tế.\r\n2. Chính sách bảo hành - đổi trả. Quyền lợi khách hàng luôn được đảm bảo.\r\n3. Vận chuyển tận nơi trên toàn bộ lãnh thổ Việt Nam.\r\n4. Đa dạng, mẫu mã luôn bắt kịp với sự thay đổi của thị trường.\r\n5. Các sản phẩm cá nhân hóa theo yêu cầu của khách hàng.\r\n', 0, '2024-06-09 10:04:22', '2024-06-10 09:32:44'),
(66, 6, 'Aikido hiệu Tân Việt Đỏ (loại đặc biệt)', 'assets/uploads/17180371211717925216vo-phuc-judo-removebg-preview.png', 185000, 150000, 'đâsdfdfdf', 'Màu sắc: Trắng.\r\n\r\nKích thước: 1m10, 1m20, 1m30, 1m40, 1m50, 1m60, 1m70, 1m80, 1m90, 2m00\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Bộ (võ phục và đai màu áo).\r\n\r\nTHIẾT KẾ\r\nVõ phục Aikido làm bằng vải Kaki trơn 200g (80/20 – P/C) có form chuẩn theo thông số quốc tế, tránh co ngắn nhiều nhất có thể khi giặt và khô nhanh hơn các loại võ phục được làm từ 100% cotton. Võ phục Aikido được may chắc ở viền áo và viền quần, đáy quần ngắn (đáy lục giác chèn đáy tam giác) tạo cảm giác thoải mái khi luyện tập. Dải thắt lưng thun co giãn giữ bộ trang phục cố định trong suốt trận đấu.\r\nCÁCH CHỌN KÍCH CỠ?\r\nVõ phục Aikido có sẵn các kích cỡ từ 110cm đến 200cm. ', 0, '2024-06-09 10:04:45', '2024-06-10 09:32:01'),
(67, 3, 'Bao cát da Fairtex HB6 Thái Lan', 'assets/uploads/1718034229upload_0134a1cc148842479684bced36de48eb_1024x1024.webp', 600000, NULL, '', 'Màu sắc: Đen.\r\n\r\nKích thước:\r\n\r\nChiều cao: 180cm\r\nĐường kính: 36cm\r\nKhối lượng: 60kg\r\nXuất xứ: Thái Lan.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nBao cát da Fairtex HB6 Thái Lan chính hãng được nhập khẩu trực tiếp từ Thái Lan. Đây là dòng sản phẩm bao cát cao cấp với vỏ bao cát được làm từ da thật và ruột 3 lớp: xốp EVA cao cấp, vụn vải và túi cát.  Việc sử dụng da thật làm cho sản phẩm có cảm giác êm tay và độ bền cao hơn khi sử dụng. Trong ruột sử dụng xốp EVA và vụn vải để tạo cảm giác êm tay hơn khi tập luyện, các túi cát để tăng trọng lượng cho bao cát.', 0, '2024-06-10 15:43:50', '2024-06-10 15:43:50'),
(68, 4, 'Nón Quyền anh (Boxing) Tân Việt', 'assets/uploads/1718034977upload_b532daf9b231466e91d87bf5535b0693_1024x1024.webp', 200000, 150000, '200', 'Màu sắc: Xanh, Đỏ.\r\n\r\nKích thước: Free size.\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nChú ý: Bảo quản sản phẩm nơi khô mát, tránh tiếp xúc trực tiếp với ánh nắng\r\n\r\nNón Quyền anh (Boxing) là sản phẩm cao cấp được Tân Việt sản xuất dựa theo tiêu chuẩn về chất lượng để có thể bảo vệ tốt nhất phần đầu của võ sĩ trong khi tập luyện cũng như thi đấu chuyên nghiệp.', 0, '2024-06-10 15:45:39', '2024-06-10 08:56:17'),
(69, 16, 'Hình nhân boxing treo tường (loại đặc biệt)', 'assets/uploads/1718037223upload_57237ef77d3644c99e39d95088ae15b0_1024x1024.webp', 500000, 450000, '', 'Chất liệu phần thân: Nhựa dẻo PU cao cấp\r\n\r\nHình nhân tập võ treo tường (hình nộm tập võ treo tường) được làm từ nhựa PU cao cấp màu hồng da người giúp sản phẩm có độ đàn hồi tốt và bền hơn.\r\n\r\nHình nộm được gắn trực tiếp lên tường bằng bảng Composite và các ốc vít, chính vì vậy mà sản phẩm tập võ này có cảm giác chắc chắn hơn.', 0, '2024-06-10 15:46:25', '2024-06-10 09:33:43'),
(70, 15, 'Áo thun thời trang Karatedo (loại đặc biệt)', 'assets/uploads/1718037102ao_thun_karate_01-640x640_1024x1024.webp', 150000, 135000, '', 'Chất liệu: Vải cotton, Sợi nhân tạo (PE).\r\n\r\nMàu sắc: Trắng\r\n\r\nKích thước: size S, M, L.\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nNếu bạn là một võ sinh hay đơn giản chỉ là một tín đồ của võ thuật thì những chiếc áo thun võ thuật là sự lựa chọn tuyệt vời để mặc thường ngày hay những hoạt động đội nhóm cùng với những người bạn cùng niềm đam mê với mình.', 0, '2024-06-10 15:47:33', '2024-06-10 09:31:42'),
(71, 15, 'Áo thun thời trang Karatedo hàng Tân Việt', 'assets/uploads/1718034510upload_8726aaa921c24d0e82a1d79889a50d00_1024x1024.webp', 130000, NULL, '', 'Chất liệu: Vải cotton, Sợi nhân tạo (PE).\r\n\r\nMàu sắc: Trắng\r\n\r\nKích thước: size S, M, L, XL\r\n\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Cái.\r\n\r\nNếu bạn là một võ sinh hay đơn giản chỉ là một tín đồ của võ thuật thì những chiếc áo thun võ thuật là sự lựa chọn tuyệt vời để mặc thường ngày hay những hoạt động đội nhóm cùng với những người bạn cùng niềm đam mê với mình.', 0, '2024-06-10 15:48:30', '2024-06-10 15:48:30'),
(72, 14, 'Đai màu thêu Judo Tân Việt (loại đặc biệt)', 'assets/uploads/1718037078upload_be0fa43b50a243b994a43da3f1bd8193_1024x1024.webp', 25000, 20000, '', 'Chất liệu: Vải Kaki hoặc Si.\r\n\r\nMàu sắc: Đa dạng.\r\n\r\nKích thước:\r\n\r\nRộng 5cm\r\nDài từ 200 – 300cm (tùy theo yêu cầu)\r\nXuất xứ: Việt Nam.\r\n\r\nĐơn vị tính: Sợi.\r\n\r\n*** Đối với đai từ 3m trở lên  khách hàng phải đặt trước\r\n\r\nĐai thêu Judo loại tốt tại Tân Việt được may chắc chắn, tỉ mỉ bằng vải Kaki cao cấp và chỉ may tốt cho sản phẩm có tính thẩm mỹ cao đồng thời bền hơn, sử dụng được lâu hơn. Đai cao cấp rất dày dặn nhưng lại không quá cứng.', 0, '2024-06-10 15:49:47', '2024-06-10 09:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `password`, `type`, `created_at`, `updated_at`, `is_active`) VALUES
(117, 'Quang', 'assets/uploads/1718029838Screenshot 2024-06-10 212937.png', 'quang@gmail.com', '$2y$10$/62YvxzYC6CQk9qk68ver.WwXxDWhLr9J3px/L43dxhRioFi8uWq6', 'admin', '2024-06-06 07:29:16', '2024-06-06 07:29:16', 1),
(118, 'Thành', 'assets/uploads/1718029693z2924428768930_b257de7b33218f323f8d25ef916020f7.jpg', 'thanh@gmail.com', '$2y$10$qWTGdkIzSSwLb7Xyi5y8YeGQOl1C3Y8eDE3XOfblddi/oYKzP7zgS', 'admin', '2024-06-06 07:30:55', '2024-06-06 07:30:55', 1),
(120, 'Nguyễn Hoàng', NULL, 'HoangBa@gmail.com', '$2y$10$8u3cq.JtQipU2GZPJFxCgOuhxefSMEACRkVXfMvqbdTjLEt8PZgtu', 'member', '2024-06-10 17:11:52', '2024-06-10 17:11:52', 0),
(121, 'Nguyễn An', NULL, 'An@gmail.com', '$2y$10$f3HOWMR/dM3/6bBarg/vYOr7WxQO7o90LPjJp/fYMg8MOpkKhOUJ6', 'member', '2024-06-11 02:28:37', '2024-06-11 02:28:37', 0),
(122, 'Vô Danh', NULL, 'DoZanh@gmail.com', '$2y$10$.wqB0.ZwpltGfiVBAftqvOyvUXIjh3383iml2KcVhSRNr4R30J0O6', 'member', '2024-06-11 02:32:10', '2024-06-11 02:32:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
