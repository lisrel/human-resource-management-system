
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
                <?php echo form_open('dashboard/search',['class'=>'navbar-form navbar-right', 'role'=>'search']);?>
                <div class="form-group">
                    <?php echo form_input(['name'=>'query', 'class'=>'form-control', 'placeholder'=>'Search']);?>
                </div>
                <?php echo form_submit(['value'=>'Search', 'class'=>'btn btn-primary']);?>
                <?php echo form_close();?>
                <?php echo form_error('query', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
            <?php echo anchor('employee/deleteEmployee', 'Delete', ['class'=>'btn btn-danger']);?>
        </div>
        <br>
        <?php if ($error = $this->session->flashdata('employee_add')): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-success">
                        <?php echo $error ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </br>
        <?php // print_r($result); ?>
        <div class="row">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Username</th>
                    <th>Position</th>
                    <th>User Role</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($result)): ?>
                    <?php foreach ($result as $res): ?>
                        <tr>
                            <?php if ($res->user_role_id ==1): ?>
                                <td> </td>

                            <?php else: ?>
                                <td><?php echo form_checkbox(['class'=>'checkbox']);?></td>
                            <?php endif; ?>

                            <?php if ($res->user_role_id ==1): ?>
                                <td><?php echo $res->name;  ?></td>
                            <?php else: ?>
                                <td><?php echo anchor("employee/empPersonalDetails/{$res->user_id}",$res->name);  ?></td>
                            <?php endif; ?>

                            <td><?php echo $res->username; ?></td>
                            <td><?php echo $res->role_name; ?></td>
                            <td><?php echo $res->role_name; ?></td>
                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td>No Records Found!</td>
                    </tr>

                <?php endif; ?>


                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
<?php include ('footer.php'); ?>
