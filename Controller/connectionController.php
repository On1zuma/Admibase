<?php
require_once 'Model/admin.php';

class FormController {
    
    public function __construct() {
    }
    
    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $data = $_POST;
            
            // Valider les données
            if ($this->validateFormData($data)) {
                // Appeler le modèle pour gérer les données
                $model = new Admin();
                $table = $model->connectUser($_POST["username"], $_POST["password"]);
                Vue::montrer('public/list-table', $table);
                // Rediriger l'utilisateur vers une page de confirmation
            } else {
                // Afficher une erreur si les données ne sont pas valides
                echo "Les données du formulaire ne sont pas valides !";
                exit();
            }
        }
    }
    
    private function validateFormData($data) {
        // Valider les données du formulaire ici
        // Retourner true si les données sont valides, false sinon
    }
}