<!DOCTYPE html>
<html lang="en">

<head>
    <title>SILOKER</title>
    <link rel="icon" href="{{ asset('style/image/logo.png') }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/bootstrap.css')}}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{{asset('style/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('style/css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('style/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="display: flex; align-items: center;">
    <img style="margin-left: 10px;" src="{{asset('style/image/nav.png')}}" width="70" height="30" alt="">
    
</a>

            </div>

           
            <ul class="nav navbar-right top-nav">   
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> Petugas <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-fw fa-power-off"></i> Log Out </a>
                    </li>
                  </ul>
                </li>
              </ul>
            <!-- /.navbar-collapse -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}" ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active" >
                        <a class="nav-link custom-nav-link" href="{{ route('dataLoker') }}"><i class="fa fa-fw fa-columns"></i> Data Loker</a>
                        <ul class="sub-menu">
                    </ul>


                    </li>

                </ul>
            </div>
            
            
        </nav>




        
        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">Data Lowongan Kerja</h1>
                    
                    </div>
                </div>
        
                    <div>
                        <div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                            <!-- Search Form -->
                            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
                                <div class="row g-3 align-items-center mb-3">
                                    <div >
                                    <form method="get" action=dataLoker>
                                        <input type="search" name="search" placeholder="Cari Lowongan Kerja" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" size="10">
                                    </form>
                                    </div>
                                </div>
                                <br>
                            <a href="/dataLoker/add-loker" type="button" class="btn btn-primary btn-sm mb-3">+ Tambah Data</a>
       
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Loker</th>
                                        <th>ID Perusahaan</th>
                                        <th>Nama Loker</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        @if($row->status === 'Aktif')
                                            <tr data-href="{{ route('detail-loker', ['idloker' => $row->idloker]) }}">
                                                <td>{{ $index + $data->firstItem() }}</td>
                                                <td>{{ $row->idloker }}</td>
                                                <td>{{ $row->idperusahaan }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->tipe }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ route('edit-loker', ['idloker' => $row->idloker]) }}"><i class="fa fa-edit fa-2x"></i></a>&nbsp;
                                                    <a href="{{ route('confirmdelete', ['idloker' => $row->idloker]) }}"><i class="fa fa-trash fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Loker</th>
                                        <th>ID Perusahaan</th>
                                        <th>Nama Loker</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        @if($row->status === 'Proses Seleksi')
                                            <tr data-href="{{ route('detail-loker', ['idloker' => $row->idloker]) }}">
                                                <td>{{ $index + $data->firstItem() }}</td>
                                                <td>{{ $row->idloker }}</td>
                                                <td>{{ $row->idperusahaan }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->tipe }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ route('edit-loker', ['idloker' => $row->idloker]) }}"><i class="fa fa-edit fa-2x"></i></a>&nbsp;
                                                    <a href="{{ route('confirmdelete', ['idloker' => $row->idloker]) }}"><i class="fa fa-trash fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Loker</th>
                                        <th>ID Perusahaan</th>
                                        <th>Nama Loker</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        @if($row->status === 'Tutup')
                                            <tr data-href="{{ route('detail-loker', ['idloker' => $row->idloker]) }}">
                                                <td>{{ $index + $data->firstItem() }}</td>
                                                <td>{{ $row->idloker }}</td>
                                                <td>{{ $row->idperusahaan }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->tipe }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ route('edit-loker', ['idloker' => $row->idloker]) }}"><i class="fa fa-edit fa-2x"></i></a>&nbsp;
                                                    <a href="{{ route('confirmdelete', ['idloker' => $row->idloker]) }}"><i class="fa fa-trash fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            
                          
        </div>
        <!-- /#page-wrapper -->
    </div>
    <div>
        <footer class="text-white text-center text-lg-start bg-primary">
            <div class="text-center p-3" style="background-color: #001c40;">
              © 2023 Siloker [Prjocet Mini PBP ]
              <p class="text-white"></p>
            </div>
         
          </footer>
        
</div>




    

  
    </div>
    <!-- jQuery -->
    <script src="{{asset('style/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('style/js/bootstrap.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('style/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris-data.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('tr[data-href]').on("click", function() {
                window.location = $(this).data("href");
            }).hover(function() {
                $(this).css("cursor", "pointer");
            });
        });
    </script>
    
</body>

</html>
