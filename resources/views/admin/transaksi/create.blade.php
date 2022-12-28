@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.transaksi.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="id_daftar">Daftar Makanan Minuman</label>
                            <select class="form-control" id="id_daftar">
                                @foreach ($daftars as $daftar)
                                    <option value="{{ $daftar->id_daftar }}" data-nama="{{ $daftar->nama }}"
                                        data-harga="{{ $daftar->harga }}" data-id="{{ $daftar->id_daftar }}">
                                        {{ $daftar->nama }} (
                                        Rp.<?= number_format($daftar->harga) ?> )</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-primary d-block" type="button" onclick="tambahItem()">Tambah
                                Item</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="transaksiItem">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Jumlah</th>
                                    <th class="quantity">0</th>
                                    <th class="totalHarga">0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="total_harga" value="0">
                        <button class="btn btn-success">Simpan Transaksi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var totalHarga = 0;
        var quantity = 0;
        var listItem = [];

        function tambahItem() {
            updateTotalHarga(parseInt($('#id_daftar').find(':selected').data('harga')))
            var item = listItem.filter(el => el.id_daftar === $('#id_daftar').find(':selected').data('id'));
            if (item.length > 0) {
                item[0].quantity += 1
            } else {
                var item = {
                    id_daftar: $('#id_daftar').find(':selected').data('id'),
                    nama: $('#id_daftar').find(':selected').data('nama'),
                    harga: $('#id_daftar').find(':selected').data('harga'),
                    quantity: 1
                }
                listItem.push(item)
            }
            updateQuantity(1)
            updateTable()
        }

        function deleteItem(index) {
            var item = listItem[index]
            if (item.quantity > 1) {
                listItem[index].quantity -= 1;
                updateTotalHarga(-(item.harga))
                updateQuantity(-1)
            } else {
                listItem.splice(index, 1)
                updateTotalHarga(-(item.harga * item.quantity))
                updateQuantity(-(item.quantity))
            }
            updateTable()
        }

        function updateTable() {
            var html = ''
            listItem.map((el, index) => {
                var harga = formatRupiah(el.harga.toString())
                var quantity = formatRupiah(el.quantity.toString())
                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${el.nama}</td>
                    <td>${quantity}</td>
                    <td>${harga}</td>
                    <td>
                        <input type="hidden" name="id_daftar[]" value="${el.id_daftar}">
                        <input type="hidden" name="quantity[]" value="${el.quantity}">
                        <button type="button" onclick="deleteItem(${index})" class="btn btn-link"><i class="fas fa-fw fa-trash text-danger"></i></button>
                    </td>
                </tr>
                `
            })
            $('.total')
            $('.transaksiItem').html(html)
        }

        function updateTotalHarga(nom) {
            totalHarga = totalHarga + nom;
            $('[name=total_harga]').val(totalHarga)
            $('.totalHarga').html(formatRupiah(totalHarga.toString()))
        }

        function updateQuantity(nom) {
            quantity = quantity + nom;
            $('.quantity').html(formatRupiah(quantity.toString()))
        }

        function emptyTable() {
            $('.transaksiItem').html(`
                <tr>
                    <td colspan="4">Belum ada item, silahkan tambahkan</td>
                </tr>
            `)
        }

        $(document).ready(function() {
            emptyTable()
        })
    </script>
@endsection
