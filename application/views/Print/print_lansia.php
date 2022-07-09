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
            <th>Nama Lansia</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>BB</th>
            <th>TD</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
            <th>Terapi</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_lansia)) {
            $no = 1;
            foreach ($cetak_lansia as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nik . "</td>";
                echo "<td>" . $data->nama_lansia . "</td>";
                echo "<td>" . $data->tgl_lahir . "</td>";
                echo "<td>" . $data->usia . "</td>";
                echo "<td>" . $data->bb . "</td>";
                echo "<td>" . $data->td . "</td>";
                echo "<td>" . $data->keluhan . "</td>";
                echo "<td>" . $data->diagnosa . "</td>";
                echo "<td>" . $data->terapi . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>