# leSommaire

- Je tenais à remercier Grafikart : https://grafikart.fr/, pour sa précieuse formation sur Symfony, qui m'a servi de base pour apprendre la technologie et programmer mon application.
- Le ".env" est présent sur le Github avec la clef de l'application pour des raisons de practicité à l'installation. Cependant, ceci est un projet de démonstration et pour un logiciel livrable, le git ne devra jamais contenir cette clef ou les identifiants de connexion d'une base de données présents dans le fichier d'environnement.

## Compiler
- Si php, n'est pas installé : sudo apt-get install php
- Installez "composer" en copie-collant dans votre terminal les commandes de la page : https://getcomposer.org/download/
- Placez vous à la racine du projet, dans "leSommaire" et faites la commande : composer install

## Base de données
- Dans le dossier principal, dans le fichier ".env", modifiez DATABASE_URL et remplacez les # par vos configurations : #typeDeBase://#utilisateur:#motDePasse@127.0.0.1:#port/le_sommaire
- Lancer la migration avec : php bin/console doctrine:migrations:migrate
- Exécuter les fixtures pour remplir la base de données avec : php bin/console doctrine:fixtures:load. La console vous demande de confirmer, répondez "yes"

## Exécuter
- Toujours à la racine du projet, effectuer la commande : symfony serve
- Affichez la page https://127.0.0.1:8000 dans votre navigateur (cf MANUEL-UTILISATEUR.md pour plus de détails).
