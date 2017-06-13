<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 13/06/2017
 * Time: 17:41
 */

namespace FrontBundle\Controller;


use FrontBundle\Application\IndexInformationUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GeneralController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        /** @var IndexInformationUseCase $indexInformationUseCase */
        $indexInformationUseCase = $this->get("index_information_use_case");
        $results = $indexInformationUseCase->execute();
        var_dump($results);
        return $this->render('FrontBundle:general:index.html.twig');
    }

    /**
     * @Route("/Category", name="category")
     *
     */
    public function categoryAction(){
        return $this->render('FrontBundle:general:category.html.twig');
    }
}