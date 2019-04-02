<?php
include 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$respon = $client->request('GET', 'https://momomimo1602webservice.000webhostapp.com/server-api/tampil.php', []);

$result = json_decode($respon->getBody()->getContents(), true);

$namaapp = " REST Client";
$tugas = "Tugas 4 -";
$pengguna = "SUTRIMO";
$nim = "16.01.53.0183";
$judul = "Master Data";
$subjudul = "Penduduk";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $tugas, $namaapp; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome/all.css">
    <link rel="stylesheet" href="css/my.css">
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/my.js"></script>
    <script src="js/fontawesome/all.js"></script>
</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"><?= $namaapp; ?></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="img/momo.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?= $pengguna; ?></strong>
                        </span>
                        <span class="user-role"><?= $nim; ?></span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>NAVIGATION</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Master Data</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Produk</a>
                                    </li>
                                    <li>
                                        <a href="#">Transaksi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page-content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://momomimo1602webservice.000webhostapp.com/server-api/tampil.php">Rest-Server</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $subjudul; ?></li>
                    </ol>
                </nav>
                <h2><?= $subjudul; ?></h2>
                <p>Untuk Rest-Client saya menggunakan Plugin <a href="http://docs.guzzlephp.org/en/stable/overview.html" target="_blank">GuzzleHttp</a> untuk mempermudah proses GET, PUT, DELETE, POST. <br>
                Maaf Pak, Sepertinya untuk fungsi PUT/Edit dan DELETE/Hapus tidak ijinkan oleh pihak 000webhostapp, karena bukan Member berbayar.
                </p>
                <hr>
                <div class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tambah" data-whatever="@mdo">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Terminal ID</th>
                                <th scope="col" class="text-center">Jenis</th>
                                <th scope="col" class="text-center">Nama Payment Point</th>
                                <th scope="col" class="text-center">Alamat Mitra</th>
                                <th scope="col" class="text-center">Bank</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $q = "";

                            foreach ($result["hasil"] as $data) { ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $no++; ?></th>
                                <th scope="row" class="text-center"><?= $data['id']; ?></th>
                                <td class="text-center"><?= $data['jenis']; ?></td>
                                <td class="text-center"><?= $data['nama_pp']; ?></td>
                                <td class="text-center"><?= $data['alamat_pp']; ?></td>
                                <td class="text-center"><?= $data['switching']; ?></td>
                                <td class="text-center">
                                    <a href="#edit" class="btn btn-warning" data-toggle="modal" data-id="<?php echo $data['id']; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#hapus" class="btn btn-danger" data-toggle="modal" data-id="<?php echo $data['id']; ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="prosesinput.php" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Terminal ID:</label>
                            <input type="text" class="form-control" name="noid">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jenis:</label>
                            <input type="text" class="form-control" name="jenis">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Payment Point:</label>
                            <input type="text" class="form-control" name="nama_pp">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Alamat Mitra:</label>
                            <input type="text" class="form-control" name="alamat_pp">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Switching:</label>
                            <select class="form-control" name="switching">
                                <option value="AG">Artha Graha</option>
                                <option value="BRIS">Bri Syariah</option>
                                <option value="MUP">Mandiri</option>
                                <option value="BKN">Bukopin</option>
                                <option value="BTN">BTN</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah">Tambah Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="hasil-data" class="modal-body">
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Tambah Hapus -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="hasil-hapus" class="modal-body">
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#edit').on('show.bs.modal', function(e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: 'detail.php',
                    data: 'idx=' + idx,
                    success: function(data) {
                        $('#hasil-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
            $('#hapus').on('show.bs.modal', function(e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: 'hapus.php',
                    data: 'idx=' + idx,
                    success: function(data) {
                        $('#hasil-hapus').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>

</body>





</html> 
