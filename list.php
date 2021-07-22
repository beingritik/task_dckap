<?php require("config.php");?>
<!DOCTYPE html> 
<html lang="en">

  <head>
	 <title>Student Enrolled List</title>
	 
<?php require("hscript.php");?>	 
  </head>
  
<body>
<div class="container">
   <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-12 col-12">
	   <div class="pad18 text-center">
	   <span class="head2">Student Enrolled List</span>
	   <table class="table table-hovered table-responsiv table-bordered">
        <thead>
            <th>S. No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>D.O.B</th>
            <th>Qualification</th>
            <th>Resume</th>
        </thead>
        <tbody>
                <?php 
				$list=$conn->prepare("SELECT * FROM student");
				$list->execute();
				$listdata=$list->fetchALL();
				foreach($listdata as $user)
				 { ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['surname']; ?></td>
                        <td><?= $user['dob']; ?></td>
                        <td><?= $user['qual']; ?></td>
                        <td><?= $user['sfile']; ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
	   </div>
	   </div>
   </div>
</div>

</body>