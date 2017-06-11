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
    public function itShould()
    {
        $documentCollection = DocumentCollectionStub::createWithTwoElements();

        $this->queueDocumentsHandler
            ->shouldReceive('getDocuments')
            ->once()
            ->withNoArgs()
            ->andReturn($documentCollection);
        $this->documentRepository
            ->shouldReceive('add')
            ->once()
            ->with($documentCollection)
            ->andReturnNull();

        $this->assertNull($this->DocumentSaver->execute());
    }
}