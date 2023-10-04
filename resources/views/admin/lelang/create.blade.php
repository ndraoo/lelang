@include('partials.header')

@include('partials.navbar')

@include('partials.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div class="card bg-dark text-center">
                <div class="card-body">
                    Barang Pelelangan
                </div>
            </div>
            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif



            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('admin.lelang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="id_barang">Barang</label>
                        <select class="form-control @error('id_barang') is-invalid @enderror" name="id_barang" required>
                            <option value="">Pilih Barang</option>
                            @foreach ($barang as $barang)
                                <option value="{{ $barang->id }}" {{ old('id_barang') == $barang->id ? 'selected' : '' }}>
                                    {{ $barang->nama_barang }}
                                </option>
                            @endforeach
                        </select>

                        <!-- error message untuk id_barang -->
                        @error('id_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lelang">Tanggal Lelang</label>
                            <input type="datetime-local" class="form-control @error('tanggal_lelang') is-invalid @enderror"
                            name="tanggal_lelang" value="{{ old('tanggal_lelang') ? old('tanggal_lelang') : date('Y-m-d') }}" required>
                            <!-- error message untuk tanggal -->
                            @error('tanggal_lelang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                        <a href="{{ route('admin.lelang.index') }}" class="btn btn-md btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
  <!-- /.content-wrapper -->
  @include('partials.footer')
