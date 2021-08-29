# fingent-test


##Employee database project

-please clone the repo using git clone https://github.com/kasi2218/fingent-test.git 

-put the folder in your htdocs folder of your LAMP

-please edit the files db_connect.php and db_create.php and give your database credentials like the example below.
    
    $servername = "localhost";
    $username = "root";
    $password = "1234";

##database creation##

-after giving credentials you can call the file db_create like below example 

    http:// <your-virtual-localhost>or <lamp ip> /fingent-test/db_create.php 
    example: http://localhost:8080/fingent-test/db_create.php
    this will create db and table.

or you can directly run tables.sql file in your db.

your application is ready now.

    -please call http://<your-virtual-localhost>or <lamp ip>/fingent-test/ to get to index page. 
    -example: http://localhost:8080/fingent-test/

    -please navigate to upload form from index page using "<Upload file to enter employee details>" link. 
