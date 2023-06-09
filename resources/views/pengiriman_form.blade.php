@extends('layouts.layout')

@section('content')
    <div class="row container-fluid mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Buat Pengiriman Baru</h3>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('pengiriman.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                                <label for="no_pengiriman">No.Pengiriman</label>
                                <input type="text" name="no_pengiriman" value="{{ old('no_pengiriman') }}" class="form-control" id="no_pengiriman" placeholder="Nomor Pengiriman">
                                @error('no_pengiriman')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control" id="tanggal" placeholder="Pilih Tanggal">
                                @error('tanggal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="barang_id">Barang</label>
                                <select class="form-control" id="barang_id" name="barang_id">
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                                </select>
                                @error('barang_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang</label>
                                <input type="number" name="jumlah_barang" value="{{ old('jumlah_barang') }}" class="form-control" id="jumlah_barang" placeholder="0">
                                @error('jumlah_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="kurir_id">Kurir</label>
                                <select class="form-control" id="kurir_id" name="kurir_id">
                                <option value="">-- Pilih Kurir --</option>
                                @foreach ($users as $u)
                                 <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                                </select>
                                @error('kurir_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="lokasi_id">Lokasi</label>
                                <select class="form-control" id="lokasi_id" name="lokasi_id">
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach ($lokasi as $l)
                                    <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                                @endforeach
                                </select>
                    
                                @error('lokasi_id')
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






    
    