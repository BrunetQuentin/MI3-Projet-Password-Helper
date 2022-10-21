
<?php

function readWorstPasswords() {
    // Read the file data/PwnedPasswordsTop100k.json
    // and returns the array of passwords
    $worstPasswords = json_decode(file_get_contents("data/PwnedPasswordsTop100k.json"), true);
    return $worstPasswords;
}

function getTenFirstPasswords($worstPasswords) {
    // Returns the 10 first passwords of the array
    $tenFirstPasswords = array_slice($worstPasswords, 0, 10);
    return $tenFirstPasswords;
}

function searchInArray($worstPasswords, $password) {
    // loop throught worst passwords array and return it's index if found
    // else return -1
    $index = -1;
    foreach ($worstPasswords as $key => $value) {
        if ($value == $password) {
            $index = $key + 1;
            break;
        }
    }
    // add 1 to the index because the array is 0-indexed
    return $index;
}

// function that transform an integer into a string with dots
// ex: 1000000 -> 1.000.000
function getNumberWithDot($number) {
    return number_format( $number, 0, '', '.');
}

include_once("worst-passwordsVue.php");

?>

