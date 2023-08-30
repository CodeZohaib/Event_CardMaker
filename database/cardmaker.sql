-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 05:56 AM
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
-- Database: `cardmaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `anniversary`
--

CREATE TABLE `anniversary` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bg_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_style` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `font_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `background_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anniversary`
--

INSERT INTO `anniversary` (`id`, `u_id`, `title`, `name`, `subtitle`, `footer`, `message`, `title_bg_color`, `font_color`, `font_style`, `font_size`, `background_img`) VALUES
(2, 1, 'Anniversary ', 'Rida Khan', 'Celebrating Our Love', 'With My Love', 'My love for you is everlasting. Cheers to another year with my favorite person', '#ffffff', '#554949', 'Comic Sans MS,cursive,sans-serif', '', '1336_istockphoto-1316586896-612x612.jpg'),
(3, 1, 'HAPPY ANNIVERSARY!', 'Zohaib Khan', 'Celebrating', 'With love', 'I know everyone says that they\'re the luckiest person in the world, but I truly am the luckiest in the world. Because I have you!', '#f7f7f7', '#565252', 'Comic Sans MS,cursive,sans-serif', '20px', '7708_pngtree-wedding-card-02i35715eps-anniversary-announcement-image_1101152.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bg_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_style` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '  ',
  `font_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `background_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `u_id`, `title`, `name`, `DOB`, `subtitle`, `message`, `footer`, `title_bg_color`, `font_color`, `font_style`, `font_size`, `background_img`) VALUES
(1, 1, 'Happy Birthday', 'ZOHAIB KHAN', '19-03-1999', 'Wishing you a fantastic day filled with joy and happiness.', 'May all your dreams and wishes come true.', 'Best wishes from all of us!', '#f89696', '#aeff00', 'Comic Sans MS,cursive,sans-serif', '16px', '3347_pexels-photo-1793037.jpg'),
(2, 1, 'Happy Birthday Brother', 'Rizwan Khan', '13-06-1998', 'Wishing you the biggest slice of happy today.', 'Hope all your birthday wishes come true', 'It\'s your special day — get out there and celebrate', '#796be1', '#c6ff70', 'Arial Black,Gadget,sans-serif', '12px', '2595_istockphoto-1136810581-612x612.jpg'),
(3, 1, 'Happy Birthday Friends', 'Faizan Khan', '20-04-1995', 'Wishing you a fantastic day filled with joy and happiness.', 'May all your dreams and wishes come true', 'Happy Birthday', '#39ea9d', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '16px', '4724_adi-goldstein-Hli3R6LKibo-unsplash.jpg'),
(4, 3, 'Happy Birthday Sister', 'Rida Khan', '18-09-1996', 'Wishing you a fantastic day filled with joy and happiness', 'May all your dreams and wishes come true', 'Best wishes from all of us', '#11ff00', '#0d5928', 'Comic Sans MS,cursive,sans-serif', '14px', '8246.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `eid`
--

CREATE TABLE `eid` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bg_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_style` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eid`
--

INSERT INTO `eid` (`id`, `u_id`, `title`, `message`, `title_bg_color`, `font_color`, `font_style`, `font_size`, `background_img`, `add_img`) VALUES
(3, 1, 'Eid Mubarak Brother', 'May God’s blessings and kindness be with you and your family', '#000000', '#ffffff', 'Arial Black,Gadget,sans-serif', '12px', '5994_polygon-material-design-abstract-3d-wallpaper-preview.jpg', '9702_1885_pedram-normohamadian-M3-eH4_UNpQ-unsplash.jpg'),
(4, 1, 'Eid Mubarak Friend', 'I wish you Allah\'s blessings. Eid Mubarak!', '#080808', '#ffffff', ' ', ' ', '2763_full-screen-stylish-cb-background-instagram-background-hd-min-819x1024.jpg', '7717_2481_antoine-transon-z8mpTt1sdC8-unsplash.jpg'),
(5, 3, 'Eid Mubarak Friend', 'Sending you warm wishes and happiness on the occasion of Eid. Remember me in your prayers', '#000000', '#ffffff', 'Arial Black,Gadget,sans-serif', '12px', '7062_360_F_482132893_BQQGxkmjky0wGAZbMjXAQ3niCMUpUPhH.jpg', '1934_5137_Free-Stylish-Boy-Whatsapp-Dp-Wallpaper.jpg'),
(7, 1, 'Eid Mubarak', 'May this day be the start of another victorious year in life. Eid Mubarak to you and everyone in your family!', '#f7f7f7', '#000000', ' ', ' ', '', '1211_5564_teahub.io-handsome-boy-wallpaper-1087853(1).jpg'),
(8, 1, 'Eid Mubarak', 'Wishing you joy, peace, and prosperity on this auspicious occasion of Eid.', '#f7f7f7', '#000000', 'Comic Sans MS,cursive,sans-serif', ' ', '', '8679_5747_stephanie-nakagawa-ADSKIn0ScDg-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thankyou`
--

CREATE TABLE `thankyou` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thankyou`
--

INSERT INTO `thankyou` (`id`, `u_id`, `title`, `message`, `font_color`, `font_style`, `font_size`, `background_img`) VALUES
(2, 1, 'Thank You!', 'We appreciate your support.', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '16px', '4352_jakob-rosen-aE06GhEat1Q-unsplash.jpg'),
(3, 1, 'Thank You Sister', 'We appreciate your support thank you', '#000000', 'Arial Black,Gadget,sans-serif', '12px', '3885_morgan-lane-18N4okmWccM-unsplash.jpg'),
(5, 5, 'Thank You Brother', 'I appreciate your taking the time', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '20px', '3556_VectorGraphicsDesignBackgroundHdBestOfNewDesktopWallpaper.jpg'),
(6, 1, 'Thank You', 'It was very thoughtful of you', '#ffffff', '  ', '  ', '3080_VectorGraphicsDesignBackgroundHdBestOfNewDesktopWallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`) VALUES
(1, 'Huzaifa Bin Afzal', 'huzaifa@gmail.com', 'Khan@1234', '5833_pexels-max-fischer-5212345.jpg'),
(3, 'hamza', 'hamza@gmail.com', 'Khan@1234', '7267_1208921.jpg'),
(4, 'noor ali', 'noor@gmail.com', 'Khan@1234', '6842_1216483.png'),
(5, 'faizan khan', 'faizan@gmail.com', 'Khan@1234', '5507_5747_stephanie-nakagawa-ADSKIn0ScDg-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitingcard`
--

CREATE TABLE `visitingcard` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `github_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_style` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitingcard`
--

INSERT INTO `visitingcard` (`id`, `u_id`, `name`, `profession`, `email`, `phone_no`, `address`, `background_img`, `website_link`, `twitter_link`, `facebook_link`, `linkedin_link`, `github_link`, `font_color`, `font_style`, `font_size`, `add_img`) VALUES
(4, 1, 'Rizwan Khan', 'Web Developer', 'rizwan@gmail.com', '03009087654', 'Nowshera', '7852_5643_michael-dam-mEZ3PoFGs_k-unsplash.jpg', 'www.rizwan.com', 'a', '0', 'b', '', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '14px', '6848_5137_Free-Stylish-Boy-Whatsapp-Dp-Wallpaper.jpg'),
(6, 1, 'Rida Khan', 'Teacher', 'rida@gmail.com', '03138767876', 'Nowshera Hakeemabad ', '1982_white-rainforest-JHVLDegi89s-unsplash.jpg', 'www.rida95teacher.com', 'a', 'https://www.facebook.com/', 'c', 'd', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '12px', '6280_5643_michael-dam-mEZ3PoFGs_k-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occasion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rsvp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bg_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fontColor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fontStyle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fontSize` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `u_id`, `title`, `name`, `occasion`, `date`, `time`, `location`, `message`, `rsvp`, `email`, `background_img`, `title_bg_color`, `fontColor`, `fontStyle`, `fontSize`) VALUES
(5, 1, 'Wedding ', 'Mr. Zohaib & Miss Jane Smith', 'Getting married', '18-07-2023', '12:51 AM to 3:51 AM', 'Dheri Katti Khel Nowshera', 'Celebrating our special day', 'RSVP by December 1, 2023', 'kzohaib935@gmail.com', '1497_polygon-material-design-abstract-3d-wallpaper-preview.jpg', '#a9a2a2', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '16px'),
(6, 1, 'Wedding', 'Mr. Hamza & Miss Jane', 'Getting married', '18-07-2023', '12:51 AM to 3:51 AM', 'Dheri Katti Khel Nowshera', 'Please join us in celebrating', 'December 1, 2024', 'kzohaib935@gmail.com', '1323_1062925.jpg', '#cf6868', '#ffffff', 'Comic Sans MS,cursive,sans-serif', '16px'),
(7, 3, 'Wedding Party', 'Mr. Hamza Khan', 'Getting Married Party', 'January 1, 2024', '2:51 AM to 4:51 AM', 'Peshware', 'Celebrating Our Special Day', 'December 1, 2024', 'Hamza@gmail.com', '1919_1171186.jpg', '#5b2a2a', '#fafafa', 'Trebuchet MS,Helvetica,sans-serif', '16px');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eid`
--
ALTER TABLE `eid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thankyou`
--
ALTER TABLE `thankyou`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitingcard`
--
ALTER TABLE `visitingcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anniversary`
--
ALTER TABLE `anniversary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eid`
--
ALTER TABLE `eid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thankyou`
--
ALTER TABLE `thankyou`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitingcard`
--
ALTER TABLE `visitingcard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
