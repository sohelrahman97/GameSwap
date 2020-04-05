-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 04:33 AM
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
-- Database: `gameswap_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Sports'),
(4, 'Educational'),
(5, 'FPS'),
(6, 'RPG'),
(7, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `rating` int(11) NOT NULL,
  `price` float NOT NULL,
  `cid` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gid`, `name`, `year`, `rating`, `price`, `cid`, `description`, `image`) VALUES
(1, 'Mortal Kombat 11', 2019, 5, 20.22, 1, 'Mortal Kombat 11 is a fighting game developed by NetherRealm Studios and published by Warner Bros. Interactive Entertainment. Running on a heavily modified version of Unreal Engine 3, it is the eleventh main installment in the Mortal Kombat series and a sequel to 2015\'s Mortal Kombat X. Announced at The Game Awards 2018, the game was released in North America and Europe on April 23, 2019 for Microsoft Windows, Nintendo Switch, PlayStation 4, and Xbox One. The Switch version was delayed in Europe, and was released on May 10, 2019.\r\n\r\nUpon release, the console versions of Mortal Kombat 11 received generally favorable reviews, which praised the gameplay, story, graphics and improved netcode, but it received criticism for the presence of microtransactions and over-reliance on grinding.', 'slide1.jpg'),
(2, 'Prince of Persia : The Shadow and the Flame', 2013, 4, 5.2, 2, 'The game takes place eleven days after the events of the first game. During this period, the Prince was hailed as a hero who defeated the evil Jaffar. He turns down all riches and instead asks for the Princess\'s hand in marriage as his reward, to which the Sultan of Persia reluctantly agrees. The game begins as the Prince enters the royal courts of the palace. Before he enters, however, his appearance changes into that of a beggar. Nobody recognizes him, and when he attempts to speak with the Princess, a man who shares his appearance (Jaffar, who is magically disguised) emerges from the shadows, ordering him to be thrown out. With guards pursuing him, the Prince jumps through a window and flees the city by way of a ship.\r\n\r\nFalling asleep on the ship, the Prince dreams of a mysterious woman who asks the Prince to come to her. At this time, the ship is struck by lightning, cast by Jaffar. When the Prince regains consciousness, he finds himself on the shore of a foreign island. He comes to a cave full of reanimated human skeletons that fight him. He finally escapes on a magic carpet. In the meantime, however, in Persia, Jaffar seizes the throne in the guise of the prince.[1] The Princess falls ill under Jaffar\'s spell of gradual death.[2]', 'slide2.jpg'),
(3, 'The Evil Within : 2', 2019, 5, 30, 7, 'Similar to its predecessor, the game is a survival horror game. Played from a third-person perspective, the player assumes control of detective Sebastian Castellanos, who must descend into the world of Union to rescue his daughter, Lily. There are three difficulty modes, namely Casual, which producer Shinji Mikami recommends,[2] Survival, and Nightmare, the latter setting being recommended for players who enjoyed the difficulty curve in the previous game.[3] In The Evil Within 2, maps are larger and there are multiple ways for players to advance in a level. The player is also given an item known as \"The Communicator\", which helps to highlight the objectives, resources, and enemies featured in the game\'s world. It also reveals Resonance points, which provides hints regarding what had happened in the world of Union. Players can explore the map area freely to complete side objectives and scout for resources, which are scarce. Players can engage in direct confrontation with enemies using weapons like guns, or use stealth to prevent themselves from being noticed or sneak behind enemies to kill them silently.[4]', 'slide3.jpg'),
(4, 'Soma', 2017, 3, 22.34, 7, 'Soma (stylized as SOMA) is a survival horror video game developed and published by Frictional Games for Microsoft Windows, OS X, Linux, PlayStation 4 and Xbox One.[1][2] The game was released on 22 September 2015 for Microsoft Windows, OS X, Linux, PlayStation 4[3] and on 1 December 2017 on Xbox One.[4]\r\n\r\nSoma takes place on an underwater remote research facility with machinery that begins to take on human characteristics. Simon Jarrett, a fish-out-of-water protagonist, finds himself at the facility under mysterious circumstances and is inadvertently forced into uncovering its past, while trying to make sense of his predicament and potential future.[5][6]\r\n\r\nSoma\'s gameplay builds on the conventions established in the previous horror titles of Frictional Games, including an emphasis on stealthy evasion of threats, puzzle-solving and immersion. However, in a break with this tradition, it also de-emphasizes aspects such as inventory management in favour of a tighter focus on narrative. Soma received positive reviews from critics, who applauded its story and voice acting, although its enemy design and encounters received some criticism.', 'slide5.jpg'),
(5, 'Battlefield 3', 2005, 4, 40, 5, 'Battlefield 3 is a first-person shooter video game developed by EA DICE and published by Electronic Arts. It is a direct sequel to 2005\'s Battlefield 2, and the eleventh installment in the Battlefield franchise. The game was released in North America on 25 October 2011 and in Europe on 28 October 2011 for Microsoft Windows, PlayStation 3, and Xbox 360.[3]\r\n\r\nIn Battlefield 3\'s campaign, players take on the personas of several military roles: a U.S. Marine, an F/A-18F Super Hornet weapon systems officer, an M1A2 Abrams tank operator, and a Spetsnaz GRU operative. The campaign takes place in various locations and follows the stories of two characters, Henry Blackburn and Dimitri Mayakovsky.\r\n\r\nThe game sold 5 million copies in its first week of release,[4] and received mostly positive reviews. The game\'s sequel, Battlefield 4, was released in 2013.', 'slide6.jpg'),
(6, 'Doom Eternal', 2020, 5, 50, 5, 'Players once again take on the role of the Doom Slayer, an ancient warrior who battles the demonic forces of Hell, from a first-person perspective. The game continues its predecessor\'s emphasis on \"push-forward\" combat, encouraging the player to aggressively engage enemies in order to acquire health, ammo and armor. The player has access to various firearms, such as the Combat Shotgun, Super Shotgun, Heavy Cannon, Rocket Launcher, Plasma Rifle, BFG 9000, and Ballista. Melee weapons such as a chainsaw, the \"Crucible Blade\" energy sword and a retractable arm-blade can also be used. The arm-blade provides the opportunity for a larger variety of quick and violent \"glory kill\" executions. The Super Shotgun is now equipped with a \"Meat Hook\", which slingshots the player towards an enemy, functioning as a grappling hook in both combat scenarios and environmental navigation. A new Equipment Launcher with the ability to lob grenades and ice bombs that also dons a Flamethrower that provides armor from burning enemies is now part of the Doom Slayer\'s armor.[1] New movement mechanics such as wall-climbing, dash moves, and horizontal bars to swing from will also be introduced.[2][3]', 'slide9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `latest`
--

CREATE TABLE `latest` (
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latest`
--

INSERT INTO `latest` (`gid`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `gid` int(11) NOT NULL,
  `rent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`gid`, `rent`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`) VALUES
(1, 'Sohel'),
(2, 'Rafsan');

-- --------------------------------------------------------

--
-- Table structure for table `usr_games`
--

CREATE TABLE `usr_games` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `ret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `latest`
--
ALTER TABLE `latest`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `usr_games`
--
ALTER TABLE `usr_games`
  ADD PRIMARY KEY (`uid`,`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
