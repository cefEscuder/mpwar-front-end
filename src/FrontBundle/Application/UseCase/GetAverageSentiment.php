<?php

namespace FrontBundle\Application\UseCase;

use FrontBundle\Domain\Repository\DocumentRepository;

class GetAverageSentiment
{
    const MINIMUM_NEUTRAL_VALUE = -0.25;

    const MAXIMUM_NEUTRAL_VALUE = 0.25;

    const MAXIMUM_POSITIVE_VALUE = 1;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($category = null): array
    {
        $sentiment = $this->documentRepository->getAverageSentiment($category);
        return $this->classifySentiment($sentiment);

    }

    private function classifySentiment(array $sentiment): array
    {
        $averageSentiment = $sentiment['average_sentiment']['value'];
        $sentimentName = null;
        switch (true) {
            case $this->isNegativeSentiment($averageSentiment);
                $sentimentName = "negative";
                break;
            case $this->isNeutralSentiment($averageSentiment);
                $sentimentName = "neutral";
                break;
            case $this->isPositiveSentiment($averageSentiment);
                $sentimentName = "positive";
                break;
        }
        $sentiment['sentiment_name'] = $sentimentName;
        return $sentiment;
    }

    private function isNegativeSentiment($averageSentiment): bool
    {
        return $averageSentiment <= self::MINIMUM_NEUTRAL_VALUE;
    }

    private function isNeutralSentiment($averageSentiment): bool
    {
        return $averageSentiment > self::MINIMUM_NEUTRAL_VALUE && $averageSentiment <= self::MAXIMUM_NEUTRAL_VALUE;
    }

    private function isPositiveSentiment($averageSentiment): bool
    {
        return $averageSentiment > self::MAXIMUM_NEUTRAL_VALUE && $averageSentiment <= self::MAXIMUM_POSITIVE_VALUE;
    }
}