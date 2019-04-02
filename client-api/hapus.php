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
    $nama_pp = $result['nama_pp'];
} ?>


<form action="proseshapus.php" method="POST">
    <h3 for="recipient-name" class="text-center">Anda Yakin Ingin Menghapus Data <?= $nama_pp; ?>?</h3>
    <input type="text" readonly class="form-control" name="noid" value="<?= $id; ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
    </div>
</form> 