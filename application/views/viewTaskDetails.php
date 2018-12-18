<?php include ('header.php'); ?>

<div class="container">

    <legend>Task Details</legend>

    <div class="row">
        <div class="col-lg-6">
            <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-4 control-label">Description</label>
                <div class="col-lg-8">

                    <?php echo form_input(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Task Description','value'=>set_value('description', $tasks->description), 'readonly'=>'readonly']);?>

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

                        <?php echo form_textarea(['name'=>'notes', 'class'=>'form-control', 'placeholder'=>'Task Notes','value'=>set_value('notes', $tasks->notes), 'readonly'=>'readonly']);?>

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

                        <select class="form-control" name="assigned_to" disabled="disabled">
                                <option><?php echo $tasks->assigned_to; ?></option>';
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

                        <?php echo form_input(['name'=>'due_date','id'=>'datepicker' ,'class'=>'form-control', 'placeholder'=>'Due Date','value'=>set_value('due_date', $tasks->due_date), 'readonly'=>'readonly']);?>

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

                        <select class="form-control" name="priority" disabled="disabled">
                            <option><?php echo $tasks->priority ?></option>

                        </select>


                    </div>
                </div>
            </div>
        </div>

        <?php include ('footer.php'); ?>
