<div class="card">
    <div class="card-header">
        <h3 class="card-title text-uppercase fs-4 fw-bolder">Admin</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM admin WHERE Level='Admin'");
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['Username']; ?></td>
                        <td><?= md5($data['Password']); ?></td>
                        <td><?= $data['Email']; ?></td>
                        <td><?= $data['Nama']; ?></td>>
                    </tr>

                <?php

                }
                ?>
            </tbody>
        </table>
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