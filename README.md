# LP-MI3-PHP - Projet 1 - Password Helper

L'objectif de ce (mini-)projet, c'est de reprendre les 2 pages statiques en HTML pour les rendre dynamiques en les transformant en pages PHP.

Le résultat attendu est visible à l'adresse : [Password Helper (Résultat Attendu)](http://carl-vincent.fr/LP-MI3-PHP/password-helper-RESULTAT-ATTENDU/worst-passwords.php)

## Objectifs généraux :
- Coder les 2 pages PHP pour qu'elles fonctionnent comme attendu
- Gérer les différents cas d'erreurs pour afficher les messages attendus *(Aucun `Warning` ou `Error` ne doit apparaitre, même si des informations incohérentes ont été saisies dans l'URL)*
- Produire du **code de qualité** en respectant les règles de codage suivantes :
  - Respecter les standards PSR ("PHP Standards Recommendations") résumés dans cet article : [Tainix.fr - Bonnes pratiques PHP #1 un code propre qui respecte les standards](https://tainix.fr/article-technique/Bonnes-pratiques-PHP-1-un-code-propre-qui-respecte-les-standards)
  - Définir les types des variables dès que cela est possible : pour les paramètres et le type de retour des fonctions, pour les attributs de classe, ... *(Plus d'informations dans cet article : [Tainix.fr - Bonnes pratiques PHP #2 typage, protection et comparaison stricte](https://tainix.fr/article-technique/Bonnes-pratiques-PHP-2-typage-protection-et-comparaison-stricte))*
  - Commenter (au minimum) toutes vos fonctions et vos classes
  - Éviter au maximum la duplication de code en suivant le principe **DRY** = "Don't Repeat Yourself" *(Pour passer des informations à une page PHP à inclure, vous pouvez utiliser la variable super-globale `$GLOBALS`)*
  - ...


## Objectifs spécifiques par page :

### Les pires mots de passe (`worst-passwords.php`)
- [ ] Récupérer la liste des pires mots de passe en chargeant dans votre script PHP le JSON fourni : `data/PwnedPasswordsTop100k.json`
- [ ] Faire en sorte qu'à chaque fois que le nombre "100.000" apparait sur la page, cela provienne du nombre de mots de passe contenus dans la liste chargée
- [ ] Générer la liste des 10 pires mots de passe à partir de la liste chargée
- [ ] Faire fonctionner la recherche de mot de passe et afficher un message selon le cas *(En se basant sur les messages fournis dans le HTML)*
- [ ] Faire en sorte que si une recherche est effectuée, le texte recherché apparaisse dans le champ de recherche au chargement de la page
- [ ] Faire en sorte que si aucune recherche n'est faite, aucun message n'apparait sous le champ de recherche
- [ ] Formatter tous les grands nombres affichés avec un '.' comme séparateur de milliers


### La génération d'un mot de passe aléatoire (`password-generation.php`)
- [ ] Si aucun paramètre n'est présent dans la QueryString de l'URL, il ne faut afficher aucun message sous le bouton "Générer"
- [ ] Si un paramètre `taille` est présent dans la QueryString de l'URL mais aucun paramètre `typesCarac[]` n'est présent, il faut afficher le message d'avertissement "⚠ Impossible de générer..." visible dans le HTML fourni
- [ ] Si un paramètre `taille` et au moins un paramètre `typesCarac[]` est présent dans la QueryString de l'URL, il faut lancer la génération d'un mot de passe aléatoire selon les critères sélectionnés
- [ ] Si un type de caractères est sélectionné, il faut qu'il y ait **toujours au moins un caractère de ce type** dans le mot de passe généré
- [ ] Quand une URL contenant des paramètres dans sa QueryString est chargée, il faut que toutes les informations présentes dans l'URL soient appliquées dans la page chargée *(Si l'URL contient `taille=8`, il faut que le champ taille affiche la valeur **8**)*

