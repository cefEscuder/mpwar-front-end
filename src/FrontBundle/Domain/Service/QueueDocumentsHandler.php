<?php

namespace FrontBundle\Domain\Service;

use FrontBundle\Domain\ValueObject\DocumentCollection;

interface QueueDocumentsHandler
{
    const INDEX = "TFM_document";
    const MAPPING = "document";

    public function getDocuments(): DocumentCollection;
}