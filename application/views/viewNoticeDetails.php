<?php include ('header.php'); ?>

<div class="container">

    <legend>Notice Details</legend>

    <div class="row">
        <div class="col-lg-6">
            <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-4 control-label">Description</label>
                <div class="col-lg-8">

                    <?php echo form_input(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Notice Description','value'=>set_value('description', $notices->description), 'readonly'=>'readonly']);?>

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

                        <?php echo form_textarea(['name'=>'notice', 'class'=>'form-control', 'placeholder'=>'Notice Details','value'=>set_value('notice', $notices->notice), 'readonly'=>'readonly']);?>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Added</label>
                        <div class="col-lg-8">

                            <?php echo form_input(['name'=>'added', 'class'=>'form-control', 'placeholder'=>'Added On','value'=>set_value('added',$notices->added), 'readonly'=>'readonly']);?>

                        </div>
                    </div>
                </div>
            </div>



                <?php include ('footer.php'); ?>
