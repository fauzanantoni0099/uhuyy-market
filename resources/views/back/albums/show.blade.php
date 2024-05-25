@foreach($customers as $customer)
<div class="modal fade" id="showModal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="card m-b-30">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                @forelse($customer->images as $image)
                                    <img src="/{{$image->name_path}}" class="card-img h-100" alt="Card image" >
                                @empty
                                    <img src="/assets/images/orang.jpg" class="card-img h-100" alt="Card image">
                                @endforelse
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title font-18"><li class="fa fa-user"></li> {{$customer->employee->name}}</h5>
                                    <table class="table tab-content" >
                                        <tbody>
                                        <tr>
                                            <td class="text-black">NPSN</td>
                                            <td class="text-black">:</td>
                                            <td class="text-capitalize text-black">{{$customer->npsn}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Nama</td>
                                            <td class="text-black">:</td>
                                            <td class="text-capitalize text-danger">{{$customer->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Jenis Kelamin</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Tanggal lahir</td>
                                            <td class="text-black">:</td>
                                            <td>{{\Carbon\Carbon::parse($customer->birth_date)->isoFormat('D MMMM Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">No.Hp</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Sekolah/Pekerjaan</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->school}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Alamat</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->address}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <h5><li class="fa fa-address-card"></li> {{\Carbon\Carbon::parse($customer->date)->isoFormat('D MMMM Y')}}</h5>
                                    <table class="table tab-content" >
                                        <tbody>
                                        <tr>
                                            <td class="text-black">Program</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->program->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Kelas</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->class_room}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Buku</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->book->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Status Customer</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->status_customer}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Harga</td>
                                            <td class="text-black">:</td>
                                            <td>Rp. {{number_format($customer->price_class,0,',',',')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Registrasi</td>
                                            <td class="text-black">:</td>
                                            <td>Rp. {{number_format($customer->register,0,',',',')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Status</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->status}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Jumlah Pembayaran</td>
                                            <td class="text-black">:</td>
                                            <td>Rp. {{number_format($customer->payment_price,0,',',',')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Sisa Pembayaran</td>
                                            <td class="text-black">:</td>
                                            <td>Rp. {{number_format($customer->remaining_payment,0,',',',')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Status Pembayaran</td>
                                            <td class="text-black">:</td>
                                            <td>{{$customer->payment_status}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black">Update</td>
                                            <td class="text-black">:</td>
                                            <td>{{\Carbon\Carbon::parse($customer->updated_at)->isoFormat('D MMM Y HH:mm:ss')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endforeach
