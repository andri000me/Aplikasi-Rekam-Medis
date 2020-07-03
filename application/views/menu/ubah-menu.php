<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Menu
                </div>
                <div class="card-body">
                    <form action="<?= base_url('menu/ubahMenu'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        <div class="form-group">
                            <label for="menu">Nama menu</label>
                            <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                            <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="menu_order">Menu Order</label>
                            <input type="text" class="form-control" id="menu_order" name="menu_order" value="<?= $menu['menu_order']; ?>">
                            <small class="form-text text-danger"><?= form_error('menu_order'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div> 