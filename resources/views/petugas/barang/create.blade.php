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
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_barang">Nama barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang" required>

                            <!-- error message untuk nama_barang -->
                            @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                name="tanggal" value="{{ old('tanggal') }}" required>

                            <!-- error message untuk tanggal -->
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_awal">Harga awal</label>
                            <input type="text" class="form-control @error('harga_awal') is-invalid @enderror"
                                name="harga_awal" value="{{ old('harga_awal') }}" placeholder="Harga Awal" required>

                            <!-- error message untuk harga_awals -->
                            @error('harga_awal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Deskripsi" required>

                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-md btn-secondary">Kembali</a>

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
