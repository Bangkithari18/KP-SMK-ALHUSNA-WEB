<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../controllers/MasterInfoController.php';
require_once '../db_connection.php';

// Instantiate the controller and fetch users
$infoController = new MasterInfoController($db);
$info = $infoController->getInfo();
?>
<?php include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <h1>Master Info</h1>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Table</h3>
                    <!-- Button to trigger modal for adding user -->
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#addUserModal">Add User</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Img</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($info as $info): ?>
                                <tr>
                                    <td><?= htmlspecialchars($info['Id']) ?></td>
                                    <td><?= htmlspecialchars($info['title']) ?></td>
                                    <td><?= htmlspecialchars($info['content']) ?></td>
                                    <td><?= htmlspecialchars($info['attachment']) ?></td>
                                    <td><?= htmlspecialchars($info['create_date']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal for adding a user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    <div class="form-group">
                        <label for="username">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Content</label>
                        <textarea class="form-control" id="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Attachment</label>
                        <input type="file" class="form-control" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

<!-- Include necessary JS for Bootstrap Modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#addUserForm').submit(function(e) {
            e.preventDefault();
            var formData = {
                title: $('#title').val(),
                content: $('#content').val(),
                attachment: 0
            };
            $.ajax({
                url: '../func/master/info.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response === 'success') {
                        window.location.reload();
                    } else {
                        alert('Failed to add user');
                    }
                }
            });
        });
    });
</script>