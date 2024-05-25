@extends('back.blank')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Events</h4>
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
                        <form action="{{route('event.index')}}" method="get">
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
                    <th>Nama</th>
                    <th>location</th>
                    <th>date</th>
                    <th>Note</th>
                    <th>Photo</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->location}}</td>
                            @if($event->date == null)
                                <td> - </td>
                            @else
                                <td>{{\Carbon\Carbon::parse($event->date)->isoFormat('D MMM Y')}}</td>
                            @endif
                            <td>{{$event->note}}</td>
                            <td>@forelse($event->images as $image)
                                    <img src="/storage/images/{{$image->name_path}}" class="card-img h-100" alt="Card image" style="width: 200px">
                                @empty
                                    <img src="/assets/images/orang.jpg" class="card-img h-100" alt="Card image">
                                @endforelse
                            </td>
                            <td>
                                <div class="form-group">
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$event->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
{{--                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$event->id}}"--}}
{{--                                       id="#myBtn" ><i class="feather icon-eye"></i></a>--}}
                                    <form action="{{route('event.destroy',$event)}}" method="POST" class="d-inline">
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
                {!!$events->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Acara">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Masukkan Lokasi Acara">
                            @error('location')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date Event : </label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                            @error('date')
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
                            <label>Photo Albums</label>
                            <input type="file" name="name_path" class="form-control">
                            <label style="font-size: 10px" >MAX:2048 | jpeg,png,jpg</label>
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
        @include('back.events.edit')
{{--        @include('backend.events.show')--}}
@endsection
