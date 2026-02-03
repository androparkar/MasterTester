<?php
session_start();
include('../../includes/connection.php');
if($_FILES['profile_image']['name'] != ''){

	$id = $_POST['id'];
	$userName = $_POST['name'];
	$filename = $_FILES['profile_image']['name']; // Get the Uploaded file Name.

	$extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file.

	$valid_extensions = array("jpg","jpeg","png","gif");

	if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
		$new_name = $userName . "_" . $id . "." . $extension;
		$path =  "../assets/img/" . $new_name;

		if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $path)){ // Upload the Image File on server path

			echo "success";

			// $sql = mysqli_query($conn,"");
			// if ($sql) {
			// 	echo "Success";
			// }

		}
		// echo '<img src="'.$path.'" /><br><br><button data-path="'.$path.'" id="delete_btn">Delete</button>';
	}else{
		echo '<script>alert("Invalid File Format.")</script>';
	}

}else{
	echo '<script>alert("Please Select File")</script>';
}


?>
