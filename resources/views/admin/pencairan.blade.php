@extends('admin.layouts.main')

@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Daftar pencairan</h6>
      <a id="tambahData" class="m-0 font-weight-bold text-white btn btn-sm btn-primary" data-toggle="modal"
        data-target="#exampleModal">Tambah Data <i class="fas fa-fw fa-plus"></i></a>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Jumlah Dana</th>
            <th>Data Bank</th>
            <th>Rencana Penggunaan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Jumlah Dana</th>
            <th>Data Bank</th>
            <th>Rencana Penggunaan</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
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
            <div class="form-group">
              <input name="data_id" type="hidden" id="data_id" placeholder="data_id">
              <label for="jumlah_dana">Jumlah Dana</label>
              <input name="jumlah_dana" type="number" class="form-control" id="jumlah_dana" placeholder="Jumlah Dana">
            </div>
            <div class="form-group">
              <label for="nama_bank">Pilih Bank</label>
              <select name="nama_bank" class="form-control" id="nama_bank">
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="MANDIRI">MANDIRI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no_rek_bank">No. Rekening</label>
              <input name="no_rek_bank" type="number" class="form-control" id="no_rek_bank" placeholder="No. Rekening">
            </div>
            <div class="form-group">
              <label for="nama_rek_bank">Nama Rekening</label>
              <input name="nama_rek_bank" type="text" class="form-control" id="nama_rek_bank"
                placeholder="Nama Rekening">
            </div>
            <div class="form-group">
              <label for="rencana_penggunaan">rencana_penggunaan</label>
              <textarea name="rencana_penggunaan" class="form-control" id="rencana_penggunaan" rows="3"></textarea>
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
    // let editor;


    $(document).ready(function() {


    //   ClassicEditor
    //     .create(document.querySelector('#rencana_penggunaan'))
    //     .then(newEditor => {
    //       editor = newEditor;
    //     })
    //     .catch(error => {
    //       console.error(error);
    //     });


      /*
       * Reset Form
       */
      $('#exampleModal').on('show.bs.modal', function() {
        document.getElementById("formSubmit").reset();
        // editor.setData('');
      });


      isi();


      /*
       *CRUD Button
       */
      $('#tambahData').on('click', function() {
        $('#exampleModalLabel').text('Tambah Data');
        $('.btn-modal').addClass('d-none');
        $('#saveData').removeClass('d-none');
      });

      $('#dataTable tbody').on('click', '.edit-data', function() {
        let id = $(this).data('id');
        $('#exampleModalLabel').text('Edit Data');
        $('.btn-modal').addClass('d-none');
        $('#editData').removeClass('d-none');
        $.ajax({
          url: "{{ route('pencairan.edit') }}",
          type: 'post',
          data: {
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(res, textStatus, xhr) {
            console.log(res, textStatus, xhr);
            $('#data_id').val(id);
            $('#jumlah_dana').val(res.data.jumlah_dana);
            $('#nama_bank').val(res.data.nama_bank).change();
            $('#no_rek_bank').val(res.data.no_rek_bank);
            $('#nama_rek_bank').val(res.data.nama_rek_bank);
            $('#rencana_penggunaan').val(res.data.rencana_penggunaan);
            // editor.setData(res.data.rencana_penggunaan);
          }
        });
      });

      $('#dataTable tbody').on('click', '.delete-data', function() {
        let id = $(this).data('id');
        $.ajax({
          type: "POST",
          url: "{{ route('pencairan.delete') }}",
          data: {
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(res, textStatus, xhr) {
            console.log(res, textStatus, xhr);
            Swal.fire(textStatus, res.text, textStatus).then(() => {
              window.location.reload();
            });
          }
        });
      });


      /*
       *Form Action
       */
      $('#saveData').on('click', function() {
        let form = $('#formSubmit')[0];
        let formData = new FormData(form);
        // formData.append('slug', convertToSlug(formData.get('title')));
        // formData.set('rencana_penggunaan', editor.getData());
        // formData.append('excerpt', convertToExcerpt(editor.getData().replace(/<\/?[^>]+(>|$)/g, "")));
        console.log(...formData);
        $.ajax({
          type: "POST",
          processData: false,
          contentType: false,
          url: "{{ route('pencairan.store') }}",
          data: formData,
          success: function(res, textStatus, xhr) {
            console.log(res, textStatus, xhr);
            Swal.fire(textStatus, res.text, textStatus).then(() => {
              window.location.reload();
            });
          }
        });
      });

      $('#editData').on('click', function() {
        let form = $('#formSubmit')[0];
        let formData = new FormData(form);
        // formData.append('slug', convertToSlug(formData.get('title')));
        // formData.set('rencana_penggunaan', editor.getData());
        // formData.append('excerpt', convertToExcerpt(editor.getData()));
        // console.log(...formData);
        $.ajax({
          type: "POST",
          processData: false,
          contentType: false,
          url: "{{ route('pencairan.update') }}",
          data: formData,
          success: function(res, textStatus, xhr) {
            console.log(res, textStatus, xhr);
            Swal.fire(textStatus, res.text, textStatus).then(() => {
              window.location.reload();
            });
          }
        });
      });


    });

    function isi() {
      $('#dataTable').DataTable({
        serverside: true,
        responsive: true,
        ajax: {
          url: "{{ route('pencairan') }}"
        },
        columns: [{
            data: null,
            // sortable: false,
            render: function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1
            }
          },
          {
            data: 'jumlah_dana',
            name: 'jumlah_dana'
          },
          {
            data: null,
            render: function(data, type, row, meta) {
              return `
                <b>Nama Bank</b> : ${row.nama_bank}<br/>
                <b>No. Rek Tujuan</b> : ${row.no_rek_bank}<br/>
                <b>Nama Rekening Tujuan</b> : ${row.nama_rek_bank}<br/>
              `;
            }
          },
          {
            data: 'rencana_penggunaan',
            name: 'rencana_penggunaan'
          },
          {
            data: 'id',
            render: function(data) {
              let button = `
                            <button class='edit-data badge badge-warning' data-id='${data}' data-toggle='modal' data-target = '#exampleModal'> Edit </button>
                            <button class='delete-data badge badge-danger' data-id='${data}'>Hapus</button>
                            `;
              return button;
            },
            width: '100px'
          },
        ]
      });
    }
  </script>
@endsection
