<?php

return [
    'default_host' => 'allenkidsswaroopnagar.in',
    'defaults_fn'  => 'allenkids_site_og_defaults',
    'home_bootstrap' => function () {
        require_once dirname(__DIR__) . '/proxy/apis.php';
    },
    'admission_bootstrap' => function () {
        require_once dirname(__DIR__) . '/proxy/api.php';
        require_once dirname(__DIR__) . '/proxy/apis.php';
        $GLOBALS['admission_data'] = fetchApiData('api/pages/preschool-admission-in-swaroop-nagar-allen-kids');
        $GLOBALS['pageData'] = $GLOBALS['admission_data'];
    },
    'blogs_bootstrap' => function () {
        $GLOBALS['ogMeta'] = [
            'title'       => 'Allen Kids Swaroop Nagar | Blogs',
            'description' => 'Latest blogs, news, events and updates from Allen Kids Swaroop Nagar preschool in Kanpur.',
            'url'         => 'https://allenkidsswaroopnagar.in/blogs',
            'type'        => 'website',
        ];
    },
    'sample_blog' => function () {
        require_once dirname(__DIR__) . '/proxy/api.php';
        $blogData = fetchApiData('api/blogs/branch/4');
        return !empty($blogData['data'][0]) && is_array($blogData['data'][0]) ? $blogData['data'][0] : null;
    },
];
