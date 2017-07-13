<?php

namespace FrontBundle\Application;

use FrontBundle\Domain\Repository\DocumentRepository;
use FrontBundle\Domain\Service\QueueDocumentsHandler;

class DocumentSaver
{
    private $queueDocumentsHandler;
    private $documentRepository;

    public function __construct(QueueDocumentsHandler $queueDocumentsHandler, DocumentRepository $documentRepository)
    {
        $this->queueDocumentsHandler = $queueDocumentsHandler;
        $this->documentRepository = $documentRepository;
    }

    public function execute()
    {
        $documents = $this->queueDocumentsHandler->getDocuments();
        $this->documentRepository->add($documents);
    }
}