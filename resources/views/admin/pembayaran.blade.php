@extends('admin.layouts.main')

@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Daftar pembayaran</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>ZIS</th>
            <th>Data Pengirim</th>
            <th>Data Tujuan</th>
            <th>Bukti Pembayaran</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>ZIS</th>
            <th>Data Pengirim</th>
            <th>Data Bank</th>
            <th>Bukti Pembayaran</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {

      isi();

    });

    function isi() {
      $('#dataTable').DataTable({
        serverside: true,
        responsive: true,
        ajax: {
          url: "{{ route('pembayaran') }}"
        },
        columns: [{
            data: null,
            // sortable: false,
            render: function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1
            }
          },
          {
            data: null,
            render: function(data, type, row, meta) {
              return `${row.zis}<br/>(${row.jenis_zis})`
            }
          },
          {
            data: null,
            render: function(data, type, row, meta) {
              return `
                        <b>Nama Bank</b> : ${row.nama_bank}<br/>
                        <b>Nama</b> : ${row.nama_pengirim}<br/>
                        <b>No. Hp</b> : ${row.no_pengirim}<br/>
                        <b>Email</b> : ${row.email_pengirim}<br/>
                        <b>Nominal</b> : Rp. ${row.nominal}
                    `
            },
          },
          {
            data: null,
            render: function(data, type, row, meta) {
              return `
                        <b>Nama Bank</b> : ${row.nama_rek_bank}<br/>
                        <b>No. Rek</b> : ${row.no_rek_bank}
                    `
            },
          },
          {
            data: 'bukti_pembayaran',
            render: function(data, type, row, meta) {
              return `<a href="/storage/pembayaran/${data}" target="_blank"><img src="/storage/pembayaran/${data}" width="100px"/></a>`;
            },
          },
        ]
      });
    }
  </script>
@endsection
