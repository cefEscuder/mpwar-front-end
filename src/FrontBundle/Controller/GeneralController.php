<?php

namespace FrontBundle\Controller;

use FrontBundle\Application\GetAverageSentimentUseCase;
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
        /** @var GetAverageSentimentUseCase $getAverageSentimentUseCase */
        $getAverageSentimentUseCase = $this->get("average_sentiment_use_case");
        $averageSentiment = $getAverageSentimentUseCase->execute($category);

        return $this->render(
            'FrontBundle:general:category.html.twig',
            [
                'categoryName' => $category,
                'sentiment' => $averageSentiment
            ]
        );
    }
}