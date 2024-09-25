# Laravel Invoices API

Ce projet Laravel fournit une API simple pour gérer des factures avec une fonctionnalité de pagination.

## Installation

1. **Clone le dépôt** :

   ```bash
   git clone https://github.com/Steve-Project/testInvoiceAPI.git


Faire un composer install

Copie le fichier .env.example en .env

Générer la clé : php artisan key:generate

Faire la migration : php artisan migrate

Ajouter des données : php artisan db:seed

Utilisation :
Route GET /api/invoices

Cette route renvoie une liste paginée de factures.

    URL : /api/invoices
    Méthode : GET
    Paramètres :
        page: numéro de la page (facultatif, par défaut 1)

Exemple de requête


curl -X GET "http://localhost/api/invoices?page=2"

Tests

Pour exécuter les tests unitaires, utilise la commande suivante :

php artisan test

Assurez-vous que votre base de données de test est correctement configurée dans le fichier .env.testing.
