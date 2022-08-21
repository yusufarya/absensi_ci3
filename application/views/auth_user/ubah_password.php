<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ml-1"><?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus  ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content-header">
        <div class="row">
            <div class="col-md-6 card card-block py-3 ml-3 shadow">
                <?php echo $this->session->flashdata('message'); ?>
                <form action="<?php echo base_url('settingpassword'); ?>" method="post">
                    <div class="form-group px-2">
                        <input type="hidden" id="nama" name="nama" class="form-control" value="<?php echo $sysuser['nama'] ?>">
                        <label for="current_password" class="text-dark">Sandi saat ini</label>
                        <input type="password" id="current_password" name="current_password" class="form-control">
                        <?= form_error('current_password', '<small class="text-danger pl-2">', ' </small>'); ?>
                    </div>
                    <div class="form-group px-2">
                        <label for="new_password1" class="text-dark">Kata sandi baru</label>
                        <input type="password" id="new_password1" name="new_password1" class="form-control">
                        <?= form_error('new_password1', '<small class="text-danger pl-2">', ' </small>'); ?>
                    </div>
                    <div class="form-group px-2">
                        <label for="new_password2" class="text-dark">Ulangi kata sandi</label>
                        <input type="password" id="new_password2" name="new_password2" class="form-control">
                        <?= form_error('new_password2', '<small class="text-danger pl-2">', ' </small>'); ?>
                    </div>

                    <div class="form-group px-2">
                        <button type="button" onclick="ubahPassword()" class="btn btn-primary form-control">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- /content wrapper -->

<script>
    function ubahPassword() {
        var url = "<?php echo base_url('auth_user/cekUbahPassword') ?>";
        var nama = $('#nama').val();
        var currpass = $('#current_password').val();
        var newpass1 = $('#new_password1').val();
        // var newpass2 = $('#new_password2').val();
        console.log(currpass)
        console.log(newpass1)
        bootbox.confirm("Yakin ingin merubah password ?", function(next) {
            if (next) {
                // alert('ok')
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: url,
                    data: {
                        current_password: currpass,
                        new_password1: newpass1
                    },
                    success: function(status) {
                        // console.log(status)
                        setTimeout(function() {
                            bootbox.alert('<b class="text-primary">✔️ Password berhasil diubah</b>', function() {
                                window.location.href = 'dashboard';
                            })
                        }, 1100)
                    },
                    error: function() {
                        setTimeout(function() {
                            bootbox.alert('<b class="text-danger">Gagal mengubah password!</b>', function() {
                                window.location.reload();
                            });
                        }, 1000)
                    }
                })
            } else {

            }

        })
    }
</script>