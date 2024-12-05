@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg py-4 space-y-4">
                <div class="flex flex-row justify-between px-4">
                    <div></div>
                    <a href="{{ route('pesanan.create') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#d3b643] hover:bg-[#b39b38] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#bca93e] transition ease-in-out duration-150">
                        {{ __('Add pesanan') }}
                    </a>
                </div>
                <div class="w-full overflow-x-scroll align-middle">
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Di Buat</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nama Customer</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Total Harga</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Status</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($pesanans as $pesanan)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ date('d M Y', strtotime($pesanan->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $pesanan->member->nama_customer }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $pesanan->total_harga_pesanan }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        <div class="flex space-x-2">
                                            {{-- Tombol Terbayar --}}
                                            <form action="{{ route('pesanan.updateterbayar', $pesanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status menjadi Terbayar?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.3em;">
                                                    <i class="fas fa-circle" style="font-size: 1em; color: {{ $pesanan->status_pesanan === 'Terbayar' ? '#4CAF50' : '#6B7280' }};"></i>
                                                    <span style="font-size: 0.9em; color: {{ $pesanan->status_pesanan === 'Terbayar' ? '#4CAF50' : '#000' }};">Terbayar</span>
                                                </button>
                                            </form>

                                            {{-- Tombol Selesai --}}
                                            <form action="{{ route('pesanan.updateselesai', $pesanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status menjadi Selesai?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.3em;">
                                                    <i class="fas fa-circle" style="font-size: 1em; color: {{ $pesanan->status_pesanan === 'Selesai' ? '#4CAF50' : '#6B7280' }};"></i>
                                                    <span style="font-size: 0.9em; color: {{ $pesanan->status_pesanan === 'Selesai' ? '#4CAF50' : '#000' }};">Selesai</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{-- Edit --}}
                                        <a href="{{ route('pesanan.edit', $pesanan) }}" title="Edit">
                                            <i class="fas fa-edit" style="font-size: 1.5em; color: gold;"></i>
                                        </a>
                                        {{-- Hapus --}}
                                        <form action="{{ route('pesanan.destroy', $pesanan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; cursor: pointer;">
                                                <i class="fas fa-trash" style="font-size: 1.2em; color: #6B7280;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
