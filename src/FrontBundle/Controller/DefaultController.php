<?php

namespace FrontBundle\Controller;

use Elastica\ResultSet;
use FrontBundle\Application\DocumentSaver;
use FrontBundle\Application\IndexInformationUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
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
        return $this->render('FrontBundle:Default:index.html.twig');
    }
}
