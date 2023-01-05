-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `buk_online_exam`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `buk_online_exam` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `buk_online_exam`;

--
-- Table structure for table `admin_signup`
--

DROP TABLE IF EXISTS `admin_signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `reset_password` varchar(255) NOT NULL,
  `authenticate` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_signup`
--

LOCK TABLES `admin_signup` WRITE;
/*!40000 ALTER TABLE `admin_signup` DISABLE KEYS */;
INSERT INTO `admin_signup` VALUES (1,'Super','sulaiman m yunusa','myunusa','09124923173','myunusahja1@gmail.com','123456','myunusa1.jpg','RP-5149','authen69430'),(4,'User','ibrahim musa','musa11','09054434321','myunusahja5@gmail.com','Musa11','musa11.png','RP-3658',''),(5,'Super','salisu umar','salisu1','08033045852','myunusahja3@gmail.com','salisu1','salisu1.jpeg','RP-7789','authen38022');
/*!40000 ALTER TABLE `admin_signup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apply_date`
--

DROP TABLE IF EXISTS `apply_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apply_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply_date`
--

LOCK TABLES `apply_date` WRITE;
/*!40000 ALTER TABLE `apply_date` DISABLE KEYS */;
INSERT INTO `apply_date` VALUES (1,'utme','2022-06-11 00:00:01','2022-06-13 23:59:59'),(2,'de','2022-06-11 00:00:01','2022-06-13 23:59:59');
/*!40000 ALTER TABLE `apply_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  `acknowledge` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'sulaiman m yunusa','myunusahja2@gmail.com','08064405746','change password','hgvjhkbj   uiguoihuiyu ftuyigy','2022-06-05 14:05:00','Not acknowledged'),(2,'sulaiman m yunusa','myunusahja2@gmail.com','08064405746','change password','hgvjhkbj   uiguoihuiyu ftuyigy','2022-06-05 14:29:00','Acknowledged');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de`
--

DROP TABLE IF EXISTS `de`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  `a_level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de`
--

LOCK TABLES `de` WRITE;
/*!40000 ALTER TABLE `de` DISABLE KEYS */;
INSERT INTO `de` VALUES (1,'ibrahim musa','98765464FA','ND');
/*!40000 ALTER TABLE `de` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de_education`
--

DROP TABLE IF EXISTS `de_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(100) NOT NULL,
  `primary_school` varchar(100) NOT NULL,
  `pri_graduated` date NOT NULL,
  `secondary_school` varchar(100) NOT NULL,
  `sec_graduated` date NOT NULL,
  `Exam_no` varchar(100) NOT NULL,
  `subject1` varchar(100) NOT NULL,
  `subject2` varchar(100) NOT NULL,
  `subject3` varchar(100) NOT NULL,
  `subject4` varchar(100) NOT NULL,
  `subject5` varchar(100) NOT NULL,
  `subject6` varchar(100) NOT NULL,
  `subject7` varchar(100) NOT NULL,
  `subject8` varchar(100) NOT NULL,
  `subject9` varchar(100) NOT NULL,
  `grade1` varchar(100) NOT NULL,
  `grade2` varchar(100) NOT NULL,
  `grade3` varchar(100) NOT NULL,
  `grade4` varchar(100) NOT NULL,
  `grade5` varchar(100) NOT NULL,
  `grade6` varchar(100) NOT NULL,
  `grade7` varchar(100) NOT NULL,
  `grade8` varchar(100) NOT NULL,
  `grade9` varchar(100) NOT NULL,
  `ssce_result` varchar(100) NOT NULL,
  `alevel_school` varchar(255) NOT NULL,
  `alevel_date` date NOT NULL,
  `alevel_course` varchar(255) NOT NULL,
  `alevel_cgp` varchar(100) NOT NULL,
  `alevel_result` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de_education`
--

LOCK TABLES `de_education` WRITE;
/*!40000 ALTER TABLE `de_education` DISABLE KEYS */;
INSERT INTO `de_education` VALUES (1,'DE/2022/23/3400','safa','2015-11-29','safa','2019-10-26','234567891AQ','English Language','Mathematics','Agricultural Science','Agricultural Science','Agricultural Science','Agricultural Science','Agricultural Science','Chemistry','Biology','B2','B2','B2','B2','B2','B2','A1','B2','B2','98765464FA.pdf','hadejia','1998-04-05','computer','2.0 - 2.9','98765464FA.pdf','Faculty of COM & IT');
/*!40000 ALTER TABLE `de_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de_infor`
--

DROP TABLE IF EXISTS `de_infor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de_infor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  `a_level` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `state_origin` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de_infor`
--

LOCK TABLES `de_infor` WRITE;
/*!40000 ALTER TABLE `de_infor` DISABLE KEYS */;
INSERT INTO `de_infor` VALUES (1,'DE/2022/23/3400','ibrahim musa','98765464FA','ND','myunusahja1@gmail.com','08064405757','2014-12-04','Male','Single','Jigawa','98765464FA.jpeg');
/*!40000 ALTER TABLE `de_infor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_date`
--

DROP TABLE IF EXISTS `exam_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `start_exam` varchar(100) NOT NULL,
  `end_exam` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_date`
--

LOCK TABLES `exam_date` WRITE;
/*!40000 ALTER TABLE `exam_date` DISABLE KEYS */;
INSERT INTO `exam_date` VALUES (1,'Faculty of Agriculture','2022-06-12','14:00:00','16:00:00'),(2,'Faculty of Computer Science & Information Technology','2022-06-12','00:00:00','11:00:00'),(3,'Faculty of Engineering','2022-06-11','11:30:00','13:30:00'),(4,'Faculty of Health Science','2022-06-12','10:00:00','12:00:00'),(5,'Faculty of Scoial Science','2022-06-12','14:00:00','16:00:00');
/*!40000 ALTER TABLE `exam_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fagri_question`
--

DROP TABLE IF EXISTS `fagri_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fagri_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fagri_question`
--

LOCK TABLES `fagri_question` WRITE;
/*!40000 ALTER TABLE `fagri_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `fagri_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fcsit_question`
--

DROP TABLE IF EXISTS `fcsit_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fcsit_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fcsit_question`
--

LOCK TABLES `fcsit_question` WRITE;
/*!40000 ALTER TABLE `fcsit_question` DISABLE KEYS */;
INSERT INTO `fcsit_question` VALUES (1,'One of his greatest achievements_________________ the restoration of order and stability to the company','was','were','have been','are','was'),(2,'If I had heard this earlier, I ______________________ given him the job','would not have','would have not','will not have','will have not','would have not'),(3,'Mr. Smith had worked here before leaving for the UK_________________ ?','isn’t it','wasn’t it','didn’t he','hadn’t he','hadn’t he'),(4,'Who saw the accused ___________________ the purse from the complainant’s handbag?','take','took','taken','takes','take'),(5,'_______________ bring a better of authority before the can collect the money?','needs he','need he','he needs','does he need','need he'),(6,'Surely, he ___________________ come in person if he doesn’t want to!','need not','does not need','did not need','need to','need not'),(7,'Tunji was _________________ hungry that he ate the food meant for his three sisters','so','extremely','very','quite\n','so'),(8,'On my way to the post office, I ________________ my old classmate.','stop to greet','stopped to greet','stopped greeting','had stopped greeting','stopped to greet'),(9,'The celebrations were rounded __________________ with a novelty match.','off','up','down','out','off'),(10,'As fresh fruits were scarce in the dry season, we had to _______________ tinned fruits.','make do with','make up for','take out','take up with','make do with'),(11,'They are __________________ new employees at the headquarters of the factors.','Taking up','Taking after','Taking on','Taking over','Taking on'),(12,'It trained ALL day yesterday','For how long did it rain yesterday?','When did it rain all day?','Was it dry all day yesterday?','Did it rain all day last week?','When did it rain all day?'),(13,'Choose the word that contains the sound represented by this phonetic symbol: /I/\r\n','English','Leave','Case','kept','Leave'),(14,'The minister was accused of making utterances that could increase* rather than____________ anxiety \r\namong the citizenry.','modify','diminish','intensify','remove','remove'),(15,'Mary: ‘I wonder why armed robbers are so hard-hearted*’. John: “ The fact is that to be an armed robber \r\nyou cannot be __________“','Considerate','Intolerant','Revengeful','Grateful','Grateful'),(16,'The angle of elevation of the top of a tree from a point on the ground 60m away from the foot of the tree is 78°. Find the height of the tree correct to the nearest whole number.','148m','382m','282m','248m','282m'),(17,'In a class of 50 students, 40 students offered Physics and 30 offered Biology. How many offered both Physics and Biology?','42','20','70','54','20'),(18,'In how many ways can the word MATHEMATICIAN be arranged?','6794800 ways','2664910 ways','6227020800 ways','129729600 ways','129729600 ways'),(19,'The locus of a point which moves so that it is equidistant from two intersecting straight lines is the','bisector of the two lines','line parallel to the two lines','angle bisector of the two lines','perpendicular bisector of the two lines','angle bisector of the two lines'),(20,'If 4sin2x−3=0, find the value of x, when 0° ≤ x ≤ 90°','90°','45°','60°','30°','60°'),(21,'If given two points A(3, 12) and B(5, 22) on a x-y plane. Find the equation of the straight line with intercept at 2.','y = 5x + 2','y = 5x + 3','y = 12x + 2','y = 22x + 3','y = 5x + 2'),(22,'If P(2, m) is the midpoint of the line joining Q(m, n) and R(n, -4), find the values of m and n.','m = 0, n = 4','m = 4, n = 0','m = 2, n = 2','m = -2, n = 4','m = 0, n = 4'),(23,'The nth term of a sequence is given by 22n−1. Find the sum of the first four terms.','74','32','42','170','170'),(24,'If P varies inversely as the square root of q, where p = 3 and q = 16, find the value of q when p = 4.','12','8','9','16','9'),(25,'Tade bought 200 mangoes at 4 for ₦2.50. 30 out of the mangoes got spoilt and the remaining were sold at 2 for ₦2.40. Find the percentage profit or loss.','43.6% loss','35% profit','63.2% profit','28% loss  C','63.2% profit'),(26,'If a body moves with a constant speed and at the same time undergoes an acceleration, its motion is said to be','oscillation','circular','rotational','rectilinear','circular'),(27,'When blue and green colours of light are mixed, the resultant colour is','cyan','magenta','black','yellow','cyan'),(28,'According to kinetic molecular model, in gases','The molecule are very fast apart & occupy all the space made available','The particles occur in clusters with molecules slightly farther apart','The particles vibrate about fixed positions and are held together by the strong intermolecular bond between them','The particles are closely packed together, they occupy minimum space & are usually arranged in a regular pattern','The molecule are very fast apart & occupy all the space made available'),(29,'A train has an initial velocity of 44m/s and an acceleration of -4m/s2.Calculate its velocity after 10 seconds','10m/s','6m/s','8m/s','4m/s','4m/s'),(30,'Lamps in domestic lightings are usually in','series','divergent','convergent','parallel','parallel'),(31,'Zinc Oxide is a?','Basic Oxide','Acidic Oxide','Amphoteric Oxide','Neutral Oxide','Amphoteric Oxide'),(32,'When sodium chloride and metallic sodium are each dissolved in water.','both processes are exothermic','both processes are endothermic','the dissolution of metallic sodium is endothermic','the dissolution of metallic sodium is exothermic','the dissolution of metallic sodium is exothermic'),(33,'The periodic classification of elements is an arrangement of the elements in order of their','Atomic Weights','Isotopic Weights','Molecular Weights','Atomic Numbers','Atomic Numbers'),(34,'In the reaction between sodium hydroxide and sulphuric acid solutions, what volume of 0.5 molar sodium hydroxide would exactly neutralise 10cm3 of 1.25 molar sulphuric acid?','5cm3','50cm3','20cm3','25cm3','50cm3'),(35,'A small quantity of solid ammonium chloride (NH4Cl) was heated gently in a test tube, the solid gradually disappears to produce two gases. Later, a white cloudy deposit was observed on the cooler part of the test tube. The ammonium chloride is said to have undergone ','distillation','sublimation','precipitation','evaporation','sublimation'),(36,'The first calculator was built by?','Marie Jacquad','Balise Pascal','Charles Babbage','John Napier','Balise Pascal'),(37,'A similarity between data and information is that both?','can be displayed on the monitor','are computer inputs','are processed facts','are computer results','can be displayed on the monitor'),(38,'The computer hardware can be classified into','ALU and Control Unit','System Unit and Peripheral','Central Processing Unit and Control Unit','Input and Output Units','System Unit and Peripheral'),(39,'The outcome of a processed data in a computer is known as','raw fact','Information','database','computer resultcomputer result','computer result'),(40,'Which of the following devices is not a micro computer?','Note book','Laptop','EDVAC','Desktop','EDVAC'),(41,'The highest court in Nigeria is','Court of Appeal','Supreme court','Federal High Court','Magistrate court','Supreme court'),(42,'ECOWAS was established in headquarter in ____________ and has it administrative headquarter in____________','1967 Lome','1975 Lome','1975 Lagos','1967 Lagos','1975 Lagos'),(43,'The first general election in Nigeria was held in','1959','1960','1963','1999','1959'),(44,'Nigeria practice one of the following system of government','Con-federalism','Unitarism','Paliamentaism','Federalism','Federalism'),(45,'The last colonial governor general of Nigeria was in','James Robertson','Jimmy Carter','Lord Lugard','Huge Clifford','James Robertson'),(46,'The establishment of states started in Nigeria on','May 27 1967','Feb. 13 1966','April 8 1960','Oct. 1 1960','May 27 1967'),(47,'The Nigeria Police force belongs to which organ of government','Judiciary','Executive','Legislative','Non of the above','Executive'),(48,'African consist of how many countries','54','55','60','70','54'),(49,'Which of the following pair of countries consist of the permanent security\r\ncouncil of UN','Brazil, Germany, France, USA, China','France, China, USSR, USA, Britain','France, Britain, Brazil, Newzealand','France, Germany, Japan, China','France, China, USSR, USA, Britain'),(50,'The name Nigeria coined out of...............','Niger forest','Niger area','Niger river','Niger textures','Niger area');
/*!40000 ALTER TABLE `fcsit_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feng_question`
--

DROP TABLE IF EXISTS `feng_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feng_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feng_question`
--

LOCK TABLES `feng_question` WRITE;
/*!40000 ALTER TABLE `feng_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `feng_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fhsci_question`
--

DROP TABLE IF EXISTS `fhsci_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fhsci_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fhsci_question`
--

LOCK TABLES `fhsci_question` WRITE;
/*!40000 ALTER TABLE `fhsci_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `fhsci_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fssci_question`
--

DROP TABLE IF EXISTS `fssci_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fssci_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fssci_question`
--

LOCK TABLES `fssci_question` WRITE;
/*!40000 ALTER TABLE `fssci_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `fssci_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utme`
--

DROP TABLE IF EXISTS `utme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  `jamb_score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utme`
--

LOCK TABLES `utme` WRITE;
/*!40000 ALTER TABLE `utme` DISABLE KEYS */;
INSERT INTO `utme` VALUES (2,'sulaiman m yunusa','12345678MY',250),(5,'muhammed yunusa muhammed','98765464MY',300),(6,'asma\'u abdullahi','98765464FA',300);
/*!40000 ALTER TABLE `utme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utme_education`
--

DROP TABLE IF EXISTS `utme_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utme_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(100) NOT NULL,
  `primary_school` varchar(255) NOT NULL,
  `pri_graduated` date NOT NULL,
  `secondary_school` varchar(255) NOT NULL,
  `sec_graduated` date NOT NULL,
  `Exam_no` varchar(100) NOT NULL,
  `subject1` varchar(100) NOT NULL,
  `subject2` varchar(100) NOT NULL,
  `subject3` varchar(100) NOT NULL,
  `subject4` varchar(100) NOT NULL,
  `subject5` varchar(100) NOT NULL,
  `subject6` varchar(100) NOT NULL,
  `subject7` varchar(100) NOT NULL,
  `subject8` varchar(100) NOT NULL,
  `subject9` varchar(100) NOT NULL,
  `grade1` varchar(100) NOT NULL,
  `grade2` varchar(100) NOT NULL,
  `grade3` varchar(100) NOT NULL,
  `grade4` varchar(100) NOT NULL,
  `grade5` varchar(100) NOT NULL,
  `grade6` varchar(100) NOT NULL,
  `grade7` varchar(100) NOT NULL,
  `grade8` varchar(100) NOT NULL,
  `grade9` varchar(100) NOT NULL,
  `ssce_result` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `exam_date` varchar(100) NOT NULL,
  `start_exam` varchar(100) NOT NULL,
  `end_exam` varchar(100) NOT NULL,
  `exam_score` varchar(100) NOT NULL,
  `Total_score` varchar(100) NOT NULL,
  `exam_status` varchar(100) NOT NULL,
  `exam_remark` varchar(100) NOT NULL,
  `result_status` varchar(100) NOT NULL,
  `admitted` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utme_education`
--

LOCK TABLES `utme_education` WRITE;
/*!40000 ALTER TABLE `utme_education` DISABLE KEYS */;
INSERT INTO `utme_education` VALUES (1,'UTME/2022/23/4104','safa','1997-02-23','safa','1999-02-10','934567891ER','English Language','Mathematics','Agricultural Science','Accounting','Accounting','Agricultural Science','Accounting','Accounting','Agricultural Science','B3','B3','C4','A1','A1','B2','B3','A1','B3','12345678MY.pdf','Faculty of Computer Science & Information Technology','2022-06-05','21:00:00','13:30:00','0','125','Written','Pass','Release','Admitted'),(5,'UTME/2022/23/3363','safa','1996-12-01','safa','2020-11-30','234567891AQ','English Language','Mathematics','Agricultural Science','Chemistry','Accounting','Chemistry','Accounting','Chemistry','Biology','B2','C4','B3','B3','B2','B3','A1','C4','B2','98765464MY.pdf','Faculty of Computer Science & Information Technology','2022-05-29','09:00:00','11:00:00','','','Not written','','',''),(8,'UTME/2022/23/3979','kaduna state primary school','1999-02-02','government unity college birn kudu, jigawa state','2002-01-04','234565896YJ','English Language','Mathematics','Biology','Chemistry','Civic Education','Physics','Geography','Religious Studies','Agricultural Science','A1','B3','B2','B2','B3','B3','B2','B3','C4','98765464FA.pdf','Faculty of Computer Science & Information Technology','2022-06-12','00:00:00','11:00:00','72','186','Written','Pass','Release','Admitteds');
/*!40000 ALTER TABLE `utme_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utme_info`
--

DROP TABLE IF EXISTS `utme_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utme_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  `jamb_score` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `state_origin` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utme_info`
--

LOCK TABLES `utme_info` WRITE;
/*!40000 ALTER TABLE `utme_info` DISABLE KEYS */;
INSERT INTO `utme_info` VALUES (1,'UTME/2022/23/4104','sulaiman m yunusa','12345678MY','250','myunusahja2@gmail.com','08064405746','2022-06-29','Male','Single','Fct Abuja','12345678MY.jpeg'),(5,'UTME/2022/23/3363','muhammed yunusa muhammed','98765464MY','300','myunusahja1@gmail.com','08064405746','1995-01-02','Male','Single','Kano','98765464MY.png'),(8,'UTME/2022/23/3979','asma\'u abdullahi','98765464FA','300','myunusahja5@gmail.com','08033045852','1999-02-03','Female','Single','Kaduna','98765464FA.jpeg');
/*!40000 ALTER TABLE `utme_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `buk_transport_bus`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `buk_transport_bus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `buk_transport_bus`;

--
-- Table structure for table `admin_signup`
--

DROP TABLE IF EXISTS `admin_signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `reset_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_signup`
--

LOCK TABLES `admin_signup` WRITE;
/*!40000 ALTER TABLE `admin_signup` DISABLE KEYS */;
INSERT INTO `admin_signup` VALUES (1,'Super','sulaiman m yunusa','myunusa','0989070707','myunusahja1@gmail.com','2','6277c45518d968.20476598.jpg','RP-7881'),(2,'user','ibrahim musa','myunusa1','08123343453','myunusahja6@gmail.com','12345678','6287fcd570b3b5.23933960.jpg','RP-1888'),(3,'user','musa yunusa','myunusa2','08064405746','myunusahja2@gmail.com','1234567','162892dbb180f6.jpg','RP-7888'),(5,'Super','abubakar yunusa','yunusa1','08033045852','myunusahja10@gmail.com','1234567','162a62631d4b0a.jpg','RP-3730'),(6,'User','sani yunusa','myunusa3','08042489539','asmau1212@gmail.com','1234567','myunusa3.png','RP-4830');
/*!40000 ALTER TABLE `admin_signup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buk_staff`
--

DROP TABLE IF EXISTS `buk_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buk_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buk_staff`
--

LOCK TABLES `buk_staff` WRITE;
/*!40000 ALTER TABLE `buk_staff` DISABLE KEYS */;
INSERT INTO `buk_staff` VALUES (1,'SULAIMAN MUSA YUNUSA','FCSIT/IFT/003','INFORMATION TECHNOLOGY'),(7,'IBRAHIM MUSA','FCSIT/COM/003','COMPUTER SCIENCE'),(8,'sulaiman m yunusa','FCSIT/SWE/201','Software');
/*!40000 ALTER TABLE `buk_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buk_student`
--

DROP TABLE IF EXISTS `buk_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buk_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buk_student`
--

LOCK TABLES `buk_student` WRITE;
/*!40000 ALTER TABLE `buk_student` DISABLE KEYS */;
INSERT INTO `buk_student` VALUES (1,'SULAIMAN MUSA YUNUSA','FCSIT/19/IFT/00409','12345678SD'),(8,'ASMA\'U ABDULLAHI','FCSIT/19/IFT/00401','98765464FM'),(18,'musa yunusa','FCSIT/19/IFT/00409','12345678MY'),(19,'asma\'u abdullahi','FCSIT/19/IFT/00409','12345678MY'),(20,'ibrahim musa','FCSIT/19/IFT/00412','98765464FA');
/*!40000 ALTER TABLE `buk_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  `acknowledge` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'sulaiman m yunusa','08064405746','myunusahja2@gmail.com','reset password','i have a complain to you sir','2022-05-20 16:47:00','Not acknowledged'),(2,'sani yunusa','09054434321','myunusahja3@gmail.com','password','hhc dfhhfk','2022-05-20 17:01:00','Acknowledged');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_booking`
--

DROP TABLE IF EXISTS `staff_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `booking_id` varchar(100) NOT NULL,
  `depart_from` varchar(100) NOT NULL,
  `arrive_to` varchar(100) NOT NULL,
  `depart_date` date NOT NULL,
  `arrive_date` date NOT NULL,
  `No_of_students` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `ticket_status` varchar(100) NOT NULL,
  `booked_by` varchar(100) NOT NULL,
  `issued_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_booking`
--

LOCK TABLES `staff_booking` WRITE;
/*!40000 ALTER TABLE `staff_booking` DISABLE KEYS */;
INSERT INTO `staff_booking` VALUES (1,'FCSIT/COM/003','COMPUTER SCIENCE','MYUNUSAHJA1000@GMAIL.COM','09048429539','BBTE/562','Old Site','North West','2022-05-13','2022-05-13','6 students','Hadejia Jigawa state',12000,'Paid','Not used','FCSIT/COM/003','2022-05-11 20:57:00'),(2,'FCSIT/COM/003','COMPUTER SCIENCE','MYUNUSAHJA1000@GMAIL.COM','09048429539','BBTE/972','New Site','North Central','2022-05-16','2022-05-18','56 students','niger',448000,'Paid','Used','FCSIT/COM/003','2022-05-11 21:00:00');
/*!40000 ALTER TABLE `staff_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_signup`
--

DROP TABLE IF EXISTS `staff_signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verify` varchar(100) NOT NULL,
  `e_card` varchar(255) NOT NULL,
  `e_unit` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_signup`
--

LOCK TABLES `staff_signup` WRITE;
/*!40000 ALTER TABLE `staff_signup` DISABLE KEYS */;
INSERT INTO `staff_signup` VALUES (1,'IBRAHIM MUSA','FCSIT/COM/003','COMPUTER SCIENCE','MYUNUSAHJA1000@GMAIL.COM','09048429539','Buk_Email_verification625e010c282d4','Verified','5299277388672902',774000,'6277c45518d968.20476598.jpg','1',''),(2,'sulaiman m yunusa','FCSIT/SWE/201','Software','myunusahja3@gmail.com','08064405746','EVC-316288de71010ce','Verified','5299668152200652',0,'16288de7101091.png','1234567','RP-4748');
/*!40000 ALTER TABLE `staff_signup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_booking`
--

DROP TABLE IF EXISTS `student_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `booking_id` varchar(100) NOT NULL,
  `depart_from` varchar(100) NOT NULL,
  `arrive_to` varchar(100) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` varchar(225) NOT NULL,
  `depart_seat` int(11) NOT NULL,
  `depart_checkin` varchar(100) NOT NULL,
  `ticket_status1` varchar(100) NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` varchar(225) NOT NULL,
  `arrive_seat` int(11) NOT NULL,
  `arrive_checkin` varchar(100) NOT NULL,
  `ticket_status2` varchar(100) NOT NULL,
  `ticket_type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `booked_by` varchar(100) NOT NULL,
  `issued_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_booking`
--

LOCK TABLES `student_booking` WRITE;
/*!40000 ALTER TABLE `student_booking` DISABLE KEYS */;
INSERT INTO `student_booking` VALUES (2,'FCSIT/19/IFT/00409','myunusahja1@gmail.com','09048429539','BBT/212','Old Site','New Site','2022-05-23','12:30',1,'Not checkin','Not used','0000-00-00','',0,'Null','Null','One way',50,'FCSIT/19/IFT/00409','2022-05-14 18:09:00'),(3,'FCSIT/19/IFT/00409','myunusahja1@gmail.com','09048429539','BBT/947','Old Site','New Site','2022-05-20','13:30',3,'Not checkin','Not used','0000-00-00','',0,'Null','Null','One way',50,'FCSIT/19/IFT/00409','2022-05-14 18:10:00'),(4,'FCSIT/19/IFT/00409','myunusahja1@gmail.com','09048429539','BBT/621','Old Site','New Site','2022-05-20','13:30',4,'Not checkin','Not used','0000-00-00','',0,'Null','Null','One way',50,'FCSIT/19/IFT/00409','2022-05-14 18:18:00'),(5,'FCSIT/19/IFT/00409','myunusahja1@gmail.com','09048429539','BBR/201','Old Site','New Site','2022-05-21','07:30',1,'Not checkin','Not used','2022-05-24','09:30',1,'Not checkin','Not used','Return',100,'FCSIT/19/IFT/00409','2022-05-18 00:38:00');
/*!40000 ALTER TABLE `student_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_signup`
--

DROP TABLE IF EXISTS `student_signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `jambno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verify` varchar(100) NOT NULL,
  `e_card` varchar(255) NOT NULL,
  `e_unit` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_signup`
--

LOCK TABLES `student_signup` WRITE;
/*!40000 ALTER TABLE `student_signup` DISABLE KEYS */;
INSERT INTO `student_signup` VALUES (1,'SULAIMAN MUSA YUNUSA','FCSIT/19/IFT/00409','12345678SD','myunusahja1@gmail.com','08064405746','Buk_Email_verification6247f79f37c62','Verified','5399123456789012',0,'162895d01e8f6f.jpg','12345678','Reset_Passworld6281ad32402a4'),(20,'ASMA\'U ABDULLAHI','FCSIT/19/IFT/00401','98765464FM','myunusahja3@gmail.com','08123343453','Buk_Email_verification62709d8a0ca2c','Verified','5399711791014561',0,'162895cdbad5c7.jpg','1234567','d4444'),(24,'ibrahim musa','FCSIT/19/IFT/00412','98765464FA','myunusahja3@gmail.com','08064405746','EVC-116288ddf822a46','Verified','5399189988809726',50,'16288ddf822867.jpeg','123456','RP-5905');
/*!40000 ALTER TABLE `student_signup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `cee_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cee_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cee_db`;

--
-- Table structure for table `admin_acc`
--

DROP TABLE IF EXISTS `admin_acc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_acc`
--

LOCK TABLES `admin_acc` WRITE;
/*!40000 ALTER TABLE `admin_acc` DISABLE KEYS */;
INSERT INTO `admin_acc` VALUES (1,'admin@username','admin@password');
/*!40000 ALTER TABLE `admin_acc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_tbl`
--

DROP TABLE IF EXISTS `course_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_tbl`
--

LOCK TABLES `course_tbl` WRITE;
/*!40000 ALTER TABLE `course_tbl` DISABLE KEYS */;
INSERT INTO `course_tbl` VALUES (25,'BSHRM','2019-11-27 09:26:08'),(26,'BSIT','2019-11-25 13:22:42'),(65,'BSCRIM','2019-12-02 09:25:36');
/*!40000 ALTER TABLE `course_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_answers`
--

DROP TABLE IF EXISTS `exam_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL AUTO_INCREMENT,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`exans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_answers`
--

LOCK TABLES `exam_answers` WRITE;
/*!40000 ALTER TABLE `exam_answers` DISABLE KEYS */;
INSERT INTO `exam_answers` VALUES (295,4,12,25,'Diode, inverted, pointer','old','2019-12-07 02:52:14'),(296,4,12,16,'Data Block','old','2019-12-07 02:52:14'),(297,6,12,18,'Programmable Logic Controller','old','2019-12-05 12:59:47'),(298,6,12,9,'1850s','old','2019-12-05 12:59:47'),(299,6,12,24,'1976','old','2019-12-05 12:59:47'),(300,6,12,14,'Operating System','old','2019-12-05 12:59:47'),(301,6,12,19,'WAN (Wide Area Network)','old','2019-12-05 12:59:47'),(302,6,11,28,'fds','old','2022-05-22 10:26:58'),(303,6,11,29,'sd','old','2022-05-22 10:26:58'),(304,6,12,15,'David Filo & Jerry Yang','new','2019-12-05 12:59:47'),(305,6,12,17,'System file','new','2019-12-05 12:59:47'),(306,6,12,10,'Field','new','2019-12-05 12:59:47'),(307,6,12,9,'1880s','new','2019-12-05 12:59:47'),(308,6,12,21,'Temporary file','new','2019-12-05 12:59:47'),(309,4,11,28,'q1','new','2019-12-05 13:30:21'),(310,4,11,29,'dfg','new','2019-12-05 13:30:21'),(311,4,12,16,'Data Block','new','2019-12-07 02:52:14'),(312,4,12,20,'Plancks radiation','new','2019-12-07 02:52:14'),(313,4,12,10,'Report','new','2019-12-07 02:52:14'),(314,4,12,24,'1976','new','2019-12-07 02:52:14'),(315,4,12,9,'1930s','new','2019-12-07 02:52:14'),(316,8,12,18,'Programmable Lift Computer','new','2020-01-05 03:18:35'),(317,8,12,14,'Operating System','new','2020-01-05 03:18:35'),(318,8,12,20,'Einstein oscillation','new','2020-01-05 03:18:35'),(319,8,12,21,'Temporary file','new','2020-01-05 03:18:35'),(320,8,12,25,'Diode, inverted, pointer','new','2020-01-05 03:18:35'),(321,6,11,28,'q1','new','2022-05-22 10:26:58'),(322,6,11,30,'sd','new','2022-05-22 10:26:58'),(323,7,12,16,'Driver Boot','new','2022-05-22 15:40:13');
/*!40000 ALTER TABLE `exam_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_attempt`
--

DROP TABLE IF EXISTS `exam_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL AUTO_INCREMENT,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used',
  PRIMARY KEY (`examat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_attempt`
--

LOCK TABLES `exam_attempt` WRITE;
/*!40000 ALTER TABLE `exam_attempt` DISABLE KEYS */;
INSERT INTO `exam_attempt` VALUES (51,6,12,'used'),(52,4,11,'used'),(53,4,12,'used'),(54,8,12,'used'),(55,6,11,'used'),(56,7,12,'used');
/*!40000 ALTER TABLE `exam_attempt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_question_tbl`
--

DROP TABLE IF EXISTS `exam_question_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`eqt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_question_tbl`
--

LOCK TABLES `exam_question_tbl` WRITE;
/*!40000 ALTER TABLE `exam_question_tbl` DISABLE KEYS */;
INSERT INTO `exam_question_tbl` VALUES (9,12,'In which decade was the American Institute of Electrical Engineers (AIEE) founded?','1850s','1880s','1930s','1950s','1880s','active'),(10,12,'What is part of a database that holds only one type of information?','Report','Field','Record','File','Field','active'),(14,12,'OS computer abbreviation usually means ?','Order of Significance','Open Software','Operating System','Optical Sensor','Operating System','active'),(15,12,'Who developed Yahoo?','Dennis Ritchie & Ken Thompson','David Filo & Jerry Yang','Vint Cerf & Robert Kahn','Steve Case & Jeff Bezos','David Filo & Jerry Yang','active'),(16,12,'DB computer abbreviation usually means ?','Database','Double Byte','Data Block','Driver Boot','Database','active'),(17,12,'.INI extension refers usually to what kind of file?','Image file','System file','Hypertext related file','Image Color Matching Profile file','System file','active'),(18,12,'What does the term PLC stand for?','Programmable Lift Computer','Program List Control','Programmable Logic Controller','Piezo Lamp Connector','Programmable Logic Controller','active'),(19,12,'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.','URL (Universal Resource Locator)','LAN (Local Area Network)','WAN (Wide Area Network)','World Wide Web','WAN (Wide Area Network)','active'),(20,12,'After the first photons of light are produced, which process is responsible for amplification of the light?','Blackbody radiation','Stimulated emission','Plancks radiation','Einstein oscillation','Stimulated emission','active'),(21,12,'.TMP extension refers usually to what kind of file?','Compressed Archive file','Image file','Temporary file','Audio file','Temporary file','active'),(22,12,'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?','Inernet','Interanet','Local Area Network','Wide Area Network','Local Area Network','active'),(24,12,'	 In what year was the \"@\" chosen for its use in e-mail addresses?','1976','1972','1980','1984','1972','active'),(25,12,'What are three types of lasers?','Gas, metal vapor, rock','Pointer, diode, CD','Diode, inverted, pointer','Gas, solid state, diode','Gas, solid state, diode','active'),(27,15,'asdasd','dsf','sd','yui','sdf','yui','active'),(28,11,'Question 1','q1','asd','fds','ytu','q1','active'),(29,11,'Question 2','asd','sd','q2','dfg','q2','active'),(30,11,'Question 3','sd','q3','asd','fgh','q3','active');
/*!40000 ALTER TABLE `exam_question_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_tbl`
--

DROP TABLE IF EXISTS `exam_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_tbl`
--

LOCK TABLES `exam_tbl` WRITE;
/*!40000 ALTER TABLE `exam_tbl` DISABLE KEYS */;
INSERT INTO `exam_tbl` VALUES (11,26,'Duerms','1',2,'qwe','2019-12-05 12:03:21'),(12,26,'Another Exam','1',5,'Mabilisang Exam','2019-12-04 15:19:18'),(13,26,'Exam Again','5',0,'again and again\r\n','2019-11-30 08:24:54');
/*!40000 ALTER TABLE `exam_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examinee_tbl`
--

DROP TABLE IF EXISTS `examinee_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL AUTO_INCREMENT,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`exmne_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examinee_tbl`
--

LOCK TABLES `examinee_tbl` WRITE;
/*!40000 ALTER TABLE `examinee_tbl` DISABLE KEYS */;
INSERT INTO `examinee_tbl` VALUES (4,'Rogz Nunezsss','26','male','2019-11-15','third year','rogz.nunez2013@gmail.com','rogz','active'),(5,'Jane Rivera','25','female','2019-11-14','second year','jane@gmail.com','jane','active'),(6,'Glenn Duerme','26','female','2019-12-24','third year','glenn@gmail.com','glenn','active'),(7,'Maria Duerme','26','female','2018-11-25','second year','maria@gmail.com','maria','active'),(8,'Dave Limasac','26','female','2019-12-21','second year','dave@gmail.com','dave','active');
/*!40000 ALTER TABLE `examinee_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks_tbl`
--

DROP TABLE IF EXISTS `feedbacks_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks_tbl`
--

LOCK TABLES `feedbacks_tbl` WRITE;
/*!40000 ALTER TABLE `feedbacks_tbl` DISABLE KEYS */;
INSERT INTO `feedbacks_tbl` VALUES (4,6,'Glenn Duerme','Gwapa kay Miss Pam','December 05, 2019'),(5,6,'Anonymous','Lageh, idol na nako!','December 05, 2019'),(6,4,'Rogz Nunezsss','Yes','December 08, 2019'),(7,4,'','','December 08, 2019'),(8,4,'','','December 08, 2019'),(9,8,'Anonymous','dfsdf','January 05, 2020');
/*!40000 ALTER TABLE `feedbacks_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `mysql`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mysql` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mysql`;

--
-- Table structure for table `column_stats`
--

DROP TABLE IF EXISTS `column_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `column_stats` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `min_value` varbinary(255) DEFAULT NULL,
  `max_value` varbinary(255) DEFAULT NULL,
  `nulls_ratio` decimal(12,4) DEFAULT NULL,
  `avg_length` decimal(12,4) DEFAULT NULL,
  `avg_frequency` decimal(12,4) DEFAULT NULL,
  `hist_size` tinyint(3) unsigned DEFAULT NULL,
  `hist_type` enum('SINGLE_PREC_HB','DOUBLE_PREC_HB') COLLATE utf8_bin DEFAULT NULL,
  `histogram` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`,`column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Columns';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `column_stats`
--

LOCK TABLES `column_stats` WRITE;
/*!40000 ALTER TABLE `column_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `column_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `columns_priv`
--

DROP TABLE IF EXISTS `columns_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columns_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Column_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Column privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columns_priv`
--

LOCK TABLES `columns_priv` WRITE;
/*!40000 ALTER TABLE `columns_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `columns_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db`
--

DROP TABLE IF EXISTS `db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_history_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`,`User`),
  KEY `User` (`User`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Database privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db`
--

LOCK TABLES `db` WRITE;
/*!40000 ALTER TABLE `db` DISABLE KEYS */;
