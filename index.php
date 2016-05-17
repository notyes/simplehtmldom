<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include_once 'simple_html_dom.php';

    // set url
    $url = 'http://www.settrade.com/C13_MarketSummary.jsp?detail=SET50';

    // header('Content-Type: text/html; charset=utf-8');
    // check page 404 next continue
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);
    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    // get DOM from URL or file
    $html = file_get_html( $url );
    $data_keyword = '';
    foreach($html->find( '.col-md-8 .table-info' ) as $e)
    {
        // read data in value
        // echo '<pre>';
        // print_r( $e->innertext );
        // echo '</pre>';
        
        $a = array();

        foreach ($e->find('tbody td') as $key ) {
        
            $a[] = strip_tags($key->innertext);

        }


    }


    echo json_encode($a);

