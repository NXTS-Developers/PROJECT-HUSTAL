CREATE TABLE IF NOT EXISTS `vhost_admin` (
  `admin_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(70) NOT NULL,
  `admin_password` varchar(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS `vhost_client` (
  `client_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(70) NOT NULL,
  `client_password` varchar(100) UNIQUE KEY NOT NULL,
  `client_status` int(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS `vhost_cpanel` (
  `cpanel_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `cpanel_username` varchar(20) NOT NULL,
  `cpanel_label` varchar(150) NOT NULL,
  `cpanel_client_username` varchar(30) NOT NULL,
  `cpanel_password` varchar(40) NOT NULL,
  `cpanel_status` int(1) NOT NULL,
  `cpanel_domain` varchar(30) NOT NULL,
  `cpanel_date` varchar(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS `vhost_ticket` (
  `ticket_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `ticket_subject` varchar(150) NOT NULL,
  `ticket_content` varchar(700) NOT NULL,
  `ticket_date` varchar(10) NOT NULL,
  `ticket_time` varchar(20) NOT NULL,
  `ticket_status` int(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS `vhost_ticket_reply` (
  `reply_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `reply_content` varchar(700) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_date` varchar(10) NOT NULL,
  `reply_time` varchar(10) NOT NULL
);
