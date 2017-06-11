<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 19:19
 */

namespace FrontBundle\Test\Infraestructure\Stubs;

use Elastica\Document;

class DocumentStub extends Stub
{
    public static function random()
    {
        return self::create();
    }

    public static function create()
    {
        return new Document(
            '',
            [
                'source' => Stub::factory()->word,
                'category' => Stub::factory()->word,
                'location' => Stub::factory()->country,
                'content' => Stub::factory()->sentence(),
                'created_at' => Stub::factory()->date(),
                'author_name' => Stub::factory()->name,
                'language' => Stub::factory()->languageCode

            ],
            'documents',
            'documents'
        );
    }
}