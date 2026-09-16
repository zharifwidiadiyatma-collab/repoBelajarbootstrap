<?php
require_once 'koneksiakad.php'; 

function bacamhs2($sql){
    $data = array();
    $koneksi = koneksiAkademik(); 
    $hasil = mysqli_query($koneksi, $sql);
    if (!$hasil) {
        return null;
    }

    if (mysqli_num_rows($hasil) == 0) {
        mysqli_close($koneksi);
        return null;
    }

    while($baris = mysqli_fetch_assoc($hasil)){
        $data[] = array(
            'nim' => $baris['nim'],
            'nama' => $baris['nama'],
            'kelamin' => $baris['kelamin'],
            'jurusan' => $baris['jurusan']
        );
    }

    mysqli_close($koneksi);
    return $data;
}

//  Ambil semua data
function bacaSemuaMhs(){
    $sql = "SELECT * FROM mahasiswa";
    return bacamhs2($sql);
}
function tambahMhs($nim, $nama, $kelamin, $jurusan){
    $koneksi = koneksiAkademik();

    $cek = mysqli_query($koneksi, "SELECT nim FROM mahasiswa WHERE nim='$nim'");
    if(mysqli_num_rows($cek) > 0){
        mysqli_close($koneksi);
        header("Location: gagaltambah.php?alasan=duplikat");
        exit();
    }

    
    $sql = "INSERT INTO mahasiswa VALUES('$nim', '$nama', '$kelamin', '$jurusan')";
    $hasil = 0;
    if(mysqli_query($koneksi, $sql))
        $hasil = 1;
    mysqli_close($koneksi);
    return $hasil;
}


//  Filter per jurusan
function bacaMhsPerJurusan($jurusan){
    $koneksi = koneksiAkademik();
    $jurusanSafe = mysqli_real_escape_string($koneksi, $jurusan);
    $sql = "SELECT * FROM mahasiswa WHERE jurusan='$jurusanSafe'";
    return bacamhs2($sql);
} 


function cariMhsDariNama($nama){
    $koneksi = koneksiAkademik();
    $namaSafe = mysqli_real_escape_string($koneksi, $nama);
    // Menggunakan LIKE agar bisa mencari potongan nama
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$namaSafe%'";
    return bacamhs2($sql);
}

function cariMhsDariNim($nim){
    $koneksi = koneksiAkademik();
    $nimSafe = mysqli_real_escape_string($koneksi, $nim);
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nimSafe'";
    $data = bacamhs2($sql);

    return ($data != null) ? $data[0] : null;
}
//menghapus 1 record berdasarkan field kunci nim
function hapusMhs($nim){
    $koneksi = koneksiAkademik();
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    
    // Tambahkan $koneksi di dalam mysqli_error()
    if(!mysqli_query($koneksi, $sql)){
        die('Error: ' . mysqli_error($koneksi)); 
    }
    
    
    $hasil = mysqli_affected_rows($koneksi);
    mysqli_close($koneksi);
    return $hasil;


}

function cariMhs($nim){
    $koneksi = koneksiAkademik();
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $hasil = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($hasil)>0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['nim'] = $baris['nim'];
        $data['nama'] = $baris['nama'];
        $data['kelamin'] = $baris['kelamin'];
        $data['jurusan'] = $baris['jurusan'];
        return $data;
    } else{
        mysqli_close($koneksi);
    }
    return null;
}
function cariSemuaMhs($kondisi){
    $sql = "SELECT * FROM mahasiswa WHERE $kondisi";
    return bacamhs2($sql);
}

function ubahMhs($nim, $nama, $kelamin,$jurusan){
    $koneksi = koneksiAkademik();
    $sql = "UPDATE mahasiswa
            SET nama = '$nama',
                kelamin = '$kelamin',
                jurusan = '$jurusan'
            WHERE nim = '$nim'";

    if(mysqli_query($koneksi,$sql)){
        $hasil = true;
    } else {
        $hasil = "Error mengubah record:" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
    return $hasil;
}

?>