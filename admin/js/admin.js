jQuery(document).ready(function ($) {

    var custom_uploader;

    $('#upload_image_button').click(function (e) {

        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            frame:  "post",  
            state:   "gallery-edit",            
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        custom_uploader.on("update", function(){
            var length = custom_uploader.state().attributes.library.length;
            var images = custom_uploader.state().attributes.library.models;

            var img_array = [];
            for(var iii = 0; iii < length; iii++)
            {
                var image_url = images[iii].changed.url;
                img_array.push(image_url);
            }
            $('#dg_images').val(img_array);
        });

        custom_uploader.open();

    });

});