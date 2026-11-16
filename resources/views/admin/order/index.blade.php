@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Informasi Penjualan & Pesanan Masuk</h3>
        <div class="bg-success text-white px-3 py-2 rounded fw-bold">
            Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pembeli</th>
                            <th>Busana Dibeli</th>
                            <th>Jumlah</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $index => $ord)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ord->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <strong>{{ $ord->nama_pembeli }}</strong><br>
                                <small class="text-muted">{{ $ord->no_hp }} | {{ $ord->alamat }}</small>
                            </td>
                            <td>{{ $ord->product->nama_produk ?? 'Produk dihapus' }}</td>
                            <td>{{ $ord->jumlah }} pcs</td>
                            <td class="fw-bold text-primary">Rp {{ number_format($ord->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('order.status', $ord->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="Baru" {{ $ord->status == 'Baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="Diproses" {{ $ord->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Selesai" {{ $ord->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Dibatalkan" {{ $ord->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada transaksi pembelian dari pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
