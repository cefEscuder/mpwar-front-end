<?php

namespace FrontBundle\Application;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetTotalDocumentsUseCase
{

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute()
    {
        return $this->documentRepository->getTotalNumberOfDocuments();
    }
}