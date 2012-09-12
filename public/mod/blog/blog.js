jQuery(document).ready(function ($) {

    $.get(ppi.baseUrl + 'blog/get_popular_tags', {}, function (response) {

        var content;
        if (response.tags.length == 0) {
            content = '<li><p>No Popular Tags</p></li>';
        } else {
            content = Mustache.render($('#popular-tags-template').html(), response);
        }

        $('#popular-tags-content').html(content);

    }, 'json');

    $.get(ppi.baseUrl + 'blog/get_recent_comments', {}, function (response) {

        var content;
        if (response.comments.length == 0) {
            content = '<li><p>No Recent Comments</p></li>';
        } else {
            content = Mustache.render($('#recent-comments-template').html(), response);
        }

        $('#recent-comments-content').html(content);

    }, 'json');

});