-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 02:45 PM
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
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `ISBN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `title`, `author`, `genre`, `publisher`, `ISBN`) VALUES
(1, 'The Chronicles of Narnia', 'C.S. Lewis', 'Fantasy', 'Geoffrey Bles', '978-0066238500'),
(2, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', 'George Allen & Unwin', '978-0618640157'),
(3, 'The Fault in Our Stars', 'John Green', 'Young Adult', 'Dutton Books', '978-0525478812'),
(4, 'The Shining', 'Stephen King', 'Horror', 'Doubleday', '978-0385121675'),
(5, 'The Alchemist', 'Paulo Coelho', 'Fiction', 'HarperCollins', '978-0062315007'),
(6, 'The Hunger Games', 'Suzanne Collins', 'Young Adult', 'Scholastic Press', '978-0439023481'),
(7, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 'George Allen & Unwin', '978-0547928227'),
(8, 'The Da Vinci Code', 'Dan Brown', 'Mystery', 'Doubleday', '978-0385504201'),
(9, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 'Little, Brown and Company', '978-0316769488'),
(10, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 'J.B. Lippincott & Co.', '978-0061120084'),
(11, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'Scribner', '978-0743273565'),
(12, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'Mystery', 'Norstedts Forlag', '978-0307269751'),
(13, 'Gone with the Wind', 'Margaret Mitchell', 'Historical Fiction', 'Macmillan Publishers', '978-1451635621'),
(14, 'War and Peace', 'Leo Tolstoy', 'Historical Fiction', 'The Russian Messenger', '978-1400079988'),
(15, 'The Road', 'Cormac McCarthy', 'Fiction', 'Alfred A. Knopf', '978-0307265432'),
(16, 'Kampung Boy', ' Lat (Mohammad Nor Khalid)', 'Graphic Novel, Memoir', 'Berita Publishing', '978-9679690042'),
(17, 'The Ghost Bride', 'Yangsze Choo', 'Historical Fiction', 'William Morrow', '978-0062227331'),
(18, 'The Rice Mother', 'Rani Manicka', 'Fiction', 'Penguin Books', '978-0140296376'),
(19, 'Land of the Dawn-lit Mountains', 'Antonia Bolingbroke-Kent', 'Travelogue', 'Summersdale Publishers', '978-1849539605'),
(20, 'Shallow Waters', 'Anita Amirrezvani', 'Historical Fiction', 'Viking Adult', '978-0670021480');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
