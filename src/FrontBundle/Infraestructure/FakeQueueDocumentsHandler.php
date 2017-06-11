<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 17:19
 */

namespace FrontBundle\Infraestructure;


use Elastica\Document;
use FrontBundle\Domain\Service\QueueDocumentsHandler;
use FrontBundle\Domain\ValueObject\DocumentCollection;

class FakeQueueDocumentsHandler implements QueueDocumentsHandler
{

    const INDEX_AND_MAPPING = "documents";
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
            $document = new Document('',json_decode($stringDocument), self::INDEX_AND_MAPPING, self::INDEX_AND_MAPPING);
            $documentCollection->add($document);
        }

        return $documentCollection;
    }
}