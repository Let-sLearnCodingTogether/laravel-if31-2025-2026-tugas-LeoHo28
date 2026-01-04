<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>

<h1>Daftar Kebiasaan</h1>

@if ($habits->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kebiasaan</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Frekuensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($habits as $habit)
                <tr>
                    <td>{{ $habit->id }}</td>
                    <td>{{ $habit->habit_name }}</td>
                    <td>{{ $habit->description }}</td>
                    <td>{{ $habit->start_date }}</td>
                    <td>{{ ucfirst($habit->frequency) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p><strong>Belum ada data kebiasaan.</strong></p>
@endif

</body>
</html>
