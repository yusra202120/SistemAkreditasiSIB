@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Data</a> 

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data User</h3>
                </div>

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->level->role ?? '-' }}</td>
                            <td> 
                                <a href="{{ route('user.edit', ['id' => $d->user_id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $d->user_id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a> 
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modal-hapus{{ $d->user_id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah kamu yakin ingin menghapus data user <b>{{ $d->nama }}</b>?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <form action="{{ route('user.delete', $d->user_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
        </div>
      </div>
    </section>
</div>
@endsection
