@extends('layout')

@section('konten')

<div class="container">
    <a href="{{ route('paket.form-tambah-paket') }}" class="btn btn-primary mt-5">
      Tambah Paket
    </a>
    <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>No Paket</th>
            <th>Nama Paket</th>
            <th>Harga Paket</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($paket as $no=>$data)
          <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->no_paket }}</td>
            <td>{{ $data->nama_paket }}</td>
            <td>{{ $data->harga_paket }}</td> 
            <td>
              <div>
                <button class="btn btn-danger" onclick="showDeleteModal({{ $data->id }})"`>Hapus</button>
                <a href="{{ route('paket.form-edit-paket', $data->id) }}" class="btn btn-success" >Edit</a>
              </div>
            </td> 
            
          </tr>
          @endforeach
    
        </tbody>
      </table>
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

<script>
  const showDeleteModal = (id) => {
    console.log("hasil : " , id)
    const form = document.getElementById("deleteForm")
    form.action = `/form-tambah-paket/hapus/${id}`
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
  }
</script>

@endsection