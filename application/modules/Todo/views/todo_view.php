<?php $this->load->view('header') ?>

<main class="todo">
    <h2>Todo List</h2>

    <form action="<?php echo base_url('todo/sort_todo') ?>" method="post">
    <label for ="sort" >Sort by:</label>
    <select name="sort_type">
        <option value="date" >Date</option>
        <option value="name" <?php echo ($_POST['sort_type']=='name'?'selected':'') ?> >Name</option>
        <option value="status" <?php echo ($_POST['sort_type']=='status'?'selected':'') ?>>Status</option>

    </select>
    <button type="submit" class="btn btn-primary">Go</button><br>
    </form>

    <!-- <a href="<?php echo site_url('todo/add'); ?>">Add Todo</a> -->
    <div class="list">
        <?php foreach ($todos as $todo) : ?>
            <div class="list-item">
                <div>
                    <h4><?php echo $todo->title; ?></h4>
                    <p><?php echo $todo->description; ?></p>
                    <p><b>Status:</b> <?php echo $todo->status; ?></p>
                </div>
                <div class="list-btn">
                     <a href="<?php echo site_url('todo/update/' . $todo->id); ?>">Edit</a>
                    <a href="<?php echo site_url('todo/delete_todo/' . $todo->id); ?>">Delete</a> 
                </div>
        </div>
        <?php endforeach; ?>
    </div>
    
</main>

<?php $this->load->view('footer') ?>