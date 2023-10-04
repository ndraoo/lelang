@include('layouts.header')
@include('layouts.navbar')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">Penawaran</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="container mt-4">
                            <h2 class="text-center mb-5">Detail Barang Lelang</h2>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <!-- Foto Barang -->
                                    <img src="{{ asset('storage/' . $barang->foto) }}" width="620" height="720" class="img-fluid product-thumbnail" alt="Foto Barang">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <!-- Informasi Detail Barang -->
                                    <p>Nama Barang: {{ $barang->nama_barang }}</p>
                                    <p>Tanggal Lelang Berakhir: {{ $tanggalLelang }}</p>
                                    <p>Harga Awal: {{ currency_IDR($barang->harga_awal) }}</p>
                                    @if ($hargaPenawaranUser !== null)
                                    <p>Harga Penawaran Anda: {{ currency_IDR($hargaPenawaranUser) }}</p>
                                    @endif
                                    @if ($hargaPenawaranTertinggiLainnya !== null && count($hargaPenawaranTertinggiLainnya) > 0)
                                        @foreach ($hargaPenawaranTertinggiLainnya as $id_user_lain => $hargaPenawaranTertinggiLain)
                                            @if ($hargaPenawaranTertinggiLain > 0)
                                            <p>Harga Penawaran Tertinggi (Username : {{ $id_user_lain }}): {{ currency_IDR($hargaPenawaranTertinggiLain) }}</p>
                                            @endif
                                        @endforeach
                                    @endif
                                    <form method="POST" action="{{ route('tambah-penawaran', ['id_lelang' => $id_lelang]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="harga_akhir">Jumlah Penawaran :</label>
                                            <input type="number" class="form-control" id="harga_akhir" name="harga_akhir" placeholder="Masukkan jumlah penawaran">
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">Tambah Penawaran</button>
                                        <a href="{{ route('masyarakat.lelang') }}" class="btn btn-danger mt-3">Kembali</a>
                                    </form>
                                </div>
                            </div>
                            <div class="tabel-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Harga Penawaran</th>
                                        <th scope="col">Tanggal Lelang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <th scope="row">{{ $item->user->username }}</th>
                                        <td>{{ currency_IDR($item->harga_akhir) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          </div>
    </div>
</div>

@include('layouts.footer')
