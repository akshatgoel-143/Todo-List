<?php $this->load->view('header') ?>

<main class="main">

    <h2>Delete Todo</h2><br><br>
    <form action="<?php echo base_url('todo/deleting') ?>" method="post">

        <label for="todo_title"><b>Select Todo</b></label>

        <select class="form-control" id="todo_title" name="todo_title" required>
            <?php foreach ($todos as $todo) : ?>
                <option value="<?php echo $todo->id; ?>">
                    <?php echo $todo->title; ?> :
                    (<?php echo $todo->description; ?>)
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" class="btn btn-primary">Delete-Task</button><br>

    </form>
</main>

<?php $this->load->view('footer') ?>