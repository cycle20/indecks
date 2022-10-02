<?php

/**
 * Copyright (C) 2022, Csongor Gerdan
 *
 * Licensed under GNU Affero General Public License v3.0,
 * see LICENSE file for more info.
 */

namespace Cycle20\Indecks\Tests\Feature\Main;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase {
    const URL = 'https://index.hu/24ora/rss';

    public function test_item_array() {
        // arrange and act
        $rss = simplexml_load_file(self::URL);

        // assert
        $this->assertNotEmpty($rss->channel);
        $this->assertObjectHasAttribute("item", $rss->channel);
    }

    public function test_item_children() {
        // arrange and act
        $rss = simplexml_load_file(self::URL);
        $item = $rss->channel->item[0];

        // assert
        $this->assertObjectHasAttribute("pubDate", $item);
        $this->assertObjectHasAttribute("title", $item);
        $this->assertObjectHasAttribute("description", $item);
        $this->assertObjectHasAttribute("link", $item);
    }
}
