<?php
include '../lib/includes.php';
include '../partials/admin_header.php';

/**
 * Suppression
 */

if(isset($_GET['delete'])){
    checkCsrf();
    $id = $db->quote($_GET['delete']);
    $db->query("DELETE FROM categories WHERE id=$id");
    header('Location:category.php');
    die();
}
/**
 * Catégories
 */
$select = $db->query('SELECT id, name, slug FROM categories');
$categories = $select->fetchAll();

?>


<h1>Les catégories</h1>

<p><a href="category_edit.php" class="btn btn-success">New Category</a></p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($categories as $category): ?>
    <tr>
      <td><?php echo $category['id']; ?></td>
      <td><?php echo $category['name']; ?></td>
      <td>
        <a href="category_edit.php?id=<?php echo $category['id']; ?>" class="btn btn-dark">Edit</a>
        <a href="?delete=<?php echo $category['id']; ?> & <?php echo csrf(); ?>" class="btn btn-danger" onclick="return confirm('Sur de sur ?');">Delete</a>
      </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>


<?php include '../partials/footer.php';?>