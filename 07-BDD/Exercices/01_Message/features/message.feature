# language: fr
Fonctionnalité: ma super classe Message
  Afin de gérer des messages simples en majuscule
  En tant que utilisateur
  Je dois être capable d'effectuer des opérations basique avec ma classe

Scénario: Avoir un message valide
    Etant donné que j'ai un nouveau message "bonjour tout le monde"
    Alors je dois avoir "BONJOUR TOUT LE MONDE"

Scénario: Avoir un message non valide
    Etant donné que j'ai un nouveau message "17"
    Alors je dois avoir une exception "InvalidArgumentException"

Scénario: Avoir un message concaténé
    Etant donné que j'ai un nouveau message "bonjour"
    Et un deuxième message "le monde"
    Alors je dois avoir "BONJOUR LE MONDE"