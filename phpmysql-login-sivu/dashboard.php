<?php
// Serverin puolelle luodaan tätä istuntoa varten muuttujia
// istuntoa käytetään pitämään kirjaa web-sivua selaavasta käyttäjästä
session_start();
?>

<?php include 'php_connect_to_mysql.php';?>

<?php include 'header.php';?>
<center>
<h3>Dashboard</h3>
</center>
<?php
if( empty($_SESSION["kayttajatunnus"]) ) {
  echo "Kirjaudu ensin sisään.";
  // lopeta sivun lataus
  exit(1);
}

  

?>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $otsikko = test_input($_POST["Otsikko"]);
  $teksti = test_input($_POST["Teksti"]);
  $sql = "INSERT INTO plokit (viestit, otsikko) VALUES ('".$otsikko."','".$teksti."')";
  $conn->multi_query($sql);
 }
  
  

 ?>


  <?php
// Kopio tähän admin osiosta user-tietojen näyttö sessionissa olevalla käyttäjälle.

echo "Tervetuloa, ".$_SESSION["kayttajatunnus"]."<br>";

?> 

<center>
<h1>Blogi alusta</h1>
</center>
<form method="post" action="dashboard.php">  
  Otsikko: <input type="text" name="Teksti">
  <br><br>
  Teksti: <textarea name="Otsikko"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// Muodostetaan SQL-haku
$sql = "SELECT * FROM plokit ORDER BY id DESC";
  
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
     echo "<h3>". $row["otsikko"] . "</h3><br>";
     echo $row["viestit"] . "<br>";
     echo "<hr>";
    
  }

  function test_input($data) {
    // TODO: muokkaa tässä $data muuttujaa, jotta koodista tulee turvallisempaa
  
    return $data;
  }

?>