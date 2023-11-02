@extends('metronic.index')

@section('title', 'Restaurants')
@section('subpageTitle', 'Restaurants')

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
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-col-index="name_code"
                                data-kt-restaurants-table-filter="search"
                                class="form-control datatable-input form-control-solid w-250px ps-14"
                                placeholder="Search Restaurants" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-restaurants-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--begin::restaurants 1-->
                            <!--end::restaurants 1-->
                            @include('restaurants._filter')


                            <a target="_blank" id="exportBtn" href="#"
                                data-export-url="{{ route('restaurants.export') }}" class="btn btn-primary me-3">
                                <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span
                                        class="path2"></span></i> Export
                            </a>
                            <!--end::Filter-->
                            <!--begin::Add restaurants-->
                            <a href="{{ route('restaurants.create') }}" class="btn btn-primary"
                                id="AddrestaurantsModal">
                                <span class="indicator-label">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    Add Restaurant
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </a>
                            <!--end::Add restaurants-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Modal - Add task-->
                        <div class="modal fade" id="kt_modal_add_restaurants" tabindex="-1" aria-hidden="true">
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
                    <table class="table table-bordered align-middle table-row-dashed fs-6 gy-5" id="kt_table_restaurants">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="all">{{__('SN')}}</th>
                            <th class="all">{{__('Restaurant ID')}}</th>
                            <th class="all">{{__('Restaurant Wheels ID')}}</th>
                            <th class="all">{{__('Name')}}</th>
                            <th class="all">{{__('Name')}}</th>
                            <th class="all">{{__('Type')}}</th>
                            <th class="all">{{__('Telephone')}}</th>
                            <th class="all">{{__('City')}}</th>
                            <th class="all">{{__('Join Date')}}</th>
                            <th class="all">{{__('Has Now')}}</th>
                            <th class="all">{{__('Has Bot')}}</th>
                            <th class="all">{{__('Has B2B')}}</th>
                            <th class="all">{{__('Has POS')}}</th>
                            <th class="all">{{__('Has Marketing')}}</th>
                            <th class="all">{{__('Menu Items')}}</th>
                            <th class="all">{{__('Employees')}}</th>
                            <th class="all">{{__('Branches')}}</th>

                            <th class="all">{{__('Commission Cash %')}}</th>
                            <th class="all">{{__('Commission Visa $')}}</th>
                            <th class="all">{{__('Sales Visa $')}}</th>
                            <th class="all">{{__('Sales Commission $')}}</th>
                            <th class="all">{{__('Paid to Restaurant')}}</th>
                            <th class="all">{{__('Net For Payemnt')}}</th>
                            <th class="all">{{__('Active')}}</th>
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
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_restaurants" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen">

        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_changeStatus" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered ">

        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_patientConfirm" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered ">

        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="kt_modal_showCalls" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg ">

        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="kt_modal_add_employee" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered ">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_add_menuItem" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered ">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_add_branch" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered ">

        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_add_attachment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-lg modal-dialog-centered">

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
                data: 'restaurant_id',
                name: 'restaurant_id',
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
                data: 'name_ar',
                name: 'name_ar',
            },

            {
                data: 'type.name',
                name: 'type.name',
            },

            {
                data: 'telephone',
                name: 'telephone',
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
                data: 'has_wheels_now',
                name: 'has_wheels_now',

            },
            {
                data: 'has_wheels_bot',
                name: 'has_wheels_bot',

            },
            {
                data: 'has_wheels_b2b',
                name: 'has_wheels_b2b',

            },
            {
                data: 'has_pos',
                name: 'has_pos',

            },
            {
                data: 'has_marketing',
                name: 'has_marketing',

            },
            {
                data: 'items_count',
                name: 'items_count',

            },


            {
                data: 'employees_count',
                name: 'employees_count',

            },
            {
                data: 'branches_count',
                name: 'branches_count',

            },

            {
                data: 'commission_cash',
                name: 'commission_cash',

            },
            {
                data: 'commission_visa',
                name: 'commission_visa',

            },

            {
                data: 'total_sales_cash',
                name: 'total_sales_cash',

            },
            {
                data: 'total_sales_visa',
                name: 'total_sales_visa',

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
                data: 'active',
                name: 'active',

            },


            {
                data: 'action',
                name: 'action',
                className: 'text-end',
                orderable: false,
                searchable: false
            }
        ];
        var datatable = createDataTable('#kt_table_restaurants', columnDefs, "{{ route('restaurants.index') }}", [
            [0, "DESC"]
        ]);
        datatable.on('draw', function () {
            KTMenu.createInstances();
        });
        datatable.on('responsive-display', function () {
            KTMenu.createInstances();
        });
    </script>
    <script>
        const filterSearch = document.querySelector('[data-kt-restaurants-table-filter="search"]');
        filterSearch.onkeydown = debounce(keyPressCallback, 400);

        function keyPressCallback() {
            datatable.columns(1).search(filterSearch.value).draw();
        }
    </script>


    <script>
        function renderModal(url, button, modalId, modalBootstrap) {


            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    $(modalId).find('.modal-dialog').html(response.callsView);
                    modalBootstrap.show();
                    KTScroll.createInstances();
                    KTImageInput.createInstances();
                },
                complete: function () {
                    if (button) {
                        button.removeAttr('data-kt-indicator');
                    }
                }
            });
        }

        const validatorChangeStatusFields = {};
        const RequiredInputListRestaurantChnageStatus = {
        }
        const kt_modal_changeStatus = document.getElementById('kt_modal_changeStatus');
        const modal_kt_changeStatus = new bootstrap.Modal(kt_modal_changeStatus);

        $(document).on('click', '.btnChangeStatus', function(e) {
            e.preventDefault();
            const changeStatusUrl = $(this).attr('href');
            globalRenderModal(
                changeStatusUrl,
                $(this), '#kt_modal_changeStatus',
                modal_kt_changeStatus,
                validatorChangeStatusFields,
                '#kt_modal_changeStatus_form',
                datatable,
                '[data-kt-changeStatus-modal-action="submit"]', RequiredInputListRestaurantChnageStatus);
        });

        const validatorChangePatientConfirmFields = {};
        const RequiredInputListPatientConfirmStatus = {
            'patient_confirm': 'select',
        }
        const kt_modal_patientConfirm = document.getElementById('kt_modal_patientConfirm');
        const modal_kt_patientConfirm = new bootstrap.Modal(kt_modal_patientConfirm);

        $(document).on('click', '.btnChangePatientConfirm', function(e) {
            e.preventDefault();
            const changePatientConfirmUrl = $(this).attr('href');
            globalRenderModal(
                changePatientConfirmUrl,
                $(this), '#kt_modal_patientConfirm',
                modal_kt_patientConfirm,
                validatorChangePatientConfirmFields,
                '#kt_modal_patientConfirm_form',
                datatable,
                '[data-kt-patientConfirm-modal-action="submit"]', RequiredInputListPatientConfirmStatus);
        });


        $(document).on('click', '.btnDeleterestaurant', function(e) {
            e.preventDefault();
            const URL = $(this).attr('href');
            const restaurantName = $(this).attr('data-restaurant-name');
            Swal.fire({
                html: "Are you sure you want to delete " + restaurantName + "?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: URL,
                        dataType: "json",
                        success: function(response) {
                            datatable.ajax.reload(null, false);
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        complete: function() {},
                        error: function(response, textStatus,
                            errorThrown) {
                            toastr.error(response
                                .responseJSON
                                .message);
                        },
                    });

                } else if (result.dismiss === 'cancel') {}

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
        $(document).on('click', '#filterBtn', function(e) {
            e.preventDefault();
            datatable.ajax.reload();
        });

        $(document).on('click', '#resetFilterBtn', function(e) {
            e.preventDefault();
            $('#filter-form').trigger('reset');
            $('.datatable-input').each(function() {
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

        $(document).on('click', '#exportBtn', function(e) {
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

@endpush
