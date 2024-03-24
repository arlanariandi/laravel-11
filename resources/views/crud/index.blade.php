@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <header class="mb-5 d-flex justify-content-between">
            <h2>Data Mahasiswa</h2>
            <div>
                <a href="{{route('mhs.create')}}" class="btn btn-primary">Create</a>
            </div>
        </header>

        {{-- Alert --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <br> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $d)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->nim }}</td>
                            <td>{{ $d->jurusan }}</td>
                            <td>{{ $d->angkatan }}</td>
                            <td>
                                <a href="{{route('mhs.show', $d->id)}}" class="btn btn-success">Show</a>
                                <a href="{{route('mhs.edit', $d->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('mhs.destroy', $d->id)}}" class="d-inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
