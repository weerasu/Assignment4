<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php require_once("function.php"); $id=$_GET['ID']; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
	<title>Image Upload and edit in PHP and MYSQL database</title>
</head>
<body>
	<?php
		if(isset($_POST['update_submit']))
		{	
			$Title=$_POST['Title'];
$folder = "uploads/";
$image_file=$_FILES['Image']['name'];
 $file = $_FILES['Image']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if($file!=''){
//Set image upload size 
    if ($_FILES["Image"]["size"] > 500000) {
   $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
//Allow only JPG, JPEG, PNG & GIF 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}
if(!isset($error))
{
	if($file!='')
	{
		$res=mysqli_query($link,"SELECT* from project_details WHERE ID=$id limit 1");
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['Image']; 
}
unlink($folder.$deleteimage);
move_uploaded_file($file,$target_file); 
$result=mysqli_query($link,"UPDATE project_details SET image='$image_file',Title='$Title' WHERE ID=$id"); 
	}
	else 
	{
	$result=mysqli_query($link,"UPDATE project_details SET Title='$Title' WHERE ID=$id"); 	
	} 
if($result)
{
 header("location:index.php?action=saved");
}
else 
{
	echo 'Something went wrong'; 
}
}
		}


if(isset($error)){ 

foreach ($error as $error) { 
	echo '<div class="message">'.$error.'</div><br>'; 	
}

}
$res=mysqli_query($link,"SELECT* from project_details WHERE ID=$id limit 1");
if($row=mysqli_fetch_array($res)) 
{
$image=$row['Image']; 
$Title=$row['Title']; 
}
	?> 
	<div class="container" style="width:500px;">
		<h1> Edit </h1>
	<?php if(isset($update_sucess))
		{
		echo '<div class="success">Image Updated successfully</div>'; 
		} ?>
<form action="" method="POST" enctype="multipart/form-data">
	<label>Image Preview </label><br>
	<img src="uploads/<?php echo $image;?>" height="100"><br>
	<label>Change Image </label>
	<input type="file" name="Image" class="form-control">
	<label>Title</label>
	<input type="text" name="Title" value="<?php echo $Title;?>" class="form-control">
	<br><br>
	<button name="update_submit" class="btn-primary">Update </button>
</form>
</div>
</body>
</html>