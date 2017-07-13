<?php

namespace FrontBundle\Controller;

use FrontBundle\Application\GetAverageSentimentUseCase;
use FrontBundle\Application\GetDocumentsByCategoryUseCase;
use FrontBundle\Application\GetDocumentsByDateUseCase;
use FrontBundle\Application\GetTotalDocumentsUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EndPointController  extends Controller
{
    /**
     * @Route("/DocumentsByDate", name="DocumentsByDate")
     *
     */
    public function DocumentsByDateAction()
    {
        /** @var GetDocumentsByDateUseCase $getDocumentsByDateUseCase */
        $getDocumentsByDateUseCase = $this->get("documents_by_date_use_case");
        $documentsByDate = $getDocumentsByDateUseCase->execute();

        return new JsonResponse($documentsByDate);
    }

    /**
     * @Route("/DocumentsByCategory", name="DocumentsByCategory")
     *
     */
    public function DocumentsByCategoryAction()
    {
        /** @var GetDocumentsByCategoryUseCase $getDocumentsByCategoryUseCase */
        $getDocumentsByCategoryUseCase = $this->get("documents_by_category_use_case");
        $documentsByCategory = $getDocumentsByCategoryUseCase->execute();

        return new JsonResponse($documentsByCategory);
    }

    /**
     * @Route("/AverageSentiment", name="AverageSentiment")
     *
     */
    public function AverageSentimentAction()
    {
        /** @var GetAverageSentimentUseCase $getAverageSentimentUseCase */
        $getAverageSentimentUseCase = $this->get("average_sentiment_use_case");
        $averageSentiment = $getAverageSentimentUseCase->execute();

        return new JsonResponse($averageSentiment);
    }

    /**
     * @Route("/Category/DocumentsByDate/{category}", name="CategoryDocumentsByDate")
     *
     */
    public function CategoryDocumentsByDateAction($category)
    {
        /** @var GetDocumentsByDateUseCase $getDocumentsByDateUseCase */
        $getDocumentsByDateUseCase = $this->get("documents_by_date_use_case");
        $categoryDocumentsByDate = $getDocumentsByDateUseCase->execute($category);

        return new JsonResponse($categoryDocumentsByDate);
    }
}