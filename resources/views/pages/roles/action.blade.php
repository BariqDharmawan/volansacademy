<a class="btn btn-info pt-0 pb-0" href="{{ route('roles.show',$role->id) }}">Detail</a>
@can('role-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('roles.edit',$role->id) }}">Edit</a>
@endcan
@can('role-delete')
@if($role->id != 1)
	{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
	{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
	{!! Form::close() !!}
@endif
@endcan