<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">
                    ', '
                  </div>'); ?>
            <?= form_error('menu_order', '<div class="alert alert-danger" role="alert">
                    ', '
                  </div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <?php if ($this->session->flashdata('flash')) : ?>

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Menu <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>



                                                                        <?php endif; ?>
            <div class="card">
                <div class="card-header py-3">
                    <a href="<?= base_url(); ?>menu/tambah" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i> Menu Baru</a>
                </div>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Menu Order</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td><?= $m['menu_order']; ?></td>
                                <td>
                                <a href="<?= base_url('menu/ubahMenu/') . $m['id']; ?>" class="badge badge-success "><i class="fas fa-fw fa-edit"></i>ubah</a>
                                <a href="<?= base_url() ?>menu/delete/<?= $m['id']; ?>" class="badge badge-danger " onclick="return confirm('yakin?');"><i class="fas fa-fw fa-trash"></i>hapus</a>
                                                </td>
                                                </tr>
                                                                    <?php $i++; ?>
                                                                                                                            <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <!-- /.container-fluid -->
    <!-- Content Row -->

    <!-- Content Row -->
</div>
<!-- End of Main Content -->
</div>

<!-- Modal  new-->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                    <div class="form-group">
                        <h6>Last Order : <?= $i - 1; ?></h6>
                        <input type="text" class="form-control" id="menu_order" name="menu_order" placeholder="Menu Order">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->