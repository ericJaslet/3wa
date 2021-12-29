<?php

namespace Souris\Controller;

use Souris\Container;

abstract class AbstractController
{
    public function __construct(protected Container $container)
    {
    }

    public function render(string $view, array $params = [])
    {
        //A refacto
        $twig = $this->container['twig'];
        $class = explode('\\', get_class($this));
        $class = end($class);
        $method = debug_backtrace()[1]['function'];
        $baseTwig= $class.'.'.$method;
        $baseTwig = isset($this->container['config'][$baseTwig]) ? $class.'.'.$method : 'default';
        //
        
        $template = $twig->load($this->container['config'][$baseTwig]);
        $template = $twig->load($view);
        echo $template->render($params);
    }
}
