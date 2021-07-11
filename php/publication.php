<?php
function publication_head(): string
{
    return '
<div id="publication">
    <div class="bg-color-sky-light" data-auto-height="true">
        <div class="container content-lg">
            <div class="row row-space-2 margin-b-4">
                <div class="col md-margin-b-4">
                    <h2>Publication</h2>
                    <div class="service" data-height="height">
                        <ul>';
}

function publication_tail(): string
{
    return'
                           </ul>
                    </div>
                </div>
        </div>
    </div>
</div>';
}

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

function crawl_google_scholar_profile($url): array
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

    return array(
        'total_citation' => $total_citations,
        'h_index' => $h_index,
        'i10_index' => $i10_index,
        'article_titles' => $article_titles,
        'article_links' => $article_links,
        'article_authors' => $article_authors,
        'article_sources' => $article_sources
    );
}




$gsc_profile = crawl_google_scholar_profile("https://scholar.google.com/citations?user=xwSEAPsAAAAJ&hl=en");


$num_article = sizeof($gsc_profile['article_titles']);

if ($num_article > 0){
    echo publication_head();

    for ($x = 0; $x < $num_article; $x++ ){
        echo '<li>';
        echo '<a href="';
        echo $gsc_profile['article_links'][$x];
        echo '">';
        echo '<strong>';
        echo $gsc_profile['article_titles'][$x];
        echo '</strong>';
        echo '</a>';

        echo '<br>';

        echo $gsc_profile['article_authors'][$x] . ' | '. $gsc_profile['article_sources'][$x];

        echo '</li>';
    }

    echo publication_tail();
}
