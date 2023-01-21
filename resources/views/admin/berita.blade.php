@extends('admin.layouts.main')

@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
      <a id="tambahData" class="m-0 font-weight-bold text-white btn btn-sm btn-primary" data-toggle="modal"
        data-target="#exampleModal">Tambah Data <i class="fas fa-fw fa-plus"></i></a>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Category Name</th>
            <th>Author Name</th>
            <th>Excerpt</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Category Name</th>
            <th>Author Name</th>
            <th>Excerpt</th>
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
    let editor;


    $(document).ready(function() {


      ClassicEditor
        .create(document.querySelector('#body'))
        .then(newEditor => {
          editor = newEditor;
        })
        .catch(error => {
          console.error(error);
        });


      /*
       * Reset Form
       */
      $('#exampleModal').on('show.bs.modal', function() {
        document.getElementById("formSubmit").reset();
        editor.setData('');
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
          url: "{{ route('berita.edit') }}",
          type: 'post',
          data: {
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(res, textStatus, xhr) {
            console.log(res, textStatus, xhr);
            $('#author').val(res.data.user_id);
            $('#title').val(res.data.title);
            $('#category').val(res.data.category_id);
            $('#data_id').val(id);
            editor.setData(res.data.body);
          }
        });
      });

      $('#dataTable tbody').on('click', '.delete-data', function() {
        let id = $(this).data('id');
        $.ajax({
          type: "POST",
          url: "{{ route('berita.delete') }}",
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
        formData.append('slug', convertToSlug(formData.get('title')));
        formData.set('body', editor.getData());
        formData.append('excerpt', convertToExcerpt(editor.getData().replace(/<\/?[^>]+(>|$)/g, "")));
        // console.log(...formData);
        $.ajax({
          type: "POST",
          processData: false,
          contentType: false,
          url: "{{ route('berita.store') }}",
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
        formData.append('slug', convertToSlug(formData.get('title')));
        formData.set('body', editor.getData());
        formData.append('excerpt', convertToExcerpt(editor.getData()));
        // console.log(...formData);
        $.ajax({
          type: "POST",
          processData: false,
          contentType: false,
          url: "{{ route('berita.update') }}",
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

    function convertToSlug(text) {
      return text.toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
    }

    function convertToExcerpt(text) {
      return text.replace(/<\/?[^>]+(>|$)/g, " ").split(' ').slice(0, 15).join(' ');
    }

    function isi() {
      $('#dataTable').DataTable({
        serverside: true,
        responsive: true,
        ajax: {
          url: "{{ route('berita') }}"
        },
        columns: [{
            data: null,
            // sortable: false,
            render: function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1
            }
          },
          {
            data: 'title',
            name: 'title'
          },
          {
            data: 'category',
            render: function(data, type, row, meta) {
              return data.name
            }
          },
          {
            data: 'author',
            render: function(data, type, row, meta) {
              return data.name
            }
          },
          {
            data: 'excerpt',
            name: 'excerpt'
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
