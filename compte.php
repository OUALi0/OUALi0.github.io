<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="compte.css" />
    <title>Ajouter Enseignant</title>
  </head>
  <body>
    <img id="login" src="images/modifier.svg" alt="login" width="50%">
    <div class="container">
      <h1>Ajouter Enseignant</h1>
      <form action="traitement_compte.php" method="POST" enctype="multipart/form-data">
        <div class="form-control">
      
          <input type="text" name="ID_E" />
          <label>ID Maintenance</label>
        </div>
        <div class="form-control">
          <input type="text" name="Nom_E" />
          <label>Nom Complet</label>
        </div>
    <button class="btn" id="lopl"name="sub">Ajouter</button>
      </form>
    </div>
    <script src="login.js"></script>
  </body>
</html>