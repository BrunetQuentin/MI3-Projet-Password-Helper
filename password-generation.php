<?php
	/**
	 * Obtient le critère de taille à afficher
	 *
	 * @param int Taille
	 *
	 * @return int Taille
	 */
	function getLastSize(int $taille) {
		if (is_numeric($taille) && (trim($taille) !== '')) {
			return $taille;
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
	 * @param array typesCarac
	 * @param int Taille
	 *
	 * @return string Mot de passe
	 */
	function genPass(array $typesCarac, int $taille) {
		$result = '';

		$charSets = [];
		$categories = [
			'alphaUp'  => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'alphaLow' => 'abcdefghijklmnopqrstuvwxyz',
			'numbers'  => '0123456789',
			'specials' => '!?~@#-_+[]{}'
		];
		foreach ($categories as $categoryName => $categoryValue) {
			if (in_array('majuscules', $typesCarac, true)) {
				$charSets[$categoryName] = $categoryValue;
			}
		}

		$i = 0;

		// On s'assure d'obtenir au moins un caractère de chaque catégories de caractères
		foreach ($charSets as $charSet) {
			if ($i >= $taille) {
				break;
			}
			$result .= getRandomChar($charSet);
			$i++;
		}

		while ($i < $taille) {
			$charSetsKey = array_keys($charSets)[rand(0, count($charSets) - 1)];
			$result .= getRandomChar($charSets[$charSetsKey]);
			$i++;
		}

		return str_shuffle($result);
	}

	$displayPass = count($_GET) !== 0;
	$error = (isset($_GET['taille']) === false) || (isset($_GET['typesCarac']) === false);

	// Si on doit afficher le mot de passe et qu'il n'y a aucune error
	if ($displayPass && (!$error)) {
		$password = genPass($_GET['typesCarac'], $_GET['taille']);
	}

	require_once('password-generationVue.php');