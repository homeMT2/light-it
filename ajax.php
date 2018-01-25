<?php

include_once 'core/bootstrap.php';

if( isset( $_POST['action'] ) && $_POST['action'] == 'send_comment' ) {
    echo ajax_send_comment( $query );
    die();
}
else {
    echo json_encode(
        array(
            'status' => 'error',
            'message' => 'Wat?'
        )
    );
    die();
}

function ajax_send_comment( $query )
{
    $enter = ( isset($_COOKIE['fbsr_132837580857676']) ) ? TRUE : FALSE;

    if ($enter == TRUE) {

        $id     = ( isset($_POST['id'])     ) ? $_POST['id']    : 0;
        $level  = ( isset($_POST['level'])  ) ? $_POST['level'] : 0;
        $text   = ( isset($_POST['text'])   ) ? $_POST['text']  : '';

        if( $id == '' ) {
            $id = 0;
        }

        if ($text == '') {
            return json_encode(
                array(
                    'status' => 'error',
                    'message' => 'Enter comment text!'
                )
            );
        }
        else {

            $comment = new Comment( 0, $text, time(), $level + 1, $id );

            show( $comment );

            $result = $query->insert_comment( 'comment', $comment );

            if( $result == TRUE ) {
                return json_encode(
                    array(
                        'status' => '200',
                        'message' => 'Comment sent :)'
                    )
                );
            }
            else {
                return json_encode(
                    array(
                        'status' => 'error',
                        'message' => 'Comment NOT sent :('
                    )
                );
            }

        }
    }
    else {
        return json_encode(
            array(
                'status' => 'error',
                'message' => 'Access Denied :('
            )
        );
    }
}