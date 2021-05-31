<?php
function rupiah($harga)
{
    $h = number_format($harga, 2, ',', '.');
    return "Rp." . $h;
}

function harga_rumah($array)
{
    $harga = $array[0];
    $dp = $array[1];
    $angsuran = $array[2];
    $bunga = $array[3];

    // sisa bayar
    $sisaBayar = $harga - $dp;

    // bunga tahunan
    $bungaTahunan = $sisaBayar * $bunga / 100;

    // total harga rumah
    $totalHarga = $harga + ($bungaTahunan * $angsuran) - $dp;

    return $totalHarga;
}

function angsuran($total, $angsuran)
{
    $total = $total / ($angsuran * 12);

    return $total;
}