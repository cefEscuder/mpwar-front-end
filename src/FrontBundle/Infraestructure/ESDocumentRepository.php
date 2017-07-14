<?php


namespace FrontBundle\Infraestructure;

use Elastica\Aggregation\Avg;
use Elastica\Aggregation\DateHistogram;
use Elastica\Aggregation\Terms;
use Elastica\Index;
use Elastica\Query;
use Elastica\Query\MatchAll;
use Elastica\Query\Match;
use FrontBundle\Domain\Repository\DocumentRepository;
use FrontBundle\Domain\ValueObject\DocumentCollection;

class ESDocumentRepository implements DocumentRepository
{
    private $esIndex;

    const MATCHING_FIELD = "category";

    const QUERY_SIZE = 0;

    const DATE_FORMAT = "dd-MM-YYYY";

    public function __construct(Index $index)
    {
        $this->esIndex = $index;
    }

    public function add(DocumentCollection $documents): void
    {
        $this->esIndex->addDocuments($documents->getArray());
    }

    public function getNumberOfDocumentsByDate($category = null): array
    {

        $query = $this->selectTypeOfQuery($category);
        $query->setSize(self::QUERY_SIZE);
        $dateAggregation = new DateHistogram('dateHistogram', 'created_at', 'day');
        $dateAggregation->setFormat(self::DATE_FORMAT);
        $query->addAggregation($dateAggregation);
        $results = $this->esIndex->search($query);
        $aggregations = $results->getAggregations();
        return $aggregations["dateHistogram"]["buckets"];
    }

    public function getNumberOfDocumentsByCategory(): array
    {
        $query = new Query(new MatchAll());
        $query->setSize(self::QUERY_SIZE);
        $categoryAggregation = new Terms(self::MATCHING_FIELD);
        $categoryAggregation->setField(self::MATCHING_FIELD);
        $query->addAggregation($categoryAggregation);
        $results = $this->esIndex->search($query);
        $aggregations = $results->getAggregations();
        return $aggregations[self::MATCHING_FIELD]["buckets"];
    }

    public function getTotalNumberOfDocuments(): string
    {
        $query = new Query(new MatchAll());
        $query->setSize(self::QUERY_SIZE);
        $result = $this->esIndex->search($query);
        return $result->getTotalHits();
    }

    public function getAverageSentiment($category = null): array
    {
        $query = $this->selectTypeOfQuery($category);
        $query->setSize(self::QUERY_SIZE);
        $sentimentAggregation = new Avg('average_sentiment');
        $sentimentAggregation->setField('sentiment');
        $query->addAggregation($sentimentAggregation);
        $results = $this->esIndex->search($query);
        $aggregations = $results->getAggregations();
        return $aggregations;
    }

    public function getNumberOfDocumentsByLocation($category = null): array
    {
        $query = $this->selectTypeOfQuery($category);
        $query->setSize(self::QUERY_SIZE);
        $sentimentAggregation = new Terms('location');
        $sentimentAggregation->setField('author_location');
        $query->addAggregation($sentimentAggregation);
        $results = $this->esIndex->search($query);
        $aggregations = $results->getAggregations();
        return $aggregations['location']["buckets"];
    }

    private function selectTypeOfQuery($category)
    {
        $query = null;
        if ($category === null) {
            $query = new Query(new MatchAll());
        } else {
            $query = new Query(new Match(self::MATCHING_FIELD, $category));
        }
        return $query;
    }
}