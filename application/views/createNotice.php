<?php include ('header.php'); ?>

<div class="container">
    <?php echo form_open("employee/insertNotice", ['class'=> 'form-horizontal']); ?>

    <legend>Add Notice</legend>

    <div class="row">
        <div class="col-lg-6">
            <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-4 control-label">Description</label>
                <div class="col-lg-8">

                    <?php echo form_input(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Notice Description','value'=>set_value('description')]);?>

                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="row">
            <div class="col-lg-6">
                <?php echo form_error('notice', '<div class="text-danger">', '</div>'); ?>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Notice Details</label>
                    <div class="col-lg-8">

                        <?php echo form_textarea(['name'=>'notice', 'class'=>'form-control', 'placeholder'=>'Notice Details','value'=>set_value('notice')]);?>

                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">

                    <?php echo form_submit(['value'=>'Submit', 'class'=>'btn btn-primary']);?>
                    <?php echo form_reset(['value'=>'Reset', 'class'=>'btn btn-default ']);?>

                </div>


                <?php include ('footer.php'); ?>
