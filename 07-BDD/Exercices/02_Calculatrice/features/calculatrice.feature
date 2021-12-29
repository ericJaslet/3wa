# language: fr
Fonctionnalité:  de la classe calculatrice
  tester le fonctionnement d'une calculatrice
  En tant que utilisateur
  Je dois être capable d'effectuer des opérations basique avec ma classe

Scénario: Ajouter
  Etant donné qu'il y a 200 concombres
  Quand j'ajoute 20 concombres
  Alors je dois avoir 220 concombres

Scénario: Manger
  Etant donné qu'il y a 500 concombres
  Quand je mange 100 concombres
  Alors je dois avoir 400 concombres

Scénario: vider la memoire
  Etant donné qu'il y a 600 concombres
  Quand je mange 150 concombres
  Quand je vide la memoire
  Alors je dois avoir 0 concombres

Scénario: verifier mémoire
  Etant donné qu'il y a 200 concombres
  Quand j'ajoute 20 concombres
  Alors la mémoire est True

Scénario: voir memoire
  Etant donné qu'il y a 200 concombres
  Quand je mange 1 concombres
  Alors je dois avoir "Le résultat doit être supérieur à 200." concombres
