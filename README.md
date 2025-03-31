# custom-menu-test

Un menu personnalisé pour répondre au test de candidature SmartFire

## Fonctionnalités

Un mega-menu au clique pour les éléments qui ont des enfants
Indication visuelle de l'élément de menu actif.
Attention plusieurs éléments sont uniquement la pour "décorer la page"

## Installation & test

1. Télécharger ou cloner le dêpot Git.
2. Placer le dossier du plugin dans le répertoire `wp-content/plugins/` d'une installation d'un nouveau Wordpress.
	2.1 Attention si le plugin est ajouté sur un Wordpress déjà customisé, il est possible que les feuilles de style ne fonctionnent pas correctement.
3. Activer le plugin depuis le tableau de bord WordPress.
4. Créer une page de test avec un slug menu-test.
5. Tester le menu sur https://ton-site.fr/menu-test

## Utilisation

Essayer de cliquer sur les catégorie du menu afin de le tester.

## Librairies

	- Bootstrap 5 : je l'utilise car cela fais longtemps que j'aime bien cette librairie et elle m'aide à faire du responsive plus facilement.

## Choix techniques

J'ai utilisé une mini API REST afin de pouvoir charger le sous-menu de "About the group" notamment. 
Cela permettra de pouvoir également générer le contenu des sous-sections avec les posts adéquats.

J'ai également fait le choix de créer des menus directement dans WordPress afin de prévoir une évolution future où le client pourrait modifier à son aise les labels des menus sans impacter leur fonctionnement.

Pour ce qui est du contenu des sections j'ai décidé de faire avec des images par simplicité. 
On aurait pu imaginer la création automatique de posts possèdant une catégorie qui ensuite s'affiche suite à un appel de l'API REST.

J'ai choisi de faire le menu sous forme de plugin car j'ai l'habitude de travailler comme ça à chaque fois que je fais un dev sur-mesure. 
Je trouve que ça permet de mieux s'organiser sur plusieurs développements sur un même site ou même de pouvoir le réutiliser/adapter pour un autre.
