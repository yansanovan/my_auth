<div class="col-md-6 col-md-offset-3" style="margin-top: 40px">
    <div class="well bs-component">
        <?= $this->session->flashdata('msgbox');?>
        <h4 align="center" style="margin-bottom: 40px">Please Insert Your E-mail</h4>
        <fieldset>
            <?= form_open();?>
                <div class="form-group <?= form_error('email') ? 'has-error': null ?>">
                    <?= form_label('Email Address');?>
                    <?= form_input(['type'=>'email', 'name' => 'email', 'value'=> set_value("email"), 'class'=>'form-control', 'placeholder'=>'Email']);?>
                    <?= form_error('email')?>
                </div>
                <p><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="<?= base_url('login');?>"> Login </a></p>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <?= form_close();?>
        </fieldset>
    </div>
</div>