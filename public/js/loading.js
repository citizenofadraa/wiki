$(document).ready(function () {
    function fetchPosts() {
        var chatId = window.location.pathname.split('/').pop();
        $.ajax({
            url: '/chat/' + chatId,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                updateTable(data.posts);
            },
            error: function (error) {
                console.log('Error:', error);
            },
        });
    }

    function updateTable(posts) {
        var tableBody = $('#postsTable tbody');
        tableBody.empty();

        if (posts.length > 0) {
            $.each(posts, function (index, post) {
                var row = '<tr>' +
                    '<td><b>Používateľ:</b> ' + post.pouzivatel + '<br>' +
                    '<b>Komentár:</b> ' + post.text + '<br>' +
                    '</td>' +
                    '<td><a href="/deletePost/' + post.id + '">Delete</a></td>' +
                    '</tr>';
                tableBody.append(row);
            });
        } else {
            var emptyRow = '<tr><td colspan="2">No posts found for this forum</td></tr>';
            tableBody.append(emptyRow);
        }
    }

    fetchPosts();

});
