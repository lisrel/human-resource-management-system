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


    </br>
    <?php  //print_r($notices); ?>
    <div class="row">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>

                <th>Task Name</th>
                <th>Associated Files</th>
                <th>Added</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($work)): ?>
                <?php foreach ($work as $res): ?>
                    <tr>

                        <td><?php echo $res->task_name;  ?></td>
                        <td><?php echo $res->docs; ?></td>
                        <td><?php echo $res->date_uploaded; ?></td>
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

