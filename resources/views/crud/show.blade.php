@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <th>:</th>
                                <td>{{ $data->nim }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <th>:</th>
                                <td>{{ $data->jurusan }}</td>
                            </tr>
                            <tr>
                                <th>Angkatan</th>
                                <th>:</th>
                                <td>{{ $data->angkatan }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td>{{ $data->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
@endsection
