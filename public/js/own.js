$( document ).ready(function() {

    // put values year in select box year

    //$('.year');
    var options = '';
    var d = new Date();
    var n = d.getFullYear();
    var selected = '';
    var currentYear = (new Date()).getFullYear();
    for(var i = currentYear; i >= 1990; i--){
        if(i == n){
            options += "<option selected value='"+ i +"' >"+ i +"</option>";
        }else{
            options += "<option value='"+ i +"' >"+ i +"</option>";
        }

    }
    $('.year option').after(options);

    // display none message

    $('.alert-btn').click(function(){
        $('.alert').css({'display': 'none'});
    });

    var msg = $('.d-alert');
    if(msg.length){
        $('.alert').css({'right':0, 'transition': 'all  .7s', '-webkit-transition': 'all .7s'});
        setTimeout(function(){
            $('.alert').fadeOut('slow');
        }, 7000);
    }


    // file upload show html filenam


    $('#my-file').change(function() {
        var filename = $('#my-file').val().replace("C:\\fakepath\\", "");
        $("#my-filename").attr("placeholder",  filename);
    });

    var highestBox =0;
    $('.account-card', this).each(function(){
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
            highestBox = $(this).height();
        }
    });

    // Setup - add a text input to each footer cell
    $('.userTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('.userTable').DataTable({
        "pageLength": 25,
        "lengthMenu": [ 5, 10, 25, 50 ]
    });

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( '.userTable input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('.score-content input').keyup(function(event){
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, 0);
        }
        if($.isNumeric(String.fromCharCode(event.which))){
            var inputs = $(this).closest('.score-content').find(':input');
            inputs.eq(inputs.index(this) + 1).focus().select();
        }
    });



    $('.stepper').tuanStepper();
    // home icons info animation
    if($('.user-info-wrap').length) {

        function loop(index) {
            console.log(index);
            if(index < 4) {
                $('.user-info-wrap > div:eq(' + index + ')').animate({'top': '-50'}, {
                    duration: 100,
                    complete: function () {
                        $('.user-info-wrap > div:eq(' + index + ')').delay(100).animate({'top': 0}, {
                            duration: 100,
                            complete: loop(index + 1)
                        });
                    }
                });
            }

        }
        loop(0);
    }
    // Pevent smaen value on multiple select

    $(".existing-select").change(function()
    {
        var arr=[];
        var selected = $(".existing-select option:selected");
        // create array of values to be desabled
        $(selected).each(function()
        {
            arr.push($(this).val());
        });


        $(".custom-select option").filter(function()
        {
            return $.inArray($(this).val(),arr)>-1;
        }).attr("disabled","disabled");
        // remove attr diabled to send data for php
        $(selected).each(function(){
            $(this).removeAttr('disabled');
        })
    });


    $("#input-1").rating();
    $("#input-2").rating();


});



(function( $ ){
    $.fn.tuanStepper = function(e) {
        // steps active and inactive
        $('.step-new-content:eq(0)').css({'display': 'block'});

        $('.step .step-title ').click(function () {
            active($(this).closest('.step').index() );
        });

        $('.next-step').click(function () {
            var emailIndex = $(this).closest('.step').index();
            var email = $(".email:eq( " + emailIndex +" )" ).val()
            if(validateEmail(email)) {
                var index = ($(this).closest('.step').index() + 1)
                active(index);
            }else{
                $(".email-danger:eq(" + emailIndex + ")").html('Email not correct')
            }

        });

        $('.previous-step').click(function () {
            var index = ($(this).closest('.step').index() - 1)
            active(index);
        });

        // display o class or not
        function active(index) {
            $.each($(".step-new-content"), function(){
                $(this).css({'display': 'none'});
                $( ".step-new-content:eq( " + index +" )" ).css({'display': 'block'});

            });
        }

        // display on based on user click
        $('.step .existing').click(function () {
            var existing = $(this).closest('.step');
            var temp =    $(this).closest('.step');
            existing.find('.existing-user').addClass('active');
            temp.find('.temp-user').removeClass('active');
            existing.find('.existing-select').attr('name', 'person[player][]');
            existing.find('.temp-username').removeAttr('name');
            existing.find('.temp-email').removeAttr('name');
        });

        // display on based on user click reverse
        $('.step .temp').click(function () {
            var temp = $(this).closest('.step');
            var existing = $(this).closest('.step');
            temp.find('.temp-user').addClass('active');
            existing.find('.existing-user').removeClass('active');
            existing.find('.existing-select').removeAttr('name');
            existing.find('.temp-username').attr('name', 'person[username][]');
            existing.find('.temp-email').attr('name', 'person[email][]');
        });

    };
})( jQuery );

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}
