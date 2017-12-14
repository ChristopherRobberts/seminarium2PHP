$(document).ready(function () {
    var sessionID;
    $.ajax({
        type: "GET",
        url: "/getSession.php",
        success: function (data) {
            sessionID = JSON.parse(data);
            console.log(sessionID);
        }
    });

    $.ajax({
        type: 'POST',
        url: '/getComments.php',
        data: {
            param: $(".pageid").val()
        },
        success: function (data) {
            console.log($(".pageid").val());
            data = JSON.parse(data);
            var commentData = '';
            $.each(data, function (key, value) {
                commentData += `<div id="${value.id}" class="thecomments">`;
                commentData += '<p>' + value.id + ". " + value.username + '</p>';
                commentData += '<p>' + value.text + '</p>';
                if (sessionID == value.username){
                    commentData += '<button name="delete" class="del" type="submit">delete</button>';
                }
                commentData += '</div>';
            });
            $('.commentbox').append(commentData);
            attachHandlers();
        }
    });
});