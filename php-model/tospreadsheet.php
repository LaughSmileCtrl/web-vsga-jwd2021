<?php
include_once('../vendor/autoload.php');
include_once('Connection.php');

use Model\Connection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$mysql = Connection::get();

if ($mysql->connect_error) {
    $html_doc = new DOMDocument();
    $html_doc->loadHTMLFile('error.html');
    $html_doc->getElementById('content');
    echo $html_doc->saveHTML();
    die();
}
$sql =  'SELECT prov.id AS id, '
    . '      prov.nama AS provinsi, '
    . '      kab.nama AS kabupaten '
    . 'FROM wilayah_provinsi prov '
    . 'INNER JOIN wilayah_kabupaten kab '
    . 'ON prov.id = kab.provinsi_id;';

$result = $mysql->query($sql);

Connection::close();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$i = 1;
foreach ($result AS $r) {
    $sheet->setCellValue('A'.$i, $r['id']);
    $sheet->setCellValue('B'.$i, $r['provinsi']);
    $sheet->setCellValue('C'.$i++, $r['kabupaten']);
}

$writer = new Xlsx($spreadsheet);
$writer->save('data-provinsi.xlsx');

header('Location:data-provinsi.xlsx');