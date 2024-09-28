@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
  {{-- Menampilkan pesan error umum, jika ada --}}
  @if ($errors->has('email') || $errors->has('password'))
    <p>Terjadi kesalahan saat login, silakan cek form di bawah ini.</p>
  @else
    {{-- Menampilkan error dari withErrors --}}
    <p>{{ $errors->first() }}</p>
  @endif
</div>
@endif  