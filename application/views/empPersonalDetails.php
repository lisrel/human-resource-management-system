<?php include('header.php'); ?>
    <div class="container">
        <?php echo form_open_multipart("employee/addPersonalDetails/{$result->user_id}", ['class'=> 'form-horizontal']); ?>
        <?php echo form_hidden('user_id', $result->user_id); ?>
        <?php echo form_hidden('emp_role_id', $result->user_role_id); ?>
        <div class="row">
            <div class="col-lg-3">

                <legend>Employee Details</legend>
                <div class="list-group">
                    <a href="" class="list-group-item">
                        <?php if (!empty($records)):?>
                            <img src="<?php echo $records->avatar; ?>" style="height: 230px;width: 230px;"/>
                        <?php else: ?>
                            <img src="<?php echo base_url('/resources/images/avatar.png'); ?>" style="height: 230px;width: 230px;"/>
                        <?php endif; ?>
                    </a>
                    <br/>
                    <?php if (!empty($records)):?>
                    <?php else: ?>
                        <?php echo form_upload(['name'=>'avatar', 'class'=>'form_control']);?>
                        <?php if (isset($upload_error)) echo $upload_error; ?>
                    <?php endif; ?>
                    <br/>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php echo base_url("employee/empPersonalDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Personal Details</a> </li>
                        <li><a href="<?php echo base_url("employee/empContactDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Contact Details</a> </li>
                        <li><a href="<?php echo base_url("employee/empQualificationDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Qualification Details</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <legend>Personal Details</legend>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">First Name(s)</label>
                            <div class="col-lg-8">

                                <?php if (!empty($records)): ?>
                                    <?php echo form_input(['name'=>'name', 'class'=>'form-control form-disabled', 'placeholder'=>'First Name(s)','value'=>set_value('name', $records->name), 'readonly'=>'readonly']);?>
                                <?php else: ?>
                                    <?php echo form_input(['name'=>'name', 'class'=>'form-control', 'placeholder'=>'First Name(s)','value'=>set_value('name')]);?>
                                <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('surname', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Surname</label>
                            <div class="col-lg-8">

                                <?php if (!empty($records)): ?>
                                    <?php echo form_input(['name'=>'surname', 'class'=>'form-control', 'placeholder'=>'Surname','value'=>set_value('surname', $records->surname), 'readonly'=>'readonly']);?>
                                <?php else:?>
                                    <?php echo form_input(['name'=>'surname', 'class'=>'form-control', 'placeholder'=>'Surname','value'=>set_value('surname')]);?>
                                <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Username</label>
                            <div class="col-lg-8">

                                <?php if (!empty($records)): ?>
                                    <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username','value'=>set_value('username', $records->username), 'readonly'=>'readonly']);?>
                                <?php else: ?>
                                    <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username','value'=>set_value('username')]);?>
                                <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label"> Gender </label>
                            <div class="col-lg-8">

                                <?php if (!empty($records)): ?>
                                    <select class="form-control" name="gender" disabled="disabled">
                                        <option><?php echo $records->gender?></option>

                                    </select>
                                <?php else: ?>
                                    <select class="form-control" name="gender">
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('nationality', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Nationality</label>
                            <div class="col-lg-8">

                                <?php if (!empty($records)): ?>
                                    <?php echo form_input(['name'=>'nationality', 'class'=>'form-control', 'placeholder'=>'Nationality','value'=>set_value('nationality', $records->nationality), 'readonly'=>'readonly']);?>
                                <?php else: ?>
                                    <?php echo form_input(['name'=>'nationality', 'class'=>'form-control', 'placeholder'=>'Nationality','value'=>set_value('nationality')]);?>
                                <?php endif;?>

                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('marital_status', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"> Marital Status </label>
                                <div class="col-lg-8">
                                    <?php if (!empty($records)): ?>
                                        <select class="form-control" name="marital_status" disabled="disabled">
                                            <option><?php echo $records->marital_status?></option>

                                        </select>
                                    <?php else: ?>
                                        <select class="form-control" name="marital_status">
                                            <option></option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Divorced</option>
                                            <option>Widowed</option>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('dob', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Date Of Birth</label>
                                <div class="col-lg-8">
                                    <?php if (!empty($records)): ?>
                                        <?php echo form_input(['name'=>'dob', 'class'=>'form-control','id'=>'datepicker', 'placeholder'=>'D.O.B','value'=>set_value('dob', $records->dob), 'readonly'=>'readonly']);?>
                                    <?php else: ?>
                                        <?php echo form_input(['name'=>'dob', 'class'=>'form-control','id'=>'datepicker', 'placeholder'=>'D.O.B','value'=>set_value('dob')]);?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>


                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <?php if (!empty($records)): ?>

                            <?php else: ?>
                                <?php echo form_submit(['value'=>'Submit', 'class'=>'btn btn-primary']);?>
                                <?php echo form_reset(['value'=>'Reset', 'class'=>'btn btn-default ']);?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php echo form_close(); ?>
    </div>

<?php include('footer.php');?>
