<a class="btn btn-info pt-0 pb-0" href="{{ route('roles.show',$admin->id) }}">Detail</a>
<a class="btn btn-primary pt-0 pb-0" href="{{ route('roles.edit',$admin->id) }}">Edit</a>

@if($admin->id != 1)
    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $admin->id],'style'=>'display:inline']) !!}
    {!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
    {!! Form::close() !!}
@endif