(function ($) {
    $('.activity-note-add').click(function (e) {

        e.preventDefault();

        var add_date_val = true;
        var add_note_cat_val = true;
        var add_note_media_val = true;

        console.log("here note");
        var category = $('ul[data-select-name="category"] li.selected').attr('data-option-value');
        console.log(category);
        var media = $('ul[data-select-name="multimedia"] li.selected').attr('data-option-value');
        console.log(media);
        var note_add_date = $('#add_note_form input[name="note_add_date"]').val();
        console.log(note_add_date);
        //validation part
        if(note_add_date == '') {
            $('#add_note_form input[name="note_add_date"]').css("border", "1px solid red");
            add_date_val = false;
        } else {
            $('#add_note_form input[name="note_add_date"]').css("border", "1px solid white");
            add_date_val = true;
        }
        if(category == "category") {
            $('#add_note_form input[name="category"]').parent().parent().css("border","1px solid red");//more efficient
            add_note_cat_val = false;
        } else {
            $('#add_note_form input[name="category"]').parent().parent().css("border","1px solid white");//more efficient
            add_note_cat_val = true;
        }
        if(media == "addmedia") {
            $('#add_note_form input[name="multimedia"]').parent().parent().css("border", "1px solid red");
            add_note_media_val = false;
        } else {
            $('#add_note_form input[name="multimedia"]').parent().parent().css("border","1px solid white");//more efficient
            add_note_media_val = true;
        }
        if(add_date_val && add_note_media_val && add_note_cat_val) {
            $.ajax({
                type: "POST",
                url: '/members/ajax_render/ajax_note.php',
                data: {cat_id: category, note_date: note_add_date, note_media: media},
                success: function(data){
                    var object_response = JSON.parse(data);
                    console.log(object_response);
                    if(object_response.message == "true") {
                        var li_html = "<li>\n" +
                            "                                        <!-- Activity Item Start -->\n" +
                            "                                        <div class=\"activity--item\">\n" +
                            "                                            <div class=\"activity--avatar\">\n" +
                            "                                                <a href=\"member-activity-personal.php\">\n" +
                            "                                                    <img src=\"img/activity-img/avatar-08.jpg\" alt=\"\">\n" +
                            "                                                </a>\n" +
                            "                                            </div>\n" +
                            "\n" +
                            "                                            <div class=\"activity--info fs--14\">\n" +
                            "                                                <div class=\"activity--header\">\n" +
                            "                                                    <p><a href=\"member-activity-personal.php\">" +
                                                                                    object_response.user_name +
                                                                                            "</a> posted\n" +
                            "                                                        an Note on " + object_response.category + "</p>" +
                            "                                                </div>\n" +
                            "\n" +
                            "                                                <div class=\"activity--meta fs--12\">\n" +
                            "                                                    <p><i class=\"fa mr--8 fa-clock-o\"></i>" + object_response.note_date + "</p>\n" +
                            "                                                </div>\n" +
                            "\n" +
                            "                                                <div class=\"activity--content\">\n" +
                            "                                                    <p>It is a long established fact that a reader will be distracted by\n" +
                            "                                                        the readable content of a page when looking at its layout. The\n" +
                            "                                                        point of using Lorem Ipsum.</p>\n" +
                            "                                                </div>\n" +
                            "                                            </div>\n" +
                            "                                        </div>\n" +
                            "                                        <!-- Activity Item End -->\n" +
                            "                                    </li>";
                        $(".activity--items").append(li_html);
                    }
                }
            });
        }

        // $('.note-add-modal').modal('toggle');
    });

    $('.view_note_submit').click(function(e){
        e.preventDefault();

        var view_date_val = true;
        var view_cat_val = true;

        var view_date = $('#view_note_form ul[data-select-name="view_date"] li.selected').attr('data-option-value');
        var view_cat = $('#view_note_form ul[data-select-name="view_category"] li.selected').attr('data-option-value');

        console.log("view_date", view_date);
        console.log("view_cat", view_cat);
        if(view_date == 'date') {
            $('#view_note_form ul[data-select-name="view_date"] li.selected').parent().parent().css("border", "1px solid red");
            view_date_val = false;
        } else {
            $('#view_note_form ul[data-select-name="view_date"] li.selected').parent().parent().css("border", "1px solid white");
            view_date_val = true;
        }

        if( view_cat == 'category') {
            $('#view_note_form ul[data-select-name="view_category"] li.selected').parent().parent().css("border", "1px solid red");
            view_cat_val = false;
        } else {
            $('#view_note_form ul[data-select-name="view_category"] li.selected').parent().parent().css("border", "1px solid white");
            view_cat_val = true;
        }
        if(view_date_val && view_cat_val) {
            $('#view_note_form').submit();
        }
    });

})(jQuery);