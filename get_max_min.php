<?php
include("Listdb.inc.php");
include("function.php");
$check = get_max_min_data();

if($check)
{
    print_r($check[0]['companyX']);
    print_r($check[0]['payX']);
}
else
{
     echo false;
}
       
?>   