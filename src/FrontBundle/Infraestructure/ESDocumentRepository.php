<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 17:47
 */

namespace FrontBundle\Infraestructure;

use Elastica\Index;
use FrontBundle\Domain\Repository\DocumentRepository;
use FrontBundle\Domain\ValueObject\DocumentCollection;

class ESDocumentRepository implements DocumentRepository
{

    private $esIndex;

    public function __construct(Index $index)
    {
        $this->esIndex = $index;
    }

    public function add(DocumentCollection $documents)
    {
        $this->esIndex->addDocuments($documents->getArray());
    }
}