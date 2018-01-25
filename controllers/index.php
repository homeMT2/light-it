<?php

$request = str_replace(
    '/' . $config['site_url_sub'],
    '',
    $_SERVER['REQUEST_URI']
);

$dir = rawurldecode( $request );
$enter = ( isset( $_COOKIE['fbsr_132837580857676'] ) ) ? TRUE : FALSE;

if( $dir == '' && $enter == FALSE ) {

    $comments = get_comments($query);
    require 'views/enter.view.php';

}
else if( $dir == '' && $enter == TRUE ) {
    $comments = get_comments($query);
    require 'views/comments.view.php';
}
else {

    require 'views/404.view.php';

}

function get_comments( $query )
{
    $comments = $query->select_first_level( 'comment', 'Comment' );

    foreach( $comments as $comment ) {
        $comment->get_sub_comments($query);

        foreach ($comment->get_sub() as $sub) {
            $sub->get_sub_comments($query);
        }
    }

    return $comments;
}