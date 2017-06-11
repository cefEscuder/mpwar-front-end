<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:09
 */

namespace FrontBundle\Domain\Service;

use FrontBundle\Domain\ValueObject\DocumentCollection;

interface QueueDocumentsHandler
{
    public function getDocuments(): DocumentCollection;
}