@extends('layouts.master')
@section('css')

<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Customers</h4>
							{{-- <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span> --}}
						</div>
					</div>
					{{-- <div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
				</div>

				<div class="col-xl-12">
					<div class="card">
						<div class="card-header pb-0">
							<div class="d-flex justify-content-between">
								{{-- <h4 class="card-title mg-b-0">Our Customers</h4> --}}
								{{-- <i class="mdi mdi-dots-horizontal text-gray"></i> --}}
							</div>
							<br>
							{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
						</div>
						{{-- <div class="col-sm-6 col-md-3">
							<button class="btn btn-outline-primary ">	 	<i class="mdi mdi-account-plus"></i> add a customer
							</button>
						</div> --}}

						<div class="col-sm-6 col-md-4 col-xl-3">
							<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
								<i class="mdi mdi-account-plus"></i> add a customer
							</a>
						</div>


		<!-- Modal effects -->
		{{-- <form action="{{route('customers.store')}}" method="post"> --}}
		
		{{-- <form action="{{route('customers.store')}}" method="PUT" class="modal" id="modaldemo8">
			@method('POST')
			@csrf
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Create New Customer</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<p class="mb-2">Please enter customer data</p>
							</div>
							<div class="card-body pt-0">
								<form class="form-horizontal" >
									<div class="form-group">
										<input type="text" class="form-control" id="inputName" required placeholder="Name" name="name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="inputEmail3" required placeholder="Address" name="address">
									</div>
									<form action="{{route('customerPhones.store')}}" method="PUT" class="modal" id="phoneForm">
										@method('POST')
										@csrf
										<div class="form-group input-container">
											<input type="hidden" name="customer_id" value="{{ optional($latestcustomer)->id}}">
											<input type="text" class="form-control col-sm-6 col-md-6 mg-t-2" style="display: inline-block" id="inputPhoneNumber" required placeholder="Phone Number" name="phone_number">
											<button class="btn ripple btn-primary ; margin-right: 2rem " type="submit" onclick="submitPhoneForm(event)" scrip><i class="mdi mdi-phone-plus "></i>add a number</button>
										</div>
									</form>

									<div class="form-group mb-0 justify-content-end">

									</div>
									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn ripple btn-primary" type="submit" value="Create Customer"></input>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</form> --}}
<!-- Combined form for creating a new customer and adding a phone number -->
{{-- <form action="{{ route('customers.store') }}" method="PUT" class="modal" id="modaldemo8">
    @csrf
	@method('POST')
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create New Customer</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <p class="mb-2">Please enter customer data</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" required placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" required placeholder="Address" name="address">
                        </div>
                        <div class="form-group input-container">

                            <input type="hidden" name="customer_id" value="{{ $id }}">
                            <input type="text" class="form-control col-sm-6 col-md-6 mg-t-2" id="inputPhoneNumber" required placeholder="Phone Number" name="phone_number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn ripple btn-primary" type="submit" value="Create Customer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</form> --}}
<!-- resources/views/customers/create.blade.php -->
<form action="{{ route('customers.store') }}" method="PUT" class="modal" id="modaldemo8">
	@method('POST')
    @csrfCall to undefined method App\Models\Customer::phone_number(Call to undefined method App\Models\Customer::phone_number())
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create New Customer</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <p class="mb-2">Please enter customer data</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" required placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" required placeholder="Address" name="address">
                        </div>
                        <div id="phones">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputPhone1" required placeholder="Phone Number" name="phone_numbers[]">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addPhoneField()">Add Phone</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn ripple btn-primary" type="submit" value="Create Customer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</form>



	{{-- </form> --}}

		<!-- End Modal effects-->
						<div class="card-body">
							<div class="table-responsive">
								{{-- <table class="table text-md-nowrap" id="example1">
									<thead>
										<tr>
											<th class="wd-15p border-bottom-0">#</th>
											<th class="wd-15p border-bottom-0">name</th>
											<th class="wd-20p border-bottom-0">address</th>
											<th class="wd-15p border-bottom-0">Start date</th>
											<th class="wd-15p border-bottom-0">Operations</th>
										</tr>
									</thead>
									<tbody style="align-items: center;justify-content: center; text-align: center ; text">
										@foreach ($customers as $customer)
											<tr>
												<td>{{$customer->id}}</td>
												<td>{{$customer->name}}</td>
												<td>{{$customer->address}}</td>
												<td>{{$customer->created_at}}</td>
												<td class="row row-xs wd-xl-80p">
														<button class="btn btn-outline-danger   col-sm-10 col-md-10 mg-t-10"><i class="mdi mdi-account-minus"></i>Delete Customer</button>
															<button class="btn btn-outline-dark   col-sm-10 col-md-10 mg-t-10"><i class="mdi mdi-account-edit"></i> Edit Customer</button>
														</td>
													</tr>	
													@endforeach
												</tbody>
											</table> 
											--}}
								{{-- <table class="table text-md-nowrap" id="example1">
									<thead>
										<tr>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">#</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Name</th>
											<th class="wd-20p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Address</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Start Date</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customers as $customer)
											<tr>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->id }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->name }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->address }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->created_at }}</td>
												<td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
													<button class="modal-effect btn btn-outline-dark" data-effect="effect-scale" data-toggle="modal" href="#modaldemo9" style="font-size: 14px;" >
														<i class="mdi mdi-account-edit"></i> Edit Customer
													</button>

													<button  class="btn btn-outline-danger" style="font-size: 14px;">
														<i class="mdi mdi-account-minus"></i> Delete Customer
													</button>

													<form action="{{route('customers.store')}}" method="PUT" class="modal" id="modaldemo9">
														@method('POST')
														@csrf
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content modal-content-demo">
																<div class="modal-header">
																	<h6 class="modal-title">Edit Customer Data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
																</div>
																<div class="modal-body">
																	<div class="card  box-shadow-0">
																		<div class="card-header">
																		</div>
																		<div class="card-body pt-0">
																			<form class="form-horizontal" >
																				<div class="form-group">
																				<input type="text" class="form-control" id="inputName" required placeholder="Name" name="name" value="{{$customer->name}}">
																				</div>
																				<div class="form-group">
																					<input type="text" class="form-control" id="inputEmail3" required placeholder="Address" name="address" value="{{$customer->address}}">
																				</div>
																				<div class="form-group mb-0 justify-content-end">
																				</div>
																				<div class="form-group mb-0 mt-3 justify-content-end">
																					<div>
											
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<a href="" class="btn ripple btn-primary" type="submit" style="color: #FFF">Edit Customer</a>
																	<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
																</div>
															</div>
														</div>
													</form>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table> --}}

								{{-- <table class="table text-md-nowrap" id="example1">
									<thead>
										<tr>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">#</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Name</th>
											<th class="wd-20p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Address</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Start Date</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customers as $customer)
											<tr>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->id }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->name }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->address }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->created_at }}</td>
												<td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
													<button class="btn btn-outline-dark" data-toggle="modal" href="#editModal{{ $customer->id }}" style="font-size: 14px;">
														<i class="mdi mdi-account-edit"></i> Edit Customer
													</button>
													<button class="btn btn-outline-danger" style="font-size: 14px;">
														<i class="mdi mdi-account-minus"></i> Delete Customer
													</button>
												</td>
											</tr>
								
											<!-- Edit Modal for Customer {{ $customer->id }} -->
											<div class="modal" id="editModal{{ $customer->id }}">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title">Edit Customer Data</h6>
															<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="card box-shadow-0">
																<div class="card-body pt-0">
																	<form class="form-horizontal" method="POST" action="{{ route('customers.update', $customer->id) }}">
																		@csrf
																		@method('PUT')
																		<div class="form-group">
																			<input type="text" class="form-control" required placeholder="Name" name="name" value="{{ $customer->name }}">
																		</div>
																		<div class="form-group">
																			<input type="text" class="form-control" required placeholder="Address" name="address" value="{{ $customer->address }}">
																		</div>
																		<div class="modal-footer">
																			<button class="btn ripple btn-primary" type="submit" style="color: #FFF">Edit Customer</button>
																			<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</tbody>
								</table> --}}
								
								{{-- <table class="table text-md-nowrap" id="example1">
									<thead>
										<tr>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">#</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Name</th>
											<th class="wd-20p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Address</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Start Date</th>
											<th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customers as $customer)
											<tr>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->id }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->name }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->address }}</td>
												<td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->created_at }}</td>
												<td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
													<button class="btn btn-outline-dark" data-toggle="modal" data-target="#editModal{{ $customer->id }}" 
														data-id="{{ $customer->id }}" data-name="{{ $customer->name }}" data-address="{{ $customer->address }}" 
														style="font-size: 14px;">
														<i class="mdi mdi-account-edit"></i> Edit Customer
													</button>
													<button class="btn btn-outline-danger" style="font-size: 14px;">
														<i class="mdi mdi-account-minus"></i> Delete Customer
													</button>
												</td>
											</tr>
								
											<!-- Edit Modal for Customer {{ $customer->id }} -->
											<div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Edit Customer Data</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form class="form-horizontal" method="POST" action="{{ route('customers.update', $customer->id) }}">
																@csrf
																@method('PUT')
																<div class="form-group">
																	<input type="hidden" id="customerId{{ $customer->id }}" value="{{ $customer->id }}">
																	<input type="text" class="form-control" id="customerName{{ $customer->id }}" required placeholder="Name" name="name" value="{{ $customer->name }}">
																</div>
																<div class="form-group">
																	<input type="text" class="form-control" id="customerAddress{{ $customer->id }}" required placeholder="Address" name="address" value="{{ $customer->address }}">
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary">Save changes</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</tbody>
								</table> --}}
								
<!-- Blade Template -->
<table class="table text-md-nowrap" id="example1">
    <thead>
        <tr>
            <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">#</th>
            <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Name</th>
            <th class="wd-20p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Address</th>
            <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Start Date</th>
            <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Phone Numbers</th>
            <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->id }}</td>
                <td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->name }}</td>
                <td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->address }}</td>
                <td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customer->created_at }}</td>
                <td style="text-align: center; vertical-align: middle; font-size: 16px;">
					@foreach($customer->customerphones as $phone)
						<p>{{ $phone->phone_number }}</p><br>
					@endforeach
				</td>

                <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                    <button class="btn btn-outline-dark" data-toggle="modal" data-target="#editModal{{ $customer->id }}" style="font-size: 14px;">
                        <i class="mdi mdi-account-edit"></i> Edit Customer
                    </button>
					<form action="{{route('customers.destroy',$customer->id)}}" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger" style="font-size: 14px;">
							<i class="mdi mdi-account-minus"></i> Delete Customer
						</button>
					</form>

                </td>
            </tr>

            <!-- Edit Modal for Customer {{ $customer->id }} -->
            {{-- <div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Customer Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="{{ route('customers.update', $customer->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control" required placeholder="Name" name="name" value="{{ $customer->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required placeholder="Address" name="address" value="{{ $customer->address }}">
                                </div> --}}






								{{-- <div class="form-group">
                                    <input type="text" class="form-control" required placeholder="Address" name="address" value="{{ $customer->address }}">
                                </div> --}}
								{{-- <div class="form-group " id="phonesEdit">
									@foreach ($customer->customerphones as $phone )
                                    	<input type="text" class="form-control" id="inputPhoneEdit1" required placeholder="Phone Number" name="phone_numbers[]" value="{{ $phone->phone_number }}">
									@endforeach
                                </div>
								<button type="button" class="btn btn-secondary" onclick="addPhoneFieldEdit()">Add Phone</button> --}}


								{{-- <div class="form-group" id="phonesEdit{{ $customer->id }}">
									@foreach ($customer->customerphones as $phone)
										<input type="text" class="form-control" id="inputPhoneEdit{{ $customer->id }}" required placeholder="Phone Number" name="phone_numbers[]" value="{{ $phone->phone_number }}">
										<button type="button" class="btn btn-danger" onclick="removePhoneFieldEdit({{ $customer->id }})">Add Phone</button>

										@endforeach
								</div> --}}
								{{-- <button type="button" class="btn btn-secondary" onclick="addPhoneFieldEdit({{ $customer->id }})">Add Phone</button> --}}


								{{-- <div class="form-group" id="phonesEdit{{ $customer->id }}">
									@foreach ($customer->customerphones as $index => $phone)
										<div class="phone-group" id="phoneGroup{{ $customer->id }}_{{ $index }}">
											<input type="text" class="form-control col-sm-6 col-md-6 mg-t-2" id="inputPhoneEdit{{ $customer->id }}_{{ $index }}" required placeholder="Phone Number" name="phone_numbers[]" value="{{ $phone->phone_number }}" style="display:inline-block">
											<button type="button" class="btn btn-danger" onclick="removePhoneFieldEdit({{ $customer->id }}, {{ $index }})">Delete</button>
										</div>
									@endforeach
								</div>
								<button type="button" class="btn btn-secondary" onclick="addPhoneFieldEdit({{ $customer->id }})">Add Phone</button>
								 --}}
								


								 {{-- <div class="form-group" id="phonesEdit{{ $customer->id }}">
									@foreach ($customer->customerphones as $index => $phone)
										<div class="phone-group" id="phoneGroup{{ $customer->id }}_{{ $index }}">
											<input type="text" class="form-control col-sm-6 col-md-6 mg-t-2" id="inputPhoneEdit{{ $customer->id }}_{{ $index }}" required placeholder="Phone Number" name="phone_numbers[]" value="{{ $phone->phone_number }}" style="display:inline-block">
											<button type="button" class="btn btn-danger" onclick="removePhoneFieldEdit({{ $customer->id }}, {{ $index }})">Delete</button>
										</div>
									@endforeach
								</div>
								<button type="button" class="btn btn-success" onclick="addPhoneFieldEdit({{ $customer->id }})">Add Phone Number</button>



								

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}


<!-- Edit Modal for Customer {{ $customer->id }} -->
<div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Customer Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" required placeholder="Name" name="name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" required placeholder="Address" name="address" value="{{ $customer->address }}">
                    </div>

                    <!-- Phone Numbers -->
                    <div class="form-group" id="phonesEdit{{ $customer->id }}">
                        @foreach ($customer->customerphones as $index => $phone)
                            <div class="phone-group" id="phoneGroup{{ $customer->id }}_{{ $index }}">
                                <input type="text" class="form-control col-sm-6 col-md-6 mg-t-2" id="inputPhoneEdit{{ $customer->id }}_{{ $index }}" required placeholder="Phone Number" name="phone_numbers[]" value="{{ $phone->phone_number }}" style="display:inline-block">
                                <button type="button" class="btn btn-danger" onclick="removePhoneFieldEdit({{ $customer->id }}, {{ $index }})">Delete</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success" onclick="addPhoneFieldEdit({{ $customer->id }})">Add Phone Number</button>
                    
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




        @endforeach
    </tbody>
</table>


							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<script>
    function addPhoneField() {
        var phoneCount = document.querySelectorAll('#phones input').length;
        var newPhoneDiv = document.createElement('div');
        newPhoneDiv.classList.add('form-group');
        var newPhoneInput = document.createElement('input');
        newPhoneInput.type = 'text';
        newPhoneInput.className = 'form-control ';
        newPhoneInput.id = 'inputPhone' + (phoneCount + 1);
        newPhoneInput.placeholder = 'Phone Number';
        newPhoneInput.name = 'phone_numbers[]';
        newPhoneDiv.appendChild(newPhoneInput);
        document.getElementById('phones').appendChild(newPhoneDiv);
    }
	// function addPhoneFieldEdit(customerId) {
    //     var phonesEdit = document.getElementById('phonesEdit' + customerId);
    //     console.log(phonesEdit); // This should not be null

    //     if (phonesEdit) {
    //         var phoneCount = phonesEdit.querySelectorAll('.phone-group').length;
    //         var newPhoneDiv = document.createElement('div');
    //         newPhoneDiv.classList.add('phone-group');
    //         newPhoneDiv.id = 'phoneGroup' + customerId + '_' + phoneCount;
    //         var newPhoneInput = document.createElement('input');
    //         newPhoneInput.type = 'text';
    //         newPhoneInput.className = 'form-control col-sm-6 col-md-6 mg-t-2';
	// 		newPhoneInput.style.display="inline-block";

    //         newPhoneInput.id = 'inputPhoneEdit' + customerId + '_' + (phoneCount + 1);
    //         newPhoneInput.placeholder = 'Phone Number';
    //         newPhoneInput.name = 'phone_numbers[]';
    //         var newPhoneDeleteButton = document.createElement('button');
    //         newPhoneDeleteButton.type = 'button';
    //         newPhoneDeleteButton.className = 'btn btn-danger';
	// 		newPhoneDeleteButton.style.display="inline-block";
    //         newPhoneDeleteButton.textContent = 'Delete';
    //         newPhoneDeleteButton.onclick = function() { removePhoneFieldEdit(customerId, phoneCount); };
    //         newPhoneDiv.appendChild(newPhoneInput);
    //         newPhoneDiv.appendChild(newPhoneDeleteButton);
    //         phonesEdit.appendChild(newPhoneDiv);
    //     } else {
    //         console.error("Element with ID 'phonesEdit" + customerId + "' not found");
    //     }
    // }
	

	function addPhoneFieldEdit(customerId) {
    var phonesEdit = document.getElementById('phonesEdit' + customerId);

    if (phonesEdit) {
        var phoneCount = phonesEdit.querySelectorAll('.phone-group').length;
        var newPhoneDiv = document.createElement('div');
        newPhoneDiv.classList.add('phone-group');
        newPhoneDiv.id = 'phoneGroup' + customerId + '_' + phoneCount;

        var newPhoneInput = document.createElement('input');
        newPhoneInput.type = 'text';
        newPhoneInput.className = 'form-control col-sm-6 col-md-6 mg-t-2';
        newPhoneInput.style.display = "inline-block";
        newPhoneInput.id = 'inputPhoneEdit' + customerId + '_' + phoneCount;
        newPhoneInput.placeholder = 'Phone Number';
        newPhoneInput.name = 'phone_numbers[]';

        var newPhoneDeleteButton = document.createElement('button');
        newPhoneDeleteButton.type = 'button';
        newPhoneDeleteButton.className = 'btn btn-danger';
        newPhoneDeleteButton.style.display = "inline-block";
        newPhoneDeleteButton.textContent = 'Delete';
        newPhoneDeleteButton.onclick = function() { removePhoneFieldEdit(customerId, phoneCount); };

        newPhoneDiv.appendChild(newPhoneInput);
        newPhoneDiv.appendChild(newPhoneDeleteButton);
        phonesEdit.appendChild(newPhoneDiv);
    } else {
        console.error("Element with ID 'phonesEdit" + customerId + "' not found");
    }
}


function removePhoneFieldEdit(customerId, index) {
	const phoneGroup = document.getElementById('phoneGroup' + customerId + '_' + index);
	phoneGroup.remove();
}

    function removePhoneFieldEdit(customerId, index) {
        var phoneGroup = document.getElementById('phoneGroup' + customerId + '_' + index);
        if (phoneGroup) {
            phoneGroup.remove();
        } else {
            console.error("Element with ID 'phoneGroup" + customerId + '_' + index + "' not found");
        }
    }

		document.addEventListener('DOMContentLoaded', function() {
        function submitPhoneForm(event) {
            event.preventDefault();
            document.getElementById('phoneForm').submit();
		}
        });
		</script>
		
@endsection
@section('js')

{{-- for forms --}}
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>



{{-- for data tables --}}
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

{{-- user scripts --}}
<script src="resources/userScripts/addInput.js"></script>



{{-- popup button --}}
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

@endsection