<!DOCTYPE html>
<html lang="fr">
    <head>
	    <?php require('header.php'); ?>

        <title>Pires mots de passe - Password Helper</title>
    </head>
    <?php 
      $listOfWorstPassword = readWorstPasswords();
    ?>
    <body class="bg-gray-50">
        <header
            class="flex justify-between items-center bg-white w-full shadow-md px-12 py-4"
        >
            <p class="text-2xl text-gray-600 font-bold mr-6">Password Helper</p>

            <nav>
                <ul class="flex">
                    <li class="mr-3">
                        <a id="worst-passwords" class="active-pill" href="#"
                            >Découvrir les pires<br />mots de passe</a
                        >
                    </li>

                    <li class="mr-3">
                        <a
                            id="password-generation"
                            class="inactive-pill"
                            href="password-generation.php"
                            >Générer un mot de passe<br />aléatoire</a
                        >
                    </li>
                </ul>
            </nav>
        </header>
        <main class="mx-12 my-4">
            <!-- Titre de la page -->
            <h1 class="text-center text-5xl font-bold my-8">
                Les pires mots de passe
            </h1>

            <p class="text-xl my-8">
                Cette page se base sur
                <a
                    href="https://www.ncsc.gov.uk/static-assets/documents/PwnedPasswordsTop100k.txt"
                    target="_blank"
                    class="underline text-blue-600 hover:text-blue-800"
                    >la liste des <b>100.000 mots de passe</b> les plus
                    communs</a
                >
                compilée par la National Cyber Security Center (UK). Plus
                d'informations sur la constitution de cette liste dans cet
                article
                <a
                    href="https://www.ncsc.gov.uk/blog-post/passwords-passwords-everywhere"
                    target="_blank"
                    class="underline text-blue-600 hover:text-blue-800"
                    >ncsc.gov.uk - Passwords, passwords everywhere</a
                >.
            </p>

            <hr class="border-gray-300" />

            <section class="flex text-gray-800 my-6">
                <!-- Partie de gauche -->
                <article class="mx-6 w-1/2">
                    <h2 class="text-2xl font-bold">
                        Liste des mots de passe les plus communs
                    </h2>

                    <p class="text-xl my-4">
                        Voici les 10 pires mots de passe, du plus commun au
                        moins commun :
                    </p>

                    <ol class="list-decimal px-14">
                        <?php
                            // loop throught the 10 worst passwords and display them
                          foreach (getTenFirstPasswords($listOfWorstPassword) as $password) {
                            echo "<li><b>$password</b></li>";
                          }
                        ?>
                    </ol>
                </article>

                <!-- Partie de droite -->
                <article class="mx-6 w-1/2">
                    <h2 class="text-2xl font-bold">Vérifier un mot de passe</h2>

                    <p class="text-xl my-4">
                        Saisir ci-dessous un mot de passe pour voir si celui-ci
                        fait partie des <b><?=getNumberWithDot(count($listOfWorstPassword))?> mots de passe</b> les plus
                        courants :
                    </p>
                    <div class="flex justify-center">
                        <form method="get" class="mb-3 w-90">
                            <div class="input-group relative flex w-full my-3">
                                <!-- Champ de recherche -->
                                <input
                                    type="search"
                                    name="mdp"
                                    class="px-3 py-1.5 border border-solid border-gray-500 rounded transition ease-in-out focus:border-blue-600 focus:outline-none"
                                    placeholder="Mot de passe à vérifier..."
                                    aria-label="Champ de recherche"
                                />

                                <!-- Bouton "loupe" pour lancer la recherche -->
                                <button
                                    type="submit"
                                    class="mx-3 px-6 py-2.5 bg-blue-600 text-white rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    aria-label="Bouton pour lancer la recherche"
                                >
                                    <svg
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="search"
                                        class="w-4"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                            fill="currentColor"
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php
                        $passwordToCheck = $mdp;
                        $passwordToCheck = htmlspecialchars($passwordToCheck);
                        // check if paswword is set
                        if($passwordToCheck != ""){
                            $indexWord = array_search($passwordToCheck, $listOfWorstPassword);
                            if($indexWord == false){
                                echo ("<p class=\"text-green-800\">
                                &#8658; Le mot de passe \"<b>{$passwordToCheck}</b>\" ne fait pas
                                partie des 100.000 mots de passe les plus utilisés.
                                </p>");
                            } else {
                                echo ("<p class=\"text-red-800\">
                                &#9888; Le mot de passe \"<b>{$passwordToCheck}</b>\" est le
                                <b>{$indexWord}</b> mot de passe le plus utilisé&nbsp;! Celui-ci
                                est donc à éviter absolument !!!
                                </p>");
                            }
                        }
                    ?>
                </article>
            </section>
        </main>
    </body>
</html>
