<div class="card">
    <div class="card-header">
        <h3 class="card-title text-uppercase fs-4 fw-bolder">Semua Paket</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Resi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <th>Delete</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM shipment JOIN kategori ON kategori.ID_Kategori = shipment.ID_Kategori JOIN user_public ON user_public.Username = shipment.Username;");
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><a data-bs-toggle="modal" data-bs-target="#Detail<?= $data['ID_Pengiriman'] ?>" href=""><?= $data['ID_Pengiriman']; ?></a></td>
                        <td><?= $data['Nama_Kategori']; ?></td>
                        <td>
                            <?php if ($data['status'] == 1) : ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif ($data['status'] == 2) : ?>
                                <span class="badge badge-warning">Packing</span>
                            <?php elseif ($data['status'] == 3) : ?>
                                <span class="badge badge-primary">Delivered</span>
                            <?php elseif ($data['status'] == 4) : ?>
                                <span class="badge badge-success">Arived</span>
                            <?php endif ?>
                        </td>
                        <div class="">
                            <td class="text-center">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['ID_Pengiriman'] ?>" href=""><span class="badge bg-warning"><i class="fas fa-edit fa-2x"></i></span></a>
                            </td>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <td class="text-center">
                                    <a href="../../../function/CRUD_pengiriman.php?id_kirim_hapus=<?= $data['ID_Pengiriman'] ?>"><span class="badge bg-danger"><i class="fas fa-trash-alt fa-2x"></i></span></a>
                                </td>
                            <?php endif ?>
                        </div>
                    </tr>
                    <!-- Modal edit -->
                    <div class="modal fade" id="exampleModal<?= $data['ID_Pengiriman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../../../function/CRUD_pengiriman.php" method="POST">
                                        <?php
                                        $id = $data['ID_Pengiriman'];
                                        $edit = mysqli_query($con, "SELECT * FROM shipment JOIN kategori ON kategori.ID_Kategori = shipment.ID_Kategori WHERE shipment.ID_Pengiriman = $id");
                                        while ($row = mysqli_fetch_array($edit)) {

                                        ?>
                                            <div style="color: black;" class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="margin-bottom: 5px;" for="tambahid">RESI</label>
                                                    <input type="number" class="form-control" name="ID_Pengiriman_edit" value="<?= $row['ID_Pengiriman'] ?>" readonly> <br>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="margin-bottom: 5px;" for="tambahnama">Kategori</label>
                                                    <select name="ID_Kategori_edit" class="form-select" id="inputGroupSelect01">
                                                        <?php if ($row['Nama_Kategori'] == $row['Nama_Kategori']) : ?>
                                                            <?php
                                                            $id_selection = $row['ID_Kategori'];
                                                            $selection2 = mysqli_query($con, "SELECT * FROM kategori WHERE ID_Kategori = '$id_selection'");
                                                            while ($opsi2 = mysqli_fetch_array($selection2)) {
                                                            ?>
                                                                <option value="<?= $opsi2['ID_Kategori'] ?>"><?= $opsi2['Nama_Kategori'] ?></option>
                                                            <?php } ?>
                                                        <?php endif ?>
                                                        <?php
                                                        $selection = mysqli_query($con, "SELECT * FROM kategori");
                                                        while ($opsi = mysqli_fetch_array($selection)) {
                                                        ?>
                                                            <option value="<?= $opsi['ID_Kategori'] ?>"><?= $opsi['Nama_Kategori'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <br>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="margin-bottom: 5px;" for="tambahalamat">Status</label>
                                                    <select name="status_edit" class="form-select" id="inputGroupSelect01">
                                                        <?php if ($row['status'] == 1) : ?>
                                                            <option value="1" selected>Pending</option>
                                                        <?php elseif ($row['status'] == 2) : ?>
                                                            <option value="2" selected>Packing</option>
                                                        <?php elseif ($row['status'] == 3) : ?>
                                                            <option value="3" selected>Delivered</option>
                                                        <?php elseif ($row['status'] == 4) : ?>
                                                            <option value="4" selected>Arrived</option>
                                                        <?php endif ?>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Packing</option>
                                                        <option value="3">Deliver</option>
                                                        <option value="4">Arrive</option>
                                                    </select>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="modal-footer d-flex justify-content-start">
                                            <button type="submit" name="edit_pengiriman" class="btn btn-primary justify-content-start d-flex">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal view -->
                    <div class="modal fade" id="Detail<?= $data['ID_Pengiriman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Paket</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $resi = $data['ID_Pengiriman'];
                                    $detail_paket = mysqli_query($con, "SELECT * FROM shipment JOIN kategori ON kategori.ID_Kategori = shipment.ID_Kategori JOIN user_public ON user_public.Username = shipment.Username JOIN ongkir ON ongkir.ID_Ongkir = shipment.ID_Ongkir WHERE shipment.ID_Pengiriman = $resi;");
                                    while ($paket_detail = mysqli_fetch_array($detail_paket)) {
                                    ?>
                                        <h3 class="">Resi</h3>
                                        <p><?= $paket_detail['ID_Pengiriman'] ?></p>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <h3>Pengirim</h3>
                                                <div class="box-pengirim">
                                                    <p class="fw-bold"><?= $paket_detail['Nama'] ?></p>
                                                    <p><?= $paket_detail['Alamat'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h3>Penerima</h3>
                                                <p class="fw-bold"><?= $paket_detail['Nama_Penerima'] ?></p>
                                                <p><?= $paket_detail['Alamat_Penerima'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <h3>Detail</h3>
                                                <p><?= $paket_detail['Nama_Kategori'] ?></p>
                                                <?php if ($paket_detail['status'] == 1) : ?>
                                                    <p class="badge badge-warning">Pending</p>
                                                <?php elseif ($paket_detail['status'] == 2) : ?>
                                                    <p class="badge badge-warning">Packing</p>
                                                <?php elseif ($paket_detail['status'] == 3) : ?>
                                                    <p class="badge badge-warning">Delivered</p>
                                                <?php elseif ($paket_detail['status'] == 4) : ?>
                                                    <p class="badge badge-warning">Arived</p>
                                                <?php endif ?>
                                                <p>Dibuat : <?= $paket_detail['Dibuat'] ?> </p>
                                                <p>Terakhir Diubah : <?= $paket_detail['Diubah'] ?></p>
                                            </div>
                                            <div class="col">
                                                <?php
                                                $Harga = $paket_detail['Ongkos'];
                                                ?>
                                                <h4>Ongkir</h4>
                                                <p>Total Biaya : Rp <?= number_format($Harga, 2, ",", "."); ?> </p>
                                            </div>
                                        </div>
                                        <div class="mt-4 d-flex justify-content-end">
                                            <a href="../../../function/printPDF.php?ID_Pengiriman=<?= $paket_detail['ID_Pengiriman']; ?>"><button class="btn btn-danger">Print</button></a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
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