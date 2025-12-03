@extends('layouts.main')

@section('title', 'PisCash (SPA)')

@section('content')
<div id="root"></div>

<script>
    // Passing kasir name into React
    window.posKasir = @json($kasir);
</script>

@vite('resources/js/pos-transaksi.jsx')

<style>
    body {
        background-color: #05061a;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
        padding-top: 100px;
    }

    #root {
        min-height: 100vh;
    }
</style>
@endsection
