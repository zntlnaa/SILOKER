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
            <div class="card-header">Seleksi Administrasi Pencaker yang Mengapply Loker {{ $namaLoker }}  </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
                @foreach ($data as $loker)
                <!-- Di sini Anda bisa mengakses $loker->idloker -->
                <a href="{{ route('pencaker-apply') }}" type="button" class="btn btn-primary btn-sm mb-3">Dashboard</a>
                <a href="{{ route('pencaker-apply') }}" type="button" class="btn btn-primary btn-sm mb-3">Seleksi Administrasi</a>
            @endforeach
            {{ $data->links() }}

            
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Apply</th>
                            <th>Nama Pencaker</th>
                            <th>Tahapan</th>
                            <th>Action</th>
                            <th>Seleksi</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            @if ($row->tahapan == 'Seleksi Administrasi')
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->id_apply }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->tahapan }}</td>
                                    <td>
                                        <a href="{{ route('detail-pencaker', ['idapply' => $row->id_apply]) }}" class="btn btn-primary">Detail</a>
                                    </td>
                                    <td>
                                        
                                        <a href="javascript:void(0);" onclick="updateNilai({{ $index }}, 1)" class="btn btn-success btn-sm">Lulus</a>&nbsp;
                                        <a href="javascript:void(0);" onclick="updateNilai({{ $index }}, 0)" class="btn btn-danger btn-sm">Tidak Lulus</a>
                                        

                                    </td>

                                
                                    <td id="nilai{{ $index }}">{{ $row->nilai }}</td>
                                </tr>
                            @endif
                        @endforeach
   
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateNilai(index, value) {
            $('#nilai' + index).text(value);

            // Kirim permintaan POST ke server
            $.post('/update-nilai', {
                index: index,
                value: value
            });
        }
    </script>
</body>
</html>