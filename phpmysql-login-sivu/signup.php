<!DOCTYPE HTML>  
<html>
<body>  

<h3>Luo käyttäjätunnus</h3>
<?php include 'header.php';?>

<?php
// ladataan SQL-istuntoa varten apukirjasto
?>
<?php include 'php_connect_to_mysql.php';?>

<?php
// luodaan tyhjät muuttujat tietojen tallentamista varten
$kayttajatunnus = $salasana = $sukupuoli = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kayttajatunnus = test_input($_POST["kayttajatunnus"]);
  $salasana = test_input($_POST["salasana"]);
  $sukupuoli = test_input($_POST["sukupuoli"]);

echo "<h2>Syötit tiedot:</h2>";
echo $kayttajatunnus;
echo "<br>";
echo $salasana;
echo "<br>";
echo $sukupuoli;
echo "<br>";

$kayttajatunnus = $_POST['kayttajatunnus'];
$sql = "SELECT kayttajatunnus FROM users WHERE kayttajatunnus='".$kayttajatunnus."'";
$result = $conn->query($sql);

if (isset($kayttajatunnus)) {
    
    if ($result->num_rows > 0) {
        echo "Käyttäjätunnus tuolla nimellä on käytössä.";
        die();
    } 
}



if(preg_match('/^\w{5,}$/', $kayttajatunnus)) { 

  if(1 === preg_match('~[0-9]~', $kayttajatunnus)){
    $hashed_password = password_hash($salasana, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (kayttajatunnus,salasana,sukupuoli,syntymavuosi) VALUES ('".$kayttajatunnus."','".$hashed_password."','".$sukupuoli."',1995)";
    echo "Käyttäjä tunnus on luotu onnistuneesti!";
}
else{

  die("Käyttäjätunnuksen on sisällettävä numeroita.");
}
 
}
else{
  die("Käyttäjätunnuksen pitää olla yli 5 merkkiä pitkä, ja sisältää kirjaimia ja numeroita");
}




//echo "SQL-komento:".$sql."<br>";
//echo "SQL-status<br>";

$conn->multi_query($sql);

do {
    if ($result = $conn->store_result()) {
        var_dump($result->fetch_all(MYSQLI_ASSOC));
        $result->free();
    }
} while ($conn->next_result());
$conn->close();
}

function test_input($data) {
  // TODO: muokkaa tässä $data muuttujaa, jotta koodista tulee turvallisempaa

  return $data;
}

?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  kayttajatunnus: <input type="text" name="kayttajatunnus">
  <br><br>
  salasana: <input type="text" name="salasana">
  <br><br>
  sukupuoli:
  <input type="radio" name="sukupuoli" value="nainen">Nainen
  <input type="radio" name="sukupuoli" value="mies">Mies
  <input type="radio" name="sukupuoli" value="muu">Muu
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
