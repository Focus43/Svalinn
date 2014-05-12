;(function( $ ){

    /**
     * Handler for submitting the form via ajax.
     */
    $(document).on('submit', '#frm-contact', function( _event ){
        _event.preventDefault();

        var $form    = $(this),
            _handler = $form.attr('action'),
            _data    = $form.serializeArray();

        $.post(_handler, _data, function( _response ){
            // First, *always* remove any previously set error classes
            $('.columns.error', $form).removeClass('error');
            // If invalid; show errors
            if( !(_response.code === 1) ){
                $.each(_response.messages, function(index, val){
                    $('[data-field="'+val+'"]', $form).addClass('error');
                });
                return;
            }
            // Valid, show response message
            $form.addClass('form-sent');
        }, 'json');
    });

})( jQuery );