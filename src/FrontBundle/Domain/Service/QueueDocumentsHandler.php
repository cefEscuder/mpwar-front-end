<?php

namespace FrontBundle\Domain\Service;

use FrontBundle\Domain\ValueObject\DocumentCollection;

interface QueueDocumentsHandler
{
    public function getDocuments(): DocumentCollection;
}