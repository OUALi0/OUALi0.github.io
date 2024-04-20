<?php  include("connexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="project.css">
  <title>admin</title>
  <style>
    td,th,tr{text-align: center;}
    .success-message {
    background-color: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
    padding: 10px;
    margin-bottom: 10px;
}

  </style>
</head>

  <body id="body-pd">

 
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <nav class="navbar navbar-expand-lg navbar-primary bg-light">
        <div class="container-fluid">    
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
             
             
            </div>
          </div>
        </div>
      </nav>
  
                    <div class="nom">  

      <?php
session_start();
include("connexion.php");
$user=$_SESSION['login'];
$sql="SELECT * FROM `employer` WHERE ID='$user'";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
echo "".$data['NAME']." ";
echo "<img  width=40px src=photo/avatar.png>";  
?>                  
              
</div>
       
    </header>

    
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
              <span class="nav_logo-name">Gestion</span> </a>
                <div class="nav_list">
                   <a href="dashbord.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> </a>
                     
                   <a href="compte.php" class="nav_link">
                    
                     <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Ajouter Compte</span> </a> 

                        <a href="ajouter_project.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter Project</span> </a> 

                        <a href="ajouter_filiere.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter Family</span> </a> 

      
                        <a href="ajouter_salle.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter Holder</span> </a> 
            
                         </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
   <style>
    
   </style>
    <div class="gestion" style="background-color: black; padding: 50px; ">
    <img src="aptiv-logo.svg" width="150px" class="image" style="display: inline-block;">
    <h2 style="color: white; display: inline-block; margin-right: 70px; margin-top: 10px">GESTION DES MACHINES</h2>
</div>

<?php

if(isset($_SESSION['success_message'])) {
    echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']); // Clear the message after displaying it
}
?>


<form action="" method="POST">
  <div class="mb-3">
    <select class="form-select" id="project" name="project">
      <?php
      include("connexion.php");

      // Fetching projects
      $sql_projects = "SELECT * FROM project";
      $result_projects = mysqli_query($link, $sql_projects);
      while ($row_project = mysqli_fetch_assoc($result_projects)) {
        echo '<option value="' . $row_project["ID"] . '">';
        echo $row_project["name"];
        echo '</option>';
      }
      ?>
    </select>

    <select class="form-select" id="family" name="family">
      <!-- Families will be populated dynamically via AJAX -->
    </select>

    <select class="form-select" id="holder" name="holder">
      <!-- Members will be populated dynamically via AJAX -->
    </select>

    <button type="submit" class="btn btn-primary" name="submit">Visualiser</button>
  </div>
</form>

<script>
  document.getElementById("project").addEventListener("change", function() {
    var projectId = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_families.php?project_id=" + projectId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("family").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  });

  document.getElementById("family").addEventListener("change", function() {
    var familyId = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_holders.php?family_id=" + familyId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("holder").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  });
</script>


<?php

if(isset($_POST['submit'])){
$holder=$_POST['holder'];
$project=$_POST['project'];
$family=$_POST['family'];
?>

    
    <div class="container">
      <table class="table table-bordered">
<thead>
<tr>
  <th scope="col" > Photo </th>
  <th scope="col">Micro Activation</th>
  <th scope="col">Micro CPA</th>
  <th scope="col">Micro Bride</th>
  <th scope="col">Micro Cover</th>
  <th scope="col">Micro Latchh</th>
</tr>
</thead>
<tbody>
<tr>
<?php
    include("connexion.php");

    $sql6 = "SELECT image_data FROM holder WHERE ID = $holder"; 
    $result6 = mysqli_query($link, $sql6);
    $row6 = mysqli_fetch_assoc($result6);
    echo "<td>"?> <img src="<?php echo $row6['image_data'] ; ?>" height="100" width="100" ,alt="Image"><?php "</td>";
    ?>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM holder WHERE holder.ID='$holder'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['Activation']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM holder WHERE holder.ID='$holder'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td >".$data2['CPA']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM holder WHERE holder.ID='$holder'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['Bride']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM holder WHERE holder.ID='$holder'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['Cover']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql5="SELECT * FROM holder WHERE holder.ID='$holder'";
                        $result5=mysqli_query($link,$sql5);
                        while($data5=mysqli_fetch_assoc($result5))
                        {
                          echo"<td>".$data5['Latch']."</td>";
                        }
  ?>
</tr>
</tbody>

</table>






<?php }?>



<script>
  document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
</script>
<!--Container Main end-->

</div>
</body>









