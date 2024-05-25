@extends('back.blank')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Songs</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Album
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <li class="list-inline-item">
                    <div class="searchbar">
                        <form action="{{route('song.index')}}" method="get">
                            <div class="input-group">
                                <input
                                    type="search"
                                    name="query"
                                    class="form-control"
                                    placeholder="Search"
                                    aria-label="Search"
                                    aria-describedby="button-addon2"
                                    value="{{request('query')}}"
                                />
                                <div class="input-group-append">
                                    <button
                                        class="btn btn-outline-secondary"
                                        type="submit"
                                        id="button-addon2"
                                    >
                                        <li class="fa fa-search"></li>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="float-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="#myBtn">
                        Input <li class="fa fa-cloud-upload"></li>
                    </button>
                </div>
            </div>
            <div class="card-body col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <th>No.</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Judul</th>
                    <th>Note</th>
                    <th>Songs</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($songs as $song)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>
                                @if($song->album_id == null)
                                    {{"-"}}
                                @else
                                    {{$song->album->name}}
                                @endif
                            </td>
                            <td>{{$song->artist->name}}</td>
                            <td>{{$song->title}}</td>
                            <td>{{$song->note}}</td>
                            <td>@forelse($song->files as $file)
                                    <audio preload="auto" controls>
                                        <source src="/storage/files/{{$file->name_path}}">
                                    </audio>
                                @empty
                                    <img src="/assets/files/orang.jpg" class="card-img h-100" alt="Card image">
                                @endforelse
                            </td>
                            <td>
                                <div class="form-group">
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$song->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
{{--                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$song->id}}"--}}
{{--                                       id="#myBtn" ><i class="feather icon-eye"></i></a>--}}
                                    <form action="{{route('song.destroy',$song)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="feather icon-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Data Tidak Ada!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {!!$songs->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('song.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <select name="album_id" class="form-control @error('album_id') is-invalid @enderror" >
                                <option value="">--Pilih Album--</option>
                                @foreach($albums as $album)
                                    <option value="{{$album->id}}">{{$album->name}}</option>
                                @endforeach
                            </select>
                            @error('album_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="artist_id" class="form-control @error('artist_id') is-invalid @enderror" >
                                <option value="">--Pilih Artist--</option>
                                @foreach($artists as $artist)
                                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                                @endforeach
                            </select>
                            @error('artist_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul">
                            @error('title')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror" placeholder="Note"></textarea>
                            @error('note')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label>Upload Song</label>
                            <input type="file" name="name_path" class="form-control">
                            <label style="font-size: 10px" >MAX:25600 | mp3,mp4</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
        @include('back.songs.edit')
{{--        @include('backend.songs.show')--}}
@endsection
