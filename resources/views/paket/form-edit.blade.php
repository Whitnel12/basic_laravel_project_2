@extends('layout')

@section('konten')
<style>
  .container-form {
    width: 50%;
  }
</style>

<div class="container container-form mt-5">
  <h3>Form Edit Paket</h3>
  <form action="{{ route('paket.form-edit-paket.edit', $paket->id ) }}" method="POST">
    @csrf

    <label >No Paket</label>
    <input type="text" name="no_paket" value="{{ $paket->no_paket }}"  class="form-control mb-2">


    <label >Nama Paket</label>
    <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}"  class="form-control mb-2">
  

    <label >Harga Paket</label>
    <input type="number" name="harga_paket" value="{{ $paket->harga_paket }}"  class="form-control mb-2">


    <div class="d-flex justify-content-between  ">
      <a href="{{ route('paket.tampil') }}" class="btn btn-danger">Back</a>
      <button class="btn btn-primary">Edit</button>
    </div>
  </form>
  
</div>
@endsection
