<!DOCTYPE html>
<html>

<head>
    <style>

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        img {
            margin-bottom: -50px;
        }
    </style>
</head>

<body>

    <!-- <img src="{{ asset('img/uniska.png') }}" alt="" width="100" height="100"> -->
    <img src="{{ public_path().'/img/uniska.png' }}" alt="" width="100" height="100">
    <h2 style="text-align: center;"><u>DATA MEMBER</u></h2>

    <table>
        <tr>
            <th>NO</th>
            <th>NPM</th>
            <th>NAMA LENGKAP</th>
            <th>TTL</th>
            <th>JENIS KELAMIN</th>
            <th>PRODI</th>
        </tr>
        <?php $no = 1; ?>
        @forelse($member as $m)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $m->npm }}</td>
            <td>{{ $m->user->name.' '. $m->user->last_name }}</td>
            <td>{{ $m->tempat_lahir.','. $m->tgl_lahir }}</td>
            <td>{{ $m->jk == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
            <td>{{ $m->prodi }}</td>
        </tr>
        @empty

        <tr>
            <td colspan="6" style="text-align: center;">TIDAK ADA DATA YANG DITAMPILKAN....</td>
        </tr>
        @endforelse

    </table>

</body>

</html>