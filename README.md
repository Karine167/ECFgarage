# ECF Garage Parrot
***
Dans le cadre de la formation de développeur web mobile, il nous a été demandé de créer un site web (site vitrine) pour un garage fictif et de proposer une interface d'administration permettant de gérer une base de données ( pour la gestion des employés, des informations du site, des véhicules d'occasion à vendre, des demandes de contact et des critiques).

## Sommaire
1. [Informations](#Informations)
2. [Technologies](#technologies)
3. [Installation](#Installation)


## Informations 
**(et Améliorations à prévoir)**
***
**Pour utiliser au mieux le site, il faut savoir que :**
* La plupart des informations et des images du sites sont modifiables. Pour cela, il faut être connecté en tant qu'**admin**, et dans le dashboard de la partie administration, un items permet d'accéder à la liste et à modifier les infos.
Les informations sont de plusieurs types, mais sont gérées par la même table. Elles sont donc différenciées par une localisation : 
   -> logo pour le logo du site, seule l'image du logo est importante.
   -> Warning pour le bandeau traversant en version Desktop (D) et le premier onglet de l'accordion en version mobile (M).
   -> info1 (D pour Desktop et M pour Mobile) en ce qui concerne la partie Entretien/Réparation
   -> info2 (D et M) en ce qui concerne la partie Réparation Carrosserie
   -> info3 (D et M) en ce qui concerne la partie Réparation Mécanique
   -> info4 (D et M) en ce qui concerne la vente de véhicule d'occasion 
   -> schedule (D et M) pour les informations d'horaires d'ouverture (voir le pied de page), 
   -> contact (D et M) pour les informations "Nous contacter" (voir le pied de page),
 ***
 **Remarques importantes :** 
 * toutes ses informations sont **modifiables** mais on ne peut **pas les supprimer**, il y a par contre la possibilité de les **cacher** (à l'aide d'un booléen hide). Attention, par contre les images peuvent être supprimées ou remplacées, une fois remplacées ou supprimées, il n'est pas possible de les réinitialiser. 
 ***
 * Ainsi, plutôt que de modifier les informations actuelles, il est **fortement conseiller de créer de nouvelles informations et de cacher les informations obsolètes**. 
 Si par mégarde plusieurs informations non cachées correspondent à la même localisation, seule celle ayant le plus grand Id sera affichée. De plus, si toutes les informations sont cachées pour une localisation donnée, on a à la place du titre et du contenu, un petit message "en construction". 
 ***
 Pour finir, pour les deux dernières localisations, l'image, si elle existe, ne sera de toute façon pas visible (car dans le pied de page).
 ***
 ***
 **Suite des fonctionnalités**
 * Seul l'admin peut également créer, modifier ou supprimer des employés, les liens pour ces deux premières fonctionnalités ne sont donc plus visibles lorsqu'on est connecté en tant qu'employé. L'admin a par contre, également accès à toutes les fonctionnalités proposées aux employés.
 ***
 * Pour les annonces de voiture (employé ou admin), il faut procéder d'abord par vérifier (ou ajouter) les informations concernant la marque, le modèle, le type, les énergies, les équipements, les options, les couleurs du véhicule, puis entrer les informations de l'annonce du véhicule et une fois qu'on a l'Id de l'annonce, ajouter les photos du véhicule.
 Cette partie de l'administration est à améliorer pour que tout puisse se faire dans un seul formulaire.
 ***
 * Les demandes de contact(client) peuvent être ensuite suivies par un employé (lien dans le dashboard) qui peut en créer d'autres, laisser un commentaire si la demande est encore en cours ou les supprimer lorsqu'elles ont été satisfaites.
 ***
 * Les commentaires clients peuvent être approuvés par un employé(lien dans le dashboard), et dans ce cas, ils sont pris en compte dans le calcul de la note moyenne et affichés sur la page d'acceuil du site.
 (un bug a fait disparaître les étoiles du formulaire de commentaire client, en attendant d'en trouver la cause, j'ai remis des boutons radio)
 ***
 * Pour les numéros de téléphone (formulaire de contact et gestion des employés) on attend 10 chiffres.
  
## Technologies
***
L'application a été réalisée à l'aide de Symfony 6.4 avec asset-mapper et easyAdmin.
La version de PHP utilisée est la version 8.3.
Pour la partie front, l'application utilise HTML5, CSS3, Bootstrap et un peu de Javascript.
Elle utilise une base de données de type mysql (MariaDB).
***
## Installation
***
**Pour l'installation en local :**
***
# Cloner le projet pour télécharger son contenu
Ouvrir un terminal et se placer dans le bon dossier :
$ cd projects/ (se placer dans votre dossier, nom à modifier)
Cloner le repository de GitHub :
$ git clone 
***
# Faire en sorte que Composer installe les dépendances du projet dans le répertoire vendor/
On ouvre le dossier du projet
$ cd my_project_name/  
On lance l'installation des dépendances à l'aide de composer
$ composer install
***
# Maintenant, il faut s'occuper de la base de données
modifier dans le fichier .env le DATABASE_URL pour pouvoir créer une nouvelle base de données :
par ex : 
DATABASE_URL="mysql://username:password@127.0.0.1:3306/DbName?ServerVersion=8.0.32&charset=utf8mb4"
***
Créer une nouvelle base de données avec :
$ symfony console doctrine:database:create
***
Importer la base de données :
$ php bin/console doctrine:migrations:migrate
***
Si vous avez des soucis avec l'importation de la base de données, j'ai mis le fichier d'importation (ecfgarage.sql) dans le dossier public, il faudra donc ensuite passer par phpMyadmin par exemple pour importer la base de données. 
***
# Lancer le server de symfony 
$ symfony server:start
et le site devrait normalement fonctionner.
***
# Connection en tant qu'admin :
email : vparrot@test.com
Mot de passe : VParrot

(ou bien créer un nouvel administrateur directement dans votre Gestionnaire de Base de données)
***
***
## Améliorations à prévoir
***
L'amélioration la plus importante à prévoir, serait d'améliorer la saisie des annonces des véhicules en regroupant toutes les entrées de données dans un seul formulaire (en utilisant EasyAdmin ou bien dans la nouvelle interface d'administration).
Une autre amélioration à envisager est de poursuivre la mise en place de la nouvelle interface d'administration afin qu'elle soit dans le même thème graphique que le reste du site.
On pourrait également proposer d'autres critères de tri des annonces, par exemple en sélectionnant la marque du véhicule dans une liste déroulante.
