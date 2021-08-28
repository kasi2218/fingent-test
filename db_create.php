<?php
    $servername = "localhost";  
    $username = "root";
    $password = "1234";
    // Creating a connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // Creating a database named newDB
    $sql = "CREATE DATABASE fingent2";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully with the name newDB";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn = new mysqli($servername, $username, $password, 'fingent1');
    $sql = "CREATE TABLE IF NOT EXISTS `emp` (
        `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
        `emp_name` varchar(255) NOT NULL COMMENT 'employee name',
        `emp_code` varchar(100) NOT NULL COMMENT 'employee code',
        `emp_department` varchar(100) NOT NULL COMMENT 'employee code',
        `emp_dob` date NOT NULL COMMENT 'employee dob',
        `emp_doj` date NOT NULL COMMENT 'employee joining date',
        PRIMARY KEY (`emp_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
    if ($conn->query($sql) === TRUE) {
        echo "table created successfully with the name newDB";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    // closing connection
    $conn->close(); 
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated');
            window.location.href='index.php';
            </script>");
?>
