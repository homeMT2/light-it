/*
 * Comment logic
 * */

$('.comment-content').on('click', function() {

    if( $( this ).hasClass('select') ) {
        $('.comment-content').removeClass('select');
        $('#comment_id').val('');
        $('#comment_level').val(0);
    }
    else {
        $('.comment-content').removeClass('select');
        $( this ).addClass('select');
        $('#comment_id').val( $(this).attr('id') );
        $('#comment_level').val( $(this).attr('level') );
    }

});

$('#comment-send').on('click', function() {

    var id      = $('#comment_id').val();
    var text    = $('#comment').val();
    var level   = $('#comment_level').val();

    $.ajax({
        url : "ajax.php",
        type : 'post',
        dataType: 'json',
        data : {
            action : 'send_comment',
            id : id,
            text : text,
            level: level
        },
        success: function(result) {
            var obj = jQuery.parseJSON( result )

            if( obj.status == '200' ) {
                location.reload();
            }
            else {
                alert( obj.message );
            }
        }
    });

});