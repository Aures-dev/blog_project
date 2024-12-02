
---

## Tâche : Intégration d'un Blog avec Système de Téléchargement et d'Affichage de Fichiers PDF dans une Application Laravel avec Blade et Authentification

### Objectif
L'objectif de cette tâche est de permettre aux utilisateurs authentifiés de rédiger des articles ou d'uploader des fichiers PDF contenant des articles, qui seront ensuite affichés sur le site. Les utilisateurs pourront lire le contenu du PDF ou de l'article directement dans l'application, et le télécharger si besoin.

### Instructions

1. **Configurer l'authentification Laravel**
   - Utilisez la commande artisan pour générer les vues et routes d'authentification.
   - Exécutez les migrations pour créer la table des utilisateurs.
   - Assurez-vous que seules les personnes authentifiées peuvent accéder aux fonctionnalités de création et d'upload d'articles.

2. **Créer une migration pour la table des articles**
   - Créez une migration pour la table `articles` avec les colonnes suivantes :
     - `id` : identifiant unique.
     - `title` : titre de l'article.
     - `image` : l'image de couverture de l'article.
     - `content` : contenu de l'article (si rédigé directement dans l'application).
     - `file_path` : chemin du fichier PDF (si un fichier est uploadé à la place d'un contenu rédigé).
     - `user_id` : ID de l'utilisateur ayant rédigé ou uploadé l'article.
     - `created_at`, `updated_at` : dates de création et de mise à jour de l'article.
   - Exécutez la migration pour créer la table dans la base de données.

3. **Créer un modèle Eloquent**
   - Créez un modèle Eloquent nommé `Article` qui interagira avec la table `articles`.
   - Définissez la relation entre `Article` et `User`, car chaque article est associé à un utilisateur.

4. **Créer un contrôleur**
   - Créez un contrôleur nommé `ArticleController`.
   - Ajoutez une méthode pour afficher un formulaire permettant de rédiger un article ou d'uploader un fichier PDF.
   - Ajoutez une méthode pour gérer l'upload du fichier PDF :
     - Vérifiez que le fichier est bien un PDF.
     - Stockez-le dans le répertoire `storage/app/public/articles`.
     - Enregistrez les informations de l'article (titre, chemin du fichier ou contenu de l'article) dans la base de données.
   - Ajoutez une méthode pour récupérer et afficher la liste des articles.

5. **Configurer les routes**
   - Ajoutez des routes dans `routes/web.php` pour les actions suivantes :
     - Afficher le formulaire de rédaction ou d'upload d'un article (GET).
     - Soumettre un nouvel article (POST).
     - Afficher la liste des articles (GET).
     - Téléchargement du PDF (GET).

6. **Créer les vues Blade**
   - Créez une vue Blade pour afficher le formulaire de création d'un article :
     - Incluez des champs pour le titre, le contenu de l'article (si rédigé),un champ pour uploader un fichier PDF et un champ pour l'image de couverture.
   - Créez une vue pour lister les articles disponibles avec la possibilité de les télécharger ou de lire le contenu.
   - Créez une vue pour afficher un articles. Si le contenu de l'article est le PDF, afficher ce dernier via un iframe intégré.

7. **Gérer le téléchargement des PDF**
   - Ajoutez une option permettant aux utilisateurs de télécharger le fichier PDF en cliquant sur un lien ou un bouton associé à chaque article.

8. **Tester l'intégration** (Bonus)
   - Vérifiez que l'upload des fichiers PDF fonctionne correctement et que les articles sont bien enregistrés dans la base de données.
   - Testez l'affichage des articles et assurez-vous que les utilisateurs peuvent les lire ou télécharger les fichiers PDF.

### Critères d'évaluation
- **Fonctionnalité** : Les utilisateurs doivent pouvoir rédiger ou uploader des articles, lire le contenu et télécharger des fichiers PDF.
- **Code** : Le code doit être bien structuré, commenté et respecter les bonnes pratiques de développement Laravel.
- **Documentation** : Fournissez des commentaires dans votre code expliquant chaque étape importante.

---