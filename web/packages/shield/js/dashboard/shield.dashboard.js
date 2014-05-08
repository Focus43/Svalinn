/*! Don't worry about minifying as its just for the dashboard */
;(function( $ ){

    var self      = this,
        $document = $(document);


    // tooltips and popover bindings
    $document.tooltip({
        animation: false,
        selector: '.helpTooltip',
        trigger: 'hover'
    }).popover({
        animation: false,
        selector: '.helpTip',
        placement: 'bottom'
    });


    // check all checkboxes
    $document.on('click', '#checkAllBoxes', function(){
        var $this  = $(this),
            checkd = $this.is(':checked');
        $(':checkbox', '#svalinnSearchTable tbody').prop('checked', checkd).trigger('change');
    });


    // if any box is checked, enable the actions dropdown
    $('#svalinnWrap').on('change', '#svalinnSearchTable tbody :checkbox', function(){
        if( $(':checkbox', '#svalinnSearchTable > tbody').filter(':checked').length ){
            $('#actionMenu').prop('disabled', false);
            return;
        }
        $('#actionMenu').attr('disabled', true);
    });


    $('#svalinnWrap').on('change', '#actionMenu', function(){
        var $this   = $(this),
            tools   = $('[name="svalinn-tools"]').attr('content'),
            $checkd = $('tbody', '#svalinnSearchTable').find(':checkbox').filter(':checked'),
            data    = $checkd.serializeArray();

        switch( $this.val() ){
            case 'delete':
                if( confirm('Delete these records? This cannot be undone!') ){
                    var deleteURL = tools + $('#actionMenu').attr('data-action-delete');
                    $.post( deleteURL, data, function(resp){
                        if( resp.code == 1 ){
                            $checkd.parents('tr').fadeOut(150);
                        }else{
                            alert('An error occurred. Try again later.');
                        }
                    }, 'json');
                }
                break;
        }

        // reset the menu
        $this.val('');
    });

})( jQuery );