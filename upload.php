<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- <div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card-body">
                <table id="datatable1" class="table table-bordered">
                    <tbody>
                        <form action="import.php" method="post" enctype="multipart/form-data" id="import_form">
                        <tr>Name : <input type="text" name="name" required /> </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<form action="import.php" method="post" enctype="multipart/form-data" id="import_form">				
			<div class="col-md-3">
			Name : <input type="text" name="name" required /> <br />
			Employee Code : <input type="text" name="ecode" required /> <br />
			Department : <input type="text" name="dep" required /> <br />
			Dob : <input type="text" name="dob" required /> <br />
			Doj : <input type="text" name="doj" required /> <br />
			<input type="file" name="file" />
			</div>
			<div class="col-md-5">
			<input type="submit" class="btn btn-primary"name="import_data" value="IMPORT">
			</div>			
	</form>
</div> -->


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  /* padding: 20px; */
  padding: 25px 25px 10px 25px;
  margin-top:20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
.submit{
    margin-top: 6px;
}
.req{
    color : red;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<div class="container">
    <div class="row">
    <p>Please specify the column name in corresponding input field and upload csv</p>  
    </div> 
    <form action="import.php" method="post" enctype="multipart/form-data" id="import_form">	
        <div class="row">
        <div class="col-25">
            <label>Name<span class="req">*</span></label>
        </div>
        <div class="col-75">
            <input type="text"  name="name" placeholder="Enter Name column" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label >Employee Code<span class="req">*</span></label>
        </div>
        <div class="col-75">
            <input type="text"  name="ecode" placeholder="Enter Employee Code column" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label >Department<span class="req">*</span></label>
        </div>
        <div class="col-75">
            <input type="text"  name="dep" placeholder="Enter Department column" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label >Date Of Birth<span class="req">*</span></label>
        </div>
        <div class="col-75">
            <input type="text"  name="dob" placeholder="Enter Date Of Birth column" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label>Date Of Joining<span class="req">*</span></label>
        </div>
        <div class="col-75">
            <input type="text"  name="doj" placeholder="Enter Date Of Joining column" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        
        </div>
        <div class="col-75">
            <input type="file" name="file" required />
        </div>
        </div>
    
        <div class="row submit">
        <input type="submit" value="Submit" name="import_data" >
        </div>
    </form>
</div>

</body>
</html>
