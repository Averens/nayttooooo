<?php
session_start();
?>
<?php include 'header.php';?>

<h1>Hei, hei. Sessio on lopetettu</h1>

<?php
session_destroy();
?>