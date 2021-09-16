## To create admin table setup
```
CREATE TABLE IF NOT EXISTS `vhost_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(70) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
)
```
## Admin account setup
```
INSERT INTO `vhost_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin Name', 'Admin Email', 'Admin password Hashed');
```
### To create hash please use  this php context
```
<?php
echo password_hash('your password',PASSWORD_BCRYPT)
?>
```
## Client account table setup
```
CREATE TABLE IF NOT EXISTS `vhost_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(70) NOT NULL,
  `client_password` varchar(100) NOT NULL,
  `client_status` int(1) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_password` (`client_password`),
  UNIQUE KEY `client_password_2` (`client_password`)
)
```
## Cpanel account table setup
```
CREATE TABLE IF NOT EXISTS `vhost_cpanel` (
  `cpanel_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `cpanel_username` varchar(20) NOT NULL,
  `cpanel_label` varchar(150) NOT NULL,
  `cpanel_client_username` varchar(30) NOT NULL,
  `cpanel_password` varchar(40) NOT NULL,
  `cpanel_status` int(1) NOT NULL,
  `cpanel_domain` varchar(30) NOT NULL,
  `cpanel_date` varchar(20) NOT NULL,
  PRIMARY KEY (`cpanel_id`)
) 
```
## To create ssl table setup
```
CREATE TABLE IF NOT EXISTS `vhost_ssl` (
  `ssl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ssl_key` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`ssl_id`)
)
```
## Support ticket table setup
```
CREATE TABLE IF NOT EXISTS `vhost_ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `ticket_subject` varchar(150) NOT NULL,
  `ticket_content` varchar(700) NOT NULL,
  `ticket_date` varchar(10) NOT NULL,
  `ticket_time` varchar(20) NOT NULL,
  `ticket_status` int(1) NOT NULL,
  PRIMARY KEY (`ticket_id`)
)
```
## Ticket reply table setup
```
CREATE TABLE IF NOT EXISTS `vhost_ticket_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `reply_content` varchar(700) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_date` varchar(10) NOT NULL,
  `reply_time` varchar(10) NOT NULL,
  PRIMARY KEY (`reply_id`)
) 
```
