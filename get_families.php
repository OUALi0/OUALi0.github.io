<?php
include("connexion.php");

if(isset($_GET['project_id'])) {
  $projectId = mysqli_real_escape_string($link, $_GET['project_id']);
  
  // Fetch families associated with the selected project
  $sql_families = "SELECT * FROM family WHERE ID_project = '$projectId'"; 
  $result_families = mysqli_query($link, $sql_families);
  
  // Generate options for the family dropdown
  $options = "";
  while ($row_family = mysqli_fetch_assoc($result_families)) {
    $options .= '<option value="'.$row_family["ID"].'">'.$row_family["Nom"].'</option>';
  }
  echo $options;
}

if(isset($_GET['family_id'])) {
  $familyId = mysqli_real_escape_string($link, $_GET['family_id']);
    
  // Fetch members associated with the selected family
  $sql_members = "SELECT * FROM holder WHERE ID_family = '$familyId'"; 
  $result_members = mysqli_query($link, $sql_members);
    
  // Generate options for the member dropdown
  $options = "";
  while ($row_member = mysqli_fetch_assoc($result_members)) {
    $options .= '<option value="'.$row_member["ID"].'">'.$row_member["Name"].'</option>';
  }
  echo $options;
}
?>
