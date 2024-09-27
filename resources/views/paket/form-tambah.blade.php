@extends('layout')

@section('konten')

<style>
  .container-form {
    width: 50%;
  }
</style>

<div class="container container-form mt-5">
  <h3>Form tambah Paket</h3>  
  <form action="{{ route('paket.form-tambah-paket.tambah' ) }}" method="POST">
    @csrf

    <label >No Paket</label>
    <input type="text" name="no_paket"class="form-control mb-2">
    @error('no_paket')
      <p class="text-danger">{{ $message }}</p>
    @enderror

    <label >Nama Paket</label>
    <input type="text" name="nama_paket"  class="form-control mb-2">
    @error('nama_paket')
    <p class="text-danger">{{ $message }}</p>
    @enderror

    <label >Harga Paket</label>
    <input type="number" name="harga_paket"  class="form-control mb-2">
    @error('harga_paket')
    <p class="text-danger">{{ $message }}</p>
    @enderror

    <div class="d-flex justify-content-between  ">
      <a href="{{ route('paket.tampil') }}" class="btn btn-danger">Back</a>
      <button class="btn btn-primary">Tambah</button>
    </div>
  </form>

</div>
@endsection