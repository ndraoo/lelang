
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
                    <a href="{{ route('admin.barang.create') }}" class="btn btn-md btn-primary mb-3 float-right">Tambah Barang</a>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                              <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Foto Barang</th>
                                <th>Tanggal</th>
                                <th>Harga awal</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($barang as $row)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $row->nama_barang }}</td>
                                    <td><img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Barang" width="100"></td>
                                    <td> {{ date('d-m-Y', strtotime($row->tanggal)) }} </td>
                                    <td>{{ currency_IDR($row->harga_awal) }}</td>
                                    <td class="description-cell">{{ $row->deskripsi }}</td>
                                    <td>
                                    <form action="{{ route('admin.barang.destroy', $row->id) }}" method="POST">
                                        <a href="{{ route('admin.barang.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> EDIT
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" data-confirm-delete="true">
                                            <i class="fas fa-trash"></i> HAPUS
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Barang tidak tersedia</td>
                                </tr>
                                @endforelse
                              {{-- <td><span class="label label-success">Approved</span></td> --}}
                            </tr>
                          </table>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $barang->links() !!}
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
