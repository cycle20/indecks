<?php

/**
 * Copyright (C) 2022, Csongor Gerdan
 *
 * Licensed under GNU Affero General Public License v3.0,
 * see LICENSE file for more info.
 */

namespace Cycle20\Indecks\Main;

require('vendor/autoload.php');

use \Goose\Client as GooseClient;

$BASE = 'https://index.hu';

class Main {
    public static function run() {
        global $BASE;

        printf("Indecks: working is in progress...\n");
        $client = new GooseClient([
            'language' => 'hu'
        ]);
        $article = $client->extractContent("$BASE/kulfold/2022/10/01/orosz-ukran-konfliktus-haboru-gazdasagi-valsag-recesszio-europai-unio-oroszorszag-vlagyimir-putyin/");
        $collection = [
            'title' => $article->getTitle(),
            'metaDescription' => $article->getMetaDescription(),
            'metaKeywords' => $article->getMetaKeywords(),
            'pop.words' => $article->getPopularWords(),
            'text' => $article->getCleanedArticleText(),
        ];
        printf("{$collection['text']}\n");
    }
}

Main::run();
