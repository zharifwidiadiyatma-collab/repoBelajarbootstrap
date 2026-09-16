<?php
    $nama = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];
    $seri = $_POST['seri'];
    $merk = $_POST['merk'];
    $negara = $_POST['negara'];
   
    $tgl = $_POST['angka_hari'] ;
    $bln = $_POST['bulan'] ;
    $thn = $_POST['tahun'] ;

    $harga = $_POST['harga'] ;
    $stok = $_POST['stok'] ;

    //$merk_besar = ucfirst($merk) ;

    $kode_barang = [
        $jenis,
        str_pad($seri,6,"0",STR_PAD_LEFT),
        substr($merk,0,3),
        substr($negara,0,3),
    ] ;

    $kode = implode("/",$kode_barang) ;

    $tanggal = date("l,d F Y", strtotime("$thn-$bln-$tgl")) ;
    $total_harga = $harga * $stok ;

    
    ?>
    <body>
    <h1>Data Barang</h1>
    <table>
        <tr>
            <td>Kode</td>
            <td>:</td>
            <td><?php echo $kode ?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><?php echo strtoupper($nama) ?></td>
        </tr>
        <tr>
            <td>Nomor Seri</td>
            <td>:</td>
            <td><?php echo $seri ?></td>
        </tr>
        <tr>
            <td>Merk</td>
            <td>:</td>
            <td><?php echo $merk ?></td>
        </tr>
        <tr>
            <td>Buatan Dari</td>
            <td>:</td>
            <td><?php echo $negara ?></td>
        </tr>
        <tr>
            <td>Tanggal Pembuatan</td>
            <td>:</td>
            <td><?php echo $tanggal ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><?php echo "Rp. ".number_format($harga,2,',','.') ?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><?php echo $stok ?></td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td><?php echo "Rp. ".number_format($total_harga,2,',','.') ?></td>
    </table>
</body>
