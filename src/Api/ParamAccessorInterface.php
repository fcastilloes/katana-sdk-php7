<?php
/**
 * PHP 7 SDK for the KATANA(tm) Framework (http://katana.kusanagi.io)
 * Copyright (c) 2016-2018 KUSANAGI S.L. All rights reserved.
 *
 * Distributed under the MIT license
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 *
 * @link      https://github.com/kusanagi/katana-sdk-php7
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @copyright Copyright (c) 2016-2018 KUSANAGI S.L. (http://kusanagi.io)
 */

namespace Katana\Sdk\Api;

use Katana\Sdk\Param as ParamInterface;

interface ParamAccessorInterface
{
    /**
     * @param string $name
     * @return bool
     */
    public function hasParam(string $name): bool;

    /**
     * @param string $name
     * @return ParamInterface
     */
    public function getParam(string $name): ParamInterface;

    /**
     * @return ParamInterface[]
     */
    public function getParams(): array;

    /**
     * @param string $name
     * @param mixed $value
     * @param string $type
     * @return ParamInterface
     */
    public function newParam(
        string $name,
        $value = '',
        $type = Param::TYPE_STRING
    ): ParamInterface;
}
