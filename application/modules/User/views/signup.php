<?php $this->load->view('header') ?>

<main class="main">

    <?php if (isset($error)) {
        echo '<p class="alert alert-warning">' . $error . '</p>';
    } ?>

    <form action="<?php echo base_url('user/signup') ?>" method="post">
        <div class="form-group">
            <label for="name"><b>Name</b></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Enter e-mail</b></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label for="password1"><b>Create Password</b></label>
            <input type="text" class="form-control" id="password1" name="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <label for="password2"><b>Re-enter Password</b></label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Re-Enter Password" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Signup</button><br>
        </div>
        <div class="form-group">
            <a href="<?php echo base_url('login') ?>">Already have an account | Login</a>
        </div>
    </form>
</main>

<?php $this->load->view('footer') ?>