<?php
/**
 * @see https://github.com/artesaos/seotools
 */


return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => false, // set false to total remove
            'titleBefore' => "hit institute", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'titleAfter' => "hit institute", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' => false, // set false to total remove
            'separator' => ' | ',
            'keywords' => ['hit', 'hungary institution of innovation and technology', 'study in hungary', 'hungary university', "hungary instituation"],
            // 'canonical' =>  url()->current(), // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => "noindex/nofollow", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            // 'url' => url()->current(), // Set null for using Url::current(), set false to total remove
            'type' => false,
            'site_name' => false,
            'images' => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary',
            'site' => '@hit',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => "hit", // set false to total remove
            'description' => "hit descrip", // set false to total remove
            // 'url' =>  url()->current(), // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],

];
