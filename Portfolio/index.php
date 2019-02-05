<?php $auth = 0; ?>
<?php include 'lib/includes.php'; ?>
<?php include 'partials/header.php'; ?>

        <h1>HD Technology</h1>

<?php 
$select = $db->query('SELECT * FROM users');
// var_dump($select->fetch());
?>

<?php include 'lib/debug.php'; ?>
<?php include 'partials/footer.php'; ?>

        

