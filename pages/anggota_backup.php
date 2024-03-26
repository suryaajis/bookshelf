<div id="label-page"><h3>Tampil Data Anggota</h3></div>
<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=anggota-input" class="tombol">Tambah Anggota</a>
        <a href="#"><img src="print.png" height="50px" height="50px"></a>
    </p>
    <FORM CLASS="form-inline" METHOD="POST">
        <div align="right">
            <input type="text" name="pencarian">
            <input type="submit" name="search" value="search" class="tombol">
        </div>
    </FORM>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th id="label-opsi">Opsi</th>
        </tr>

        <?php
        // Establish database connection (you should define $db)

        $batas = 5;
        $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $posisi = ($hal - 1) * $batas;

        $sql = "SELECT * FROM tbanggota ORDER BY idanggota DESC LIMIT $posisi, $batas";
        $q_tampil_anggota = mysqli_query($db, $sql);

        $nomor = $posisi + 1;
        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
                <td><?php echo $r_tampil_anggota['alamat']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Cetak Kartu</a>
                    </div>
                    <div class="tombol-opsi-container">
                        <a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Edit</a>
                    </div>
                    <div class="tombol-opsi-container">
                        <a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="tombol">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>

        <tr>
            <td colspan="6" align="right">
                <!-- Pagination links should be added here -->
                Page 1 Next
            </td>
        </tr>

    </table>
</div>
