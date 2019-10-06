 <div class="container">
      <div class="row"> 
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>data yang akan ditampilkan</th>
          </tr>
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "nama_database";

            // Membuat Koneksi
            $koneksi = new mysqli($servername, $username, $password, $dbname);
            
            // Melakukan Cek Koneksi
            if ($koneksi->connect_error) {
                die("Koneksi Gagal : " . $koneksi->connect_error);
            } 

            //Melakukan query
            $sql = "SELECT * FROM nama_table";
            $hasil = $koneksi->query($sql);
            $no = 1;
            if ($hasil->num_rows > 0) {
                foreach ($hasil as $row) { ?>
                   <tr>     
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama_data']; ?></td>
                  <?php echo "<td><a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$row['id'].">Detail</a></td>"; ?>
                  </tr>
            <?php 
            $no++; 
            } 
              } else { 
            echo "0 results"; 
              } $koneksi->close(); 
            ?>

        </table>
      </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>