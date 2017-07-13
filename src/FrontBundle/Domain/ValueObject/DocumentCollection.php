<?php

namespace FrontBundle\Domain\ValueObject;

use Elastica\Document;

class DocumentCollection extends Collection
{
    protected function typeOfCollection(): string
    {
        return Document::class;
    }
}