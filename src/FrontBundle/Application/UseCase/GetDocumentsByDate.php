<?php

namespace FrontBundle\Application\UseCase;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetDocumentsByDate
{
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($category = null)
    {
        return $this->documentRepository->getNumberOfDocumentsByDate($category);
    }
}