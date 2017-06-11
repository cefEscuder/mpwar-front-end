<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:07
 */

namespace FrontBundle\Domain\Repository;

use FrontBundle\Domain\Entity\Document;
use FrontBundle\Domain\ValueObject\DocumentCollection;

interface DocumentRepository
{
    public function add(DocumentCollection $documents);
}