<div class="card">
    <div class="card-header">
        <h3 class="card-title text-uppercase fs-4 fw-bolder">Courier</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <button data-bs-toggle="modal" data-bs-target="#tambahAdmin" class="ms-auto d-flex mb-2 btn btn-success">Courier<i class="fas fa-plus mt-1 ml-1"></i></button>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM admin WHERE Level='Courier'");
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['Username']; ?></td>
                        <td><?= md5($data['Password']); ?></td>
                        <td><?= $data['Email']; ?></td>
                        <td><?= $data['Nama']; ?></td>
                        <div class="">
                            <td class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['Username'] ?>" href=""><span class="badge bg-warning"><i class="fas fa-edit fa-2x"></i></span></a>
                            </td>
                            <td class="text-center">
                                <a href="../../../function/CRUD_courier.php?id_kurir_hapus=<?= $data['Username'] ?>"><span class="badge bg-danger"><i class="fas fa-trash-alt fa-2x"></i></span></a>
                            </td>
                        </div>
                    </tr>

                    <!-- modal edit kurir -->
                    <div class="modal fade" id="exampleModal<?= $data['Username']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kurir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../../../function/CRUD_courier.php" method="POST">
                                        <?php
                                        $Username = $data['Username'];
                                        $editKurir = mysqli_query($con, "SELECT * FROM admin WHERE Username = '{$Username}'");
                                        while ($edit = mysqli_fetch_array($editKurir)) {
                                        ?>
                                            <div style="color: black;" class="row">
                                                <div class="form-groub col-md-6">
                                                    <label for="">Username</label>
                                                    <input type="text" class="form-control" name="username_edit" value="<?= $edit['Username']; ?>" readonly> <br>
                                                </div>
                                                <div class="form-groub col-md-6">
                                                    <label for="">Password</label>
                                                    <input class="form-control" type="text" name="password_edit" value="<?= md5($edit['Password']); ?>" readonly>
                                                    <br>
                                                </div>
                                                <div class="form-groub col-md-6">
                                                    <label for="">Email</label>
                                                    <input class="form-control" type="email" name="email_edit" value="<?= $edit['Email']; ?>">
                                                </div>
                                                <div class="form-groub col-md-6">
                                                    <label for="">Nama</label>
                                                    <input class="form-control" type="text" name="nama_edit" value="<?= $edit['Nama']; ?>">
                                                    <br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="modal-footer">
                                            <button type="submit" name="edit_kurir" class="btn btn-warning">Update</button>
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
                        <form action="../../../function/CRUD_courier.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-groub col-md-6">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username"> <br>
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="">Password</label>
                                    <input class="form-control" type="text" name="password">
                                    <br>
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="">Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="">Level</label>
                                    <input value="Courier" class="form-control" type="text" name="level" readonly>
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="tambah_kurir">Tambah</button>
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