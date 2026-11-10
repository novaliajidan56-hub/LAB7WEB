<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp " . number_format($hargaAkhir, 0, ",", ".") . "<br><br>";

// Function tambahan: Menghitung Luas Persegi Panjang
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
echo "Luas Persegi Panjang (Panjang: 8, Lebar: 4) = " . hitungLuasPersegiPanjang(8, 4);
?>