
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `ID` int(11) NOT NULL,
  `CurrentShow1` varchar(60) DEFAULT NULL,
  `CurrentShow2` varchar(60) DEFAULT NULL,
  `CurrentShow3` varchar(60) DEFAULT NULL,
  `AllTimeFavoriteShow1` varchar(60) DEFAULT NULL,
  `AllTimeFavoriteShow2` varchar(60) DEFAULT NULL,
  `AllTimeFavoriteShow3` varchar(60) DEFAULT NULL,
  `actor1` varchar(60) DEFAULT NULL,
  `actor2` varchar(60) DEFAULT NULL,
  `actor3` varchar(60) DEFAULT NULL,
  `IP_Address` varchar(20) DEFAULT NULL,
  `Country` varchar(10) DEFAULT NULL,
  `FirstShoreLeave` varchar(20) DEFAULT NULL,
  `EnteredAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`ID`);


--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
