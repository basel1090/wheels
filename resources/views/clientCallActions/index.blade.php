@extends('metronic.index')

@section('title', 'Calls')
@section('subpageTitle', 'Calls')

@section('content')
    <!--begin::Content container-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                          rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-col-index="name" data-kt-Calls-table-filter="search"
                                   class="form-control datatable-input form-control-solid w-350px ps-14"
                                   placeholder="Search By Name, ID No., Mobile"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-Calls-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--begin::Calls 1-->
                            <!--end::Calls 1-->
                            <!--end::Filter-->

                            @include('clientCallActions._filter')

                            <a target="_blank" id="exportBtn" href="#"
                               data-export-url="{{ route('client_calls_actions.export') }}"
                               class="btn btn-primary me-3">
                                <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span
                                        class="path2"></span></i> Export
                            </a>


                            <!--begin::Add Calls-->
                            <a target="" id="AddCallsModal" href="#"
                               url_import="{{ route('client_calls_actions.updateCalls') }}"
                               class="btn btn-success me-3">
                                <i class="ki-duotone ki-phone fs-2 importCalls"><span class="path1"></span><span
                                        class="path2"></span></i> Import Calls
                            </a>

                            <a href="{{ route('client_calls_actions.create') }}" type="button"
                               class="btn btn-sm btn-success ml-3" id="">
                                <span class="indicator-label">
                                    <span class="m-0 svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                  d="M14 3V20H2V3C2 2.4 2.4 2 3 2H13C13.6 2 14 2.4 14 3ZM11 13V11C11 9.7 10.2 8.59995 9 8.19995V7C9 6.4 8.6 6 8 6C7.4 6 7 6.4 7 7V8.19995C5.8 8.59995 5 9.7 5 11V13C5 13.6 4.6 14 4 14V15C4 15.6 4.4 16 5 16H11C11.6 16 12 15.6 12 15V14C11.4 14 11 13.6 11 13Z"
                                                  fill="currentColor"/>
                                            <path
                                                d="M2 20H14V21C14 21.6 13.6 22 13 22H3C2.4 22 2 21.6 2 21V20ZM9 3V2H7V3C7 3.6 7.4 4 8 4C8.6 4 9 3.6 9 3ZM6.5 16C6.5 16.8 7.2 17.5 8 17.5C8.8 17.5 9.5 16.8 9.5 16H6.5ZM21.7 12C21.7 11.4 21.3 11 20.7 11H17.6C17 11 16.6 11.4 16.6 12C16.6 12.6 17 13 17.6 13H20.7C21.2 13 21.7 12.6 21.7 12ZM17 8C16.6 8 16.2 7.80002 16.1 7.40002C15.9 6.90002 16.1 6.29998 16.6 6.09998L19.1 5C19.6 4.8 20.2 5 20.4 5.5C20.6 6 20.4 6.60005 19.9 6.80005L17.4 7.90002C17.3 8.00002 17.1 8 17 8ZM19.5 19.1C19.4 19.1 19.2 19.1 19.1 19L16.6 17.9C16.1 17.7 15.9 17.1 16.1 16.6C16.3 16.1 16.9 15.9 17.4 16.1L19.9 17.2C20.4 17.4 20.6 18 20.4 18.5C20.2 18.9 19.9 19.1 19.5 19.1Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </span>
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </a>

                            <!--end::Add Calls-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_Calls" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">

                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Add task-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table table-bordered align-middle table-row-dashed fs-6 gy-5" id="kt_table_Calls">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="all">ID</th>
                            <th class="all">Call Date</th>
                            <th class="all">Duration</th>
                            <th class="all">Call Type</th>
                            <th class="all">Name</th>
                            <th class="all">Name Ar</th>
                            <th class="all">City</th>
                            <th class="all">Telephone</th>

                            <th class="all">Employee</th>
                            <th class="all">Action</th>
                            <th class="all">Notes</th>
                            <th class="all">Assign To</th>
                            <th class="all">Urgency</th>
                            <th class="all">Listen</th>
                            <th class="all">Status</th>
                            <th class="all">Actions</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Content container-->
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_Calls" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_AssignCall" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg ">

        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
@endsection


@push('scripts')
    <script>

        const columnDefs = [{
            data: 'id',
            name: 'id',
        },
            {
                data: {
                    _: 'created_at.display',
                    sort: 'created_at.timestamp',
                },
                name: 'created_at',
                searchable: false,
            },
            {
                data: 'duration',
                name: 'duration',
            },
            {
                data: 'caller.name',
                name: 'caller.name',
            },
            {
                data: 'client_name',
                name: 'client_name',

            },
            {
                data: 'client_name_ar',
                name: 'client_name_ar',

            },
            {
                data: 'city.name',
                name: 'city.name',

            },
            {
                data: 'telephone',
                name: 'telephone',

            },


            {
                data: 'employee.name',
                name: 'employee.name',
            },
            {
                data: 'call_option.name',
                name: 'call_option.name',
            },
            {
                data: 'notes',
                name: 'notes',
            },
            {
                data: 'assign.name',
                name: 'assign.name',
            },
            {
                data: 'urgency.name',
                name: 'urgency.name',
            },


            {
                data: 'listen',
                name: 'listen',

                nullable: true,
            },
            {
                data: 'statuss.name',
                name: 'statuss.name',
            },




            {
                data: 'action',
                name: 'action',
                className: 'text-end',
                orderable: false,
                searchable: false,
            }
        ];
        var datatable = createDataTable('#kt_table_Calls', columnDefs, "{{ route('client_calls_actions.index') }}", [
            [0, "DESC"]
        ]);
    </script>
    <script>
        const filterSearch = document.querySelector('[data-kt-Calls-table-filter="search"]');
        filterSearch.onkeydown = debounce(keyPressCallback, 400);

        function keyPressCallback() {
            datatable.columns(4).search(filterSearch.value).draw();
        }
    </script>


    <script>
        $(document).on('click', '.btnDeleteClientCallAction', function (e) {
            e.preventDefault();
            const URL = $(this).attr('href');
            const clientCallActionName = $(this).attr('data-clientCallAction-name');
            Swal.fire({
                text: "Are you sure you want to delete " + clientCallActionName + "?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: URL,
                        dataType: "json",
                        success: function (response) {
                            datatable.ajax.reload(null, false);
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        complete: function () {
                        },
                        error: function (response, textStatus,
                                         errorThrown) {
                            toastr.error(response
                                .responseJSON
                                .message);
                        },
                    });

                } else if (result.dismiss === 'cancel') {
                }

            });
        });
    </script>
    <script>
        $(document).on('click', '#AddCallsModal', function (e) {
            e.preventDefault();
            const URL = $(this).attr('url_import');
            Swal.fire({
                text: "Are you sure you want to import  Calls",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, import!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-success",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: URL,
                        dataType: "json",
                        success: function (data) {
                            datatable.ajax.reload(null, false);
                            for (let i = 0; i < data.length; i++) {
                                if (data[i]["call"] != null) {
                                    if (data[i]["new"] == "ANSWERED") {
                                        if (!open.includes(data[i]["call"]["id"])) {
                                            open.push(data[i]["call"]["id"]);
                                            if (data[i]["call"]["id"] != null)
                                                checknewCalls(data[i]["call"]["id"]);
                                        }

                                        console.log(open);
                                    }
                                }


                            }
                            Swal.fire({
                                text: "Calls import successfully!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        beforeSend: function () {
                            $('.importCalls').removeClass('ki-phone');
                            $('.importCalls').addClass('spinner-border text-ligh');
                        },
                        complete: function () {
                            $('.importCalls').addClass('ki-phone');
                            $('.importCalls').removeClass('spinner-border text-ligh');
                        },
                        error: function (response, textStatus,
                                         errorThrown) {
                            toastr.error(response
                                .responseJSON
                                .message);
                        },
                    });

                } else if (result.dismiss === 'cancel') {
                }

            });
        });

        function checknewCalls(id) {

            var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
            var URL = "https://hayat.developon.co/client_calls_actions/create?clientCallAction=" + id;
            var win = window.open(URL, "_blank").focus();
        }

    </script>
    <script>
        $(document).on('click', '#filterBtn', function (e) {
            e.preventDefault();
            datatable.ajax.reload();
        });

        $(document).on('click', '#resetFilterBtn', function (e) {
            e.preventDefault();
            $('#filter-form').trigger('reset');
            $('.datatable-input').each(function () {
                if ($(this).hasClass('filter-selectpicker')) {
                    $(this).val('');
                    $(this).trigger('change');
                }
                if ($(this).hasClass('flatpickr-input')) {
                    const fp = $(this)[0]._flatpickr;
                    fp.clear();
                }
            });
            datatable.ajax.reload();
        });

        $(document).on('click', '#exportBtn', function (e) {
            e.preventDefault();
            const url = $(this).data('export-url');
            const myUrlWithParams = new URL(url);

            const parameters = filterParameters();
            Object.keys(parameters).map((key) => {
                myUrlWithParams.searchParams.append(key, parameters[key]);
            });

            window.open(myUrlWithParams, "_blank");

        });
        const kt_modal_AssignCall = document.getElementById('kt_modal_AssignCall');
        const modal_kt_modal_AssignCall = new bootstrap.Modal(kt_modal_AssignCall);
        const validatorAssignCallFields = {};
        const RequiredInputListAssignCall = {
            'assign_employee': 'select',


        }


        $(document).on('click', '.btnAssign', function (e) {
            e.preventDefault();
            $(this).attr("data-kt-indicator", "on");
            var href = $(this).attr("href");
            globalRenderModal(
                href,
                $(this), '#kt_modal_AssignCall',
                modal_kt_modal_AssignCall,
                validatorAssignCallFields,
                '#kt_modal_AssignCall_form',
                datatable,
                '[data-kt-AssignCall-modal-action="submit"]', RequiredInputListAssignCall);
        });

    </script>
@endpush
