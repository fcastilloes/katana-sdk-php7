<?php
/**
 * PHP 7 SDK for the KATANA(tm) Framework (http://katana.kusanagi.io)
 * Copyright (c) 2016-2017 KUSANAGI S.L. All rights reserved.
 *
 * Distributed under the MIT license
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 *
 * @link      https://github.com/kusanagi/katana-sdk-php7
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @copyright Copyright (c) 2016-2017 KUSANAGI S.L. (http://kusanagi.io)
 */

namespace Katana\Sdk\Tests\Api\Transport;

use Katana\Sdk\Api\Transport\ForeignRelation;
use Katana\Sdk\Api\Transport\Relation;
use PHPUnit\Framework\TestCase;

class RelationTest extends TestCase
{
    public function testRelation()
    {
        $relation = new Relation(
            'address',
            'name',
            'primaryKey',
            [
                $this->prophesize(ForeignRelation::class)->reveal(),
                $this->prophesize(ForeignRelation::class)->reveal(),
            ]
        );

        $this->assertEquals('address', $relation->getAddress());
        $this->assertEquals('name', $relation->getName());
        $this->assertEquals('primaryKey', $relation->getPrimaryKey());
        $this->assertCount(2, $relation->getForeignRelations());
        $this->assertContainsOnlyInstancesOf(ForeignRelation::class, $relation->getForeignRelations());
    }
}
