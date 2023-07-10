@extends('layouts.layout')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Kurir</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 d-flex justify-content-end">
              <a href="{{ route('user.create') }}"><button class="btn btn-primary align"><i class="fas fa-plus"></i>&nbsp&nbspTambah Barang</button></a>
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
                              <th scope="col">Nama</th>
                              <th scope="col">Email</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Hapus</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($user as $u)
                              <tr>
                                  <td>{{ $u->name }}</td>
                                  <td>{{ $u->email }}</td>
                                  <td>
                                      <a href="{{ route('user.edit', $u->id) }}">
                                          <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                      </a>
                                  </td>
                                    
                                  <td>
                                    <form action="{{ route('user.destroy', $u->id)}}" method="post">
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
