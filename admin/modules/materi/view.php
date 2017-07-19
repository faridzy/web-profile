

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-desktop icon-title"></i> materi

    <a class="btn btn-primary btn-social pull-right" href="?module=form_materi&form=add">
      <i class="fa fa-plus"></i> Add
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "materi baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              The new materi is successfully saved.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "materi berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              The materi is successfully canged.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "materi berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              The materi is successfully deleted.
            </div>";
    }
    // jika alert = 4
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Failed!</h4>
              Make sure the uploaded file is correct.
            </div>";
    }
    // jika alert = 5
    // tampilkan pesan Upload Gagal "Pastikan ukuran gambar tidak lebih dari 1MB"
    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Failed!</h4>
              Make sure the image size is not more than 8 Mb.
            </div>";
    }
    // jika alert = 6
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
    elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Failed!</h4>
              Make sure the uploaded file is in *.DOCX / *.PDF / *.PPT /*.RAR
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel materi -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Nama File</th>
                <th class="center">Jenis File</th>
                <th class="center">Ukuran</th>
                <th class="center">Action</th>
                
               
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel warta
            $query = mysqli_query($mysqli, "SELECT * FROM is_materi ORDER BY materi_id DESC")
                                            or die('Ada kesalahan pada query tampil data materi: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='40' class='center'>$no</td>
                      <td width='150'>$data[nama_file]</td>
                      ";
                      
              if (!empty($data['nama_file'])){
             $pecah = explode(".", $data['nama_file']);
             $ekstensi = $pecah[1];
             if ($ekstensi == 'zip'){
                 echo "<td ><div class='wdgt-row'><img src='images/zip.png' class='img-responsive'></div></td>";
             }
             elseif ($ekstensi == 'rar'){
                 echo "<td><div class='wdgt-row'><img src='images/rar.png' class='img-responsive'></div></td>";
             }
             elseif ($ekstensi == 'doc'){
                 echo "<td ><div class='wdgt-row'><img src='images/doc.png' class='img-responsive'><div></td>";
             }
             elseif ($ekstensi == 'pdf'){
                 echo "<td ><div class='wdgt-row'><img src='images/pdf.png' class='img-responsive'></div></td>";
             }
             elseif ($ekstensi == 'ppt'){
                 echo "<td ><div class='wdgt-row'><img src='images/ppt.png' class='img-responsive'></div></td>";
             }
             elseif ($ekstensi == 'pptx'){
                 echo "<td ><div class='wdgt-row'><img src='images/pptx.png' class='img-responsive'></div></td>";
             }
             elseif ($ekstensi == 'docx'){
                 echo "<td ><div class='wdgt-row'><img src='images/doc.png' class='img-responsive'></div></td>";
             }
             }else{
                 echo "<td ><img src='images/kosong.png' class='img-responsive'></td>";
             }

             if (!empty($data['nama_file'])){
                            $file = "../materi/$data[nama_file]";                            
                            echo "<td> ". fsize($file)."</td>";
                            }else{
                                echo "<td>Kosong</td>";
                            }
                             
                    
              
                      echo"
                     
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Change' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_materi&form=edit&id=$data[materi_id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm" href="modules/materi/proses.php?act=delete&id=<?php echo $data['materi_id']?>&namafile=<?php echo $data['nama_file'] ?>" onclick="return confirm('Are you sure you want to delete <?php echo $data['materiname']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section>