<?php 
    $whatsapp_fone = get_field('whatsapp', 'option');
    $whats_number = preg_replace("/[^0-9]/", "", $whatsapp_fone);
    // $whats_number = "5511991023568";
    // $whats_button = ".call-modal";

    if(isset($_POST['modal-form'])){
        echo '<script>', 'window.location.href = "https://wa.me/55'. $whats_number .'";', '</script>';
    }
?>

<style>
    .whats-modal *{
        box-sizing: border-box;
        /* transition: none; */
    }

    .whats-modal.open{
        visibility: visible;
        opacity: 1;
        top: 50%;
    }

    .whats-modal{
        width: 95%;
        max-width: 400px;
        background-color: #fff;
        border-radius: 6px;
        position: fixed;
        z-index: 100;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;

        box-shadow: 0 0 0 999999px rgba(0,0,0,0.7);
        visibility: collapse;
        opacity: 0;


        transition: box-shadow 0.1s, opacity 0.3s, top 0.5s;
    }

    /* .whats-modal::after{
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    } */

    .whats-modal h2{
        margin: 0 0 10px 0;
        font-size: 24px;
        line-height: 36px;
        color: #09173c;
        font-weight: bold;
    }

    .whats-modal h2 i{
        background: #009e3f;
        width: 36px;
        height: 36px;
        margin: 0 3px 0 0;
        font-size: 16px;
        line-height: 36px;
        color: #ffffff;
        text-align: center;
        font-weight: normal;
        border-radius: 18px;
        vertical-align: middle;
    }

    .whats-modal p{
        margin: 0 0 15px 0;
        font-size: 14px;
        line-height: 18px;
        font-weight: bold;
    }

    .whats-modal .form-control{
        position: relative;
        width: 100%;
        margin: 0 0 10px 0;
    }

    .whats-modal .form-control input{
        width: 100%;
        border: none;
        background: #e8e8e8;
        padding: 12px 15px 12px 45px;
        font-size: 16px;
        border-radius: 5px;
        color: #09173c;
    }
    .whats-modal .form-control input::placeholder{
        color: #09173c;
    }
    .whats-modal .form-control input::-moz-placeholder{
        color: #09173c;
    }
    .whats-modal .form-control input:-ms-input-placeholder{
        color: #09173c;
    }
    .whats-modal .form-control input:-moz-placeholder{
        color: #09173c;
    }
    .whats-modal .form-control input::-webkit-input-placeholder{
        color: #09173c;
    }

    .whats-modal .form-control i{
        width: 30px;
        font-size: 16px;
        color: #06112d;
        text-align: center;
        position: absolute;
        top: 0;
        left: 10px;
        z-index: 1;
        transform: none;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-button{
        text-transform: uppercase;
        background: #00b047;
        padding: 5px 15px;
        width: 100%;
        font-size: 17px;
        line-height: 21px;
        color: #ffffff;
        font-weight: bold;
        letter-spacing: -0.5px;
        text-align: center;
        border: none;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-button i{
        background: #009e3f;
        padding: 10px;
        margin: 0 0 0 10px;
        border-radius: 5px;
    }

    button.close_modal{
        background: #971515;
        width: 30px;
        height: 30px;
        font-size: 20px;
        color: #ffffff;
        font-weight: bold;
        text-align: center;
        position: absolute;
        top: -15px;
        right: -15px;
        z-index: 10;
        border-radius: 15px;
        border: none;
        cursor: pointer;
    }
</style>

<div class="whats-modal">
    <h2><i class="fab fa-whatsapp"></i> Fale por Whatsapp</h2>
    <p class="modal_favor">Por favor, cadastre-se para conversar. Teremos todo o prazer em ajudar!</p>
    <form action="<?= get_field('pagina_de_resposta_home', 'option'); ?>" method="POST">
        <?php $actual_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>
        <input type="hidden" name="url" value="<?= $actual_url ?>">
        <input type="hidden" name="modal-form" value="true">
        <input type="hidden" name="form" value="whatsapp">
        <div class="form-control">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input data-yts-val="true" required name="nome" placeholder="Nome" type="text">
        </div>
        <div class="form-control">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input data-yts-val="true" required name="email" placeholder="E-mail" type="email">
        </div>
        <div class="form-control">
            <i class="fab fa-whatsapp"></i>
            <input data-yts-val="true" required name="phone" placeholder="WhatsApp" type="tel">
        </div>
        <button type="submit" class="modal-button">falar por whatsapp <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </form>
    <button href="#" class="close_modal" data-dismiss="modal" aria-label="Close">X</button>
</div>

<script>
    var whatsButton = document.querySelectorAll('[data-whats]');
    var whatsModal = document.querySelector('.whats-modal');
    var whatsClose = document.querySelector('.close_modal');


    for (i = 0; i < whatsButton.length; ++i) {
        whatsButton[i].addEventListener('click', function(event){
            event.preventDefault();
            whatsModal.classList.add('open');
        });
    }

    whatsClose.addEventListener('click', function(){
        whatsModal.classList.remove('open');
    });
</script>           