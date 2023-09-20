<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('perpustakaan', '<div class="alert alert-danger" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-secondary mb-3" data-toggle="modal" 
            data-target="#newKategoriModal">Add New Kategori</a>

            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($perpustakaan as $pr) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $pr['nama_kelas']; ?></td>
                    <td>
                        <a type="button" class="badge badge-success" data-toggle="modal" data-target="#editKategoriModal<?php echo $pr['id']; ?>">edit</a>
                        <a href="<?php echo base_url('perpustakaan/hapuskategori/') . $pr['id']; ?>" class="badge badge-danger">delete</a>
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


<!-- Modal -->
<div class="modal fade" id="newKategoriModal" tabindex="-1" aria-labelledby="newKategoriModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKategoriModal">Add New Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('perpustakaan/kategori_buku'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" 
            id="nama_kelas" name="nama_kelas" placeholder="Kategori Buku">
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
foreach ($perpustakaan as $pr) : $no++; ?>
<div class="modal fade" id="editKategoriModal<?php echo $pr['id']; ?>" tabindex="-1" aria-labelledby="editKategoriModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKategoriModal">modal edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('perpustakaan/kategori_edit/' . $pr['id']); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $pr['nama_kelas']; ?>">
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
<?php endforeach; ?>
