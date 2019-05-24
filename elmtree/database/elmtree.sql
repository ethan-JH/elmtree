-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 02:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eharbinson02`
--

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_bookcategory_reference`
--

CREATE TABLE `elmtree_bookcategory_reference` (
  `bookcategoryreferenceid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_bookcategory_reference`
--

INSERT INTO `elmtree_bookcategory_reference` (`bookcategoryreferenceid`, `bookid`, `categoryid`) VALUES
(15, 3, 4),
(16, 3, 5),
(17, 3, 6),
(23, 1, 1),
(24, 1, 2),
(27, 2, 1),
(28, 2, 3),
(39, 17, 1),
(40, 17, 6),
(41, 17, 7),
(45, 20, 1),
(62, 24, 1),
(63, 25, 1),
(64, 25, 2),
(65, 25, 7),
(68, 26, 4),
(69, 27, 1),
(70, 27, 3),
(71, 27, 5),
(72, 28, 1),
(73, 28, 7),
(74, 23, 1),
(75, 21, 1),
(76, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_books`
--

CREATE TABLE `elmtree_books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `blurb` varchar(1000) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `conditionid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `publicvisible` tinyint(4) NOT NULL,
  `purchased` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_books`
--

INSERT INTO `elmtree_books` (`bookid`, `title`, `author`, `price`, `blurb`, `imgpath`, `conditionid`, `sellerid`, `publicvisible`, `purchased`) VALUES
(1, 'The Hobbit', 'J.R.R. Tolkien', '5.65', 'Bilbo, a Hobbit (who don\'t have adventures), is visited by the wizard Gandalf and thirteen dwarves who seek a fourteenth member (to avoid the unlucky number) for their journey to steal the treasure from the dragon Smaug. Though reluctant at first, Bilbo is convinced in part by the trickery of Gandalf to join the unexpected party. He is taken, literally from his comfort zone, off to discover things he knew of only from old tales.', 'hobbit_cover.jpg', 1, 1, 1, 0),
(2, 'The Bell Jar', 'Sylvia Plath', '2.10', 'When Esther Greenwood wins an internship on a New York fashion magazine in 1953, she is elated, believing she will finally realise her dream to become a writer. But in between the cocktail parties and piles of manuscripts, Esther\'s life begins to slide out of control. She finds herself spiralling into serious depression as she grapples with difficult relationships and a society which refuses to take her aspirations seriously.', 'belljar.jpg', 3, 2, 1, 0),
(3, 'A Short History of Nearly Everything', 'Bill Bryson', '5.50', 'Bill Bryson describes himself as a reluctant traveller: but even when he stays safely in his own study at home, he can\'t contain his curiosity about the world around him. A Short History of Nearly Everything is his quest to find out everything that has happened from the Big Bang to the rise of civilisation - how we got from there, being nothing at all, to here, being us. ', 'shorthistory.jpg', 2, 1, 1, 0),
(17, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', '7.50', 'It\'s an ordinary Thursday lunchtime for Arthur Dent until his house gets demolished. The Earth follows shortly afterwards to make way for a new hyperspace express route, and his best friend has just announced that he\'s an alien. At this moment, they\'re hurtling through space with nothing but their towels and an innocuous-looking book inscribed, in large friendly letters, with the words: DON\'T PANIC.', '511387hitchhikers.jpg', 2, 1, 1, 0),
(20, 'The Great Gatsby', 'F. Scott Fitzgerald', '1.25', 'F. Scott Fitzgerald\'s The Great Gatsby brilliantly captures the disillusion of a society obsessed with wealth and status. Young, handsome and fabulously rich, Jay Gatsby appears to have it all, yet he yearns for the one thing that will always be out of his reach, the absence of which renders his life of glittering parties and bright young things ultimately hollow. Gatsby\'s tragic pursuit of his dream is often cited as the Great American Novel.', '662789gatsby.jpg', 4, 4, 1, 0),
(21, 'Fellowship of the Ring', 'J.R.R. Tolkien', '5.80', 'In a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as his elderly cousin Bilbo entrusts the Ring to his care. Frodo must leave his home and make a perilous journey across Middle-earth to the Cracks of Doom, there to destroy the Ring and foil the Dark Lord in his evil purpose.', '669947fellowship.jpg', 2, 2, 1, 0),
(22, 'The Two Towers', 'J.R.R. Tolkien', '5.42', 'The Fellowship was scattered. Some were bracing hopelessly for war against the ancient evil of Sauron. Some were contending with the treachery of the wizard Saruman. Only Frodo and Sam were left to take the accursed Ring of Power to be destroyed in Mordorâ€“the dark Kingdom where Sauron was supreme. Their guide was Gollum, deceitful and lust-filled, slave to the corruption of the Ring. Thus continues the magnificent, bestselling tale of adventure begun in The Fellowship of the Ring, which reaches its soul-stirring climax in The Return of the King.', '789012twotowers.jpg', 2, 2, 1, 0),
(23, 'Return of the King', 'J.R.R. Tolkien', '8.86', 'The Companions of the Ring have become involved in separate adventures as the quest continues. Aragorn, revealed as the hidden heir of the ancient Kings of the West, joined with the Riders of Rohan against the forces of Isengard, and took part in the desperate victory of the Hornburg. Merry and Pippin, captured by Orcs, escaped into Fangorn Forest and there encountered the Ents. Gandalf returned, miraculously, and defeated the evil wizard, Saruman. Meanwhile, Sam and Frodo progressed towards Mordor to destroy the Ring, accompanied by SmEagol--Gollum', '910330return.jpg', 1, 2, 1, 0),
(24, '1984', 'George Orwell', '3.34', 'Winston Smith works for the Ministry of Truth in London, chief city of Airstrip One. Big Brother stares out from every poster, the Thought Police uncover every act of betrayal. When Winston finds love with Julia, he discovers that life does not have to be dull and deadening, and awakens to new possibilities. Despite the police helicopters that hover and circle overhead, Winston and Julia begin to question the Party; they are drawn towards conspiracy. Yet Big Brother will not tolerate dissent - even in the mind. For those with original thoughts they invented Room 101. . . ', '4292281984.jpg', 2, 5, 1, 0),
(25, 'Dune', 'Frank Herbert', '7.78', 'The Duke of Atreides has been manoeuvred by his arch-enemy, Baron Harkonnen, into administering the desert planet of Dune. Although it is almost completely without water, Dune is a planet of fabulous wealth, for it is the only source of a drug prized throughout the Galactic Empire. The Duke and his son, Paul, are expecting treachery, and it duly comes - but from a shockingly unexpected place.', '852733dune.jpg', 1, 4, 1, 0),
(26, 'A Walk in the Woods', 'Bill Bryson', '5.85', 'In the company of his friend Stephen Katz (last seen in the bestselling Neither Here nor There), Bill Bryson set off to hike the Appalachian Trail, the longest continuous footpath in the world. Ahead lay almost 2,200 miles of remote mountain wilderness filled with bears, moose, bobcats, rattlesnakes, poisonous plants, disease-bearing tics, the occasional chuckling murderer and - perhaps most alarming of all - people whose favourite pastime is discussing the relative merits of the external-frame backpack.', '604866walk.jpg', 2, 4, 1, 0),
(27, 'The Secret History', 'Donna Tartt', '4.55', 'Under the influence of their charismatic Classics professor, a group of clever, eccentric misfits at an elite New England college discover a way of thinking and living that is a world away from the humdrum existence of their contemporaries. But when they go beyond the boundaries of normal morality, their lives are changed profoundly and for ever as they discover how hard it can be to truly live and how easy it is to kill.', '469625secret.jpg', 3, 8, 1, 0),
(28, 'Brave New World', 'Aldous Houxley', '4.21', 'Far in the future, the World Controllers have created the ideal society. Through clever use of genetic engineering, brainwashing and recreational sex and drugs all its members are happy consumers. Bernard Marx seems alone harbouring an ill-defined longing to break free. A visit to one of the few remaining Savage Reservations where the old, imperfect life still continues, may be the cure for his distress...', '78731brave.jpg', 2, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_bought_books`
--

CREATE TABLE `elmtree_bought_books` (
  `bought_bookid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_bought_books`
--

INSERT INTO `elmtree_bought_books` (`bought_bookid`, `bookid`, `buyerid`, `sellerid`) VALUES
(30, 28, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_categories`
--

CREATE TABLE `elmtree_categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `categorydesc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_categories`
--

INSERT INTO `elmtree_categories` (`categoryid`, `categoryname`, `categorydesc`) VALUES
(1, 'Fiction', 'Literature in the form of prose, especially novels, that describes imaginary events and people.'),
(2, 'Fantasy', 'A genre of imaginative fiction involving magic and adventure, especially in a setting other than the real world.'),
(3, 'Coming-of-age', 'A coming-of-age story is a genre of literature that focuses on the growth of a protagonist from youth to adulthood. Coming-of-age stories tend to emphasize dialogue or internal monologue over action, and are often set in the past.'),
(4, 'Non-fiction', 'Prose writing that is informative or factual rather than fictional.'),
(5, 'Science', 'The intellectual and practical activity encompassing the systematic study of the structure and behaviour of the physical and natural world through observation and experiment'),
(6, 'Comedy', 'Literature intended to make you laugh.'),
(7, 'Science-Fiction', 'Fiction based on imagined future scientific or technological advances and major social or environmental changes, frequently portraying space or time travel and life on other planets.');

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_condition`
--

CREATE TABLE `elmtree_condition` (
  `conditionid` int(11) NOT NULL,
  `condition_type` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_condition`
--

INSERT INTO `elmtree_condition` (`conditionid`, `condition_type`, `description`) VALUES
(1, 'Like New', 'Effectively a new book, no blemishes or dog ears of any kind.'),
(2, 'Good', 'Has been read through and is not perfect, but still completely readable and entirely intact'),
(3, 'Average', 'Has a dog ear here and a little mark there, but all the pages are intact and is the complete product.'),
(4, 'Poor', 'A well read book that is also well battered. Cannot guarantee that the entire thing is readable.');

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_messages`
--

CREATE TABLE `elmtree_messages` (
  `messageid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiverid` int(11) NOT NULL,
  `messagetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_messages`
--

INSERT INTO `elmtree_messages` (`messageid`, `senderid`, `message`, `receiverid`, `messagetime`) VALUES
(2, 2, 'Test message 1', 1, '2019-03-26 00:12:58'),
(3, 2, 'Test message 2', 1, '2019-03-26 00:13:11'),
(4, 8, 'Test message 5', 2, '2019-03-26 00:48:46'),
(5, 2, 'Hello, this is a message from Jack', 1, '2019-03-26 02:01:31'),
(6, 5, 'This is a message from the admin. Messages can be longer than one line if you write lotsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss.', 1, '2019-03-26 02:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_ratings`
--

CREATE TABLE `elmtree_ratings` (
  `ratingid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `starrating` int(2) NOT NULL,
  `buyerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_ratings`
--

INSERT INTO `elmtree_ratings` (`ratingid`, `sellerid`, `starrating`, `buyerid`) VALUES
(1, 2, 4, 4),
(2, 4, 5, 1),
(3, 4, 5, 1),
(4, 4, 4, 2),
(5, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `elmtree_users`
--

CREATE TABLE `elmtree_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phoneNumber` varchar(25) DEFAULT NULL,
  `profileImgPath` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `instagramTag` varchar(255) DEFAULT NULL,
  `administrator` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elmtree_users`
--

INSERT INTO `elmtree_users` (`userid`, `username`, `password`, `firstName`, `lastName`, `email`, `phoneNumber`, `profileImgPath`, `university`, `instagramTag`, `administrator`) VALUES
(1, 'john44', 'john', 'John', 'Johnson', 'john@john.com', '+44777777777', 'john.jpg', 'Oxford University', 'johnlegend', 0),
(2, 'jack12', 'jack', 'Jack', 'Jackson', 'jack@jack.com', '+44700000000', 'jack.jpg', 'Cambridge University', 'jack', 0),
(4, 'jane7', 'jane', 'Jane', 'Janeson', 'jane@jane.com', '+447171717171', '841117jane.jpg', 'Edinburgh University', 'veryjane', 0),
(5, 'admin1', 'admin', 'Ethan', 'Harbinson', 'eharbinson02@qub.ac.uk', '+447070701111', '881431blank-profile-picture.png', 'QUB', 'instagram', 1),
(8, 'james55', 'james', 'James', 'James', 'james@james.com', '', '870624james.jpg', 'University of Bath', 'james', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elmtree_bookcategory_reference`
--
ALTER TABLE `elmtree_bookcategory_reference`
  ADD PRIMARY KEY (`bookcategoryreferenceid`),
  ADD KEY `FK_categoryrefid` (`categoryid`),
  ADD KEY `FK_bookrefid` (`bookid`);

--
-- Indexes for table `elmtree_books`
--
ALTER TABLE `elmtree_books`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `FK_conditionid` (`conditionid`),
  ADD KEY `FK_sellerid` (`sellerid`);

--
-- Indexes for table `elmtree_bought_books`
--
ALTER TABLE `elmtree_bought_books`
  ADD PRIMARY KEY (`bought_bookid`),
  ADD KEY `FK_bookbuyerid` (`buyerid`),
  ADD KEY `FK_booksellerid` (`sellerid`);

--
-- Indexes for table `elmtree_categories`
--
ALTER TABLE `elmtree_categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `elmtree_condition`
--
ALTER TABLE `elmtree_condition`
  ADD PRIMARY KEY (`conditionid`);

--
-- Indexes for table `elmtree_messages`
--
ALTER TABLE `elmtree_messages`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `FK_senderid` (`senderid`),
  ADD KEY `FK_receiverid` (`receiverid`);

--
-- Indexes for table `elmtree_ratings`
--
ALTER TABLE `elmtree_ratings`
  ADD PRIMARY KEY (`ratingid`),
  ADD KEY `FK_sellerratingid` (`sellerid`),
  ADD KEY `FK_buyerratingid` (`buyerid`);

--
-- Indexes for table `elmtree_users`
--
ALTER TABLE `elmtree_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elmtree_bookcategory_reference`
--
ALTER TABLE `elmtree_bookcategory_reference`
  MODIFY `bookcategoryreferenceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `elmtree_books`
--
ALTER TABLE `elmtree_books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `elmtree_bought_books`
--
ALTER TABLE `elmtree_bought_books`
  MODIFY `bought_bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `elmtree_categories`
--
ALTER TABLE `elmtree_categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `elmtree_condition`
--
ALTER TABLE `elmtree_condition`
  MODIFY `conditionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `elmtree_messages`
--
ALTER TABLE `elmtree_messages`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `elmtree_ratings`
--
ALTER TABLE `elmtree_ratings`
  MODIFY `ratingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `elmtree_users`
--
ALTER TABLE `elmtree_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elmtree_bookcategory_reference`
--
ALTER TABLE `elmtree_bookcategory_reference`
  ADD CONSTRAINT `FK_bookrefid` FOREIGN KEY (`bookid`) REFERENCES `elmtree_books` (`bookid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_categoryrefid` FOREIGN KEY (`categoryid`) REFERENCES `elmtree_categories` (`categoryid`);

--
-- Constraints for table `elmtree_books`
--
ALTER TABLE `elmtree_books`
  ADD CONSTRAINT `FK_conditionid` FOREIGN KEY (`conditionid`) REFERENCES `elmtree_condition` (`conditionid`),
  ADD CONSTRAINT `FK_sellerid` FOREIGN KEY (`sellerid`) REFERENCES `elmtree_users` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `elmtree_bought_books`
--
ALTER TABLE `elmtree_bought_books`
  ADD CONSTRAINT `FK_bookbuyerid` FOREIGN KEY (`buyerid`) REFERENCES `elmtree_users` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_booksellerid` FOREIGN KEY (`sellerid`) REFERENCES `elmtree_users` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `elmtree_messages`
--
ALTER TABLE `elmtree_messages`
  ADD CONSTRAINT `FK_receiverid` FOREIGN KEY (`receiverid`) REFERENCES `elmtree_users` (`userid`),
  ADD CONSTRAINT `FK_senderid` FOREIGN KEY (`senderid`) REFERENCES `elmtree_users` (`userid`);

--
-- Constraints for table `elmtree_ratings`
--
ALTER TABLE `elmtree_ratings`
  ADD CONSTRAINT `FK_buyerratingid` FOREIGN KEY (`buyerid`) REFERENCES `elmtree_users` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_sellerratingid` FOREIGN KEY (`sellerid`) REFERENCES `elmtree_users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
