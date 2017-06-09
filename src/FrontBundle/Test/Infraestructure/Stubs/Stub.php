<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 16:57
 */

namespace FrontBundle\Test\Infraestructure\Stubs;

use Faker\Factory;

class Stub
{
    public static function factory()
    {
        return Factory::create();
    }
}