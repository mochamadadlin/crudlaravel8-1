@extends('layout.admin')
@push('css')
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">   
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Delivery Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right"> -->
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Dashboard v2</li> -->
            <!-- </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container m-5 ">
        <!-- <a href="/tambahpegawai" class="btn btn-success">Tambah +</a> -->
        {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2">

            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-info">Export PDF</a>
            </div>
            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-success">Export Excel</a>
            </div>

            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div>

            <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <input type="search" placeholder="Search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline">
                </form>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="row m-5">
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered" id="myTable">
            <thead class="table-light">
                    <tr>
                        <th >No</th>
                        <th>Bulan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Kota/Kab</th>
                        <th>No HP</th>
                        <th>Wiraniaga</th>
                        <th>SPV</th>
                        <th>No Rangka</th>
                        <th>Tipe</th>
                        <th>Tanggal DO</th>
                        <th>Cabang Penjualan</th>
                        <th>Usia Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th>{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->bulan }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <td>{{ $row->namacustomer }}</td>
                        <!-- <td> -->
                            <!-- <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;"> -->
                        <!-- </td> -->
                        <!-- <td>{{ $row->jeniskelamin }}</td> -->
                        <!-- <td>0{{ $row->notelpon }}</td> -->
                        <!-- <td>{{ $row->tanggal_lahir }}</td> -->
                        <!-- <td>{{ $row->created_at->format('D M Y') }}</td> -->
                        
                         <td> 
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                data-nama="{{ $row->nama }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    </div>
</div>

 
@endsection

@push('scripts')
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
<script>
    $('.delete').click(function () {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus data pegawai dengan nama " + nama + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/" + pegawaiid + ""
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>

<script>
    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

</script>
@endpush