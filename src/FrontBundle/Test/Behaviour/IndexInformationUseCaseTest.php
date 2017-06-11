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
        $totalNumberOfTweets = 4;

        $this->documentRepostirory
            ->shouldReceive('getTotalNumberOfDocuments')
            ->once()
            ->withNoArgs()
            ->andReturn($totalNumberOfTweets);

        $this->assertEquals($totalNumberOfTweets, $this->indexInformationUseCase->execute());
    }

}