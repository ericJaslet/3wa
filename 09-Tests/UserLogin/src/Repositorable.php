<?php

namespace UserLogin;

use UserLogin\Entity;

interface Repositorable
{
    public function findOne():Entity;
}