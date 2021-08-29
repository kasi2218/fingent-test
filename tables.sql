CREATE DATABASE fingent;

CREATE TABLE IF NOT EXISTS `employee_details` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `emp_name` varchar(255) NOT NULL COMMENT 'employee name',
  `emp_code` varchar(100) NOT NULL COMMENT 'employee code',
  `emp_department` varchar(100) NOT NULL COMMENT 'employee code',
  `emp_dob` int(11) NOT NULL COMMENT 'employee dob',
  `emp_doj` int(11) NOT NULL COMMENT 'employee joining date',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;