@extends('layouts.layout')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Barang</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 d-flex justify-content-end">
              <a href="{{ route('barang.create') }}"><button class="btn btn-primary align"><i class="fas fa-plus"></i>&nbsp&nbspTambah Barang</button></a>
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
                              <th scope="col">Kode Barang</th>
                              <th scope="col">Nama Barang</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col">Stok Barang</th>
                              <th scope="col">Harga Barang</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Hapus</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($barang as $b)
                              <tr>
                                  <td>{{ $b->kode_barang }}</td>
                                  <td>{{ $b->nama_barang }}</td>
                                  <td>{{ $b->deskripsi }}</td>
                                  <td>{{ $b->stok_barang }}</td>
                                  <td>{{ $b->harga_barang }}</td>
                                  <td>
                                      <a href="{{ route('barang.edit', $b->id) }}">
                                          <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                      </a>
                                  </td>
                                    
                                  <td>
                                    <form action="{{ route('barang.destroy', $b->id)}}" method="post">
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
