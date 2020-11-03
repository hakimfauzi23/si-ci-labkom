<html>
<title>List Mahasiswa </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Mahasiswa  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"></i>
        Tambah Data Mahasiswa
      </button>
      <div class="mb-3"></div>
              <table class="table" >
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Lengkap</th>
                          <th>Angkatan</th>
                          <th>Prodi</th>
                          <th>No WA</th>
                          <th>Email</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <!--Fetch data dari database-->
                      <?php 
                       $i = $this->uri->segment(3)+1;
                      foreach ($data->result() as $row) :?>
                          <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row->nim; ?></td>
                              <td><?php echo $row->nama_lengkap; ?></td>
                              <td><?php echo $row->angkatan; ?></td>
                              <td><?php echo $row->prodi; ?></td>
                              <td><?php echo $row->no_wa; ?></td>
                              <td><?php echo $row->email; ?></td>

                              <td>
                                  <?php echo anchor('C_Mhs/delete_entry/'.$row->nim,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

                                  <?php echo anchor('C_Mhs/edit/'.$row->nim,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                              </td> 

                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              <div class="row">
                  <div class="col">
                      <!--Tampilkan pagination-->
                      <?php echo $pagination; ?>
                  </div>
              </div>
    </section>

    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah  Data  Baru Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <!-- <h3>Upload File Excel</h3>

          <a href="<?php echo base_url().'C_Mhs/download' ?>">Download Template File Excel</a>
          <?php echo form_open_multipart('C_Mhs/upload');?>
          <div class="form-group">

          <?php echo "<input type='file' name='file' size='20'  />";
          echo "<input type='submit' name='submit' value='upload' class='btn btn-primary' /> ";?>
          </div>

          <?php echo "</form>"?>
          <br>
          <br>
          <h4 align="center" class="bg-warning">Atau</h4>
          <br>
          <br>
          <h3>Input Manual</h3>
 -->
      <form method="post" action="<?php echo base_url().'C_Mhs/insert_entry'; ?>">
                
        <div class="form-group">
            <label > NIM</label>
            <input type="text" name="nim" class="form-control">
        </div>

        <div class="form-group">
            <label > Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control">
        </div>

        <div class="form-group">
            <label > Angkatan</label>
            <input type="text" name="angkatan" class="form-control">
        </div>



        <div class="form-group">
        <label>Program  Studi</label>
                                <?php  
                                            $option = array(

                                                    'D3-Farmasi' => 'D3-Farmasi',
                                                    'D3-Teknik Informatika' => 'D3-Teknik Informatika',
                                                    'S1-Matematika' => 'S1-Matematika',
                                                    'S1-Fisika' => 'S1-Fisika',
                                                    'S1-Informatika' => 'S1-Informatika',
                                                    'S1-Statistika' => 'S1-Statistika',
                                                    'S1-Informatika' => 'S1-Informatika',
                                                    'S1-Biologi' => 'S1-Biologi',
                                                    'S1-Farmasi' => 'S1-Farmasi',
                                                    'S1-Kimia' => 'S1-Kimia',
                                                    'S1-Ilmu Lingkungan' => 'S1-Ilmu Lingkungan',
                                                    'S2-Fisika' => 'S2-Fisika',
                                                    'S2-Biosains' => 'S2-Biosains',
                                                    'S2-Kimia' => 'S2-Kimia'

                                            );
                                            echo form_dropdown('prodi', $option, '', 'class="form-control "');
                                            ?>
        </div> 


        <div class="form-group">
            <label > Nomor WA</label>
            <input type="text" name="no_wa" class="form-control">
        </div> 


        <div class="form-group">
            <label > Email</label>
            <input type="text" name="email" class="form-control">
        </div> 

        

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>

      </form>
    </div>
  </div>
</div>

</div>
</div>
</html>