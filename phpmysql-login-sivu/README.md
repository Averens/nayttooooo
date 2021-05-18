## PHP ja tietoturva
```
1. Kopio tiedostot johonkin alikansioon C:\xampp\htdocs:ssa
2. Muokkaa tiedostossa php_connect_to_mysql.php muuttujaa
$dbname = "plokidb";
johon vaihdat tietokannan nimen.
3. Suorita setup.php -tiedosto, joka lisää käyttäjiä.
4. Kokeile login.php:ssa kayttajatunnukseen: vesa' -- '
Pääsetkö kirjautumaan sisään?
5. Kokeile signup.php:ssa seuraavaa komentoa: jukka','kalle','mies',2002); DROP table users -- '
Toimiiko dashboard.php edelleen?
6. Korjaa molemmat näistä login.php ja signup.php, jotta vastaavanlaiset SQL-injektiot eivät toimi.
ohje: https://www.w3schools.com/php/php_form_validation.asp
7. Muuta myös signup.php koodi pois multi-query funktiosta.
```
