<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration - Absensi</title>
</head>

<body style="background-color: #d2dbdb;">
    <div class="card shadow rounded" style="width: 700px; margin: 50px auto">
        <div class="row justify-content-center p-3 my-3">
            <div class="col-lg-10 col-md-10 col-12">
                <h2 class="text-center">Registration</h2>
                <div class="py-5">
                    <form action="<?php echo base_url('auth/register') ?>" method="post">
                        <div class="mb-2">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="nama" class="form-control" name="nama" id="nama" placeholder="Nama lengkap">
                        </div>
                        <div class="mb-2">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="nis" class="form-control" name="nis" id="nis" placeholder="nis">
                        </div>
                        <div class="mb-2">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="kelas" class="form-control" name="kelas" id="kelas" placeholder="kelas">
                        </div>
                        <div class="mb-2">
                            <label for="jenis_kel" class="form-label">Jenis Kelamin</label>
                            <input type="jenis_kel" class="form-control" name="jenis_kel" id="jenis_kel" placeholder="jenis_kel">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="youremail@gmail.com">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="password">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat">
                        </div>
                        <button type="submit" class="btn btn-dark px-3" style="display: inline !important;">Register</button>
                        <a href="" class="text-decoration-none mt-2" style="display: inline !important; float: right">Sudah punya akun</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>