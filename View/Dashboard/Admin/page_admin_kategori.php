<?php
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-uppercase fs-4 fw-bolder">Kategori</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <button data-bs-toggle="modal" data-bs-target="#tambahAdmin" class="ms-auto d-flex mb-2 btn btn-success">Kategori<i class="fas fa-plus mt-1 ml-1"></i></button>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kategori</th>
                    <th>Nama</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM kategori");
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['ID_Kategori']; ?></td>
                        <td><?= $data['Nama_Kategori']; ?></td>
                        <div class="">
                            <td class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['ID_Kategori'] ?>" href=""><span class="badge bg-warning"><i class="fas fa-edit fa-2x"></i></span></a>
                            </td>
                            <td class="text-center">
                                <a href="../../../function/CRUD_kategori.php?id_kategori_hapus=<?= $data['ID_Kategori'] ?>"><span class="badge bg-danger"><i class="fas fa-trash-alt fa-2x"></i></span></a>
                            </td>
                        </div>
                    </tr>

                    <!-- modal edit kurir -->
                    <div class="modal fade" id="exampleModal<?= $data['ID_Kategori']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kurir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../../../function/CRUD_kategori.php" method="POST">
                                        <?php
                                        $Id_kategori = $data['ID_Kategori'];
                                        $editkategori = mysqli_query($con, "SELECT * FROM kategori WHERE ID_Kategori = '$Id_kategori'");
                                        while ($edit = mysqli_fetch_array($editkategori)) {
                                        ?>
                                            <div style="color: black;" class="row">
                                                <div class="form-groub col-md-6">
                                                    <label for="">ID Kategori</label>
                                                    <input type="text" class="form-control" name="ID_kategori_edit" value="<?= $edit['ID_Kategori']; ?>" readonly> <br>
                                                </div>
                                                <div class="form-groub col-md-6">
                                                    <label for="">Nama</label>
                                                    <input class="form-control" type="text" name="nama_kategori_edit" value="<?= $edit['Nama_Kategori']; ?>">
                                                    <br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="modal-footer">
                                            <button type="submit" name="edit_kategori" class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

                }
                ?>
            </tbody>
        </table>
        <!-- modal tambah -->
        <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tamabah Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../../../function/CRUD_kategori.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-groub col-md-6">
                                    <label for="">ID Kategori</label>
                                    <input type="text" class="form-control" name="Id_kategori"> <br>
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="">Nama</label>
                                    <input class="form-control" type="text" name="nama_kategori">
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="tambah_kategori">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../plugin/jquery/jquery.min.js"></script>
<script src="../../../plugin/datatables/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>