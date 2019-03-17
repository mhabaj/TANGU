# TANGU









Génie Logiciel
Feuilles de marque pour tir à l’arc
Nom du projet : TANGU

 


Table des matières

I.	Introduction	1
II.	Présentation du projet	1
III.	Organisation du projet	2
Dans cette partie nous verront :	2
A.	Les choix du cycle de vie.	2
B.	Les ressources utilisés (Matérielle, logicielle)	2
C.	Les rôles et responsabilités de chacun dans le projet.	3
D.	Identification des risques et les mesures prises pour les éviter.	4
IV.	Planning et exécution du projet :	4
V.	Documentation-Tests-Conventions de codage	12
A.	Documentation :	12
B.	Tests :	13
C.	Conventions de codage :	13
VI.	Bilan du projet	13
VII.	Annexes	15



 
I.	Introduction
Durant l’enseignement Génie logiciel de la L2 informatique, nous avons été amenés à gérer la création et le déroulement d’un projet au long du semestre. 
Le 25 Septembre, Monsieur Thierry Brouard, le « Product Owner », nous a proposé le back log de l’application « Feuilles de marque pour tir à l’arc ». Nous avons trouvé ce projet très intéressant pour diverses raisons : d’abord l’aspect de personnalisation de compte avec l’ajout d’arc et de blason, ensuite la récupération des valeurs de tirs et l’affichage dynamique des résultats et enfin la plateforme web.
L’équipe était presque déjà formée (On a déjà travaillé l’an dernier) et s’est complété avec l’adhésion de Matthias Brown.
Ainsi, nous nous sommes mis au travail afin de délivrer ‘TANGU’ au client en mettant tout en œuvre afin de respecter le DEADLINE indiqué.
II.	Présentation du projet
Cette première partie portera sur l’analyse du Back log du projet fourni par le Product Owner*. 
Cette application sera amenée à enregistrer les performances des entrainements de tir à l’arc afin d’optimiser sa progression à travers le stockage de scores, d’entrainements et de calcul de statistiques. On souhaitera en effet obtenir des statistiques des tirs passés et l’évolution de certains variables clés.
L’application est ciblée Smartphone/tablette : 
 On aura un seul type d’utilisateur : L’archer en question utilisant l’application pendant ses sessions d’entrainements (On doit donc privilégier la portabilité et les entrainements potentiellement mais rarement hors zones de couverture données internet.)
Un nouvel archer sera amené à s’enregistrer et se connecter à son compte. A partir de ce point, il pourra commencer par :
Créer un nouvel arc en précisant le nom de l’arc, son poids, taille et d’autres caractéristiques clefs.
Créer un nouveau blason en précisant ses caractéristiques.
Mettre à jour son profil pour indiquer le nom de son club s’il le souhaite par exemple.
Du moment où il a ajouté au moins les informations sur l’arc et le blason, il pourra commencer un nouvel entrainement. 
Ce nouvel entrainement est caractérisé par son nom, la distance, adresse, date, équipements utilisés et sa formule de tir (nombre de séries, volées/série et flèches/volée).
La création va déclencher l’entrainement. Il va saisir les points qu’il a eu à chaque tir jusqu’à finir ses séries.
A la fin de chaque volée/série, il pourra consulter ses statistiques avec sa moyenne par volée, le pourcentage moyen de flèches en zone 9 et en zone 10. Toutes ces valeurs seront ensuite retrouvables sur un graphique.
Finalement il ne restera plus qu’à implémenter le programme en forme d’application Android.
Le back log est donc très précis et clair sur les fonctionnalités attendues.
III.	Organisation du projet
Dans cette partie nous verront : 
A.	Les choix du cycle de vie (et pourquoi ?)
B.	Les ressources utilisés (Matérielle, logicielle)
C.	Les rôles et responsabilités de chacun dans le projet
D.	Identification des risques et les mesures prises pour les éviter

A.	Les choix du cycle de vie.
Pour notre cycle de vie, nous avons choisi SCRUM pour son côté libre et flexible par rapport à l’équipe de développement. Nous l’avons trouvé plus adapté au projet dans le sens où nous seront amenés à utiliser plusieurs langages et outils qui sont connus par certains et pas les autres, cela permet de faire tourner les taches en faisant profiter au programme des compétences de tous sans gêner l’organisation prévu.
B.	Les ressources utilisés (Matérielle, logicielle)
Ayant choisi Scrum, il était évident qu’on allait privilégier un contact très rapproché dans la Scrum Team. Grace aux moyens mis à dispositions par l’université, nous avons très souvent utiliser des salles libres pour effectuer des taches allant du Daily Scrum jusqu’à la conception des modules et l’organisation des sprints.
Ensuite il était nécessaire d’utiliser des AGL pour la conception-modélisation des bases de données, sprints et conceptions de code.
Pour la gestion du projet, l’essentiel était fait sur des éditeurs de texte et des tableurs (pour les documents illustrant les sprints par exemple). 
Nous avons travaillé très souvent ensemble (à l’université comme dit précédemment) mais aussi utilisé des logicielles tel que Discord, Slack. 
Pour la gestion des fichiers, on utilise Mega.nz pour soumettre les versions stables et d’autres fichiers de gestion. Et pour le versionning, on utilise GitHub (Parce que c’est pratique en groupe) avec des branches différentes pour chacun permettant de pouvoir aller chercher les dernières versions publiées de chaque fichier ou même retrouvés d’anciens fichiers utiles.
Langages utilisés : HTML, CSS responsive, PHP, MYSQL, JavaScript, Ajax, Java.
Framework et plateformes utilisés : StarUML, PHP Storm, WampServer, Android Studio, Power Designer, Bootstrap, Swiper Javascript et d’autres bibliothèques javascript pour les graphes. 
C.	Les rôles et responsabilités de chacun dans le projet.
Scrum Team:
Product Owner/Encadrant:  	Thierry Brouard
Scrum Master		          	Mahmod Alhabaj
Development Team:            	-Tom Belda 
-Mahmod Alhabaj
-Matthias Brown      
- Mohamad-Ali Dakroub         
- Gérard Doglobe

Il est vrai que chaque membre va toucher au moins une fois à chaque principe (code, organisation, docs, tests). Néanmoins, chacun possède quand même un titre caractérisant son rôle dominant et ses points forts pour savoir à qui avoir recours en présence de problèmes. 
Les tâches sont : Analyse, Documentation, Développement, Tests, Design.
L’analyse des différentes parties a toujours était faite en groupe. Il n’y a donc pas vraiment de responsable. 
Mahmod Alhabaj : Scrum Master, développeur, éditeur de documents.
Matthias Brown : Développeur et graphiste.

Tom Belda : Editeur de documents, testeur. 

Mohamad Ali Dakroub : graphiste.
Gérard Doglobe : Graphiste.
 

D.	Identification des risques et les mesures prises pour les éviter.
Afin de faciliter la gestion des risques, nous avons essayé de prévoir ce qu’allait nous poser un problème pendant les différents sprints en assignant un niveau de criticité en fonction de la probabilité-gravité-déterminabilité. 


Ce tableau nous permettra ensuite de mieux nous organiser et de prévoir le temps nécessaire pour régler chaque problème lors de la planification.
IV.	Planning et exécution du projet :
Pour réaliser TANGU, nous avons opté pour une solution à 3 Sprints.
Voici comme indiqué dans le document comment ils vont se dérouler :
Le Sprint tracker explique donc que nous aurons 3 Sprints. Le premier débutera le 18 octobre et va durer 6 jours. 
Le sprint 1 comprend : 
	La conception, programmation, documentation et testes de l’Espace User. C’est-à-dire qu’on sera capable de créer un utilisateur, ce qui implique une base de données bien définie. (Tache à réaliser en 2 jours.
	On pourra créer de nouveaux arcs, Blasons nécessaires à l’entrainement (tache à réaliser en 3 jours)
	Finalement l’onglet PERSONNALISER regroupant tout ce qui a était fait précédemment (tache réalisée en 3 jours).  
Après la conception de ce sprint, nous avons abouti à ces schémas :
 
Nous avons aussi mis en place un diagramme de classe pour User, Arc et Blason :
MLD de la Base de données :
Diagramme de cas d’utilisation :
Bien entendu, ces diagrammes/MLD sont susceptibles de changer avec le temps en fonction de nos besoins. 
Le Sprint 2 comprend :
	L’ajout d’un nouvel entrainement avec des caractéristique propres tel que le nom, la date, le matériel utilisé, distance, ainsi que le nombre de séries, volées et flèches. 
	L’accès à une liste avec tous nos entrainements passés. On pourra consulter chaque entrainement pour voir nos scores/performances.
	La partie profile avec la possibilité de changer son nom d’utilisateur et son mot de passe. Et aussi d’ajouter quelques détails optionnels comme le nom de son club.
Pour effectuer ces actions, il suffit d’utiliser les méthodes déjà crées dans la classe User par exemple.
 
Finalement, le 3ème Sprint est celui qu’on considère le plus long à faire.
En effet, 15 jours sont requis pour qu’on arrive à apporter une solution présentable au client, permettant de calculer et surtout modéliser ses performances. 
La difficulté dans ce sprint était de savoir comment manipuler des graphiques avec plusieurs variables et modéliser des fonctions. En effet, nous n’avons pas eu de cours sur JavaScript.
Nous avons donc opté pour un Framework JavaScript en ligne nous permettant de créer des graphiques avec des valeurs et paramètres données. 
En prenant donc le temps d’analyser le fonctionnement de ce Framework et ses interactions avec notre Template et base de données, nous avons décidé de l’intégrer. Nous avons pris quelques jours pour nous former, ce qui était bien évidemment inclus et prévue dans la phase de planification
Voici donc un schéma montrant notre vision des graphs :



Bien que ce schéma soit minimaliste, il nous donne une idée très claire et précise de comment se déroulent les calculs.
D’autres Documents annexes seront mis à disposition dès que nous aurons avancé sur ce sujet.








Finalement, nous auront obtenu un site qui valide approximativement la maquette réalisée au début pendant la phase de planification et de préparation.
P.S : Certains options on étaient changées au cours de la phase de développement car ils ont un impact négatif sur la fluidité du site sur smartphone.

V.	Documentation-Tests-Conventions de codage
A.	Documentation :
La documentation Technique s’est faite à travers l’utilisation de PHP Storm. 
Pour le moment, en raison de manque de temps, nous avons choisi de documenter la classe Arc et la classe blason.
Nous avons d’abord commencé par la description des variables puis les méthodes avec leurs entrées/sorties respectifs. Finalement, nous avons généré la PHP Doc en utilisant Dioxygène.
Pour la documentation utilisateur, nous sommes parti pour faire un mode d’emploi et un guide rapide d’utilisation. Nous avons jugé que les autres documents ne sont pas nécessaires à TANGU. Il est assez intuitif et facile à manipuler.  
Finalement, Une charte de confidentialité et un accord d’utilisation sont nécessaires pour répondre, comme signalé précédemment dans les risques, aux utilisations malveillantes de nos services.
(On rappelle que tous les documents mentionnés sont disponibles dans les dossier annexes.) 
B.	Tests :
Nous avons commencé par faire un diagramme de flot des classes a tester. A partir de ces diagrammes, nous avons rédigé les tests pour arc et blason en essayant toutes les possibilités de valeurs.
Nous avons néanmoins eu quelques problèmes avec l’installation de phpUnit. Une fois surmonté, les tests on étaient programmés sans autres problèmes majeurs.
C.	Conventions de codage :
Nous avons appliqué les conventions de codage sur les classes que nous avons commenté (Arc et Blason).
On a appliqué les conventions de codage vus en génie logiciel : 
o	Nom de variables en anglais
o	Ecriture dromadaire
o	Pas de commentaires dans les méthodes
o	Pas de méthodes de plus de 40 lignes.
o	Pas de code en commentaire
VI.	Bilan du projet
A la fin du 3ème sprint, l’application fourni une grosse majorité des fonctionnalités demandées par le client. Néanmoins, quelques recherches et correction de bugs critiques (dans le future) feront en sorte qu’on est capable de finir à 100% entrainements et qu’on soit capable de manipuler des entrainements et calculer leurs statistiques. 
Cependant, nous n’avons pas eu le temps d’effectuer un grand nombre de tests. La partie Personnaliser (Arcs, blasons) est complètement testé. La partie Entrainement est également testé à 70-80% (Hors code non fonctionnel) pour au moins assurer la bonne exécution de la partie fonctionnelle. La partie stats n’est pas à tester, car nous utilisons un Framework externe.
Il reste également des partis graphiques non responsives et donc certainement gênantes pour certains utilisateurs.
Pour le moment, l’application peut être prochainement publié en ligne en version BETA afin d’avoir un retour des utilisateurs. Un nom de domaine et un serveur sont déjà en Standby pour héberger le site (Nous rencontrons des problèmes de lien entre BDD et le site, comme démontré pendant l’oral). Une application mobile est également en cours de réalisation.






Fiche de configuration : 
	-wamp server
	-php 7.2.10
	-MYSQL 5.7.23
	-PHPUnit 7.4.3 via Php Storm
	-Bootstrap et d’autres Framework déjà inclus dans les fichiers du projet. 
 
VII.	Annexes

La gestion du projet a été faite à l’aide de l’ensemble de documents proposés sur Celéne. On y retrouve d’explication des * bien entendu.

L’ensemble des diagrammes et des schémas sont disponibles dans l’archive du projet.  




