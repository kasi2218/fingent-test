<?php
include_once("db_connect.php");
if(isset($_POST['import_data'])){    
    
    // validate to check uploaded file is a valid csv file
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values','application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) &&in_array($_FILES['file']['type'],$file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $file = $_FILES['file']; 
    
            // Declare the delimiter
            $delimiter = ',';
            
            // Open the file in read mode
            $csv = fopen($file['tmp_name'], 'r');
            $headers = fgetcsv($csv, 0, $delimiter);

            $name_header = $_POST['name'];
            $ecode_header =  $_POST['ecode'];
            $dep_header = $_POST['dep'];
            $dob_header =  $_POST['dob'];
            $doj_header =  $_POST['doj'];

            $rows = array();
            $row_number = 0;
            while( $csv_row = fgetcsv($csv, 0, $delimiter) ){

                // Increment Row Number
                $row_number++;
                
                $encoded_row = array_map('utf8_encode', $csv_row);
                if( count($encoded_row) !== count($headers)) { 
                    return 'Row ' . $row_number . '\'s length does not match the header length: ' . implode(', ', $encoded_row);
                }
                else {
                    $rows[] = array_combine($headers, $encoded_row);
                }
                
                // Optional: limit how many rows can be imported at a time.
                if( $row_number === 20 ) break;
            }

            $output['headers'] = $headers;
            $output['rows'] = $rows;
            $fields = $values = array();

            foreach( $rows as $row ) {

                $name = strip_tags($row[$name_header]);
                $empCode = strip_tags($row[$ecode_header]);
                $dep = strip_tags($row[$dep_header]);
                $dob = date('Y-m-d', strtotime(strip_tags($row[$dob_header])));
                $doj = date('Y-m-d', strtotime(strip_tags($row[$doj_header])));
                if(!empty($empCode)){
                    $sql_query = "SELECT emp_id FROM emp WHERE emp_code = '".$empCode."'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    if(mysqli_num_rows($resultset)) {            
                        $sql_update = "UPDATE emp set emp_name='".$name."', emp_department='".$dep."', emp_dob='".$dob."', emp_doj='".$doj."' WHERE emp_code = '".$empCode."'";
                        mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
                    }else{
                        $query ="INSERT INTO emp (emp_name, emp_code, emp_department, emp_dob, emp_doj) VALUES ( '". $name."','".$empCode."','".$dep."','".$dob."','".$doj."' )";
                        mysqli_query($conn, $query) or die("database error asd:". mysqli_error($conn));
                    }
                }        
            }
            // fclose($csv_file);

        }
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated');
            window.location.href='index.php';
            </script>");
    }
    else{
        echo "uploaded file type not matching";
    }
}
?>