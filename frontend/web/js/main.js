$( "#tasks-formcategory" ).change(function() {

    let formName = $('#tasks-formcategory').find(":selected").text();
    console.log( formName );

    if( formName == 'form1'){
        $( "#form2" ).hide();
        $( "#form1" ).show();
    } else if ( formName == 'form2' ){
        $( "#form1" ).hide();
        $( "#form2" ).show();
    }
});