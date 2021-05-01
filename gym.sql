-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 12:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Table structure for table `user`
--

CREATE TABLE user (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role varchar(255) NOT NULL,
  PRIMARY KEY(ID)
);
--
-- Table structure for table `instructor`
--
CREATE TABLE instructor (
  id_instructor int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  modality varchar(255) NOT NULL,
  status varchar(255) NOT NULL,
  PRIMARY KEY(id_instructor)
);
-- Table structure for table `gym`
--
CREATE TABLE gym (
  id int NOT NULL AUTO_INCREMENT,
  maromba varchar(255) NOT NULL,
  id_instructor int NOT NULL,
  typePlan varchar(255) NOT NULL,
  status varchar(255) NOT NULL,
  start_date date NOT NULL,
  expire_date date NOT NULL,
  PRIMARY KEY(ID),
  FOREIGN KEY (id_instructor) REFERENCES instructor(id_instructor)
);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
commit;