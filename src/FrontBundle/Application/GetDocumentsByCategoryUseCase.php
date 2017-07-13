<?php

namespace FrontBundle\Application;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetDocumentsByCategoryUseCase
{

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute() :array
    {
        return $this->documentRepository->getNumberOfDocumentsByCategory();
    }
}