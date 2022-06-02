<div class="col-md-12">   
	<div class="row">
		   
		   <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
			   <div class="row">
				   <div class="receipt-header">
					   <div class="col-xs-6 col-sm-6 col-md-6">
						   <div class="receipt-left">
							   {{-- <img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;"> --}}
							   <!-- Logo -->
	@if(!empty($receipt_details->logo))
	<img width="100" src="{{$receipt_details->logo}}" style="width: 100px; border-radius: 43px;" class="img img-responsive center-block">
@endif
						   </div>
					   </div>
					   <div class="col-xs-6 col-sm-6 col-md-6 text-right">
						   <div class="receipt-right">
							   <h5>Company Name</h5>
							   <p>
								@if(!empty($receipt_details->display_name))
								{{$receipt_details->display_name}}
								@endif
							   </p>
							   <p>@if(!empty($receipt_details->address))
										<small class="text-center">
											{!! $receipt_details->address !!}
										</small>
									@endif
							   </p>
							   <p>
									@if(!empty($receipt_details->contact))
										{{ $receipt_details->contact }}
									@endif	
							   </p>
							   <p>
									@if(!empty($receipt_details->contact) && !empty($receipt_details->website))
										
									@endif
							   </p>
							   <p>
									@if(!empty($receipt_details->website))
										{{ $receipt_details->website }}
									@endif
							   </p>
							   <p>
									@if(!empty($receipt_details->location_custom_fields))
										{{ $receipt_details->location_custom_fields }}
									@endif
							   </p>
							   {{-- <p>+1 3649-6589 <i class="fa fa-phone"></i></p>
							   <p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
							   <p>USA <i class="fa fa-location-arrow"></i></p> --}}
						   </div>
					   </div>
				   </div>
			   </div>
			   
			   <div class="row">
				   <div class="receipt-header receipt-header-mid">
					   <div class="col-xs-8 col-sm-8 col-md-8 text-left">
						   <div class="receipt-right">
							<h5>Customer Name </h5>
							<p>@if(!empty($receipt_details->customer_name))
								<br/>
								{{ $receipt_details->customer_name }} <br>
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->customer_info))
								{!! $receipt_details->customer_info !!}
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->client_id_label))
								
								<b>{{ $receipt_details->client_id_label }}</b> {{ $receipt_details->client_id }}
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->customer_tax_label))
								
								<b>{{ $receipt_details->customer_tax_label }}</b> {{ $receipt_details->customer_tax_number }}
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->customer_custom_fields))
								<br/>{!! $receipt_details->customer_custom_fields !!}
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->sales_person_label))
								
								<b>{{ $receipt_details->sales_person_label }}</b> {{ $receipt_details->sales_person }}
							@endif
							</p>
							<p>
							@if(!empty($receipt_details->customer_rp_label))
							
								<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
							@endif</p>
							   {{-- <h5>Customer Name </h5>
							   <p><b>Mobile :</b> +1 12345-4569</p>
							   <p><b>Email :</b> customer@gmail.com</p>
							   <p><b>Address :</b> New York, USA</p> --}}
						   </div>
					   </div>
					   <div class="col-xs-4 col-sm-4 col-md-4">
						   <div class="receipt-left">
							   <h4>@if(!empty($receipt_details->invoice_no_prefix))
								<b>{!! $receipt_details->invoice_no_prefix !!}</b>
							@endif
							{{$receipt_details->invoice_no}}</h4>
						   </div>
					   </div>
				   </div>
			   </div>
			   
			   <div>
				   <table class="table table-bordered">
					   <thead>
						<tr>
							<th>{{$receipt_details->table_product_label}}</th>
							<th>{{$receipt_details->table_qty_label}}</th>
							<th>{{$receipt_details->table_unit_price_label}}</th>
							<th>{{$receipt_details->table_subtotal_label}}</th>
						</tr>
					   </thead>
					   <tbody>
						@forelse($receipt_details->lines as $line)
						<tr>
							<td style="word-break: break-all;">
								@if(!empty($line['image']))
									<img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
								@endif
								{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
								@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
								@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
								@if(!empty($line['sell_line_note']))({{$line['sell_line_note']}}) @endif 
								@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
								@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif
					
								@if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
								@if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
							</td>
							<td>{{$line['quantity']}} {{$line['units']}} </td>
							<td>{{$line['unit_price_inc_tax']}}</td>
							<td>{{$line['line_total']}}</td>
						</tr>
						@if(!empty($line['modifiers']))
							@foreach($line['modifiers'] as $modifier)
								<tr>
									<td>
										{{$modifier['name']}} {{$modifier['variation']}} 
										@if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
										@if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
									</td>
									<td>{{$modifier['quantity']}} {{$modifier['units']}} </td>
									<td>{{$modifier['unit_price_inc_tax']}}</td>
									<td>{{$modifier['line_total']}}</td>
								</tr>
							@endforeach
						@endif
					@empty
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
					@endforelse
						   
					   </tbody>
				   </table>
			   </div>
			   <div class="row">
				<div class="col-xs-6">

					<table class="table table-condensed">
			
						@if(!empty($receipt_details->payments))
							@foreach($receipt_details->payments as $payment)
								<tr>
									<td>{{$payment['method']}}</td>
									<td>{{$payment['amount']}}</td>
									<td>{{$payment['date']}}</td>
								</tr>
							@endforeach
						@endif
			
						<!-- Total Paid-->
						@if(!empty($receipt_details->total_paid))
							<tr>
								<th>
									{!! $receipt_details->total_paid_label !!}
								</th>
								<td>
									{{$receipt_details->total_paid}}
								</td>
							</tr>
						@endif
			
						<!-- Total Due-->
						@if(!empty($receipt_details->total_due))
						<tr>
							<th>
								{!! $receipt_details->total_due_label !!}
							</th>
							<td>
								{{$receipt_details->total_due}}
							</td>
						</tr>
						@endif
			
						@if(!empty($receipt_details->all_due))
						<tr>
							<th>
								{!! $receipt_details->all_bal_label !!}
							</th>
							<td>
								{{$receipt_details->all_due}}
							</td>
						</tr>
						@endif
					</table>
			
					{{$receipt_details->additional_notes}}
				</div>
				<div class="col-xs-6">
					<div class="table-responsive">
						  <table class="table">
							<tbody>
								@if(!empty($receipt_details->total_quantity_label))
									<tr class="color-555">
										<th style="width:70%">
											{!! $receipt_details->total_quantity_label !!}
										</th>
										<td>
											{{$receipt_details->total_quantity}}
										</td>
									</tr>
								@endif
								<tr>
									<th style="width:70%">
										{!! $receipt_details->subtotal_label !!}
									</th>
									<td>
										{{$receipt_details->subtotal}}
									</td>
								</tr>
								
								<!-- Shipping Charges -->
								@if(!empty($receipt_details->shipping_charges))
									<tr>
										<th style="width:70%">
											{!! $receipt_details->shipping_charges_label !!}
										</th>
										<td>
											{{$receipt_details->shipping_charges}}
										</td>
									</tr>
								@endif
			
								<!-- Discount -->
								@if( !empty($receipt_details->discount) )
									<tr>
										<th>
											{!! $receipt_details->discount_label !!}
										</th>
			
										<td>
											(-) {{$receipt_details->discount}}
										</td>
									</tr>
								@endif
			
								@if( !empty($receipt_details->reward_point_label) )
									<tr>
										<th>
											{!! $receipt_details->reward_point_label !!}
										</th>
			
										<td>
											(-) {{$receipt_details->reward_point_amount}}
										</td>
									</tr>
								@endif
			
								<!-- Tax -->
								@if( !empty($receipt_details->tax) )
									<tr>
										<th>
											{!! $receipt_details->tax_label !!}
										</th>
										<td>
											(+) {{$receipt_details->tax}}
										</td>
									</tr>
								@endif
			
								@if( !empty($receipt_details->round_off_label) )
									<tr>
										<th>
											{!! $receipt_details->round_off_label !!}
										</th>
										<td>
											{{$receipt_details->round_off}}
										</td>
									</tr>
								@endif
			
								<!-- Total -->
								<tr>
									<th>
										{!! $receipt_details->total_label !!}
									</th>
									<td>
										{{$receipt_details->total}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			   </div>
			   @if($receipt_details->show_barcode)
	<div class="row">
		<div class="col-xs-12">
			{{-- Barcode --}}
			<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
		</div>
	</div>
@endif
@if(!empty($receipt_details->footer_text))
	<div class="row">
		<div class="col-xs-12">
			{!! $receipt_details->footer_text !!}
		</div>
	</div>
@endif
			   {{-- <div class="row">
				   <div class="receipt-header receipt-header-mid receipt-footer">
					   <div class="col-xs-8 col-sm-8 col-md-8 text-left">
						   <div class="receipt-right">
							   <p><b>Date :</b> 15 Aug 2016</p>
							   <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
						   </div>
					   </div>
					   <div class="col-xs-4 col-sm-4 col-md-4">
						   <div class="receipt-left">
							   <h1>Stamp</h1>
						   </div>
					   </div>
				   </div>
			   </div> --}}
			   
		   </div>    
	   </div>
   </div>
   <style>
	   body{
		/* width: 29.7cm; */
  /* height: 21cm; */
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			/* border-bottom: 6px solid #333333; */
			border-top: 5px solid #9f181c;
			margin-top: 0px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 0px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
	   </style>