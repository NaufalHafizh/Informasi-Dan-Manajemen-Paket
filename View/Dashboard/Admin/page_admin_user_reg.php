<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody id="data">

    </tbody>
</table>

<script src="../../../plugin/jquery/jquery.min.js"></script>
<script>
    fetch("http://informasi-dan-manajemen-paket.test/function/readData.php").then(
        res => {
            res.json().then(
                Data => {
                    console.log(data.data);
                    if (Data.Data.length > 0) {

                        var temp = "";
                        Data.Data.forEach((itemData) => {
                            temp += "<tr>";
                            temp += "<td>" + itemData.Username + "</td>";
                            temp += "<td>" + itemData.Email + "</td>";
                            temp += "<td>" + itemData.Nama + "</td></tr>";
                        });
                        document.getElementById('data').innerHTML = temp;
                    }
                }
            )
        }
    )
</script>

<script src="../../../plugin/datatables/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('.table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>