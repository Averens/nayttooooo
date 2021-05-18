<?php
// Serverin puolelle luodaan tätä istuntoa varten muuttujia
// istuntoa käytetään pitämään kirjaa web-sivua selaavasta käyttäjästä
session_start();
?>

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
// ladataan SQL-istuntoa varten apukirjasto
?><?php include 'php_connect_to_mysql.php';?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $otsikko = test_input($_POST["Otsikko"]);
  $teksti = test_input($_POST["Teksti"]);
  $sql = "INSERT INTO plokit (viestit, otsikko) VALUES ('".$otsikko."','".$teksti."')";
 }
 $conn->multi_query($sql);

  do {
      if ($result = $conn->store_result()) {
          var_dump($result->fetch_all(MYSQLI_ASSOC));
          $result->free();
      }
  } while ($conn->next_result());
  
  

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
  Teksti: <input type="text" name="Otsikko">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>



  
<?php

$sql = "SELECT kayttajatunnus, salasana, sukupuoli, syntymavuosi FROM users WHERE kayttajatunnus='".$_SESSION["kayttajatunnus"]."'";

echo "<br>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // tulostetaan taulukon otsikkotiedot

  while($row = $result->fetch_assoc()) {
    // tulostetaan taulukon sisältö
    
  }
echo "</table>";
} else {
  echo "Tietoa ei voida näyttää";
}
// sulje SQL-yhteys
$conn->close();

function test_input($data) {
  // TODO: muokkaa tässä $data muuttujaa, jotta koodista tulee turvallisempaa

  return $data;
}
?> 