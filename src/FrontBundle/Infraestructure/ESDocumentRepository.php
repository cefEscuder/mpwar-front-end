<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 17:47
 */

namespace FrontBundle\Infraestructure;

use Elastica\Aggregation\DateHistogram;
use Elastica\Aggregation\Terms;
use Elastica\Index;
use Elastica\Query;
use Elastica\Query\MatchAll;
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

    public function getNumberOfDocumentsByDate(): array
    {
        $query = new Query(new MatchAll());
        $query->setSize(0);
        $dateAggregation = new DateHistogram('dateHistogram', 'created_at', 'day');
        $dateAggregation->setFormat("YYYY-MM-dd");
        $query->addAggregation($dateAggregation);
        $results = $this->esIndex->search($query);
        return $results->getAggregations();
    }

    public function getNumberOfDocumentsByCategory(): array
    {
        $query = new Query(new MatchAll());
        $query->setSize(0);
        $categoryAggregation = new Terms('category');
        $categoryAggregation->setField('category');
        $query->addAggregation($categoryAggregation);
        $results = $this->esIndex->search($query);
        return $results->getAggregations();
    }

    public function getTotalNumberOfDocuments(): string
    {
        $query = new Query(new MatchAll());
        $query->setSize(0);
        $result = $this->esIndex->search($query);
        return $result->getTotalHits();
    }
}