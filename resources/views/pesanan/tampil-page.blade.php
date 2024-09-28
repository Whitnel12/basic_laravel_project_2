@extends('layout')

@section('konten') 

<div class="container">
  <h1>halaman tampil pesanan</h1>

  
@include('info.pesan')
  
<div class="container container-custom">
  <a href="{{ route('pesanan.form-tambah-pesanan') }}" class="btn btn-primary mt-5">
    Tambah Pesanan
  </a>
  <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>No Nota</th>
          <th>Pelanggan</th>
          <th>Paket</th>
          <th>Berat</th>
          <th>Harga/kg</th>
          <th>Total Harga</th>
          <th>Tanggal Pesanan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($pesanan as $no=>$data)
        <tr>
          <td>{{ $no+1 }}</td>
          <td>{{ $data->no_nota }}</td>
          <td>{{ $data->pelanggan }}</td>
          <td>{{ $data->paket->nama_paket}}</td>
          <td>{{ $data->berat }}</td> 
          <td>{{ $data->harga }}</td> 
          <td>{{ $data->total_harga }}</td> 
          <td>{{ $data->created_at }}</td> 
          <td>
            <form action="{{ route('pesanan.update-status', $data->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="antrian" {{ $data->status == 'antrian' ? 'selected' : "" }}>antrian</option>
                <option value="proses" {{ $data->status == 'proses' ? 'selected' : "" }}>proses</option>
                <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : "" }}>selesai</option>
                <option value="diterima" {{ $data->status == 'diterima' ? 'selected' : "" }} >diterima</option>
              </select>
            </form>
          </td>
          <td>
            <div class="d-flex gap-2" >
              <button class="btn btn-danger" onclick="showDeleteModal({{ $data->id }})">Hapus</button>
              <a href="{{ route('pesanan.form-edit-pesanan', $data->id) }}" class="btn btn-success" >Edit</a>
            </div>
          </td> 
          
        </tr>
        @endforeach
  
      </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
          Yakin ingin mengahapus data ini ?  
      </div>
      <div class="modal-footer">
        <form id="deleteForm" method="POST">
          @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Hapus</button>    
        </form>
      </div>
    </div>
  </div>
</div>
{{-- 
@php
    dd('status : ', $status);
@endphp --}}

<script>
  const showDeleteModal = (id) => {
    console.log("hasil : " , id)
    const form = document.getElementById("deleteForm")
    form.action = `/pesanan/hapus/${id}`
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
  }
</script>
@endsection 