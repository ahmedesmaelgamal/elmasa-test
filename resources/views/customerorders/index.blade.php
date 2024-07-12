@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Orders</h4>
                {{-- <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span> --}}
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-sm-6 col-md-4 col-xl-3">
        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
            href="#modaldemo8">
            <i class="mdi mdi-account-plus"></i> Add an order
        </a>
    </div>

    <form action="{{ route('customerorders.store') }}" method="PUT" class="modal" id="modaldemo8">
        @method('POST')
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Order</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card  box-shadow-0">
                        <div class="card-header">
                            <p class="mb-2">Please order data</p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group">
                                <label for="customer_id">status</label>
                                {{-- status --}}
                                <select name="customer_order_status_id" id="customer_order_status_id" class="form-control">
                                    @foreach ($customerorderstatuses as $customerorderstatus)
                                        <option value="{{ $customerorderstatus->id }}"
                                            {{ $customerorderstatus->status ? 'selected' : '' }}>
                                            {{ $customerorderstatus->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- customer --}}
                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $customer->name ? 'selected' : '' }}>
                                            {{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- stock --}}
                            <div class="form-group">
                                <label for="stock_id">Stock</label>
                                <select name="stock_id" id="stock_id" class="form-control">
                                    @foreach ($stocks as $stock)
                                        <option value="{{ $stock->id }}" {{ $stock->product_name ? 'selected' : '' }}>
                                            {{ $stock->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- delivery man --}}
                            <div class="form-group">
                                <label for="delivery_man_id">delivery man</label>
                                <select name="delivery_man_id" id="delivery_man_id" class="form-control">
                                    @foreach ($deliverymen as $deliveryman)
                                        <option value="{{ $deliveryman->id }}" {{ $deliveryman->name ? 'selected' : '' }}>
                                            {{ $deliveryman->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn ripple btn-primary" type="submit" value="Add an order">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </form>

    <table class="table text-md-nowrap" id="example1">
        <thead>
            <tr>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">#
                </th>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    customer</th>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    stock</th>
                <th class="wd-20p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    delivery man</th>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    order status</th>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    Start Date</th>
                <th class="wd-15p border-bottom-0" style="text-align: center; vertical-align: middle; font-size: 16px;">
                    operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerorders as $customerorder)
                <tr>
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">{{ $customerorder->id }}</td>
                    
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                        {{-- {{ $customerorder->customer->name  }} --}}
                        {{$customerorder->customer->name}}
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                        {{ $customerorder->stock->product_name }}
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                        {{ $customerorder->deliveryman->name }}
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                        {{ $customerorder->customerorderstatus->status }}
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                        {{ $customerorder->created_at }}
                    </td>
                    <td style="display: flex; justify-content: center; align-items: center; gap: 14px;">
                        <button class="btn btn-outline-dark" data-toggle="modal"
                        data-target="#editModal{{ $customerorder->id }}" style="font-size: 14px;">
                        <i class="mdi mdi-account-edit"></i> Edit Order
                    </button>
                        <form action="{{ route('customerorders.destroy', $customerorder->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger" style="font-size: 14px;">
                                <i class="mdi mdi-account-minus"></i> Delete Order
                            </button>
                        </form>

                    </td>
                </tr>


                <!-- Edit Modal for customerorder {{ $customerorder->id }} -->
                <div class="modal fade" id="editModal{{ $customerorder->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('customerorders.update', $customerorder->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="customer_id">status</label>
                                        {{-- status --}}
                                        <select name="customer_order_status_id" id="customer_order_status_id"
                                            class="form-control">
                                            @foreach ($customerorderstatuses as $customerorderstatus)
                                                <option value="{{ $customerorderstatus->id }}"
                                                    {{ $customerorderstatus->status ? 'selected' : '' }}>
                                                    {{ $customerorderstatus->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- customer --}}
                                    <div class="form-group">
                                        <label for="customer_id">Customer</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    {{ $customer->name ? 'selected' : '' }}>
                                                    {{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- stock --}}
                                    <div class="form-group">
                                        <label for="stock_id">Stock</label>
                                        <select name="stock_id" id="stock_id" class="form-control">
                                            @foreach ($stocks as $stock)
                                                <option value="{{ $stock->id }}"
                                                    {{ $stock->product_name ? 'selected' : '' }}>
                                                    {{ $stock->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- delivery man --}}
                                    <div class="form-group">
                                        <label for="delivery_man_id">delivery man</label>
                                        <select name="delivery_man_id" id="delivery_man_id" class="form-control">
                                            @foreach ($deliverymen as $deliveryman)
                                                <option value="{{ $deliveryman->id }}"
                                                    {{ $deliveryman->name ? 'selected' : '' }}>
                                                    {{ $deliveryman->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save
                                            changes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection


@section('js')
    {{-- for forms --}}
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>



    {{-- for data tables --}}
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    {{-- user scripts --}}
    <script src="resources/userScripts/addInput.js"></script>



    {{-- popup button --}}
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
