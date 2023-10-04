<!-- Tambahkan elemen meta dengan csrf-token dalam file blade Anda -->

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
                    <a href="{{ route('admin.lelang.create') }}" class="btn btn-md btn-primary float-right mb-3">Tambah Barang</a>
                         <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Tanggal Lelang</th>
                                        <th scope="col">Harga Awal</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lelang as $row)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        @foreach ($row->barang()->get() as $barangs )
                                        <td>{{ $barangs->nama_barang }}</td>
                                        <td><img src="{{ asset('storage/' . $barangs->foto) }}" alt="Foto Barang" width="100"></td>
                                        <td>{{ date('d-m-Y H:i', strtotime($row->tanggal_lelang)) }} </td>
                                        <td>{{ currency_IDR($barangs->harga_awal) }}</td>
                                        <td class="description-cell">>{{ $barangs->deskripsi }}</td>
                                        @endforeach
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitches" data-id="{{ $row->id_lelang }}">
                                                <label id="status_{{ $row->id_lelang }}" for="customSwitches">{{ $row->status }}</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('admin.lelang.destroy', $row->id_lelang) }}" method="POST">
                                                <a href="{{ route('admin.lelang.pilih-pemenang-form', $row->id_lelang) }}"
                                                    class="btn btn-sm btn-primary">Pemenang</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"data-confirm-delete="true">
                                                    <i class="fas fa-trash"></i> HAPUS
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="8">Data Barang tidak tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    <div class="d-flex justify-content-center">
                        {{-- {!! $barang->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

<script>
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

$(document).ready(function () {
    $('.custom-control-input').each(function () {
        var lelangId = $(this).data('id');
        var currentStatus = $('#status_' + lelangId).text();
        var initialState = (currentStatus === 'dibuka');

        var $switch = $(this); // Simpan referensi ke elemen switch

        $switch.bootstrapSwitch({
            state: initialState,
            onSwitchChange: function (event, state) {
                var lelangId = $switch.data('id'); // Gunakan referensi yang disimpan
                var currentStatus = $('#status_' + lelangId).text();
                var newStatus = (currentStatus === 'dibuka') ? 'ditutup' : 'dibuka';

                $switch.bootstrapSwitch('state', newStatus === 'dibuka', true);

                // Validasi apakah tanggal lelang telah melewati tanggal lelang
                if (newStatus === 'dibuka') {
                    $.ajax({
                        url: '/validate-lelang/' + lelangId,
                        type: 'GET',
                        success: function (response) {
                            if (response.valid) {
                                toggleLelang(lelangId, newStatus);
                            } else {
                                // SweetAlert untuk pesan kesalahan
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error'
                                });

                                // Kembalikan status switch ke nilai sebelumnya
                                $switch.bootstrapSwitch('state', !state, true);
                            }
                        },
                        error: function (xhr) {
                            // SweetAlert untuk pesan kesalahan
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat memvalidasi lelang.',
                                icon: 'error'
                            });

                            // Kembalikan status switch ke nilai sebelumnya
                            $switch.bootstrapSwitch('state', !state, true);
                        }
                    });
                } else {
                    toggleLelang(lelangId, newStatus);
                }
            }
        });

        // Cek apakah ada status tersimpan dalam penyimpanan lokal dan atur checkbox sesuai
        var storedStatus = localStorage.getItem('status_' + lelangId);
        if (storedStatus) {
            $switch.bootstrapSwitch('state', storedStatus === 'dibuka', true);
        }
    });
});

function toggleLelang(lelangId, newStatus) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/toggle-lelang/' + lelangId,
        type: 'POST',
        data: {
            status: newStatus
        },
        success: function (response) {
            $('#status_' + lelangId).text(newStatus);

            // Simpan status yang benar dalam cookie atau penyimpanan lokal
            localStorage.setItem('status_' + lelangId, newStatus);

            // SweetAlert untuk respons sukses
            Swal.fire({
                title: 'Sukses!',
                text: response.message,
                icon: 'success'
            });
        },
        error: function (xhr) {
            var errorMessage = xhr.responseJSON.message;

            // SweetAlert untuk respons kesalahan
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });

            // Kembalikan status switch ke nilai sebelumnya
            $switch.bootstrapSwitch('state', !state, true);
        }
    });
}

</script>

@include('partials.footer')
