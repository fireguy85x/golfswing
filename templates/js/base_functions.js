/**
 * set datepicker region values
 */
function setDatepickerRegionValues() {
    $.datepicker.regional['es'] = {
        changeMonth: true,
        changeYear: true,
        defaultDate: '01-01-85',
        yearRange: "-115:-8", // last hundred years
        maxDate: "-8Y",
        minDate: "-85Y",
        closeText: 'Cerrar',
        prevText: '←',
        nextText: '→',
        currentText: 'Hoy',
        monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
            'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
        monthNamesShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun',
            'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
        dayNames: ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'],
        dayNamesShort: ['dom', 'lun', 'mar', 'mier', 'juev', 'vier', 'sab'],
        dayNamesMin: ['d', 'l', 'm', 'mx', 'j', 'v', 's'],
        weekHeader: 'Semana',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
}

/**
 * log value to console
 * @param sValue mixed
 */
function _d(mValue) {
    if (console) {
        if (console.log) {
            console.log(mValue);
        }
    } else {
        return false;
    }
    return true;
}

/**
 * set default validation trough jqeury
 * also add errors div construction for fancybox showing errors
 */
function setDefaultValidationStuff() {
    $.validator.addMethod("password",function(a,b,c){return this.optional(b)||/^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\W])(?=.*[\d]).*$/.test(a)},jQuery.format("Enter a secure password (at least 8 characters including at least one punctuation mark, one uppercase letter, one digit)"))
    
    $.validator.addMethod("equalPassword",function(value,element){
        _d(value);
        _d($('#password').val());
            return (value === $('#password').val());
        }, "Los passwords no coinciden"
    );
        
    $.validator.addMethod("equalEmails",function(value,element){
            return (value === $('#email').val());
        }, "Los emails no coinciden"
    );
        
    $('form.validate').each(function(index, form) {
        var jForm = $(form);
        jForm.validate({
            focusInvalid: true,
            errorContainer: jForm.find('.errorBox'),
            errorLabelContainer: jForm.find('.errorBox ul'),
            wrapper: "li"
        });
        
        // Validate the confirmation of the passwords
        if($('input#password_repeat').length){
            $('input#password_repeat').rules( "add", {
              equalPassword: true,
              messages:{
                  equalMails: "Los passwords no coinciden"
              }
            });
        }
        
        // Validate the confirmation of the emails
        if($('input#email_repeat').length){
            $('input#email_repeat').rules( "add", {
              equalEmails: true,
              messages:{
                  equalMails: "Los emails no coinciden"
              }
            });
        }
        
        // Validate the confirmation of the emails
        if($('input#username').length){
            $('input#username').rules( "add", {
                remote:{
                    url: '',
                    type: "post",
                    data:
                    {
                        "action-user-profile": "ajax-check-username"
                    },
                    success: function(data)
                    {
                        die(data);
                    }
                }
            });
        }
    });
                
    /* Validation */
//    $.validator.addMethod("equalMails",function(value,element){
//            return (value === $('#email').val());
//        }, "Los emails no coinciden"
//    );
//    
//    $.validator.addMethod("dni",function(value,element){
//            return(checkDocument(element));
//        }, "Documento no válido"
//    );
//    
     
    /* validate form with fancybox */
    $("form.validate").each(function() {
//        $(this).validate({
//            ignore: "",
//            focusInvalid: true,
//            errorLabelContainer: "#validationErrors ul#errors",
//            wrapper: "li"
//            
//        });
        
        // Validate emails
//        $('input#email').rules("add", {
//          email: true,
//          messages: {
//            email: "Introduzca un email válido"
//          }
//        });
//        
        
//        
//        // Validate the confirmation of the emails
//        $('input.dni').rules( "add", {
//          dni: true,
//          messages: {
//              dni: "Introduzca un documento válido"
//          }
//        });
        
    });


}


/**
 * Scroll top
 * @returns {undefined}
 */
function scrollTop(){
    if($(window).width() > 767){
        return $('html, body').animate({scrollTop: 0}, 100).promise();
    }else{
        return null;
    }
}

/**
 * 
 * @returns {undefined}
 */
function showDialog(title,content,confirm){
    confirm = confirm || false;
    $('#dialog').attr('title',title);
    if(confirm){
        $('#dialog').html('<div class="column-25 float-left"><img src="/templates/images/tick-green.png" /></div><div class="column-66 float-right">' + content + '</div>');
    }else{
        $('#dialog').html('<p>' + content + '</p>');
    }

    $('#dialog').dialog({
        modal: true,
        show: "fade",
        hide: "fade",
        closeOnEscape: false,
        height: 200,
        open: function(event, ui) { 
            $(".ui-dialog-titlebar-close").hide(); 
        },
        buttons:{
            "accept":{
                text: "Aceptar",
                click: function(){
                    $(this).dialog("destroy");
                }
            }
        }
    });
}


/**
 * set table sorter functionality
 */
function setTableSorterStuff() {
    var table = $("table.sorted").
    DataTable( {
        language: {
            paginate: {
                previous: '«',
                next:     '»'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next:     'Next'
                }
            }
        },
        "dom": 'lrtip',
        "searching": true,
        "lengthChange": false,
        "info": false
    } );
    
    
    return table;
}


/**
 * confirm a onclick
 * @param subject string
 * @return mixed true/false/redirect
 */
function confirmChoice(subject) {
    return confirm("Delete '" + subject + "' Are you sure?");
}

/**
 * show the status update
 * @param message string
 */
function showStatusUpdate(message) {
    $('#general-status-container #general-status').html(message)
    $('#general-status-container').fadeIn('slow',function() {
        $(this).delay(3500).fadeOut(1000);
    });
}
