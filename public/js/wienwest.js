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
        radio.val(img.attr('alt'));
    });

    var home = $('input[name="home"]');
    var location = $('input[name="location"]');
    home.bootstrapSwitch({
        'onText': 'Heim',
        'offText': 'Auswärts',
        'state': true,
        'onSwitchChange': function() {
            if (home.prop('checked')) {
                location.val('ASV 13 Platz');
            } else {
                location.val('');
            }
        }
    });

    var home_switch = $('.bootstrap-switch');

    $('input[name="date"]').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    var start_time = $('input[name="start_time"]');
    var meeting_time = $('input[name="meeting_time"]');

    start_time.datetimepicker({
        format: 'HH:mm'
    });

    start_time.on('focusout', function() {
        if($(this).val() && !meeting_time.val()) {
            var time_array = $(this).val().split(':');
            var new_hour = time_array[0] > 0 ? time_array[0] - 1 : time_array[0];
            meeting_time.val((new_hour < 10 && new_hour != '00' ? '0' : '') + new_hour + ':' + time_array[1]);
        }
    });

    meeting_time.datetimepicker({
        format: 'HH:mm'
    });

    /* reply */
    var reply_buttons = $('#reply-buttons button');

    reply_buttons.click(function() {
        $('.btn-group .selected').removeClass('selected');
        $(this).addClass('selected');

        $('input[name="in"]').val($(this).data('option'));

        var label = $('label[for="content"]');

        switch($(this).data('option')) {
            case 'in':
                label.html('Fantastisch! Gibt\'s noch irgendwas dazu zu sagen?');
                break;
            case 'maybe':
                label.html('Was soll das heißen "vielleicht"?');
                break;
            case 'out':
                label.html('Na toll... Und warum bitte nicht?');
                break;
            default:
                break;
        }
    });

    var recurring = $('input[name="recurring"]');
    var recurring_times = $('div.recurring-times');

    recurring[0] && !recurring[0].checked ? recurring_times.toggle() : '';

    recurring.on('change', function() {
        recurring_times.toggle();
    });
});