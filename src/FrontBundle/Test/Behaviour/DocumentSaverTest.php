<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 18:36
 */

namespace FrontBundle\Test\Behaviour;

use FrontBundle\Application\DocumentSaver;
use FrontBundle\Domain\Repository\DocumentRepository;
use FrontBundle\Domain\Service\QueueDocumentsHandler;
use FrontBundle\Domain\ValueObject\DocumentCollection;
use FrontBundle\Test\Infraestructure\Stubs\DocumentCollectionStub;
use FrontBundle\Test\Infraestructure\UnitTestCase;
use Mockery\Mock;

class DocumentSaverTest extends UnitTestCase
{
    /** @var  Mock|QueueDocumentsHandler */
    private $documentRepository;
    /** @var  Mock|DocumentRepository */
    private $queueDocumentsHandler;
    /** @var  DocumentSaver */
    private $DocumentSaver;

    public function setUp()
    {
        $this->queueDocumentsHandler = $this->mock(QueueDocumentsHandler::class);
        $this->documentRepository = $this->mock(DocumentRepository::class);
        $this->DocumentSaver = new DocumentSaver($this->queueDocumentsHandler, $this->documentRepository);
    }

    /** @test */
    public function itShouldSaveDocumentsIntoESRepository()
    {
        $documentCollection = DocumentCollectionStub::createWithTwoElements();

        $this->getDocumentsFromHandler($documentCollection);

        $this->saveDocumentsIntoESRepository($documentCollection);

        $this->assertNull($this->DocumentSaver->execute());
    }

    private function getDocumentsFromHandler(DocumentCollection $documentCollection)
    {
        $this->queueDocumentsHandler
            ->shouldReceive('getDocuments')
            ->once()
            ->withNoArgs()
            ->andReturn($documentCollection);
    }

    private function saveDocumentsIntoESRepository(DocumentCollection $documentCollection)
    {
        $this->documentRepository
            ->shouldReceive('add')
            ->once()
            ->with($documentCollection)
            ->andReturnNull();
    }
}