<?php

namespace Souris\Router;

use Souris\HttpFondation\Request;

/**
 * Class UriHandler
 * @package Souris\Router
 */
class UriHandler
{
    /**
     * @var string
     */
    private string $uri;

    /**
     * UriHandler constructor.
     * @param Request $request
     * @param array $routes
     */
    public function __construct(private Request $request, private array $routes)
    {
        $uri = explode('?', $this->request->getServer('REQUEST_URI'))[0];
        $uri = rtrim($uri, '/');
        $this->uri = $uri ? $uri : '/';
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return false|mixed
     */
    public function routeMatch()
    {
        foreach ($this->routes as $route => $routeParams) {
            if ($route === $this->uri) {
                return $routeParams;
            } elseif (isset($routeParams['pattern']) && preg_match($routeParams['pattern'], $this->uri, $regexParams)) {
                $params = [];
                foreach ($regexParams as $k => $v) {
                    if (!is_int($k)) $params[$k] = $v;
                }
                $routeParams['args'] = $params;
                return $routeParams;
            }
        }

        return false;
    }
}
