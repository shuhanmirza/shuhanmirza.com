<?php
//If the HTTPS is not found to be "on"
if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
?>

<?php

function get_profile_scores($xpath, $xpath_query)
{
    $elements = $xpath->query($xpath_query);
    if (!is_null($elements)) {
        foreach ($elements as $element) {
            $nodes = $element->childNodes;
            foreach ($nodes as $node) {
                return $node->nodeValue;
            }
        }
    }

    return '0';
}

function crawl_google_scholar_profile($url)
{
    static $seen = array();

    $seen[$url] = true;

    $dom = new DOMDocument('1.0');
    @$dom->loadHTMLFile($url);
    #echo $dom->saveHTML();

    $xpath = new DOMXpath($dom);

    $total_citations = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[1]/td[2]");
    $h_index = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[2]/td[2]");
    $i10_index = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[3]/td[2]");
}

crawl_google_scholar_profile("https://scholar.google.com/citations?user=xwSEAPsAAAAJ&hl=en");
?>

<?php
$main_html_file = "main.html";
$main_html = new DOMDocument();
@$main_html->loadHTMLFile($main_html_file);
echo $main_html->saveHTML()
?>
