
<?php require_once("function.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
	<title>Image Upload in PHP and MYSQL database</title>
</head>
<body>
	<?php
		if(isset($_POST['form_submit']))
		{	
			$Title=$_POST['Title'];
$folder = "uploads/";
$image_file=$_FILES['Image']['name'];
 $file = $_FILES['Image']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
//Set image upload size 
    if ($_FILES["Image"]["size"] > 1048576) {
   $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
}
if(!isset($error))
{
	// move image in folder 
move_uploaded_file($file,$target_file); 
$result=mysqli_query($link,"INSERT INTO project_details(Image,Title) VALUES('$image_file','$Title')"); 
if($result)
{
	header("location:index.php?image_success=1");
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
	?> 
	<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
	<label>Image </label>
	<input type="file" name="Image" class="form-control" required >
	<label>Title</label>
	<input type="text" name="Title" class="form-control">
	<br><br>
	<button name="form_submit" class="btn-primary"> Upload</button>
</form>
</div>
</body>
</html>