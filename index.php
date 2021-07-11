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

include ('php/publication.php');

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
