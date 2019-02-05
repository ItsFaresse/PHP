<?php
include '../lib/includes.php';
include '../partials/admin_header.php';

/**
 * Suppression
 */

if(isset($_GET['delete'])){
    checkCsrf();
    $id = $db->quote($_GET['delete']);
    $db->query("DELETE FROM works WHERE id=$id");
    header('Location:work.php');
    die();
}
/**
 * Catégories
 */
$select = $db->query('SELECT id, name, slug FROM works');
$categories = $select->fetchAll();

?>


<h1>Les articles</h1>

<p><a href="category_edit.php" class="btn btn-success">New article</a></p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($works as $work): ?>
    <tr>
      <td><?php echo $work['id']; ?></td>
      <td><?php echo $work['name']; ?></td>
      <td>
        <a href="work_edit.php?id=<?php echo $work['id']; ?>" class="btn btn-dark">Edit</a>
        <a href="?delete=<?php echo $work['id']; ?> & <?php echo csrf(); ?>" class="btn btn-danger" onclick="return confirm('Sur de sur ?');">Delete</a>
      </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>


<?php include '../partials/footer.php';?>