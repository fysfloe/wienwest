/**
 * Created by floe on 09/03/16.
 */
jQuery(function($) {
    var avatars = $('div.avatar');

    avatars.click(function() {
        $('div.avatar.chosen').removeClass('chosen');
        $(this).addClass('chosen');
        var img = $(this).find('img');
        var img_data = img.data('radio');
        var radio = $('input[data-avatar="'+img_data+'"]');
        radio.click();
        var url = img.attr('src');
        var split = url.split('/');
        var img_name = split[split.length-1];
        radio.val(img_name);
    });

    var home_switch = $('input[name="home"]');
    home_switch.bootstrapSwitch({
        'onText': 'Heim',
        'offText': 'Auswärts'
    });

    $('input[name="date"]').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});