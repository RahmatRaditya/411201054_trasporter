@extends('layouts.layout')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Lokasi</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 d-flex justify-content-end">
              <a href="{{ route('lokasi.create') }}"><button class="btn btn-primary align"><i class="fas fa-plus"></i>&nbsp&nbspTambah Lokasi</button></a>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
    <!-- /.content-header -->

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="justify-content-center align-items-center">
                      <table class="table">
                          <thead class="thead-light">
                              <tr>
                              <th scope="col">Kode Lokasi</th>
                              <th scope="col">Nama Lokasi</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Hapus</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($lokasi as $l)
                              <tr>
                                  <td>{{ $l->kode_lokasi }}</td>
                                  <td>{{ $l->nama_lokasi }}</td>
                                  <td>
                                      <a href="{{ route('lokasi.edit', $l->id) }}">
                                          <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                      </a>
                                  </td>
                                    
                                  <td>
                                    <form action="{{ route('lokasi.destroy', $l->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
