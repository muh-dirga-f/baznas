@extends('admin.layouts.main')

@section('content')
  <!-- DataTales Example -->
  <div class="row">
    <div class="col col-sm-12 col-md-12 col-xl-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-warning">
          <h6 class="m-0 font-weight-bold text-white">Daftar Pembayaran Pending</h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col col-sm-12 col-md-12 col-xl-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
          <h6 class="m-0 font-weight-bold text-white">Daftar Pembayaran Terkonfirmasi</h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col col-sm-12 col-md-12 col-xl-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
          <h6 class="m-0 font-weight-bold text-white">Daftar Pembayaran Reject</h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>ZIS</th>
                <th>Data Pengirim</th>
                <th>Data Tujuan</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <form id="formSubmit">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input name="data_id" type="hidden" id="data_id" placeholder="data_id">
            <input name="user_id" type="hidden" id="author" placeholder="Author" value="1">
            <div class="form-group">
              <label for="title">Title</label>
              <input name="title" type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category_id" class="form-control" id="category">
                <option value="1">Zakat Fitra</option>
                <option value="2">Infak</option>
                <option value="3">Sedekah</option>
                <option value="4">Fidyah</option>
              </select>
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" class="form-control" id="body" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="saveData" class="btn btn-primary btn-modal">Save</button>
            <button type="button" id="editData" class="btn btn-warning btn-modal">Edit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('script')
  <script>
    $(document).ready(function() {

      let columns = [{
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
        {
          data: null,
          render: function(data, type, row, meta) {
            let konfirmasiStatus = (row.konfirmasi) ? row.konfirmasi.status : "pending";
            // console.log(konfirmasiStatus);
            let status;
            switch (konfirmasiStatus) {
              case "pending":
                status = "warning";
                break;
              case "confirm":
                status = "success";
                break;
              case "reject":
                status = "danger";
                break;
              default:
                status = "warning";
            }
            return `<span class="badge badge-${status}">${konfirmasiStatus}</span>`;
          },
        },
        {
          data: 'id',
          render: function(data, type, row, meta) {
            let button = `
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a data-id="${data}" data-row='${JSON.stringify(row)}' class="confirm dropdown-item bg-success text-white" href="#"><i class="fas fa-fw fa-check"></i> Confirm</a>
                                    <a data-id="${data}" data-row='${JSON.stringify(row)}' class="reject dropdown-item bg-danger text-white" href="#"><i class="fas fa-fw fa-times"></i> Reject</a>
                                </div>
                            </div>
                            `;
            return button;
          },
          width: '100px'
        }
      ];
      function sweetAlertDetailPengirim(row) {
        return `<table width="100%" class="text-left">
                    <tr>
                        <td colspan="3" class="text-center"><h3>Data Pengirim</h3></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center"><hr/></td>
                    </tr>
                    <tr>
                        <td><b>Nama Bank</b></td>
                        <td> : </td>
                        <td>${row.nama_bank}</td>
                    </tr>
                    <tr>
                        <td><b>Nama Pengirim</b></td>
                        <td width="20px"> : </td>
                        <td>${row.nama_pengirim}</td>
                    </tr>
                    <tr>
                        <td><b>Nominal</b></td>
                        <td> : </td>
                        <td>Rp. ${row.nominal}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center"><h3>Data Tujuan</h3></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center"><hr/></td>
                    </tr>
                    <tr>
                        <td><b>Nama Bank</b></td>
                        <td> : </td>
                        <td>${row.nama_rek_bank}</td>
                    </tr>
                    <tr>
                        <td><b>No. Rek</b></td>
                        <td> : </td>
                        <td>${row.no_rek_bank}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center"><hr/></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Bukti Pembayaran</b></td>
                    </tr>
                </table>
                 <a href="/storage/pembayaran/${row.bukti_pembayaran}" target="_blank"><img src="/storage/pembayaran/${row.bukti_pembayaran}" width="100px"/></a>`;
      }

      isi('1', '{{ route('konfirmasi') }}', columns);
      columns.pop(); //remove column Action
      isi('2', '{{ route('konfirmasi-statusConfirm') }}', columns);
      isi('3', '{{ route('konfirmasi-statusReject') }}', columns);


      /*
       *Form Action
       */
      $('#dataTable1 tbody').on('click', '.confirm', function() {
        let formData = new FormData();
        let id = $(this).data('id');
        let row = $(this).data('row');
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('pembayaran_id', id);
        formData.append('status', 'confirm');
        // console.log(...formData);
        Swal.fire({
          title: 'Apa anda yakin mengkonfirmasi?',
          html: sweetAlertDetailPengirim(row),
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          confirmButtonText: 'Confirm!'
        }).then((result) => {
          if (result.isConfirmed) {
            console.log(row);
            $.ajax({
              type: "POST",
              processData: false,
              contentType: false,
              url: "{{ route('konfirmasi.store') }}",
              data: formData,
              success: function(res, textStatus, xhr) {
                console.log(res, textStatus, xhr);
                Swal.fire(textStatus, res.text, textStatus).then(() => {
                  window.location.reload();
                });
              }
            });
          }
        })
      });

      $('#dataTable1 tbody').on('click', '.reject', function() {
        let formData = new FormData();
        let id = $(this).data('id');
        let row = $(this).data('row');
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('pembayaran_id', id);
        formData.append('status', 'reject');
        // console.log(...formData);
        Swal.fire({
          title: 'Apa anda yakin menolak?',
          html: sweetAlertDetailPengirim(row),
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#e74a3b',
          confirmButtonText: 'Reject!'
        }).then((result) => {
          if (result.isConfirmed) {
            console.log(row);
            $.ajax({
              type: "POST",
              processData: false,
              contentType: false,
              url: "{{ route('konfirmasi.store') }}",
              data: formData,
              success: function(res, textStatus, xhr) {
                console.log(res, textStatus, xhr);
                Swal.fire(textStatus, res.text, textStatus).then(() => {
                  window.location.reload();
                });
              }
            });
          }
        })
      });


    });

    function isi(id, route, columns) {
      $('#dataTable' + id).DataTable({
        serverside: true,
        responsive: true,
        pageLength: 5,
        ajax: {
          url: route
        },
        // order: [[5, 'desc']],
        columns
      });
    }
  </script>
@endsection
