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

namespace Katana\Sdk\Messaging;

use Katana\Sdk\Exception\UnserializationFailedException;
use MessagePack\BufferUnpacker;
use MessagePack\Exception\UnpackingFailedException;
use MessagePack\Packer;

class MessagePackSerializer
{
    /**
     * @param $message
     * @return mixed
     * @throws \Exception
     */
    public function serialize($message)
    {
        $pack = new Packer();
        return $pack->pack($message);
    }

    /**
     * @param $message
     * @return mixed
     * @throws \Exception
     */
    public function unserialize($message)
    {
        try {
            $unpacker = new BufferUnpacker();
            $unpacker->reset($message);

            return $unpacker->unpack();
        } catch (UnpackingFailedException $e) {
            throw new UnserializationFailedException($e->getMessage(), 0, $e);
        }
    }
}
