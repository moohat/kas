<?php
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM kas WHERE kode = '$id' ");
if($sql){
                    ?>
                    <script type="text/javascript">
                        alert("Hapus Data berhasil");
                        window.location.href="?page=masuk";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        alert("Hapus Data Gagal");
                        window.location.href="?page=masuk";                            
                    </script>

                    <?php
                }

?>