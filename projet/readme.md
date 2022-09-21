# ChouetteTransfert - Site de chiffrement bout en bout

-------------------------------------------------------------------
## Description du projet
Étant confrontés chaque jour à des cyberattaques, à des fuites de données, à des
logiciels malveillants, nos informations et données personnelles sont très sensibles et ont
besoin d’être protégées. Pour ce faire, il faut penser à bien chiffrer ses données, surtout
dans certains cas où ces dernières sont facilement récupérables et où elles sont censées être
confidentielles.
La meilleure solution préconisée est donc le chiffrement de bout en bout, qui permettra
d’avoir une protection tout au long du trajet de l’information, et jusqu’à la réception du
destinataire.
Voici donc l'objectif de ce projet. 
---
## Comment acceder au site
1. Installer __Xampp__ (*Window*) ou __Mamp__ (*Mac*)
2. Deposer dans le dossier __htdocs__ le dossier du projet
3. Lancer __Xampp__ ou __Mamp__ et activer Apache et MySQL
4. Deposer sur votre phpmyadmin la base de donnée (__projet.sql__)
5. Acceder a votre __localhost__ (http://localhost:8080) et lancer le projet.
6. Bonne aventure

---
## A configurer 
1. Rentrer vos identifiants __phpmyadmin__ sur tout les fichiers .php avec un __bdd->PDO__
2. Dans phpmailer -> index.php, configurez votre adresse mail / message.

---

## Utilisation du site
1. S'inscrire au site (Si premiere utilisation)
2. Se connecter avec le pseudo et le mot de passe définit lors de votre inscription.
3. Parcours libre sur le site
   1. Deposer et chiffrer des fichiers en choississant une clef
   2. Decrypter et telecharger des fichiers si clef correcte
   3. Changer d'adresse mail/mot de passe
   4. Se deconnecter
4. En cas de mot de passe oublié, possibilité lors de la connection de demander un nouveau mot de passe via votre adresse mail.

---
## Credits
Collaboration de Houda Zamani et Maxime Montavon

---
## Langage utilisé
* Php
* Sql
* Html/css
* JavaScript
* Ajax (Prévision future)