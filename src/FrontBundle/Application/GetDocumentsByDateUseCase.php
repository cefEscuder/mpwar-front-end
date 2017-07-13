<?php

namespace FrontBundle\Application;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetDocumentsByDateUseCase
{
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($category=null)
    {
        return $this->documentRepository->getNumberOfDocumentsByDate($category);
    }
}