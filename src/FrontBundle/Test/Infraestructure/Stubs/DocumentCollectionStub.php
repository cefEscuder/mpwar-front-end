<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:19
 */

namespace FrontBundle\Test\Infraestructure\Stubs;

use FrontBundle\Domain\ValueObject\DocumentCollection;

class DocumentCollectionStub extends Stub
{
    public static function random()
    {
        return self::create();
    }

    public static function create()
    {
        return new DocumentCollection();
    }

    public static function createWithTwoElements()
    {
        $documentCollection = self::create();
        $documentCollection->add( DocumentStub::create());
        $documentCollection->add( DocumentStub::create());

        return $documentCollection;
    }

}