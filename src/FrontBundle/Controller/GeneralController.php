<?php

namespace FrontBundle\Controller;

use FrontBundle\Application\UseCase\GetAverageSentiment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GeneralController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('FrontBundle:general:index.html.twig');
    }

    /**
     * @Route("/Category/{category}", name="category")
     *
     */
    public function categoryAction($category)
    {
        /** @var GetAverageSentiment $getAverageSentiment */
        $getAverageSentiment = $this->get("average_sentiment_use_case");
        $averageSentiment = $getAverageSentiment->execute($category);

        return $this->render(
            'FrontBundle:general:category.html.twig',
            [
                'categoryName' => $category,
                'sentiment' => $averageSentiment
            ]
        );
    }
}