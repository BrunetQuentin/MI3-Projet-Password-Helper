
<?php

/**
 * On récupère la liste des mots de passe les plus utilisés
 * @return array
 */ 
function readWorstPasswords(): array {
    // Lire le fichier data/PwnedPasswordsTop100k.json
    $worstPasswords = json_decode(file_get_contents("data/PwnedPasswordsTop100k.json"), true);
    return $worstPasswords;
}

/**
 * On récupère la liste des 10 mots de passe les plus utilisés
 * @return array
 */
function getTenFirstPasswords(array $worstPasswords): array {
    $tenFirstPasswords = array_slice($worstPasswords, 0, 10);
    return $tenFirstPasswords;
}

/**
 * fonction qui permet d'ajouter des points dans un nombre
 * ex: 1000000 => 1.000.000
 * @return int
 */
function getNumberWithDot(int $number): string {
    return number_format( $number, 0, '', '.');
}

include_once("worst-passwordsVue.php");

?>

