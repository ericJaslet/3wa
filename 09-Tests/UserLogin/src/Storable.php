<?php

namespace UserLogin;

Interface Storable
{
    public function addStorage():void;
    public function getStorage():array;
}