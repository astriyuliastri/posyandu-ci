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
            <th>Nama Istri</th>
            <th>Usia Istri</th>
            <th>Nama Suami</th>
            <th>Tahapan KS</th>
            <th>Klmp Dasawisma</th>
            <th>Jumlah Anak</th>
            <th>Pengukuran Lila <23.5cm </th>
            <th>Pemberian</th>
            <th>Kontrasepsi Yang Dipakai</th>
            <th>Tgl Pergantian</th>
            <th>Jenis Kontrasepsi</th>
            <th>Ket</th>
        </tr>
        <?php
        if (!empty($cetak_kb)) {
            $no = 1;
            foreach ($cetak_kb as $data) {
                $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));
                echo "<tr>";
                echo "<td>" . $tgl_skrng . "</td>";
                echo "<td>" . $data->nama_istri . "</td>";
                echo "<td>" . $data->usia_istri . "</td>";
                echo "<td>" . $data->nama_suami . "</td>";
                echo "<td>" . $data->tahapanks . "</td>";
                echo "<td>" . $data->klmp . "</td>";
                echo "<td>" . $data->jml_anak . "</td>";
                echo "<td>" . $data->pengukuran . "</td>";
                echo "<td>" . $data->layanan . "</td>";
                echo "<td>" . $data->kontrasepsi_dipakai . "</td>";
                echo "<td>" . $data->tgl_diganti . "</td>";
                echo "<td>" . $data->jenis_kontrasepsi . "</td>";
                echo "<td>" . $data->ket . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>