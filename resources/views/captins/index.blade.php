@extends('metronic.index')

@section('title', 'Captains')
@section('subpageTitle', 'Captains')

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
                            <input type="text" data-col-index="name_code"
                                   data-kt-captins-table-filter="search"
                                   class="form-control datatable-input form-control-solid w-250px ps-14"
                                   placeholder="Search Captins"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-captins-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--begin::captins 1-->
                            <!--end::captins 1-->
                            @include('captins._filter')


                            <a target="_blank" id="exportBtn" href="#"
                               data-export-url="{{ route('captins.export') }}" class="btn btn-primary me-3">
                                <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span
                                        class="path2"></span></i> Export
                            </a>
                            <!--end::Filter-->
                            <!--begin::Add captins-->
                            <a href="{{ route('captins.create') }}" class="btn btn-primary"
                               id="AddcaptinsModal">
                                <span class="indicator-label">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                  rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"/>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                  fill="currentColor"/>
                                        </svg>
                                    </span>
                                   {{__('Add Captain')}}
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </a>
                            <!--end::Add captins-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_captins" tabindex="-1" aria-hidden="true">
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
                    <table class="table table-bordered align-middle table-row-dashed fs-6 gy-5" id="kt_table_captins">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="all">{{__('SN')}}</th>
                            <th class="all">{{__('ID')}}</th>
                            <th class="all">{{__('ID Wheel')}}</th>
                            <th class="all">{{__('Name')}}</th>
                            <th class="all">{{__('Mobile')}}</th>
                            <th class="all">{{__('Assign City')}}</th>
                            <th class="all">{{__('Join Date')}}</th>
                            <th class="all">{{__('Vehicle Type')}}</th>
                            <th class="all">{{__('Has Insurance')}}</th>
                            <th class="all">{{__('insurance End Date')}}</th>
                            <th class="all">{{__('Commission %')}}</th>
                            <th class="all">{{__('Payment Due')}}</th>
                            <th class="all">{{__('Payment Type')}}</th>
                            <th class="all">{{__('Interested in health insurance')}}</th>
                            <th class="all">{{__('Interested in work insurance')}}</th>
                            <th class="all">{{__('Active')}}</th>
                            <th class="all">{{__('Shift')}}</th>
                            <th class="all">{{__('Orders')}}</th>
                            <th class="all">{{__('Commission from cash')}}</th>
                            <th class="all">{{__('Commission from visa')}}</th>
                            <th class="all">{{__('Paid to Captain')}}</th>
                            <th class="all">{{__('Net for payment')}}</th>
                            <th class="all">{{__('Actions')}}</th>
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

    <div class="modal fade" id="kt_modal_calls" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">

        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_shortMessages" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_add_attachment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_showCalls" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-xl ">

        </div>
        <!--end::Modal dialog-->
    </div>


    @include('calls.call_drawer')
    @include('calls.questionnaire_logs_drawer')

    @include('sms.sms_drawer')


@endsection


@push('scripts')

    <script>


        const columnDefs = [{
            data: 'id',
            name: 'id',
        },
            {
                data: 'captin_id',
                name: 'captin_id',
            },
            {
                data: 'id_wheel',
                name: 'id_wheel',
            },
            {
                data: 'name',
                name: 'name',
            },

            {
                data: 'mobile1',
                name: 'mobile1',
            },

            {
                data: 'city.name',
                name: 'city.name',
            },
            {
                data: 'join_date',
                name: 'join_date',
            },
            {
                data: 'vehicle.name',
                name: 'vehicle.name',
            },
            {
                data: 'has_insurance',
                name: 'has_insurance',
            },
            {
                data: 'policy_expire',
                name: 'policy_expire',
            },
            {
                data: 'total_commission',
                name: 'total_commission',
            },

            {
                data: 'payment_types.name',
                name: 'payment_types.name',
            },

            {
                data: 'payment_methods.name',
                name: 'payment_methods.name',
            },
            {
                data: 'intersted_in_work_insurance',
                name: 'intersted_in_work_insurance',
            },
            {
                data: 'intersted_in_health_insurance',
                name: 'intersted_in_health_insurance',
            },


            {
                data: 'active',
                name: 'active',

            },
            {
                data: 'shifts.name',
                name: 'shifts.name',
            },
            {
                data: 'total_orders',
                name: 'total_orders',
            },
            {
                data: 'total_commission_cash',
                name: 'total_commission_cash',
            },
            {
                data: 'total_commission_visa',
                name: 'total_commission_visa',
            },
            {
                data: 'paid',
                name: 'paid',
            },
            {
                data: 'net_paid',
                name: 'net_paid',
            },

            {
                data: 'action',
                name: 'action',
                className: 'text-end',
                orderable: false,
                searchable: false
            }
        ];
        var datatable = createDataTable('#kt_table_captins', columnDefs, "{{ route('captins.index') }}", [
            [0, "ASC"]
        ]);
        datatable.on('draw', function () {
            KTMenu.createInstances();
        });
        datatable.on('responsive-display', function () {
            KTMenu.createInstances();
        });
    </script>
    <script>
        const filterSearch = document.querySelector('[data-kt-captins-table-filter="search"]');
        filterSearch.onkeydown = debounce(keyPressCallback, 400);

        function keyPressCallback() {
            datatable.columns(3).search(filterSearch.value).draw();
        }
    </script>
    @include('calls.scripts')
    @include('sms.scripts')

    <script>

        var captin_calls_card = document.querySelector(".captin_calls_card");
        var blockUI_captin_calls_card = new KTBlockUI(captin_calls_card, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Please wait...</div>',
        });

        var captin_calls_questionnaire_logs_card = document.querySelector(".captin_calls_questionnaire_logs_card");
        var blockUI_captin_calls_questionnaire_logs_card = new KTBlockUI(captin_calls_questionnaire_logs_card, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Please wait...</div>',
        });


        $(document).on('click', '.btnDeletecaptin', function (e) {
            e.preventDefault();
            const URL = $(this).attr('href');
            const captinName = $(this).attr('data-captin-name');
            Swal.fire({
                html: "Are you sure you want to delete " + captinName + "?",
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

        const kt_modal_showCalls = document.getElementById('kt_modal_showCalls');
        const modal_kt_modal_showCalls = new bootstrap.Modal(kt_modal_showCalls);

        $(document).on('click', '.viewCalls', function (e) {

            e.preventDefault();
            $(this).attr("data-kt-indicator", "on");
            var href= $(this).attr("href");
            renderModal(
                href,
                $(this), '#kt_modal_showCalls',
                modal_kt_modal_showCalls);
        });

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

    </script>



    <script>


        function refreshCaptinCalls(url) {
            $(captin_calls_card).find('.card-body').html('');

            blockUI_captin_calls_card.block();

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $(captin_calls_card).find('.card-title span').text(response
                        .captinName);
                    $(captin_calls_card).find('.card-body').html(response.drawerView);

                },
                complete: function () {
                    blockUI_captin_calls_card.release();
                }

            });

        }

        $(document).ready(function () {
            $(document).on('click', '.showCalls', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                var drawerElement = document.querySelector("#kt_drawer_showCalls");
                var drawer = KTDrawer.getInstance(drawerElement);
                drawer.show();
                refreshCaptinCalls(url);
            });
        });
    </script>
    <script>
        var captin_reigster_history_card = document.querySelector(".captin_reigster_history_card");
        var blockUI_captin_reigster_history_card = new KTBlockUI(captin_reigster_history_card, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Please wait...</div>',
        });

        function refreshRegisterHistoryTable(url) {


            $(captin_reigster_history_card).find('.card-body').html('');

            blockUI_captin_reigster_history_card.block();

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    $(captin_reigster_history_card).find('.card-title span').text(response
                        .captinName);
                    $(captin_reigster_history_card).find('.card-body').html(response
                        .drawerView);
                    $(captin_reigster_history_card).attr('data-url', url);
                },
                complete: function () {
                    blockUI_captin_reigster_history_card.release();
                }
            });
        }

        $(function () {
            $(document).on('click', '.showRegisterHistory', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                var drawerElement = document.querySelector("#kt_drawer_register_history");
                var drawer = KTDrawer.getInstance(drawerElement);
                drawer.show();
                refreshRegisterHistoryTable(url);
            });
            $(document).on('click', '.btnShowQuestionnaireLog', function (e) {
                e.preventDefault();
                $button = $(this);
                const url = $(this).attr('href');
                $(this).attr("disabled", "disabled");

                $(captin_calls_questionnaire_logs_card).find('.card-body').html('');
                blockUI_captin_calls_questionnaire_logs_card.block();

                var drawerQuestionnaireElement = document.querySelector(
                    "#kt_drawer_questionnaireLogs");
                var drawerQ = KTDrawer.getInstance(
                    drawerQuestionnaireElement);
                drawerQ.show();


                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function (response) {
                        $(captin_calls_questionnaire_logs_card).find(
                            '.card-title span').text(response
                            .captinName);
                        $(captin_calls_questionnaire_logs_card)
                            .find('.card-body').html(response
                            .drawerView);

                    },
                    complete: function () {
                        blockUI_captin_calls_questionnaire_logs_card
                            .release();
                        setTimeout(
                            '$button.removeAttr("disabled")',
                            1500);
                    }
                });

            });
        });
    </script>



    <script>
        var captin_smses_card = document.querySelector(".captin_smses_card");
        var blockUI_captin_smses_card = new KTBlockUI(captin_smses_card, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Please wait...</div>',
        });
        $(document).ready(function () {
            $(document).on('click', '.showSms', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                var drawerElement = document.querySelector("#kt_drawer_showSms");
                var drawer = KTDrawer.getInstance(drawerElement);
                drawer.show();

                $(captin_smses_card).find('.card-body').html('');

                blockUI_captin_smses_card.block();

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $(captin_smses_card).find('.card-title span').text(response
                            .captinName);
                        $(captin_smses_card).find('.card-body').html(response.drawerView);
                        blockUI_captin_smses_card.release();
                    },
                    complete: function () {
                        // blockUI.release();
                    }

                });

            });
        });
    </script>

    <script>
        var captin_call_sms_logs = document.querySelector(".captin_call_sms_logs");
        var blockUI_captin_call_sms_logs = new KTBlockUI(captin_call_sms_logs, {
            message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Please wait...</div>',
        });
        $(document).ready(function () {
            $(document).on('click', '.ShowCaptinCallsSmsLogs', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                var drawerElement = document.querySelector("#kt_drawer_captin_call_sms_logs");
                var drawer = KTDrawer.getInstance(drawerElement);
                drawer.show();

                $(captin_call_sms_logs).find('.card-body').html('');

                blockUI_captin_call_sms_logs.block();

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $(captin_call_sms_logs).find('.card-title span').text(response
                            .captinName);
                        $(captin_call_sms_logs).find('.card-body').html(response.drawerView);
                    },
                    complete: function () {
                        blockUI_captin_call_sms_logs.release();
                        // blockUI.release();
                    }

                });

            });
        });
    </script>






@endpush
