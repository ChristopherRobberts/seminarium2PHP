function attachHandlers() {
    $(".del").on('click', function(){
        var id = $(this).parent().attr('id');
        var remove = $(this).parent();
        var pageID = $(".commentbox").parent().find($(".pagenumber")).val();
        $.ajax({
            type: 'POST',
            url: '/deleteComment.php',
            data: {
                commentID: id,
                param: pageID
            },
            success: function(response){
                remove.remove();
            }
        });
    })
}