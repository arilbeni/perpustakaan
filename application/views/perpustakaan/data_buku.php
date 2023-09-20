<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#newDataModal">Add New Book</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($perpustakaan as $db) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $db['nama_buku']; ?></td>
                            <td><?= $db['nama_kelas']; ?></td>
                            <td><?= $db['penulis']; ?></td>
                            <td><?= $db['penerbit']; ?></td>
                            <td>
                                <a type="button" class="badge badge-success" data-toggle="modal" data-target="#modalbuku<?php echo $db['id']; ?>">edit</a>
                                <a href="<?php echo base_url('perpustakaan/hapus/') . $db['id']; ?>" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newDataModal" tabindex="-1" aria-labelledby="newDataModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataModal">Add New Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('perpustakaan/data_buku'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option value="">Select Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="nama buku">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="penulis">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="penerbit">
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
<?php foreach ($perpustakaan as $db) : ?>
    <div class="modal fade" id="modalbuku<?php echo $db['id']; ?>" tabindex="-1" aria-labelledby="newDataModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDataModal">Modal Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('perpustakaan/databuku_edit/' . $db['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <option value="">Select Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <?php if ($db['id_kelas'] == $k['id']) { ?>
                                        <option value="<?= $k['id']; ?>" selected><?= $k['nama_kelas']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $db['nama_buku'] ?>" placeholder="nama buku">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $db['penulis'] ?>" placeholder="penulis">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $db['penerbit'] ?>" placeholder="penerbit">
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