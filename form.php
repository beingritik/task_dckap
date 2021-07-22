<?php require("config.php");?>
<!DOCTYPE html> 
<html lang="en">
  <head>
	<title>Student Enrollment Form</title>
            <?php require("hscript.php");?>
  </head>
<body>
<div class="container">
   <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-12">
	    <div class="pad18">
	     <span class="head2">Student Enrollment Form</span>
				   <?php 
				   if($_GET['msg']==1)
				    {
				  echo '<div class="alert alert-danger alert-dismissible show">File should be png/pdf/jpg format.</div>';
				    }
				   
				  if($_GET['msg']==2)
				    {
				  echo '<div class="alert alert-danger alert-dismissible show">File should be less than 100kb.</div>';
				    }
				    
					if($_GET['msg']==3)
					{
				  echo '<div class="alert alert-success alert-dismissible show">Student added successfully. </div>';
				    }
					if($_GET['msg']==4)
					{
				  echo '<div class="alert alert-danger alert-dismissible show">Try again.</div>';
				    }if($_GET['msg']==7)
					{
				  echo '<div class="alert alert-danger alert-dismissible show">Please enter a valid surname.</div>';
				    }
				   ?>
				   
	    <form class="form-group" method="post" action="action.php" enctype="multipart/form-data">
	    <input type="text" class="field1" placeholder="Enter the first name*" name="name"><br>
            <span><?php
			       if($_GET['msg']==5)
					{
				  echo '<div class="alert alert-danger alert-dismissible show">Please Enter your name.</div>';
				    }
					if($_GET['msg']==6)
					{
				  echo '<div class="alert alert-danger alert-dismissible show">Please Enter a valid name.</div>';
				    }
					?>
				</span>
	    <input type="text" class="field1" placeholder="Enter last name" name="surname"><br>
	        <span class="error"><?php 
			        if($_GET['msg']==7)
					{
				  echo '<div class="alert alert-danger alert-dismissible show">Please Enter a valid surname.</div>';
				    }
		  			?></span>
	    <span class="lab">Date of birth* :</span> <br> <input type="date" class="field1" name="dob" required><br>
	    <span class="lab">Qualification:</span> 
	    <select name="qual" class="">
	       <option value="">--Select option--</option>
	       <option value="ug" selected="selected">UG</option>
	       <option value="pg">PG</option>
	       <option value="phd">PHD</option>
	    </select><br><br>
	    <span class="lab">Upload Resume* :</span> <br><input type="file" class="field1" name="sfile" required><br>
	    	* represent mandatory fields.<br>
	    <input type="submit" class="login" value="Submit">
	    </form>
	   
	    </div>
	   </div>
   </div>
</div>
</body>