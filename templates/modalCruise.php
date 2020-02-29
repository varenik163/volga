<?php ?>

<!-- Modal -->
<div class="modal fade" id="modalCruise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оставить заявяку на круиз</h4>
            </div>
            <div class="modal-body">
                <form name="cruise_form" id="cruise_form" onsubmit="return send_tour_order(this)" method="POST">
                    <input class="form-control" type="text" name="resume_form_name" placeholder="*ФИО" id="cruise_form_name">
                    <input class="form-control" type="text" name="resume_form_city" placeholder="*Город" id="cruise_form_city">
                    <input class="form-control" type="text" name="resume_form_level" placeholder="*Уровень теплохода (3-х, 4-х палубный)" id="cruise_form_level">
                    <input class="form-control" type="text" name="resume_form_peopleCount" placeholder="*количество человек" id="cruise_form_peopleCount">
                    <input class="form-control" type="text" name="resume_form_period" placeholder="*период отдыха" id="cruise_form_period">
                    <input class="form-control" type="text" name="resume_form_sum" placeholder="*бюджет" id="cruise_form_sum">
                    <input class="form-control" type="text" name="resume_form_other" placeholder="другие пожелания" id="cruise_form_other">
                    <br/>
                    <input class="form-control" type="text" name="phone" placeholder="*Ваш телефон" id="cruise_phone">
                    <input class="form-control" type="email" name="mail" placeholder="*Ваш e-mail" id="cruise_mail">
                    <input type="hidden" name="email" value="<?php the_field('email_recall','options'); ?>" id="cruise_form_send_to">
                    <input type="hidden" name="id_form" value="order_call" id="id_form">
                    <div class="send_btn">
                        <button
                            name="send_cruise_order"
                            id="send_cruise_order"
                            onclick="return send_tour_order(this)"
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
