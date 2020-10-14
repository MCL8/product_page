$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let widget = new cp.CloudPayments();
    let pay = function (currency, amount, product_id) {
        widget.pay('auth', // или 'charge'
            { //options
                publicId: 'test_api_00000000000000000000001', //id из личного кабинета
                description: 'Оплата товаров', //назначение
                amount: amount, //сумма
                currency: currency, //валюта
                skin: "mini", //дизайн виджета (необязательно)
                data: {
                    myProp: 'myProp value'
                }
            },
            {
                onSuccess: function (options) {
                    $.ajax({
                        method: 'post',
                        url: '/payment/pay',
                        data: {
                            currency: currency,
                            amount: amount,
                            product_id: product_id
                        },
                        success: function () {
                            location.reload();
                        }
                    });
                },
                onFail: function (reason, options) {

                },
                onComplete: function (paymentResult, options) { //Вызывается как только виджет получает от api.cloudpayments ответ с результатом транзакции.
                    //например вызов вашей аналитики Facebook Pixel
                }
            }
        )
    };

    $('.buy-btn').click(function () {
        let currency = $(this).data('currency');
        let amount = $(this).data('price');
        let productId = $(this).data('id');

        pay(currency, amount, productId);
    });

});
