<?php ?>

<!-- Modal -->
<div class="modal fade" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Отправить резюме</h4>
            </div>
            <div class="modal-body">
                <form name="resume_form" id="resume_form" enctype="multipart/form-data" method="POST">
                    <input class="form-control" type="text" name="resume_form_name" placeholder="*ФИО" id="resume_form_name">
                    <textarea rows="8" class="form-control" name="resume_form_text" placeholder="*Текст" id="resume_form_text"></textarea>
                    <br/>
                    <input class="form-control" type="file" name="resume_form_file" placeholder="*Файл" id="resume_form_file">
                    <div class="file-error">Максимальный размер файла - 10Мб</div>
                    <input type="hidden" name="email" value="<?php the_field('vacancy_mail','options'); ?>" id="resume_form_send_to">
                    <input type="hidden" name="id_form" value="order_call" id="id_form"> 
                    <div class="send_btn">
                        <button
                            name="send_resume"
                            id="send_resume"
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
