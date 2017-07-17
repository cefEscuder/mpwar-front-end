<?php

namespace FrontBundle\Infraestructure;

use Elastica\Document;
use FrontBundle\Domain\Service\QueueDocumentsHandler;
use FrontBundle\Domain\ValueObject\DocumentCollection;

class FakeQueueDocumentsHandler implements QueueDocumentsHandler
{
    private $fakeQueue;

    public function __construct(FakeQueue $fakeQueue)
    {
        $this->fakeQueue = $fakeQueue;

    }

    public function getDocuments(): DocumentCollection
    {
        $stringDocuments = $this->fakeQueue->all();
        $documentCollection = new DocumentCollection();

        foreach ($stringDocuments as $stringDocument) {
            $document = new Document('', json_decode($stringDocument), self::MAPPING, self::INDEX);
            $documentCollection->add($document);
        }

        return $documentCollection;
    }
}