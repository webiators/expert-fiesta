define([
    'jquery'
], function ($) {
    "use strict";
    return function (config, element) {
        $(element).click(function () {
            var form = $(config.form),
                baseUrl = form.attr('action'),
                addToCartUrl = 'checkout/cart/add',
                buyNowBtnCartUrl = 'buynowbtn/cart/add',
                buyNowUrl = baseUrl.replace(addToCartUrl, buyNowBtnCartUrl);
            form.attr('action', buyNowUrl);
            form.trigger('submit');
            form.attr('action', baseUrl);
            return false;
        });
    }
});