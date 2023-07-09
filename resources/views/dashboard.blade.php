@extends('layouts.layout')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 d-flex justify-content-end">
                <button class="btn btn-primary"> 
                    wkwkwk
                </button>
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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
