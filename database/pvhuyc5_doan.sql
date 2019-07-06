-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2019 lúc 06:59 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pvhuyc5_doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ky`
--

CREATE TABLE `dang_ky` (
  `id` int(11) NOT NULL,
  `maSV` varchar(9) DEFAULT NULL,
  `maDT` int(12) NOT NULL,
  `ngayDK` datetime DEFAULT NULL,
  `maNhom` varchar(30) DEFAULT NULL,
  `ttDK` int(11) DEFAULT NULL,
  `ngayTT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dang_ky`
--

INSERT INTO `dang_ky` (`id`, `maSV`, `maDT`, `ngayDK`, `maNhom`, `ttDK`, `ngayTT`) VALUES
(2, '51503005', 24, NULL, '51503005', 3, NULL),
(3, 'Phục Nghi', 228, NULL, 'Phục Nghi', 3, NULL),
(4, 'Kim Ngân', 229, NULL, 'Kim Ngân', 3, NULL),
(6, '51503044', 21, '2019-04-10 01:00:44', '51503044', 3, '2019-04-10 01:00:44'),
(7, '51503365', 215, '2019-04-10 01:01:23', '51503365', 2, '2019-04-10 01:01:23'),
(8, '51503067', 215, '2019-04-10 01:01:23', '51503365', 2, '2019-04-10 01:01:23'),
(9, '51503231', 214, '2019-04-10 01:01:50', '51503231', 2, '2019-04-10 01:01:50'),
(10, '51503135', 214, '2019-04-10 01:01:50', '51503231', 2, '2019-04-10 01:01:50'),
(11, '51503321', 25, '2019-04-10 01:02:59', '51503321', 2, '2019-04-10 01:02:59'),
(12, '51503293', 210, '2019-04-10 01:05:17', '51503293', 2, '2019-04-10 01:05:17'),
(13, '51503059', 22, '2019-04-10 01:17:34', '51503059', 3, '2019-04-10 01:17:34'),
(14, '51503133', 22, '2019-04-10 01:17:34', '51503059', 3, '2019-04-10 01:17:34'),
(15, '51503065', 225, '2019-04-10 01:21:55', '51503065', 2, '2019-04-10 01:21:55'),
(16, '51503128', 221, '2019-04-10 01:44:17', '51503128', 2, '2019-04-10 01:44:17'),
(17, '51503118', 221, '2019-04-10 01:44:17', '51503128', 2, '2019-04-10 01:44:17'),
(18, 'Thảo Lam', 228, NULL, 'Phục Nghi', 3, NULL),
(19, '51503039', 236, '2019-04-10 04:10:17', '51503039', 2, '2019-04-10 04:10:17'),
(20, '51503178', 236, '2019-04-10 04:10:17', '51503039', 2, '2019-04-10 04:10:17'),
(21, '51503208', 213, '2019-04-11 17:21:59', '51503208', 2, '2019-04-11 17:21:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `de_tai`
--

CREATE TABLE `de_tai` (
  `id` int(11) NOT NULL,
  `maDT` char(12) NOT NULL,
  `tenDT` varchar(255) NOT NULL,
  `loaiDT` char(12) DEFAULT NULL,
  `moTa` text,
  `maGV` int(11) DEFAULT NULL,
  `ngayBS` datetime DEFAULT NULL,
  `slNhom` int(11) DEFAULT NULL,
  `slSV` int(11) DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  `dotDK` int(11) NOT NULL,
  `slDK` int(11) NOT NULL,
  `VPKDuyet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `de_tai`
--

INSERT INTO `de_tai` (`id`, `maDT`, `tenDT`, `loaiDT`, `moTa`, `maGV`, `ngayBS`, `slNhom`, `slSV`, `ngayBD`, `ngayKT`, `dotDK`, `slDK`, `VPKDuyet`) VALUES
(2, 'DACNTT2_1', 'Tìm hiểu Python và OpenCV \ncho nhận dạng mặt người', 'Dự án CNTT 2', '- Học lập trình Python\n- Sử dụng OpenCV trong Python\n- Xây dựng hệ thống nhận dạng mặt người với Python và OpenCV', 32, NULL, 1, 2, '2019-04-11 00:00:00', NULL, 0, 0, NULL),
(3, 'DACNTT2_2', 'Tìm hiểu Google Map APIs và framework Laravel xây dựng trang web rao vặt bất động sản', 'Dự án CNTT 2', '- Tìm hiểu Google Map APIs\n- Tìm hiểu Laravel Framework\n- Xây dựng website mình họa', 32, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(4, 'DACNTT2_3', 'PUBG (Game) Finish Placement Prediction', 'Dự án CNTT 2', '- Battle Royale-style video games have taken the world by storm. 100 players are dropped onto an island empty-handed and must explore, scavenge, and eliminate other players until only one is left standing, all while the play zone continues to shrink. - PlayerUnknown\'s BattleGrounds (PUBG) has enjoyed massive popularity. - You are given over 65,000 games\' worth of anonymized player data, split into training and testing sets, and asked to predict final placement from final in-game stats and initial player ratings. - What\'s the best strategy to win in PUBG? Should you sit in one spot and hide your way into victory, or do you need to be the top shot? Let\'s let the data do the talking!', 13, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(5, 'DACNTT2_4', 'Phát triển mạng xã hội FOTOBOOK', 'Dự án CNTT 2', 'Giai đoạn 1: Tìm hiểu về các extra functions và nắm rõ lại về lập trình Ruby on Rails cũng như lập trình theo Best Practices. Giai đoạn 2: Thiết kế Model và kiểm thử database trước khi bước vào từng function. Giai đoạn 4: Kiểm thử thành công từng extra functions trước khi đi vào các main functions Giai đoạn 3: Xử lý main functions theo thứ tự từ trên xuống. Giai đoạn 4: Xử lý extra functions theo thứ tự dễ đến khó. Giai đoạn 5: Kiểm thử từng chức năng và Code theo Best Practices. Giai đoạn 6: Thiết kế giao diện và deploy Heroku.', 13, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(6, 'DACNTT2_5', 'Tìm hiểu và cài đặt thuật toán khai thác tập phổ biến trên CSDL lớn trên môi trường song song/phân tán', 'Dự án CNTT 2', '-Tìm hiểu itemset, database transaction, các tính chất và thuộc tính của itemset\n- Tìm hiểu các thuật toán khai thác tập phổ biến (PrePost, Prepost+,..)\n- Tìm hiểu Framework Spark/ Map Reduce\n- Đề xuất và cài đặt thuật toán thực nghiệm', 24, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(7, 'DACNTT2_6', 'Tìm hiểu và cài đặt thuật khai thác tập hữu ích cao bằng phương pháp tiến hoá', 'Dự án CNTT 2', '- Tìm hiểu HUI\n- Tìm hiểu các kỹ thuật khai thác HUI (HUI-Miner, EFIM-Miner)\n- Tìm hiểu các kỹ thuật Optimization (GA, PSO,..)\n- Đề xuất và cài đặt thực nghiệm', 24, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(8, 'DACNTT2_7', 'Tìm hiểu các kĩ thuật hỏi đáp tự động dựa trên Ontology', 'Dự án CNTT 2', 'Tìm hiểu Ontology;\nXây dựng cơ sở tri thức dựa trên Ontology;\nTìm hiểu các kĩ thuật phân tích câu hỏi;\nXây dựng phần mềm thử nghiệm hỏi đáp trên miền dữ liệu cụ thể', 10, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(9, 'DACNTT2_8', 'Tìm hiểu các kĩ thuật hỏi đáp dựa trên Information Retrieval ', 'Dự án CNTT 2', 'Tìm hiểu các kĩ thuật Information Retrieval;\nTìm hiểu các kĩ thuật phân tích câu hỏi;\nTìm hiểu các kĩ thuật đo độ tương tự giữa câu hỏi và văn bản;\nXây dựng phần mềm thử nghiệm hỏi đáp trên miền dữ liệu cụ thể', 10, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(10, 'DACNTT2_9', 'Các mô hình học máy cho sinh ngôn ngữ tự nhiên và ứng dụng trong hỏi đáp tự động', 'Dự án CNTT 2', 'Tìm hiểu các mô hình học máy RNN; LSTM;\nTìm hiểu bài toán Question Answering;\nỨng dụng để thử nghiệm tiếp cận generation cho QAs', 10, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(11, 'DACNTT2_10', 'Tìm hiểu và xây dựng hệ thống quản lý bán hàng đa kênh trên nền tảng web', 'Dự án CNTT 2', '- Tìm hiểu cộng nghệ NodeJS\n- Xây dựng ứng dụng quản lý bán hàng đa kênh gồm các chức năng chính:\n1. Đưa sản phẩm lên nhiều kênh bán hàng khác nhau\n2. Quản lý bán hàng tại quầy\n3. Quản lý bán hàng trên các trang thương mại điện tử\n4. Quản lý đơn hàng trên website bán hàng wordpress woocomerce\n5. Đồng bộ thông tin sản phẩm, đơn hàng, khách hàng, tồn kho, ... giữa các kênh bán hàng', 11, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(12, 'DACNTT2_11', 'Tìm hiểu và xây dựng hệ thống quản lý bán hàng đa kênh trên nền tảng di động', 'Dự án CNTT 2', '- Tìm hiểu công nghệ React Native và các công nghệ liên quan\n- Xây dựng ứng dụng quản lý bán hàng đa kênh bao gồm các chức năng chính sau đây:\n1. Đưa sản phẩm lên nhiều kênh bán hàng khác nhau\n2. Quản lý bán hàng tại quầy\n3. Quản lý bán hàng trên các trang thương mại điện tử\n4. Quản lý đơn hàng trên website bán hàng wordpress woocomerce\n5. Đồng bộ thông tin sản phẩm, đơn hàng, khách hàng, tồn kho, ... giữa các kênh bán hàng', 11, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(13, 'DACNTT2_12', 'Tìm hiểu về IoT để quản lý màn hình quảng cáo', 'Dự án CNTT 2', 'IoT và IoT platform', 20, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(14, 'DACNTT2_13', 'Blockchain trong quản lý sản phẩm hàng hóa', 'Dự án CNTT 2', 'Blockchain và các ứng dụng', 20, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(15, 'DACNTT2_14', 'Phát triển ứng dụng bán hàng trên Desktop dành cho các cửa hàng bán lẻ', 'Dự án CNTT 2', 'Phát triển kỹ năng lập trình', 17, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(16, 'DACNTT2_15', 'Phát triển ứng dụng bán hàng trên Web dành cho các cửa hàng bán lẻ', 'Dự án CNTT 2', 'Phát triển kỹ năng lập trình', 17, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(17, 'DACNTT2_16', 'Tìm hiểu và cài đặt Mô hình Đồ thị của thị trường chứng khoán Việt Nam ', 'Dự án CNTT 2', '-Tìm hiểu Mô hình đồ thị của thị trường chứng khoán\n-Thu thập dữ liệu chứng khoán Việt Nam\n-Cài đặt mô hình đồ thị sử dụng dữ liệu thu thập được\n-Đánh giá chất lượng mô hình thông qua ứng dụng nó vào lựa chọn danh mục đầu tư', 16, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(18, 'DACNTT2_17', 'Tìm hiểu và cài đặt phương pháp tích hợp thông tin về dự đoán xu hướng trong lựa chọn cổ phiếu', 'Dự án CNTT 2', '-Tìm hiểu Các giải thuật dự đoán chuỗi thời gian\n-Thu thập dữ liệu chứng khoán Việt Nam\n-Cài đặt Các giải thuật dự đoán chuỗi thời gian\n-Tích hợp dự đoán vào lựa chọn danh mục đầu tư', 16, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(19, 'DACNTT2_18', 'Khảo sát bài toán nhận dạng người bằng đặc trưng sóng não', 'Dự án CNTT 2', '- Tìm hiểu đặc trưng sóng não với vai trò đặc trưng sinh trắc\n- Khảo sát các công trình nhận dạng người bằng đặc trưng sóng não đã có\n- Đánh giá khả năng áp dụng vào thực tế của bài toán này', 23, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(20, 'DACNTT2_19', 'Xây dựng ứng dụng di động theo dõi hoạt động chạy bộ', 'Dự án CNTT 2', '- Xây dựng ứng dụng di động theo dõi quá trình chạy bộ, số bước chân, tần số tập luyện\n- Thu thập dữ liệu theo thời gian\n- Đưa ra lời khuyên, cảnh báo sức khỏe...', 23, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(21, 'DACNTT2_20', 'Tìm hiểu mô hình Autoencoders và ứng dụng trong thị giác máy tính', 'Dự án CNTT 2', '- Tìm hiểu và tổng hợp các nghiên cứu về Autoencoders, một mô hình học sâu đặc biệt trong học máy\n- Tìm hiểu công cụ, mã nguồn mở trong xử lý ảnh số, học sâu (Tensorflow, Keras, Pytorch...)\n- Cài đặt và sử dụng được các công cụ để demo minh họa 1-2 ứng dụng trong lĩnh vực thị giác máy tính (tìm ảnh tương tự, chuyển đổi màu ảnh...)', 9, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(22, 'DACNTT2_21', 'Tìm hiểu mô hình GAN và ứng dụng trong thị giác máy tính', 'Dự án CNTT 2', '- Tìm hiểu và tổng hợp các nghiên cứu về GAN, một mô hình học sâu đặc biệt để học cách tái sinh dữ liệu\n- Tìm hiểu công cụ, mã nguồn mở trong xử lý ảnh số, học sâu (Tensorflow, Keras, Pytorch...)\n- Cài đặt và sử dụng được các công cụ để demo minh họa 1-2 ứng dụng trong lĩnh vực thị giác máy tính (nâng cao chất lượng ảnh,...)', 9, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(23, 'DACNTT2_22', 'Tìm hiểu kỹ thuật one-shot learning và ứng dụng vào việc nhận dạng gương mặt', 'Dự án CNTT 2', '- Tìm hiểu các mô hình học sâu nói chung, và one-shot learning (siamese NN) để nâng cao hiệu quả việc nhận dạng gương mặt người so với mạng CNN truyền thống\n- Tìm hiểu công cụ, mã nguồn mở trong xử lý ảnh số, học sâu (Tensorflow, Keras, Pytorch...)\n- Cài đặt và sử dụng được các công cụ để demo minh họa 1-2 ứng dụng trong lĩnh vực thị giác máy tính (nâng cao chất lượng ảnh,...)', 9, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(24, 'DACNTT2_23', 'Tìm hiểu các kỹ thuât học sâu cho nhận dạng thuộc tính người đi bộ qua video', 'Dự án CNTT 2', '- Tìm hiểu các mô hình học sâu nói chung, và các mô hình cụ thể cho việc nhận dạng đơn thuộc tính, đa thuộc trong video người đi bộ\n- Tìm hiểu công cụ, mã nguồn mở trong xử lý ảnh số, học sâu (Tensorflow, Keras, Pytorch...)\n- Cài đặt và sử dụng được các công cụ để demo minh họa 1-2 ứng dụng trong lĩnh vực thị giác máy tính (nâng cao chất lượng ảnh,...)', 9, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(25, 'DACNTT2_24', 'Tìm hiểu các kỹ thuât học sâu ứng dụng trong việc nâng cao chất lượng ảnh', 'Dự án CNTT 2', '- Tìm hiểu các mô hình học sâu nói chung, và các mô hình cụ thể cho việc nâng cao chất lượng ảnh: độ phân giải, giảm nhiễu...\n- Tìm hiểu công cụ, mã nguồn mở trong xử lý ảnh số, học sâu (Tensorflow, Keras, Pytorch...)\n- Cài đặt và sử dụng được các công cụ để demo minh họa 1-2 ứng dụng trong lĩnh vực thị giác máy tính (nâng cao chất lượng ảnh,...)', 9, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(26, 'DACNTT2_25', ' Xây dựng ứng dụng kiểm lỗi chính tả tiếng Việt', 'Dự án CNTT 2', 'Tìm hiểu Python, Django. Các mô hình kiểm lỗi chính tả cho tiếng Việt. Xây dựng ứng dụng minh họa.', 27, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(27, 'DACNTT2_26', 'Nghiên cứu một số phương pháp phân lớp văn bản và áp dụng cho phân lớp văn bản tiếng Việt', 'Dự án CNTT 2', '-Nghiên cứu một số phương pháp phân lớp như: Bayes, cây quyết định, SVM,...\n- Khởi tạo văn bản tiếng Việt có gán nhãn theo chủ đề (ví dụ như: download toàn bộ website vnexpress.net theo các chủ đề: văn hóa, pháp luật, thể thao).\n- Phân đoạn từ tiếng Việt (sử dụng công cụ VnTokenizer)\n- Phân lớp văn bản tiếng Việt.', 19, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(28, 'DACNTT2_27', 'Tích hợp thực thể có tên vào dịch máy nơ ron Hoa-Việt', 'Dự án CNTT 2', '- Nghiên cứu dịch máy nơ ron (NMT)\n- Sử dụng được một framework để thực hiện NMT\n- Tìm hiểu về NER tiếng Hoa (sử dụng được công cụ Stanford NER)\n- Tích hợp NE vào dịch  máy nơ ron Hoa-Việt', 19, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(29, 'DACNTT2_28', 'Tìm hiểu về Nosql và viết ứng dụng minh họa', 'Dự án CNTT 2', '- Tìm hiểu công nghệ hiện tại của Nosql\n- Tìm hiều ngôn ngữ truy vấn Cypher\n- Viết ứng dụng minh họa trên nền tảng Graph Database Neo4J và thực hiện các truy vấn', 31, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(30, 'DACNTT2_29', 'Tìm hieur về OLAP và viết ứng dụng minh họa', 'Dự án CNTT 2', '- Tìm hiểu các thuật toán của OLAP\n- Viết ứng dụng minh họa dựa trên nền tảng này', 31, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(31, 'DACNTT2_30', 'Xây dựng điều khiển điện cho nhà thông minh trên nền tảng Sonoff- Tasmota', 'Dự án CNTT 2', '- Lập trình Arduino điều khiển các thiết bị \n- Thiết lập webserver.\n- Kiểm thử hệ thống\n- Phân tích các tình huống thực tế sử dụng', 21, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(32, 'DACNTT2_31', 'Lập trình điều khiển xe quan trắc tự động', 'Dự án CNTT 2', '- Xe đã có sẵn và gắn các cảm biến.\n- SV lập trình cho xe đi theo một lộ trình định sẵn.\n- Truyền dữ liệu giữa xe và trung tâm điều khiển bằng wifi và/hoặc sóng vô tuyến.', 21, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(33, 'DACNTT2_32', 'Nghiên cứu tích hợp bộ gõ tiếng Dân tộc vào Unikey', 'Dự án CNTT 2', '- Đưa bảng mã tiếng dân tộc vào unikey; - Gõ được tiếng dân tộc dùng Unikey', 22, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(34, 'DACNTT2_33', 'Nghiên cứu nhận dạng chữ viết tiếng dân tộc', 'Dự án CNTT 2', '- Nhận dạng được chữ dân tộc viết tay hoặc đánh máy', 22, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(35, 'DACNTT2_34', 'Tìm hiểu OpenPose và viết ứng dụng minh họa \ncho bài toán xác định các điểm keypoints trên ảnh', 'Dự án CNTT 2', '- Tìm hiểu OpenPose\n- Viết ứng dụng minh họa', 12, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(36, 'DACNTT2_35', 'Tìm hiểu và viết ứng dụng xác định \nvùng đối tượng trong ảnh', 'Dự án CNTT 2', '- Tìm hiểu các bài toán xác định vùng đối tượng \n- Viết ứng dụng minh họa', 12, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(37, 'DACNTT2_36', 'Hệ thống bán hàng cho công ty vừa và nhỏ', 'Dự án CNTT 2', '- Học lập trình web, lập trình di động\n- Tìm hiểu các công nghệ .NET, react-native\n- Hệ thống gồm 2 phần: \n+ Client là ứng dụng trên di động được viết bằng react-native. Client cho phép người dùng ghi nhận các mặt hàng đã bán, cập nhật thông tin đơn hàng, báo cáo, và một số tính năng khác (gặp giáo viên để biết chi tiết)\n+ Server là website và api viết trên nền .NET. Server lưu trữ các thông tin của hệ thống như sản phẩm, nhân viên, đơn hàng,... cho phép quản lý dữ liệu trên website và cung cấp api cho app mobile hoạt động. (gặp giáo viên để biết chi tiết)', 18, NULL, 1, 2, NULL, NULL, 0, 0, NULL),
(38, 'DACNTT2_37', 'Hệ thống đánh giá dịch vụ qua mạng xã hội', 'Dự án CNTT 2', '- Học lập trình web, lập trình di động\n- Tìm hiểu các công nghệ .NET, react-native\n- Hệ thống gồm 2 phần: \n+ Client là ứng dụng trên di động được viết bằng react-native. Client cho phép người dùng quyét mã vạch và ghi nhận thông tin đánh giá (gặp giáo viên để biết chi tiết)\n+ Server là website và api viết trên nền .NET. Server lưu trữ các thông tin của hệ thống như dịch vụ, công ty, ... cho phép quản lý dữ liệu trên website và cung cấp api cho app mobile hoạt động. (gặp giáo viên để biết chi tiết)', 18, NULL, 1, 2, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dot_dk`
--

CREATE TABLE `dot_dk` (
  `id` int(11) NOT NULL,
  `loaiDT` int(11) DEFAULT NULL,
  `tenDot` varchar(50) DEFAULT NULL,
  `moTa` text,
  `slNgay` date DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id` int(11) NOT NULL,
  `maGV` varchar(30) NOT NULL,
  `tenGV` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `hocHam` varchar(15) DEFAULT NULL,
  `moTa` text,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id`, `maGV`, `tenGV`, `email`, `hocHam`, `moTa`, `role`) VALUES
(1, '1', 'Lê Nguyên Hoài Nghĩa', 'lenghialk1@gmail.com', NULL, NULL, 0),
(2, '2', 'Mạc Cự Đăng Khoa', 'leondk237@gmail.com', NULL, NULL, 0),
(4, '32', 'Tiến', 'tienaries.mt@gmail.com', NULL, NULL, 1),
(5, '5', 'Phạm Văn Huy', 'phamvanhuy@tdtu.edu.vn', NULL, NULL, 0),
(6, '6', 'Hoàng Anh', 'tvhanh@it.tdt.edu.vn', NULL, NULL, 0),
(9, '9', 'Phạm Văn Huy', 'pvhuy@it.tdt.edu.vn', '', '', 0),
(10, '444', 'Lê Anh Cường', 'lacuong@it.tdt.edu.vn', 'PGS', '', 0),
(11, '11', 'Lê Văn Vang', 'lvvang@it.tdt.edu.vn', '', '', 0),
(12, '12', 'Võ Hoàng Anh', 'vhanh@it.tdt.edu.vn', '', '', 0),
(13, '13', 'Dương Hữu Phúc', 'dhphuc@it.tdt.edu.vn', '', '', 0),
(14, '14', 'Nguyễn Thanh Hiên', 'nthien@it.tdt.edu.vn', 'PGS', '', 0),
(15, '15', 'Huỳnh Ngọc Tú', 'hntu@it.tdt.edu.vn', '', '', 0),
(16, '16', 'Nguyễn Chí Thiện', 'ncthien@it.tdt.edu.vn', '', '', 0),
(17, '17', 'Mai Văn Mạnh', 'mvmanh@it.tdt.edu.vn', '', '', 0),
(18, '18', 'Vũ Đình Hồng', 'vdhong@it.tdt.edu.vn', '', '', 0),
(19, '19', 'Trần Thanh Phước', 'ttphuoc@it.tdt.edu.vn', '', '', 0),
(20, '207', 'Mai Ngọc Thắng', 'mnthang@it.tdt.edu.vn', '', '', 0),
(21, '21', 'Trần Trung Tín', 'tttin@it.tdt.edu.vn', '', '', 0),
(22, '22', 'Trương Đình Tú', 'tdtu@it.tdt.edu.vn', '', '', 0),
(23, '23', 'Nguyễn Quốc Bình', 'nqbinh@it.tdt.edu.vn', '', '', 0),
(24, '24', 'Huỳnh Quốc Bảo', 'hqbao@it.tdt.edu.vn', '', '', 0),
(25, '25', 'Trịnh Hùng Cường', 'thcuong@it.tdt.edu.vn', '', '', 0),
(26, '26', 'Dung Cẩm Quang', 'dcquang@it.tdt.edu.vn', '', '', 0),
(27, '27', 'Trần Lương Quốc Đại', 'tlqdai@it.tdt.edu.vn', '', '', 0),
(28, '28', 'Cao Phi Phụng', 'cpphung@it.tdt.edu.vn', '', '', 0),
(29, '29', 'Trương Vũ Hoàng Anh', 'tvhanh@it.tdt.edu.vn', '', '', 0),
(30, '30', 'Bhagawan Nath', 'nath@it.tdt.edu.vn', '', '', 0),
(31, '31', 'Trần Thị Hồng Nhung', 'tthnhung@it.tdt.edu.vn', '', '', 0),
(32, '3255', 'Đặng Minh Thắng', 'dangminhthang@tdtu.edu.vn', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_detai`
--

CREATE TABLE `loai_detai` (
  `id` int(11) NOT NULL,
  `tenLoai` varchar(50) DEFAULT NULL,
  `moTa` text,
  `slNgay` date DEFAULT NULL,
  `slNhom` int(11) DEFAULT NULL,
  `slSV` int(11) DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_dk`
--

CREATE TABLE `nhom_dk` (
  `maSV` varchar(9) NOT NULL,
  `maDot` int(11) NOT NULL,
  `slDK` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `maSV` varchar(9) NOT NULL,
  `tenSV` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `maLop` int(11) DEFAULT NULL,
  `moTa` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`maSV`, `tenSV`, `email`, `maLop`, `moTa`) VALUES
('51503005', 'Hà Thụy Sâm', '51503005@student.tdtu.edu.vn', 15050302, NULL),
('51503007', 'Trương Trấn Hào', '51503007@student.tdtu.edu.vn', 15050301, NULL),
('51503017', 'Trần Ngô Tiểu Hảo', '51503017@student.tdtu.edu.vn', 15050302, NULL),
('51503035', 'Nguyễn Phục Nghi', '51503035@student.tdtu.edu.vn', 15050303, NULL),
('51503038', 'Nguyễn Lương Tiến Dũng', '51503038@student.tdtu.edu.vn', 15050303, NULL),
('51503039', 'Cao Ngọc Như Quỳnh', '51503039@student.tdtu.edu.vn', 15050301, NULL),
('51503044', 'Lê Trần Nhật Duy', '51503044@student.tdtu.edu.vn', 15050304, NULL),
('51503050', 'Bùi Hải Dương', '51503050@student.tdtu.edu.vn', 15050303, NULL),
('51503059', 'Lương Văn Kiệt', '51503059@student.tdtu.edu.vn', 15050301, NULL),
('51503063', 'Lê Ngọc Kỳ Quang', '51503063@student.tdtu.edu.vn', 15050301, NULL),
('51503064', 'Nguyễn Anh Huy', '51503064@student.tdtu.edu.vn', 15050302, NULL),
('51503065', 'Trương Thành Nhơn', '51503065@student.tdtu.edu.vn', 15050301, NULL),
('51503067', 'Huỳnh Thiên Phúc', '51503067@student.tdtu.edu.vn', 15050304, NULL),
('51503084', 'Tôn Thọ Duy', '51503084@student.tdtu.edu.vn', 15050303, NULL),
('51503097', 'Nguyễn Đăng Duy', '51503097@student.tdtu.edu.vn', 15050301, NULL),
('51503106', 'Nguyễn Bình An', '51503106@student.tdtu.edu.vn', 15050303, NULL),
('51503118', 'Lê Quốc Vinh', '51503118@student.tdtu.edu.vn', 15050302, NULL),
('51503128', 'Võ Thành Nhân', '51503128@student.tdtu.edu.vn', 15050303, NULL),
('51503133', 'Bùi Nguyễn Trung', '51503133@student.tdtu.edu.vn', 15050301, NULL),
('51503135', 'Trần Ngọc Dương', '51503135@student.tdtu.edu.vn', 15050304, NULL),
('51503158', 'Nguyễn Phúc Hậu', '51503158@student.tdtu.edu.vn', 15050303, NULL),
('51503164', 'Âu Quốc Hoà', '51503164@student.tdtu.edu.vn', 15050301, NULL),
('51503175', 'Lê Thị Thảo Vy', '51503175@student.tdtu.edu.vn', 15050301, NULL),
('51503178', 'Nguyễn Ngọc Quang Vinh', '51503178@student.tdtu.edu.vn', 15050301, NULL),
('51503183', 'Đặng Quốc Khanh', '51503183@student.tdtu.edu.vn', 15050302, NULL),
('51503185', 'Chu Phan Vũ Duy', '51503185@student.tdtu.edu.vn', 15050301, NULL),
('51503194', 'Nguyễn Phước Lộc', '51503194@student.tdtu.edu.vn', 15050302, NULL),
('51503199', 'Nguyễn Quốc Bảo', '51503199@student.tdtu.edu.vn', 15050301, NULL),
('51503208', 'Nguyễn Trung Kiên', '51503208@student.tdtu.edu.vn', 15050303, NULL),
('51503223', 'TrầN Duy TuấN', '51503223@student.tdtu.edu.vn', 15050303, NULL),
('51503231', 'Nguyễn Đình Thản', '51503231@student.tdtu.edu.vn', 15050304, NULL),
('51503233', 'Vương Thị Nguyệt Xương', '51503233@student.tdtu.edu.vn', 15050303, NULL),
('51503260', 'Dương Chung Sĩ Hào', '51503260@student.tdtu.edu.vn', 15050303, NULL),
('51503293', 'Nguyễn Thắng Phúc', '51503293@student.tdtu.edu.vn', 15050304, NULL),
('51503317', 'Lê Đỗ Thảo Lam', '51503317@student.tdtu.edu.vn', 15050302, NULL),
('51503321', 'Nguyễn Phước Thiện', '51503321@student.tdtu.edu.vn', 15050301, NULL),
('51503332', 'Cao Ngọc Thọ', '51503332@student.tdtu.edu.vn', 15050304, NULL),
('51503355', 'Trương Hoàng Phúc', '51503355@student.tdtu.edu.vn', 15050301, NULL),
('51503365', 'Nguyễn Phước An Khang', '51503365@student.tdtu.edu.vn', 15050304, NULL),
('51600053', 'Lê Nguyên Hoài Nghĩa', '51600053@student.tdtu.edu.vn', 16050311, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL,
  `maTT` varchar(20) DEFAULT NULL,
  `tenTT` varchar(30) NOT NULL,
  `moTa` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dang_ky`
--
ALTER TABLE `dang_ky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `de_tai`
--
ALTER TABLE `de_tai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maDT` (`maDT`);

--
-- Chỉ mục cho bảng `dot_dk`
--
ALTER TABLE `dot_dk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maGV` (`maGV`);

--
-- Chỉ mục cho bảng `loai_detai`
--
ALTER TABLE `loai_detai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhom_dk`
--
ALTER TABLE `nhom_dk`
  ADD PRIMARY KEY (`maSV`,`maDot`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`maSV`);

--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maTT` (`maTT`);

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
-- AUTO_INCREMENT cho bảng `dang_ky`
--
ALTER TABLE `dang_ky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `de_tai`
--
ALTER TABLE `de_tai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `dot_dk`
--
ALTER TABLE `dot_dk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `loai_detai`
--
ALTER TABLE `loai_detai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
