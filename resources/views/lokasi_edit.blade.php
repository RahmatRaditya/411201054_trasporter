@extends('layouts.layout')

@section('content')
    <div class="row container-fluid mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Ubah Lokasi</h3>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('lokasi.update', $lokasi->id) }}" id="myForm">
                    @method('PUT')    
                    @csrf
                        <div class="form-group">
                                <label for="kode_lokasi">Kode Lokasi</label>
                                <input type="text" name="kode_lokasi" value="{{ $lokasi->kode_lokasi }}" class="form-control" id="kode_lokasi" placeholder="Kode Lokasi">
                                @error('kode_lokasi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                                <label for="nama_lokasi">Nama Lokasi</label>
                                <input type="text" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" class="form-control" id="nama_lokasi" placeholder="Nama Lokasi">
                                @error('nama_lokasi')
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






    
    