@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background: url('/images/photo1.png') center center;">
                    <h3 class="card-title">Tournoi{{auth()->user()->tournaments()->name }}</h3>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</section>



@endsection