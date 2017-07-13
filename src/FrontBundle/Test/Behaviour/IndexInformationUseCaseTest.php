<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 11/06/2017
 * Time: 15:48
 */

namespace FrontBundle\Test\Behaviour;


use FrontBundle\Application\IndexInformationUseCase;
use FrontBundle\Domain\Repository\DocumentRepository;
use FrontBundle\Test\Infraestructure\UnitTestCase;
use Mockery\Mock;

class IndexInformationUseCaseTest extends UnitTestCase
{
    /** @var  Mock | DocumentRepository */
    private $documentRepostirory;
    /** @var  IndexInformationUseCase */
    private $indexInformationUseCase;

    public function setUp()
    {
        parent::setUp();
        $this->documentRepostirory = $this->mock(DocumentRepository::class);
        $this->indexInformationUseCase = new IndexInformationUseCase($this->documentRepostirory);
    }

    /** @test */
    public function itShouldGetTheInformationForTheIndex()
    {
        $totalNumberOfDocuments = 4;

        $result = [
            'totalNumberOfDocuments' => $totalNumberOfDocuments,
            'documentsByCategory' => [],
            'documentsByDate' => []
        ];

        $this->getTotalNumberOfDocuments($totalNumberOfDocuments);

        $this->getNumberOfDocumentsByCategory();

        $this->getNumberOfDocumentsByDate();

        $this->assertEquals($result, $this->indexInformationUseCase->execute());
    }

    private function getTotalNumberOfDocuments($totalNumberOfDocuments)
    {
        $this->documentRepostirory
            ->shouldReceive('getTotalNumberOfDocuments')
            ->once()
            ->withNoArgs()
            ->andReturn($totalNumberOfDocuments);

    }

    private function getNumberOfDocumentsByCategory()
    {
        $this->documentRepostirory
            ->shouldReceive('getNumberOfDocumentsByCategory')
            ->once()
            ->withNoArgs()
            ->andReturn([]);
    }

    private function getNumberOfDocumentsByDate()
    {
        $this->documentRepostirory
            ->shouldReceive('getNumberOfDocumentsByDate')
            ->once()
            ->withNoArgs()
            ->andReturn([]);
    }

}