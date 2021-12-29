<?php

namespace App\Controller;

use Souris\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        $this->render('index.html.twig', [
            'name'  => 'Nicolas',
        ]);
    }

    public function pageTest()
    {
        $form = $this->container['form'];
        $form->add($this->container['input']);
        $submit = $this->container['input'];
        $submit->setType('submit')->setId('submit');
        $form->add($submit);

        $this->render('test.html.twig', 
            [
                'form'  => $form->formView(),
            ]);
    }

    public function find(int $id)
    {
        $this->render('show.html.twig', [
            'id'  => $id,
        ]);
    }
}