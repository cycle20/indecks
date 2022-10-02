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
        $article = $client->extractContent("$BASE/24ora/rss");
        $collection = [
            'title' => $article->getTitle(),
            'metaDescription' => $article->getMetaDescription(),
            'metaKeywords' => $article->getMetaKeywords(),
            'pop.words' => $article->getPopularWords(),
            'text' => $article->getCleanedArticleText(),
            'raw' => $article->getRawDoc()
        ];
        printf("{$collection['text']}\n");
        printf("{$collection['raw']}\n");
    }
}

Main::run();
