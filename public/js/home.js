 $(document).on('mouseover','.upvote',function() {
    $(this).removeClass('bi-caret-up')
    $(this).addClass('bi-caret-up-fill')
 });

 $(document).on('mouseout','.upvote',function() {
    $(this).removeClass('bi-caret-up-fill')
    $(this).addClass('bi-caret-up')
 });

 $(document).on('mouseover','.downvote',function() {
    $(this).removeClass('bi-caret-down')
    $(this).addClass('bi-caret-down-fill')
 });

 $(document).on('mouseout','.downvote',function() {
    $(this).removeClass('bi-caret-down-fill')
    $(this).addClass('bi-caret-down')
 });

 $(document).on('click','.upvote',function() {
    vote(1,$(this).data('id'));
 });

 $(document).on('click','.downvote',function() {
    vote(-1,$(this).data('id'));
 });

 function vote(value, id){
    $.ajax( {
        url: "/article/vote",
        type: 'POST',
        data: {
            'type': 1,
            'id': id,
            'value': value
        },
        success: function(data) {
            $('#points-' + id).text(data);
        }
    });
 }