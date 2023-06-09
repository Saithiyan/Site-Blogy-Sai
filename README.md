# PROJET

## Spécification

- Le projet doit être implémenté en utilisant le programmation orientée objet (POO).
- Le projet doit suivre le patterne MVC
- Le livrable doit inclure la base de données
- Livrer le projet en ZIP ou Github

## Demande du client

Je veux un site ou les utlilisateurs peuvent s'inscrire et se connecter, et lire et ajouter des posts.

Un site avec 4 pages (L'utilisateur peut naviguer entre les pages):

- Page d'accueil (accessible pour tout le monde):
  - Afficher tout les articles de tous les utilisateurs 
- Page d'authentification (accessible pour tout le monde):
  - Deux formulaire: un pour s'inscire et un pour se connecter
  - Les formulaires devront afficher les erreurs d'authenfication
- Page de profil (Accessible que par l'utilisateur authentifié):
  -  Un formulaire pour ajouter un POST:
     - Un titre
     - Un contenu
     - Une image Optionnelle
     - Une date
     - identifiant de l'utilisateur
   - Afficher la liste des articles de l'utilisateur.
 - Page des utilisateur
   - Une page pour afficher un utilisateur et ses articles

## Etape:

### Etape 1:

- Creation de pattern MVC: /src/
  - connexion à la base de donénes : /src/DB.php
    1. views
    2. controllers
    3. models
  - Création BDD "blogy", 2 tables: users et posts:
    1. users: userId AI, Identifiant(email): VARCHAR(100), password(hashed): VARCHAR 100
    2. posts: id AI, userID: INT, titre: VARCHAR(100), contenu: TEXT, date: stamp, image def=null ( VARCHAR (200))
  - Creation du navbar stylisé avec 2 lien pour 2 pages (connecté 3) dans /src/views:
    1. Accueil
    2. (Profil)
    3. Autentification
   - fichier head.php navbar.php dans users
   
### Etape 2:

Page d'authentifiation:
  - Form : 
    1. form inscription : identifiant(email), mot de passe et confirmation mot de passe :
       - Envoye de données vers /src/views/users/signin.php 
       - Affichage des erreurs dans un paragraphe:
          - Vous êtes deja inscrit, Connectez-vous !
          - entrer un identifiant (si vide)
          <!-- - mot de passe different (si password != confpassword) -->
          - entrer un mot de passe (si vide)
    2. form connexion : identifiant(email) et mot de passe
       - envoye de données vers /src/views/users/login.php
       - Affichage des erreurs dans un paragraphe:
         - Identifiant ou mot de passe incorrect
         - Vous n'est pas encore inscrit, Inscrivez-vous !

### Etape 3:

(Accessible que par l'utilisateur authentifié)
Si utilisateur connecté (SESSION):
  - Mettre Page de profil dans la navbar
  - Mette un lien de Deconnexion : destroy session





Quand on est connecté on ne peut pas acceder a la page de connexion.php
Quand on est pas connecté on ne peut pas acceder a la page profil.php, settings.php