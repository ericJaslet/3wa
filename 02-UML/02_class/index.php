<?php

/*

Entity-Relationship

ER diagrame

--------------------
--------------------
diagrame de class

Class abstraite le nom est en italique
methode abstraite nom en italique

--------------------
3ème block
--------------------
Réception
    un peu comme un Évènement (click sourie etc.., click bouton) langage java/ JS
Ceux sont les callback
<<signal>> mot clé signal
    qui est de la catégorie signal

-> pour les diagramme de séquences

flèche blanche Généralisation
    en sens inverse remonte vers le parent
    = Héritage

trait relation Dépendance ----->


--------------------
--------------------
# protectid
+ public
- privat
+/ deriver propriété déduite par des propriétés de la class

[0..*] liste

--------------------
--------------------
methode query
    méthode Exécuter mais ne retourne pas de valeur


--------------------
--------------------
leaf class final

Association
    losange vide agregation (Assemblée -> immeuble)
        En programmation informatique et plus précisément en programmation orientée objet, l'agrégation permet de définir une entité comme étant liée à plusieurs entités de classe différentes. C'est une généralisation de la composition, qui n’entraîne pas l'appartenance.

    lodange plein assosiation (appartement -> immeuble)
        ans les diagrammes UML, une classe d'association est une classe qui fait partie d'une relation d'association entre deux autres classes.
        Vous pouvez rattacher une classe d'association à une relation d'association pour fournir des informations supplémentaires sur la relation. Une classe d'association est identique à d'autres classes et peut contenir des opérations, des attributs, ainsi que d'autres associations.

        Par exemple, une classe appelée Participant représente un participant et possède une association à une classe appelée Cours, qui représente un cours de formation. La classe Participant peut s'inscrire à un cours. Une classe d'association appelée Inscription définit plus précisément la relation entre les classes Participant et Cours en fournissant les informations de section, de niveau et de semestre concernant la relation d'association.


    Possibilité relation 0..* to many

---- class Association ?

Le rond product interface

Data type :
    Définir des Propriétés complexe


--------------------
--------------------
Comflit de trait en php :
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}


diagram de class add Part
    apparait comme un attribut plus cadre
    |-> add connected part
    defini qu'il existe une Relation entre les 2

add port = api entrée sortie


*/