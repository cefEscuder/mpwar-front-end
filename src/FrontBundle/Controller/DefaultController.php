<?php

namespace FrontBundle\Controller;

use FrontBundle\Application\DocumentSaver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        /** @var DocumentSaver $documentSaver */
        $documentSaver = $this->get("document_saver");
        $documentSaver->execute();
        return $this->render('FrontBundle:Default:index.html.twig');
    }
}
