$(function(){

    var $metaTag = $('[name="shopifiable-store"]', 'head'),
        storeURL = $metaTag.attr('value'),
        $grid    = $('#shopifiable-grid');

    // If no valid storeURL available; return immediately and avoid further init...
    if( ! storeURL ){ return; }


    /**
     * If we're on a product detail page...
     */
    var $imageAltsContainer = $('.product-image-opts');
    if( $imageAltsContainer.length ){
        var $mainImg = $('img', '.product-image-main');
        $imageAltsContainer.on('click', 'a', function(  ){
            $mainImg.attr('src', $(this).attr('data-src'));
        });
    }


    /**
     * If we're on the store page and there are items to layout w/ Masonry, do so...
     * @param cartObj
     */
    if( $grid.length ){
        $grid.imagesLoaded(function(){
            $grid.masonry({itemSelector: '.pr-node'});
        });
    }


    /**
     * Handler for the cart view
     * @param cartObj
     */
    function cartHandler( cartObj ){
        var $element = $('<div />', {
            id   :   'shopifiable-cart',
            html : '<div class="inner"><div class="quick-view"><span>'+cartObj.item_count+'</span> Items | <span>$' + (+(cartObj.total_price)/100).toFixed(2) + '</span> | <a href="'+storeURL+'/cart">Checkout</a></div><div class="item-list"></div></div>'
        }).appendTo('body');

        $element.on('click', '.quick-view', function(event){
            if( $(event.target).is('a') ){
                return;
            }

            $element.toggleClass('open');
            if( ! $element.data('loaded') ){
                if( cartObj.item_count >= 1 ){
                    var fragment = document.createDocumentFragment();
                    $.each(cartObj.items, function(index, prodObj){
                        var element = document.createElement('div');
                        element.setAttribute('class', 'item');
                        element.innerHTML = '<img src="'+prodObj.image+'" /><span class="title">'+prodObj.title+'</span>';
                        fragment.appendChild(element);
                    });
                    $('.item-list', $element).append(fragment);
                }
                $element.data('loaded', true);
            }
        });
    }


    /**
     * Query the cart API
     */
    $.ajax({
        url: '_url/cart.json'.replace('_url', storeURL),
        dataType: 'jsonp',
        crossDomain: true,
        type: 'GET',
        success: cartHandler
    });

});