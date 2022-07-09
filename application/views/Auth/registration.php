<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                        </div>
                        <form action="<?= base_url('auth/registration'); ?>" method="POST" class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-user btn-block">
                                Buat Akun
                            </button>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>"> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>