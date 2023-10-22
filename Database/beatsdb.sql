-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 09:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beatsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `AccessType` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`ID`, `UserName`, `AccessType`, `Password`) VALUES
(1, 'Admin', 'Full Access', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `albumsinfo`
--

CREATE TABLE `albumsinfo` (
  `AlbumID` int(11) NOT NULL,
  `AlbumName` varchar(50) NOT NULL,
  `AlbumCover` varchar(200) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `ArtistName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albumsinfo`
--

INSERT INTO `albumsinfo` (`AlbumID`, `AlbumName`, `AlbumCover`, `ArtistID`, `ArtistName`) VALUES
(1, 'Yours Truly', 'UploadsData/AlbumCover/AlbumCover.jpg', 2, 'Arijit Singh'),
(2, 'Killol', 'UploadsData/AlbumCover/Killol.jpg', 3, 'Kinjal Dave'),
(3, 'Moose Tape', 'UploadsData/AlbumCover/Moosetape.jpg', 4, 'Sidhu Moosewala'),
(4, 'Belive', 'UploadsData/AlbumCover/1665345407_AlbumCover.jpg', 5, 'Justin Beiber');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UID` int(11) NOT NULL,
  `Feedback` varchar(500) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `Email`, `UID`, `Feedback`, `Status`) VALUES
(1, 'KaushalBakraniya97@gmail.com', 7, 'Hello I am kaushal bakraniya i like beats music but i am not able to download all songs of albums at once it would be good if you can add this feature in next update.', 'Viewed'),
(2, 'KaushalBakraniya97@gmail.com', 7, 'Hello I am kaushal bakraniya it would be good if you can add this feature in next update.', 'Not Viewed');

-- --------------------------------------------------------

--
-- Table structure for table `otp_tbl`
--

CREATE TABLE `otp_tbl` (
  `OTP` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `songsinfo`
--

CREATE TABLE `songsinfo` (
  `ID` int(11) NOT NULL,
  `SongName` varchar(50) NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Downloads` int(11) NOT NULL,
  `ArtistID` int(10) NOT NULL,
  `ArtistName` varchar(50) NOT NULL,
  `AlbumName` varchar(50) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `FilePath` varchar(200) NOT NULL,
  `CoverPath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songsinfo`
--

INSERT INTO `songsinfo` (`ID`, `SongName`, `Language`, `Downloads`, `ArtistID`, `ArtistName`, `AlbumName`, `AlbumID`, `FilePath`, `CoverPath`) VALUES
(1, 'Kesariya', 'Hindi', 0, 2, 'Arijit Singh', 'Yours Truly', 1, 'UploadsData/MusicFiles/Kesariya.mp3', 'UploadsData/CoverPhotos/Kesariya.jpg'),
(2, 'Qaafirana', 'Hindi', 0, 2, 'Arijit Singh', 'Yours Truly', 1, 'UploadsData/MusicFiles/Qaafirana.mp3', 'UploadsData/CoverPhotos/Qaafirana.jpg'),
(3, 'Leri Lala', 'Gujrati', 0, 3, 'Kinjal Dave', 'Killol', 2, 'UploadsData/MusicFiles/Leri Lala.mp3', 'UploadsData/CoverPhotos/Leri Lala.Jpg'),
(4, 'Moj Ma', 'Gujrati', 0, 3, 'Kinjal Dave', 'Killol', 2, 'UploadsData/MusicFiles/Moj Ma.mp3', 'UploadsData/CoverPhotos/Moj Ma.jpg'),
(5, 'Same Beef', 'Punjabi', 0, 4, 'Sidhu Moosewala', 'Moose Tape', 3, 'UploadsData/MusicFiles/Same Beef.mp3', 'UploadsData/CoverPhotos/Same Beef.jpg'),
(6, 'Peaches', 'English', 0, 5, 'Justin Beiber', 'Belive', 4, 'UploadsData/MusicFiles/Peaches.mp3', 'UploadsData/CoverPhotos/AlbumCover.jpg'),
(7, 'Stay', 'English', 0, 5, 'Justin Beiber', 'Belive', 4, 'UploadsData/MusicFiles/Stay.mp3', 'UploadsData/CoverPhotos/Stay.png'),
(8, '295', 'Punjabi', 0, 4, 'Sidhu Moosewala', 'Moose Tape', 3, 'UploadsData/MusicFiles/295.mp3', 'UploadsData/CoverPhotos/295.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `ProfilePicture` varchar(200) NOT NULL,
  `Bio` varchar(175) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `Email`, `Gender`, `Type`, `ProfilePicture`, `Bio`, `Password`) VALUES
(1, 'BeatsMusic', 'admin@beatsmusic.com', 'Male', 'Artist', 'UploadsData/ProfilePictures/user.png', 'Official BeatsMusic Admin Account', '1111'),
(2, 'Arijit Singh', 'arijit@gmail.com', 'Male', 'Artist', 'UploadsData/ProfilePictures/Arijit Singh.jpg', 'Arijit Singh is an Indian singer and music composer. He sings predominantly in Bengali and Hindi, but has also performed in various other Indian languages. ', '1212'),
(3, 'Kinjal Dave', 'kd@gmail.com', 'Female', 'Artist', 'UploadsData/ProfilePictures/ProfilePicture.jpg', 'Kinjal Dave is an Indian folk singer and actor from Gujarat.', '1212'),
(4, 'Sidhu Moosewala', 'sdm@gmail.com', 'Male', 'Artist', 'UploadsData/ProfilePictures/sdm.jpg', 'Shubhdeep Singh Sidhu, better known by his stage name Sidhu Moose Wala, was an Indian singer, rapper, songwriter and actor associated with Punjabi music.', '1212'),
(5, 'Justin Beiber', 'jb@gmail.com', 'Male', 'Artist', 'UploadsData/ProfilePictures/justin.jpg', 'Justin Drew Bieber is a Canadian singer. Bieber is widely recognized for his genre-melding musicianship and has played an influential role in modern-day music.', '1212'),
(7, 'Kaushal', 'KaushalBakraniya97@gmail.com', 'Male', 'Basic User', 'UploadsData/ProfilePictures/Photo.png', 'Hello i am kaushal bakraniya and i am a music lover.', '1212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `albumsinfo`
--
ALTER TABLE `albumsinfo`
  ADD PRIMARY KEY (`AlbumID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `songsinfo`
--
ALTER TABLE `songsinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albumsinfo`
--
ALTER TABLE `albumsinfo`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songsinfo`
--
ALTER TABLE `songsinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
