<?php
/**
 * Copyright (C) 2014-2017 by Ticketmatic BVBA <developers@ticketmatic.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license     MIT X11 http://opensource.org/licenses/MIT
 * @author      Ticketmatic BVBA <developers@ticketmatic.com>
 * @copyright   Ticketmatic BVBA
 * @link        https://www.ticketmatic.com/
 */

namespace Ticketmatic\Model;

use Ticketmatic\Json;

/**
 * Product property
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/ProductProperty).
 */
class ProductProperty implements \jsonSerializable
{
    /**
     * Create a new ProductProperty
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Name
     *
     * @var string
     */
    public $name;

    /**
     * Description
     *
     * @var string
     */
    public $description;

    /**
     * Key
     *
     * @var string
     */
    public $key;

    /**
     * Values
     *
     * @var \Ticketmatic\Model\KeyValueItem[]
     */
    public $values;

    /**
     * @var string
     */
    public $isarchived;

    /**
     * Unpack ProductProperty from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\ProductProperty
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new ProductProperty(array(
            "name" => isset($obj->name) ? $obj->name : null,
            "description" => isset($obj->description) ? $obj->description : null,
            "key" => isset($obj->key) ? $obj->key : null,
            "values" => isset($obj->values) ? Json::unpackArray("KeyValueItem", $obj->values) : null,
            "isarchived" => $obj->isarchived ?? null
        ));
    }

    /**
     * Serialize ProductProperty to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->name)) {
            $result["name"] = strval($this->name);
        }
        if (!is_null($this->description)) {
            $result["description"] = strval($this->description);
        }
        if (!is_null($this->key)) {
            $result["key"] = strval($this->key);
        }
        if (!is_null($this->values)) {
            $result["values"] = $this->values;
        }
        if (!is_null($this->isarchived)) {
            $result["isarchived"] = $this->isarchived;
        }

        return $result;
    }
}
