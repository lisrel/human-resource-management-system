<?php include ('header.php'); ?>

<div class="container">
    <?php echo form_open("employee/insertTask", ['class'=> 'form-horizontal']); ?>

            <legend>Add A Task</legend>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Description</label>
                            <div class="col-lg-8">

                                <?php echo form_input(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Task Description','value'=>set_value('description')]);?>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('notes', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Notes</label>
                                <div class="col-lg-8">

                                    <?php echo form_textarea(['name'=>'notes', 'class'=>'form-control', 'placeholder'=>'Task Notes','value'=>set_value('notes')]);?>

                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('assigned_to', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Assigned To</label>
                            <div class="col-lg-8">

                                <select class="form-control" name="assigned_to">
                                    <option></option>
                                    <?php foreach($names as $each){ ?>
                                        <option value="<?php echo $each->name; ?>"><?php echo $each->name; ?></option>';
                                    <?php } ?>
                                </select>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_error('due_date', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Due Date</label>
                            <div class="col-lg-8">

                                    <?php echo form_input(['name'=>'due_date','id'=>'datepicker' ,'class'=>'form-control', 'placeholder'=>'Due Date','value'=>set_value('due_date')]);?>

                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo form_error('priority', '<div class="text-danger">', '</div>'); ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Priority</label>
                                <div class="col-lg-8">

                                    <select class="form-control" name="priority">
                                        <option>Choose Priority</option>
                                        <option value="urgent">Urgent</option>
                                        <option value="medium">Medium</option>
                                        <option value="normal">Normal</option>
                                    </select>


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
