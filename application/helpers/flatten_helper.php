<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function array_values_recursive($ary)  {
$lst = array();
foreach( array_keys($ary) as $k ) {
$v = $ary[$k];
if (is_scalar($v)) {
$lst[] = $v;
} elseif (is_array($v)) {
$lst = array_merge($lst,array_values_recursive($v));
}
}

return $lst;

}

function mergeArrays($id,$productid, $quantity, $price) {
    $result = array();

    foreach ( $productid as $key=>$name ) {
        $result[] = array( 'sales_id' => $id,'productid' => $name, 'qty' => $quantity[$key], 'price' => $price[ $key ] );
    }

    return $result;
}