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
    $dom = new DOMDocument('1.0');
    @$dom->loadHTMLFile($url);
    #echo $dom->saveHTML();

    $xpath = new DOMXpath($dom);

    $total_citations = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[1]/td[2]");
    $h_index = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[2]/td[2]");
    $i10_index = get_profile_scores($xpath, "//*[@id=\"gsc_rsb_st\"]/tbody/tr[3]/td[2]");

    $article_titles = array();
    $article_links = array();
    $article_authors = array();
    $article_sources = array();

    $elements = $xpath->query("//*[@id=\"gsc_a_b\"]/tr[*]/td[1]/*");
    if (!is_null($elements)) {
        foreach ($elements as $element) {
            if ($element->nodeName == 'a') {
                array_push($article_links, 'https://scholar.google.com' . $element->getAttribute('href'));
                $nodes = $element->childNodes;
                foreach ($nodes as $node) {
                    array_push($article_titles, $node->nodeValue);
                }
            } elseif ($element->nodeName == 'div') {
                $nodes = $element->childNodes;
                if (is_object($nodes[0]->nextSibling) == true) {
                    array_push($article_sources, $nodes[0]->nodeValue . $nodes[1]->nodeValue);
                } else {
                    array_push($article_authors, $nodes[0]->nodeValue);
                }
            }
        }
    }
}

crawl_google_scholar_profile("https://scholar.google.com/citations?user=xwSEAPsAAAAJ&hl=en");

?>

<?php

function load_html($file_path){
    $html_file = $file_path;
    $html_dom = new DOMDocument();
    @$html_dom->loadHTMLFile($html_file);
    echo $html_dom->saveHTML();
}

echo '<!DOCTYPE html>';
echo '<html lang="en" class="no-js">';

load_html('html/head.html');

echo '<body id="body" data-spy="scroll" data-target=".header">';

load_html('html/header.html');

load_html('html/promo.html');

//========== PAGE LAYOUT ==========

load_html('html/about.html');

#load_html('html/experience.html');

#load_html('html/work.html');

#load_html('html/clients.html');

#load_html('html/promo_banner.html');

load_html('html/contact.html');

//--========== END PAGE LAYOUT ==========--

load_html('html/footer.html');

load_html('html/scripts.html');

echo '</body>';
echo '</html>';

?>
