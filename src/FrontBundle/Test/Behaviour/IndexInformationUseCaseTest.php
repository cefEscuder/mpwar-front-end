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
        $this->documentRepostirory = $this->mock(DocumentRepository::class);
        $this->indexInformationUseCase = new IndexInformationUseCase($this->documentRepostirory);
    }

    /** @test */
    public function itShould()
    {
        $totalNumberOfDocuments = 4;

        $result =[
            'totalNumberOfDocuments' => $totalNumberOfDocuments,
            'documentsByCategory' => [],
            'documentsByDate' => []
        ];

        $this->documentRepostirory
            ->shouldReceive('getTotalNumberOfDocuments')
            ->once()
            ->withNoArgs()
            ->andReturn($totalNumberOfDocuments);

        $this->documentRepostirory
            ->shouldReceive('getNumberOfDocumentsByCategory')
            ->once()
            ->withNoArgs()
            ->andReturn([]);

        $this->documentRepostirory
            ->shouldReceive('getNumberOfDocumentsByDate')
            ->once()
            ->withNoArgs()
            ->andReturn([]);

        $this->assertEquals($result, $this->indexInformationUseCase->execute());
    }

}