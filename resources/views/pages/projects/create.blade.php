@extends('layouts.admin')
@section('title', 'Tambah Project Baru')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Tambah Project Baru</h1>
    </div>

    {!! Form::open(array('route' => 'projects.store','method'=>'POST')) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-icon-split">
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {!! Form::text('nama', null, array('placeholder' => 'Nama Project','class' => 'form-control', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer:</strong>
                        {!! Form::select('customer_id', [null=>'Please Select'] + $customers,[], array('class' => 'form-control', 'id' => 'customer_id')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Division:</strong>
                        {!! Form::select('division_id', [null=>'Please Select'] + $divisions,[], array('class' => 'form-control', 'id' => 'division_id')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project Owner:</strong>
                        {!! Form::select('owner', [null=>'Please Select'] + $users,[], array('class' => 'form-control', 'id' => 'owner')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project Manager:</strong>
                        {!! Form::select('manager', [null=>'Please Select'] + $users,[], array('class' => 'form-control', 'id' => 'manager')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Form PM:</strong>
						<div class="input-group date" id="date_form_pm" data-target-input="nearest">
							<input type="text" name="date_form_pm" style="background:white !important" placeholder="Pilih tanggal Form PM (DD/MM/YYYY)" readonly="readonly" class="form-control datetimepicker-input" data-target="#date_form_pm" data-target="#date_form_pm" data-toggle="datetimepicker"/>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No Form PM:</strong>
                        {!! Form::text('no_form_pm', null, array('placeholder' => 'Nomor Form PM','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Type:</strong>
                        {!! Form::select('producttype_id', [null=>'Please Select'] + $producttypes,[], array('class' => 'form-control', 'id' => 'producttype_id')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Tanggal Pelaksanaan (PEF):</strong>

					  <div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						  </span>
						</div>
						<input type="text" value="" name="pef_date" readonly="readonly" style="background:white !important" class="form-control float-right" id="pef_date">
					  </div>
					  <!-- /.input group -->
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Mulai:</strong>
						<div class="input-group date" id="start_date" data-target-input="nearest">
							<input type="text" style="background:white !important" placeholder="Pilih tanggal mulai (DD/MM/YYYY)" readonly="readonly" class="form-control datetimepicker-input" id="start_date" data-target="#start_date" data-toggle="datetimepicker"/>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Akhir:</strong>
						<div class="input-group date" id="start_date" data-target-input="nearest">
							<input type="text" style="background:white !important" placeholder="Pilih tanggal akhir (DD/MM/YYYY)" readonly="readonly" class="form-control datetimepicker-input" id="end_date" data-target="#end_date" data-toggle="datetimepicker"/>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>PEF No:</strong>
                        {!! Form::text('pef_no', null, array('placeholder' => 'PEF No','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>SPK / PKS:</strong>
                        {!! Form::text('spk_pks', null, array('placeholder' => 'SPK / PKS','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Jangka Waktu PKS/SPK/PO:</strong>

					  <div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						  </span>
						</div>
						<input type="text" value="" readonly="readonly" style="background:white !important" class="form-control float-right" id="range_spk" name="range_spk">
					  </div>
					  <!-- /.input group -->
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nilai (excl. PPN):</strong>
                        {!! Form::number('amount_exclude_ppn', null, array('placeholder' => 'Nilai exclude PPN','class' => 'form-control', 'step' => 0.1)) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tahapan Pembayaran:</strong>
                        {!! Form::textArea('terms_of_payment', null, array('placeholder' => 'Tambahan pembayaran','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
                        {!! Form::textArea('description', null, array('placeholder' => 'Keterangan','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Catatan:</strong>
                        {!! Form::textArea('notes', null, array('placeholder' => 'Catatan','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Closed:</strong>
                        {!! Form::select('is_closed', $is_closed,[], array('class' => 'form-control', 'id' => 'is_closed')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
		$('#customer_id').select2(
		{
			placeholder: "Please select a customer"
		}
		);
		
		$('#division_id').select2(
		{
			placeholder: "Please select a division"
		}
		);
		
		$('#owner').select2(
		{
			placeholder: "Please select project owner"
		}
		);
		
		$('#is_closed').select2(
		{
			placeholder: ""
		}
		);
		
		$('#manager').select2(
		{
			placeholder: "Please select project manager"
		}
		);
		
		$('#producttype_id').select2(
		{
			placeholder: "Please select product type"
		}
		);
		
		//Date range picker
		$('#date_form_pm').datetimepicker({
			format: 'DD-MM-YYYY',
			ignoreReadonly: true,
		});
		
		$('#start_date').datetimepicker({
			format: 'DD-MM-YYYY',
			ignoreReadonly: true,
		});
		
		$('#end_date').datetimepicker({
			format: 'DD-MM-YYYY',
			ignoreReadonly: true,
		});
		
		//Date range picker
		$('#pef_date').daterangepicker({
			autoUpdateInput: false,
			  locale: {
				  cancelLabel: 'Clear',
				  format: 'DD-MM-YYYY'
			  },
			ignoreReadonly: true,
		});
		
		$('#range_spk').daterangepicker({
			autoUpdateInput: false,
			  locale: {
				  cancelLabel: 'Clear',
				  format: 'DD-MM-YYYY'
			  },
			ignoreReadonly: true,
		});
		
		$('input[name="range_spk"]').on('apply.daterangepicker', function(ev, picker) {
			  $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		  });

		  $('input[name="range_spk"]').on('cancel.daterangepicker', function(ev, picker) {
			  $(this).val('');
		  });
		  
		  $('input[name="pef_date"]').on('apply.daterangepicker', function(ev, picker) {
			  $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		  });

		  $('input[name="pef_date"]').on('cancel.daterangepicker', function(ev, picker) {
			  $(this).val('');
		  });
    });
</script>
@endpush