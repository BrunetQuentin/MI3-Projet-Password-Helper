<!DOCTYPE html>
<html lang="fr">

<head>
	<?php require('header.php'); ?>

	<title>Génération de mots de passe robustes - Password Helper</title>
</head>

<body class="bg-gray-50">

	<header class="flex justify-between items-center bg-white w-full shadow-md px-12 py-4">
		<p class="text-2xl text-gray-600 font-bold mr-6">Password Helper</p>

		<nav>
			<ul class="flex">

				<li class="mr-3">
					<a id="worst-passwords"
						class="inactive-pill"
						href="worst-passwords.php"
					>Découvrir les pires<br>mots de passe</a>
				</li>

				<li class="mr-3">
					<a id="password-generation"
						class="active-pill"
						href="#"
					>Générer un mot de passe<br>aléatoire</a>
				</li>

			</ul>
		</nav>

	</header>
	<main class="mx-12 my-4">
		<!-- Titre de la page -->
		<h1 class="text-center text-5xl font-bold my-8">La génération d'un mot de passe aléatoire</h1>

		<p class="text-xl my-8">Pour qu'un mot de passe soit robuste, il faut qu'il soit long (au minimum 10 caractères) et qu'il contienne au moins une majuscule, une minuscule, un chiffre et un caractère spécial. L'idéal étant que cette suite de caractères soit totalement "aléatoire".</p>

		<hr class="border-gray-300">

		<section class="text-gray-800 my-6">

			<form method="get">
			<!-- Nombre de caractères -->
			<div class="mb-3">
				<label for="taille" class="inline-block mb-2 text-gray-700">
					Le mot de passe à générer doit faire </label>
				<input type="number" id="taille" name="taille" min="5" max="50"
				class="input-number" value= <?= isset($taille) ? getLastSize($taille) : '' ?> >
				<span>caractères.</span>
			</div>

			<!-- Types de caractères -->
			<div class="mb-3">
				<label class="inline-block mb-2 text-gray-700">
					Celui-ci doit contenir <u>au moins un(e)</u> :</label>

				<div class="ml-8">
					<div class="mb-2">
						<input type="checkbox" id="input-maj" class="input-checkbox"
							name="typesCarac[]" value="majuscules"
							<?= isset($typesCarac) && in_array('majuscules', $typesCarac, true) ? 'checked' : '' ?> >
						<label class="inline-block text-gray-800" for="input-maj">
							Une lettre majuscule [ABCDEFGHIJKLMNOPQRSTUVWXYZ]
						</label>
					</div>
					<div class="mb-2">
						<input type="checkbox" id="input-min" class="input-checkbox"
							name="typesCarac[]" value="minuscules"
							<?= isset($typesCarac) && in_array('minuscules', $typesCarac, true) ? 'checked' : '' ?> >
						<label class="inline-block text-gray-800" for="input-min">
							Une lettre minuscule [abcdefghijklmnopqrstuvwxyz]
						</label>
					</div>
					<div class="mb-2">
						<input type="checkbox" id="input-chiffre" class="input-checkbox"
							name="typesCarac[]" value="chiffres"
							<?= isset($typesCarac) && in_array('chiffres', $typesCarac, true) ? 'checked' : '' ?> >
						<label class="inline-block text-gray-800" for="input-chiffre">
							Un chiffre [0123456789]
						</label>
					</div>
					<div class="mb-2">
						<input type="checkbox" id="input-special" class="input-checkbox"
							name="typesCarac[]" value="specials"
							<?= isset($typesCarac) && in_array('specials', $typesCarac, true) ? 'checked' : '' ?> >
						<label class="inline-block text-gray-800" for="input-special">
							Un caractère spécial [!?~@#-_+[]{}]
						</label>
					</div>
				</div>

			 <!-- Bouton de validation pour lancer la génération du mot de passe -->
			 <input type="submit" value="Générer" class="btn btn-blue mt-2">

			</div>
			</form>
		</section>

		<section class="text-gray-800 my-6">

		<?php if ($displayPass) { ?>

			<?php if ($error) { ?>

				<p class='text-red-800'>&#9888; Impossible de générer un mot de passe car aucune taille ou aucun type de caractère n'a été sélectionné !</p>

			<?php } else {?>

				<p>&#8658; Mot de passe généré : <b><?= $password ?></b></p>

			<?php }?>

		<?php }?>

		</section>
	</main>
	<br>
</body>

</html>