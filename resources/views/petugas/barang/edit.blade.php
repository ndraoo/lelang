
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
                   Edit Barang Pelelangan
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
                        <form action="{{ route('barang.update', $barang->id) }}" method="barang">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama_barang">Nama barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>

                                <!-- error message untuk nama_barang -->
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto barang</label>
                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" accept="image/*">

                                <!-- Error message untuk foto -->
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" value="{{ old('tanggal', $barang->tanggal) }}" required>

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
                                    name="harga_awal" value="{{ old('harga_awal', $barang->harga_awal) }}" required>

                                <!-- error message untuk harga_awal -->
                                @error('harga_awal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" value="{{ old('deskripsi', $barang->deskripsi) }}" required>

                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @include('partials.footer')
