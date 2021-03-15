<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']; ?>alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <spam arial-hidden="true">&times;</spam>
                </div>

            <?php SESSION_unset();
            } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">

                        <textarea name="description" rows="2" class="form-control mt-2" placeholder="Task Description"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btn-block mt-2" name="save_task" value="Save task">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr> 
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM task ";
                    $result_task = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_task)) { ?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_at']?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-outline-secondary">Edit</button>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-outline-danger">Delete</button>
                                </a>
                            </td>
                        </tr>

                    <?php  }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>