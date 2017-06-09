<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 16:35
 */

namespace FrontBundle\Domain\ValueObject;

use FrontBundle\Domain\Entity\Document;

class DocumentCollection extends Collection
{
    protected function typeOfCollection(): string
    {
        return Document::class;
    }

}