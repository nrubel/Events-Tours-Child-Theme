;(function($) {
    "use strict";

    $('.go-top').on('click', function(event) {

        var target = $( $(this).attr('href') );

        $('#peternav .nav-link').removeClass('active');

        if( target.length ) {
            event.preventDefault();

            $(this).addClass('active');
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000)
        }

        return false
    });

    // if($('.bottom-tab-trig').length){
    //     // $('.bottom-tab-trig').on('click', function (e) {
    //     //     e.preventDefault();
    //     //     $(this).tab('show')
    //     // })
    //
    //     if( $('.bottom-tab-trig').hasClass('active') )
    //         $('.bottom-tab-trig').removeClass('active');
    // }

    if($('.bottom-tab-trigs').length) {

        $('.btnNext').click(function () {
            $('#pschedule-tabs .active').parent().next('li').find('a').trigger('click');
            console.log('clicked')
        });

        $('.btnPrevious').click(function () {
            $('#pschedule-tabs .active').parent().prev('li').find('a').trigger('click');
            console.log('clicked')
        });
    }

    if($('.flexdatalist').length){
        // var terms_data = terms_data;
        $('.flexdatalist').flexdatalist({
            minLength: 1,
            textProperty: '{name}',
            valueProperty: 'id',
            selectionRequired: true,
            visibleProperties: ["name","description","count"],
            searchIn: 'name',
        });

        $('input[name="flexdatalist-tour_locs"]').attr('placeholder', 'Type, select and press Enter ...');
    }

    $('input[name="flexdatalist-tour_locs"]').on('input', function () {
        // var userText = $(this).val();
        //
        // $("#locs").find("option").each(function() {
        //     console.log($(this).val());
        //     if ($(this).html() == userText) {
        //         console.log("Make Ajax call here.");
        //         $('input[name="tour_locs"]').val( $(this).val() );
        //     }else{
        //         console.log('not found')
        //     }
        // })
        var val = this.value;
        if($('#locs option').filter(function(){
                return this.value === val;
            }).length) {
            //send ajax request
            alert(this.value);
        }
    })

})(jQuery)