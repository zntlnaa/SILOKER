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
            <div class="card-header">Daftar Lowongan Kerja</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif

                <form method="GET" action="{{ route('daftarLoker') }}" class="form-row">
                    <div class="col-md-2 form-group">
                        <select name="status" id="status" class="form-control" style="text-align: center;">
                            <option value="">Semua Status</option>
                            <option value="Aktif" {{ $statusFilter === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Proses Seleksi" {{ $statusFilter === 'Proses Seleksi' ? 'selected' : '' }}>Proses Seleksi</option>
                            <option value="Tutup" {{ $statusFilter === 'Tutup' ? 'selected' : '' }}>Tutup</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lowongan Kerja</th>
                            <th>Tipe</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            <tr class="loker-row" data-status="{{ $row->status }}">
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tipe }}</td>
                                <td>{{ $row->status }}</td>
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
