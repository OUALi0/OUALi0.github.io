<?php
session_start();

if(isset($_POST['sub'])) {
  
  include('connexion.php');

  $ID_E = $_POST['ID_E'];
  $Nom_E = $_POST['Nom_E'];

	$query33 = "INSERT INTO `employer`(`ID`, `NAME`) VALUES ('$ID_E','$Nom_E')";
	$result2 = mysqli_query($link, $query33);	
	if($result2) {
		$_SESSION['success_message'] = "User created successfully.";
		header('location: project.php');
	} else {
		echo "Error: " . mysqli_error($link);
	}
	mysqli_close($link);
	
}
?>
