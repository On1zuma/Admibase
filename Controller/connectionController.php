<?php

// require_once 'Model/admin.php';
require_once '../Model/admin.php';

// require_once '../Vue/Vue.php';
// require_once '../Controller/FormController.php';
class FormController
{
    public function __construct()
    {
    }

    public function handleFormSubmission($username, $password)
    {
        // Récupérer les données du formulaire

        // Valider les données
        if ($this->validateFormData($username)) {
            // Appeler le modèle pour gérer les données
            $model = new Admin();
            $model->connectUser($username, $password);
        // Rediriger l'utilisateur vers une page de confirmation
        } else {
            // Afficher une erreur si les données ne sont pas valides
            echo "Les données du formulaire ne sont pas valides !";
            exit();
        }
    }

    private function validateFormData($data)
    {
        return true;
        // Valider les données du formulaire ici
        // Retourner true si les données sont valides, false sinon
    }
}
