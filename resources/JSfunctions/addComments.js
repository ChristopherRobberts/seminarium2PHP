$("#clickMe").on('click', function () {
    $.ajax({
        url: '/postComment.php',
        type: 'POST',
        data: {
            updatedComment: $("#txtarea").val(),
            param: $("#txtarea").parent().find($(".pageid")).val()
        },
        dataType: 'text',
        success: function (data) {
            console.log($("#txtarea").parent().find($(".pageid")).val());
            value = JSON.parse(data);
            var commentData;
            commentData = `<div id="${value.id}" class="thecomments">` +
                '<p>' + value.id + ". " + value.username + '</p>' +
                '<p>' + value.text + '</p>';
            commentData += '<button name="delete" class="del" type="submit">delete</button>';
            commentData += '</div>';
            $('.commentbox').append(commentData);
            attachHandlers();
        }
    });
});