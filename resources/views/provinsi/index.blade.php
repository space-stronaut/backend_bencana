@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Provinsi Management
            </span>
            <span>
                <a href="{{ route('provinsi.create') }}" class="btn btn-primary">+</a>
            </span>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($provinsis as $item)
                        <tr>
                            <th>
                                {{$loop->iteration}}
                            </th>
                            <td>
                                {{$item->nama}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('provinsi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('provinsi.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2" onclick="return confirm('Yakin Ingin Menghapusnya?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection