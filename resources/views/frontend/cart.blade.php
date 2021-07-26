@extends('layouts.frontend')
@section('title', 'Keranjang')

@section('content')
<div class="bradcam_area breadcam_bg overlay2">
            <h3>Keranjang</h3>
        </div>
    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="all_courses">
            
				<br>
                            @php $subtotal = 0; $diskon = 0; @endphp
                            @foreach(auth()->user()->carts as $key => $item)
                                @if($item->selected) 
                                    @if($item->subclass->price_discount > 0)		
                                        @php $subtotal += $item->subclass->price_discount; @endphp
                                    @else
                                        @php $subtotal += $item->subclass->price; @endphp
                                    @endif
                                @endif
                                <div class="row m-4 justify-content-md-center">
                                    <div class="col-md-2 col-sm-2 col-1 my-auto" style="text-align:center;">
                                        <input type="checkbox" onchange="updateCart(this.id);" id="{{$item->id}}" @if($item->selected) checked @endif>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-2 my-auto">
                                        <img src="{{ url('subclass/'.$item->subclass->id.'/'.$item->subclass->icon) }}" style="width:100%">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-3 my-auto">
                                        {{ $item->subclass->name }}
                                        <br>
                                        <small>{{ $item->subclass->sub_name }}</small>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-3 my-auto text-right" style="color:red; font-weight:bold;">
                                        @if($item->subclass->price_discount > 0)		
                                            Rp. {{ number_format($item->subclass->price_discount) }} 
                                        @else
                                            Rp. {{ number_format($item->subclass->price) }} 
                                        @endif
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-2 my-auto" style="color:red;">
                                        <i class="fa fa-trash" id="hapus{{ $item->id }}"></i>
                                    </div>
                                </div>
							@endforeach
                        @if(auth()->user()->carts->count() > 0)
                        <div class="row m-4">
                            <div class="col-md-4 col-6 text-right">
                                <span >Kode Voucher (jika ada):</span>
                            </div>
                            <div class="col-md-4 col-6">
                                <input type="text" style="width:100%" id="voucher" name="voucher">
                            </div>
                            <div class="col-md-4 col-12">
                                <button type="button" id="cekkupon" onclick="useVoucher();" class="btn btn-small btn-block btn-success">Gunakan</button>
                            </div>
                        </div>
                        <div class="row m-4">
                            <div class="col-md-4 col-6 text-right">
                                <span >Diskon:</span>
                            </div>
                            <div class="col-md-4 col-6 text-right" style="color:red; font-weight:bold;">
                                Rp. <span id="diskon">{{ number_format($diskon) }}</span>
                            </div>
                        </div>
                        @php $total = $subtotal - $diskon; @endphp
                        <div class="row m-4">
                            <div class="col-md-4 col-6 text-right">
                                <span >Total:</span>
                            </div>
                            <div class="col-md-4 col-6 text-right" style="color:red; font-weight:bold;">
                                Rp. <span id="total">{{ number_format($total) }} </span>
                            </div>
                            <div class="col-md-4 col-12">
                                <button type="button" id="checkout" onclick="pilihMetodePembayaran();" class="btn btn-small btn-block btn-danger">CHECKOUT</button>
                            </div>
                        </div>
                        @else
                        <div class="row m-4 text-center">
                            Keranjang Kosong
                        </div>
                        @endif
                                
                
           
        </div>
    </div>
    <!-- popular_courses_end-->
<!-- Modal -->
<div class="modal fade" style="z-index:1000000" id="paymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="paymentMethodModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="paymentMethodModalLabel">METODE PEMBAYARAN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        @php $paymentMethods = \Config::get('constants.duitkuPaymentMethod'); @endphp
                        @foreach($paymentMethods as $kode => $paymentMethod)
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="radio" name="paymentMethod" value="{{ $kode }}" id="{{ $kode }}">
                                <label for="{{ $kode }}">{{ $paymentMethod['Description'] }}</label><br>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <button type="button" onclick="checkout();" class="btn btn-small btn-block btn-danger">BAYAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

<script>
    $('i[id^="hapus"]').click(function(){
        var id = $(this).attr('id').substr(5);
        $.ajax({
			url: "{{ route('deleteFromCart') }}",
			dataType: "JSON",
			data: {
				'_token': "{{ csrf_token() }}",
				'id': id,
			},
			method: "POST",
			success: function(response){
				//jika error
				if(response.success != true){
					swal("Gagal!", response.message, "error");
				}else{
					swal("Sukses!", response.message, "success");
                    window.location.reload();
				}
			},
			error:function(response){
				swal("Error!", "Server error!", "error");
			}
		});
    });

    function updateCart(id){
        //cek apakah ini selected atau tidak.
        var x = document.getElementById(id).checked;
        $.ajax({
			url: "{{ route('updateCart') }}",
			dataType: "JSON",
			data: {
				'_token': "{{ csrf_token() }}",
				'id': id,
                'selected': x,
                'voucher': $("#voucher").val()
			},
			method: "POST",
			success: function(response){
				//jika error
				if(response.success != true){
					swal("Gagal!", response.message, "error");
				}else{
					//swal("Sukses!", response.message, "success");
                    $('#diskon').html(response.diskon);
                    $('#total').html(response.total);
				}
			},
			error:function(response){
				swal("Error!", "Server error!", "error");
			}
		});

	}

    function pilihMetodePembayaran(){
        $("#paymentMethodModal").modal('show');
    }

    function checkout(){
        $.ajax({
			url: "{{ route('checkout') }}",
			dataType: "JSON",
			data: {
				'_token': "{{ csrf_token() }}",
				'voucher': $("#voucher").val(),
                'paymentMethod': $('input[name=paymentMethod]:checked').val()
			},
			method: "POST",
			success: function(response){
				//jika error
				if(response.success != true){
					swal("Gagal!", response.message, "error");
				}else{
					swal("Sukses!", response.message, "success");
                    //redirect ke pesanan
                    window.location.href = response.paymentUrl;
				}
			},
			error:function(response){
				swal("Error!", "Server error!", "error");
			}
		});

	}

    function useVoucher(id){
        $.ajax({
			url: "{{ route('useVoucher') }}",
			dataType: "JSON",
			data: {
				'_token': "{{ csrf_token() }}",
				'voucher': $("#voucher").val()
			},
			method: "POST",
			success: function(response){
				//jika error
				if(response.success != true){
					swal("Gagal!", response.message, "error");
				}else{
					swal("Sukses!", response.message, "success");
                    $('#diskon').html(response.diskon);
                    $('#total').html(response.total);
				}
			},
			error:function(response){
				swal("Error!", "Server error!", "error");
			}
		});

	}
</script>

<script>
var jml = 3;
	if(screen.width <= 576)
		jml = 1;
	
	
	var swiper = new Swiper('.swiper-container3', {
      slidesPerView: jml,
      spaceBetween: 15,
      slidesPerGroup: jml,
      loop: true,
      loopFillGroupWithBlank: false,
      pagination: {
        el: '.swiper-pagination3',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next3',
        prevEl: '.swiper-button-prev3',
      },
    });
</script>
@endpush
