<?php require("config.php");
///Add student starts
function filterName($field)
{
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
	{
        return $field;
    } 
	else
	{
        return FALSE;
    }
}    
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate user name
    if(empty($_POST["name"]))
	{
        header("location:form.php?msg=5");
		exit;
    }
	 else
	 {
        $name = filterName($_POST["name"]);
        if($name == FALSE)
		{
        header("location:form.php?msg=6");
		exit;
        }
     }
    if(!empty($_POST["surname"]))
	{
        $surname = filterName($_POST["surname"]);
        if($surname == FALSE)
		{
        header("location:form.php?msg=7");
		exit;
        }
	}
    $dob=$_POST['dob'];
    $qual=$_POST['qual']; 
	   if(isset($_FILES['sfile']))
	      {
		  $filename=$_FILES['sfile']['name'];
		  $filetype=$_FILES['sfile']['type'];
		  $filesize=$_FILES['sfile']['size'];
		  $filetmp=$_FILES['sfile']['tmp_name'];
		  $ext=explode('.',$filename);
		  $ext=$ext[1];
		  $newname=rand().".".$ext;
		  if($ext!="png" && $ext!="jpeg" && $ext!="jpg" && $ext!='pdf')
		         {
				 header("location:form.php?msg=1");
				 exit;
				 }
		  elseif($filesize>100000 )
		         {
				 header("location:form.php?msg=2");
				 exit;
				 }
		  else
		         {
				 move_uploaded_file($filetmp,"files/".$newname);
				 }
		  }
	   else
	      {
             $newname="noimg.jpg";
	      }
	   $sfile=$newname;
       echo $created=date('Y-m-d H:i:s');
	  
	 $in=$conn->prepare("INSERT INTO student(name,surname,sfile,dob,qual,created) VALUES (?,?,?,?,?,?)");
     $run=$in->execute([$name,$surname,$sfile,$dob,$qual,$created]);
     if(isset($run))
          {
              header("location:form.php?msg=3");
		      exit;
          }
	 else
	      {
              header("location:form.php?msg=4");
		      exit;
		  }
		  
}
///Add-student Ends

?>