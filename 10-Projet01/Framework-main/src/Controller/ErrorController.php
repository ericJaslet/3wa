<?php

namespace Souris\Controller;

/**
 * Class ErrorController
 * @package Souris\Controller
 */
class ErrorController
{
    /**
     * @return string
     */
    public function page404()
    {
        return "Erreur 404 : page non trouvée !!!";
    }
}
