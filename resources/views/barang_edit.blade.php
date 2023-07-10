@extends('layouts.layout')

@section('content')
    <div class="row container-fluid mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Ubah Barang</h3>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('barang.update', $barang->id) }}" id="myForm">
                    @method('PUT')      
                    @csrf
                        <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control" id="kode_barang" placeholder="Kode Barang">
                                @error('kode_lokasi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" id="nama_barang" placeholder="Nama Barang">
                                @error('nama_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ $barang->deskripsi }}" class="form-control" id="deskripsi" placeholder="Deskripsi">
                                @error('deskripsi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="stok_barang">Stok Barang</label>
                                <input type="number" name="stok_barang" value="{{ $barang->stok_barang }}" class="form-control" id="stok_barang" placeholder="Stok Barang">
                                @error('stok_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="harga_barang">Harga Barang</label>
                                <input type="number" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control" id="harga_barang" placeholder="Harga Barang">
                                @error('harga_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection






    
    