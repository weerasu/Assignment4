<?php require_once("function.php"); 
$ID=$_GET['ID']; 
		$res=mysqli_query($link,"SELECT* from project_details WHERE ID=$ID limit 1");
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['Image']; 
}
$folder="uploads/";
unlink($folder.$deleteimage);
$result=mysqli_query($link,"DELETE from project_details WHERE ID=$ID") ; 
if($result)
{
	 header("location:index.php?action=deleted");
}
?> 
