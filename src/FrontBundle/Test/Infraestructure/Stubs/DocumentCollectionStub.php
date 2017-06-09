<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:19
 */

namespace FrontBundle\Test\Infraestructure\Stubs;

use FrontBundle\Domain\ValueObject\DocumentCollection;

class DocumentCollectionStub
{
    public static function random()
    {
        return self::create();
    }

    public static function create(...$documents)
    {
        return new DocumentCollection(...$documents);
    }

    public static function createWithTwoElements()
    {
        return self::create(
            DocumentStub::create(),
            DocumentStub::create()
        );
    }

}