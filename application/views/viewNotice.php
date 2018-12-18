<?php  include ('header.php');?>
<div class='container'>
    <div class="row">
        <div class="col-lg-4">
            <ul class="nav nav-pills">
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Employee Management <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('employee/createEmployee', 'Create Employee')?></li>
                        <li><?php echo anchor('employee/employeesList', 'View Employees')?></li>
                        <li><?php echo anchor('employee/CreateTasks', 'Create Tasks')?></li>
                        <li><?php echo anchor('employee/viewTasks', 'View Tasks')?></li>
                        <li><?php echo anchor('employee/createNotice', 'Create Notice')?></li>
                        <li><?php echo anchor('employee/viewNotice', 'View Notice')?></li>
                        <li><?php echo anchor('employee/uploadedWork', 'Uploaded Work')?></li>
                        </li>
                    </ul>
        </div>
        <div class="col-lg-8">
            <?php echo form_open('employee/searchNotice',['class'=>'navbar-form navbar-right', 'role'=>'search']);?>
            <div class="form-group">
                <?php echo form_input(['name'=>'query', 'class'=>'form-control', 'placeholder'=>'Search']);?>
            </div>
            <?php echo form_submit(['value'=>'Search', 'class'=>'btn btn-primary']);?>
            <?php echo form_close();?>
            <?php echo form_error('query', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="row">
        <?php echo anchor('viewNotice/deleteNotice', 'Delete', ['class'=>'btn btn-danger']);?>
    </div>
    <br>

    <?php if ($response = $this->session->flashdata('notice_add')): ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-dismissible alert-success">
                    <?php echo $response ?>

                </div>
            </div>
        </div>

    <?php endif; ?>
    </br>
    <?php  //print_r($notices); ?>
    <div class="row">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th></th>
                <th>Description</th>
                <th>Notes</th>
                <th>Added</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($notices)): ?>
                <?php foreach ($notices as $res): ?>
                    <tr>
                        <td><?php echo form_checkbox(['class'=>'checkbox']);?></td>

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
</div>
<?php include ('footer.php'); ?>

