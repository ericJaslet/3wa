# Diagramme d'activité

## Résumé


## Introduction

Le diagramme d'activité ou simplement « activité » (`Activity`) est un **diagramme comportemental** d'UML, permettant de représenter le déclenchement d'événements en fonction des états du système et de modéliser des comportements parallélisables (multi-threads ou multi-processus). 
Le diagramme d'activité est également utilisé pour décrire un flux de travail (workflow).
Dans la formalisation d'UML, une activité est un comportement (`Behavior`), qui est lui-même un classifieur (`Classifier`).
Globalement, une activité peut être assimilé à la représentation d'un algorithme.
En français, on a aussi souvent appelé ces diagrammes des « organigrammes ».

## Eléments des activités :

Le diagramme d'activité présente une vision macroscopique et temporelle d'un scénario.
En première approximation, on peut dire qu'il est composé de « nœuds » (`ActivityNode`) qui sont des traitements et qui sont reliés entre eux pas des « arcs » (`ActivityEdge`).
Ces arcs sont **orientés**, ce qui signifie que l'exécution se déroule dans un sens déterminé.
Les nœuds et les arcs peuvent porter des noms qui se répètent.
Un même traitement pouvant être réalisé plusieurs fois au cours de l'activité, par exemple.

Une activité a un début (représenté par un cercle plein noir) et peut posséder une ou plusieurs fins (représentées par deux cercles concentriques).

![Exemple 1](images/activity_1.jpg)

### Nœuds

Un nœud peut être vu comme une étape simple du scénario (ou algorithme) modélisé par l'activité.
Un nœud accepte des « jetons », ou des variables et les transforme avnt de les transmettre via un ou plusieurs arcs.
En effet, en UML, les activités ne sont pas nécessairement linéaires mais peuvent très bien être des arbres.
On peut distinguer trois types de nœuds :
1. des nœuds d'exécution (`ExecutableNode`),   
1. des nœuds de contrôle (`ControlNode`), qui ont pour fonction d'orienter le parcours des jetons/variables vers des arcs détermninés.
1. des nœuds d'objet (`Objectnode`), qui représentent des structures de données (partagées par exemple).

### Arcs

Un arc (`ActivityEdge`) relie tout simplement deux nœuds, comme dans tout graphe normal.
Il existe deux types d'arcs :
1. des flux de contrôle (`ControlFlow`), qui représentent explicitement une séquence de nœuds synchrone (un trzitment ne pouvant commencer avant que le précédent ne soit terminé)
1. des flux d'objets (`ObjectFlow`) , qui modélisent des transferts de valeurs entre des nœuds d'objet.

### Variables

Les flux d'objets représentent la première manière de véhiculer des valeurs à l'intérieur d'une activité.
La seconde manière est de recourir à des variables (`Variable`).
Les variables sont typées (`TypedElement`) et on s'attend donc à ce que les valeurs qu'elles véhiculent respectent cette contrainte.
Les variables sont également des `MultiplicityElement`. Cela implique qu'une variable peut contenir plusieurs valeurs, en fonction d'une limite supérieure qu lui est assignée.


## Nœuds d'exécution

Un nœud d'exécution consitue une étape d'une activité.
Dans la spécification UML c'est une action (`Action`).
Il est est de cefait relié à des arcs entrants et des arcs sortants sui sont des flux de contrôle.
On représente un nœud d'exécution par un rectangle arrondi (associé à un nom).
 
![Exemple 1](images/activity_2.jpg)

> N.B. : Une particularité des nœuds d'exécution UML est qu'ils peuvent être déclarés comme **réentrants**, c'est-à-dire qu'ils peuvent être appelés simultanément plusers fois, engendrant une forme de parallélisme.

Un nœud peut être étiquetté de maninère à exprimer des pré-conditions ou des post-conditions.

![Exemple 1](images/activity_3.jpg)

Une contrainte s'exprime sous forme d'expression logique (souvent dans un (pseudo-)langage de programmation).
Cette contrainte, comme dans l'exemple ci-dessus peut être nommée 

Une action peut accepter ou produire des objets qu sont notés sont forme de petites boîtes appelées « pins » (`Pin`).

![Exemple 1](images/activity_4.jpg)

Les pins représentent les objets/variables consommés et produites par une action.
En termes de programmation, on pourra assimiler cela à des paramètres typés (en entrée) et des valeurs typées (en sortie).
Dans l'exemple ci-dessus, nous avons précisé la cardinalité des valeurs atendues car UML ce que contient un `ObjectNode`.

> N.B. : Dans le cas où un  ObjectNode` contient des valeurs multiples, l'arc peut être annoté avec une contrainte de sélection.

Une notation alternative autorisée consiste à intercaler un `ObkectNode` après une action, ce qu peut être plus lisible, dans certains cas.

![Exemple 1](images/activity_5.jpg)

Dans une activité, il est souvent nécessaire de représentér des interruptions, qui sont généralement des execeptions mais qui peuvent s'entendre dans un sens plus large.

![Exemple 1](images/activity_10.jpg)

Dans le diagramme ci-dessus, nous avons ajouté une « région d'activité interruptible » qui montre qu'une partie du processus peut être interrompue à tout moment.
Dans notre cas, l'activité reçoit un signal (celui-ci est représenté à l'intérieur de la région) et, dans ce cas, bifurque immédiatement vers une action alternative.
Dans l'exemple, si une annulation de ceommande est détectée, alors tout ce qui avait été fait est tout simplement effacé. 

## Nœuds de contrôle

Comme pour tout algorithme, nous avons besoin de représenter le contrôle du flux d'exécution.
UML nous permet de spécifier les choses de manières élémentaire :
1. des décisions pour effectuer des branchements alternatifs
1. des fourches pour indiquer la parallélisation possible de traitements du fait de leur indépendance

### Décisions

Une décision se représente sous la forme d'un petit losange.

![Exemple 1](images/activity_6.jpg)

Dans l'exemple ci-dessus, on remarque plusierus choses :
* les nœuds d'objets n'ont pas été représenté, ce qui est courant dans les diagrammes ;
* les « gardes » (`Guard`) qui indiquent les cas de figures possibles pour la décision sont indiqués entre crochets sur la branche elle-même ;
* en cas de non-conformité, on ajoute une « fin de flux » différente de la fin “normale” de l'activité ;
* les différentes étapes de l'activité ne sont pas nécéssairement atomiques, elles peuvent elles-mêmes contenir des sous-activité (on peut imaginer que l'action `Livrer la commande` se décompose en plusieurs étapes).

UML ne dispose d'aucune représentation particulière pour les itérations qui sont, comme chacun sait des branchements arrière.  

### Forks

Une activité peut comporter des branches indépendantes connues sous le nom de « fork » (fourche).
Une fourche permet de séparer une activité en plusieurs éléments distincts qui pourront être réassemblés pr l'intermédiaire d'un « join » (jointure).

![Exemple 1](images/activity_9.jpg)

Dans le diagramme ci-dessus, les fourches (et les jontures) sont représentées sous forme de barres horizontales.
L'activité comporte deux composantes séparées, qui peuvent être exécutées parallèlement.
Nous introduisons aussi des « connecteurs », sous forme de cercles etiquettés, qui permettent de soulager les diagrammes de liens trop nombreux et qui pourraient se superposer.

## Cadres (frames), sous-activités, fractions

Une activité peut out à fait être encapsulée dans une unité d'abstraction appelée « frame ». (`Frame`)

![Exemple 1](images/activity_7.jpg)

Dans l'exemple ci-dessus, nous voyons que le cadre est représenté sous la forme d'un rectangle muni d'une petite étiquette portant son nom.

Un nœud d'objet est indiqué franchissant le bord du rectangle.
Cela indique (dans le cas présent) que l'abstraction admet des paramètres d'entrée.
Il pourrait exister la même chose en sortie.
Globalement, un cadre pourrait être assimilé à une fonction, au sens d'un langage de programmation.

Une fois l'abstraction créée, elle peut naturellement être invoquée dans un autre diagramme.

![Exemple 1](images/activity_8.jpg)

Ci-dessus, nous voyons que nous avons transformé légèrment le diagramme 6 en indiquant que l'action « Livrer la commande » est une sous-activité de nom “Shipping”.
Le petit symbole en bas à droite signale l'imbrication. 

### Fractions et lignes de nage

Dans certains cas, on souhitera mettre en évidence que l'activité est répartie.
Typiquement, plusieurs acteurs (au sens des cas d'utilisation) doivent intervenir et coopérer pour réaliser l'activité.
Dans ce cas, il est possible de représenter des « lignes de nage » qui séparement des parties du processus.
Cette représentation n'est pas très éloignée des diagrammes de qéquence ou de collaboration, mais est moins orientée vers les signaux et l'aspect asynchrone des applications.

![Exemple 1](images/activity_11.jpg)

Dans l'exemple ci-dessus, nous avons voulu représenter que la réalisation d'une commande est le fruit de la collaboration de trois acteurs différents, le “Client”, le “Préparateur” et le “Comptable”.
Les lignes de nage nous permettent de distinguer précisément ce qui est du ressort de chacun des acteurs.
Cela peut avoir des conséquences en termes d'implémentation des classes du domaine, voire des droits d'accès aux différents modules de l'aplication achevée.
Dans les cas d'utilisation, on reprérera souvent celui qui est l'acteur principal, c'es-à-dire celui qui cherche à réaliser un certain objectif.
Il n'est pas clairement spécifié ici, mais onpeut noter que c'est le “Client” qui détient le jeton initial.
Nous supposerons alors que c'est lui qui est l'acteur principal.
Nous voyons aussi qu'il existeun objet partagé entre les “Comptable” et le “Client” et qui est la facture.

Dans ces cas plus complexes, on peut imagnier que les lignes de nage soient bi-dimensionnelles pour prendre en compte dux types de fractions différentes, commes des acteurs d'un côté et des infrastructures de l'autre.
Nous pourrions même, en théorie, imaginer des dimensions supplémentaires, mais qui deviendraient très difficciles à représenter sous forme de diagramme.     