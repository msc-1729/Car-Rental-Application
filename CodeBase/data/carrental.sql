-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 06:08 AM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'msc', '2020-02-29 05:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `mailid` varchar(50) NOT NULL,
  `pannum` varchar(15) NOT NULL,
  `licensenum` varchar(15) NOT NULL,
  `panimg` varchar(120) CHARACTER SET latin1 NOT NULL,
  `licenseimg` varchar(120) CHARACTER SET latin1 NOT NULL,
  `checkvalue` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`mailid`, `pannum`, `licensenum`, `panimg`, `licenseimg`, `checkvalue`) VALUES
('abcde@gmail.com', 'ABCDE4567C', 'AB123456ABCDEFG', 'boltinterior.jpg', 'e2.jpg', 0),
('sab@gmail.com', 'ABCDE4567C', 'AB123456ERTYUIO', 'bolt4.jpg', 'code1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promocode` varchar(20) NOT NULL,
  `offer` int(10) DEFAULT NULL,
  `vdate` date DEFAULT NULL,
  `promoimg` varchar(120) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promocode`, `offer`, `vdate`, `promoimg`) VALUES
('12wsxzaq', 20, '2020-05-28', 'code1.jpg'),
('shoban', 20, '2020-03-12', 'code2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(1, 'test@gmail.com', 2, '22/06/2017', '25/06/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 1, '2017-06-19 20:15:43'),
(2, 'test@gmail.com', 3, '30/06/2017', '02/07/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 2, '2017-06-26 20:15:43'),
(3, 'test@gmail.com', 4, '02/07/2017', '07/07/2017', 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ', 0, '2017-06-26 21:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2020-01-15 16:24:34', '2020-02-12 06:42:23'),
(2, 'TATA', '2020-02-12 16:24:50', '2020-02-29 14:13:46'),
(3, 'FORD', '2020-02-12 16:25:03', '2020-02-29 14:14:07'),
(4, 'HYUNDAI', '2020-02-12 16:25:13', '2020-02-29 14:14:22'),
(5, 'Toyota', '2020-02-13 16:25:24', '2020-02-29 14:14:41'),
(7, 'MAHINDRA', '2020-02-13 06:22:13', '2020-02-29 14:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Mathura Block			', 'mannemuddu.shobanadri@gmail.com', '9398067582');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'MSC', 'msc1729@gmail.com', '9381067472', 'Any problem in renting the car? Feel free to contact us to the given number.', '2020-02-14 10:03:07', 1),
(2, 'sdj', 'sdfhdsufjl@gmail.com', 'awklmasdkmk', 'adfj lgvg', '2020-03-01 04:02:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																				<p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">I AGREE TO RENT FROM WHAT THE CAB A RENTAL CAR AND AGREE TO THE TERMS BELOW.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">MY REPRESENTATIONS: : I REPRESENT TO WHAT THE CAB THAT (A) I AM AT LEAST 18 YEARS OF AGE AND IN SOUND MEDICAL CONDITION, (B) I POSSESS A VALID DRIVERS LICENSE THAT QUALIFIES ME TO OPERATE A CAR IN MY PERMANENT STATE OR COUNTRY OF RESIDENCE, (C) I AM NOT UNDER THE INFLUENCE OF AN ALCOHOLIC BEVERAGE OR CONTROLLED SUBSTANCE INCLUDING PRESCRIPTION OR NONPRESCRIPTION MEDICATION WHICH COULD IMPAIR MY ABILITY TO OPERATE THE CAR SAFELY.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">OWNERSHIP AND USE: WHAT THE CAB IS THE OWNER OF THE CAR, AND NEITHER I NOR ANYONE ELSE WILL ACQUIRE ANY INTEREST IN THE CAR BY REASON OF THIS AGREEMENT. I WILL NOT OPERATE OR TRANSPORT THE CAR OUTSIDE INDIA. I WILL COMPLY WITH ALL LAWS, ORDINANCES AND GOVERNMENT REGULATIONS RELATING TO USE AND OPERATION OF THE CAR. IT IS MY RESPONSIBILITY TO KNOW THE LAWS, ORDINANCES, AND GOVERNMENT REGULATIONS. I WILL CHECK THE CAR ENGINE OIL LEVEL EACH TIME I REFUEL. I WILL REPORT ANY MECHANICAL FAILURES TO WHAT THE CAB IMMEDIATELY. I WILL NOT SERVICE OR REPAIR THE CAR, OR REPLACE ANY PART OR ACCESSORY WITHOUT WHAT THE CAB PRIOR APPROVAL, OR SUCH ACTIONS ARE AT MY RISK AND EXPENSE. I WILL KEEP THE CAR LOCKED WHILE UNATTENDED. IN CASE OF AN ACCIDENT INVOLVING THE CAR I WILL CALL AND NOTIFY THE POLICE AND WHAT THE CAB IMMEDIATELY. IF I AM INVOLVED IN AN ACCIDENT I UNDERSTAND THE CAR WILL NOT BE REPLACED, AND THIS AGREEMENT WILL AUTOMATICALLY BE TERMINATED WITHOUT REFUND. IN ADDITION I WILL REPORT ANY SERVICE PROBLEMS TO WHAT THE CAB IMMEDIATELY AND WILL NOT OPERATE THE CAR WITH ANY WARNING LIGHTS ON. I WILL STOP IMMEDIATELY IN THE EVENT OF A TEMPERATURE OR OIL INDICATOR.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">DOCUMENTS REQUIRED: I SHALL FURNISH A VALID DRIVING LICENSE AT THE TIME OF PICKING UP THE VEHICLE. IN ADDITION, I SHALL SUBMIT AN ORIGINAL ID PROOF (PASSPORT, PAN CARD, VOTERS ID OR AADHAAR CARD) AT THE TIME OF PICKING UP THE VEHICLE.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">RENTAL CHARGES: I WILL PAY FOR THE LENGTH OF TIME I RENT THE CAR AT THE RATE SHOWN IN TARIFF. I AM PRIMARILY LIABLE FOR ALL CHARGES ARISING FROM THE TERMS AND CONDITIONS OF THIS AGREEMENT. IN THE EVENT OF DAMAGES I AGREE TO PAY CHARGE OF REPAIRS OF THE CAR.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">CANCELLATION POLICY: IF A CONFIRMED BOOKING IS CANCELLED, I UNDERSTAND AND ACCEPT THAT THE REFUND WOULD BE MADE AS PER THE FOLLOWING SCHEDULE (A) LESS THAN 24 HOURS BEFORE THE SCHEDULED TIME OF HIRE-- NO REFUND* (*50% Refund for following locations booking: 1. Kumaraswamy Layout ( near Dayananda sagar) 2. Koramangala(near forum mall) 3. Marathahalli (near star Extra) 4. Mathikere 5. other location no refund ) (B) 24 HOURS TO ONE WEEK BEFORE THE SCHEDULED TIME OF HIRE -- 70% REFUND. (C) MORE THAN ONE WEEK BEFORE THE SCHEDULED DATE OF HIRE -- 90% REFUND. (D) WHAT THE CAB CANCELS THE BOOKING DUE TO BREAK DOWN, NON-AVAILABILITY OF THE BIKE OR ANY OTHER UNFORESEEN REASON - 100% REFUND.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">NO SHOW: WHAT THE CAB WILL NOT BE LIABLE FOR ANY REFUND IF I DON’T PICK UP THE RESERVED VECHILE WITHIN THE DURATION FOR WHICH THE VEHICLE HAS BEEN RESERVED.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">FUEL CHARGES: TARRIF SCHEDULE DOES NOT COVER COST OF FUEL AND I SHALL REFUEL IT AT MY OWN COST. I WILL PAY A FUEL SERVICE CHARGE IF I RETURN THE VEHICLE WITH LESS FUEL THAN WHEN RENTED.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">OVERTIME : IF I DON’T RETURN THE VEHICLE BEFORE THE END OF RESERVATION PERIOD, I WILL PAY AN OVERTIME CHARGE WHICH WILL BE DOUBLE OF TARIFF RATE PER HOUR FOR EACH EXTRA HOUR BEYOND THE RESERVATION PERIOD. IN CASE THE VEHICLE IS NOT RETURNED WITHIN THE BUSINESS DAY (9 AM- PM), THE RETURN CAN HAPPEN ONLY THE NEXT DAY AND OVERTIME CHARGES WILL APPLY ACCORDINGLY. I AGREE TO PAY WHAT THE CAB ALL OF THE FOLLOWING CHARGES THAT MAY COME DUE; (A) ALL FINES, PENALTIES, FORFEITURES, COURT COSTS AND OTHER EXPENSES (INCLUDING FINE FOR PARKING IN NO PARKING, TRAFFIC AND VIOLATIONS); (B) UNLESS THE VEHICLE IS STOLEN OR DESTROYED, IF I DO NOT RETURN THE MOTORCYCLE TO WHAT THE CAB ON THE DATE AND TIME SPECIFIED ABOVE, ; (C) IF I AM IN DEFAULT UNDER THIS AGREEMENT WHAT THE CAB MAY RETAIN THE SECURITY DEPOSIT AND OTHER FUNDS PAID BY ME TO WHAT THE CAB, AND I WILL BE LIABLE FOR ANY AND ALL ADDITIONAL DAMAGES TO WHAT THE CAB.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">RETURN OF THE CAR: I WILL RETURN THE CAR ON THE DATE AND TIME INDICATED ABOVE, IN THE SAME CONDITION AS WHEN RECEIVED, ONLY ORDINARY WEAR AND TEAR FROM PROPER USE EXCEPTED. I WILL RETURN THE CAR SOONER UPON WAHT THE CAB DEMAND. ANY CAR NOT RETURNED WITHIN FOUR HOURS OF THE RETURN TIME SPECIFIED ABOVE WILL BE REPORTED TO THE POLICE AS STOLEN. I WAIVE ALL CLAIMS AGAINST WHAT THE CAB FOR ANY CONSEQUENCES ENSUING FROM WHAT THE CAB FOR MAKING SUCH REPORT. FAILURE TO RETURN THE CAR MAY CONSTITUTE A FELONY PUNISHABLE BY LAW.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">DAMAGE / LOSS OF CAR: IF THE CAR IS STOLEN OR DAMAGED IRRESPECTIVE OF MY NEGLIGENCE OR INTENTIONAL MISCONDUCT, I WILL PAY TO WHAT THE CAB (A) ITS RETAIL FAIR MARKET VALUE BEFORE THEFT OR DAMAGE, UNLESS WHAT THE CAB REPAIR COST PLUS THE REDUCTION OF THE CAR\'S VALUE AFTER REPAIRS IS LESS AND WHAT THE CAB ARE NOT REQUIRED BY LAW TO SALVAGE THE CAR, IN WHICH CASE I WILL PAY THE LATTER AMOUNT; (B) LOSS OF USE BASED ON REASONABLE DOWNTIME, OR AS SPECIFIED BY LAW (EXCEPT FOR THEFT, WHERE THE CAR IS NOT COVERED), (C) DIMINUTION OF VALUE, LOSS OF USE, AND ADMINISTRATIVE FEES.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">I AGREE THAT WHAT THE CAB WILL NOT BE LIABLE TO ME FOR ANY LOSS, CONSEQUENTIAL OR OTHER DAMAGES OR EXPENSES OF ANY KIND CAUSED DIRECTLY OR INDIRECTLY BY, OR ARISING IN CONNECTION WITH, THE CAR, ITS USE, OR OPERATION OR FAILURE TO OPERATE, MAINTENANCE OR FAILURE TO BE MAINTAINED, OR BY ANY INTERRUPTION OF SERVICE OR LOSS OF USE OF THE CAR.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">PROHIBITED USES: I WILL NOT USE OR PERMIT THE CAR TO BE USED (A) BY ANY PERSON OTHER THAN ME; (B) TO CARRY PASSENGERS OR PROPERTY FOR HIRE; (C) TO TOW, OR TO BE TOWED; (D) TO BE OPERATED ON AN UNPAVED ROAD; (E) TO BE OPERATED IN A RACE OR CONTEST; (F) TO INSTRUCT AN UNLICENSED PERSON IN THE OPERATION OF THE CAR; (G) TO BE OPERATED BY ANY PERSON WHO IS PROHIBITED BY LAW FROM OPERATING A CAR; (H) WHILE UNDER THE INFLUENCE OF ALCOHOL OR ANY CONTROLLED SUBSTANCE, OR A PRESCRIPTION OR NONPRESCRIPTION DRUG WHICH COULD IMPAIR MY ABILITY TO OPERATE THE CAR; (I) FOR AN ILLEGAL PURPOSE, INCLUDING TRANSPORTATION OF A CONTROLLED SUBSTANCE OR CONTRABAND. A VIOLATION OF THIS PARAGRAPH AUTOMATICALLY TERMINATES THIS AGREEMENT AND MAKES ME LIABLE TO WHAT THE CAB FOR ALL FINES, FORFEITURES, LIENS AND RECOVERY AND STORAGE COSTS, INCLUDING ALL RELATED LEGAL EXPENSES.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">NO ASSIGNMENT: I WILL NOT SELL, TRANSFER, ASSIGN OR SUBLEASE ANY OF MY INTEREST IN THIS AGREEMENT OR THE CAR AND ANY SUCH ATTEMPTED SALE, ASSIGNMENT TRANSFER OR SUBLEASE IS VOID AND OF NO EFFECT.</span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\"><br></span></p><p style=\"margin-bottom: 10px; line-height: 1.6; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 17.5px;\">PERSONAL INFORMATION: I UNDERSTAND THAT THE PERSONAL INFORMATION I HAVE DISCLOSED IN THIS AGREEMENT WILL BE COLLECTED AND STORED BY WHAT THE CAB AND WHAT THE CAB AFFILIATES FOR THE PURPOSES OF SUPPLYING A RECORD OF MY RENTAL. BY SIGNING THIS AGREEMENT I AUTHORIZE WHAT THE CAB TO PROCESS MY INFORMATION AND DISCLOSE IT TO WHAT THE CAB AFFILIATES, AND I ALSO AUTHORIZE WHAT THE CAB TO USE MY PERSONAL INFORMATION FOR VARIOUS PURPOSES, INCLUDING DIRECT MARKETING ACTIVITIES. I UNDERSTAND THAT I HAVE THE RIGHT TO STOP THE PROCESSING OF MY PERSONAL INFORMATION BY SENDING WHAT THE CAB A WRITTEN REQUEST TO THAT EFFECT.</span></p><p style=\"margin-bottom: 10px; font-size: 1.25em; line-height: 1.6; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\"><br></p>\r\n										\r\n										'),
(2, 'Privacy Policy', 'privacy', '<div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">THIS PRIVACY POLICY IS AN ELECTRONIC RECORD IN THE FORM OF AN ELECTRONIC CONTRACT FORMED UNDER THE INFORMATION TECHNOLOGY ACT, 2000 AND THE RULES MADE THEREUNDER AND THE AMENDED PROVISIONS PERTAINING TO ELECTRONIC DOCUMENTS / RECORDS IN VARIOUS STATUTES AS AMENDED BY THE INFORMATION TECHNOLOGY ACT, 2000. THIS PRIVACY POLICY DOES NOT REQUIRE ANY PHYSICAL, ELECTRONIC OR DIGITAL SIGNATURE.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">THE TERMS \"WE/US/OUR/WHAT THE CAB\" INDIVIDUALLY AND COLLECTIVELY REFER TO WAHT THE CAB AND THE TERMS \"YOU/YOUR/YOURSELF\" REFER TO THE USERS/MEMBERS UNDER MEMBERHSIP AGREEMENT.&nbsp;</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">THIS PRIVACY POLICY IS A LEGALLY BINDING DOCUMENT BETWEEN YOU AND WHAT THE CAB (BOTH TERMS DEFINED ABOVE).</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">THIS DOCUMENT IS PUBLISHED AND SHALL BE CONSTRUED IN ACCORDANCE WITH THE PROVISIONS OF THE INFORMATION TECHNOLOGY (REASONABLE SECURITY PRACTICES AND PROCEDURES AND SENSITIVE PERSONAL DATA OF INFORMATION) RULES, 2011 UNDER INFORMATION TECHNOLOGY ACT, 2000; THAT REQUIRE PUBLISHING OF THE PRIVACY POLICY FOR COLLECTION, USE, STORAGE AND TRANSFER OF SENSITIVE PERSONAL DATA OR INFORMATION.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">PLEASE READ THIS PRIVACY POLICY CAREFULLY. BY USING THE WEBSITE, YOU INDICATE THAT YOU UNDERSTAND, AGREE AND CONSENT TO THIS PRIVACY POLICY. IF YOU DO NOT AGREE WITH THE TERMS OF THIS PRIVACY POLICY, PLEASE DO NOT USE THIS WEBSITE. YOU HEREBY PROVIDE YOUR UNCONDITIONAL &amp; IRREVOCALBLE CONSENT TO WHAT THE CAB FOR THE PURPOSES PRESCRIBED UNDER INCLUDING BUT NOT LIMITED TO PROVISIONS OF SECTIONS 43A, 72 AND SECTION 72A OF INFORMATION TECHNOLOGY ACT, 2000.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">This Privacy Policy (the “Policy”) sets out how WHAT THE CAB collects, uses, protects &amp; shares any information that you give to us, when you use this website i.e. www.whatthecab.com including its m-application (the “Website”). WHAT THE CAB is committed to ensure that your privacy is protected to all possible, reasonable and commercial extent, as your privacy on the Internet is of the utmost importance to us. Because we gather certain types of information about You in order to provide, protect, maintain and improve our services, We feel You should fully understand the Policy surrounding the capture and use of that information and solicit Your full attention towards it.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">By providing us your Information or by making use of the facilities provided by the Website, You hereby consent to the collection, storage, processing and transfer of any or all of Your Personal Information and Non-Personal Information by WHAT THE CAB, as specified under this Policy. You further represent and warrant that such collection, use, storage and transfer of Your Information shall not cause any loss or wrongful gain to you or any other person.&nbsp;</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">This Policy is a legally binding contract between You and WHAT THE CAB, whose Website, You use or access or You otherwise deal with. This Policy shall be read together with the other terms and condition of the Website viz, Membership Agreement and Fees Policy being displayed on the website</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">www.whatthecab.com.</span></div>'),
(3, 'About Us ', 'aboutus', '<div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">This is an indigenous project done by pigeon.</span></div>'),
(11, 'FAQs', 'faqs', '										<div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">HOW&nbsp; MUCH DO YOU CHARGE FOR EXTRA TIME?</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">A)TWENTY RUPEES PER HOUR.</span></div>\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'anuj.lpu1@gmail.com', '2017-06-22 16:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'Test Test', '2017-06-18 07:44:31', 1),
(2, 'test@gmail.com', '\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilis', '2017-06-18 07:46:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(5, 'sarath', 'sarathmahamkali1729@gmail.com', '25d55ad283aa400af464c76d713c07ad', '9381067472', NULL, NULL, NULL, NULL, '2020-02-29 05:09:22', '2020-03-01 10:12:16'),
(6, 'sarath', 'mannemuddu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9381067472', NULL, NULL, NULL, NULL, '2020-03-01 10:16:06', NULL),
(7, 'Ravi', 'sab@gmail.com', 'eaa891d6a2865488a4c7d80d965ae9d8', '9381067472', '02/05/2010', '9/2/42\r\nPrestige Apartments\r\nHarlur road\r\n', 'Bangalore', 'Bangalore', '2020-03-01 10:44:44', '2020-03-11 04:14:42'),
(8, 'sarath', 'sarathmahamkali172@gmail.com', '2cc0ee2e7eb2b7ca2974dd0559a4631a', '9381067472', NULL, NULL, NULL, NULL, '2020-03-01 14:06:07', NULL),
(11, 'sarath', 'sarathmahamkali176@gmail.com', '2cc0ee2e7eb2b7ca2974dd0559a4631a', '9381067472', NULL, NULL, NULL, NULL, '2020-03-02 18:02:08', NULL),
(12, 'rank', 'sans@gmail.com', 'c694ac7ee06f721cfd2f7473ccfdaa69', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 14:02:06', NULL),
(13, 'solo', 'sara@gmail.com', '084a960e622f1462148ea8f309d0f279', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 14:05:07', NULL),
(14, 'sarath', 'abcde@gmail.com', 'bee8f4be3f7623ef82d2aafcc62d8f29', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 14:07:14', NULL),
(15, 'sarath', 'abc@gmail.com', 'eaa891d6a2865488a4c7d80d965ae9d8', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:12:59', NULL),
(16, 'sarath', 'poiu@gmail.com', 'eaa891d6a2865488a4c7d80d965ae9d8', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:15:18', NULL),
(17, 'sarath', 'ab@gmail.com', 'eaa891d6a2865488a4c7d80d965ae9d8', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:28:47', NULL),
(18, 'sarath', 'abcf@gmail.com', '893b4e2e89915c87fdc98a0e45f77138', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:32:19', NULL),
(19, 'sarath', 'and@gmail.com', '893b4e2e89915c87fdc98a0e45f77138', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:36:38', NULL),
(20, 'raju', 'san@gmail.com', '4ba11e32eddaf31ed98a1ae7b6213bdb', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:38:33', NULL),
(21, 'sarath', 'zxs@gmail.com', '164d5fdfd02634293161afac4cf47299', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:50:37', NULL),
(22, 'sarath', 'abk@gmail.com', 'eaa891d6a2865488a4c7d80d965ae9d8', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:56:34', NULL),
(23, 'sarath', 'abl@gmail.com', '25310f4caaffd8fd2445c51c316fe162', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 15:58:57', NULL),
(24, 'sarath', 'abp@gmail.com', '25310f4caaffd8fd2445c51c316fe162', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 16:00:53', NULL),
(25, 'sarath', 'abi@gmail.com', '25310f4caaffd8fd2445c51c316fe162', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 16:02:03', NULL),
(26, 'sarath', 'lol@gmail.com', '25310f4caaffd8fd2445c51c316fe162', '9381067472', NULL, NULL, NULL, NULL, '2020-03-03 17:57:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'BOLT', 2, 'A VEHICLE THAT SUITABLE FOR A COMFORTABLE AND SAFE JOURNEY.', 2000, 'Petrol', 2010, 5, 'bolt1.jpg', 'boltinterior.jpg', 'bolt3.jpg', 'bolt4.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-06-19 11:46:23', '2020-02-29 16:26:55'),
(2, 'HARRIER', 2, 'A VEHICLE HIGHLY RECOMMENDED FOR  TRAVELLING AT A LOW RENTAL COST.', 4500, 'Diesel', 2015, 7, 'harrier.jpg', 'harrier2.jpg', 'harrier3.jpg', 'h4.jpg', '', 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, '2017-06-19 16:16:17', '2020-02-29 16:27:43'),
(3, 'X-CENT', 4, 'A FUEL EFFICIENT AND A WONDERFUL CAR FOR A GREAT DRIVING EXPERIENCE.', 2000, 'Diesel', 2013, 5, 'x1.jpg', 'x2.jpg', 'x3.jpg', 'x4.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, '2017-06-19 16:18:20', '2020-02-29 16:28:15'),
(4, 'DZIRE VDI', 1, 'A MOST USED VEHICLE FROM A TOP BRAND OF THE COUNTRY.', 2500, 'Diesel', 2010, 5, 'd1.jpg', 'd2.jpg', 'd3.jpg', 'd4.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2017-06-19 16:18:43', '2020-02-29 16:28:34'),
(5, 'ECO SPORT', 3, 'A STYLISH CAR ALWAYS PREFERABLE FOR ANY OCCASION.', 3500, 'CNG', 2013, 5, 'e1.jpg', 'e2.jpg', 'e3.jpg', 'e4.jpg', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-06-20 17:57:09', '2020-02-29 16:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `usercards`
--

CREATE TABLE `usercards` (
  `username` varchar(50) NOT NULL,
  `cardnumber` bigint(20) NOT NULL,
  `expdate` date NOT NULL,
  `cvv` int(5) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercards`
--

INSERT INTO `usercards` (`username`, `cardnumber`, `expdate`, `cvv`, `email`) VALUES
('sarath', 1234567890123456, '2020-01-03', 789, 'lol@gmail.com'),
('sarath', 1234567890123456, '2020-01-03', 789, 'sab@gmail.com'),
('sarath', 9381067472123456, '2020-01-03', 789, 'sab@gmail.com'),
('sarath', 9573385572123456, '2020-01-03', 789, 'sab@gmail.com'),
('raju', 9876543219876543, '2020-03-01', 789, 'sab@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `amount` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`amount`, `email`) VALUES
(9200, 'sab@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promocode`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercards`
--
ALTER TABLE `usercards`
  ADD PRIMARY KEY (`cardnumber`,`email`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
