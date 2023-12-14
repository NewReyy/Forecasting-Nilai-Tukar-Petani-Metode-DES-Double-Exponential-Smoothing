<?php  
    require "function.php";
    $kode = $_GET["id"];
    $hapus = mysqli_query($conn, "DELETE FROM pengunjung where id = '$kode'");

    if($hapus){
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'data-aktual.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'data-aktual.php';
            </script>
        ";
    }

?>