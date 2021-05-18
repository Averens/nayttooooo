<?php include 'header.php';?>

<h3>Setup: Create database and add users</h3>

<?php include 'php_connect_to_mysql.php';?>

<?php
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
kayttajatunnus VARCHAR(30) NOT NULL,
salasana VARCHAR(30) NOT NULL,
sukupuoli VARCHAR(50),
syntymavuosi INT(6),
rooli VARCHAR(30) NOT NULL DEFAULT 'plokkaaja',
rekisterointi_pvm TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";
 $sql .= "INSERT INTO users (kayttajatunnus,salasana,sukupuoli,syntymavuosi,rooli) VALUES ('vesa','kissa','mies',1975,'admin'), ('kalle','qwerty','mies',1995,'plokkaaja'), ('jaana','koira','nainen',2010,'plokkaaja'), ('vieno','123abc','muu',2000,'plokkaaja') ;";

echo "SQL-komento on :<br>";
echo $sql;
echo "<br>";

/*
Execute commands in $sql

*/
$conn->multi_query($sql);

do {
    if ($result = $conn->store_result()) {
        var_dump($result->fetch_all(MYSQLI_ASSOC));
        $result->free();
    }
} while ($conn->next_result());
$conn->close();

?>
