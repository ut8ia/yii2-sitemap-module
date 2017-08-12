<?php

namespace ut8ia\sitemapmodule;
use ut8ia\contentmodule\models\Content;
use \yii\base\Module;

/**
 * Class SitemapModule
 * @package ut8ia\contentmodule
 */
class SitemapModule extends Module
{

    public $baseUrl;
    public $sections;
    public $rows;

    const ALWAYS = 'always';
    const HOURLY = 'hourly';
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY = 'yearly';
    const NEVER = 'never';

    public function init()
    {
        parent::init();
//        dd($this->sections);
        $this->makeRows();
    }

    /**
     * @return array
     */
    private function makeRows()
    {

        if (empty($this->sections)) {
            return;
        }

        foreach ($this->sections as $sectionId => $params) {
            $this->proceedContent(Content::bySection($sectionId), $params);
        }

    }

    /**
     * @param array $contentArray
     */
    private function proceedContent($contentArray, $params)
    {
        foreach ($contentArray as $content) {
            $this->rows = array_merge($this->rows, $this->makeRow($content, $params));
        }
    }

    /**
     * @param Content $content
     */
    private function makeRow($content, $params)
    {
        $prefix = (isset($params['prefix'])) ? '/' . $params['prefix'] : '';
        return [[
            'loc' => $this->baseUrl . $prefix . '/' . $content->slug,
            'priority' => $content->priority,
            'lastmod' => date('Y-m-d', strtotime($content->date))
        ]];
    }

}


?>
