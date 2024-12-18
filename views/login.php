<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}
?>
<?php include 'layout/header.php'; ?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form id="loginForm" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            var formData = {
                username: $('#username').val(),
                password: $('#password').val()
            };

            $.ajax({
                url: '../process_login.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        window.location.href = 'dashboard.php';
                    } else {
                        alert('Invalid username or password!');
                    }
                }
            });
        });
    });
</script>

<style>
    /* Center the login box vertically and horizontally */
    .login-box {
        width: 360px;
        margin: 7% auto;
    }

    .login-logo a {
        font-size: 32px;
        font-weight: 600;
    }

    /* Center the entire page */
    .wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    body {
        background-color: #f4f6f9;
    }
</style>