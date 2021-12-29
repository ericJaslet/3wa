<?php

namespace Souris\Controller;

class ErrorController
{
    public function page404()
    {
        header("HTTP/1.1 404");
        header("Content-Type: text/html, charset=UTF-8");
        echo "Error 404";
    }
}