    <?php
        
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        // Menghitung total menggunakan operator perkalian (*) 
        $total = $harga * $jumlah;

        // Menghitung potongan 10% (0.1)
        $potongan = 0.1 * $total;

        
        $total_akhir = $total - $potongan;

       
        echo "Harga: $harga <br/>";
        echo "Jumlah: $jumlah <br/>";
        echo "============================ <br/>";
        echo "Total Awal: $total <br/>";
        echo "Potongan (10%): $potongan <br/>";
        echo "<strong>Total Setelah Potongan: $total_akhir</strong>";
    ?>
