<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 18:35
 */

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
        foreach ($documents as $document){
            $this->documentRepository->add($document);
        }

    }

}