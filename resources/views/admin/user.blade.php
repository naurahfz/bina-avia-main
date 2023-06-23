@extends('layouts.admin')

@section('content')
<section class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="mr-md-3 mr-xl-5">
          <div class="row m-0">
            <h2>Pengaturan User</h2>
            <button type="button" class="btn btn-outline-primary btn-sm ml-3" data-toggle="modal" data-target="#tambah" style="height: fit-content;">
              Tambah
            </button>
          </div>
          <p class="mb-md-0">Tambah, Edit dan Hapus User.</p>
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
                <th>Nama User</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $u)
              @php
                $image = $u->image;
                if (empty($image)) {$image="default.png";}
              @endphp
              <tr>
                <td class="td-nomer">{{ $loop->iteration }}</td>
                <td>
                  <img src="/assets/img/user/{{ $image }}" class="rounded-circle img-profil mr-2" style="height:16px;width:16px">
                  <span>{{ $u->name }}</span>
                </td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->role }}</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm btn-table" title="Edit" data-toggle="modal" data-target="#edit" onclick='edit({{ $u->id }})'><i class="mdi mdi-pencil"></i></button>
                  <button type="button" class="btn btn-danger btn-sm btn-table" title="Hapus" data-toggle="modal" data-target="#hapus" onclick='hapus({{ $u->id }})'><i class="mdi mdi-close"></i></button>
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
        <h5 class="modal-title"><i class="mdi mdi-account"></i> Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-8">
              <label>Nama</label>
              <input type="text" class="form-control form-control-sm" id="name" name="name" required>
            </div>
            <div class="col-4">
              <label>Role</label>
              <select class="form-control form-control-sm" id="role" name="role">
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <label>Username</label>
              <input type="text" class="form-control form-control-sm" id="username" name="username" required>
            </div>
            <div class="col-6">
              <label>Password</label>
              <input type="password" class="form-control form-control-sm" id="password" name="password" required>
            </div>
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
        <h5 class="modal-title" id="eti"><i class="mdi mdi-account"></i> Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="d-none" id="eid" name="id">
          <div class="form-group row">
            <div class="col-8">
              <label>Nama</label>
              <input type="text" class="form-control form-control-sm" id="enm" name="name" required>
            </div>
            <div class="col-4">
              <label>Role</label>
              <select class="form-control form-control-sm" id="erl" name="role">
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <label>Username</label>
              <input type="text" class="form-control form-control-sm" id="eus" name="username" required>
            </div>
            <div class="col-6">
              <label>Password</label>
              <input type="password" class="form-control form-control-sm" id="eps" name="password">
              <sub class="text-danger">*Kosongkan jika tidak ingin mengganti password</sub>
            </div>
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
        <h5 class="modal-title"><i class="mdi mdi-close"></i> Hapus User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" class="d-none" id="hid" name="id" required>
          <div class="form-group">
            <p class="" id="hde">Apakah anda yakin ingin menghapus user ini?</p>
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
			url: "/api/user/"+id,
			type: 'GET',
			dataType: 'json', // added data type
			success: function(response) {
        var mydata = response.data;
				$("#eid").val(id);
				$("#enm").val(mydata.name);
				$("#erl").val(mydata.role);
				$("#eus").val(mydata.username);
				$("#eps").val(mydata.password);
        $("#eti").html('<i class="mdi mdi-pencil"></i> Edit '+mydata.name);
			}
		});
	}
	function hapus(id){
		$.ajax({
			url: "/api/user/"+id,
			type: 'GET',
			dataType: 'json', // added data type
			success: function(response) {
        var mydata = response.data;
				$("#hid").val(id);
				$("#hde").text('Apakah anda yakin ingin menghapus testimoni dari "'+mydata.name+'"?');
			}
		});
	}
</script>
@endsection