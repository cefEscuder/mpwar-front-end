<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:19
 */

namespace FrontBundle\Test\Infraestructure\Stubs;

use FrontBundle\Domain\Entity\Document;

class DocumentStub
{
    public static function random()
    {
        return self::create();
    }

    public static function create()
    {
        return new Document();
    }

}