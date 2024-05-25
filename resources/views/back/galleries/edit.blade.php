@foreach($galleries as $gallery)
<div class="modal fade" id="exampleModal-{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select name="artist_id" class="form-control @error('artist_id') is-invalid @enderror" >
                                @if($gallery->artist_id == null)
                                    <option value="">--Pilih Artist--</option>
                                @else
                                    <option value="{{$gallery->artist_id}}">{{$gallery->artist->name}}</option>
                                @endif
                                @foreach($artists as $artist)
                                    <option value="{{$artist->id}}" @if($gallery->artist_id == $artist->id) @endif>{{$artist->name}}</option>
                                @endforeach
                            </select>
                            @error('artist_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <select name="album_id" class="form-control @error('album_id') is-invalid @enderror" >
                                @if($gallery->album_id == null)
                                    <option value="">--Pilih Album--</option>
                                @else
                                    <option value="{{$gallery->album_id}}">{{$gallery->album->name}}</option>
                                @endif
                                @foreach($albums as $album)
                                    <option value="{{$album->id}}" @if($gallery->album_id == $album->id) @endif>{{$album->name}}</option>
                                @endforeach
                            </select>
                            @error('album_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <select name="event_id" class="form-control @error('event_id') is-invalid @enderror" >
                                @if($gallery->event_id == null)
                                    <option value="">--Pilih Event--</option>
                                @else
                                    <option value="{{$gallery->event_id}}">{{$gallery->event->name}}</option>
                                @endif
                                @foreach($events as $event)
                                    <option value="{{$event->id}}" @if($gallery->event_id == $event->id) @endif>{{$event->name}}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$gallery->name}}">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Images</label>
                            <input type="file" name="name_path" class="form-control">
                            <label style="font-size: 10px" >MAX:2048 | jpeg,png,jpg</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
