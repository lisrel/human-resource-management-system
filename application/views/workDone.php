<?php include('header.php'); ?>
<?php error_reporting(1); ?>

<div class="container">
    <?php echo form_open_multipart("anyEmployee/uploadWorkDone", ['class'=> 'form-horizontal']); ?>


    <div class="row">
        <div class="col-lg-3">
            <legend>Links</legend>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url("anyEmployee", ['class'=>'list-group-item'])?>">Tasks</a> </li>
                <li><a href="<?php echo base_url("anyEmployee/empNotices", ['class'=>'list-group-item'])?>">Notices</a> </li>
                <li class="active"><a href="<?php echo base_url("anyEmployee/workDone", ['class'=>'list-group-item'])?>">Upload Work Done</a> </li>
            </ul>

        </div>
        <div class="col-lg-9">
            <legend> Upload Work Done</legend>

            <?php if ($response = $this->session->flashdata('work_done_add')): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-dismissible alert-success">
                            <?php echo $response ?>

                        </div>
                    </div>
                </div>

            <?php endif; ?>
            </br>

            <div class="row">
                <div class="col-lg-6">
                    <?php echo form_error('task_name', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-4 control-label">Task Name</label>
                        <div class="col-lg-8">
                            <?php echo form_input(['name'=>'task_name', 'class'=>'form-control', 'placeholder'=>'Task Name','value'=>set_value('task_name') ]);?>
                        </div>
                    </div>
                </div>
            </div>


                <div class="row">
                    <div class="col-lg-6">

                        <div class="col-lg-8 col-lg-offset-2">
                            <?php echo form_upload(['name'=>'docs', 'class'=>'form_control']);?>
                        </div>

                </div>


                <br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <br>


                                <?php echo form_submit(['value'=>'Submit', 'class'=>'btn btn-primary']);?>
                                <?php echo form_reset(['value'=>'Reset', 'class'=>'btn btn-default ']);?>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

            <?php include('footer.php');?>

