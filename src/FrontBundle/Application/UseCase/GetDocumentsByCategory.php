<?php

namespace FrontBundle\Application\UseCase;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetDocumentsByCategory
{

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute(): array
    {
        return $this->documentRepository->getNumberOfDocumentsByCategory();
    }
}