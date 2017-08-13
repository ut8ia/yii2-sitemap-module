# yii2-sitemap-module

working with ut8ia/yii2-content-module

#### url manager config
```'sitemap.xml' =>'sitemap/sitemap/xml'```

#### htaccess
```
RewriteCond $1 ^sitemap.xml
RewriteRule ^(.*)$ index.php
```

#### module section of config
```
  'sitemap' => [
            'class' => 'ut8ia\sitemapmodule\SitemapModule',
            'baseUrl' => 'https://www.i-wet.net',
            'sections' => [
                4 => ['prefix' => 'methods'],
                5 => ['prefix' => 'quality'],
                8 => ['prefix' => 'blog']
            ],
            'rows' => require(__DIR__ . '/sitemap.php')
```
#### sitemap config
```
return [
    [
        'loc' => 'https://yourhost.net',
        'priority' => '0.8',
        'changefreq' => 'daily'
    ],
    [
        'loc' => 'https://yourhost.net/page',
        'priority' => '0.8',
        'changefreq' => 'daily'
    ]
```


