<?php include('header.php'); ?>
<div class="container">
    <?php echo form_open_multipart("", ['class'=> 'form-horizontal']); ?>

    <div class="row">
        <div class="col-lg-3">

            <legend>Links</legend>

            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url("anyEmployee", ['class'=>'list-group-item'])?>">Tasks</a> </li>
                <li class="active"><a href="<?php echo base_url("anyEmployee/empNotices", ['class'=>'list-group-item'])?>">Notices</a> </li>
                <li><a href="<?php echo base_url("", ['class'=>'list-group-item'])?>">Upload Work Done</a> </li>
            </ul>

        </div>
        <div class="col-lg-9">
            <legend>Available Notices</legend>

            </br>

            <div class="row">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>

                        <th>Description</th>
                        <th>Notes</th>
                        <th>Added</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($notices)): ?>
                        <?php foreach ($notices as $res): ?>
                            <tr>


                                <td><?php echo anchor("employee/viewNoticeDetails/{$res->id}",$res->description);  ?></td>

                                <td><?php echo $res->notice; ?></td>
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

