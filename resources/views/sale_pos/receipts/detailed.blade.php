
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WPseeds | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="fonts/font-awesome.min.css"> --}}

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <style type="text/css">
  @media print{
	/* .page-header {
    /* background-color: #f6f6f6 !important; */
	-webkit-print-color-adjust: exact !important;
} */
/* .page-header {   
    margin: 0px 0 20px !important;
    padding-top: 0px;
} */
.invoice-info {
    /* margin-bottom: 20px; */
}
.trcss{
	background-color: #8cc63e !important;
	-webkit-print-color-adjust: exact !important;
}
.headb{
	background-color: #8cc63e !important;
	-webkit-print-color-adjust: exact !important;
}
table thead tr td{
    background-color: #8cc63e !important;
	-webkit-print-color-adjust: exact !important;
}

.total {
    background-color: #af3a46 !important;
	-webkit-print-color-adjust: exact !important;
  }
.invoice {
    /* border: 1px solid; */
    padding: 10px;
}
.table-responsive {
    overflow: hidden;
}
  }

  </style>
  <!-- Main content -->
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <section class="invoice">
    <!-- title row -->
    <div class="row" style="margin-bottom: -20px">
      <div class="col-xs-12">
        <div class="row">
           <div class="col-xs-6">
			   <!-- Logo -->
		@if(!empty($receipt_details->logo))
		<img src="{{$receipt_details->logo}}" style="width: 50%;height:50%">
	
	@endif
        
          </div>        
         <div class="col-xs-6" style="text-align:right; font-size:14px">
			@if(!empty($receipt_details->display_name))
			<strong>{{strtoupper($receipt_details->display_name)}}</strong>
			@endif
            <br>
			@if(!empty($receipt_details->address))
				{!! ucwords($receipt_details->address) !!}
			@endif
            <br>
			@if(!empty($receipt_details->website))
				{{ $receipt_details->website }}
			@endif
           <br>
		   @if(!empty($receipt_details->contact))
				{!! $receipt_details->contact !!}
			@endif
            <br>
            @if(!empty($receipt_details->tax_info1))
				{{ $receipt_details->tax_label1 }} {{ $receipt_details->tax_info1 }}
			@endif
			<br>
			@if(!empty($receipt_details->tax_info2))
				{{ $receipt_details->tax_label2 }} {{ $receipt_details->tax_info2 }}
			@endif
			
             </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
	<hr class="total" style="height:2px;background-color:#af3a46 !important;">
    <!-- info row -->
    <div class="row" style="margin-top: -16px">
      <div class="col-xs-6 invoice-col">        
          <h2>INVOICE</h2>
          {{-- @if(!empty($receipt_details->invoice_no_prefix))
				<span class="pull-left">{!! $receipt_details->invoice_no_prefix !!}</span>
			@endif --}}

			Invoice No :{{$receipt_details->invoice_no}}<br>
		  @if(!empty($receipt_details->date_label))
			
				Date : {{$receipt_details->invoice_date}}<br>
		  @endif
          {{-- Barcode --}}
@if($receipt_details->show_barcode)
<br>

			<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
		
@endif
      </div>
      <!-- /.col -->      

      <!-- /.col -->
      <div class="col-xs-6" style="float:right; text-align:right">
         <b>To</b>
        <address>
			@if(!empty($receipt_details->customer_name))
				{{ $receipt_details->customer_name }}<br>
			@endif
			@if(!empty($receipt_details->customer_info))
			<strong>{!! $receipt_details->customer_info !!}</strong>
			@endif
			@if(!empty($receipt_details->client_id_label))
				<br/>
				<strong>{{ $receipt_details->client_id_label }}</strong> {{ $receipt_details->client_id }}
			@endif
			@if(!empty($receipt_details->customer_tax_label))
				<br/>
				<strong>{{ $receipt_details->customer_tax_label }}</strong> {{ $receipt_details->customer_tax_number }}
			@endif
			@if(!empty($receipt_details->customer_custom_fields))
				<br/>{!! $receipt_details->customer_custom_fields !!}
			@endif
			@if(!empty($receipt_details->sales_person_label))
				<br/>
				<strong>{{ $receipt_details->sales_person_label }}</strong> {{ $receipt_details->sales_person }}
			@endif

			@if(!empty($receipt_details->customer_rp_label))
				<br/>
				<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
			@endif
        <br>
           
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row color-555">
		<div class="col-xs-12">
			<br/>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td style="background-color: #9e2733 !important; color:#ffffff !important;">No</td>
						
						
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->table_product_label}}
						</td style="background-color: #9e2733 !important;">
	
						{{-- @if($receipt_details->show_cat_code == 1)
							<td style="background-color: #9e2733 !important;color:#ffffff !important;">{{$receipt_details->cat_code_label}}</td>
						@endif --}}
						
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{-- {{$receipt_details->table_qty_label}} --}}
							Qnty
						</td>
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{-- {{$receipt_details->table_qty_label}} --}}
							Units
						</td>
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->table_unit_price_label}}
						</td>
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->line_discount_label}}
						</td>
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->line_tax_label}}
						</td>
						{{-- <td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->table_unit_price_label}} (@lang('product.inc_of_tax'))
						</td> --}}
						<td style="background-color: #9e2733 !important;color:#ffffff !important;">
							{{$receipt_details->table_subtotal_label}}
						</td>
					</tr>
				</thead>
				<tbody>
					@foreach($receipt_details->lines as $line)
						<tr>
							<td class="text-center">
								{{$loop->iteration}}
							</td>
							<td style="word-break: break-all;">
								@if(!empty($line['image']))
									<img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
								@endif
								{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
								@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif
								@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
								@if(!empty($line['sell_line_note']))({{$line['sell_line_note']}}) @endif
								@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
								@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif 
	
								@if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
								@if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
							</td>
	
							{{-- @if($receipt_details->show_cat_code == 1)
								<td>
									@if(!empty($line['cat_code']))
										{{$line['cat_code']}}
									@endif
								</td>
							@endif --}}
	
							<td class="text-left">
								{{$line['quantity']}}
							</td>
							<td class="text-left">
								{{$line['units']}}
							</td>
							<td class="text-left">
								{{$line['unit_price_before_discount']}}
							</td>
							<td class="text-left">
								{{$line['line_discount']}}
							</td>
							<td class="text-left">
								{{$line['tax']}} {{$line['tax_name']}}
							</td>
							{{-- <td class="text-left">
								{{$line['unit_price_inc_tax']}}
							</td> --}}
							<td class="text-left">
								{{$line['line_total']}}
							</td>
						</tr>
						@if(!empty($line['modifiers']))
							@foreach($line['modifiers'] as $modifier)
								<tr>
									<td class="text-center">
										&nbsp;
									</td>
									<td>
										{{$modifier['name']}} {{$modifier['variation']}} 
										@if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif 
										@if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
									</td>
	
									@if($receipt_details->show_cat_code == 1)
										<td>
											@if(!empty($modifier['cat_code']))
												{{$modifier['cat_code']}}
											@endif
										</td>
									@endif
	
									<td class="text-right">
										{{$modifier['quantity']}} {{$modifier['units']}}
									</td>
									<td class="text-right">
										&nbsp;
									</td>
									<td class="text-center">
										&nbsp;
									</td>
									<td class="text-center">
										&nbsp;
									</td>
									<td class="text-center">
										{{$modifier['unit_price_exc_tax']}}
									</td>
									<td class="text-right">
										{{$modifier['line_total']}}
									</td>
								</tr>
							@endforeach
						@endif
					@endforeach
	
					{{-- @php
						$lines = count($receipt_details->lines);
					@endphp
	
					@for ($i = $lines; $i < 7; $i++)
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							@if($receipt_details->show_cat_code == 1)
								<td>&nbsp;</td>
							@endif
						</tr>
					@endfor --}}
	
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<!-- accepted payments column -->
		<div class="col-xs-6">
			<table class="table table-condensed">
				<p class="lead">Payment Method</p>
				@if(!empty($receipt_details->payments))
					@foreach($receipt_details->payments as $payment)
						<tr>
							<td>{{$payment['method']}}</td>
							<td>{{$payment['amount']}}</td>
							<td>{{$payment['date']}}</td>
						</tr>
					@endforeach
				@endif
			</table>
		</div>
		<!-- /.col -->
		<div class="col-xs-6">
		  <p class="lead">Amount</p>
  
		  <div class="table-responsive">
			<table class="table">
				<tbody>
					@if(!empty($receipt_details->total_quantity_label))
						<tr class="color-555">
							<td style="width:50%">
								{!! $receipt_details->total_quantity_label !!}
							</td>
							<td class="text-right">
								{{$receipt_details->total_quantity}}
							</td>
						</tr>
					@endif
					<tr class="color-555" >
						<td style="width:50%" >
							{!! $receipt_details->subtotal_label !!}
						</td>
						<td class="text-right">
							{{$receipt_details->subtotal}}
						</td>
					</tr>
					
					<!-- Shipping Charges -->
					@if(!empty($receipt_details->shipping_charges))
						<tr class="color-555">
							<td style="width:50%">
								{!! $receipt_details->shipping_charges_label !!}
							</td>
							<td class="text-right">
								{{$receipt_details->shipping_charges}}
							</td>
						</tr>
					@endif
	
					<!-- Discount -->
					@if( !empty($receipt_details->discount) )
						<tr class="color-555">
							<td>
								{!! $receipt_details->discount_label !!}
							</td>
	
							<td class="text-right">
								(-) {{$receipt_details->discount}}
							</td>
						</tr>
					@endif
	
					@if( !empty($receipt_details->reward_point_label) )
						<tr class="color-555">
							<td>
								{!! $receipt_details->reward_point_label !!}
							</td>
	
							<td class="text-right">
								(-) {{$receipt_details->reward_point_amount}}
							</td>
						</tr>
					@endif
	
					@if(!empty($receipt_details->group_tax_details))
						@foreach($receipt_details->group_tax_details as $key => $value)
							<tr class="color-555">
								<td>
									{!! $key !!}
								</td>
								<td class="text-right">
									(+) {{$value}}
								</td>
							</tr>
						@endforeach
					@else
						@if( !empty($receipt_details->tax) )
							<tr class="color-555">
								<td>
									{!! $receipt_details->tax_label !!}
								</td>
								<td class="text-right">
									(+) {{$receipt_details->tax}}
								</td>
							</tr>
						@endif
					@endif
	
					@if( !empty($receipt_details->round_off_label) )
						<tr class="color-555">
							<td>
								{!! $receipt_details->round_off_label !!}
							</td>
							<td class="text-right">
								{{$receipt_details->round_off}}
							</td>
						</tr>
					@endif
					
					<!-- Total -->
					<tr>
						<th class="total" style="background-color: #9e2733 !important; color:#ffffff !important;" class="font-23 padding-10">
							{!! $receipt_details->total_label !!}
						</th>
						<td class="total" class="text-right font-23 padding-10" style="background-color: #9e2733 !important; color:#ffffff !important;">
							{{$receipt_details->total}}
						</td>
					</tr>
				</tbody>            
			</table>
		  </div>  
		  
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-6">
			   <p class="lead" style="text-align: center">Authorized signatory</p>
			 
			   <hr class="total" style="color: black !important;height:1px;">
				</div>
				<div class="col-xs-6">
					
					 </div>
			</div>
		   </div>
		<!-- /.col -->
	  </div>
	
{{-- 
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods: PayPal</p>       

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Refund Policy :We will be happy to provide a full refund within 30 days of the original purchase. After 30 days, no refunds will be given.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$95</td>
            </tr>
            <tr>
              <th>TAX(0.00%)</th>
              <td>$0.00</td>
            </tr>
            <tr class="total">
              <th>Total:</th>
              <td>$95</td>
            </tr>            
          </table>
        </div>  
        <small>Ninty Five USD.</small >      
      </div>

      <!-- /.col -->
    </div> --}}

     {{-- <div class="row">
      <div class="col-xs-6">
         <p class="lead">Authorized signatory</p>
      </div>
     </div> --}}
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
</div>
<!-- ./wrapper -->
</body>
</html>
