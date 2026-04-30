<?php
// ================== ANTI ERROR SYSTEM ==================
error_reporting(0);
ini_set('display_errors', 0);

if (ob_get_length()) ob_end_clean();
ob_start();

// ================== AUTOLOAD ==================
require __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;

// ================== KONEKSI ==================
$connect = new mysqli("localhost", "root", "", "posyandu");

if ($connect->connect_error) {
    die("Koneksi gagal");
}

// ================== FUNGSI TABEL ==================
function buatTabel($connect, $judul, $sql){
    $html = "<h4>$judul</h4>";
    $query = $connect->query($sql);

    if(!$query){
        return "<p>Error query</p>";
    }

    if($query->num_rows > 0){
        $html .= "<table>
        <tr>";

        while($field = $query->fetch_field()){
            $html .= "<th>{$field->name}</th>";
        }
        $html .= "</tr>";

        while($row = $query->fetch_assoc()){
            $html .= "<tr>";
            foreach($row as $data){
                $html .= "<td>".htmlspecialchars($data)."</td>";
            }
            $html .= "</tr>";
        }

        $html .= "</table><br>";
    } else {
        $html .= "<p>Tidak ada data</p>";
    }

    return $html;
}

// ================== HTML ==================
$html = "
<h2 style='text-align:center;'>POSYANDU SEHAT</h2>
<p style='text-align:center;'>Laporan Data Posyandu</p>
<hr>
<p>Tanggal Cetak: ".date('d-m-Y')."</p>

<style>
body { font-family: Arial; }
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 5px;
}
th {
    background-color: #2c7be5;
    color: white;
}
td, th {
    border: 1px solid #000;
    padding: 5px;
    font-size: 11px;
}
h4 {
    margin-top: 20px;
}
</style>
";

// ================== SEMUA TABEL ==================
$html .= buatTabel($connect, "Data User", "SELECT * FROM user");
$html .= buatTabel($connect, "Data Ibu Hamil", "SELECT * FROM ibu_hamil");
$html .= buatTabel($connect, "Kesehatan Ibu Hamil", "SELECT * FROM kesehatan_ibu_hamil");
$html .= buatTabel($connect, "Data Balita", "SELECT * FROM balita");
$html .= buatTabel($connect, "Kesehatan Balita", "SELECT * FROM kesehatan_balita");
$html .= buatTabel($connect, "Penimbangan", "SELECT * FROM penimbangan");
$html .= buatTabel($connect, "Imunisasi", "SELECT * FROM imunisasi");
$html .= buatTabel($connect, "Riwayat Imunisasi", "SELECT * FROM riwayat_imunisasi");
$html .= buatTabel($connect, "Kegiatan Posyandu", "SELECT * FROM kegiatan_posyandu");

// ================== FOOTER ==================
$html .= "
<br><br>
<p>Petugas Posyandu</p>
<br><br>
<p>__________________________</p>
";

// ================== PDF ==================
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

if (ob_get_length()) ob_end_clean();

$dompdf->render();
$dompdf->stream("laporan_posyandu.pdf", ["Attachment"=>false]);
exit;
?>