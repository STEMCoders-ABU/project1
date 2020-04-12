-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_space`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `email`, `password`) VALUES
(1, 'stemcoders', 'stemcoders.abu@gmail.com', 'in4aPin4aL');

-- --------------------------------------------------------

--
-- Table structure for table `category_comments`
--

CREATE TABLE `category_comments` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_comments`
--

INSERT INTO `category_comments` (`id`, `category_id`, `course_id`, `department_id`, `level_id`, `author`, `comment`, `date_added`) VALUES
(2, 2, 2, 1, 1, 'emris', 'hey', '2020-04-08 09:27:29'),
(3, 2, 2, 1, 1, 'emris', 'I love this resource', '2020-04-08 09:32:47'),
(4, 2, 2, 1, 1, 'Student', 'I will like to say that this resource is somewhat somehow....\n\nKidding, just testing :)', '2020-04-08 09:33:40'),
(5, 2, 2, 1, 1, 'emmy', 'Trisl', '2020-04-08 09:39:08'),
(6, 4, 3, 1, 1, 'emris', 'First comment, yay!', '2020-04-08 09:39:44'),
(7, 2, 2, 1, 1, 'me', 'Another one', '2020-04-08 09:42:23'),
(8, 4, 2, 1, 1, 'emmi', 'This is a comment', '2020-04-08 23:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `resource_id`, `author`, `date`) VALUES
(1, 'new comment', 12, 'emris', '2020-04-08 23:07:07'),
(2, 'uhm', 11, 'emris', '2020-04-08 23:07:56'),
(3, 'again', 11, 'emris', '2020-04-08 23:09:53'),
(4, 'we are here', 10, 'emris', '2020-04-08 23:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `course_code` varchar(12) NOT NULL,
  `course_title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `level_id`, `course_code`, `course_title`) VALUES
(2, 1, 1, 'TEST101', 'Test101 Title'),
(3, 1, 1, 'TEST102', 'Test102 Title'),
(4, 2, 3, 'TEST201', 'Test201 Title'),
(5, 2, 3, 'TEST202', 'Test202 Title'),
(6, 2, 3, 'TEST203', 'Test203 Title'),
(7, 2, 3, 'TEST204', 'Test204 Title');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(60) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `faculty_id`) VALUES
(1, 'Test Department', 1),
(2, 'Another Test Department', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`) VALUES
(1, 'Test Faculty'),
(2, 'Another Test Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, '100'),
(3, '200'),
(4, '300'),
(5, '400'),
(6, '500'),
(7, '600');

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`id`, `username`, `email`, `password`, `full_name`, `gender`, `phone`, `faculty_id`, `department_id`, `level_id`, `reg_date`) VALUES
(1, 'test', 'test@gmail.com', 'test', 'Tester', 'Male', '08123456789', 1, 1, 1, '2020-04-04 15:48:25'),
(2, 'test2', 'test2@gmail.com', 'test2', 'Tester 2', 'Female', '7575657463', 2, 2, 3, '2020-04-06 14:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `category_id`, `faculty_id`, `department_id`, `level_id`, `date_added`) VALUES
(3, 'The Test News Title', 'This some general news!', 1, 1, 1, 1, '2020-04-10 08:47:52'),
(4, 'The Test News Title For Assignment', 'This some assignment news!', 3, 1, 1, 1, '2020-04-10 08:48:15'),
(5, 'Another The Test News Title', 'Some content this is', 1, 1, 1, 1, '2020-04-10 10:45:52'),
(6, 'Another The Test News Title Again', 'nshdhjdshjdhjhjdh dhchchdhcdhcdxh xhxhcxhchxchxc hhbkjankjnzknknjkxbzb bbcbcbbcbbbcxz zbnxhjzbxzxnbzxnbznbxz zbzjnbkjkkbnzbb  bchbzbcbbcbxzbcbcbbc xzbkzkznzkzzk  bbbczbkjbcjuwywywywywywbsbsbcsbbchbbc bnsxzkjbz bzjkbzbnkjbzbjzbcbkjz zkjkjczbkjbkbckjzbkzkb zkckzbckzbcbbbcbc znbxbzbxb zbxbbbsx zbxbshaujxainbzjnön ölzblbz.b lbzöxbzkjxzkxbkzjnbz bz z  z', 1, 1, 1, 1, '2020-04-10 11:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `category`) VALUES
(1, 'General Announcement'),
(2, 'Breaking News'),
(3, 'Assignment'),
(4, 'Assessment'),
(5, 'Scholarship');

-- --------------------------------------------------------

--
-- Table structure for table `news_category_comments`
--

CREATE TABLE `news_category_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(20) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_category_comments`
--

INSERT INTO `news_category_comments` (`id`, `category_id`, `department_id`, `level_id`, `author`, `comment`, `date_added`) VALUES
(1, 3, 1, 1, 'emris', 'A comment', '2020-04-10 12:00:01'),
(2, 3, 1, 1, 'emris', 'Another comment', '2020-04-10 12:00:14'),
(3, 1, 1, 1, 'emmy', 'Commenting here', '2020-04-10 12:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_comments`
--

INSERT INTO `news_comments` (`id`, `comment`, `news_id`, `author`, `date_added`) VALUES
(1, 'another comment', 6, 'emris', '2020-04-10 12:52:33'),
(2, 'Yet another comment', 6, 'emmy', '2020-04-10 12:55:03'),
(3, 'first comment', 5, 'emris', '2020-04-10 12:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `news_subscriptions`
--

CREATE TABLE `news_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_subscriptions`
--

INSERT INTO `news_subscriptions` (`id`, `email`, `faculty_id`, `department_id`, `level_id`, `date_added`) VALUES
(5, 'imran@gmail.com', 1, 1, 1, '2020-04-10 17:24:15'),
(6, 'imran@gmail.com', 1, 1, 3, '2020-04-10 17:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `verification_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `downloads` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `course_id`, `faculty_id`, `department_id`, `level_id`, `category_id`, `description`, `file`, `date_added`, `downloads`) VALUES
(3, 'Test 101 Video', 2, 1, 1, 1, 2, 'This is a video for TEST101', 'test-101-video.mp4', '2020-04-05 10:46:47', 0),
(4, 'Test 101 Document', 2, 1, 1, 1, 4, 'This is a document for TEST101', 'test-101-document.docx', '2020-04-05 10:46:47', 0),
(5, 'Test 102 Document', 3, 1, 1, 1, 4, 'This is a document for TEST102', 'test-102-document.docx', '2020-04-05 10:46:47', 0),
(6, 'A Video', 4, 2, 2, 3, 2, 'Im speechless', 'a-video.mp4', '2020-04-06 14:42:05', 0),
(7, 'A document', 6, 2, 2, 3, 4, 'Im speechless again', 'a-document.xlsx', '2020-04-06 14:43:22', 0),
(8, 'Another Video Resource', 2, 1, 1, 1, 2, 'Thislkjdhhd jfskjdsokjnj iojsnokfsnjcsok noan nsdkjnsk nnasna nnn nlnvlksnmcslknm lknalkxnzlnxzjnxakj nnaln lknnlknlkjn lnnALKNXALXN NLNAXNMLNL NLZNXKLNACLANA Nkjnscxkjncnk jnjsjljckjjlaknlcnln nlnclczlnxzlxlan lanxlanxlaxn ln.', 'another-video-resource.mp4', '2020-04-07 10:18:02', 0),
(9, 'Another Video Resource2', 2, 1, 1, 1, 2, 'Thislkjdhhd jfskjdsokjnj iojsnokfsnjcsok noan nsdkjnsk nnasna nnn nlnvlksnmcslknm lknalkxnzlnxzjnxakj nnaln lknnlknlkjn lnnALKNXALXN NLNAXNMLNL NLZNXKLNACLANA Nkjnscxkjncnk jnjsjljckjjlaknlc.', 'another-video-resource2.mp4', '2020-04-07 11:35:12', 0),
(10, 'Another Video Resource3', 2, 1, 1, 1, 2, 'Thislkjdhhd jfskjdsokjnj iojsnokfsnjcsok noan nsdkjnsk nnasna nnn nlnvlksnmcslknm lknalkxnzlnxzjnxakj nnaln lknnlknlkjn lnnALKNXALXN NLNAXNMLNL NLZNXKLNACLANA Nkjnscxkjncnk jnjsjljckjjlaknlc.', 'another-video-resource3.mp4', '2020-04-07 11:35:45', 0),
(11, 'Another Video Resource4', 2, 1, 1, 1, 2, 'Thislkjdhhd jfskjdsokjnj iojsnokfsnjcsok noan nsdkjnsk nnasna nnn nlnvlksnmcslknm lknalkxnzlnxzjnxakj nnaln lknnlknlkjn lnnALKNXALXN NLNAXNMLNL NLZNXKLNACLANA Nkjnscxkjncnk jnjsjljckjjlaknlc.', 'another-video-resource4.mp4', '2020-04-07 11:39:56', 0),
(12, 'New document', 2, 1, 1, 1, 4, 'Some description this is', 'new-document.xlsx', '2020-04-07 14:55:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resources_subscriptions`
--

CREATE TABLE `resources_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `category`) VALUES
(1, 'Material'),
(2, 'Video'),
(3, 'Textbook'),
(4, 'Document');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_comments`
--
ALTER TABLE `category_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code_2` (`course_code`,`course_title`),
  ADD KEY `course_code` (`course_code`,`course_title`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE (`faculty_id`, `department_id`, `level_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category_comments`
--
ALTER TABLE `news_category_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_subscriptions`
--
ALTER TABLE `news_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `verification_code` (`verification_code`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `resources_subscriptions`
--
ALTER TABLE `resources_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_comments`
--
ALTER TABLE `category_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_category_comments`
--
ALTER TABLE `news_category_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_subscriptions`
--
ALTER TABLE `news_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resources_subscriptions`
--
ALTER TABLE `resources_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
