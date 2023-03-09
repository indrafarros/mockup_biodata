@extends('layouts.main')

@section('title', 'Dashboard')


@section('content')
    <h1>Welcome {{ Auth::user()->email }}</h1>
    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <div class="my-3 col-12 col-sm-6 col-md-4">
                    <form action="" method="get">
                        <div class="input-group mb-3 ">
                            <input type="text" class="form-control" id="floatingInputGroup1" name="keyword"
                                placeholder="Keyword">
                            <button class="input-group-text btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tmpt, Tggl lahir</th>
                            <th>Jabatan yang dilamar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ ucfirst($user->tempat_lahir) . ', ' . date('d-m-Y', strtotime($user->tanggal_lahir)) }}
                                </td>
                                <td>{{ $user->jabatan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.user.view', $user->user_id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('admin.dashboard.user.destroy', $user->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
