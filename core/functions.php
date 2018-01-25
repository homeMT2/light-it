<?php

function show( $array = FALSE ) {
    echo '~~~';
    echo '<pre>';
    print_r( $array );
    echo '</pre>';
    echo '~~~';
}

function show_date( $seconds = 0 ) {
    global $config;
    return date( $config['date'], $seconds );
}