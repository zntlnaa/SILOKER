<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SILOKER</title>
        <link rel="shortcut icon"  href='https://i.ibb.co/ThwKjYm/siloke.png'>
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
    <img style="margin-left: 10px;" src="https://i.ibb.co/BVYKf6v/silokerr.png" width="90" height="45" alt="">
    
</a>
   <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
        </li>
        <li class="active">
          <a href="#">
            <i class="fa fa-fw fa-tasks"></i> Data Loker </a>
        </li>
      </ul>
    </div>
</nav>
           



  <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">Data Loker</h1>
                       <ol class="breadcrumb">
                             <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / <i class="fa fa-tasks"></i> Data Loker
            </li>
                            </li>
                        </ol> 
                    </div>
                </div>

            <!-- /.navbar-collapse -->
     

            <div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
                <a href="/dataLoker/add-loker" type="button" class="btn btn-light btn-sm mb-3"  style="font-size: 16px;">+ Tambah Data </a>

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
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->idloker }}</td>
                                <td>{{ $row->idperusahaan }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tipe }}</td>
                                <td>{{ $row->status }}</td>
                                <td>
                                <a href="{{ route('edit-loker', ['idloker' => $row->idloker]) }}"><i class="fa fa-edit"></i></a>&nbsp;
                                   <a href="{{ route('confirmdelete', ['idloker' => $row->idloker]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   <a href="#"><i class="fa fa-info-circle"></i></a>
</td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
            </div>
        </div>
    </div>
   
    </div>
    <footer class="text-white text-center text-lg-start bg-primary">
    <div class="text-center p-3" style="background-color: #5271ff;">
      © 2023 Siloker [Prjocet Mini PBP ]
      <p class="text-white"></p>
    </div>
 
  </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
