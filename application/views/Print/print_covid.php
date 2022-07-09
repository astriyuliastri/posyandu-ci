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
            <th>Nama Penerima Vaksin</th>
            <th>Usia</th>
            <th>Vaksin Ke</th>
            <th>Nama Vaksin</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_covid)) {
            $no = 1;
            foreach ($cetak_covid as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nama_covid . "</td>";
                echo "<td>" . $data->usia . "</td>";
                echo "<td>" . $data->vaksin_ke . "</td>";
                echo "<td>" . $data->nama_vaksin . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>