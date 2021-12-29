<?php

namespace App\Controller;

use Souris\Controller\AbstractController;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @return mixed
     */
    public function home()
    {
        return $this->render('index.html.twig', [
            'name'  => 'Nicolas',
        ]);
    }

    /**
     * @return mixed
     */
    public function pageTest()
    {
        $form = $this->container['form'];
        $form->add($this->container['input']);
        $submit = $this->container['input'];
        $submit->setType('submit')->setId('submit');
        $form->add($submit);

        return $this->render(
            'test.html.twig',
            [
                'form'  => $form->formView(),
            ]
        );
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->render('show.html.twig', [
            'id'  => $id,
        ]);
    }
}
