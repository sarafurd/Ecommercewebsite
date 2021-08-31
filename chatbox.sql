--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `userid` int(11) AUTO_INCREMENT NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avavtar`
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL,
   PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `chat_users`
--

ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`userid`);



--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) AUTO_INCREMENT NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `chat`
--


--
-- Table structure for table `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  ADD PRIMARY KEY (`id`);

  
