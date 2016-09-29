/**
 * Created by floe on 09/03/16.
 */
jQuery(function($) {
    var avatars = $('div.avatar');

    avatars.click(function() {
        $('div.avatar.chosen').removeClass('chosen');
        $(this).addClass('chosen');
        var img_data = $(this).data('radio');
        var radio = $('input[data-avatar="'+img_data+'"]');
        radio.click();
        radio.val($(this).data('alt'));
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
        format: 'YYYY-MM-DD',
        locale: moment.locale('de'),
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

    $(".draggable").draggable({
        revert: function (event, ui) {
            return !event;
        }
    }).on('dragged', function() {
        var draggable = $(this);
        draggable.find('.row.flex').removeClass('flex');
        draggable.find('.image').removeClass('col-md-3');
        draggable.find('.number').removeClass('col-md-3');
        draggable.find('.name').removeClass('col-md-6');
        draggable.find('> .row').after('<a href="#" class="remove-player"><i class="fa fa-remove"></i></a>');

        var droppable = draggable.parent();
        droppable.find('input[type="hidden"]').val(draggable.data('id'));
        droppable.css({ border: 'none' });
        droppable.find('.position').hide();

        $('.remove-player').click(function(e) {
            e.preventDefault();

            var parent = $(this).parent();
            var players_list = $('.players-in .participants');

            parent.find('> .row').addClass('flex');
            parent.find('.image').addClass('col-md-3');
            parent.find('.number').addClass('col-md-3');
            parent.find('.name').addClass('col-md-6');
            $(this).remove();

            var droppable = parent.parent();
            droppable.css({ border: '2px dotted lightgray' });
            droppable.find('.position').show();
            droppable.droppable('option', 'accept', '.draggable');
            droppable.find('input[type="hidden"]').val('');

            parent.detach().appendTo(players_list);
        });
    });

    $(".droppable").droppable({
        drop: function(ev, ui) {
            $(this).droppable('option', 'accept', ui.draggable);

            $(ui.draggable).detach().css({top: 0,left: 0}).appendTo(this).trigger('dragged');
        },
        over: function(ev, ui) {
            $(this).css({ border: '2px dotted #2e6da4' });
        },
        out: function(ev, ui) {
            $(this).css({ border: '2px dotted lightgray' });
            $(this).find('.position').show();
            $(this).find('input[type="hidden"]').val('');
            $(this).droppable('option', 'accept', '.draggable');
        }
    });

    var mode = $('.participants.lineup').data('mode');

    var hiddens = $('.participants.lineup #'+mode+' input[type="hidden"], .bench input[type="hidden"]');

    hiddens.each(function() {
        if($(this).val()) {
            var droppable = $(this).parent();
            var player = $('.draggable[data-id="'+$(this).val()+'"');

            player.detach().appendTo(droppable).trigger('dragged');
            droppable.droppable('option', 'accept', player);
        }
    });

    $('.droppable-lineup:not(#'+mode+')').hide().find('input[type="hidden"]').prop('disabled', true);

    var previous;

    $('select[name="mode"]').focus(function() {
        previous = this.value;
    }).on('change', function(e) {
        var remove_links = $('.lineup .remove-player');
        if(remove_links.length > 0) {
            var $this = $(this);
            bootbox.confirm({
                title: 'Weißt du eh, was du tust?',
                message: 'Aufpassen: Damit wird deine alte Aufstellung komplett gelöscht!',
                buttons: {
                    'cancel': {
                        label: 'Oh Gott, nein!',
                    },
                    'confirm': {
                        label: 'Ma wuascht!',
                    }
                },
                callback: function(result) {
                    if(result) {
                        remove_links.click();
                        $('.droppable-lineup').each(function() {
                            console.log($(this).find('input[type="hidden"]'));
                            $(this).hide().find('input[type="hidden"]').prop('disabled', true);
                        });
                        $('#'+$this.val()).show().find('input[type="hidden"]').prop('disabled', false);
                    } else {
                        $this.val(previous);
                    }
                }
            });
        } else {
            $('.droppable-lineup').hide().each(function() {
                console.log($(this).find('input[type="hidden"]'));
                $(this).find('input[type="hidden"]').prop('disabled', true);
            });
            $('#'+$(this).val()).show().find('input[type="hidden"]').prop('disabled', false);
        }

    });

    var game_lineup = $('#game-lineup');

    game_lineup.on('shown.bs.collapse', function () {
        $("#game-lineup-arrow").removeClass("fa-angle-right").addClass("fa-angle-down");
    });

    game_lineup.on('hidden.bs.collapse', function () {
        $("#game-lineup-arrow").removeClass("fa-angle-down").addClass("fa-angle-right");
    });

    if($('#quill-text').length > 0) {
        var quill = new Quill('#quill-text', {
            placeholder: 'Wos wüst?',
            theme: 'snow'
        });

        $('.ql-editor').html($('#text').val());

        quill.on('text-change', function() {
            console.log(JSON.stringify($('.ql-editor').html()));
            $('#text').val(JSON.stringify($('.ql-editor').html()));
        });
    }

    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-33.8902, 151.1759),
        new google.maps.LatLng(-33.8474, 151.2631));

    var input = document.getElementById('location');
    var options = {
        //bounds: defaultBounds,
        //types: ['establishment']
    };

    if(input) {
        autocomplete = new google.maps.places.Autocomplete(input, options);
    }
});