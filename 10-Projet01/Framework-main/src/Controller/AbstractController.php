<?php

namespace Souris\Controller;

use Souris\Container\Container;

/**
 * Class AbstractController
 * @package Souris\Controller
 */
abstract class AbstractController
{
    /**
     * AbstractController constructor.
     * @param Container $container
     */
    public function __construct(protected Container $container)
    {
    }

    /**
     * @param string $view
     * @param array $params
     * @return mixed
     */
    public function render(string $view, array $params = [])
    {
        $twig = $this->container['twig'];

        $baseTwig = $this->findBaseTwig($twig, get_class($this), debug_backtrace()[1]['function']);

        $template = $twig->load($this->container['config'][$baseTwig]);
        $template = $twig->load($view);

        return $template->render($params);
    }

    /**
     * @param $twig
     * @param $class
     * @param $method
     * @return string
     */
    private function findBaseTwig($twig, $class, $method)
    {
        $class = explode('\\', $class);
        $class = end($class);
        $baseTwig = $class . '.' . $method;

        return  isset($this->container['config'][$baseTwig]) ? $class . '.' . $method : 'default';
    }
}
