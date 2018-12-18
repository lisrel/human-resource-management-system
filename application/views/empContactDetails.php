<?php include('header.php'); ?>
<div class="container">
    <?php echo form_open_multipart("employee/addContactDetails/{$result->user_id}", ['class'=> 'form-horizontal']); ?>
    <?php echo form_hidden('user_id', $result->user_id); ?>

    <div class="row">
        <div class="col-lg-3">
            <legend>Employee Details</legend>
            <div class="list-group">
                <a href="" class="list-group-item">
                    <?php if (!empty($contacts)):?>
                        <img src="<?php echo $records->avatar; ?>" style="height: 230px;width: 230px;"/>
                    <?php else: ?>
                        <img src="<?php echo base_url('/resources/images/avatar.png'); ?>" style="height: 230px;width: 230px;"/>
                    <?php endif; ?>
                </a>
                <br/>
                <br/>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo base_url("employee/empPersonalDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Personal Details</a> </li>
                    <li class="active"><a href="<?php echo base_url("employee/empContactDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Contact Details</a> </li>
                    <li><a href="<?php echo base_url("employee/empQualificationDetails/{$result->user_id}", ['class'=>'list-group-item'])?>">Qualification Details</a> </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <legend>Contact Details</legend>

            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Address</label>
                        <div class="col-lg-8">

                            <?php if (!empty($contacts)): ?>
                                <?php echo form_input(['name'=>'address', 'class'=>'form-control ', 'placeholder'=>'Address','value'=>set_value('name', $contacts->address), 'readonly'=>'readonly']);?>
                            <?php else: ?>
                                <?php echo form_input(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address','value'=>set_value('address')]);?>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_error('country', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Country</label>
                        <div class="col-lg-8">

                            <?php if (!empty($contacts)): ?>
                                <?php echo form_input(['name'=>'country', 'class'=>'form-control', 'placeholder'=>'Country','value'=>set_value('country', $contacts->country), 'readonly'=>'readonly']);?>
                            <?php else:?>
                                <?php echo form_input(['name'=>'country', 'class'=>'form-control', 'placeholder'=>'Country','value'=>set_value('country')]);?>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_error('mobile_number', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Mobile Number</label>
                        <div class="col-lg-8">

                            <?php if (!empty($contacts)): ?>
                                <?php echo form_input(['name'=>'mobile_number', 'class'=>'form-control', 'placeholder'=>'Mobile Number','value'=>set_value('mobile_number', $contacts->mobile_number), 'readonly'=>'readonly']);?>
                            <?php else: ?>
                                <?php echo form_input(['name'=>'mobile_number', 'class'=>'form-control', 'placeholder'=>'Mobile Number','value'=>set_value('mobile_number')]);?>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <?php if (!empty($contacts)): ?>

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

