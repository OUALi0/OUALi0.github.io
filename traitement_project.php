<?php
session_start();

if(isset($_POST['sub'])) {
  
  include('connexion.php');
  $Nom_E = $_POST['Nom_E'];

	$query33 = "INSERT INTO `employer`(`ID`, `NAME`) VALUES (NULL,'$Nom_E')";
	$result2 = mysqli_query($link, $query33);	
	if($result2) {
		$_SESSION['success_message'] = "Project is added successfully.";
		header('location: project.php');
	} else {
		echo "Error: " . mysqli_error($link);
	}
	mysqli_close($link);
	
}
?>
