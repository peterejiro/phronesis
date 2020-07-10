-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihumane`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_code` text NOT NULL,
  `bank_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_code`, `bank_name`) VALUES
(2, '506', 'First Bank of Nigeria'),
(6, '', 'Heritage Bank of Nigeria'),
(7, '000013', 'GT Bank');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Maintenance department'),
(2, 'Software Development'),
(3, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `emolument_report`
--

CREATE TABLE `emolument_report` (
  `emolument_report_id` int(11) NOT NULL,
  `emolument_report_employee_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_unique_id` text NOT NULL,
  `employee_first_name` text NOT NULL,
  `employee_other_name` text DEFAULT NULL,
  `employee_last_name` text NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_personal_email` text NOT NULL,
  `employee_official_email` text DEFAULT NULL,
  `employee_phone_number` text NOT NULL,
  `employee_qualification` text NOT NULL,
  `employee_address` text NOT NULL,
  `employee_location_id` text NOT NULL,
  `employee_subsidiary_id` text NOT NULL,
  `employee_job_role_id` text NOT NULL,
  `employee_grade_id` text NOT NULL,
  `employee_account_number` text NOT NULL,
  `employee_bank_id` text NOT NULL,
  `employee_hmo_number` text DEFAULT NULL,
  `employee_hmo_id` text DEFAULT NULL,
  `employee_pensionable` int(11) NOT NULL,
  `employee_pension_number` text DEFAULT NULL,
  `employee_pension_id` text DEFAULT NULL,
  `employee_paye_number` text NOT NULL,
  `employee_passport` text NOT NULL,
  `employee_nysc_details` text NOT NULL,
  `employee_nysc_document` text NOT NULL,
  `employee_employment_date` date NOT NULL,
  `employee_status` int(11) NOT NULL COMMENT '0 ==  Fired \r\n1 == Probationary\r\n2 == Confirmed\r\n3 ==  Retired',
  `employee_stop_date` date DEFAULT NULL,
  `employee_salary_structure_setup` int(11) NOT NULL DEFAULT 0 COMMENT '0 == not setup, 1 == setup',
  `employee_salary_structure_category` int(11) NOT NULL COMMENT '0 == personalize, any other value, categorized'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_unique_id`, `employee_first_name`, `employee_other_name`, `employee_last_name`, `employee_dob`, `employee_personal_email`, `employee_official_email`, `employee_phone_number`, `employee_qualification`, `employee_address`, `employee_location_id`, `employee_subsidiary_id`, `employee_job_role_id`, `employee_grade_id`, `employee_account_number`, `employee_bank_id`, `employee_hmo_number`, `employee_hmo_id`, `employee_pensionable`, `employee_pension_number`, `employee_pension_id`, `employee_paye_number`, `employee_passport`, `employee_nysc_details`, `employee_nysc_document`, `employee_employment_date`, `employee_status`, `employee_stop_date`, `employee_salary_structure_setup`, `employee_salary_structure_category`) VALUES
(7, 'ihumane_qt5', 'Ejiroghene', '', 'Oki-petereeeee', '1996-06-16', 'peterejiro96@gmail.com', 'oki-peter@connexxiongroup.com', '(080) 9094-5451', '[\"1\"]', 'bwari', '1', '1', '1', '2', '0150176481', '2', 'pc_fct_3571', '1', 1, '0154175960', '1', '01501746575', '252221390125c3f1a435c6e2c0ad793a.jpg', 'FC19B3571', 'c6ea91ed4f42920eccc280ee0317124a.pdf', '2020-05-14', 2, '2020-06-07', 1, 1),
(8, 'ihumane_3ag', 'Ogheneovie', '', 'Oki-Peter', '1998-05-02', 'ovie@gmail.com', 'ovie@test.com', '(080) 3355-3769', '[\"1\"]', 'Bwari - Fct', '1', '1', '2', '1', '0150176489', '6', 'oki-91', '1', 1, '21321321321', '1', '2321321321321', 'd5a4062d6904d862eb2cc8f13d141d49.png', 'FC19B3571', '170e02227fc749d5ffbfd7090746d4bd.pdf', '2020-05-25', 2, '2020-06-07', 1, 1),
(9, 'ihumane_IRE', 'Olalekan', 'Sulaiman', 'Hassan', '1996-06-16', 'haslek@gmail.com', 'has@connexxiongroup.com', '(070) 6076-4410', '[\"1\"]', 'asaba', '1', '1', '2', '1', '0150176481', '7', '', '0', 1, '0150176481', '1', '', 'fdb1e14fac1f80d55ec080d61dac47e6.png', 'nysc2343_ben', '07d9aeea60e044fbcd27a688df0e75d9.png', '2020-06-08', 1, '0000-00-00', 1, 0),
(10, 'ihumane_Xxd', 'Rachael', '', 'Ashaolu', '2020-06-29', 'rachaelashaolu@gmail.com', 'ashaolu.rachael@connexxiongroup.com', '0803 355 3769', '[\"1\"]', 'Ibadan, Nigeria', '2', '1', '2', '1', '0150176481', '7', '', '0', 0, '', '', '', '78479059bd78977bee2a2fe2b6d3e987.jpeg', 'test', '2b998afbe75ede7178e793f95b2a70d0.pdf', '2020-06-29', 2, '2020-07-09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_appraisal`
--

CREATE TABLE `employee_appraisal` (
  `employee_appraisal_id` int(11) NOT NULL,
  `employee_appraisal_employee_id` int(11) NOT NULL,
  `employee_appraisal_period_from` date NOT NULL,
  `employee_appraisal_period_to` date NOT NULL,
  `employee_appraisal_supervisor_id` int(11) NOT NULL,
  `employee_appraisal_self` int(11) NOT NULL DEFAULT 0,
  `employee_appraisal_supervisor` int(11) NOT NULL DEFAULT 0,
  `employee_appraisal_qualitative` int(11) NOT NULL DEFAULT 0,
  `employee_appraisal_quantitative` int(11) NOT NULL DEFAULT 0,
  `employee_appraisal_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_appraisal`
--

INSERT INTO `employee_appraisal` (`employee_appraisal_id`, `employee_appraisal_employee_id`, `employee_appraisal_period_from`, `employee_appraisal_period_to`, `employee_appraisal_supervisor_id`, `employee_appraisal_self`, `employee_appraisal_supervisor`, `employee_appraisal_qualitative`, `employee_appraisal_quantitative`, `employee_appraisal_status`) VALUES
(2, 10, '2020-07-03', '2021-07-12', 7, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_appraisal_result`
--

CREATE TABLE `employee_appraisal_result` (
  `employee_appraisal_result_id` int(11) NOT NULL,
  `employee_appraisal_result_appraisal_id` int(11) NOT NULL,
  `employee_appraisal_result_type` text NOT NULL COMMENT '1 == employee comment\r\n2 == quantitative\r\n3 == qualitative\r\n4 == supervisor comment',
  `employee_appraisal_result_question` text NOT NULL,
  `employee_appraisal_result_answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_appraisal_result`
--

INSERT INTO `employee_appraisal_result` (`employee_appraisal_result_id`, `employee_appraisal_result_appraisal_id`, `employee_appraisal_result_type`, `employee_appraisal_result_question`, `employee_appraisal_result_answer`) VALUES
(1, 2, '1', 'State the various jobs you handled during the appraisal period?', 'i cooked'),
(2, 2, '1', '<p> Which aspect of your job experience do you find most challenging and interesting?</p>', 'i wasshed'),
(3, 2, '2', '   <p>    <i><b>Which language is most difficult for you;</b></i></p><p>C or PHP?<br></p>', '5'),
(4, 2, '2', ' What is your favorite style of programming?<br>', '4'),
(5, 2, '3', '  Quality of Work - Accuracy skill, thoroughness, neatness, error free etc<br>', '3'),
(6, 2, '4', '  What is your impression of this employees?<br>', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `employee_history_id` int(11) NOT NULL,
  `employee_history_employee_id` int(11) NOT NULL,
  `employee_history_details` text NOT NULL,
  `employee_history_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`employee_history_id`, `employee_history_employee_id`, `employee_history_details`, `employee_history_date`) VALUES
(1, 10, 'Leave Application', '2020-07-02'),
(2, 10, 'Leave Application', '2020-07-02'),
(3, 10, 'Leave Updated', '2020-07-03'),
(4, 10, 'Leave Discarded', '2020-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `employee_leave_id` int(11) NOT NULL,
  `leave_employee_id` int(11) NOT NULL,
  `leave_leave_type` text NOT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date NOT NULL,
  `leave_status` text NOT NULL COMMENT '0 == pending\r\n1 == running\r\n2 == finished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`employee_leave_id`, `leave_employee_id`, `leave_leave_type`, `leave_start_date`, `leave_end_date`, `leave_status`) VALUES
(1, 9, '1', '2020-05-25', '2020-07-31', '1'),
(2, 8, '1', '2020-06-26', '2020-06-25', '1'),
(4, 10, '1', '2020-07-02', '2020-07-31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`) VALUES
(1, 'Level 1'),
(2, 'Level 2');

-- --------------------------------------------------------

--
-- Table structure for table `health_insurance`
--

CREATE TABLE `health_insurance` (
  `health_insurance_id` int(11) NOT NULL,
  `health_insurance_hmo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_insurance`
--

INSERT INTO `health_insurance` (`health_insurance_id`, `health_insurance_hmo`) VALUES
(1, 'National Health Insurance Scheme');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incident_id` int(11) NOT NULL,
  `incident_employee_id` int(11) NOT NULL,
  `incident_subject` int(11) NOT NULL,
  `incident_body` int(11) NOT NULL,
  `incident_date` int(11) NOT NULL,
  `incident_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_role`
--

CREATE TABLE `job_role` (
  `job_role_id` int(11) NOT NULL,
  `job_name` text NOT NULL,
  `job_description` text NOT NULL,
  `department_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_role`
--

INSERT INTO `job_role` (`job_role_id`, `job_name`, `job_description`, `department_id`) VALUES
(1, 'Lead Engineers', ' Coordination', '1'),
(2, 'Junior Software Developer', 'rubbish', '2');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leave_id` int(11) NOT NULL,
  `leave_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leave_id`, `leave_name`) VALUES
(1, 'Study Leave'),
(2, 'Maternity Leave'),
(3, 'Casual Leave'),
(5, 'Annual Leave'),
(7, 'Paternity Leave'),
(8, 'test leave'),
(9, 'A Leave');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `loan_employee_id` int(11) NOT NULL,
  `loan_payment_definition_id` int(11) NOT NULL,
  `loan_amount` double NOT NULL,
  `loan_start_year` int(11) NOT NULL,
  `loan_start_month` int(11) NOT NULL,
  `loan_end_year` int(11) NOT NULL,
  `loan_end_month` int(11) NOT NULL,
  `loan_installments` int(11) NOT NULL,
  `loan_skip_year` int(11) DEFAULT NULL,
  `loan_skip_month` int(11) DEFAULT NULL,
  `loan_monthly_repayment` double NOT NULL,
  `loan_balance` double NOT NULL,
  `loan_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `loan_employee_id`, `loan_payment_definition_id`, `loan_amount`, `loan_start_year`, `loan_start_month`, `loan_end_year`, `loan_end_month`, `loan_installments`, `loan_skip_year`, `loan_skip_month`, `loan_monthly_repayment`, `loan_balance`, `loan_status`) VALUES
(3, 7, 5, 100000, 2020, 7, 2020, 8, 10, NULL, NULL, 50000, 50000, 0),
(4, 9, 5, 500000, 2020, 7, 2021, 4, 10, NULL, NULL, 50000, 500000, 0),
(5, 7, 5, 150000, 2020, 8, 2023, 1, 30, NULL, NULL, 5000, 150000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayment`
--

CREATE TABLE `loan_repayment` (
  `loan_repayment_id` int(11) NOT NULL,
  `loan_repayment_loan_id` int(11) NOT NULL,
  `loan_repayment_amount` double NOT NULL,
  `loan_repayment_type` int(11) NOT NULL COMMENT '1 == credit, 2 == debit',
  `loan_repayment_payroll_month` int(11) NOT NULL,
  `loan_repayment_payroll_year` int(11) NOT NULL,
  `loan_repayment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_repayment`
--

INSERT INTO `loan_repayment` (`loan_repayment_id`, `loan_repayment_loan_id`, `loan_repayment_amount`, `loan_repayment_type`, `loan_repayment_payroll_month`, `loan_repayment_payroll_year`, `loan_repayment_date`) VALUES
(17, 3, 50000, 1, 6, 2020, '2020-06-24 11:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `loan_reschedule_log`
--

CREATE TABLE `loan_reschedule_log` (
  `loan_log_id` int(11) NOT NULL,
  `loan_log_loan_id` int(11) NOT NULL,
  `loan_log_reschedule_type` int(11) NOT NULL COMMENT '0 == month reschedule\r\n\r\n1 = repayment amount reschedule',
  `loan_log_reschedule_amount` double DEFAULT NULL,
  `loan_log_loan_balance` double NOT NULL,
  `loan_log_skip_month` int(11) DEFAULT NULL,
  `loan_log_skip_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_reschedule_log`
--

INSERT INTO `loan_reschedule_log` (`loan_log_id`, `loan_log_loan_id`, `loan_log_reschedule_type`, `loan_log_reschedule_amount`, `loan_log_loan_balance`, `loan_log_skip_month`, `loan_log_skip_year`) VALUES
(1, 3, 0, NULL, 100000, 6, 2020),
(2, 3, 1, 20000, 100000, NULL, NULL),
(3, 3, 1, 10000, 100000, NULL, NULL),
(4, 3, 1, 10000, 90000, NULL, NULL),
(5, 3, 1, 50000, 90000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Lagos - Eti Osa 1'),
(2, 'Abuja'),
(3, 'Port Harcourt 1');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_user_id` text NOT NULL,
  `log_description` text NOT NULL,
  `log_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_user_id`, `log_description`, `log_date`) VALUES
(1, '4', 'Updated Loan Repayment', '2020-06-10 00:00:00'),
(2, '4', 'Logged In', '2020-06-11 00:00:00'),
(3, '4', 'Added New Payment Definition', '2020-06-11 00:00:00'),
(4, '4', 'Added New Allowance', '2020-06-11 00:00:00'),
(5, '4', 'Logged In', '2020-06-11 11:46:44'),
(6, '4', 'Logged Out', '2020-06-11 11:48:09'),
(7, '4', 'Logged Out', '2020-06-11 11:49:20'),
(8, '4', 'Logged In', '2020-06-11 11:51:18'),
(9, '4', 'Added New Minimum Tax Rate', '2020-06-11 13:12:47'),
(10, '4', 'Updated Minimum Tax Rate', '2020-06-11 13:23:15'),
(11, '4', 'Updated Minimum Tax Rate', '2020-06-11 13:23:25'),
(12, '4', 'Updated Minimum Tax Rate', '2020-06-11 13:23:36'),
(13, '4', 'Added New Pension Rate', '2020-06-11 13:55:59'),
(14, '4', 'Updated Pension Rate', '2020-06-11 14:05:04'),
(15, '4', 'Updated Pension Rate', '2020-06-11 14:05:14'),
(16, '4', 'Updated Pension Rate', '2020-06-11 14:05:21'),
(17, '4', 'Updated Minimum Tax Rate', '2020-06-11 14:08:22'),
(18, '4', 'Logged In', '2020-06-15 09:28:13'),
(19, '4', 'Updated Payment Definition', '2020-06-15 09:55:51'),
(20, '4', 'Update Employee Record', '2020-06-15 10:50:43'),
(21, '4', 'Added New Payment Definition', '2020-06-15 10:56:11'),
(22, '4', 'Added New Payment Definition', '2020-06-15 10:57:07'),
(23, '4', 'Logged In', '2020-06-15 20:07:25'),
(24, '4', 'Logged In', '2020-06-17 11:17:31'),
(25, '4', 'Logged In', '2020-06-18 09:21:24'),
(26, '4', 'Logged Out', '2020-06-18 09:30:46'),
(27, '4', 'Logged In', '2020-06-18 09:31:24'),
(28, '4', 'Logged Out', '2020-06-18 11:59:09'),
(29, '4', 'Logged In', '2020-06-18 11:59:25'),
(30, '4', 'Logged In', '2020-06-18 14:55:48'),
(31, '4', 'Logged Out', '2020-06-18 14:57:35'),
(32, '4', 'Logged In', '2020-06-19 15:32:13'),
(33, '4', 'Logged In', '2020-06-22 08:50:09'),
(34, '4', 'Logged Out', '2020-06-22 09:35:40'),
(35, '4', 'Logged In', '2020-06-22 09:37:48'),
(36, '4', 'Logged Out', '2020-06-22 14:26:16'),
(37, '4', 'Logged In', '2020-06-22 14:26:41'),
(38, '4', 'Added New Department', '2020-06-22 14:30:27'),
(39, '4', 'Updated Salary Allowance', '2020-06-22 14:39:06'),
(40, '4', 'Added New Allowance', '2020-06-22 14:39:48'),
(41, '4', 'Added New Employee', '2020-06-22 14:44:58'),
(42, '4', 'Add Employee Salary Structure', '2020-06-22 14:47:37'),
(43, '4', 'Logged In', '2020-06-23 08:48:49'),
(44, '4', 'Ran Payroll Routine', '2020-06-23 11:26:02'),
(45, '4', 'Approved Payroll Routine', '2020-06-23 11:26:10'),
(46, '4', 'Logged Out', '2020-06-23 11:43:13'),
(47, '4', 'Logged In', '2020-06-23 11:43:28'),
(48, '4', 'Updated User', '2020-06-23 11:46:34'),
(49, '5', 'Logged In', '2020-06-23 11:46:44'),
(50, '5', 'Updated User', '2020-06-23 11:48:42'),
(51, '5', 'Updated User', '2020-06-23 11:50:36'),
(52, '5', 'Updated User', '2020-06-23 11:50:52'),
(53, '5', 'Updated User', '2020-06-23 11:51:40'),
(54, '5', 'Updated User', '2020-06-23 11:51:54'),
(55, '5', 'Updated User', '2020-06-23 12:01:50'),
(56, '5', 'Updated User', '2020-06-23 12:01:59'),
(57, '5', 'Updated Loan Repayment', '2020-06-23 16:03:59'),
(58, '5', 'Updated Loan Repayment', '2020-06-23 16:04:35'),
(59, '4', 'Logged In', '2020-06-24 10:14:56'),
(60, '4', 'Updated Bank Details', '2020-06-24 10:34:25'),
(61, '4', 'Initiated Loan Application', '2020-06-24 11:28:49'),
(62, '4', 'Ran Payroll Routine', '2020-06-24 11:36:47'),
(63, '4', 'Approved Payroll Routine', '2020-06-24 11:37:55'),
(64, '4', 'Updated Bank Details', '2020-06-24 11:59:26'),
(65, '4', 'Logged Out', '2020-06-24 13:15:51'),
(66, '4', 'Logged In', '2020-06-24 14:51:41'),
(67, '4', 'Logged Out', '2020-06-24 14:51:59'),
(68, '4', 'Logged In', '2020-06-24 15:22:41'),
(69, '4', 'Logged Out', '2020-06-24 15:22:46'),
(70, '4', 'Logged In', '2020-06-24 15:41:59'),
(71, '4', 'Logged Out', '2020-06-24 15:42:07'),
(72, '4', 'Logged In', '2020-06-24 15:51:06'),
(73, '5', 'Logged In', '2020-06-24 16:03:39'),
(74, '5', 'Logged Out', '2020-06-24 16:03:44'),
(75, '5', 'Logged In', '2020-06-24 16:04:20'),
(76, '4', 'Logged Out', '2020-06-24 16:34:48'),
(77, '4', 'Logged In', '2020-06-24 16:35:21'),
(78, '5', 'Logged Out', '2020-06-24 16:53:03'),
(79, '5', 'Logged In', '2020-06-24 16:53:17'),
(80, '5', 'Logged Out', '2020-06-24 16:55:55'),
(81, '4', 'Logged Out', '2020-06-24 17:04:50'),
(82, '4', 'Logged In', '2020-06-24 17:07:14'),
(83, '4', 'Logged In', '2020-06-24 20:02:45'),
(84, '4', 'Update Employee Record', '2020-06-24 20:26:15'),
(85, '4', 'Logged Out', '2020-06-24 20:42:28'),
(86, '4', 'Logged In', '2020-06-24 20:42:56'),
(87, '4', 'Update Employee Record', '2020-06-24 20:51:32'),
(88, '4', 'Update Employee Record', '2020-06-24 20:53:15'),
(89, '4', 'Logged Out', '2020-06-24 22:25:04'),
(90, '4', 'Logged In', '2020-06-24 22:25:50'),
(91, '4', 'Logged In', '2020-06-25 08:19:07'),
(92, '5', 'Logged In', '2020-06-25 08:52:32'),
(93, '4', 'Logged Out', '2020-06-25 09:40:08'),
(94, '4', 'Logged In', '2020-06-25 09:53:51'),
(95, '5', 'Logged In', '2020-06-25 10:09:12'),
(96, '5', 'Logged Out', '2020-06-25 10:17:39'),
(97, '5', 'Logged Out', '2020-06-25 10:18:22'),
(98, '4', 'Logged In', '2020-06-25 10:26:07'),
(99, '4', 'Logged Out', '2020-06-25 10:26:45'),
(100, '4', 'Logged In', '2020-06-25 10:28:03'),
(101, '4', 'Logged Out', '2020-06-25 10:29:03'),
(102, '4', 'Logged In', '2020-06-25 10:32:47'),
(103, '4', 'Logged Out', '2020-06-25 10:33:15'),
(104, '4', 'Logged In', '2020-06-25 11:55:40'),
(105, '4', 'Logged Out', '2020-06-25 15:07:35'),
(106, '4', 'Logged In', '2020-06-26 08:19:20'),
(107, '5', 'Logged In', '2020-06-26 10:55:11'),
(108, '5', 'Logged Out', '2020-06-26 10:55:46'),
(109, '5', 'Logged In', '2020-06-26 10:56:08'),
(110, '4', 'Logged In', '2020-06-26 11:26:37'),
(111, '4', 'Added A New Subsidiary', '2020-06-26 11:28:49'),
(112, '4', 'Update Employee Record', '2020-06-26 12:56:03'),
(113, '4', 'Added A New Leave Type', '2020-06-26 14:34:34'),
(114, '4', 'Updated A Leave Type', '2020-06-26 14:35:04'),
(115, '4', 'Initiated Employee Transfer', '2020-06-26 16:39:54'),
(116, '4', 'Logged Out', '2020-06-26 16:54:59'),
(117, '4', 'Logged In', '2020-06-26 16:55:25'),
(118, '4', 'Logged In', '2020-06-29 10:19:50'),
(119, '4', 'Initiated Employee Transfer', '2020-06-29 14:21:19'),
(120, '4', 'Added A New Branch', '2020-06-29 15:43:25'),
(121, '4', 'Added A New Branch', '2020-06-29 15:43:46'),
(122, '4', 'Initiated Employee Transfer', '2020-06-29 16:47:52'),
(123, '4', 'Initiated Employee Transfer', '2020-06-29 16:48:34'),
(124, '4', 'Updated Employee Leave', '2020-06-29 16:56:01'),
(125, '4', 'Logged In', '2020-06-30 08:44:19'),
(126, '4', 'Added A New Leave Type', '2020-06-30 08:44:37'),
(127, '4', 'Logged Out', '2020-06-30 08:45:50'),
(128, '4', 'Logged In', '2020-06-30 08:45:58'),
(129, '4', 'Added A New Leave Type', '2020-06-30 08:46:15'),
(130, '4', 'Added A New Leave Type', '2020-06-30 08:46:15'),
(131, '4', 'Logged Out', '2020-06-30 08:46:53'),
(132, '4', 'Logged In', '2020-06-30 08:48:51'),
(133, '4', 'Added A New Leave Type', '2020-06-30 08:49:06'),
(134, '4', 'Added A New Leave Type', '2020-06-30 08:49:06'),
(135, '5', 'Logged In', '2020-06-30 08:49:26'),
(136, '4', 'Logged Out', '2020-06-30 08:50:09'),
(137, '5', 'Logged Out', '2020-06-30 08:50:52'),
(138, '5', 'Logged In', '2020-06-30 08:51:00'),
(139, '5', 'Added A New Leave Type', '2020-06-30 08:51:16'),
(140, '5', 'Logged Out', '2020-06-30 08:51:31'),
(141, '5', 'Logged In', '2020-06-30 08:52:48'),
(142, '5', 'Added A New Leave Type', '2020-06-30 08:55:09'),
(143, '5', 'Logged Out', '2020-06-30 08:57:20'),
(144, '5', 'Logged In', '2020-06-30 09:02:20'),
(145, '5', 'Added A New Leave Type', '2020-06-30 09:02:46'),
(146, '5', 'Logged Out', '2020-06-30 09:03:16'),
(147, '4', 'Logged In', '2020-06-30 09:32:42'),
(148, '4', 'Initiated Employee Transfer', '2020-06-30 09:47:03'),
(149, '4', 'Initiated Employee Transfer', '2020-06-30 09:47:15'),
(150, '4', 'Initiated Employee Transfer', '2020-06-30 11:57:05'),
(151, '4', 'Added A New Self Assessment Question', '2020-06-30 14:34:28'),
(152, '4', 'Added A New Self Assessment Question', '2020-06-30 14:39:47'),
(153, '4', 'Added A New Qualitative Assessment Question', '2020-06-30 15:05:32'),
(154, '4', 'Update a Qualitative Assessment Question', '2020-06-30 15:05:54'),
(155, '4', 'Added A New Supervisor Assessment Question', '2020-06-30 15:27:46'),
(156, '4', 'Updated a Supervisor Assessment Question', '2020-06-30 15:28:46'),
(157, '4', 'Added A New Quantitative Assessment Question', '2020-06-30 16:37:09'),
(158, '4', 'Update a Quantitative Assessment Question', '2020-06-30 16:38:33'),
(159, '4', 'Update a Quantitative Assessment Question', '2020-06-30 16:39:21'),
(160, '4', 'Added A New Quantitative Assessment Question', '2020-06-30 16:39:40'),
(161, '4', 'Logged In', '2020-06-30 20:58:02'),
(162, '4', 'Update a Quantitative Assessment Question', '2020-06-30 20:58:48'),
(163, '4', 'Update a Quantitative Assessment Question', '2020-06-30 20:59:03'),
(164, '4', 'Update a Quantitative Assessment Question', '2020-06-30 20:59:15'),
(165, '4', 'Update a Quantitative Assessment Question', '2020-06-30 20:59:36'),
(166, '4', 'Logged In', '2020-07-01 08:56:52'),
(167, '4', 'Added A New Quantitative Assessment Question', '2020-07-01 13:01:44'),
(168, '4', 'Added New Employee', '2020-07-01 14:04:41'),
(169, '4', 'Logged Out', '2020-07-01 14:13:34'),
(170, '6', 'Logged In', '2020-07-01 14:14:11'),
(171, '6', 'Logged Out', '2020-07-01 16:24:39'),
(172, '4', 'Logged In', '2020-07-01 16:24:46'),
(173, '4', 'Logged Out', '2020-07-01 16:33:14'),
(174, '6', 'Logged In', '2020-07-01 16:33:24'),
(175, '6', 'Logged Out', '2020-07-01 16:49:43'),
(176, '6', 'Logged In', '2020-07-01 16:49:51'),
(177, '4', 'Logged In', '2020-07-01 17:01:26'),
(178, '6', 'Logged Out', '2020-07-01 17:13:00'),
(179, '5', 'Logged In', '2020-07-01 17:13:17'),
(180, '5', 'Updated Employee Salary', '2020-07-01 17:13:44'),
(181, '6', 'Logged In', '2020-07-02 09:27:55'),
(182, '6', 'Logged Out', '2020-07-02 09:54:52'),
(183, '6', 'Logged In', '2020-07-02 09:59:09'),
(184, '6', 'Logged Out', '2020-07-02 10:02:12'),
(185, '6', 'Logged In', '2020-07-02 10:03:13'),
(186, '6', 'Logged Out', '2020-07-02 10:05:46'),
(187, '6', 'Logged In', '2020-07-02 10:06:04'),
(188, '6', 'Logged Out', '2020-07-02 10:08:41'),
(189, '6', 'Logged In', '2020-07-02 10:08:52'),
(190, '6', 'Logged Out', '2020-07-02 10:09:30'),
(191, '6', 'Logged In', '2020-07-02 10:09:53'),
(192, '6', 'Logged In', '2020-07-02 10:43:51'),
(193, '4', 'Logged In', '2020-07-02 12:11:14'),
(194, '6', 'Logged Out', '2020-07-02 15:13:39'),
(195, '6', 'Logged In', '2020-07-02 15:14:27'),
(196, '6', 'Logged Out', '2020-07-02 15:24:00'),
(197, '6', 'Logged In', '2020-07-02 15:24:10'),
(198, '6', 'Initiated Employee Transfer', '2020-07-02 16:40:45'),
(199, '6', 'Initiated Employee Transfer', '2020-07-02 16:43:52'),
(200, '4', 'Logged In', '2020-07-02 19:45:21'),
(201, '4', 'Logged In', '2020-07-03 08:24:47'),
(202, '4', 'Updated User', '2020-07-03 08:32:33'),
(203, '4', 'Updated User', '2020-07-03 08:33:12'),
(204, '4', 'Updated User', '2020-07-03 08:45:02'),
(205, '4', 'Updated User', '2020-07-03 08:46:16'),
(206, '4', 'Updated User', '2020-07-03 08:47:54'),
(207, '4', 'Updated User', '2020-07-03 08:48:10'),
(208, '6', 'Logged In', '2020-07-03 08:54:38'),
(209, '4', 'Approved Employee Leave', '2020-07-03 09:21:58'),
(210, '4', 'Discarded Employee Leave', '2020-07-03 09:23:18'),
(211, '6', 'Logged Out', '2020-07-03 09:24:02'),
(212, '6', 'Logged In', '2020-07-03 09:24:12'),
(213, '6', 'Logged Out', '2020-07-03 10:00:03'),
(214, '7', 'Logged In', '2020-07-03 10:00:09'),
(215, '7', 'Logged Out', '2020-07-03 10:49:49'),
(216, '6', 'Logged In', '2020-07-03 10:49:57'),
(217, '6', 'Logged In', '2020-07-06 10:19:09'),
(218, '7', 'Logged In', '2020-07-06 10:19:41'),
(219, '7', 'Logged In', '2020-07-06 15:07:00'),
(220, '6', 'Logged In', '2020-07-06 16:39:51'),
(221, '6', 'Logged Out', '2020-07-06 17:02:02'),
(222, '4', 'Logged In', '2020-07-06 17:02:15'),
(223, '6', 'Logged In', '2020-07-07 09:54:28'),
(224, '6', 'Logged Out', '2020-07-07 10:42:47'),
(225, '7', 'Logged In', '2020-07-07 10:42:57'),
(226, '7', 'Logged Out', '2020-07-07 13:46:33'),
(227, '6', 'Logged In', '2020-07-07 13:46:40'),
(228, '6', 'Logged Out', '2020-07-07 14:15:02'),
(229, '7', 'Logged In', '2020-07-07 14:15:35'),
(230, '4', 'Logged In', '2020-07-07 14:15:56'),
(231, '7', 'Logged Out', '2020-07-07 14:17:55'),
(232, '7', 'Logged In', '2020-07-07 14:18:09'),
(233, '4', 'Discarded Loan', '2020-07-07 15:26:51'),
(234, '4', 'Approved Loan', '2020-07-07 15:27:49'),
(235, '7', 'Initiated Loan Application', '2020-07-07 15:31:01'),
(236, '6', 'Logged In', '2020-07-08 09:29:33'),
(237, '4', 'Logged In', '2020-07-08 09:31:26'),
(238, '6', 'Logged In', '2020-07-08 13:55:30'),
(239, '6', 'Logged In', '2020-07-09 10:31:35'),
(240, '6', 'Logged Out', '2020-07-09 10:46:36'),
(241, '6', 'Logged In', '2020-07-09 10:48:42'),
(242, '6', 'Logged Out', '2020-07-09 10:48:48'),
(243, '6', 'Logged In', '2020-07-09 10:51:13'),
(244, '6', 'Logged Out', '2020-07-09 10:51:17'),
(245, '4', 'Logged In', '2020-07-09 11:03:16'),
(246, '6', 'Logged In', '2020-07-09 15:24:04'),
(247, '6', 'Logged Out', '2020-07-09 15:24:11'),
(248, '6', 'Logged In', '2020-07-09 15:24:56'),
(249, '6', 'Logged Out', '2020-07-09 15:25:02'),
(250, '6', 'Logged In', '2020-07-09 15:25:57'),
(251, '6', 'Logged In', '2020-07-09 19:52:58'),
(252, '4', 'Logged In', '2020-07-09 19:57:30'),
(253, '4', 'Logged In', '2020-07-10 08:03:14'),
(254, '4', 'Updated Employee Salary', '2020-07-10 08:11:59'),
(255, '4', 'Updated Employee Salary', '2020-07-10 08:18:20'),
(256, '4', 'Updated Employee Salary', '2020-07-10 08:34:47'),
(257, '4', 'Updated Employee Salary', '2020-07-10 08:42:17'),
(258, '4', 'Updated Employee Salary', '2020-07-10 08:42:52'),
(259, '4', 'Logged Out', '2020-07-10 08:53:08'),
(260, '4', 'Logged In', '2020-07-10 08:53:11'),
(261, '6', 'Logged In', '2020-07-10 08:53:17'),
(262, '4', 'Logged Out', '2020-07-10 08:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `memo_id` int(11) NOT NULL,
  `memo_subject` text NOT NULL,
  `memo_body` text NOT NULL,
  `memo_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`memo_id`, `memo_subject`, `memo_body`, `memo_date`) VALUES
(1, 'Felicitation - oki-Peter', ' <p><img xss=\"removed\" k=\" data-filename=\"></p><p><br></p><p>This finally works<br></p><p> </p><p> </p> <p></p> ', '2020-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `minimum_tax_rate`
--

CREATE TABLE `minimum_tax_rate` (
  `minimum_tax_rate_id` int(11) NOT NULL,
  `minimum_tax_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minimum_tax_rate`
--

INSERT INTO `minimum_tax_rate` (`minimum_tax_rate_id`, `minimum_tax_rate`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_document`
--

CREATE TABLE `other_document` (
  `other_document_id` int(11) NOT NULL,
  `other_document_employee_id` int(11) NOT NULL,
  `other_document_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_document`
--

INSERT INTO `other_document` (`other_document_id`, `other_document_employee_id`, `other_document_name`) VALUES
(9, 7, '85cbd20d3cafc61717242a470c39627f.pdf'),
(10, 7, '46a4060879bd7ce71313563ee66f0fe0.pdf'),
(11, 7, '0a24d7d24127429378b780dee5d2027e.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `payment_definition`
--

CREATE TABLE `payment_definition` (
  `payment_definition_id` int(11) NOT NULL,
  `payment_definition_payment_code` text NOT NULL,
  `payment_definition_payment_name` text NOT NULL,
  `payment_definition_type` int(11) NOT NULL COMMENT '0 == deduction, 1 == income',
  `payment_definition_variant` int(11) NOT NULL COMMENT '0 == standard, 1 == variant',
  `payment_definition_taxable` int(11) NOT NULL COMMENT '0 == no, 1 == yes',
  `payment_definition_desc` int(11) NOT NULL COMMENT '1 == loan, 2 == tax, 3 == pension, 4 == hmo',
  `payment_definition_basic` int(11) NOT NULL DEFAULT 0,
  `payment_definition_tie_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_definition`
--

INSERT INTO `payment_definition` (`payment_definition_id`, `payment_definition_payment_code`, `payment_definition_payment_name`, `payment_definition_type`, `payment_definition_variant`, `payment_definition_taxable`, `payment_definition_desc`, `payment_definition_basic`, `payment_definition_tie_number`) VALUES
(1, '3001', 'salary', 1, 0, 1, 0, 1, '0'),
(2, '3002', 'Housing Allowance', 1, 0, 0, 0, 0, '0'),
(3, '3003', 'Overtime', 1, 1, 0, 0, 0, '0'),
(5, '3006', 'loan', 0, 1, 0, 1, 0, '0'),
(6, '3008', 'Cooperative Deduction', 0, 0, 0, 0, 0, '0'),
(7, '1001', 'Tax', 0, 0, 0, 2, 0, 'employee_paye_number'),
(8, '1002', 'Pension', 0, 0, 0, 3, 0, 'employee_pension_number');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_month_year`
--

CREATE TABLE `payroll_month_year` (
  `payroll_month_year_id` int(11) NOT NULL,
  `payroll_month_year_month` int(11) NOT NULL,
  `payroll_month_year_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_month_year`
--

INSERT INTO `payroll_month_year` (`payroll_month_year_id`, `payroll_month_year_month`, `payroll_month_year_year`) VALUES
(1, 6, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `pension`
--

CREATE TABLE `pension` (
  `pension_id` int(11) NOT NULL,
  `pension_provider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pension`
--

INSERT INTO `pension` (`pension_id`, `pension_provider`) VALUES
(1, 'Stanbic IBTC Pension Managers');

-- --------------------------------------------------------

--
-- Table structure for table `pension_rate`
--

CREATE TABLE `pension_rate` (
  `pension_rate_id` int(11) NOT NULL,
  `pension_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pension_rate`
--

INSERT INTO `pension_rate` (`pension_rate_id`, `pension_rate`) VALUES
(1, 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `employee_management` int(11) NOT NULL,
  `payroll_management` int(11) NOT NULL,
  `biometrics` int(11) NOT NULL,
  `configuration` int(11) DEFAULT NULL,
  `hr_configuration` int(11) NOT NULL,
  `payroll_configuration` int(11) NOT NULL,
  `user_management` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `username`, `employee_management`, `payroll_management`, `biometrics`, `configuration`, `hr_configuration`, `payroll_configuration`, `user_management`) VALUES
(2, 'administrator', 1, 1, 1, 1, 1, 1, 1),
(3, 'peterejiro', 1, 1, 1, 1, 1, 1, 1),
(4, 'ihumane_Xxd', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personalized_salary_structure`
--

CREATE TABLE `personalized_salary_structure` (
  `personalized_id` int(11) NOT NULL,
  `personalized_employee_id` int(11) NOT NULL,
  `personalized_payment_definition` int(11) NOT NULL,
  `personalized_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalized_salary_structure`
--

INSERT INTO `personalized_salary_structure` (`personalized_id`, `personalized_employee_id`, `personalized_payment_definition`, `personalized_amount`) VALUES
(5, 9, 1, 5000000),
(6, 9, 2, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification_name`) VALUES
(1, 'B.Eng (computer)');

-- --------------------------------------------------------

--
-- Table structure for table `qualitative`
--

CREATE TABLE `qualitative` (
  `qualitative_id` int(11) NOT NULL,
  `qualitative_question` text NOT NULL,
  `qualitative_min` int(11) NOT NULL DEFAULT 1,
  `qualitative_max` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualitative`
--

INSERT INTO `qualitative` (`qualitative_id`, `qualitative_question`, `qualitative_min`, `qualitative_max`) VALUES
(1, '  Quality of Work - Accuracy skill, thoroughness, neatness, error free etc<br>', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quantitative`
--

CREATE TABLE `quantitative` (
  `quantitative_id` int(11) NOT NULL,
  `quantitative_job_role_id` int(11) NOT NULL,
  `quantitative_question` text NOT NULL,
  `quantitative_min` int(11) NOT NULL DEFAULT 1,
  `quantitative_max` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantitative`
--

INSERT INTO `quantitative` (`quantitative_id`, `quantitative_job_role_id`, `quantitative_question`, `quantitative_min`, `quantitative_max`) VALUES
(1, 2, '   <p>    <i><b>Which language is most difficult for you;</b></i></p><p>C or PHP?<br></p>', 1, 5),
(2, 2, ' What is your favorite style of programming?<br>', 1, 5),
(3, 1, ' Active Directory performance, phone answer service<br>', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(11) NOT NULL,
  `query_employee_id` int(11) NOT NULL,
  `query_subject` text NOT NULL,
  `query_body` text NOT NULL,
  `query_type` int(11) NOT NULL COMMENT '0 == warning, 1== query',
  `query_date` date NOT NULL,
  `query_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 == active\r\n0 == closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `query_employee_id`, `query_subject`, `query_body`, `query_type`, `query_date`, `query_status`) VALUES
(1, 10, 'Why So fine', '<p><br></p><p>why so fine<br></p><p><br></p>', 0, '2020-07-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_response`
--

CREATE TABLE `query_response` (
  `query_response_id` int(11) NOT NULL,
  `query_response_query_id` int(11) NOT NULL,
  `query_response_responder_id` int(11) NOT NULL DEFAULT 0,
  `query_response_body` text NOT NULL,
  `query_response_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_response`
--

INSERT INTO `query_response` (`query_response_id`, `query_response_query_id`, `query_response_responder_id`, `query_response_body`, `query_response_date`) VALUES
(5, 1, 0, '<p>so?<br></p>', '2020-07-09 15:07:23'),
(6, 1, 10, '<p>this wil</p>', '2020-07-09 15:37:28'),
(7, 1, 10, '<p><b>I will Oblige to do the task at hand</b></p>', '2020-07-09 15:39:58'),
(8, 1, 10, '<p>you dig?</p>', '2020-07-09 19:54:41'),
(9, 1, 10, '<p>test</p>', '2020-07-09 19:56:39'),
(10, 1, 10, '<p>testrr</p>', '2020-07-09 19:56:46'),
(11, 1, 0, '<p>you are mad<br></p>', '2020-07-09 19:58:53'),
(12, 1, 10, '<p>tes</p>', '2020-07-09 19:59:34'),
(13, 1, 10, '<p>ok</p>', '2020-07-09 20:02:14'),
(14, 1, 0, '<p>you<br></p>', '2020-07-09 20:02:31'),
(15, 1, 10, '<p>you are mad</p>', '2020-07-09 20:02:53'),
(16, 1, 10, '<p>you</p>', '2020-07-10 08:53:55'),
(17, 1, 0, '<p>Me</p>', '2020-07-10 08:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `resignation`
--

CREATE TABLE `resignation` (
  `resignation_id` int(11) NOT NULL,
  `resignation_employee_id` int(11) NOT NULL,
  `resignation_reason` text NOT NULL,
  `resignation_effective_date` text NOT NULL,
  `resignation_date` date NOT NULL DEFAULT current_timestamp(),
  `resignation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resignation`
--

INSERT INTO `resignation` (`resignation_id`, `resignation_employee_id`, `resignation_reason`, `resignation_effective_date`, `resignation_date`, `resignation_status`) VALUES
(1, 10, '<p> i am tired, i am not doing again    <br></p>', '2020-07-09', '2022-07-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `salary_employee_id` int(11) NOT NULL,
  `salary_payment_definition_id` int(11) NOT NULL,
  `salary_pay_month` int(11) NOT NULL,
  `salary_pay_year` int(11) NOT NULL,
  `salary_amount` double NOT NULL,
  `salary_confirmed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_employee_id`, `salary_payment_definition_id`, `salary_pay_month`, `salary_pay_year`, `salary_amount`, `salary_confirmed`) VALUES
(354, 7, 8, 6, 2020, 15000, 1),
(355, 7, 1, 6, 2020, 200000, 1),
(356, 7, 2, 6, 2020, 50000, 1),
(357, 7, 6, 6, 2020, 5000, 1),
(358, 7, 5, 6, 2020, 50000, 1),
(359, 7, 3, 6, 2020, 50000, 1),
(360, 7, 7, 6, 2020, 18666.666666667, 1),
(361, 8, 8, 6, 2020, 22500, 1),
(362, 8, 1, 6, 2020, 300000, 1),
(363, 8, 2, 6, 2020, 100000, 1),
(364, 8, 3, 6, 2020, 50000, 1),
(365, 8, 3, 6, 2020, 50000, 1),
(366, 8, 7, 6, 2020, 18666.666666667, 1),
(367, 9, 8, 6, 2020, 375000, 1),
(368, 9, 1, 6, 2020, 5000000, 1),
(369, 9, 2, 6, 2020, 200000, 1),
(370, 9, 7, 6, 2020, 110666.66666667, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_allowance`
--

CREATE TABLE `salary_structure_allowance` (
  `salary_structure_allowance_id` int(11) NOT NULL,
  `salary_structure_category_id` int(11) NOT NULL,
  `payment_definition_id` int(11) NOT NULL,
  `salary_structure_allowance_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_structure_allowance`
--

INSERT INTO `salary_structure_allowance` (`salary_structure_allowance_id`, `salary_structure_category_id`, `payment_definition_id`, `salary_structure_allowance_amount`) VALUES
(3, 1, 1, 200000),
(4, 1, 2, 50000),
(5, 1, 6, 5000),
(6, 2, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_category`
--

CREATE TABLE `salary_structure_category` (
  `salary_structure_id` int(11) NOT NULL,
  `salary_structure_category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_structure_category`
--

INSERT INTO `salary_structure_category` (`salary_structure_id`, `salary_structure_category_name`) VALUES
(1, 'Software Devlopers'),
(2, 'Human Resource Officer');

-- --------------------------------------------------------

--
-- Table structure for table `self_appraisee`
--

CREATE TABLE `self_appraisee` (
  `self_appraisee_id` int(11) NOT NULL,
  `self_appraisee_question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `self_appraisee`
--

INSERT INTO `self_appraisee` (`self_appraisee_id`, `self_appraisee_question`) VALUES
(1, 'State the various jobs you handled during the appraisal period?'),
(2, '<p> Which aspect of your job experience do you find most challenging and interesting?</p>');

-- --------------------------------------------------------

--
-- Table structure for table `subsidiary`
--

CREATE TABLE `subsidiary` (
  `subsidiary_id` int(11) NOT NULL,
  `subsidiary_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subsidiary`
--

INSERT INTO `subsidiary` (`subsidiary_id`, `subsidiary_name`) VALUES
(1, 'Connexxion Telecoms');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_appraisee`
--

CREATE TABLE `supervisor_appraisee` (
  `supervisor_appraisee_id` int(11) NOT NULL,
  `supervisor_appraisee_question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor_appraisee`
--

INSERT INTO `supervisor_appraisee` (`supervisor_appraisee_id`, `supervisor_appraisee_question`) VALUES
(1, '  What is your impression of this employees?<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rate`
--

CREATE TABLE `tax_rate` (
  `tax_rate_id` int(11) NOT NULL,
  `tax_rate_band` text NOT NULL,
  `tax_rate_rate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_rate`
--

INSERT INTO `tax_rate` (`tax_rate_id`, `tax_rate_band`, `tax_rate_rate`) VALUES
(1, '300000', '7'),
(2, '300000', '11'),
(3, '500000', '15'),
(4, '500000', '19'),
(5, '1600000', '21'),
(6, '3200000', '24');

-- --------------------------------------------------------

--
-- Table structure for table `termination`
--

CREATE TABLE `termination` (
  `termination_id` int(11) NOT NULL,
  `termination_employee_id` int(11) NOT NULL,
  `termination_reason` text NOT NULL,
  `termination_effective_date` datetime NOT NULL,
  `termination_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `title_id` int(11) NOT NULL,
  `title_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(11) NOT NULL,
  `transfer_employee_id` int(11) NOT NULL,
  `transfer_type` int(11) NOT NULL COMMENT '0 == branches, 1 ==  subidiary',
  `transfer_from` text NOT NULL,
  `transfer_to` text NOT NULL,
  `transfer_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `transfer_employee_id`, `transfer_type`, `transfer_from`, `transfer_to`, `transfer_date`) VALUES
(3, 7, 0, '1', '3', '2020-06-30'),
(4, 7, 0, '3', '1', '2020-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_name` text NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_type`, `user_token`, `user_name`, `user_status`) VALUES
(4, 'administrator', 'admin@admin.com', '$2y$10$SlMOyD3Vs./1je91yR3Nueq9/eFKDu9huAOQ54a5kXNpXBU9teadi', 1, '', 'Administrator Administrator', '1'),
(5, 'peterejiro', 'peterejiro96@gmail.com', '$2y$10$7OLmMpkXuTEhrMdIIsdnoO4GCUs7yB/Hm7qL6rRAmHEA1lzikvOjW', 1, '1593619997', 'Oki-Peter Ejiroghene', '1'),
(6, 'ihumane_Xxd', 'ashaolu.rachael@connexxiongroup.com', '$2y$10$5PWarziFP.tywKLcI2Moje0n.IwHcDxb7/lvf5qND0Ng0/elMhOnq', 3, '1594367597', 'Ashaolu Rachael', '1'),
(7, 'ihumane_qt5', 'oki-peter@connexxiongroup.com', '$2y$10$5PWarziFP.tywKLcI2Moje0n.IwHcDxb7/lvf5qND0Ng0/elMhOnq', 2, '1594127889', 'Oki - Peter Ejirogehene', '1');

-- --------------------------------------------------------

--
-- Table structure for table `variational_payment`
--

CREATE TABLE `variational_payment` (
  `variational_payment_id` int(11) NOT NULL,
  `variational_employee_id` int(11) NOT NULL,
  `variational_payment_definition_id` int(11) NOT NULL,
  `variational_amount` double NOT NULL,
  `variational_confirm` int(11) NOT NULL,
  `variational_payroll_month` text NOT NULL,
  `variational_payroll_year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variational_payment`
--

INSERT INTO `variational_payment` (`variational_payment_id`, `variational_employee_id`, `variational_payment_definition_id`, `variational_amount`, `variational_confirm`, `variational_payroll_month`, `variational_payroll_year`) VALUES
(5, 7, 3, 50000, 1, '5', '2020'),
(6, 8, 3, 50000, 1, '5', '2020'),
(7, 7, 3, 50000, 1, '6', '2020'),
(8, 8, 3, 50000, 1, '6', '2020'),
(9, 8, 3, 50000, 1, '6', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `work_experience_id` int(11) NOT NULL,
  `employee_id` text NOT NULL,
  `company_name` text NOT NULL,
  `job_description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`work_experience_id`, `employee_id`, `company_name`, `job_description`, `start_date`, `end_date`) VALUES
(4, '3', 'you too mus thso1', 'hgvbnm,', '2020-05-30', '2020-05-23'),
(5, '3', 'I also want this to show 2', 'hgvbnm,', '2020-05-30', '2020-05-23'),
(6, '3', 'this is the company i want to show', 'hgvbnm,', '2020-05-30', '2020-05-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD UNIQUE KEY `bank_name` (`bank_name`) USING HASH;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`) USING HASH;

--
-- Indexes for table `emolument_report`
--
ALTER TABLE `emolument_report`
  ADD PRIMARY KEY (`emolument_report_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_unique_id` (`employee_unique_id`) USING HASH,
  ADD UNIQUE KEY `employee_personal_email` (`employee_personal_email`,`employee_official_email`) USING HASH,
  ADD UNIQUE KEY `employee_phone_number` (`employee_phone_number`) USING HASH;

--
-- Indexes for table `employee_appraisal`
--
ALTER TABLE `employee_appraisal`
  ADD PRIMARY KEY (`employee_appraisal_id`);

--
-- Indexes for table `employee_appraisal_result`
--
ALTER TABLE `employee_appraisal_result`
  ADD PRIMARY KEY (`employee_appraisal_result_id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`employee_history_id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`employee_leave_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`),
  ADD UNIQUE KEY `grade_name` (`grade_name`) USING HASH;

--
-- Indexes for table `health_insurance`
--
ALTER TABLE `health_insurance`
  ADD PRIMARY KEY (`health_insurance_id`),
  ADD UNIQUE KEY `health_insurance_hmo` (`health_insurance_hmo`) USING HASH;

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incident_id`);

--
-- Indexes for table `job_role`
--
ALTER TABLE `job_role`
  ADD PRIMARY KEY (`job_role_id`),
  ADD UNIQUE KEY `job_name` (`job_name`) USING HASH;

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  ADD PRIMARY KEY (`loan_repayment_id`);

--
-- Indexes for table `loan_reschedule_log`
--
ALTER TABLE `loan_reschedule_log`
  ADD PRIMARY KEY (`loan_log_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_name` (`location_name`) USING HASH;

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`memo_id`);

--
-- Indexes for table `minimum_tax_rate`
--
ALTER TABLE `minimum_tax_rate`
  ADD PRIMARY KEY (`minimum_tax_rate_id`);

--
-- Indexes for table `other_document`
--
ALTER TABLE `other_document`
  ADD PRIMARY KEY (`other_document_id`);

--
-- Indexes for table `payment_definition`
--
ALTER TABLE `payment_definition`
  ADD PRIMARY KEY (`payment_definition_id`),
  ADD UNIQUE KEY `payment_definition_payment_code` (`payment_definition_payment_code`) USING HASH;

--
-- Indexes for table `payroll_month_year`
--
ALTER TABLE `payroll_month_year`
  ADD PRIMARY KEY (`payroll_month_year_id`);

--
-- Indexes for table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`pension_id`),
  ADD UNIQUE KEY `pension_provider` (`pension_provider`) USING HASH;

--
-- Indexes for table `pension_rate`
--
ALTER TABLE `pension_rate`
  ADD PRIMARY KEY (`pension_rate_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `personalized_salary_structure`
--
ALTER TABLE `personalized_salary_structure`
  ADD PRIMARY KEY (`personalized_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`),
  ADD UNIQUE KEY `qualification_name` (`qualification_name`) USING HASH;

--
-- Indexes for table `qualitative`
--
ALTER TABLE `qualitative`
  ADD PRIMARY KEY (`qualitative_id`);

--
-- Indexes for table `quantitative`
--
ALTER TABLE `quantitative`
  ADD PRIMARY KEY (`quantitative_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `query_response`
--
ALTER TABLE `query_response`
  ADD PRIMARY KEY (`query_response_id`);

--
-- Indexes for table `resignation`
--
ALTER TABLE `resignation`
  ADD PRIMARY KEY (`resignation_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `salary_structure_allowance`
--
ALTER TABLE `salary_structure_allowance`
  ADD PRIMARY KEY (`salary_structure_allowance_id`);

--
-- Indexes for table `salary_structure_category`
--
ALTER TABLE `salary_structure_category`
  ADD PRIMARY KEY (`salary_structure_id`);

--
-- Indexes for table `self_appraisee`
--
ALTER TABLE `self_appraisee`
  ADD PRIMARY KEY (`self_appraisee_id`);

--
-- Indexes for table `subsidiary`
--
ALTER TABLE `subsidiary`
  ADD PRIMARY KEY (`subsidiary_id`);

--
-- Indexes for table `supervisor_appraisee`
--
ALTER TABLE `supervisor_appraisee`
  ADD PRIMARY KEY (`supervisor_appraisee_id`);

--
-- Indexes for table `tax_rate`
--
ALTER TABLE `tax_rate`
  ADD PRIMARY KEY (`tax_rate_id`);

--
-- Indexes for table `termination`
--
ALTER TABLE `termination`
  ADD PRIMARY KEY (`termination_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`title_id`),
  ADD UNIQUE KEY `title_name` (`title_name`) USING HASH;

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`) USING HASH,
  ADD UNIQUE KEY `user_email` (`user_email`) USING HASH;

--
-- Indexes for table `variational_payment`
--
ALTER TABLE `variational_payment`
  ADD PRIMARY KEY (`variational_payment_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`work_experience_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emolument_report`
--
ALTER TABLE `emolument_report`
  MODIFY `emolument_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_appraisal`
--
ALTER TABLE `employee_appraisal`
  MODIFY `employee_appraisal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_appraisal_result`
--
ALTER TABLE `employee_appraisal_result`
  MODIFY `employee_appraisal_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `employee_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `employee_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_insurance`
--
ALTER TABLE `health_insurance`
  MODIFY `health_insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incident_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_role`
--
ALTER TABLE `job_role`
  MODIFY `job_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  MODIFY `loan_repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loan_reschedule_log`
--
ALTER TABLE `loan_reschedule_log`
  MODIFY `loan_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `minimum_tax_rate`
--
ALTER TABLE `minimum_tax_rate`
  MODIFY `minimum_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_document`
--
ALTER TABLE `other_document`
  MODIFY `other_document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_definition`
--
ALTER TABLE `payment_definition`
  MODIFY `payment_definition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payroll_month_year`
--
ALTER TABLE `payroll_month_year`
  MODIFY `payroll_month_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pension`
--
ALTER TABLE `pension`
  MODIFY `pension_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pension_rate`
--
ALTER TABLE `pension_rate`
  MODIFY `pension_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personalized_salary_structure`
--
ALTER TABLE `personalized_salary_structure`
  MODIFY `personalized_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualitative`
--
ALTER TABLE `qualitative`
  MODIFY `qualitative_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quantitative`
--
ALTER TABLE `quantitative`
  MODIFY `quantitative_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query_response`
--
ALTER TABLE `query_response`
  MODIFY `query_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `resignation`
--
ALTER TABLE `resignation`
  MODIFY `resignation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `salary_structure_allowance`
--
ALTER TABLE `salary_structure_allowance`
  MODIFY `salary_structure_allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary_structure_category`
--
ALTER TABLE `salary_structure_category`
  MODIFY `salary_structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `self_appraisee`
--
ALTER TABLE `self_appraisee`
  MODIFY `self_appraisee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subsidiary`
--
ALTER TABLE `subsidiary`
  MODIFY `subsidiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supervisor_appraisee`
--
ALTER TABLE `supervisor_appraisee`
  MODIFY `supervisor_appraisee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_rate`
--
ALTER TABLE `tax_rate`
  MODIFY `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `termination`
--
ALTER TABLE `termination`
  MODIFY `termination_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `variational_payment`
--
ALTER TABLE `variational_payment`
  MODIFY `variational_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `work_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
