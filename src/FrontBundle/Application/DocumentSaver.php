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
        if($this->isCollectionEmpty($documents)){
            return;
        }
        $this->documentRepository->add($documents);
    }


    private function isCollectionEmpty($documents): bool
    {
        return $documents->count() == 0;
    }
}