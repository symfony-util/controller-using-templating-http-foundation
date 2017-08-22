<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;
use SymfonyUtil\Controller\EngineAsArgumentController;

/**
 * @covers \SymfonyUtil\Controller\EngineAsArgumentController
 */
final class EngineAsArgumentControllerTest extends TestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(
            EngineAsArgumentController::class,
            new EngineAsArgumentController()
        );
    }

    /*
    public function testReturnsResponse()
    {
        $this->assertInstanceOf(
            Table::class,
            (new SchemaBuilder(new Schema()))->userTable()
        );
    }
    */
}
