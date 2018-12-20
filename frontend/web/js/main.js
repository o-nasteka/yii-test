$(function() {

    // Change Tasks Form
    $( "#tasks-formcategory" ).change(function() {

        const formName = $('#tasks-formcategory').find(":selected").text();
        // console.log( formName );

        if( formName == 'form1'){
            $( "#form2" ).hide();
            $( "#form1" ).show();
        } else if ( formName == 'form2' ){
            $( "#form1" ).hide();
            $( "#form2" ).show();
        } else {
            $( "#form1" ).hide();
            $( "#form2" ).hide();
        }
    });

    // Date Rules Start

    // Readonly input for Date
    $("#tasks-date_start").prop('readonly', true);
    $("#tasks-date_end").prop('readonly', true);
    $("#tasks-date_publication").prop('readonly', true);

    // check StartDate on change
    $( "#tasks-date_start" ).change(function() {
        let checkStartDate =  $('#tasks-date_start').datepicker('getDate');

        let minDate =  new Date();
        if( checkStartDate < minDate){
            $('#tasks-date_start').datepicker('setDate', minDate);
            checkStartDate =  $('#tasks-date_start').datepicker('getDate');
        }

    });

    // check EndDate on change
    $( "#tasks-date_end" ).change(function() {
        let checkEndDate =  $('#tasks-date_end').datepicker('getDate');
        let checkStartDate =  $('#tasks-date_start').datepicker('getDate');
        let minDate = new Date();

        if( checkStartDate != null ){
            // minDate
            let minDate = checkStartDate;
            minDate.setMonth(minDate.getMonth() + 3);
            $('#tasks-date_end').datepicker('setDate', minDate);
        } else {
            // minDate
            let minDate =  new Date();
            minDate.setMonth(minDate.getMonth() + 3);
        }

        if( checkEndDate < minDate){
            $('#tasks-date_end').datepicker('setDate', minDate);
        }
    });

    // check PublicationDate on change
    $( "#tasks-date_publication" ).change(function() {
        let checkStartDate =  $('#tasks-date_start').datepicker('getDate');
        let checkPublicationDate =  $('#tasks-date_publication').datepicker('getDate');

        // console.log('publicationDate: ' + checkPublicationDate);

        // minDate
        let minDate =  new Date();
        minDate.setMonth(minDate.getDay() + 1);

        // console.log('minDate: ' + minDate);
        if( checkStartDate != null ){
            if( checkPublicationDate < checkStartDate){
                $('#tasks-date_publication').datepicker('setDate', checkStartDate);
            }
        } else if( checkPublicationDate < minDate){
            $('#tasks-date_publication').datepicker('setDate', minDate);
            console.log('NewDate: ' + $('#tasks-date_publication').datepicker('getDate'));
        }
    });

    // date Picker format rules


        let date = new Date();

        // date start
        $('#tasks-date_start').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: false,
            changeMonth: true,
            changeYear: true,
            yearRange: '2018:2021',
            defaultDate: date,
            minDate: date,
            maxDate: '+3Y',
            inline: true
        });

        // date end
        $('#tasks-date_end').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: false,
            changeMonth: true,
            changeYear: true,
            yearRange: '2018:2021',
            defaultDate : '+3m',
            minDate: '+3m',
            maxDate: '+3Y',
            inline: true
        });

        // date publication
        $('#tasks-date_publication').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: false,
            changeMonth: true,
            changeYear: true,
            yearRange: '2018:2021',
            defaultDate : '+1d',
            minDate: '+1d',
            maxDate: '+3Y',
            inline: true
        });

    // Date Rules End

    // Submit Form Start
    $( "#form-input1" ).on('beforeSubmit', function( event ) {

        event.preventDefault();

        // Check DateStart and set default
        let checkStartDate =  $('#tasks-date_start').datepicker('getDate');

        if( checkStartDate == null){
            $('#tasks-date_start').datepicker('setDate', new Date());
            let newCheckDate = $('#tasks-date_start').datepicker('getDate');
        }

        let data = $(this).serialize();
        $.ajax({
            url: '/site/sendmail',
            type: 'POST',
            data: data,
            success: function(res){
                // console.log(JSON.parse(res));
                console.log(res);
                $('#modal-messages').modal('show');
                setTimeout(function() {
                    $('#modal-messages').modal('hide');
                    }, 15000);

            },
            error: function(){
                console.log('Error!');
            }
        });
        return false;
    });


});
