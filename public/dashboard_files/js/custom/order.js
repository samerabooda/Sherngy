$(document).ready(function () {
// add product button
    $('.add-product-btn').on('click',function (e) {
        e.preventDefault();

        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'),2);

             $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html = `<tr>
        <td>${name}</td>
<!--        <input type="hidden" name="product_id[]" value="${id}">-->
        <td><input type="number" name="product[${id}][quantity]" data-price="${price}" class="form-control product-quant" min="1" value="1"></td>
        <td class="price">${price}</td>
        <td><button class="btn btn-danger btn-sm remove-product" data-id="${id}"><span class="fa fa-trash"></span></button></td>


</tr>`;
        $('.order-list').append(html);

        //calculate total

        calculateTotal();

    });

// click disabeld button
    $('body').on('click','.disabled',function (e) {
       e.preventDefault();
    });

// remove product
   $('body').on('click','.remove-product',function (e) {
        e.preventDefault();

        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-'+id).removeClass('btn-default disabled').addClass('btn-success');

       //calculate total

       calculateTotal();

    });

//when change quantany
$('body').on('keyup change','.product-quant',function () {
    var quantaty = parseInt($(this).val());
    var  unitPrice = parseFloat($(this).data('price').replace(/,/g, ''));

    $(this).closest('tr').find('.price').html($.number(quantaty * unitPrice,2));

    calculateTotal();

});

// show product

    $('body').on('click','.order-products',function (e) {
        e.preventDefault();

        let url = $(this).data('url');

        $.ajax({
            url:url,
            method:'get',
            beforeSend:function(){
              $('#loading').css('display','flex');
            },
            success:function (data){
                $('#loading').css('display','none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);
            }
        })
    })

    
    $(document).on('click','.print-btn',function () {
        $('#print-area').printThis();
    })

});

// calculate numbers
function calculateTotal() {
    var price = 0;

    $('.order-list .price').each(function ($index) {
        price+= parseFloat($(this).html().replace(/,/g, ''));
    });

    $('.total-price').html($.number(price,2));


    if (price > 0){
        $('#add-order-form-btn').removeClass('disabled');
    }else{
        $('#add-order-form-btn').addClass('disabled');

    }


}