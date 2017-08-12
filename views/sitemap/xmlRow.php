<?php
$priority = isset($row['priority']) ? $row['priority'] : '0.5';
$changefreq = isset($row['changefreq']) ? $row['changefreq'] : 'daily';
$lastmod = '';
if (isset($row['lastmod'])) {
    $lastmod = '<lastmod>' . $row['lastmod'] . '</lastmod>';
}
?>
<url><loc><?= $row['loc'] ?></loc><changefreq><?= $changefreq ?></changefreq><priority><?= $priority ?></priority><?= $lastmod ?></url>
