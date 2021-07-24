<a class="btn btn-info pt-0 pb-0" href="{{ route('users.show',$user->id) }}">Detail</a>
@can('user-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('users.edit',$user->id) }}">Edit</a>
@endcan
@can('user-delete')
<?php 
if($user->id != auth()->user()->id){
?>
	{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
	{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
	{!! Form::close() !!}
<?php 
}
?>
@endcan