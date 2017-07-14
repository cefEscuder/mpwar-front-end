<?php

namespace FrontBundle\Application\UseCase;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetTotalDocuments
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