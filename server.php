<?php
require_once "lib/nusoap.php";

function getProd($category) {
    if ($category == "books") {
        return join(",", array(
            "Data Pulled from the Database"));
    }
    else {
            return "No products listed under that category";
    }
}
 
$server = new soap_server();
$server->register("getProd");
$server->service($HTTP_RAW_POST_DATA);
?>