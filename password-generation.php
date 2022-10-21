<?php
	/**
	 * Obtient le critère de taille à afficher
	 *
	 * @return int Taille
	 */
	function getLastSize() {
		if (isset($_GET['taille']) && is_numeric($_GET['taille']) && (trim($_GET['taille']) !== '')) {
			return $_GET['taille'];
		}
		else {
			return '8';
		}
	}

	/**
	 * Récupère un caractère aléatoire d'une chaîne de caractères
	 *
	 * @param string Chaîne de caractères
	 *
	 * @return string Caractère aléatoire
	 */
	function getRandomChar(string $str) {
		return str_split($str)[rand(0, strlen($str) - 1)];
	}

	/**
	 * Génère un mot de passe suivant les critères stockés dans la queryString de l'URL
	 *
	 * @return string Mot de passe
	 */
	function genPass() {
		$result = '';

		$charSets = [];
		if (in_array('majuscules', $_GET['typesCarac'], true)) {
			$charSets['alphaUp'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}
		if (in_array('minuscules', $_GET['typesCarac'], true)) {
			$charSets['alphaLow'] = 'abcdefghijklmnopqrstuvwxyz';
		}
		if (in_array('chiffres', $_GET['typesCarac'], true)) {
			$charSets['numbers'] = '0123456789';
		}
		if (in_array('specials', $_GET['typesCarac'], true)) {
			$charSets['specials'] = '!?~@#-_+[]{}';
		}

		$i = 0;

		// On s'assure d'obtenir au moins un caractère de chaque catégories de caractères
		foreach ($charSets as $charSet) {
			if ($i >= $_GET['taille']) {
				break;
			}
			$result .= getRandomChar($charSet);
			$i++;
		}

		while ($i < $_GET['taille']) {
			$charSetsKey = array_keys($charSets)[rand(0, count($charSets) - 1)];
			$result .= getRandomChar($charSets[$charSetsKey]);
			$i++;
		}

		return $result;
	}

	$displayPass = count($_GET) !== 0;
	$error = (isset($_GET['taille']) === true) && (isset($_GET['typesCarac']) === false);

	// Si on doit afficher le mot de passe et qu'il n'y a aucune error
	if ($displayPass && (!$error)) {
		$password = genPass();
	}

	require_once('password-generationVue.php');