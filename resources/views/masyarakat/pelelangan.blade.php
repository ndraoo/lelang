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

          <!-- Start Column 1 -->
    @forelse ($lelang as $row)
    @php
    $barangDibuka = false;
    @endphp
    @foreach ($row->barang()->get() as $barangs)
        @if ($row->status === 'dibuka')
            @php
            $barangDibuka = true;
            @endphp
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="{{ route('tambah-penawaran.create', ['id_lelang' => $row->id_lelang]) }}">

                    <img src="{{ asset('storage/' . $barangs->foto) }}" width="280" height="300" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $barangs->nama_barang }}</h3>
                    <h3 class="product-title">{{ date('d-m-Y H:i', strtotime($row->tanggal_lelang)) }} </h3>
                    <strong class="product-price">{{ currency_IDR($barangs->harga_awal) }}</strong>
                    <span class="icon-cross">
                        <img src="{{ asset('furni-1.0.0') }}/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
        @endif
    @endforeach
    @if (!$barangDibuka)
        {{-- <h2 class="text-center">Barang pelelangan tidak tersedia</h2> --}}
    @endif
    @empty
        <h2 class="text-center">Barang pelelangan tidak tersedia</h2>
    @endforelse

          <!-- End Column 1 -->

      </div>
</div>
</div>
@include('layouts.footer')
