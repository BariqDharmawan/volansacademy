<a class="btn btn-info pt-0 pb-0" href="{{ route('newsletters.show',$newsletter->id) }}">Detail</a>

<a class="btn btn-primary pt-0 pb-0" href="{{ route('newsletters.edit',$newsletter->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['newsletters.destroy', $newsletter->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
{!! Form::open(['method' => 'POST','route' => ['newsletters.publish', $newsletter->id],'style'=>'display:inline']) !!}
{!! Form::submit('Publish', ['class' => 'btn btn-success pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk publish ? Publish adalah mengirimkan isi newsletter ke semua email yang terdaftar pada milis web volans");']) !!}
{!! Form::close() !!}