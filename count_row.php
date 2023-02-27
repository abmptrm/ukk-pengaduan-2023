

<?php
    include 'php/koneksi/koneksi.php';

    $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan");
    // echo $cnt;

    $row = mysqli_fetch_array($cnt);

    $total = $row[0];
    echo "Total rows: " . $total;

    mysqli_close($koneksi);
?>









<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 150px">Foto</th>
                                                <th style="width: 150px">Tanggal Pengaduan</th>
                                                <th>Isi Pengaduan</th>
                                                <th style="width: 150px">Status</th>
                                                <th style="width: 150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php       
                                                $no = 1; 

                                                $nik = $_SESSION['nik'];

                                                $query = "SELECT * FROM pengaduan WHERE nik='$nik'";

                                                $result = mysqli_query($koneksi, $query);

                                                // Lakukan perulangan untuk membaca setiap baris hasil query
                                                while ($row = mysqli_fetch_assoc($result)) {   
                                                
                                            ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="text-center">
                                                    <img data-enlargable src="uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br>
                                                    <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                        <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                    </a>
                                                    
                                                </td>
                                                <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                <td><?= $row['isi_laporan'] ?></td>
                                                <td class="text-center ">
                                                    <?php if ($row['status'] == '0') { ?>
                                                        <span class="badge bg-warning">Menunggu</span>
                                                    <?php } else if ($row['status'] == 'proses') { ?>
                                                        <span class="badge bg-primary">Proses</span>
                                                    <?php } else if ($row['status'] == 'tolak') { ?>
                                                        <span class="badge bg-danger">Tolak</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-success">Selesai</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-info mx-2" data-toggle="modal"
                                                    data-target="#modal-edit<?= $row['id_pengaduan']?>">
                                                        <div class="fas fa-edit"></div>
                                                    </a>
                                                    <a href="php/pengaduan/hapus_pengaduan.php?id_pengaduan=<?php echo $row['id_pengaduan']?>" class="btn btn-danger mx-2">
                                                        <div class="fas fa-trash"></div>
                                                    </a>


                                                </td>
                                            </tr>

                                           

                                            <?php
                                                }
                                            ?>


                                            

                                            
                                        </tbody>
                                    </table>


