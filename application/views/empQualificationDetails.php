<?php include('header.php'); ?>

<div class="container">
    <?php echo form_open_multipart("employee/addQualificationDetails/{$result->user_id}", ['class'=> 'form-horizontal']); ?>
    <?php echo form_hidden('user_id', $result->user_id); ?>

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
                <br/>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo base_url("employee/empPersonalDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Personal Details</a> </li>
                    <li><a href="<?php echo base_url("employee/empContactDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Contact Details</a> </li>
                    <li  class="active"><a href="<?php echo base_url("employee/empQualificationDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Qualification Details</a> </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <legend> Qualification Details</legend>
                <div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('highest_level', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Level of Qualification</label>
                                <div class="col-lg-8">

                                    <?php if (!empty($qualifications)): ?>
                                        <select class="form-control" name="highest_level" disabled="disabled">
                                            <option><?php echo $qualifications->highest_level?></option>

                                        </select>
                                    <?php else: ?>
                                        <select class="form-control" name="highest_level">
                                            <option></option>
                                            <option>Ordinary Level</option>
                                            <option>Advanced Level</option>
                                            <option>Undergraduate</option>
                                            <option>Post Graduate</option>
                                        </select>
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('year_graduated', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Year Graduated</label>
                                <div class="col-lg-8">

                                    <?php if (!empty($qualifications)): ?>
                                        <?php echo form_input(['name'=>'year_graduated', 'class'=>'form-control', 'placeholder'=>'Year Graduated','value'=>set_value('year_graduated', $qualifications->year_graduated), 'readonly'=>'readonly']);?>
                                    <?php else: ?>
                                        <?php echo form_input(['name'=>'year_graduated', 'class'=>'form-control', 'placeholder'=>'Year Graduated','value'=>set_value('year_graduated')]);?>
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('experience', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"> Experience </label>
                                <div class="col-lg-8">
                                    <?php if (!empty($qualifications)): ?>
                                        <select class="form-control" name="experience" disabled="disabled">
                                            <option><?php echo $qualifications->experience?></option>

                                        </select>
                                    <?php else: ?>
                                        <select class="form-control" name="experience" disabled="disabled">
                                            <option></option>
                                            <option>0-6 Months</option>
                                            <option>6 Months - 1 Year</option>
                                            <option>1 Year - 2 Years</option>
                                            <option>Above 2 Years</option>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                            <br>
                            <?php if (!empty($qualifications)):?>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-lg-4 control-label">Documents</label>
                                            <div class="col-lg-8">

                                                <?php echo form_input(['name'=>'docs', 'class'=>'form-control', 'placeholder'=>'docs','value'=>set_value('docs', $qualifications->docs), 'readonly'=>'readonly']);?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php else: ?>
                                    <div class="col-lg-8 col-lg-offset-2">
                                            <?php echo form_upload(['name'=>'docs', 'class'=>'form_control']);?>
                                    </div>
                            <?php endif; ?>

                    </div>


                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <?php if (!empty($qualifications)): ?>

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

