$('.check-coupon-input input').on('change', function() {
    var checked = $('input[name=is_coupon]:checked', '.check-coupon-input').val();
    if(checked){
        var html = '<div class="row">'+
                        '<div class="col-sm-10">'+
                            '<input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter valid coupon code.">'+
                            '<span style="color:red" id="error-coupon-code"></span>'+
                        '</div>'+
                        '<div class="col-sm-2">'+
                            '<button type="button" class="btn btn-info btn-md coupon-apply-btn">Apply Coupon</button>'+
                        '</div>'+
                    '</div>';
        $('#coupon-input-field').html(html);
    }else{
        $('#coupon-input-field').html('');
    }
});

$(document).on('keyup', '#coupon_code', function(){
    var code = $(this).val();
    if(code.length > 6){
        $('#error-coupon-code').html('Invalid code');
    }else{
        $('#error-coupon-code').html('');
    }
});

$(document).on('click', '.coupon-apply-btn', function(){
    var url = $('#get-coupon-url').val();
    var coupon_code = $('#coupon_code').val();
    var sub_total = $('input[name=priority_id]:checked', '.form-check').attr('data-price');
    if(coupon_code.length == 0){
        $('#error-coupon-code').html('Enter code!');
    }else if(coupon_code.length < 6 || coupon_code.length > 6){
        $('#error-coupon-code').html('Invalid code');
    }else{
        $('#error-coupon-code').html('');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to apply coupon code!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, apply it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : url,
                    data : {'coupon_code' : coupon_code, 'sub_total' : sub_total},
                    type : 'GET',
                    success : function(response){
                        console.log(response);
                        if(response=='in-active'){
                            Swal.fire(
                                'Sorry!',
                                'This is in-active coupon.',
                                'warning'
                            )
                        }else if(response=='expired'){
                            Swal.fire(
                                'Expired!',
                                'Sorry coupon is expired.',
                                'warning'
                            )
                        }else if(response=='max-limit'){
                            Swal.fire(
                                'Max Limitation!',
                                'You have used coupon max time.',
                                'warning'
                            )
                        }else if(response==1){
                            location.reload();
                        }else{
                            Swal.fire(
                                'Not Found!',
                                'Coupon not found.',
                                'warning'
                            )
                        }
                    } 
                });
            }
        })
    }
});

$(document).on('click', '.coupon-remove-btn', function(){
    var url = $('#remove-coupon-url').val();
    Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to remove coupon!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : url,
                    data : {'coupon' : 'used_coupon'},
                    type : 'GET',
                    success : function(response){
                        if(response){
                            location.reload();
                        }else{
                            Swal.fire(
                                'Not Removed!',
                                'Something went wrong try again.',
                                'warning'
                            )
                        }
                    }
                });
            }
        })
});

$('.form-check-input').on('change', function() {
    var price = $('input[name=priority_id]:checked', '.form-check').attr('data-price');
    $('.package-price').html('$'+ price+' USD');
    $('#grand-total-btn').html('Pay Only $'+ price + ' USD');
    $('#grand-total-amount').val(price);
});

$(document).ready(function(){
    var price = $('input[name=priority_id]:checked', '.form-check').attr('data-price');
    $('.package-price').html('$'+ price+' USD');
    $('#grand-total-btn').html('Pay Only $'+ price + ' USD');
    $('#grand-total-amount').val(price);
});

$(document).on('click', '#proceed-btn', function(){
    $('.proceed-payment').css('display', 'block');
});