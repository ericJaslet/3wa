<?php

namespace Souris\HttpFondation;

class Request
{
    private array $query;
    private array $post;
    private array $server;

    public function __construct()
    {
        $this->query = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }


    
    public function getServer(string $key = '')
    {
        if ($key){
            return $this->server[$key];
        }
        return $this->server;
    }

    public function getPost(string $key = '')
    {
        if ($key){
            return $this->post[$key];
        }
        return $this->post;
    }

    public function getQuery(string $key = '')
    {
        if ($key){
            return $this->query[$key];
        }
        return $this->query;
    }


}