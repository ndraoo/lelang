
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
                   Petugas Pelelangan
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
                    <a href="{{ route('admin.petugas.register') }}" class="btn btn-md btn-secondary mb-3 float-right">Tambah Petugas</a>

                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Nama lengkap</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admin as $row)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->password  }}</td>
                                <td>{{ $row->level }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('admin.petugas.destroy', $row->id) }}" method="POST">
                                        <a href="{{ route('admin.petugas.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data Barang tidak tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $admin->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@include('partials.footer')
