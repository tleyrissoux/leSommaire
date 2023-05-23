# leSommaire

## Compiler
- Si php, n'est pas installé : sudo apt-get install php
- Installez "composer" en copie-collant dans votre terminal les commandes de la page : https://getcomposer.org/download/
- Placez vous à la racine du projet, dans "leSommaire" et faites la commande : composer install

## Base de données
- Dans le dossier principal, dans le fichier ".env", modifiez DATABASE_URL et remplacez les # par vos configurations : #typeDeBase://#utilisateur:#motDePasse@127.0.0.1:#port/le_sommaire
- Lancer la migration avec : php bin/console doctrine:migrations:migrate

## Exécuter
- Toujours à la racine du projet, effectuer la commande : symfony serve
- Affichez la page https://127.0.0.1:8000 dans votre navigateur.
