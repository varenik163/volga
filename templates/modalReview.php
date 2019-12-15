<?php ?>

<!-- Modal -->
<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оставить отзыв</h4>
            </div>
            <div class="modal-body">
                <form name="order_call" method="post" id="new_review" onsubmit="return submit_form(this)" >
                    <input class="form-control" type="text" name="person_name" placeholder="Ваше имя" id="person_name">
                    <input class="form-control" type="text" name="review_company" placeholder="Название организации" id="review_company">
                    <input class="form-control" name="review_email" placeholder="Е-mail" id="review_email">
                    <textarea rows="5" class="form-control" name="review_text" placeholder="Текст отзыва" id="review_text"></textarea>
                    <input type="hidden" name="email" value="<?php the_field('email_for_revs','options'); ?>" id="send_to">
                    <div class="send_btn">
                        <button
                            type="button"
                            name="send" id="send_review"
                            class="btn btn-primary"
                            onclick="return submit_form(this)"
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
