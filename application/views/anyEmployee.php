<?php include('header.php'); ?>
<div class="container">
    <?php echo form_open_multipart("", ['class'=> 'form-horizontal']); ?>

    <div class="row">
        <div class="col-lg-3">

            <legend>Links</legend>

            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo base_url("anyEmployee", ['class'=>'list-group-item'])?>">Tasks</a> </li>
                <li><a href="<?php echo base_url("anyEmployee/empNotices", ['class'=>'list-group-item'])?>">Notices</a> </li>
                <li><a href="<?php echo base_url("anyEmployee/workDone", ['class'=>'list-group-item'])?>">Upload Work Done</a> </li>
            </ul>

        </div>
        <div class="col-lg-9">
            <legend>Available Tasks</legend>

            </br>
            <?php // print_r($result); ?>

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
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Notes</th>
                        <th>Assigned To</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($tasks)): ?>
                        <?php foreach ($tasks as $res): ?>
                            <tr>

                                <td><?php echo anchor("employee/viewTaskDetails/{$res->id}",$res->description);  ?></td>

                                <td><?php echo $res->notes; ?></td>
                                <td><?php echo $res->assigned_to; ?></td>
                                <td><?php echo $res->due_date; ?></td>
                                <td><?php echo $res->priority; ?></td>
                                <td><?php echo $res->added; ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td>No Records Found!</td>
                        </tr>

                    <?php endif; ?>


                    </tbody>
                </table>

            </div>


            <?php echo form_close(); ?>
        </div>

        <?php include('footer.php');?>

