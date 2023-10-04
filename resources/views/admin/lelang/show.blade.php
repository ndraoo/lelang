
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
                <div class="card-body col-sm-2">
                    Pelelangan
                </div>
            </div>
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="card-header text-center">
                        Pemenang Tertinggi
                    </div>
                    <div class="container">
                    @if ($pemenangTertinggi)
                        <table class="table table-bordered  text-center mt-2">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Harga Akhir Tertinggi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pemenangTertinggi->user->username }}</td>
                                <td>{{ currency_IDR($pemenangTertinggi->harga_akhir) }}</td>
                            </tr>
                        </tbody>
                            <!-- Tambahkan kolom-kolom lain yang sesuai dengan struktur tabel pemenang -->
                        </table>
                    @else
                        <p>Belum ada pemenang yang dipilih.</p>
                    @endif

                    <a href="{{ route('admin.lelang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                    {{-- <div class="d-flex justify-content-center"
                        {!! $admin->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@include('partials.footer')
