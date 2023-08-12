

<?php require_once("function.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="projectfile.css">
	<title>Upload image, display, edit and delete in PHP </title>
</head>
<body>
<div class="container_display">
		<span style="float:right;"><a href="project-upload.php"><button class="btn-primary">Upload New image </button></a></span>
		<br><br>
	<?php 
	if(isset($_GET['image_success']))
		{
		echo '<div class="success">Image Uploaded successfully</div>'; 
		}

		if(isset($_GET['action']))
		{
    $action=$_GET['action'];
	if($action=='saved')
	{
		echo '<div class="success">Saved </div>'; 
	}
	elseif($action=='deleted')
	{
		echo '<div class="success">Image Deleted Successfully ... </div>'; 
	}
		}
	?>
	<table cellpadding="10">
		<tr>
			<th> Image</th>
			<th>Title</th>
			<th>Action</th>
		</tr>
		<?php $res=mysqli_query($link,"SELECT* from project_details ORDER by ID DESC");
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                  <td><img src="uploads/'.$row['Image'].'" height="200"></td> 
                  <td>'.$row['Title'].'</td> 
                  <td><a href="edit.php?ID='.$row['ID'].'"><button class="btn-primary">Edit </button></a>
                  	<br> <br>
                  	 <a href=\'delete.php?ID='.$row['ID'].'\' onClick=\'return confirm("Are you sure you want to delete?")\'"><button class="btn-primary btn_del">Delete</button></a>
                  </td> 
				</tr>';
} ?>
		
	</table>
	</div>
</body>
</html