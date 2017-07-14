<?php

namespace FrontBundle\Controller;

use FrontBundle\Application\UseCase\GetAverageSentiment;
use FrontBundle\Application\UseCase\GetDocumentsByCategory;
use FrontBundle\Application\UseCase\GetDocumentsByDate;
use FrontBundle\Application\UseCase\GetDocumentsByLocation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EndPointController extends Controller
{
    /**
     * @Route("/DocumentsByDate", name="DocumentsByDate")
     *
     */
    public function DocumentsByDateAction()
    {
        /** @var GetDocumentsByDate $getDocumentsByDate */
        $getDocumentsByDate = $this->get("documents_by_date_use_case");
        $documentsByDate = $getDocumentsByDate->execute();

        return new JsonResponse($documentsByDate);
    }

    /**
     * @Route("/DocumentsByCategory", name="DocumentsByCategory")
     *
     */
    public function DocumentsByCategoryAction()
    {
        /** @var GetDocumentsByCategory $getDocumentsByCategory */
        $getDocumentsByCategory = $this->get("documents_by_category_use_case");
        $documentsByCategory = $getDocumentsByCategory->execute();

        return new JsonResponse($documentsByCategory);
    }

    /**
     * @Route("/AverageSentiment", name="AverageSentiment")
     *
     */
    public function AverageSentimentAction()
    {
        /** @var GetAverageSentiment $getAverageSentiment */
        $getAverageSentiment = $this->get("average_sentiment_use_case");
        $averageSentiment = $getAverageSentiment->execute();

        return new JsonResponse($averageSentiment);
    }

    /**
     * @Route("/DocumentsByLocation", name="DocumentsByLocation")
     *
     */
    public function DocumentsByLocation()
    {
        /** @var GetDocumentsByLocation $getDocumentsByLocation */
        $getDocumentsByLocation = $this->get("documents_by_location_use_case");
        $documentsByLocation = $getDocumentsByLocation->execute();

        return new JsonResponse($documentsByLocation);
    }

    /**
     * @Route("/Category/DocumentsByDate/{category}", name="CategoryDocumentsByDate")
     *
     */
    public function CategoryDocumentsByDateAction($category)
    {
        /** @var GetDocumentsByDate $getDocumentsByDate */
        $getDocumentsByDate = $this->get("documents_by_date_use_case");
        $categoryDocumentsByDate = $getDocumentsByDate->execute($category);

        return new JsonResponse($categoryDocumentsByDate);
    }

    /**
     * @Route("/Category/DocumentsByLocation/{category}", name="CategoryDocumentsByLocation")
     *
     */
    public function CategoryDocumentsByLocationAction($category)
    {
        /** @var GetDocumentsByLocation $getDocumentsByLocation */
        $getDocumentsByLocation = $this->get("documents_by_location_use_case");
        $categoryDocumentsByLocation = $getDocumentsByLocation->execute($category);

        return new JsonResponse($categoryDocumentsByLocation);
    }
}