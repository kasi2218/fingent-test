<?php 
include_once("db_connect.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Employee Details</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable1" class="table table-bordered">
                            <thead>
                                <tr>
								<th>Emp Id</th>
								<th>Emp Name</th>
								<th>Emp Code</th>
								<th>Age</th>
								<th>Experience in the organization</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$sql = "SELECT  emp_name, emp_code, emp_department, TIMESTAMPDIFF(YEAR, emp_dob, CURDATE()) AS age, TIMESTAMPDIFF(MONTH, emp_doj, CURDATE()) AS experience FROM emp ORDER BY emp_id ";
								$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
								if(mysqli_num_rows($resultset)) { 
								while( $rows = mysqli_fetch_assoc($resultset) ) { 
								?>
								<tr>
								  <td><?php echo $rows['emp_name']; ?></td>
								  <td><?php echo $rows['emp_code']; ?></td>
								   <td><?php echo $rows['emp_department']; ?></td>
								  <td><?php echo $rows['age']; ?></td>
								  <td><?php echo number_format($rows['experience']/12, 1);  ?></td>           
								</tr>
								<?php } } else { ?>  
								<tr><td colspan="5">No records
		 						to display.....</td>
								</tr>
								<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
		<a href="upload.php" >Upload file to enter employee details</a>							
	</div>
	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready( function () {
		$('#datatable1').DataTable();
	} );
</script>
