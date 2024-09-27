@extends('layout')

@section('konten')
<style>
  .container-form {
    width: 50%;
    max-height: 80vh; /* Maksimal tinggi 80% dari viewport */
    overflow-y: auto; /* Jika konten melebihi tinggi, tambahkan scroll */
  }

  .paket-select {
    /* border: 1px solid red */
    display: block
  }

</style>

<div class="container container-form mt-5">
  <h3>Form tambah Pesanan</h3>  
  <form action="{{ route('pesanan.form-edit-pesanan.edit', $pesanan->id) }}" method="POST">
    @csrf

    <label>No Nota</label>
    <input type="text" name="no_nota"class="form-control mb-2" value="{{ $pesanan->no_nota }}">
    
    <label>Pelanggan</label>
    <input type="text" name="pelanggan"class="form-control mb-2" value="{{ $pesanan->pelanggan }}">
    
    <label>Paket</label>
    <div class="paket-select">
      <select name="paket" id="paket" required class="form-control">
  s
        <option value="">-- Pilih Paket --</option>
        @foreach ($paket as $data)
          <option value="{{ $data->id }}" data_harga="{{ $data->harga_paket }}" >{{ $data->nama_paket }}</option>
         
          @endforeach
      </select>
    </div>
    
    
    <label>Harga</label>
    <input type="number" name="harga" id="harga" class="form-control mb-2" readonly min="1" value="{{ $pesanan->harga }}">
      
    <label>Berat</label>
    <input type="number" name="berat" id="berat" class="form-control mb-2 " value="{{ $pesanan->berat }}">

    <label>Total Harga</label>
    <input type="number" name="total_harga" id="total_harga" class="form-control mb-2" readonly value="{{ $pesanan->total_harga }}">

    <div class="d-flex justify-content-between">
      <a href="{{ route('pesanan.tampil') }}" class="btn btn-danger">Back</a>
      <button class="btn btn-primary">Edit</button>
    </div>

  </form>
</div>

<script>

  const paketSelected = document.getElementById('paket');
  const hargaInput = document.getElementById('harga');
  const beratInput = document.getElementById('berat');
  const totalHargaInput = document.getElementById('total_harga');

  paketSelected.addEventListener('change', function(){
    const selectedOption = this.options[this.selectedIndex];
    const harga = selectedOption.getAttribute('data_harga');
    console.log("hasil : ",harga);
    hargaInput.value = harga ? harga : "";
    hitungTotalHarga();
  });

  beratInput.addEventListener('input', function(){
    hitungTotalHarga();
  });

  const hitungTotalHarga = () => {
    const harga = parseFloat(hargaInput.value);
    const berat = parseFloat(beratInput.value);

    const hasil = harga * berat;

    totalHargaInput.value = hasil
  }

</script>
@endsection

