<?php ?>

<!-- Modal -->
<div class="modal fade" id="modalSign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Подписаться на рассылку выгодных предложений</h4>
            </div>
            <div class="modal-body">
                <form name="order_call" method="post" id="sign_form" onsubmit="return sign_submit_form(this)">
                    <input class="form-control" type="text" name="name" placeholder="Имя" id="sign_name">
                    <input class="form-control" type="text" name="phone" placeholder="*Ваш телефон" id="sign_phone">
                    <input class="form-control" type="email" name="mail" placeholder="*Ваш e-mail" id="sign_mail">
                    Нажав кнопку "Отправить", Вы соглашаетесь с <a>условиями на обработку персональных данных</a>
                    <input type="hidden" name="email" value="<?php the_field('email_recall','options'); ?>" id="send_to">
                    <input type="hidden" name="id_form" value="order_call" id="id_form">
                    <div class="send_btn">
                        <button
                            type="button"
                            name="send" id="sign_send" 
                            class="btn btn-primary"
                            style="margin-top: 20px;"
                        >
                            Отправить
                        </button>
                    </div>
                </form>
                <div class="thanks"></div>
            </div>
        </div>
    </div>
</div>
