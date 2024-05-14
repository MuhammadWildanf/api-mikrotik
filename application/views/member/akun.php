<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" value="<?= $user->nama ?>" aria-describedby="nama">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" value="<?= $user->email ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" value="<?= $user->password ?>">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" value="<?= $user->alamat ?>" aria-describedby="alamat">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 mb-3">
                                        <label for="notlp" class="form-label">No Telpon</label>
                                        <input type="text" class="form-control" id="notlp" value="<?= $user->notlp ?>" aria-describedby="notlp">
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>