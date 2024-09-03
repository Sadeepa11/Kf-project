<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Felder</title>
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
                <input type="text" id="me" name="" required="required">

                <div class="  lbg">
                    <label>Email</label>
                </div>
            </div>
            <div class="user-box">
                <input type="password" id="mpw" name="" required="required">

                <div class="  lbg">
                    <label>Password</label>

                </div>
            
                    <i class="bi bi-eye icon" id="meye1" onclick="mshowPassword1();"></i>
                
            </div>
            <div class="row">
                <button class=" offset-1 col-10 btn btn-secondary fw-bold " onclick="merLogin();" style="border-radius: 20px;">Log In</button>
                <div class="col-12 logInLinks">
                    <span class="fpwLink  offset-1 col-3" onclick="mforgotPassword();">Forgot Password</span>
                </div>

            </div>


        </div>

        





    </div>


    <script src="script.js"></script>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>