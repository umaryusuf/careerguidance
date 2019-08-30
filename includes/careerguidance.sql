-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 01:13 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careerguidance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(250) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `photo`) VALUES
(1, 'Suleiman', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `career_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `career_title` varchar(255) NOT NULL,
  `career_keywords` varchar(255) NOT NULL,
  `career_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `course_id`, `career_title`, `career_keywords`, `career_desc`) VALUES
(1, 1, 'Accountant', 'account, accountant, banking, accounting', 'A person who keeps or inspects financial accounts. '),
(2, 2, 'Architect', 'design, architect, architecture, architectural, building', 'A person who designs buildings and supervises their construction or a person responsible for the invention or realization of something.'),
(3, 3, 'Bio Chemist', 'chemist, chemistry, biology, science, chemicals', 'A person who deals with the branch of science concerned with the chemical and physico-chemical processes which occur within living organisms.'),
(4, 4, 'Computer Engineer', 'computer, science, engineer, engineering, computing, teck', 'A computer engineer is a person who develop computer product, using well defined, scientific principles and methods.'),
(5, 5, 'Computer Scientist', 'computer, computer science, scientist, problem solver, problem solving', 'A  computer scientist is a person who is skilled at modifying problems for digital solutions.'),
(6, 5, 'Computer Programmer', 'computer, programmer, developer, programming, science, computer science, software, designer, developer, codes, coding', 'A computer programmer is someone who writes a sequence of instructions to guide the computer in performing a specific task.'),
(7, 5, 'Software Engineer', 'computer, programmer, developer, programming, science, computer science, software, designer, developer, codes, coding, engineer', 'Computer software engineers apply the principles and techniques of computer science, engineering, and mathematical analysis to the design, development, testing, and evaluation of the software and the systems that enable computers to perform their many applications.'),
(8, 5, 'computer data scientist', 'science, computer science, data, data analyst, programmer, developer, data science', 'Data science, also known as data-driven science, is an interdisciplinary field about scientific methods, processes, and systems to extract knowledge or insights from data in various forms, either structured or unstructured, similar to data mining.'),
(9, 6, 'Electrical Engineer', 'Electric, electrical, engineer, electronic, eclectricity', 'An electrical engineer is someone who designs and develops new electrical equipment, solves problems and tests equipment. They work with all kinds of electronic devices, from the smallest pocket devices to large supercomputers.');

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

CREATE TABLE `counselors` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counselors`
--

INSERT INTO `counselors` (`id`, `course_id`, `name`, `email`, `phone`, `password`) VALUES
(1, 1, 'Mr. Isaac Moses', 'isaacmoses@gmail.com', '06021345611', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 3, 'Mr. John Robert', 'johnrobert@gmail.com', '06087876565', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 4, 'Musa Bello', 'bellomusa@site.com', '06043214321', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 5, 'Muhammad Ahmad', 'mahmad@site.com', '06098765432', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 6, 'Mr. Sunusa Musa', 'smusa@site.com', '06023456712', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 5, 'Umar Farooq', 'umar@site.com', '08089897676', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 4, 'Jane Doe', 'jane@doe.com', '0978766576', 'a8c0d2a9d332574951a8e4a0af7d516f');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_desc`) VALUES
(1, 'Accounting', 'The action of keeping financial accounts. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora porro dicta inventore saepe veniam reiciendis, cupiditate quisquam distinctio.'),
(3, 'Biochemistry', 'The branch of science concerned with the chemical and physico-chemical processes which occur within living organisms. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora porro dicta inventore saepe veniam reiciendis, cupiditate quisquam distinctio.'),
(4, 'Computer Engineering', 'Computer engineering is all about developing products, using well defined, scientific principles and methods. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora porro dicta inventore saepe veniam reiciendis, cupiditate quisquam distinctio.'),
(5, 'Computer Science', 'Computer science is the study of problems, problem-solving, and the solutions that come out of the problem-solving process. Given a problem, a computer scientist&apos;s goal is to develop an algorithm, for solving any instance of the problem that might arise.'),
(6, 'Electronics Engineering', 'Electronic engineering is the branch of physics and technology concerned with the behaviour and movement of electrons, especially in semiconductors and gases. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora porro dicta inventore saepe veniam reiciendis, cupiditate quisquam distinctio.');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `institution_id` int(10) NOT NULL,
  `institution_name` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`institution_id`, `institution_name`, `website`) VALUES
(1, 'Kaduna State University (KASU)', 'https://www.kasu.edu.ng'),
(2, 'Ahmadu Bello University (ABU)', 'https://www.abu.edu.ng'),
(3, 'Bayero University Kano (BUK)', 'https://www.buk.edu.ng'),
(4, 'University Of Lagos (UNILAG)', 'https://www.unilag.edu.ng'),
(5, 'Kaduna State Polytechnic (KADPOLY)', 'https://www.kadpoly.edu.ng'),
(6, 'Villaria', 'https://www.villaria.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `content`, `viewed`) VALUES
(1, '1EJMPFR6LUg5QnxnFZUDsGrbX28EkEb3va', '6', 'Hello My I will like you to give me counsell on computer science', 0),
(2, '6', '1EJMPFR6LUg5QnxnFZUDsGrbX28EkEb3va', 'Hi Musa, Nice to meet you', 0),
(3, '1EJMPFR6LUg5QnxnFZUDsGrbX28EkEb3va', '6', 'Thanks for your feedback', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `req_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `jamb_subjects` varchar(250) NOT NULL,
  `jamb_score` int(11) NOT NULL,
  `waec_passes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`req_id`, `institution_id`, `course_id`, `jamb_subjects`, `jamb_score`, `waec_passes`) VALUES
(1, 1, 5, 'math, english, physics, chemistry or biology', 185, 'math, english, physics, chemistry, biology'),
(2, 1, 4, 'math, english, physics, chemistry or biology', 180, 'math, english, physics, chemistry, biology'),
(3, 2, 5, 'english, math, physic, chemistry or biology', 185, 'math, english, physics, chemistry, biology'),
(4, 3, 5, 'math, english, physics, chemistry or biology', 190, 'math, english, physics, chemistry, biology'),
(5, 5, 5, 'math, english, physics, chemistry or biology', 150, 'math, english, physics, chemistry, biology'),
(6, 4, 5, 'math, english, physics, chemistry or biology', 195, 'math, english, physics, chemistry, biology');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `email`, `phone`, `password`, `student_id`) VALUES
(1, 'Sani Musa', 'sanimusa@site.com', '0809898980', '5f4dcc3b5aa765d61d8327deb882cf99', '1EJMPFR6LUg5QnxnFZUDsGrbX28EkEb3va');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `counselors`
--
ALTER TABLE `counselors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`institution_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `counselors`
--
ALTER TABLE `counselors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `institution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
