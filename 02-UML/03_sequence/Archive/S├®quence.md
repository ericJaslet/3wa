# Diagramme de séquence

| Catégorie | Vue |
|---|---|
| Interaction | Processus |

## Introduction

Les diagrammes de séquences sont un des modes possibles de diagrammes d'interactions.
Le diagramme de séquence permet de modéliser les interactions entre les acteurs ors duedéroulement d'un scénario ou d'un cas d'utilisation.
Les séquences réduisent les opérations au minimum,ne laissant apparâitre que les messages qiu sont échangés.
Ce type de diagramme modélise la dimension asynchrone des applications.

## Eléments des diagrammes de séquence

### Ligne de vie

Comme tous les diagrammes d'interaction, la base réside dans la « ligne de vide », qui est la représentation temporelle du comportement d'un acteur.
Les séquences sont donc centrées autour des acteurs et des messages qu'ils s'échangent.
Dans le diagramme ci-dessous,par exemple, nous représentons un scénario dans lequel un client veut commander un livre chez un libraire.

![Exemple 1](images/sequence_1.jpg)

Le diagramme est dans un cadre.
L'étiquette assciée au cadre précise le nom de la séquence (éventuellement un cas d'utilisation), ainsi que le préfixe **`sd`**, pour (`Sequence Diagram`).
Comme on le remarque, les lignes de vie ne se terminent pas par un état donné, comme les activités.
La terminaison, comme nous le verrons, est indiquée par un message.


### Message

L'autre composante indipensable des séquences est l'ensemble des **messages**.
Ceux-ci peuvent ête de plusieurs types :

| nom  | signification |
|---|---|
| syncCall | message synchrone, peut être assimilé à un envoi de message si l'on parle de programmation oriéntée objet et qui nécessite une réponse  |
| asyncCall | message asynchrone, peut être considéré comme un appel de fonction asynchrone |
| asyncSignal | signal (asynchrone), peut être perçu comme le déclenchement d'un événement qui serait écouté par certains obkets de l'application |
| createMessage | message de création d'une nouvelle ligne de vie |
| deleteMessage | message de suppression d'une ligne de vie existante |
| reply | réponse à un message synchrone |

De plus, un message peut avoir les statuts suivants :

| nom  | signification |
|---|---|
| complete | message achevé, à la fois émis et reçu |
| found |  message reçu, mais dont l'origine est hors du diagramme (ce qui peut recouvrir tout un éventail de situations) |
| lost | message envoyé, mais dont le récepteur n'est pas connu 

Un message porte également une **signature**, qui peut être une opération (`Operation`) ou un signal (`Signal`).
* Les **opérations** sont généralement des comportements d'objets des classes du domaine, assimilables à des fonctions.
* Les **signaux** sont des comportements asynchrones, qui correspondent dans des classes à des comportements nommés « réceptions » (`Reception`), que l'on pourrait plutôt appeler « écouteurs ».

Enfin, il existe des « portails » (`Gate`) qui permettent de représenter une sortie de la séquence.

Dans l'exemple ci-dessous, un objet `Client` envoie un message à un objet `Libraire` afin de savoir si un livre est disponible ou non.
* La forme de la flèche nous indique que le message est _synchrone_ ; il est associé à une réponse ;
* Un bloc apparaî sur la ligne de vie du `Libraire` pour marquer le temps entre le message et la réponse
* Comme le message est synchrone, sa signature (`isAvailable(id)`) est une `Operation` qui est une fonction de la classe des `Client`.
* Cette fonction admet un argument, ici l'identifiant du livre recherché
* Nous indiquons dans la réponse la sémantique de la valeur retournée
* Tous les messages sont étiquetés par un numéro d'ordre

![Exemple 2](images/sequence_2.jpg)

On peut imaginer que le libraire lui-même interroge une base de données pour connaître la quantité d'exmplaires disponibles chez l'éditeur.
L'éditeur est représentéé dans l'application par la classe `Editeur`.
Cette classe pourrait encapsuler un « proxy » pour le site (externe) de l'éditeur.
Dans ce cas (cf. Exemple 3 ci-dessous), nous souhaiterions représenter un message asynchrone. 

![Exemple 3](images/sequence_3.jpg)

> N.B. : Pour être tout à fait conforme à UML, les messsages asynchrones ne devraient pas accepter de réponses. Néanmoins, nous sentons bien que dans les applications web modernes où il est beaucoup question d'API, une requête peut attendre une réponse sans être bloquante pour autant. Il y a là des nuances sémantiques entre la norme UML et les usages dans des langages comme JavaScript, typiquement. 

Une fois que l'interaction est terminée, nous indiquons que nous sortons du cadre qui la définit.

![Exemple 4](images/sequence_4.jpg)

Dans l'exemple ci-dessus, nous ajoutons également un message de statut `found` (search(id)) pour montrer que la séquence commence par un message provenant d'un autre scénario. 
L'émetteur du message n'est pas spécifié dans le cadre de cette séquence.
De notre point de vue, il est réputé “inconnu”.

### Nœuds

En dehor des messages, les lignes de vie peuvent porter différents nœuds qui expriment des traitements effectués au cours de la séquence.

#### Invariants d'état

Les invariants d'état permettent de de présenter des contraintes de valeurs qui s'appliquent à la séquence « pendant un certain temps ».

#### Fragments

Les fragments représentent toute une sériede traitements possibles à un moment donné du parcours d'une ligne de vie.
Ces traitements viennent s'intercaler entre les échanges de messages.
Les fragments peuvent eux-mêmes être décomposés en deux grandes catégories :
* les imports d'interactions (`InteracationUses`)
* les fragments combinés (`CombinedFragments`)

##### Les imports

Un import est simplement la marque d'une interaction insérée, en tant qu'abstraction dans le déroulement de la séquence.
Il est repéré par un rectangle dont l'étiquette porte le mot-cvlef **`ref`**. 

![Exemple 5](images/sequence_5.jpg)

Dans l'exemple ci-dessus, nous représentons le début d'un scénario d'achat de livr chez un libraire.
La première étape est d'exécuter une séquence, telle que celle vue plus haut, qui vérifie la disponibilité, chez l'éditeur, du livre qui intéresse le client.  
* Nous indiquons au passagge que la séquence importée devrait retourner un entier
* La séquence importée est commune aux lignes de vie du client et du libraire. Cela indique queles objets que nous utilisons dans la séquence `Availability` sont les mêmes que ceux de la séquence principale.

##### Fragments combinés

Les fragments combinés permettent de représenter un certain nombre de structures de contrôle de la séquence.
On recense :
* **`alt`** : permet de représenter des sous-séquences alternatives en fonction d'un critère donné ; c'est grosso modo une conditionnelle
* **`opt`** : désigne un fragment optionnel, la sous-séquence peut ne pas se produire (un message non envoyé, par exemple)
* **`break`** : représente une interruption de la séquence en cours, généralement sous une contrainte donnée
* **`par`** : indique que différentes sous-séquences peuvent être exécutée en parallèle
* **`seq`** : signale que l'ordonnacement des sous-séquences est “faible”
* **`strinct`** : signale que l'ordonnancement des sous-séquences est “strict”
* **`critical`** : signale une séquence critique ; une séquence critique ne peut être entrelacée avec une autre séquence sur toutes les lignes de vie qu'elle couvre
* **`consider`** : spécifie quels types de message soivent être pris en compte dans la porté des sous-séquences
* **`ignore`** : inverse de **`consider`**
* **`loop`** : indique qu'un ensemblede sous-séquences doivent être répétées (généralement avec une limite donnée)

##### Continuations

Les continuations indiquent que le système est dans un certain état (un peu comme un invariant) à la fin d'un fragment.
Les continuations peuvent couvrir plusieurs lignes de vie.
Par la suite, seules les fragements des lignes de vie concernées qui commencent par cette continuation (ou aucune) peuvent être exécutées.

#### Contraintes

Les quéquences étant principalement des descriptions temporelles, il est quelquefois utile d'indquer des contraintes de temps, en particulier lors de traitements asynchrones (mais pas que).

## Ressources

[Exemples de diagrammes de séquence](https://cian.developpez.com/uml/tutoriel/u2_sequence/#L1.2)