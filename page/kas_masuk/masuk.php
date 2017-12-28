 <div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-info">
            <div class="panel-heading">
               Data Kas Masuk
           </div>
           <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>                                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM kas where jenis='masuk'");

                        while ($data=$sql->fetch_assoc()) {

                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kode']; ?></td>
                                <td><?php echo date('d F Y',strtotime($data['tgl'])) ; ?></td>
                                <td><?php echo $data['keterangan']; ?></td>                                   
                                <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
                                <td align="center">
                                    <a href="" id="edit_data" class="btn btn-info" data-toggle="modal" data-target="#edit"
                                    data-id="<?php echo$data['kode'] ?>" 
                                    data-ket="<?php echo $data['keterangan']?>"
                                    data-tgl="<?php echo $data['tgl'] ?>"
                                    data-jml="<?php echo $data['jumlah'] ?>">
                                    <i class="fa fa-edit"  ></i> Edit</a>

                                    <a onclick="return confirm('Yakin mau hapus data?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php
                            @$total +=$data['jumlah']; 
                        }
                        ?>

                    </tbody>
                    <tr><th colspan="4" style="text-align: center; font-size: 20px" >Total Kas Masuk</th>
                        <th align="right" bgcolor="#42f4eb" style="text-align: right; font-size: 16px"><?php echo "Rp." .number_format($total).",-";?></th>
                    </tr>
                </table>
                <!--  Modals halaman tambah-->
                <div class="panel panel-primary">

                    <div class="panel-body">
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                         Tambah Data
                     </button>
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="input kode" />
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="ket" placeholder="Input Keterangan"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" name="tgl" placeholder="input tanggal" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control" name="jml" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Modals-->

            <?php
            if(isset($_POST['simpan'])){

                $kode = $_POST['kode'];
                $ket = $_POST['ket'];
                $tgl = $_POST['tgl'];
                $jml = $_POST['jml'];

                $sql = $koneksi->query("INSERT INTO kas (kode, keterangan, tgl, jumlah, jenis, keluar) VALUES('$kode','$ket','$tgl','$jml','masuk',0)");

                if($sql){
                    ?>
                    <script type="text/javascript">
                        alert("simpan data berhasil");
                        window.location.href="?page=masuk";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        alert("simpan Gagal");
                        window.location.href="?page=masuk";                            
                    </script>

                    <?php
                }


            }
            ?>

            <!-- Akhir halaman Tambah modals-->


            <!--  Modals halaman Edit-->

            <div class="panel-body">

                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Form Edit Data</h4>
                            </div>
                            <div class="modal-body" id="modal_edit">
                                <form role="form" method="POST">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input class="form-control" name="kode" placeholder="input kode" id="kode" readonly="true" />
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="ket" placeholder="Input Keterangan" id="ket"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="input tanggal" />
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" name="jml" id="jml" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                    </div>
                                </form>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <script type="text/javascript">
                $(document).on("click","#edit_data",function(){
                    var kode = $(this).data('id');
                    var ket = $(this).data('ket');
                    var tgl = $(this).data('tgl');
                    var jml = $(this).data('jml');

                    $("#modal_edit #kode").val(kode);
                    $("#modal_edit #ket").val(ket);
                    $("#modal_edit #tgl").val(tgl);
                    $("#modal_edit #jml").val(jml);
                });
            </script>

            <!-- End Modals-->
            <?php
            if(isset($_POST['ubah'])){

                $kode = $_POST['kode'];
                $ket = $_POST['ket'];
                $tgl = $_POST['tgl'];
                $jml = $_POST['jml'];

                $sql = $koneksi->query("UPDATE kas SET keterangan='$ket', tgl='$tgl', jumlah='$jml' WHERE kode='$kode'");


                if($sql){
                    ?>
                    <script type="text/javascript">
                        alert("Update data berhasil");
                        window.location.href="?page=masuk";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        alert("Update Gagal");
                        window.location.href="?page=masuk";                            
                    </script>

                    <?php
                }


            }
            ?>


            <!-- Akhir halaman edit modals-->


            
        </div>
    </div>
</div>
</div>
</div>

