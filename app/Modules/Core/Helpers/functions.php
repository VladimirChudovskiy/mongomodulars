<?php

/**
 * Handle $_GET and $_POST params, find filter query and prepare array for Model method getWithFilter
 *
 * Each item must contain 3 params:
 * - first param - field name
 * - second param - filter type (gt, lt, eq, like, in)
 * - third param - values
 * @return array
 */
function filter_from_request(){
    $result = [];
    $filter_params = array_merge(get_filters_in($_GET), get_filters_in($_POST));
//    dd($filter_params);

    return $result;
}

/**
 * Get all items from array where key contain "filter_" string
 * @param $data - array
 * @return array
 */
function get_filters_in($data){
    $result = get_items_where_key_contain($data, 'filter_');

    return $result;
}

/**
 * Get all items from array where key contain some string
 * @param $array
 * @param $search_string
 * @return array
 */
function get_items_where_key_contain($array, $search_string){
    $result = [];
    foreach ($array as $k=>$v){
        if (strpos($k, $search_string) !== false) {
            $result[$k] = $v;
        }
    }
    return $result;
}