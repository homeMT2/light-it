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
        data : {
            action : 'send_comment',
            id : id,
            text : text,
            level: level
        },
        success: function(result) {

            var obj = JSON.parse( result );

            if( obj.status != '200' ) {
                alert( obj.message );
            }
            else  {
                reloadPage();
            }
        },
        error: function(result) {
            console.log( result );
        }
    });

});

function reloadPage()
{
    setTimeout(function(){
        window.location.reload();
    }, 300);
}