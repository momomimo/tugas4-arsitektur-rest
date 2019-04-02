<?php 
include 'vendor/autoload.php';
$id = $_POST['idx'];
use GuzzleHttp\Client;

$client = new Client();

$respon = $client->request('GET', 'https://momomimo1602webservice.000webhostapp.com/server-api/tampil_by_id.php', [
    'query' => [
        'id' => $id
    ]
]);
$result = json_decode($respon->getBody()->getContents(), true);
for ($x = 0; $x < count($result); $x++) {
    $id = $result['id'];
    $jenis = $result['jenis'];
    $nama_pp = $result['nama_pp'];
    $alamat_pp = $result['alamat_pp'];
    $switching = $result['switching'];
} ?>

<form action="prosesedit.php" method="POST">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Terminal ID:</label>
        <input type="text" class="form-control" name="noid" value="<?= $id; ?>">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Jenis:</label>
        <input type="text" class="form-control" name="jenis" value="<?= $jenis; ?>">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Nama Payment Point:</label>
        <input type="text" class="form-control" name="nama_pp" value="<?= $nama_pp; ?>">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Alamat Mitra:</label>
        <input type="text" class="form-control" name="alamat_pp" value="<?= $alamat_pp; ?>">
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
        <button type="button" class="btn btn-secondary" res$result-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
    </div>
</form> 