<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($role as $r) :
          ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $r['role']; ?></td>
              <td>
                <a href="<?= base_url('admin/roleAccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                <a type="button" class="badge badge-success" data-toggle="modal" data-target="#modalrole<?php echo $r['id']; ?>">edit</a>
                <a href="<?php echo base_url('admin/rolehapus/') . $r['id']; ?>" class="badge badge-danger">delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModal">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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


<!-- Modal edit -->
<?php $no = 0;
foreach ($role as $r) : $no++; ?>
    <div class="modal fade" id="modalrole<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="modalroleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalroleLabel">modal edit</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/role_edit/' . $r['id']); ?>" method="post">
                    <div class="modal-body" <?php echo form_open_multipart('admin/role_edit'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <?php echo form_close() ?>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>