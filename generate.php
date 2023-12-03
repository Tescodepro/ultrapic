<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zenka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch manufacturers data from the database
$ureticiler = $conn->query("SELECT * FROM manufacturers_list");

$xml = new SimpleXMLElement("<urlset xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap.xsd'></urlset>");

foreach ($ureticiler as $key => $value) {
    $url = $xml->addChild('url');
    $url->addChild('loc', 'https://zenkaeurope.com/manufacturers/' . $value["href"]);
    $url->addChild('lastmod', date('c')); // Last modification date
    // $url->addChild('changefreq', 'weekly'); // Change frequency
    $url->addChild('priority', '1.0'); // Priority
}

// Output the generated XML content
header('Content-Type: application/xml');
echo $xml->asXML();

$conn->close();
?>
