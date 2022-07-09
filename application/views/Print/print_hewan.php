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
            <th>Nama Hewan</th>
            <th>Usia</th>
            <th>Nama Pemilik</th>
            <th>Vaksin</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_hewan)) {
            $no = 1;
            foreach ($cetak_hewan as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nama_binatang . "</td>";
                echo "<td>" . $data->usia_binatang . "</td>";
                echo "<td>" . $data->nama_pemilik . "</td>";
                echo "<td>" . $data->vaksin . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>