<?php $this->load->view('header') ?>

<main class="main">
    <form action="<?php echo base_url('todo/update_todo/'.$todo->id) ?>" method="post">
        <h2>Update Todo</h2>
        <div class="form-group">
            <label for="title"><b>Title</b></label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $todo->title;?>" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="description"><b>Enter Description</b></label>
            <textarea class="form-control" id="description" name="description"  placeholder="Enter Description" required><?php echo $todo->description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status"><b>Status</b></label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending" <?php if ($todo->status == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Completed" <?php if ($todo->status == 'Completed') echo 'selected'; ?>>Completed</option>
            </select>
        </div>
        <div>
        <button type="submit" class="btn btn-primary">Update-Task</button><br>
        </div>
    </form>
</main>

<?php $this->load->view('footer') ?>