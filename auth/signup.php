<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary">

    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 border border-success-subtle bg-white p-5 rounded shadow">
                <h3 class="fw-bold font-poppins text-center">SignUp Page</h3>
                <!-- form pengisian Signup -->
                <form action="process_signup.php" method="POST">
                    <div class="mb-3 mt-5">
                        <label class="form-label">Create Username</label>
                        <input type="text" name="username" class="form-control" id="inp-username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inp-email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Create password</label>
                        <input type="password" name="password" class="form-control" id="inp-password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="inp-confirm-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Account</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>