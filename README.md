<h1>PROJET "OWLYMPIAD"</h1>

> 💡 L’implémentation de la base de données est libre. Des caractéristiques sont spécifiées, mais tu ordonnes ta BDD comme tu le souhaites. Tu peux rajouter des fonctions si tu le souhaites / à le temps.</p>

<h3>Objets</h3>
<h4>Jeux de société</h4>
Champs :
<li>Libre à toi sur le modèle, tu peux rajouter des champs au fur et à mesure</li>
<li><strong>OBLIGATOIRE</strong> : type (select ou multiselect), nom, identifiant UNIQUE, une
image (pour gérer l’upload)</li>
<br>
Relation (expliquer pourquoi ce choix lors de la présentation, il n’y a pas un meilleur choix qu’un autre) :
<br>
<li>Soit en mode banque de données avec tous les jeux et lié à un ou plusieurs utilisateurs</li>
<li>Soit chaque joueur créé son jeu et il est ajouté dans la base de données, un jeu = un utilisateur</li>
<h4>Utilisateur</h4>
Avec système de création / suppression de compte
L’email doit être unique
Projet Ju 2
Différents rôles (au moins admin et users)
<h4>Réservations</h4>
Lie un utilisateur avec un (ou plusieurs ?) jeu de société au choix
Mettre une date de début, date de fin de réservation
<h4>Échange</h4>
Donner la possibilité a deux joueurs d’échanger / donner leurs jeux, via un
système de notifications et d’acceptation ou non de l’échange
<h3>Fonctionnalités souhaitées</h3>
<li>Création de compte
<li>Connexion / Déconnexion
<li>Voir, ajouter, modifier, supprimer mes jeux
<li>Voir, modifier mes informations
<li>Supprimer mon compte et les jeux associés
<li>Voir les jeux autour de chez moi
<li>Voir les jeux d’un utilisateur
<li>Demander une réservation d’un jeu à un autre utilisateur
<li>Demander un don d’un jeu à un autre utilisateur
<li>Rechercher un jeu spécifique
<li>Utilisation de filtres pour rechercher des jeux (selon les champs mis dans les
jeux)
<li>Voir mes notifications (demande d’échanges et de don)
Accepter ou non un don et un échange
