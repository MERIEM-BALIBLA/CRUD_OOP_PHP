Ce code implémente un système simple de gestion de base de données avec
des opérations CRUD (Create, Read, Update, Delete) à l\'aide de la
classe PDO pour interagir avec une base de données MySQL.

Voici un résumé des principaux éléments du code :

1.  **Classe Database :**

    -   Gère la connexion à la base de données à l\'aide de PDO.

    -   Utilise le modèle de conception Singleton pour s\'assurer
        > qu\'une seule instance de la classe Database est créée.

2.  **Classe BaseModel :**

    -   Classe de base pour d\'autres modèles de données.

    -   Contient des méthodes génériques pour effectuer des opérations
        > CRUD (insertion, mise à jour, suppression).

3.  **Classe User :**

    -   Hérite de BaseModel et représente un modèle d\'utilisateur.

    -   Définit la structure de la table \"users\" avec des propriétés
        > correspondantes aux colonnes de la table.

4.  **Utilisation de la classe User :**

    -   Crée une instance de la classe User.

    -   Initialise les propriétés de l\'utilisateur.

    -   Exécute des opérations CRUD telles que l\'insertion, la mise à
        > jour et la suppression.

5.  **Base de données et Table :**

    -   Le script contient également des requêtes SQL pour créer une
        > base de données \"task_db\" et une table \"users\" avec des
        > colonnes id, name, et age.

6.  **Commentaires :**

    -   Des commentaires ont été ajoutés pour expliquer certaines
        > parties du code, notamment l\'utilisation de PDO et le modèle
        > Singleton.

En résumé, ce code constitue une structure de base pour interagir avec
une base de données MySQL en utilisant PHP et PDO, avec des modèles de
données spécifiques comme la classe User.
