@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title"> List Data User</h4>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah User</button>
                <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="modalCariObatLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahUser">Tambah User </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('storeuser') }}" method="POST" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Name">
                                </div>
                                
                                <div class="form-group">
                                    <label>Photos upload</label>
                                    <input type="file" name="foto_pasien" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto Pasien">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="role" id="role">
                                        <option value="" disabled selected>Pilih Role</option>
                                        @foreach($role as $role)
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div> 

                <!-- Tabel List User -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->roles->first()->name) }}</td>
                                    <td>
                                         <button class=" btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditUser{{ $user->id }}"><i class="mdi mdi-pencil"></i></button>
                                         <div class="modal fade" id="modalEditUser{{ $user->id }}" tabindex="-1" aria-labelledby="modalEditUser" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditUser">Edit User </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{ route('updateuser', $user->id) }}" method="POST" class="forms-sample">
                                                    @csrf
                                                    @method('PUT')                                               
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Email</label>
                                                        <input type="text" class="form-control" name="email" placeholder="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Password</label>
                                                        <input type="text" class="form-control" name="password" placeholder="Name">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Photos upload</label>
                                                        <input type="file" name="foto_pasien" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto Pasien">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Alamat</label>
                                                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                    </td>
                                         <!-- Modal Edit User -->
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
