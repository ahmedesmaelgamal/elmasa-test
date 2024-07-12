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
                <h4 class="content-title mb-0 my-auto">Traders</h4>
                {{-- <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span> --}}
            </div>
        </div>

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

                </div>
                <br>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-3">
                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                    href="#modaldemo8">
                    <i class="mdi mdi-account-plus"></i> Add a trader
                </a>
            </div>
            <form action="{{ route('traders.store') }}" method="PUT" class="modal" id="modaldemo8">
                @method('POST')
                @csrf
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Create New Trader</h6>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card  box-shadow-0">
                                <div class="card-header">
                                    <p class="mb-2">Please enter trader data</p>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputName" required
                                            placeholder="Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputAddress" required
                                            placeholder="Address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputJobName" required
                                            placeholder="job_name" name="job_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="trader_status_id">trader status</label>
                                        <select name="trader_status_id" id="trader_status_id" class="form-control">
                                            @foreach ($traderstatuses as $traderstatus)
                                                <option value="{{ $traderstatus->id }}"
                                                    {{ $traderstatus->status ? 'selected' : '' }}>
                                                    {{ $traderstatus->status }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div id="phones">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputPhone1" required
                                                placeholder="Phone Number" name="phone_numbers[]">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addPhoneField()">Add
                                        Phone</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn ripple btn-primary" type="submit" value="Create trader">
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </div>
                </div>
            </form>



            {{-- </form> --}}

            <!-- End Modal effects-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">#</th>
                                <th class="wd-15p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Name</th>
                                <th class="wd-20p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Address</th>
                                <th class="wd-20p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Job Name</th>
                                <th class="wd-20p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">trader status</th>
                                <th class="wd-15p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Start Date</th>
                                <th class="wd-15p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Phone Numbers</th>
                                <th class="wd-15p border-bottom-0"
                                    style="text-align: center; vertical-align: middle; font-size: 16px;">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traders as $trader)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{ $trader->id }}</td>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{ $trader->name }}</td>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{ $trader->address }}</td>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{ $trader->job_name }}</td>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{-- {{ $trader->traderstatus ? $trader->traderstatus->status : 'No Status' }}  
                                                                      </td> --}}
                                        {{ $trader->traderstatus->status }}
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        {{ $trader->created_at }}</td>
                                    <td style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        @foreach ($trader->traderphones as $phone)
                                            <p>{{ $phone->phone_number }}</p><br>
                                        @endforeach
                                    </td>

                                    <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                        <button class="btn btn-outline-dark" data-toggle="modal"
                                            data-target="#editModal{{ $trader->id }}" style="font-size: 14px;">
                                            <i class="mdi mdi-account-edit"></i> Edit Trader
                                        </button>
                                        <form action="{{ route('traders.destroy', $trader->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger" style="font-size: 14px;">
                                                <i class="mdi mdi-account-minus"></i> Delete Trader
                                            </button>
                                        </form>

                                    </td>
                                </tr>


                                <!-- Edit Modal for trader {{ $trader->id }} -->
                                <div class="modal fade" id="editModal{{ $trader->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Trader Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST"
                                                    action="{{ route('traders.update', $trader->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required
                                                            placeholder="Name" name="name"
                                                            value="{{ $trader->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required
                                                            placeholder="Address" name="address"
                                                            value="{{ $trader->address }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required
                                                            placeholder="Job Name" name="job_name"
                                                            value="{{ $trader->job_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="trader_status_id">trader status</label>
                                                        <select name="trader_status_id" id="trader_status_id"
                                                            class="form-control">
                                                            @foreach ($traderstatuses as $traderstatus)
                                                                <option value="{{ $traderstatus->id }}"
                                                                    {{ $traderstatus->status ? 'selected' : '' }}>
                                                                    {{ $traderstatus->status }}</option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                    <!-- Phone Numbers -->
                                                    <div class="form-group" id="phonesEdit{{ $trader->id }}">
                                                        @foreach ($trader->traderphones as $index => $phone)
                                                            <div class="phone-group"
                                                                id="phoneGroup{{ $trader->id }}_{{ $index }}">
                                                                <input type="text"
                                                                    class="form-control col-sm-6 col-md-6 mg-t-2"
                                                                    id="inputPhoneEdit{{ $trader->id }}_{{ $index }}"
                                                                    required placeholder="Phone Number"
                                                                    name="phone_numbers[]"
                                                                    value="{{ $phone->phone_number }}"
                                                                    style="display:inline-block">
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="removePhoneFieldEdit({{ $trader->id }}, {{ $index }})">Delete</button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addPhoneFieldEdit({{ $trader->id }})">Add Phone
                                                        Number</button>

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



        function addPhoneFieldEdit(traderId) {
            var phonesEdit = document.getElementById('phonesEdit' + traderId);

            if (phonesEdit) {
                var phoneCount = phonesEdit.querySelectorAll('.phone-group').length;
                var newPhoneDiv = document.createElement('div');
                newPhoneDiv.classList.add('phone-group');
                newPhoneDiv.id = 'phoneGroup' + traderId + '_' + phoneCount;

                var newPhoneInput = document.createElement('input');
                newPhoneInput.type = 'text';
                newPhoneInput.className = 'form-control col-sm-6 col-md-6 mg-t-2';
                newPhoneInput.style.display = "inline-block";
                newPhoneInput.id = 'inputPhoneEdit' + traderId + '_' + phoneCount;
                newPhoneInput.placeholder = 'Phone Number';
                newPhoneInput.name = 'phone_numbers[]';

                var newPhoneDeleteButton = document.createElement('button');
                newPhoneDeleteButton.type = 'button';
                newPhoneDeleteButton.className = 'btn btn-danger';
                newPhoneDeleteButton.style.display = "inline-block";
                newPhoneDeleteButton.textContent = 'Delete';
                newPhoneDeleteButton.onclick = function() {
                    removePhoneFieldEdit(traderId, phoneCount);
                };

                newPhoneDiv.appendChild(newPhoneInput);
                newPhoneDiv.appendChild(newPhoneDeleteButton);
                phonesEdit.appendChild(newPhoneDiv);
            } else {
                console.error("Element with ID 'phonesEdit" + traderId + "' not found");
            }
        }


        function removePhoneFieldEdit(traderId, index) {
            const phoneGroup = document.getElementById('phoneGroup' + traderId + '_' + index);
            phoneGroup.remove();
        }

        function removePhoneFieldEdit(traderId, index) {
            var phoneGroup = document.getElementById('phoneGroup' + traderId + '_' + index);
            if (phoneGroup) {
                phoneGroup.remove();
            } else {
                console.error("Element with ID 'phoneGroup" + traderId + '_' + index + "' not found");
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
