<!DOCTYPE html>
<html>

<head>
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">

    <link rel="icon" type="image/x-icon" href="http://localhost/todolist/assets/images/favicon.png">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <h3 style="margin-right: 15px;"> 
                        <img src="http://localhost/todolist/assets/images/logo.jpg" height="50" width="120">
                        ToDo-List
                    </h3>
                    </li>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('todo') ?>">My-Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('add') ?>">Add-Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('find') ?>">Update-Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('delete') ?>">Delete-Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('logout') ?>">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('register') ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="username">
        <?php if ($this->session->userdata('logged_in')) : ?>
            <h3 style="margin-left: 20px;">Heyy!! <?php echo $name; ?>  </h3>
        <?php endif; ?>
    </div>