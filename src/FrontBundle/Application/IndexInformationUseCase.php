<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 11/06/2017
 * Time: 16:58
 */

namespace FrontBundle\Application;


use FrontBundle\Domain\Repository\DocumentRepository;

class IndexInformationUseCase
{
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute(){
        $totalNumberOfDocuments = $this->documentRepository->getTotalNumberOfDocuments();
        $documentsByCategory = $this->documentRepository->getNumberOfDocumentsByCategory();
        $documentsByDate = $this->documentRepository->getNumberOfDocumentsByDate();

        return[
            'totalNumberOfDocuments' => $totalNumberOfDocuments,
            'documentsByCategory' => $documentsByCategory,
            'documentsByDate' => $documentsByDate
        ];
    }

}