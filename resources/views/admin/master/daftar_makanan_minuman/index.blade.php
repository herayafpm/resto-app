@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('admin.master.daftar_makanan_minuman.create')}}" class="btn btn-success mb-2 btn-sm">Tambah Daftar Makanan Minuman</a>
                <table class="table table-bordered table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no_daftar = 1;?>
                        @foreach($daftars as $daftar)
                            <tr>
                                <td class="text-center">{{$no_daftar}}</td>
                                <td>{{$daftar->nama}}</td>
                                <td>{{$daftar->harga}}</td>
                                <td>
                                    <a href="{{route('admin.master.daftar_makanan_minuman.edit',$daftar->id_daftar)}}">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form action="{{route('admin.master.daftar_makanan_minuman.destroy',$daftar->id_daftar)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-link">
                                            <i class="fas fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no_daftar++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection