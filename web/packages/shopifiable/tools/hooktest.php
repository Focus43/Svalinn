<?php defined('C5_EXECUTE') or die(_("Access Denied."));

echo "Is callable: getallheaders()? " . (is_callable('getallheaders') ? 'YES' : 'NO') . "<br/><br/>";
if( is_callable('getallheaders') ){
    print_r(getallheaders());
    echo "<br/><br/>";
}

echo "Is callable: apache_response_headers()? " . (is_callable('apache_response_headers') ? 'YES' : 'NO') . "<br/>";
if( is_callable('apache_response_headers') ){
    print_r(apache_response_headers());
    echo "<br/><br/>";
}

echo "Is callable: headers_list()? " . (is_callable('headers_list') ? 'YES' : 'NO') . "<br/>";
if( is_callable('headers_list') ){
    print_r(headers_list());
    echo "<br/><br/>";
}

echo "SERVER variable:<br/><br/>";
print_r($_SERVER);

