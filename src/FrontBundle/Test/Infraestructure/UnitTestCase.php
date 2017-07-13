<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 08/06/2017
 * Time: 18:54
 */

namespace FrontBundle\Test\Infraestructure;


use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class UnitTestCase extends TestCase
{
    public function mock(string $interface): MockInterface
    {
        return Mockery::mock($interface);
    }

    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

}