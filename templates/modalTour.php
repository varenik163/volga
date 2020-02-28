<?php ?>

<!-- Modal -->
<div class="modal fade" id="modalTour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оставить заявяку на тур</h4>
            </div>
            <div class="modal-body">
                <form name="tour_form" id="tour_form" onsubmit="return send_tour_order(this)" method="POST">
                    <input class="form-control" type="text" name="resume_form_name" placeholder="*ФИО" id="resume_form_name">
                    <textarea
                        rows="8"
                        class="form-control"
                        name="resume_form_text"
                        placeholder="*Укажите тур, страну, курорт или отель, количетсво человек, бюджет, другие пожелания"
                        id="resume_form_text"></textarea>
                    <br/>
                    <input class="form-control" type="text" name="phone" placeholder="*Ваш телефон" id="your_phone">
                    <input class="form-control" type="email" name="mail" placeholder="*Ваш e-mail" id="your_mail">
                    <input type="hidden" name="email" value="<?php the_field('vacancy_mail','options'); ?>" id="resume_form_send_to">
                    <input type="hidden" name="id_form" value="order_call" id="id_form"> 
                    <div class="send_btn">
                        <button
                            name="send_tour_order"
                            id="send_tour_order"
                            class="btn btn-primary"
                            onclick="return send_tour_order(this)"
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
