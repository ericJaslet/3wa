<?php

namespace Souris\HttpFondation;

/**
 * Class Request
 * @package Souris\HttpFondation
 */
class Request
{
    /**
     * @var array
     */
    private array $query;

    /**
     * @var array
     */
    private array $post;

    /**
     * @var array
     */
    private array $server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->query = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }

    /**
     * @param string $key
     * @return array|mixed
     */
    public function getServer(string $key = '')
    {
        if ($key) {
            return $this->server[$key];
        }

        return $this->server;
    }

    /**
     * @param string $key
     * @return array|mixed
     */
    public function getPost(string $key = '')
    {
        if ($key) {
            return $this->post[$key];
        }

        return $this->post;
    }

    /**
     * @param string $key
     * @return array|mixed
     */
    public function getQuery(string $key = '')
    {
        if ($key) {
            return $this->query[$key];
        }

        return $this->query;
    }
}
