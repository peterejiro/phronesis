-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 01:54 PM
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
(7, '000013', 'GT Bank'),
(8, '1200', 'Fidelity Banks');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_sender_id` int(11) NOT NULL,
  `chat_reciever_id` int(11) NOT NULL,
  `chat_body` text NOT NULL,
  `chat_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_sender_id`, `chat_reciever_id`, `chat_body`, `chat_time`) VALUES
(67, 10, 7, 'new trial', '2020-08-03 10:08:41'),
(68, 10, 7, 'dope', '2020-08-03 10:08:46'),
(69, 10, 7, 'te', '2020-08-03 10:08:50'),
(70, 10, 7, 'tr', '2020-08-03 10:08:52'),
(71, 10, 7, 'leeeamao', '2020-08-03 10:08:59'),
(72, 10, 7, 'hekki', '2020-08-03 10:35:53'),
(73, 10, 11, '', '2020-08-03 10:46:28'),
(74, 7, 10, 'stop na', '2020-08-03 11:19:23');

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
(7, 'ihumane_qt5', 'Ejiroghene', '', 'Oki-peter', '1996-07-27', 'peterejiro96@gmail.com', 'oki-peter@connexxiongroup.com', '(080) 9094-5451', '[\"1\"]', 'bwari', '1', '1', '1', '2', '0150176481', '2', 'pc_fct_3571', '1', 1, '0154175960', '1', '01501746575', '252221390125c3f1a435c6e2c0ad793a.jpg', 'FC19B3571', 'c6ea91ed4f42920eccc280ee0317124a.pdf', '2020-05-14', 2, '2020-06-07', 1, 1),
(8, 'ihumane_3ag', 'Ogheneovie', '', 'Oki-Peter', '1998-05-02', 'ovie@gmail.com', 'ovie@test.com', '(080) 3355-3769', '[\"1\"]', 'Bwari - Fct', '1', '1', '2', '1', '0150176489', '6', 'oki-91', '1', 1, '21321321321', '1', '2321321321321', 'd5a4062d6904d862eb2cc8f13d141d49.png', 'FC19B3571', '170e02227fc749d5ffbfd7090746d4bd.pdf', '2020-05-25', 2, '2020-06-07', 1, 1),
(9, 'ihumane_IRE', 'Olalekan', 'Sulaiman', 'Hassan', '1996-06-16', 'haslek@gmail.com', 'has@connexxiongroup.com', '(070) 6076-4410', '[\"1\"]', 'asaba', '1', '1', '2', '1', '0150176481', '7', '', '0', 1, '0150176481', '1', '', 'fdb1e14fac1f80d55ec080d61dac47e6.png', 'nysc2343_ben', '07d9aeea60e044fbcd27a688df0e75d9.png', '2020-06-08', 1, '0000-00-00', 1, 0),
(10, 'ihumane_Xxd', 'Rachael', '', 'Ashaolu', '1996-07-11', 'rachaelashaolu@gmail.com', 'ashaolu.rachael@connexxiongroup.com', '0803 355 3769', '[\"1\"]', 'Ibadan, Nigeria', '2', '1', '2', '1', '0150176481', '7', '', '0', 0, '', '', '', '78479059bd78977bee2a2fe2b6d3e987.jpeg', 'test', '2b998afbe75ede7178e793f95b2a70d0.pdf', '2020-06-29', 2, NULL, 0, 0),
(11, 'ihumane_ER4', 'Jane', '', 'Doe', '1996-06-16', 'janedoe@e.com', 'janedoe@connexxiongroup.com', '0809 094 5451', '[\"1\"]', 'magical', '1', '1', '2', '1', '0150176481', '2', '1551', '1', 0, '', '', '', 'da788d20294a2ff0e1a90f8200219106.jpg', '', 'n/a', '2020-07-14', 1, '0000-00-00', 1, 2),
(12, 'ihumane_9b0', 'john', '', 'doe', '1996-06-16', 'john@d.com', 'jon@connexx.com', '085 669 999', '[\"1\"]', 'magical', '1', '1', '1', '1', '2134567788', '2', '213', '1', 0, '', '', '', '01a27d60084a4a8cf17351e349408171.jpg', '', 'n/a', '2020-07-22', 1, '0000-00-00', 1, 0);

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
(2, 10, '2020-07-03', '2021-07-12', 7, 1, 1, 1, 1, 1),
(3, 7, '2020-07-11', '2021-07-16', 10, 1, 1, 1, 1, 1),
(4, 12, '2020-07-15', '2021-06-26', 11, 1, 1, 1, 1, 1);

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
(6, 2, '4', '  What is your impression of this employees?<br>', 'good'),
(7, 3, '1', 'State the various jobs you handled during the appraisal period?', 'Marketing'),
(8, 3, '1', '<p> Which aspect of your job experience do you find most challenging and interesting?</p>', 'Car'),
(9, 3, '2', ' Active Directory performance, phone answer service<br>', '2'),
(10, 3, '3', '  Quality of Work - Accuracy skill, thoroughness, neatness, error free etc<br>', '2'),
(11, 3, '4', '  What is your impression of this employees?<br>', 'fair'),
(12, 4, '1', 'State the various jobs you handled during the appraisal period?', 'my office'),
(13, 4, '1', '<p> Which aspect of your job experience do you find most challenging and interesting?</p>', 'salary payment without revenue'),
(14, 4, '2', ' Active Directory performance, phone answer service<br>', '5'),
(15, 4, '3', '  Quality of Work - Accuracy skill, thoroughness, neatness, error free etc<br>', '5'),
(16, 4, '4', '  What is your impression of this employees?<br>', 'dedicated and hardworking');

-- --------------------------------------------------------

--
-- Table structure for table `employee_biometrics`
--

CREATE TABLE `employee_biometrics` (
  `employee_biometrics_id` int(11) NOT NULL,
  `employee_biometrics_employee` text NOT NULL,
  `employee_biometrics_finger_id` text NOT NULL,
  `employee_biometrics_data` text NOT NULL,
  `employee_biometrics_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_biometrics`
--

INSERT INTO `employee_biometrics` (`employee_biometrics_id`, `employee_biometrics_employee`, `employee_biometrics_finger_id`, `employee_biometrics_data`, `employee_biometrics_timestamp`) VALUES
(17, '10', '1', '205636D6D1CD5D0EF01AD3CAB6715800F88101C82AE3735CC0413709AB71705C1555924A60761DFB27EE4C3F3C701A6F153DE0D473855587E9945A1EF7CCD18D297E3473BB1C17BC024C650DB438DDEF1775894466B16885D0C510A050E4BCE381E9E234B7D9CA932A388A0AD796FF4E0998E782EC0E75DCB164CA5D09094AC0B89E7084092DC09F6870F7BB98DEA2C7CBADF506C496AB0D75FC64D662D474315A90A7FC3F53C5305779B35E9A0A001DD0E56A3951645FA2F824648EEA248D3EB9102212B03C592F0FFD32BF1A8F26905A1D4C921C584D614A8432ADE649CC013AE59AF0F3AB6D9BECD1A3526DA4390E446C19DADCE13ABEF6C93EC49DFC63930E1EDEBE2A5AC8A94CB9B536EA6ACEC0219B06C664CD0EFF4B3EBFEA43A53AED5D7904FB46D68AB7A4C229CAB742C0B6A03C7D71BA07A10EC38138C40B95E83267AA723F9DB2399ED3539A2A88D077D73A5B35D83F5364D7B17022E42678AEF6F13278E4BBEC8A9980D7B04FF4CE245C531B0236D228229D4E7A1C080ECDD273EC09DB40CC868054506C2809B7BB665A2AD77310C16156E55584B865565D6F00F87F01C82AE3735CC0413709AB71F042155592ED6C7E61AD752C7FAC29756860ECBFACFA68C485488A7664440881D18C48E30DDECA6C87353F3D9FDB4802772B655E4EB847A4357A7D972D53481B1AF8EE19ABF50872CB5FD87FC5794DAE451A791DB2A43B4ECD49FF3C607A6D0D3A6C28CC090A4CEEB0141EAE2E3757B4E2B53BCD0EFFDB27E11B9F4424E512544263EC8D153CBBED97498D1A59AB847BFA327B08D5D0D3FD30FAF8CC02F7EBC9B048B4BF6E4A871556A10744E873668BE62E20E0D0485C9BCACF99EB3AB69D78E803ED2D1460D757630E33E8B034C42F6E27C2FACBCBFDFFD978B2FDD550C415D654E1361CFF1060B61973766B87C0060F487962DF9BED8D086FCDF34184D6855D4F90251BC4DDFFBDCD40CB664845A6EF83F90D81CE059614D49F58EC3C93C64E875D94226D3427DC54CE4FB234EA5282F232BD2F542E9BEF175F2A11029D70A199DA1EE39F60CCE0C73DF6E1869E152AA86FE56B9E6EF789362A2A4AE8EAA81582C597D8DD401BE8AD8AA3C449D7A426662FB86F00F87F01C82AE3735CC04139C2AB943D851DFE4462CC9D7524F060556EC7CCD59C029AE7845E42D15771A3DC77EF3EB8F9BC5E9538D1952372F943846D628EDFEB8EBDD51FAA0A0692732D03C4C8C3EB5CFF9AAC7B02F50D8EC9B9BB90FEBED19E9E872C84415D407A4F4342F3AF261F998F835C04888E1A36C27527FE1B7FB60D01B6E34920D4F93F0C0FAF407D92CE1B2D648B453356C2C12A102D0057DB2A513AD5B1C410C7483EAEB9D4C4CEF00411034C6360B0BC563771A963A181D58A94AF91316179AF4C44A91DB94D29B6C24BFCFAB9076F14EB319F316FA3C0C84F307CB594FC4FA1C7A2E8C335860380FD7C8CB89BF612871B621D7E6A3692960954B04D7BEEBE319779EC7B806BF696281E95E0CF32BB6AC495DE2D46D1C8153AC33A992ABA135C35D7A768F79BD950FA5B7EB660F62456E5733C2432262FC0CDA6B3F4964E2D9280D467FCE60A2F5D636ECDA0AB68D0217A682BA1A01B423C527519E7D5CCC2BBB1CD098446BEF167FE16F0E476A95BC3E4A61AC2CB54EFE5BD1B8CE26F00E87E01C82AE3735CC0413709AB713041155592C47711CE5F7A4EA98CB363042FE5CEB223918BD86A1506FF772A7C526C6C03667669D9CF52CFE57BA537007FEC6452BF28EBA4C7BA620A5C846FCA65999F7980A3AB9E9789B9FE7DC40F11D515F71B9C955EC1B05D514D6EFE52247775C8E6DB0F01AFFA62BCC14AFEAF8D93C9DC5D735696D5A558B20FB92B8060A03F8BCCCDBB0C1BE91234DCBD16F55879C3F02EF3778904501C7B85E5CCD5314D4CB845EE9DAEE26638D576B09A4A29B107284A02A4621DB3219B7A2741E76778C141DBB28F6A53AF19B427B4CAB981218EFBC32B9281FB430C2FDABE75C74502A8D15B9E7F1CCA960BF65CAC14D37726129A9284C048854A1D88F879E5D2ACBEF718CEF29D63879729394F25E89CD043228C9345511587C2F5339C656A6EF4D7AA26148F48ECB5251F7E50A0CE579CC3EEB0BEE1FD9739407ECED5CD004BC028C8A454DA9B871DCEDE0AEC3BCA471F6FA63A83946F2B7745231957A36CA08AB07783A12FB7ED47B05BFAFB4B6502F4BFB6CE6F00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2020-07-22 11:04:54'),
(18, '7', '1', '55243DA8A7CB297BF46EA6CBB5712C00F88001C82AE3735CC0413709AB71B047155592960A985A2C84BA06FC0968607DDC125D0D24C7ABCE02FADD499F2581091CEC1E3270BF0BC7F1DA4A4CE4E1587FCFDF1121DCD28D9BB0A2650015389DE119C445916A84AAAC55243184E7DA96EF9B5702B83358BCF18ED2D1A8C1049D11AE25341C8405082336ED2A22534882CE66BA69ABD4DCD3AB042CEB8CB106652D4669A0B225A82750CDF2F77CAF120B9490A7D0E66E0247E80640675D61A86F0613F2905587D7F37241E550405E0098B5A4EE80EECD6D5FE230F32857E2E2CA7D627B738D3D596D708ECD0002F51C3B660B83A01982D20DBF8D97FCED9B74BA1FA67242FF9F455BA617CE3C795BEDEB383059442271B7787283FFDD516A50502AA4348D8401B693DA05DF13C95B4A3B66B4D561CDFC609B748DCE234C07C9D146434CDB71E116A0E8823738655F3A187D602C1047AEE9947E2F0B12DE1B8C393AC6FB5DADE12D3790B97C69F6FC3F0E4798B31186892B163D00E72C0D8CB965807B6551F7EFA17D50E9775F653E8DEC5E508E66B097EA68E9E9114321A46F00F87F01C82AE3735CC0413709AB71F047155592768139B3C934E0C28959A6297D3B8950B4A31D07DBF8A7928392B82C0BE47D2C8F676570ADFA19CD513C8C05B2D2DCBB42B56F131DF4A650A3A5E2ECCCB299E2018E68EA1A72B57DE94E140489C712BA19C4C10B91398D07373041CD0B7D583836746B8EAC4F73B13D4EAC02A3305587EE02E9134437382B8CAE1B1B5A0EE357F5BE399157044530241CFA7CDD5407150C5A8A971545F0E5A09DCCB8AFCAAB41AC09022984EBFAF9BFA16C67C435C7F3FC9B87FF8C080343BD1B3743B65BF5C5B78F1850B5BAD78A019887B5D5F84CE378225DD26FF3F3567BFD855EAE16549D92665523FF74A0C0C2B6C3A2BB8F690B28DBB682A6F449D28ED002313D760477A66F7863CAE009FADF9578273CAE5C1490B11F19CAA04DFBA58606758C11A92857354C40BC9535151B1CEF5C46B921BA728274EDC872031C920C361E083B2DA3D443A248DA68FA2F039AEC0D7AD22927F2503A3824FAFFA2DD8A96FB9FA64217337549F4895AE68C722AAA86C20CEC6F00F88101C82AE3735CC0413709AB71B046155592F3C072D21763B98695B4E15FC044022063F71BCC4D432C9DAD93951674313BA3664A9D4B47840B5D6725BFC8AA9B35E448FCD2F6B7ABDBB8EA58F1AFA1EB926BAB4917176CCD80AEB27895C5AC77AA897B45CE49EAC7BA5DF7AE55A200C9059E7F20F0C2D3D3B87F8EC4FD6FC97AFE4968E15B4016032856954CD0DAC24DAB7FF34365282D424320D199D8B1444913B6AE0CE5F012BAB0890B2D698A1E203128AB3C0D69CF0F3D4BE2A2F3E9E38B3148BF446D1FC480F2742BA0EDF84F8FFFC485A77A8F2380E4693D38011C501CC05DD78A1F4DAE9D8D732107A0B16031056B49B1494114EFCACD57CD942EFF72FA0C71E527E18DD24840F3C2AA5FFC6B3176FFCFCD03D7D148841F810D888FBA2DE83014E9D67FB2CA1CCFBFC8C18C53EB1F3771DFC284A08B8B230C469C0E7365CA6B33E7EA94B5CA4E130F10AB6064D90A192E4594FDC64B1092C1E8B632BC1A17F1120BD9D8951DBC0BCCF6B61A4F4776DD84B5E1A6650B4CE1E5918DEE08B5602B6F00E88001C82AE3735CC0413AA136ABBA92D7DDF4443143B7AAA40132D2A835FDBBB6CB8D26123333A425CF50A09F1D0600C6F8462812553338103682407468E4E60649AA296AAAD7E2011F3DFD4F577AEBEDD73CCE32DDE5E40EDC0722834A737A83D9A7543E3ACA61C2FFF8C521F6D49A3377BB9B0710946259835E9AEECA91902A75F25BBBAB07A5C71E7F9B9DFACB96E2CD21A56AF7969EFE91F198CA85AEE7EB013010E7B00860E0A37D8733E97DBCEEA3392372685AEAFE98B9675BDCA45D670F14E9A554BD4E6B40B49BAA85A7CDD4CEAB2416DA0992D720F401D2729323E3632CBC9435A45AB5ED3BDB4FB4501949D8E8440C632B4674E7E254FE58F352FBC316C420AA7233068BB84967991A352FC5A2519FECC108CFEA07E5897D1D4AF604C1F94E8617D34E07261267342B787D5E829F6438E4FE28AB4247A9570730083CA497A19AFE0E614DB73E198C77982F40E2FBF1AC1E0E86A833DA7A1D991A83919DF4F37C2F73E88EF708A4C131167AA41174E062C948B27D5A76D593384E2899B36F00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2020-07-22 11:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee_biometrics_login`
--

CREATE TABLE `employee_biometrics_login` (
  `employee_biometrics_login_id` int(11) NOT NULL,
  `employee_biometrics_login_employee_id` int(11) NOT NULL,
  `employee_biometrics_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_biometrics_login`
--

INSERT INTO `employee_biometrics_login` (`employee_biometrics_login_id`, `employee_biometrics_login_employee_id`, `employee_biometrics_login_time`) VALUES
(12, 10, '2020-07-22 12:36:36'),
(13, 7, '2020-07-22 12:37:49'),
(14, 7, '2020-07-24 14:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `employee_history_id` int(11) NOT NULL,
  `employee_history_employee_id` int(11) NOT NULL,
  `employee_history_details` text NOT NULL,
  `employee_history_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`employee_history_id`, `employee_history_employee_id`, `employee_history_details`, `employee_history_date`) VALUES
(1, 10, 'Leave Application', '2020-07-02 00:00:00'),
(2, 10, 'Leave Application', '2020-07-02 00:00:00'),
(3, 10, 'Leave Updated', '2020-07-03 00:00:00'),
(4, 10, 'Leave Discarded', '2020-07-03 00:00:00'),
(5, 7, 'Leave Application', '2020-07-10 00:00:00'),
(6, 7, 'Leave Discarded', '2020-07-10 00:00:00'),
(7, 10, 'Leave Discarded', '2020-07-13 00:00:00'),
(8, 0, 'Transfer', '2020-07-13 00:00:00'),
(9, 0, 'Transfer', '2020-07-13 00:00:00'),
(10, 10, 'Leave Updated', '2020-07-14 00:00:00'),
(11, 11, 'You were Hired', '2020-07-14 00:00:00'),
(12, 12, 'You were Hired', '2020-07-22 00:00:00'),
(13, 12, 'Leave Application', '2020-07-16 00:00:00'),
(14, 12, 'Leave Application', '2020-07-16 00:00:00'),
(15, 12, 'Leave Updated', '2020-07-16 00:00:00'),
(16, 12, 'Leave Application', '2020-07-16 00:00:00'),
(17, 12, 'Leave Updated', '2020-07-16 00:00:00');

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
(1, 9, '1', '2020-05-25', '2020-07-31', '2'),
(2, 8, '1', '2020-06-26', '2020-06-25', '1'),
(4, 10, '1', '2020-07-02', '2020-07-31', '2'),
(5, 7, '2', '2020-07-20', '2021-01-11', '3'),
(6, 10, '1', '2020-07-19', '2020-07-31', '2'),
(9, 12, '1', '2020-07-18', '2020-08-09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_training`
--

CREATE TABLE `employee_training` (
  `employee_training_id` int(11) NOT NULL,
  `employee_training_employee_id` int(11) NOT NULL,
  `employee_training_training_id` int(11) NOT NULL,
  `employee_training_start_date` date NOT NULL,
  `employee_training_end_date` date NOT NULL,
  `employee_training_score` double NOT NULL DEFAULT 0,
  `employee_training_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 == pending\r\n1 == completed \r\n\r\n2 == abandoned',
  `employee_training_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_training`
--

INSERT INTO `employee_training` (`employee_training_id`, `employee_training_employee_id`, `employee_training_training_id`, `employee_training_start_date`, `employee_training_end_date`, `employee_training_score`, `employee_training_status`, `employee_training_date`) VALUES
(1, 7, 6, '2020-07-28', '2020-08-09', 0, 1, '2020-07-31 09:42:51');

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
-- Table structure for table `hr_document`
--

CREATE TABLE `hr_document` (
  `hr_document_id` int(11) NOT NULL,
  `hr_document_name` text NOT NULL,
  `hr_document_description` text NOT NULL,
  `hr_document_link` text NOT NULL,
  `hr_document_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Junior Software Developer', 'rubbish', '2'),
(3, 'QA', 're', '2');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leave_id` int(11) NOT NULL,
  `leave_name` text NOT NULL,
  `leave_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leave_id`, `leave_name`, `leave_duration`) VALUES
(1, 'Study Leave', 50),
(2, 'Maternity Leave', 90),
(3, 'Casual Leave', 40),
(5, 'Annual Leave', 20),
(7, 'Paternity Leave', 50),
(8, 'test leave', 40),
(9, 'A Leave', 30);

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
(5, 7, 5, 150000, 2020, 8, 2023, 1, 30, NULL, NULL, 5000, 150000, 2),
(6, 10, 5, 67990, 2020, 9, 2021, 3, 985, NULL, NULL, 7000, 67990, 0);

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
(5, 3, 1, 50000, 90000, NULL, NULL),
(6, 6, 1, 7000, 67990, NULL, NULL);

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
(262, '4', 'Logged Out', '2020-07-10 08:56:11'),
(263, '4', 'Logged In', '2020-07-10 09:05:07'),
(264, '6', 'Logged Out', '2020-07-10 11:12:47'),
(265, '4', 'Logged Out', '2020-07-10 11:12:58'),
(266, '6', 'Logged In', '2020-07-10 11:13:13'),
(267, '7', 'Logged In', '2020-07-10 12:14:09'),
(268, '6', 'Logged Out', '2020-07-10 12:31:09'),
(269, '4', 'Logged In', '2020-07-10 12:31:16'),
(270, '4', 'Logged In', '2020-07-10 15:03:21'),
(271, '4', 'Logged Out', '2020-07-10 16:14:02'),
(272, '4', 'Logged In', '2020-07-10 16:17:19'),
(273, '5', 'Logged In', '2020-07-10 16:17:24'),
(274, '4', 'Logged In', '2020-07-10 16:19:02'),
(275, '5', 'Added A New Bank', '2020-07-10 16:21:53'),
(276, '5', 'Updated Bank Details', '2020-07-10 16:22:10'),
(277, '6', 'Logged In', '2020-07-10 16:32:36'),
(278, '7', 'Logged In', '2020-07-10 16:34:50'),
(279, '7', 'Initiated Employee Transfer', '2020-07-10 16:41:23'),
(280, '5', 'Discarded Employee Leave', '2020-07-10 16:43:27'),
(281, '7', 'Logged Out', '2020-07-10 16:56:21'),
(282, '7', 'Logged In', '2020-07-10 16:56:44'),
(283, '5', 'Updated User', '2020-07-10 17:01:09'),
(284, '6', 'Logged Out', '2020-07-10 17:07:01'),
(285, '6', 'Logged In', '2020-07-10 17:07:29'),
(286, '6', 'Logged Out', '2020-07-10 17:07:36'),
(287, '6', 'Logged In', '2020-07-10 17:10:39'),
(288, '5', 'Logged Out', '2020-07-10 17:16:26'),
(289, '6', 'Logged In', '2020-07-10 17:18:03'),
(290, '6', 'Logged Out', '2020-07-10 19:51:49'),
(291, '4', 'Logged In', '2020-07-10 19:52:03'),
(292, '6', 'Logged In', '2020-07-10 19:58:20'),
(293, '6', 'Logged In', '2020-07-11 08:06:21'),
(294, '6', 'Logged Out', '2020-07-11 08:06:38'),
(295, '4', 'Logged In', '2020-07-11 08:07:25'),
(296, '4', 'Logged In', '2020-07-13 11:11:51'),
(297, '6', 'Logged In', '2020-07-13 11:24:41'),
(298, '4', 'Discarded Employee Leave', '2020-07-13 11:40:26'),
(299, '4', 'Initiated Employee Transfer', '2020-07-13 12:51:20'),
(300, '4', 'Initiated Employee Transfer', '2020-07-13 12:51:31'),
(301, '4', 'Logged In', '2020-07-13 21:20:14'),
(302, '6', 'Logged In', '2020-07-14 10:23:07'),
(303, '4', 'Logged In', '2020-07-14 13:06:45'),
(304, '4', 'Approved Employee Leave', '2020-07-14 13:06:54'),
(305, '4', 'Logged In', '2020-07-15 11:15:19'),
(306, '6', 'Logged In', '2020-07-15 13:29:38'),
(307, '6', 'Logged Out', '2020-07-15 13:29:56'),
(308, '4', 'Logged In', '2020-07-15 13:30:05'),
(309, '4', 'Logged Out', '2020-07-15 13:50:24'),
(310, '6', 'Logged In', '2020-07-15 13:50:33'),
(311, '6', 'Logged Out', '2020-07-15 15:16:30'),
(312, '4', 'Logged In', '2020-07-15 15:18:38'),
(313, '5', 'Logged In', '2020-07-15 15:23:17'),
(314, '5', 'Logged Out', '2020-07-15 15:26:51'),
(315, '6', 'Logged In', '2020-07-15 15:26:59'),
(316, '6', 'Logged Out', '2020-07-15 15:37:31'),
(317, '5', 'Logged In', '2020-07-15 15:37:37'),
(318, '5', 'Added New Employee', '2020-07-15 15:43:09'),
(319, '8', 'Logged In', '2020-07-15 15:44:02'),
(320, '5', 'Updated User', '2020-07-15 15:44:13'),
(321, '8', 'Logged Out', '2020-07-15 15:44:28'),
(322, '8', 'Logged In', '2020-07-15 15:44:35'),
(323, '5', 'Added New Employee', '2020-07-15 15:52:10'),
(324, '5', 'Updated User', '2020-07-15 15:53:06'),
(325, '4', 'Logged Out', '2020-07-15 15:53:12'),
(326, '10', 'Logged In', '2020-07-15 15:53:35'),
(327, '5', 'Add Employee Salary Structure', '2020-07-15 15:55:15'),
(328, '5', 'Added Employee Salary Structure', '2020-07-15 15:56:06'),
(329, '5', 'Added A New Job Role', '2020-07-15 16:01:45'),
(330, '6', 'Logged In', '2020-07-15 16:02:04'),
(331, '5', 'Added A New Quantitative Assessment Question', '2020-07-15 16:02:23'),
(332, '8', 'Logged In', '2020-07-15 16:06:47'),
(333, '5', 'Added New Salary Structure', '2020-07-15 16:23:11'),
(334, '5', 'Added New Allowance', '2020-07-15 16:24:43'),
(335, '5', 'Updated Payroll Year and Month', '2020-07-15 16:25:46'),
(336, '5', 'Added A New Variational Payment', '2020-07-15 16:28:27'),
(337, '5', 'Approved Variational Payment', '2020-07-15 16:29:44'),
(338, '5', 'Ran Payroll Routine', '2020-07-15 16:30:30'),
(339, '5', 'Approved Payroll Routine', '2020-07-15 16:31:47'),
(340, '6', 'Initiated Loan Application', '2020-07-15 16:45:41'),
(341, '5', 'Approved Loan', '2020-07-15 16:48:31'),
(342, '5', 'Updated Loan Repayment', '2020-07-15 16:53:28'),
(343, '5', 'Logged In', '2020-07-16 08:15:01'),
(344, '5', 'Logged Out', '2020-07-16 08:16:07'),
(345, '8', 'Logged In', '2020-07-16 08:16:14'),
(346, '8', 'Logged Out', '2020-07-16 08:17:44'),
(347, '6', 'Logged In', '2020-07-16 08:17:55'),
(348, '6', 'Logged Out', '2020-07-16 09:01:20'),
(349, '4', 'Logged In', '2020-07-16 09:01:36'),
(350, '6', 'Logged In', '2020-07-16 09:09:13'),
(351, '6', 'Logged Out', '2020-07-16 11:26:18'),
(352, '9', 'Logged In', '2020-07-16 11:26:52'),
(353, '9', 'Logged Out', '2020-07-16 11:27:22'),
(354, '6', 'Logged In', '2020-07-16 11:27:31'),
(355, '6', 'Logged Out', '2020-07-16 11:27:41'),
(356, '10', 'Logged In', '2020-07-16 11:28:39'),
(357, '10', 'Initiated Employee Transfer', '2020-07-16 12:28:51'),
(358, '10', 'Initiated Employee Transfer', '2020-07-16 12:32:19'),
(359, '4', 'Approved Employee Leave', '2020-07-16 12:32:38'),
(360, '10', 'Initiated Employee Transfer', '2020-07-16 16:27:07'),
(361, '4', 'Approved Employee Leave', '2020-07-16 16:27:23'),
(362, '4', 'Logged In', '2020-07-17 09:54:47'),
(363, '4', 'Logged In', '2020-07-20 14:42:48'),
(364, '4', 'Logged In', '2020-07-20 21:59:17'),
(365, '4', 'Logged In', '2020-07-21 08:19:49'),
(366, '4', 'Logged In', '2020-07-21 11:22:55'),
(367, '4', 'Logged In', '2020-07-21 13:27:57'),
(368, '6', 'Logged In', '2020-07-21 13:33:02'),
(369, '4', 'Logged Out', '2020-07-21 15:11:24'),
(370, '4', 'Logged In', '2020-07-21 16:18:36'),
(371, '4', 'Logged In', '2020-07-22 07:49:21'),
(372, '4', 'Logged Out', '2020-07-22 11:37:07'),
(373, '4', 'Logged In', '2020-07-22 11:37:30'),
(374, '4', 'Logged In', '2020-07-22 11:52:52'),
(375, '6', 'Logged In', '2020-07-23 08:35:06'),
(376, '6', 'Logged Out', '2020-07-23 08:37:23'),
(377, '4', 'Logged In', '2020-07-23 08:37:30'),
(378, '4', 'Logged In', '2020-07-23 12:09:18'),
(379, '4', 'Logged In', '2020-07-23 16:39:16'),
(380, '4', 'Logged In', '2020-07-24 14:55:04'),
(381, '4', 'Logged In', '2020-07-27 23:06:07'),
(382, '4', 'Logged Out', '2020-07-27 23:09:19'),
(383, '7', 'Logged In', '2020-07-27 23:09:30'),
(384, '7', 'Logged Out', '2020-07-27 23:10:34'),
(385, '4', 'Logged In', '2020-07-27 23:10:46'),
(386, '4', 'Logged In', '2020-07-28 09:32:34'),
(387, '4', 'Added New Training', '2020-07-28 10:27:47'),
(388, '4', 'Added New Training', '2020-07-28 10:29:38'),
(389, '4', 'Added New Training', '2020-07-28 10:37:59'),
(390, '4', 'Added New Training', '2020-07-28 11:07:00'),
(391, '4', 'Added New Training', '2020-07-28 11:10:17'),
(392, '4', 'Added New Training', '2020-07-28 11:18:38'),
(393, '4', 'Updated Training', '2020-07-28 12:10:44'),
(394, '4', 'Updated Training', '2020-07-28 13:12:36'),
(395, '4', 'Updated Training', '2020-07-28 13:14:08'),
(396, '4', 'Added New Question to Training', '2020-07-28 14:03:56'),
(397, '4', 'Updated Training ', '2020-07-28 14:17:16'),
(398, '4', 'Updated Training ', '2020-07-28 14:17:27'),
(399, '4', 'Updated Training', '2020-07-28 14:53:33'),
(400, '4', 'Updated Training ', '2020-07-28 14:54:15'),
(401, '4', 'Added New Question to Training', '2020-07-28 14:54:56'),
(402, '4', 'Updated Training ', '2020-07-28 16:03:40'),
(403, '4', 'Logged Out', '2020-07-28 16:10:42'),
(404, '7', 'Logged In', '2020-07-28 16:10:56'),
(405, '7', 'Logged Out', '2020-07-28 17:03:23'),
(406, '4', 'Logged In', '2020-07-28 20:50:46'),
(407, '4', 'Logged Out', '2020-07-28 22:51:40'),
(408, '6', 'Logged In', '2020-07-28 22:51:53'),
(409, '7', 'Logged In', '2020-07-29 08:57:57'),
(410, '4', 'Logged In', '2020-07-29 08:58:47'),
(411, '4', 'Update Employee Record', '2020-07-29 08:59:25'),
(412, '6', 'Logged In', '2020-07-29 11:52:58'),
(413, '6', 'Logged Out', '2020-07-29 11:53:15'),
(414, '7', 'Logged In', '2020-07-29 11:53:23'),
(415, '6', 'Logged In', '2020-07-29 14:54:07'),
(416, '4', 'Logged In', '2020-07-31 07:08:57'),
(417, '4', 'Logged Out', '2020-07-31 07:09:05'),
(418, '7', 'Logged In', '2020-07-31 07:09:13'),
(419, '7', 'Logged In', '2020-08-01 10:10:39'),
(420, '6', 'Logged In', '2020-08-01 11:57:55'),
(421, '6', 'Logged In', '2020-08-03 09:28:57'),
(422, '7', 'Logged In', '2020-08-03 09:57:44'),
(423, '6', 'Logged Out', '2020-08-03 11:15:42'),
(424, '7', 'Logged In', '2020-08-03 11:15:51'),
(425, '7', 'Logged Out', '2020-08-03 11:20:37'),
(426, '4', 'Logged In', '2020-08-03 11:20:48'),
(427, '7', 'Logged In', '2020-08-03 11:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `memo_id` int(11) NOT NULL,
  `memo_subject` text NOT NULL,
  `memo_body` text NOT NULL,
  `memo_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`memo_id`, `memo_subject`, `memo_body`, `memo_date`) VALUES
(1, 'Felicitation - oki-Peter', '  <p><img xss=\"removed\" k=\" data-filename=\"><b>This finally works, I am not happy - lol</b><br></p><p> </p><p> </p> <p></p>  ', '2020-07-09 00:00:00'),
(2, '999 - I miss you bruv', ' The Man, The Legend, The Myth and remember to stay 4164<br>', '2020-07-10 00:00:00'),
(3, 'Energy Saving', 'awsdasdasdas ', '2020-07-10 00:00:00');

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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_employee_id` int(11) NOT NULL,
  `notification_type` text NOT NULL,
  `notification_link` text NOT NULL,
  `notification_status` int(11) NOT NULL,
  `notification_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_employee_id`, `notification_type`, `notification_link`, `notification_status`, `notification_date`) VALUES
(1, 10, 'New Query', 'leavesu', 1, '2020-07-14 10:30:20'),
(2, 10, 'New Queries', 'leaves', 1, '2020-07-14 10:36:13'),
(3, 10, 'better work', 'your ear', 1, '2020-07-14 10:39:49'),
(4, 10, 'Leave Approved', 'my_leave', 1, '2020-07-14 13:06:54'),
(5, 10, 'New Query', 'my_queries', 1, '2020-07-14 13:18:09'),
(6, 10, 'Query Closed', 'my_queries', 1, '2020-07-14 13:21:27'),
(7, 12, 'New Query', 'my_queries', 1, '2020-07-15 15:58:10'),
(8, 12, 'Respond to an Open Query', 'view_my_query/4', 0, '2020-07-15 15:58:55'),
(9, 0, 'Respond to an Open Query', 'view_my_query/4', 0, '2020-07-15 15:59:37'),
(10, 0, 'Respond to an Open Query', 'view_my_query/4', 0, '2020-07-15 15:59:44'),
(11, 12, 'Query Closed', 'my_queries', 0, '2020-07-15 16:00:18'),
(12, 12, 'Query Closed', 'my_queries', 0, '2020-07-15 16:00:26'),
(13, 12, 'Query Closed', 'my_queries', 0, '2020-07-15 16:00:49'),
(14, 12, 'Appraisal Started', 'appraisals', 1, '2020-07-15 16:03:39'),
(15, 11, 'New Employee to be Aprraised', 'appraise_employee', 1, '2020-07-15 16:03:39'),
(16, 12, 'Leave Approved', 'my_leave', 0, '2020-07-16 12:32:38'),
(17, 12, 'Leave Approved', 'my_leave', 0, '2020-07-16 16:27:23'),
(18, 7, 'New Training', 'my_trainings', 1, '2020-07-28 16:03:40'),
(19, 7, 'Information Updated', 'personal_information', 1, '2020-07-29 08:59:25'),
(20, 7, 'Resignation Discarded', 'employee_resignation', 1, '2020-07-29 09:03:37'),
(21, 7, 'Training Completed, Result Ready', 'my_trainings', 1, '2020-07-29 14:57:11'),
(22, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:34:00'),
(23, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:43:26'),
(24, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:44:36'),
(25, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:49:39'),
(26, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:50:17'),
(27, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:53:49'),
(28, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 07:54:30'),
(29, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:00:20'),
(30, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:01:31'),
(31, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:26:12'),
(32, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:27:49'),
(33, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:35:17'),
(34, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:36:56'),
(35, 7, 'Training Completed, Result Ready', 'my_trainings', 0, '2020-07-31 08:42:51');

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
(1, 7, 2020);

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
(4, 'ihumane_Xxd', 1, 0, 0, 0, 0, 0, 0),
(5, 'ihumane_qt5', 1, 0, 0, NULL, 0, 0, 0),
(7, 'ihumane_ER4', 1, 1, 1, 1, 1, 1, 1),
(8, 'ihumane_f2L', 0, 0, 0, 0, 0, 0, 0),
(9, 'ihumane_9b0', 1, 1, 0, 0, 0, 0, 0);

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
(6, 9, 2, 200000),
(19, 12, 1, 150000),
(20, 12, 1, 150000);

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
(3, 1, ' Active Directory performance, phone answer service<br>', 1, 5),
(4, 2, '<p>why php?<br></p>', 1, 5);

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
(1, 10, 'Why So fine', '<p><br></p><p>why so fine<br></p><p><br></p>', 0, '2020-07-09', 0),
(2, 10, 'Late', ' why so late<br>', 0, '2020-07-10', 0),
(3, 10, 'Testing my notifications', ' really dont care if it works or not, ok fuvk it, i care<br>', 1, '2020-07-14', 0),
(4, 12, 'continued lateness to work', '<p>you have 24hrs to explain to the management why you didnt resume work throughout last week</p>', 1, '2020-07-15', 0);

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
(17, 1, 0, '<p>Me</p>', '2020-07-10 08:54:07'),
(18, 2, 10, '<p>it was raining</p>', '2020-07-10 16:37:09'),
(19, 2, 0, '<p>not an excuse<br></p>', '2020-07-10 16:37:25'),
(20, 1, 10, '<p>good morning ma</p>', '2020-07-13 11:25:19'),
(21, 1, 10, '<p>good morning ma</p>', '2020-07-13 11:26:16'),
(22, 1, 0, '<p>heoo<br></p>', '2020-07-13 11:28:33'),
(23, 4, 12, '<p>Get out</p>', '2020-07-15 15:58:55'),
(24, 4, 0, '<p>why</p>', '2020-07-15 15:59:37'),
(25, 4, 0, '<p>why</p>', '2020-07-15 15:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `resignation`
--

CREATE TABLE `resignation` (
  `resignation_id` int(11) NOT NULL,
  `resignation_employee_id` int(11) NOT NULL,
  `resignation_reason` text NOT NULL,
  `resignation_effective_date` text NOT NULL,
  `resignation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `resignation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resignation`
--

INSERT INTO `resignation` (`resignation_id`, `resignation_employee_id`, `resignation_reason`, `resignation_effective_date`, `resignation_date`, `resignation_status`) VALUES
(1, 10, '<p> i am tired, i am not doing again    <br></p>', '2020-07-09', '2022-07-08 00:00:00', 2),
(2, 7, 'I am now running away, on to the next level', '2020-07-30', '2020-07-10 00:00:00', 2);

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
(370, 9, 7, 6, 2020, 110666.66666667, 1),
(371, 12, 1, 7, 2020, 150000, 1),
(372, 12, 1, 7, 2020, 150000, 1),
(373, 12, 7, 7, 2020, 18666.666666667, 1),
(374, 8, 8, 7, 2020, 15000, 1),
(375, 8, 1, 7, 2020, 200000, 1),
(376, 8, 2, 7, 2020, 50000, 1),
(377, 8, 6, 7, 2020, 5000, 1),
(378, 8, 3, 7, 2020, 50000, 1),
(379, 8, 7, 7, 2020, 18666.666666667, 1),
(380, 9, 8, 7, 2020, 375000, 1),
(381, 9, 1, 7, 2020, 5000000, 1),
(382, 9, 2, 7, 2020, 200000, 1),
(383, 9, 3, 7, 2020, 50000, 1),
(384, 9, 7, 7, 2020, 110666.66666667, 1),
(385, 10, 7, 7, 2020, -166.66666666667, 1),
(386, 11, 1, 7, 2020, 500000, 1),
(387, 11, 3, 7, 2020, 50000, 1),
(388, 11, 7, 7, 2020, 46666.666666667, 1);

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
(6, 2, 1, 500000),
(7, 3, 1, 500000),
(8, 3, 2, 500000);

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
(2, 'Human Resource Officer'),
(3, 'accountant');

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
-- Table structure for table `specific_memo`
--

CREATE TABLE `specific_memo` (
  `specific_memo_id` int(11) NOT NULL,
  `specific_memo_employee_id` int(11) NOT NULL,
  `specific_memo_subject` text NOT NULL,
  `specific_memo_body` text NOT NULL,
  `specific_memo_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specific_memo`
--

INSERT INTO `specific_memo` (`specific_memo_id`, `specific_memo_employee_id`, `specific_memo_subject`, `specific_memo_body`, `specific_memo_date`) VALUES
(1, 8, 'i Just Tested to see if Olarenwaju', ' <p>Ema Sun re Dagba o.</p><p><br></p><p>Won ni loto ko ni ku si kpo ika olarenwaju omo me<br></p> ', '2020-07-13 15:02:11'),
(2, 9, 'i Just Tested to see if Olarenwaju', '<p>Ema Sun re Dagba o.</p><p><br></p><p>Won ni loto ko ni ku si kpo ika  </p>', '2020-07-13 15:02:11'),
(3, 10, 'i Just Tested to see if Olarenwaju', '<p>Ema Sun re Dagba o.</p><p><br></p><p>Won ni loto ko ni ku si kpo ika  </p>', '2020-07-13 15:02:11');

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
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `training_name` text NOT NULL,
  `training_about` text NOT NULL,
  `training_duration_exam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_id`, `training_name`, `training_about`, `training_duration_exam`) VALUES
(2, 'safety', 'okay', 60),
(3, 'safety', '<p>for all employess with fire in their hass</p>', 50),
(5, 'safety', '<p>test</p>', 45),
(6, 'Elements of Programming', '   <p>To Introduce Participants to the basics of Programming</p>', 60);

-- --------------------------------------------------------

--
-- Table structure for table `training_material`
--

CREATE TABLE `training_material` (
  `training_material_id` int(11) NOT NULL,
  `training_material_training_id` int(11) NOT NULL,
  `training_material_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_material`
--

INSERT INTO `training_material` (`training_material_id`, `training_material_training_id`, `training_material_link`) VALUES
(10, 2, '031d2ddac9adef90e9e9dead86bec2c0.pdf'),
(11, 2, 'ca18171abf61308afdb2edd369bc521d.pdf'),
(12, 3, 'f66e2bcb25fc19be6399435694f6e9b1.pdf'),
(13, 4, '01_The_Prophetic_Destiny_(Apst_Arome_Osayi)_Tue_(Even_)_22nd_May_2018.mp3'),
(14, 5, 'f740dfb56c0c3c7ceb40f2aa72c5babe.mp3'),
(17, 6, '22652f52624daa2276ed02f8cb990844.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `training_question`
--

CREATE TABLE `training_question` (
  `training_question_id` int(11) NOT NULL,
  `training_question_training_id` text NOT NULL,
  `training_question_question` text NOT NULL,
  `training_question_option_a` text NOT NULL,
  `training_question_option_b` text NOT NULL,
  `training_question_option_c` text NOT NULL,
  `training_question_option_d` text NOT NULL,
  `training_question_correct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_question`
--

INSERT INTO `training_question` (`training_question_id`, `training_question_training_id`, `training_question_question`, `training_question_option_a`, `training_question_option_b`, `training_question_option_c`, `training_question_option_d`, `training_question_correct`) VALUES
(1, '6', '   <p>What is programming?</p>   ', 'Commanding the Computer', '   Instructing the computer', '   It is good   ', '   it is wrong   ', 'A'),
(2, '6', '<p>HTML stands for    </p>', 'Hypertext Markup Language', 'HTil', 'tor', 'na you sabi', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `training_result`
--

CREATE TABLE `training_result` (
  `training_result_id` int(11) NOT NULL,
  `training_result_employee_id` int(11) NOT NULL,
  `training_result_training_id` int(11) NOT NULL,
  `training_result_employee_training_id` int(11) NOT NULL,
  `training_result_question_id` int(11) NOT NULL,
  `training_result_correct_answer` text NOT NULL,
  `training_result_answer` text NOT NULL DEFAULT 'E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_result`
--

INSERT INTO `training_result` (`training_result_id`, `training_result_employee_id`, `training_result_training_id`, `training_result_employee_training_id`, `training_result_question_id`, `training_result_correct_answer`, `training_result_answer`) VALUES
(1, 7, 6, 1, 1, 'A', 'E'),
(2, 7, 6, 1, 2, 'A', 'E');

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
  `transfer_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `transfer_employee_id`, `transfer_type`, `transfer_from`, `transfer_to`, `transfer_date`) VALUES
(3, 7, 0, '1', '3', '2020-06-30 00:00:00'),
(4, 7, 0, '3', '1', '2020-06-30 00:00:00'),
(5, 0, 0, '', '0', '2020-07-13 00:00:00'),
(6, 0, 0, '', '0', '2020-07-13 00:00:00');

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
(4, 'administrator', 'admin@admin.com', '$2y$10$SlMOyD3Vs./1je91yR3Nueq9/eFKDu9huAOQ54a5kXNpXBU9teadi', 1, '1596450048', 'Administrator Administrator', '1'),
(5, 'peterejiro', 'peterejiro96@gmail.com', '$2y$10$7OLmMpkXuTEhrMdIIsdnoO4GCUs7yB/Hm7qL6rRAmHEA1lzikvOjW', 1, '', 'Oki-Peter Ejiroghene', '1'),
(6, 'ihumane_Xxd', 'ashaolu.rachael@connexxiongroup.com', '$2y$10$5PWarziFP.tywKLcI2Moje0n.IwHcDxb7/lvf5qND0Ng0/elMhOnq', 2, '', 'Ashaolu Rachael', '1'),
(7, 'ihumane_qt5', 'oki-peter@connexxiongroup.com', '$2y$10$5PWarziFP.tywKLcI2Moje0n.IwHcDxb7/lvf5qND0Ng0/elMhOnq', 2, '1596450394', 'Oki - Peter Ejirogehene', '1'),
(8, 'ihumane_ER4', 'janedoe@connexxiongroup.com', '$2y$10$X0FqzN0YBvcpJNRjcFkOD.tGSq/rTRAH/aj9Dkwi88m8dUjyCewHS', 3, '', 'Doe Jane', '1'),
(10, 'ihumane_9b0', 'jon@connexx.com', '$2y$10$KJsYwsXUCmPY48dA.6XKfuYsm5QtO/JJIAQZZxHQIDRwF5Enz22Yy', 3, '1594895319', 'doe john', '1');

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
(9, 8, 3, 50000, 1, '6', '2020'),
(10, 8, 3, 50000, 1, '7', '2020'),
(11, 9, 3, 50000, 1, '7', '2020'),
(12, 10, 3, 50000, 0, '7', '2020'),
(13, 11, 3, 50000, 1, '7', '2020');

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

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
-- Indexes for table `employee_biometrics`
--
ALTER TABLE `employee_biometrics`
  ADD PRIMARY KEY (`employee_biometrics_id`);

--
-- Indexes for table `employee_biometrics_login`
--
ALTER TABLE `employee_biometrics_login`
  ADD PRIMARY KEY (`employee_biometrics_login_id`);

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
-- Indexes for table `employee_training`
--
ALTER TABLE `employee_training`
  ADD PRIMARY KEY (`employee_training_id`);

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
-- Indexes for table `hr_document`
--
ALTER TABLE `hr_document`
  ADD PRIMARY KEY (`hr_document_id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

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
-- Indexes for table `specific_memo`
--
ALTER TABLE `specific_memo`
  ADD PRIMARY KEY (`specific_memo_id`);

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
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `training_material`
--
ALTER TABLE `training_material`
  ADD PRIMARY KEY (`training_material_id`);

--
-- Indexes for table `training_question`
--
ALTER TABLE `training_question`
  ADD PRIMARY KEY (`training_question_id`);

--
-- Indexes for table `training_result`
--
ALTER TABLE `training_result`
  ADD PRIMARY KEY (`training_result_id`);

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
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emolument_report`
--
ALTER TABLE `emolument_report`
  MODIFY `emolument_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_appraisal`
--
ALTER TABLE `employee_appraisal`
  MODIFY `employee_appraisal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_appraisal_result`
--
ALTER TABLE `employee_appraisal_result`
  MODIFY `employee_appraisal_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_biometrics`
--
ALTER TABLE `employee_biometrics`
  MODIFY `employee_biometrics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_biometrics_login`
--
ALTER TABLE `employee_biometrics_login`
  MODIFY `employee_biometrics_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `employee_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `employee_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_training`
--
ALTER TABLE `employee_training`
  MODIFY `employee_training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `hr_document`
--
ALTER TABLE `hr_document`
  MODIFY `hr_document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incident_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_role`
--
ALTER TABLE `job_role`
  MODIFY `job_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  MODIFY `loan_repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loan_reschedule_log`
--
ALTER TABLE `loan_reschedule_log`
  MODIFY `loan_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `minimum_tax_rate`
--
ALTER TABLE `minimum_tax_rate`
  MODIFY `minimum_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personalized_salary_structure`
--
ALTER TABLE `personalized_salary_structure`
  MODIFY `personalized_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `quantitative_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query_response`
--
ALTER TABLE `query_response`
  MODIFY `query_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `resignation`
--
ALTER TABLE `resignation`
  MODIFY `resignation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `salary_structure_allowance`
--
ALTER TABLE `salary_structure_allowance`
  MODIFY `salary_structure_allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary_structure_category`
--
ALTER TABLE `salary_structure_category`
  MODIFY `salary_structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `self_appraisee`
--
ALTER TABLE `self_appraisee`
  MODIFY `self_appraisee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specific_memo`
--
ALTER TABLE `specific_memo`
  MODIFY `specific_memo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_material`
--
ALTER TABLE `training_material`
  MODIFY `training_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `training_question`
--
ALTER TABLE `training_question`
  MODIFY `training_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_result`
--
ALTER TABLE `training_result`
  MODIFY `training_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `variational_payment`
--
ALTER TABLE `variational_payment`
  MODIFY `variational_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `work_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
