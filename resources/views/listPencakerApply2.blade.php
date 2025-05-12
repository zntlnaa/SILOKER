<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Daftar Pencaker yang Mengapply Loker {{ $namaLoker }}  </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Apply</th>
                            <th>Nama Pencaker</th>
                            <th>Tahapan</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->id_apply }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tahapan }}</td>
                                <td>{{ $row->nilai }}</td>
                                <td>
                                    @if ($row->nilai == '-')
                                        -
                                    @elseif ($row->nilai == 1)
                                        Lulus
                                    @elseif ($row->nilai == 0)
                                        Tidak Lulus
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('detail-pencaker', ['idapply' => $row->id_apply]) }}" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
