<?php    
    header('Content-type: application/json');
    $headlineRequest = new stdClass();
    $headlineRequest->headline = $_REQUEST["headline_asset"];
    $headlineRequest->subheadline = $_REQUEST["subheadline_asset"];
    $headlineRequest->filter = $_REQUEST['filter_option'];
    
    $headlineJson = json_encode($headlineRequest);

    echo $headlineJson;
 ?>