@include('layouts.header')

@include('layouts.navbar')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Pemenang Pelelangan</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
    @forelse ($lelang as $row)

    @foreach ($row->barang()->get() as $barangs)
        @if ($row->status === 'ditutup')
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('masyarakat.pemenang-tertinggi', ['id_lelang' => $row->id_lelang]) }}">
                        <img src="{{ asset('storage/' . $barangs->foto) }}" width="280" height="300" class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{ $barangs->nama_barang }}</h3>
                        <h3 class="product-title">{{ date('d-m-Y H:i', strtotime($row->tanggal_lelang)) }} </h3>
                        <strong class="product-price">Username Pemenang : {{ $row->user->username }}</strong>
                        <strong class="product-price">Tertinggi : {{ currency_IDR($row->harga_akhir) }}</strong>
                        <span class="icon-cross">
                            <img src="{{ asset('furni-1.0.0') }}/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endif
        @endforeach
    @empty
        <p>Tidak ada lelang yang sudah ditutup.</p>

    @endforelse
</div>
</div>
</div>
@include('layouts.footer')
