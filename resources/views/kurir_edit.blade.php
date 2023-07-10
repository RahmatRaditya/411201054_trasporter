@extends('layouts.layout')

@section('content')
    <div class="row container-fluid mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Ubah Kurir</h3>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('user.update', $user->id) }}" id="myForm">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Nama">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="password" placeholder="Password">
                                @error('password')
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






    
    