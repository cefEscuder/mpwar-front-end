<?php

namespace FrontBundle\Domain\Repository;

use FrontBundle\Domain\ValueObject\DocumentCollection;

interface DocumentRepository
{
    public function add(DocumentCollection $documents): void;

    public function getNumberOfDocumentsByDate($category = null): array;

    public function getNumberOfDocumentsByCategory(): array;

    public function getTotalNumberOfDocuments(): string;

    public function getAverageSentiment($category = null): array;

    public function getNumberOfDocumentsByLocation($category = null): array;
}