# Cahier des charges

## Sommaire

## votre présentation
    WebTechPlus (WTP)
    Paris / Nantes
- votre expertise :
    expert php / symfony / wordpress / react / react-natif / Sql nosql / AWS 
- solidité de l'entreprise:
    Entreprise depuis 2008
    EDF / Vinci / Credit du nord / Hellfest

- projet similaire : Hellfest

## présentation du client
- client : ça Groove
- secteur d'activité : Evènementiel
- cible : festivaliers

## contexte du projet

- problématique :
    - problématique fonctionnelle
        SEO pas optimisé
        pas d'intégration de la billetterie
    - problématique opérationnelle
        code fermé
        performance médiocre
        pas évolutif
        actuellement Wix

- enjeux :

    - fonctionnelle
        la billeterie doit être utilisable sur le site
        enrichir la donnée client (goûts musicaux, ...)
        pouvoir extraire les données clients facilement (export ...)
        une experience utilisateur optimisée pour l'affichage sur mobile
        une formation de 2 jours

    - opérationnelle
        une capacité d'hébergement du dispositif qui peut être scalé rapidement
        gestion du multilangue

    - données de départ :
        csv des festivaliers 30k utilisateurs (geolocalisé, nom, prénom, adresse, email)
        charte graphique du festival

    - confidentialité :
        RGPD

    - rappel des dates importants :
        soutenance de la réponse : vendredi 18 juin à 13H30
        mise en production de la première version : fin septembre 2021
        festival session 2022 -> à partir du 1er février 2022

## scope de la prestation

- ce qui est compris :
    conception / développement de la solution
    accompagnement sur 3ans
    environement dev
    environnement recettage
    une TMA mensuel une fois le dispositif en production
    pour la futur intertinalisation back-office création page choix langue.

- ce qui n'est pas compris :
    charte graphique du festival


## méthodologie
- équipe dédiée
    SEO => Zya Nassurally
    Product-owner : Julien Martini (interlocuteur unique)
    Lead dev back-end : Eric Jaslet
    lead dev front : Benoît Dubus
    Développeurs :
        Anatole Cissé
        Emilie Frost
        Yasmina Outarick
    Administrateur réseaux : Jean-Philippe Smet

- validation des étapes
    intégration continue (server de recettage)
JH  / Plng
10J / 5J    - phase de conception : 
                1 semaine / SEO 2j - Product-owner 3j - 2 Lead dev 5j - Administrateur réseaux 1j
12J / 4J    - mise en place des serveur et outils (dev / recettage / prod / Git / Docker / BDD)
                Administrateur réseaux - 2 Lead dev - 3 dev


10J / 5J     - EasyAdminBundle (back-office Symfony)

2J /  2J    - présentation et historique du festival

2J / 2J     - page inscription
                Formulaire
                    mail *
                    nom *

2J / 2J     - Compléter votre profile
                Formulaire
                    Avatar (forum)
                    Prénom
                    Goût musicaux
                    Numéro téléphone
                    Addresse
                    Ville
                    Code Postal

1J / 1J     - connecteur Mailling

6J / 3J     - agenda de la session

2J / 2J     - présentation des artistes

2J / 2J     - Mise en place Api billeterie
                https://www.billetweb.fr

8J / 4J     - page "mise en contact avec l'équipe d'organisation"
                Forum par identification

3J / 3J     - page légales / CGV / RGPD / Sitemap

14J / 7J    - Recettage final

4J / 2J     - Formation 2J 2lead

3J / 3J     - mise en production de la première version : fin septembre 2021 
                administrateur réseau / lead dev / SEO

- outils mis à disposition :
    Trello
    GitLab privée
    application web / mobile interne :
        par login / mdp
        TMA
        documentations

## descriptif fonctionnel
/*
    concrètement 
    1 utilisateur défini par son email  et son mot de passe unique
    formulaire champ obligatoire
    valide je traite les donnzs notification
    mail de confirmation
        lien clé clique reviens sur le site
    
*/
- Page inscription
    Formulaire
        mail * (unique)
        nom * (2 caractères minimum / max 40 caractères)

- Compléter votre profile
    Formulaire
        Avatar (forum) (jpg, png, webp, svg)
        Prénom (2 caractères minimum / max 40 caractères)
        Goût musicaux (liste multiple déroulante)
        Numéro téléphone (internationnal)
        Addresse (60 caractères max)
        Ville (40 caractères max)
        Code Postal (20 caractères)

- implémentation de la billetterie
    API billeterie
- gestion du multilangues options
    pré-implémenté



## choix technique arguementé

server debian :
    fiable open source
    Classic Xtreme L V2 Intel® Bi-Xeon E5520
    forte influance * 3

MariaDB :   10.5
            open source fiable

docker : permet de déployer rapidement d'autre serveur sur les peériode de forte affluance

php8 : technologie apprové depuis de nombreuse année, majoritairement utilisée sur les applications modern stable

Api :
    Symfony 5.3.2
        techonoligie fiable basé sur du php
        forte communauté qui le maintient
        très utilisé dans les api
        EasyAdminBundle

    Mailjet 
        composer mailjet -> Symfony

    Api billeterie
        https://www.billetweb.fr

Front : react 16.13
    techonologie rapide et performante
    très utilisé et maintenu par facebook

## sécutité / protection de données

mise en oeuvre protége les données
test et controle avant la mise en pod
test intrusion
sauvegarde
injection sql


## planning 

Travail en mode agile
A chaque fin de sprint validation avec le contact client.

25/06/2021
au
20/09/2021


## estimation budgétaire


45 000€
+ 100€ / mois
+ periode d'affluance / 300€ / mois

TMA : 
    3 heures par mois offert
    Minimum 15 min, entre 1 heures et 3 heures sur facturation
            Au delà du réel sur devis.

option multi-L
15J -> 8 500€

## annexes


## mentions légales et juridiques
