<?php
class Terminal
{

    private $conn;

    public $id;
    public $jenis;
    public $nama_pp;
    public $alamat_pp;
    public $switching;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT id, jenis, nama_pp, alamat_pp, switching FROM tbl_terminal ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    function readID()
    {

        $query = "SELECT id, jenis, nama_pp, alamat_pp, switching FROM tbl_terminal WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->jenis = $row['jenis'];
        $this->nama_pp = $row['nama_pp'];
        $this->alamat_pp = $row['alamat_pp'];
        $this->switching = $row['switching'];
    }
    function create()
    {

        $query = "INSERT INTO tbl_terminal
        SET id=:id,
        jenis=:jenis,
        nama_pp=:nama_pp,
        alamat_pp=:alamat_pp, 
        switching=:switching";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->jenis = htmlspecialchars(strip_tags($this->jenis));
        $this->nama_pp = htmlspecialchars(strip_tags($this->nama_pp));
        $this->alamat_pp = htmlspecialchars(strip_tags($this->alamat_pp));
        $this->switching = htmlspecialchars(strip_tags($this->switching));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":jenis", $this->jenis);
        $stmt->bindParam(":nama_pp", $this->nama_pp);
        $stmt->bindParam(":alamat_pp", $this->alamat_pp);
        $stmt->bindParam(":switching", $this->switching);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    function delete()
    {

        $query = "DELETE FROM tbl_terminal WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    function update()
    {

        $query = "UPDATE tbl_terminal
        SET id=:id,
        jenis=:jenis,
        nama_pp=:nama_pp,
        alamat_pp=:alamat_pp, 
        switching=:switching 
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->jenis = htmlspecialchars(strip_tags($this->jenis));
        $this->nama_pp = htmlspecialchars(strip_tags($this->nama_pp));
        $this->alamat_pp = htmlspecialchars(strip_tags($this->alamat_pp));
        $this->switching = htmlspecialchars(strip_tags($this->switching));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":jenis", $this->jenis);
        $stmt->bindParam(":nama_pp", $this->nama_pp);
        $stmt->bindParam(":alamat_pp", $this->alamat_pp);
        $stmt->bindParam(":switching", $this->switching);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
