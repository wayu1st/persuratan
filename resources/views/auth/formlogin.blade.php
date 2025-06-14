<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/css/sb-admin-2.css', 'resources/css/sb-admin-2.min.css', 'resources/js/sb-admin-2.js', 'resources/js/bootstrap.js',
    'resources/vendor/jquery/jquery.min.js','resources/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/vendor/jquery-easing/jquery.easing.min.js', 'resources/vendor/chart.js/Chart.min.js',
    'resources/vendor/fontawesome-free/css/all.min.css','resources/js/demo/chart-area-demo.js','resources/js/demo/chart-pie-demo.js'])
    
    <style>
        html, body {
            height: 100%;
            overflow-y: hidden;
        }
        .full-height {
            height: 100vh;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="d-flex align-items-center justify-content-center full-height">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center">

            <div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To Perpuskataan Globaliti Denpasar!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control form-control-user" id="userName" name="username" placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control form-control-user" id="passWord" name="password" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block btnLogin">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="module">
        $('.btnLogin').on('click',function(a){
            axios.post('auth/check' ,{
                username : $('#userName').val(),
                password : $('#passWord').val(),
                _token : '{{csrf_token()}}'
            }).then(function(response){
                if(response.data.success){
                    window.location.href = response.data.redirect_url;
                }else{
                    swal.fire('gagal Login, Username/Password salah','','error');
                }
            }).catch(function(error){
                if(error.response.status === 422){
                    swal.fire(error.response.data.message,'','error');
                }else{
                    swal.fire('Gagal Login, Username/Password salah','','error');
                }
            });
        });
    </script>

</body>

</html>
