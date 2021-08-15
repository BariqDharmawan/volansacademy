@extends('layouts.admin')
@section('title', 'Tambah Issue/Follow Up Baru')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Tambah Issue/Follow Up Baru</h1>
    </div>

    {!! Form::open(array('route' => 'issues.store','method'=>'POST', 'files' => true)) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('issues.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Kirim</span>
            </button>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan data yang anda masukkan.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project:</strong>
                        {!! Form::select('project_id', [null=>'Please Select'] + $projects,[], array('class' => 'form-control', 'id' => 'project_id')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal:</strong>
						<div class="input-group date" id="date" data-target-input="nearest">
							<input type="text" name="date" style="background:white !important" placeholder="Pilih tanggal Form PM (DD/MM/YYYY)" readonly="readonly" class="form-control datetimepicker-input" data-target="#date" data-target="#date" data-toggle="datetimepicker"/>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Issue:</strong>
                        {!! Form::textArea('issue', null, array('placeholder' => 'Issue Project','class' => 'form-control', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Attachment:</strong>
                        <input type="file" name="attachment[]" id="attachment" placeholder='Issue File' class='form-control' required='false' multiple onchange="javascript:updateList()">
                    </div>
					<p>Selected files:</p>
					<div id="attachmentList"></div>
                </div>
				
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@push('scripts')
<script type="text/javascript">
	updateList = function() {
		var input = document.getElementById('attachment');
		var output = document.getElementById('attachmentList');
		var children = "";
		for (var i = 0; i < input.files.length; ++i) {
			children += '<li>' + input.files.item(i).name + '</li>';
		}
		output.innerHTML = '<ul>'+children+'</ul>';
	}
    $(function () {
		
        //Initialize Select2 Elements
		$('#project_id').select2(
		{
			placeholder: "Please select a project"
		}
		);
		
		
		//Date range picker
		$('#date').datetimepicker({
			format: 'DD-MM-YYYY',
			ignoreReadonly: true,
		});
		
		
    });
</script>
@endpush