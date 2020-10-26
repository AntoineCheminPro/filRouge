# Application bancaire

Il s'agit d'une application développée dans le cadre de mon activité de formateur en développement web. Ce projet est la continuité d'une application bancaire dont il avaient déjà développé une interface graphique en HTML/CSS/JS, aujourd'hui ils doivent la dynamiser à l'aide de PHP.

Pour la première version du projet voir : https://github.com/thomgo/banque-frontend

Au travers de cet exercice, ils apprennent à :
- Comprendre les types de données
- stocker des données dans des variables ou des tableaux
- Utiliser les structures conditionnelles
- Utilisez des boucles pour parcourir des données
- Créer et utiliser des fonctions
- Utiliser des fonctions natives
- Traiter les données d’un formulaire en PHP
- Transmettre des données via l’url
- Gérer une session utilisateur simple
- Rediriger un utilisateur en PHP
- Créer un template simple en PHP
- Afficher des données

## Consignes

Le conseil d’administration a été très satisfait du premier jet de votre application et la trouve intéressante. Il a donc donné son feu vert au service informatique pour poursuivre le projet.

Votre scrum master après en avoir discuté avec le product owner est revenu vers vous et vous demande maintenant de commencer à dynamiser l’application à l’aide d’un langage back-end afin de pouvoir intégrer par la suite une base de données.

Il souhaiterait dans un premier temps intégrer les fonctionnalités suivantes.

Spécifications fonctionnelles :
- Afin de gagner en maintenabilité, le template n’est plus dupliqué sur toutes les pages. Il est maintenant éclaté dans des fichiers header.php, nav.php, footer.php etc chargés sur chacune des pages.
- Les données pour affichées les comptes en banque sur la page d’accueil sont maintenant stockées dans un tableau (voir dans le dossier data accounts.php), et une boucle affiche tous les comptes. Ceux-ci ne sont
plus écrits en dur dans le HTML
- Quand on clique sur un compte en banque, on arrive sur une page spécifique dédiée au compte et qui n’affiche que les informations de ce compte. Cette fonctionnalité utilise la transmission de données par l’URL.
- Quand l’utilisateur remplit le formulaire de création de compte et qu’il soumet le formulaire, le compte est créé à côté du formulaire avec les informations rentrées par l’utilisateur

Spécifications techniques :
- PHP 7
- Serveur Apache2
- Base Boilerplate

## Pour aller plus loin

- Intégrer un embryon de formulaire de connexion, en effet plus tard il faudra pouvoir gérer les utilisateurs de l’application. Rajoutez une page de connexion avec un formulaire demandant un login et un mot de passe. Le login et le mdp rentrés sont comparés à un login et un mdp stockés en
dur dans le fichier et s’ils sont identiques l’utilisateur est redirigé vers l’application.
