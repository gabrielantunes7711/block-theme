$.fn.ytsValidation = function() {
    /* --[>]-- START YTS STYLE --[>]-- */
    // YTS STYLE PARAMETERS
    var yts_css = 'span.yts-error{display: block; width: 100%; font-size: 12px;padding: 10px;text-align: left;background: #fff;border: 1px solid red;border-radius: 5px;z-index: 8;}',
    // CREATE YTS STYLE TAG
    yts_head = document.head || document.getElementsByTagName('head')[0],
    yts_style = document.createElement('style');
  //   yts_style.type = 'text/css';
    // CHECK YTS STYLE
    if (yts_style.styleSheet) {
        yts_style.styleSheet.cssText = yts_css;
    } else {
        yts_style.appendChild(document.createTextNode(yts_css));
    }
    // INSERT YTS STYLE
    yts_head.appendChild(yts_style);
    /* --[X]-- END YTS STYLE --[X]-- */
    /* --[>]-- START YTS PARENT BOX --[>]-- */
    yts_x = 0;
    this.find('input[data-yts-val=true] , select[data-yts-val=true] , textarea[data-yts-val=true]').each(function() {
        yts_x++;
        $(this).before('<div class="yts-box-val" data-val-in="' + yts_x + '" style="position: relative;"></div>')
        $('div[data-val-in=' + yts_x + ']').append($(this));
        $(this).removeAttr('required');
    });
    /* --[X]-- END YTS PARENT --[X]-- */
  
    /* --[>]-- START YTS CAPTCHA --[>]-- */
    this.append('<input type="hidden" name="yts-hiddencaptcha" value="valid-form">');
    /* --[X]-- END YTS CAPTCHA --[X]-- */
  
    /* --[>]-- START YTS SEND VALIDATION --[>]-- */
    this.submit(function() {
        // COUNT VALIDATION VARIABLES
        var inputN = 0;
        var rnText = 0;
        var returnedText = 1;
        // EACH FIELD BEGIN VALIDATION
        $(this).find('input[data-yts-val=true] , select[data-yts-val=true] , textarea[data-yts-val=true]').each(function() {
            numberText = rnText;
            // SET PARENT RELATIVE
            $(this).parent().css('position', 'relative');
            /* --[>]-- START YTS EMAIL VALIDATION --[>]-- */
            // MAIL REGEX
            var testEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            // GET MAIL ATTRs
            var typeEmail = $(this).attr('type');
            var nameEmail = $(this).attr('name');
            var idEmail = $(this).attr('id');
            emailOK = 1;
            if (typeEmail == 'email' || nameEmail == 'email' || nameEmail == 'mail' || idEmail == 'email' || idEmail == 'mail') {
                console.log('1');
                // CHECK IF REGEX IS OK
                if (testEmail.test(this.value)) {
                    console.log('2');
                    emailOK = 1;
                } else {
                    console.log('3');
                    emailOK = 0;
                }
            }
            /* --[X]-- END YTS EMAIL VALIDATION --[X]-- */
            /* --[>]-- START YTS PHONE VALIDATION --[>]-- */
            // PHONE REGEX
            var testTel = /[\d]/g;
            // GET PHONE ATTRs
            var typeTel = $(this).attr('type');
            var nameTel = $(this).attr('name');
            var idTel = $(this).attr('id');
            telOK = 1;
            if (typeTel == 'tel' || nameTel == 'telefone' || nameTel == 'tel' || idTel == 'telefone' || idTel == 'tel') {
                if ($(this).val().length > 0) {
                    // CHECK IF PHONE LENGTH IS GREATER TO 10 NUMBERS
                    if ($(this).val().match(testTel).length >= 10) {
                        telOK = 1;
                    } else {
                        telOK = 0;
                    }
                } else {
                    telOK = 0;
                }
            }
            /* --[X]-- END YTS PHONE VALIDATION --[X]-- */
            /* --[>]-- START YTS CPF VALIDATION --[>]-- */
            // GET CPF ATTRs
            cpfOK = 1;
            var namecpf = $(this).attr('name');
            var valCPF = $(this).val();
            if (namecpf == 'cpf' || namecpf == 'cnpj') {
                if ($(this).val().length > 0) {
                    // Testa a validação
                    if (valida_cpf_cnpj(valCPF)) {
                        cpfOK = 1;
                        // console.log('OK');
                    } else {
                        cpfOK = 0;
                        // console.log('CPF ou CNPJ inválido!');
                    }
                } else {
                    cpfOK = 0;
                }
            }
            /* --[X]-- END YTS CPF VALIDATION --[X]-- */
            // DEFINE THIS INPUT VARIABLE
            var thisInput = $(this);
            /* --[>]-- START YTS FIELD VALIDATION --[>]-- */
            // COMMON FIELD VALIDATION (TEXT, SELECT, TEXTAREA)
            if ($(this).val() == '') {
                // REMOVE ERROR ELEMENT
                $(this).next('.yts-error').remove();
                // SET FIELD BACKGROUND
                $(thisInput).css({ 'background-color': '#ffd6d6' });
                // INSERT NEW ERROR ELEMENT
                var nome = $(thisInput);
                $("<span class='yts-error'>Campo Obrigatório!</span>").insertAfter(nome);
                $(thisInput).css({ 'opacity': '1', 'transition': 'all .5s linear' });
                // RETURN VALUE 0 IF FIELD IS INVALID
                var ret = 0;
            }
            // EMAIL FIELD VALIDATION
            else if (emailOK == 0 && $(this).val() != '') {
                // REMOVE ERROR ELEMENT
                $(this).next('.yts-error').remove();
                // SET FIELD BACKGROUND
                $(thisInput).css({ 'background-color': '#ffd6d6' });
                // INSERT NEW ERROR ELEMENT
                var nome = $(thisInput);
                $("<span class='yts-error'>Insira um email valido!</span>").insertAfter(nome);
                $(thisInput).css({ 'opacity': '1', 'transition': 'all .5s linear' });
                // RETURN VALUE 0 IF EMAIL IS INVALID
                var ret = 0;
            }
            // PHONE FIELD VALIDATION
            else if (telOK == 0 && $(this).val() != '') {
                // REMOVE ERROR ELEMENT
                $(this).next('.yts-error').remove();
                // SET FIELD BACKGROUND
                $(thisInput).css({ 'background-color': '#ffd6d6' });
                // INSERT NEW ERROR ELEMENT
                var nome = $(thisInput);
                $("<span class='yts-error'>Insira um Telefone válido!</span>").insertAfter(nome);
                $(thisInput).css({ 'opacity': '1', 'transition': 'all .5s linear' });
                // RETURN VALUE 0 IF PHONE IS INVALID
                var ret = 0;
            }
            // PHONE FIELD VALIDATION
            else if (cpfOK == 0 && $(this).val() != '') {
                // REMOVE ERROR ELEMENT
                $(this).next('.yts-error').remove();
                // SET FIELD BACKGROUND
                $(thisInput).css({ 'background-color': '#ffd6d6' });
                // INSERT NEW ERROR ELEMENT
                var nome = $(thisInput);
                $("<span class='yts-error'>Insira um CPF ou CNPJ válido!</span>").insertAfter(nome);
                $(thisInput).css({ 'opacity': '1', 'transition': 'all .5s linear' });
                // RETURN VALUE 0 IF PHONE IS INVALID
                var ret = 0;
            }
            // IF FIELD VALUE IS VALID
            else {
                // REMOVE BACKGROUND AND ERROR ELEMENT
                $(this).css({ 'background-color': '#fff' });
                $(this).next('.yts-error').remove();
                // RETURN VALUE 1 IF FIELD IS VALID
                ret = 1;
                // INCREASE VARIABLE TO VALIDATION ACCOUNT
                numberText++;
            }
            /* --[X]-- END YTS FIELD VALIDATION --[X]-- */
            // DEFINE RETURN VARIABLES
            rnText = numberText;
            returnedText = ret;
            inputN++;
            // RETURN VALIDATION ARRAY
            returnArray = { inputN: inputN, rnText: rnText, returnedText: returnedText };
            return returnArray;
        });
        // DEFINE RETURN ARRAY
        returnArray = returnArray;
        // SPLIT ARRAY RETURNED
        inputN = returnArray['inputN'];
        rnText = returnArray['rnText'];
        returnedText = returnArray['returnedText'];
        // REMOVE ALL ERROR ELEMENTS
      //   setTimeout(function() { $('.yts-error').fadeOut() }, 1000);
        // DEFINE VALIDATION VARIABLE
        var rnAll = rnText;
        // CHECK FINAL VALIDATION
        if (rnAll != inputN) {
            // ENABLE SEND BUTTON
            $(this).find('button , input[type=submit]').removeAttr("disabled");
  
            return false;
        } else if (returnedText == 0) {
            // ENABLE SEND BUTTON
            $(this).find('button , input[type=submit]').removeAttr("disabled");
  
            return false;
        } else {
  
            // DISABLE SEND BUTTON
            console.log($(this).find('button'));
            $(this).find('button').attr("disabled", "disabled");
            $(this).find('button').attr('style', 'cursor:wait !important;');
            $(this).find('button , input[type=submit]').html('<i class="fa fa-spinner" aria-hidden="true"></i> enviando...');
            $(this).find('button , input[type=submit]').css("background", "#54595fd6");
            return true;
        }
    })
  }
  $(document).ready(function() {
    $("form").ytsValidation()
  });