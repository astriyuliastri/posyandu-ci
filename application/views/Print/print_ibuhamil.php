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
            <th>NIK</th>
            <th>Nama Ibu Hamil</th>
            <th>Usia</th>
            <th>Nama Suami</th>
            <th>Layanan</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_ibuhamil)) {
            $no = 1;
            foreach ($cetak_ibuhamil as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nama_ibuhamil . "</td>";
                echo "<td>" . $data->nik . "</td>";
                echo "<td>" . $data->nama_suami . "</td>";
                echo "<td>" . $data->usia_kandungan . "</td>";
                echo "<td>" . $data->layanan . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>