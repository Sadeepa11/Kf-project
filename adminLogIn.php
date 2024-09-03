<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Felder | Admin Log In</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="logo/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>



    <div class="col-12 container-fluid  vh-100 bg-dark d-flex justify-content-center align-items-center">


        <div class="login-box" id="log">
            <h2>Login</h2>

            <div class="user-box">
                <input type="text" id="admin_email" name="" required="required">

                <div class="  lbg">
                    <label>Email</label>
                </div>
            </div>

            <div class="row">
                <button class=" offset-1 col-10 btn btn-secondary fw-bold " onclick="adminLogin(document.getElementById('admin_email').value);" style="border-radius: 20px;">Log In</button>


            </div>


        </div>







    </div>

    <div class="modal" tabindex="-1" id="verificationModal" style="background-color: black;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter Your Verification Code</label>
                    <input type="text" class="form-control" id="vcode">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" onclick="verify();">Verify</button>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>