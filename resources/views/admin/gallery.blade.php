@extends('layouts.admin')

@section('content')
<section class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="mr-md-3 mr-xl-5">
          <div class="row m-0">
            <h2>Pengaturan Galeri</h2>
            <button type="button" class="btn btn-outline-primary btn-sm ml-3" data-toggle="modal" data-target="#tambah" style="height: fit-content;">
              Tambah
            </button>
          </div>
          <p class="mb-md-0">Tambah, Edit dan Hapus Testimoni.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="data-alumni" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Caption</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($galleries as $g)
              @php
                $image = $g->image;
                if (empty($image)) {$image="default.png";}
              @endphp
              <tr>
                <td class="td-nomer">{{ $loop->iteration }}</td>
                <td>{{ $g->caption }}</td>
                <td>
                  <img src="/assets/img/gallery/{{ $image }}" class="rounded mr-2" style="object-fit:cover;height:90px;width:160px">
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm btn-table" title="Edit" data-toggle="modal" data-target="#edit" onclick='edit({{ $g->id }})'><i class="mdi mdi-pencil"></i></button>
                  <button type="button" class="btn btn-danger btn-sm btn-table" title="Hapus" data-toggle="modal" data-target="#hapus" onclick='hapus({{ $g->id }})'><i class="mdi mdi-close"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="mdi mdi-image-area"></i> Tambah Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Caption</label>
            <input type="text" class="form-control form-control-sm" id="caption" name="caption" required>
          </div>
          <div class="form-group">
            <label>Upload foto</label>
            <input type="file" class="form-control form-control-sm" id="image" name="image" required>
          </div>
          <div class="modal-footer p-0 pt-3">
            <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-success" name="submit" value="store">
              <i class="mdi mdi-check"></i><span> Submit</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eti"><i class="mdi mdi-image-area"></i> Edit Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="d-none" id="eid" name="id">
          <div class="form-group">
            <label>Caption</label>
            <input type="text" class="form-control form-control-sm" id="ecp" name="caption" required>
          </div>
          <div class="form-group">
            <label>Upload foto</label>
            <input type="file" class="form-control form-control-sm" name="image">
          </div>
          <div class="modal-footer p-0 pt-3">
            <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-success" name="submit" value="update">
              <i class="mdi mdi-content-save"></i><span> Simpan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="mdi mdi-close"></i> Hapus Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" class="d-none" id="hid" name="id" required>
          <div class="form-group">
            <p class="" id="hde">Apakah anda yakin ingin menghapus testimoni ini?</p>
          </div>
          <div class="modal-footer p-0 pt-3">
            <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-sm btn-danger" name="submit" value="destroy">
              <i class="mdi mdi-close"></i><span> Hapus</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
	function edit(id){
		$.ajax({
			url: "/api/gallery/"+id,
			type: 'GET',
			dataType: 'json', // added data type
			success: function(response) {
        var mydata = response.data;
				$("#eid").val(id);
				$("#ecp").val(mydata.caption);
			}
		});
	}
	function hapus(id){
		$.ajax({
			url: "/api/gallery/"+id,
			type: 'GET',
			dataType: 'json', // added data type
			success: function(response) {
        var mydata = response.data;
				$("#hid").val(id);
				$("#hde").text('Apakah anda yakin ingin menghapus galeri "'+mydata.caption+'"?');
			}
		});
	}
</script>
@endsection