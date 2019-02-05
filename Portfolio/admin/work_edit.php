<?php
include '../lib/includes.php';

if(isset($_POST['name']) && isset($_POST['slug'])){
  $slug = $_POST['slug'];
  if(preg_match('/^[a-z\-0-9]+$/', $slug)){
    $name = $db->quote($_POST['name']);
    $slug = $db->quote($_POST['slug']);
    if(isset($_GET['id'])){
        $id = $db->quote($_GET['id']);
        $db->quote("UPDATE works SET name=$name, slug=$slug WHERE id=$id");
    } else {
        $db->quote("INSERT INTO works SET name=$name, slug=$slug");
    }
    
    header('Location:work.php');
    die();
  } else {
      setFlash('Le slug n\'est pas valide', 'danger');
  }
}


if(isset($_GET['id'])){
  $id = $db->quote($_GET['id']);
  $select = $db->query("SELECT * FROM works WHERE id=$id");
  if($select->rowCount() == 0){
    setFlash("Il n'y a pas de catégorie avec cet un ID");
    header('Location:work.php');
    die();
  }
  $_POST = $select->fetch(); // Affiche de tableau ASSOC
}


include '../partials/admin_header.php';
?>


<h1>Editer une catégorie</h1>



<form action="#" method="post">
    <div class="form-group">
        <label for="name">Nom de l'article</label>
        <?= input("name"); ?>
    </div>
    <div class="form-group">
        <label for="slug">URL de l'article</label>
        <?= input("slug"); ?>
    </div>
    <button type="submit" class="btn btn-dark">Enregistrer</button>
</form>



<?php include '../partials/footer.php';?>