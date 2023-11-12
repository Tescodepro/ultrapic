<?php

function generateSitemap($url, $maxLinks = 100)
{
    // Initialize DOMDocument
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    // Create root element
    $urlset = $dom->createElement('urlset');
    $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    $dom->appendChild($urlset);

    // Function to add a URL to the sitemap
    function addUrl($dom, $urlset, $loc, $lastmod = null, $changefreq = null, $priority = null)
    {
        $url = $dom->createElement('url');

        // Create child elements
        $locElement = $dom->createElement('loc', htmlspecialchars($loc));
        $url->appendChild($locElement);

        if ($lastmod !== null) {
            $lastmodElement = $dom->createElement('lastmod', $lastmod);
            $url->appendChild($lastmodElement);
        }

        if ($changefreq !== null) {
            $changefreqElement = $dom->createElement('changefreq', $changefreq);
            $url->appendChild($changefreqElement);
        }

        if ($priority !== null) {
            $priorityElement = $dom->createElement('priority', $priority);
            $url->appendChild($priorityElement);
        }

        $urlset->appendChild($url);
    }

    // Function to get up to 100 links from a page using cURL
    function getLinks($url, $maxLinks)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');

        // Disable SSL verification (use cautiously)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Set a longer execution time limit
        set_time_limit(300);

        $content = curl_exec($ch);

        if ($content === false) {
            echo 'cURL error: ' . curl_error($ch);
            return [];
        }

        curl_close($ch);

        // Check if the content is not empty before attempting to load it
        if (!empty($content)) {
            $dom = new DOMDocument;
            @$dom->loadHTML($content);

            $links = [];
            $linkCount = 0;

            foreach ($dom->getElementsByTagName('a') as $link) {
                $href = $link->getAttribute('href');
                if ($href !== '' && $href[0] !== '#' && $linkCount < $maxLinks) {
                    $links[] = $href;
                    $linkCount++;
                }
            }

            return $links;
        } else {
            return [];
        }
    }

    // Start crawling from the provided URL
    $visited = [];
    $queue = [$url];

    while (!empty($queue)) {
        $currentUrl = array_shift($queue);

        // Skip already visited URLs
        if (in_array($currentUrl, $visited)) {
            continue;
        }

        // Add the current URL to the sitemap
        addUrl($dom, $urlset, $currentUrl);

        // Get up to 100 links from the current page
        $links = getLinks($currentUrl, $maxLinks);

        // Add linked URLs to the queue
        foreach ($links as $link) {
            $queue[] = $link;
        }

        // Mark the current URL as visited
        $visited[] = $currentUrl;

        // Stop crawling when the maximum number of links is reached
        if (count($visited) >= $maxLinks) {
            break;
        }
    }

    // Save the XML sitemap to a file
    $dom->save('sitemap.xml');
}

generateSitemap('https://zenkaeurope.com', 100);
