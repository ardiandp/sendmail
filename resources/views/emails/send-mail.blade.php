@extends('adminlte::page', [ 'layout' => 'collapsed', 'sidebar_minimize' => true])


@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Kirim email</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('send-email') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Email Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">Recipient Email</label>
                <input type="email" name="to" id="to" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Email Text</label>
                <textarea name="text" id="text" rows="5" class="form-control" required></textarea>
                <script>
                    CKEDITOR.replace('text');
                </script>
            </div>
            <button type="submit" class="btn btn-primary">Send Email</button>
        </form>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop