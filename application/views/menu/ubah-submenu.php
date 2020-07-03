<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Sub Menu
                </div>
                <div class="card-body">
                    <form action="<?= base_url('menu/ubahSubmenu'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $subMenu['id']; ?>">
                        <div class="form-group">
                            
                            <label for="title">Submenu Tittle</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $subMenu['title']; ?>">
                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                        </div>
                        <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                            <?php if($m['id']==$subMenu['menu_id']): ?>
                            <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                            <?php else : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                        </div>
                        <div class="form-group">
                            <label for="url">Submenu URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $subMenu['url']; ?>">
                            <small class="form-text text-danger"><?= form_error('url'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="icon">Submenu Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $subMenu['icon']; ?>">
                            <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                        </div>
                        <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div> 