@foreach($albums as $album)
<div class="modal fade" id="exampleModal-{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('album.update',$album->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$album->name}}">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="artist_id" class="form-control @error('artist_id') is-invalid @enderror" >
                                <option value="{{$album->artist_id}}">{{$album->artist->name}}</option>
                                @foreach($artists as $artist)
                                    <option value="{{$artist->id}}" @if($album->artist_id == $artist->id) @endif>{{$artist->name}}</option>
                                @endforeach
                            </select>
                            @error('artist_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Release : </label>
                            <input type="date" name="release" class="form-control @error('release') is-invalid @enderror" value="{{$album->release}}">
                            @error('release')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror">{{value($album->note)}}</textarea>
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
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
