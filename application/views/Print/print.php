<html>

<head>
    <title>Cetak PDF</title>

</head>

<body>

    <h2>
        <center><?php echo $title; ?></center>
    </h2>
    <table border="1" width="100%" style="text-align:center;">
        <tr>
            <th>Tanggal</th>
            <th>NIK Anak</th>
            <th>Nama Anak</th>
            <th>Tanggal Lahir</th>
            <th>BB Lahir</th>
            <th>KLMP Dasawisma</th>
            <th>BB</th>
            <th>Layanan Diberikan</th>
            <th>Imunisasi</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_imunisasi)) {
            $no = 1;
            foreach ($cetak_imunisasi as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nik . "</td>";
                echo "<td>" . $data->nama_anak . "</td>";
                echo "<td>" . $data->tgl_lahir . "</td>";
                echo "<td>" . $data->bb_lahir . "</td>";
                echo "<td>" . $data->klmp  . "</td>";
                echo "<td>" . $data->bb . "</td>";
                echo "<td>" . $data->layanandiberikan . "</td>";
                echo "<td>" . $data->imunisasi . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>