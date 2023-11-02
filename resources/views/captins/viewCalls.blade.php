<div class="modal-content">
    <!--begin::Modal header-->
    <div class="modal-header" id="kt_modal_showCalls_header">
        <!--begin::Modal preparation_time-->
        <h2 class="fw-bold">{{ __('View Calls') }}</h2>
        <!--end::Modal preparation_time-->
        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
            <span class="svg-icon svg-icon-1">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                            transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                      <rect x="7.41422" y="6" width="16" height="2" rx="1"
                            transform="rotate(45 7.41422 6)" fill="currentColor"/>
                  </svg>
              </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body scroll-y ">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-success mb-8">Telephone:{{$captin->mobile1}}</h4>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="text-primary" >Outgoing Calls</h4>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped table-bordered table-hover  order-column" id="">
                                    <thead>
                                    <tr>
                                        <th class="bold">ID</th>
                                        <th class="bold">Date</th>
                                        <th class="bold">Source</th>
                                        <th class="bold">Destination</th>
                                        <th class="bold">Call Type</th>
                                        <th class="bold">Status</th>
                                        <th class="bold">Duration (Sec)</th>
                                        <th class="bold">Listen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=1 @endphp
                                    @foreach ($outcome as $e)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $e->date }}</td>
                                            <td>{{ $e->from }}</td>
                                            <td>{{ $e->to }}</td>
                                            <td>{{ $e->call_type }}</td>
                                            <td>{{ $e->disposition }}</td>
                                            <td>{{ $e->duration }}</td>
                                            <td>
                                                @if ($e->record_file_name)
                                                    <a href="/records/{{ $e->record_file_name }}" target="_blank"
                                                       class="listen">Listen</a>
                                                @endif

                                            </td>
                                        </tr>
                                        @php $count++ @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="text-primary">Incoming Calls</h4>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped table-bordered table-hover  order-column" id="">
                                    <thead>
                                    <tr>
                                        <th class="bold">ID</th>
                                        <th class="bold">Date</th>
                                        <th class="bold">Source</th>
                                        <th class="bold">Destination</th>
                                        <th class="bold">Call Type</th>
                                        <th class="bold">Status</th>
                                        <th class="bold">Duration (Sec)</th>
                                        <th class="bold">Listen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=1 @endphp
                                    @foreach ($outcome as $e)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $e->date }}</td>
                                            <td>{{ $e->from }}</td>
                                            <td>{{ $e->to }}</td>
                                            <td>{{ $e->call_type }}</td>
                                            <td>{{ $e->disposition }}</td>
                                            <td>{{ $e->duration }}</td>
                                            <td>
                                                @if ($e->record_file_name)
                                                    <a href="/records/{{ $e->record_file_name }}" target="_blank"
                                                       class="listen">Listen</a>
                                                @endif

                                            </td>
                                        </tr>
                                        @php $count++ @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <h4 class="text-primary" >SMS Messages</h4>
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped table-bordered table-hover  order-column" id="">
                                    <thead>
                                    <tr>
                                        <th class="bold">Date</th>
                                        <th class="bold">Sender</th>
                                        <th class="bold">Module</th>
                                        <th class="bold">Text</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=1 @endphp
                                    @foreach ($sms as $s)

                                        <tr>
                                            <td>
                                                <small>{{ date('Y-m-d h:i:s', strtotime($s->created_at)) }}</small>
                                            </td>
                                            <td>
                                                <span>{{ $s->gateway }}</span>
                                            </td>
                                            <td>
                                        <span><a
                                                href="/{{ $s->module }}/edit/{{ $s->module_id }}">{{ $s->module }}</a></span>
                                            </td>
                                            <td>

                                                <span class="text-danger text-right ">{{ $s->message }}</span>

                                            </td>


                                        </tr>
                                        @php $count++ @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="text-center pt-15">
            <button type="reset" class="btn btn-light me-3" data-kt-branchs-modal-action="cancel"
                    data-bs-dismiss="modal">{{ __('Discard') }}
            </button>

        </div>
        <!--end::Actions-->


        <!--end::Form-->
    </div>
    <!--end::Modal body-->
</div>



