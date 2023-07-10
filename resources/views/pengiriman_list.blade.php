@extends('layouts.layout')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Pengiriman</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 d-flex justify-content-end">
              <a href="{{ route('pengiriman.create') }}"><button class="btn btn-primary align"><i class="fas fa-plus"></i>&nbsp&nbspPengiriman Baru</button></a>
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
                              <th scope="col">No.Pengiriman</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Kode Barang</th>
                              <th scope="col">Barang</th>
                              <th scope="col">Lokasi</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Kurir</th>
                              <th scope="col">Approval</th>
                              <th scope="col">Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($pengiriman as $p)
                              <tr>
                                  <td>{{ $p->no_pengiriman }}</td>
                                  <td>{{ $p->tanggal }}</td>
                                  <td>{{ $p->kode_barang }}</td>
                                  <td>{{ $p->nama_barang }}</td>
                                  <td>{{ $p->nama_lokasi }}</td>
                                  <td>{{ $p->jumlah_barang }}</td>
                                  <td>{{ $p->harga_barang }}</td>
                                  <td>{{ $p->nama_pengirim }}</td>
                                  <td>
                                      @if ($p->status == 0)
                                          <form action="{{ route('pengiriman.approve', $p->id) }}" method="POST">
                                              @csrf
                                              @method('PATCH')
                                              <input type="hidden" name="status" value="1">
                                              <button type="submit" class="btn btn-outline-success"><i class="fas fa-check-circle"></i></button>
                                          </form>
                                      @endif
                                  </td>
                                  <td>
                                      <a href="{{ route('pengiriman.edit', $p->id) }}">
                                          <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                      </a>
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
