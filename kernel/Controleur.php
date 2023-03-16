<?php

final class Controleur
{
    private $_A_urlDecortique;

    private $_A_urlParametres;

    private $_A_postParams;

    public function __construct($S_url, $A_postParams)
    {
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }
        $A_urlDecortique = explode('/', $S_url);
        //  Controleur / Action

        if (!empty($A_urlDecortique[0])) {
            $S_controleur = $A_urlDecortique[0];
            if (!empty($A_urlDecortique[1])) {
                $S_action = $A_urlDecortique[1];
            } else {
                $S_action = null;
            }
        } else {
            $S_controleur = null;
        }

        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_urlDecortique['controleur'] = 'ControleurHelloworld';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_urlDecortique['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->_A_urlDecortique['action']  = $S_action . 'Action';
        }
        // var_dump($this->_A_urlDecortique['action']);


        // on dépile 2 fois de suite depuis le début, c'est à dire qu'on enlève de notre tableau le contrôleur et l'action
        // il ne reste donc que les éventuels parametres (si nous en avons)...

        // var_dump($this->_A_urlDecortique['action']);

        // ...on stocke ces éventuels parametres dans la variable d'instance qui leur est réservée
        $this->_A_urlParametres = $A_urlDecortique;

        // On  s'occupe du tableau $A_postParams
        $this->_A_postParams = $A_postParams;
    }

    // // On exécute
    // public function executer()
    // {
    //     //fonction de rappel de notre controleur cible (ControleurHelloworld pour notre premier exemple)
    //     call_user_func_array(array(new $this->_A_urlDecortique['controleur'](),
    //         $this->_A_urlDecortique['action']), array());
    // }

        // On exécute notre triplet


    public function executer()
    {
        // try {
        if (!class_exists($this->_A_urlDecortique['controleur'])) {
            throw new ControleurException($this->_A_urlDecortique['controleur'] . " n'est pas un controleur valide.");
        }
        // var_dump($this->_A_urlDecortique['action']);
        if (!method_exists($this->_A_urlDecortique['controleur'], $this->_A_urlDecortique['action'])) {
            throw new ControleurException($this->_A_urlDecortique['action'] . " du contrôleur " .
                $this->_A_urlDecortique['controleur'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_A_urlDecortique['controleur'](),
            $this->_A_urlDecortique['action']), array($this->_A_urlParametres, $this->_A_postParams ));

        if (false === $B_called) {
            throw new ControleurException("L'action " . $this->_A_urlDecortique['action'] .
                " du contrôleur " . $this->_A_urlDecortique['controleur'] . " a rencontré une erreur.");
        }
        // }
        // catch(Exception $e) {
        //     var_dump($this->_A_urlDecortique);
        // }
    }
}
