<?php

function getFileRowCount($filename)
{
    $file = fopen($filename, "r");
    $rowCount = 0;

    while (!feof($file)) {
        fgets($file);
        $rowCount++;
    }

    fclose($file);
    return $rowCount;
}

function createSitemapFile($filename, $urls)
{
    $file = fopen($filename, "w");
    fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
    fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);

    date_default_timezone_set('Asia/Jakarta');
    $currentTime = date('Y-m-d\TH:i:sP');

    foreach ($urls as $url) {
        fwrite($file, '  <url>' . PHP_EOL);
        fwrite($file, '    <loc>' . $url . '</loc>' . PHP_EOL);
        fwrite($file, '    <lastmod>' . $currentTime . '</lastmod>' . PHP_EOL);
        fwrite($file, '    <changefreq>daily</changefreq>' . PHP_EOL);
        fwrite($file, '  </url>' . PHP_EOL);
    }

    fwrite($file, '</urlset>' . PHP_EOL);
    fclose($file);
}

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (isset($fullUrl)) {
    $parsedUrl = parse_url($fullUrl);
    $scheme = $parsedUrl['scheme'] ?? '';
    $host = $parsedUrl['host'] ?? '';
    $path = $parsedUrl['path'] ?? '';
    $baseUrl = $scheme . "://" . $host . $path;
    $urlAsli = str_replace("get-sitemap.php", "", $baseUrl);

    // Create robots.txt
    $robotsTxt = "User-agent: *" . PHP_EOL;
    $robotsTxt .= "Allow: /" . PHP_EOL;
    $robotsTxt .= "Sitemap: " . $urlAsli . "sitemap_index.xml" . PHP_EOL;
    file_put_contents('robots.txt', $robotsTxt);

    // Read lines from list
    $judulFile = "list.txt";
    $fileLines = file($judulFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Remove duplicates
    $uniqueLines = array_unique($fileLines);

    // Build all URLs
    $allUrls = array_map(function ($judul) use ($urlAsli) {
        return $urlAsli . '?id=' . urlencode($judul);
    }, $uniqueLines);

    // Split into chunks of 50000 URLs per sitemap
    $chunks = array_chunk($allUrls, 10000);
    $sitemapFiles = [];

    foreach ($chunks as $index => $urls) {
        $sitemapFilename = "sitemap" . ($index + 1) . ".xml";
        createSitemapFile($sitemapFilename, $urls);
        $sitemapFiles[] = $sitemapFilename;
    }

    // Create sitemap index
    $indexFile = fopen("sitemap_index.xml", "w");
    fwrite($indexFile, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
    fwrite($indexFile, '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);

    date_default_timezone_set('Asia/Jakarta');
    $currentTime = date('Y-m-d\TH:i:sP');

    foreach ($sitemapFiles as $sitemapFile) {
        fwrite($indexFile, '  <sitemap>' . PHP_EOL);
        fwrite($indexFile, '    <loc>' . $urlAsli . $sitemapFile . '</loc>' . PHP_EOL);
        fwrite($indexFile, '    <lastmod>' . $currentTime . '</lastmod>' . PHP_EOL);
        fwrite($indexFile, '  </sitemap>' . PHP_EOL);
    }

    fwrite($indexFile, '</sitemapindex>' . PHP_EOL);
    fclose($indexFile);

    echo "✅ SITEMAP & INDEX DONE!";
} else {
    echo "❌ URL tidak didefinisikan.";
}
?>
