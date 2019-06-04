<?php

declare (strict_types = 1);

namespace Controller;

use Framework\Render;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Service\SocialNetwork\VkApi;

class MainController
{
    use Render;

    /**
     * Главная страница
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        /*        $vkConnect = new VkApi();
        $vkConnect->connect(); */
        return $this->render('main/index.html.php');
    }


    /*     public function vkAction()
    {
        $request = new Request;
        var_dump($request);
        echo "vc connect ";
        exit();
    } */
}
