@extends('metronic.index')


@section('title', 'Captain-' . 'Add new captin')
@section('subpageTitle', 'Captain')
@section('subpageName', 'Add new captin')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
            <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span
                    class="path2"></span></i>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-danger">Something went wrong!</h4>
                <span>Please check your inputs, the error messages are :.</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success d-flex align-items-center p-5">
            <span class="svg-icon svg-icon-2hx svg-icon-success me-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                          fill="currentColor"/>
                    <path
                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                        fill="currentColor"/>
                </svg>
            </span>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-success"> {{ session('status') }}</h4>
            </div>
        </div>
    @endif
    <!--begin::Content container-->
    <div class="card mb-5 mb-xl-5" id="kt_captin_form_tabs">
        <div class="card-body pt-0 pb-0">
            <div class="d-flex flex-column flex-lg-row justify-content-between">
                <!--begin::Navs-->
                <ul id="myTab"
                    class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold order-lg-1 order-2">

                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5 active" data-bs-toggle="tab"
                           data-bs-target="#kt_tab_pane_1" href="#kt_tab_pane_1">
                            <span class="svg-icon svg-icon-2 me-2">

                            </span>
                            {{__('Captain')}}
                        </a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5" data-bs-toggle="tab"
                           data-bs-target="#kt_tab_pane_8" href="#kt_tab_pane_8">
                            <span class="svg-icon svg-icon-2 me-2">

                            </span>
                            {{__('Bank')}}
                        </a>
                    </li>

                    <li class="nav-item mt-2" id="tab2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5" data-bs-toggle="tab"
                           data-bs-target="#kt_tab_pane_2" href="#kt_tab_pane_2">
                            <span class="svg-icon svg-icon-2 me-2">
                            </span>
                            {{__('Vehicle')}} </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5" data-bs-toggle="tab"
                           data-bs-target="#kt_tab_pane_3" href="#kt_tab_pane_3">
                            <span class="svg-icon svg-icon-2 me-2">
                            </span>
                            {{__('Reference')}} </a>
                    </li>
                    <li class="nav-item mt-2 {{ isset($captin) && $captin->has_insurance ? '' : 'd-none' }}" id="tab3">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5" data-bs-toggle="tab"
                           data-bs-target="#kt_tab_pane_4" href="#kt_tab_pane_4">
                            <span class="svg-icon svg-icon-2 me-2">
                            </span>
                            {{__('Insurance')}} </a>
                    </li>

                    <!--end::Nav item-->
                    <!--begin::Nav item-->


                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5 {{ isset($captin) ? '' : 'disabled' }}"
                           data-bs-toggle="tab" data-bs-target="#kt_tab_pane_7" href="#kt_tab_pane_7">
                            <span class="svg-icon svg-icon-2 me-2">
                            </span>
                            Attachments </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-6 px-2 py-5 {{ isset($captin) ? '' : 'disabled' }}"
                           data-bs-toggle="tab" data-bs-target="#kt_tab_pane_8" href="#kt_tab_pane_8">
                            <span class="svg-icon svg-icon-2 me-2">
                            </span>
                            History </a>
                    </li>


                    <!--end::Nav item-->
                    <!--begin::Nav item-->

                </ul>


            </div>
            <div class="d-flex my-4 justify-content-end order-lg-2 order-1">
                <a href="{{ route('captins.index') }}" class="btn btn-sm btn-light me-2"
                   id="kt_user_follow_button">
                    <!--begin::Indicator label-->
                    <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                      rx="10" fill="currentColor"/>
                                <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                      transform="rotate(-45 7 15.3137)" fill="currentColor"/>
                                <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                      transform="rotate(45 8.41422 7)" fill="currentColor"/>
                            </svg>
                        </span>
                    Exit
                </a>

                <a href="#" class="btn btn-sm btn-primary ms-5" data-kt-captin-action="submit">
                        <span class="indicator-label">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                          rx="10" fill="currentColor"/>
                                    <path
                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                        fill="currentColor"/>
                                </svg>
                            </span>
                            Save Form</span>
                    <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                </a>
            </div>
            <!--begin::Navs-->
        </div>
    </div>
    <!--end::Content container-->
    <!--begin::Modal - Add task-->

    <form class="tab-content" id="myTabContent" method="post"
          action="{{ route('captins.addedit', ['Id' => isset($captin) ? $captin->id : '']) }}?{{ isset($captin) ? 'captin_id=' . $captin->id : '' }}">
        @csrf
        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_captin_details_view">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">{{__('Captain Details')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <div class="row">
                        @include('captins.form')
                    </div>
                </div>


                <!--end::Card body-->
            </div>

            {{--   {!! $captinForm !!}--}}
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_bank_details_view">
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">{{__('Bank')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">

                @include('captins.bank')
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_bank_details_view">
                <!--begin::Card header-->

                @include('captins.vehicle')
                <!--end::Card body-->
            </div>
        </div>
        <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_marketing_view">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">{{__('Reference')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    @include('captins.reference')

                </div>
                <!--end::Card body-->
            </div>
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_marketing_view">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">{{__('Insurance')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    @include('captins.insurance')

                </div>
                <!--end::Card body-->
            </div>
        </div>


        <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_attachments_view">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        attachments
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    @if(isset($captin))

                        @include('captins.attachments.index')
                    @endif

                </div>
                <!--end::Card body-->
            </div>
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_attachments_view">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        History
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->

                <!--end::Card body-->
            </div>
        </div>

    </form>

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
@endsection

@push('scripts')

    <script>

        var validator;
        const form = document.getElementById('myTabContent');

        $(function () {

            var tabContentEl = document.querySelector("#myTabContent");
            var tabContentElblockUI = new KTBlockUI(tabContentEl, {
                message: '<div class="bg-white blockui-message position-absolute" style="top:25px;"><span class="spinner-border text-primary"></span> Loading...</div>',
            });

            renderValidate();

        });

        function renderValidate() {


            // Log the list of registered plugins

            validator = FormValidation.formValidation(
                form, {
                    fields: {},
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );
            var dueDatebirth_date = $(form.querySelector('[name="dob"]'));
            dueDatebirth_date.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                maxDate: "today",
                allowInput: true,
            });
            var dueDatebirth_date2 = $(form.querySelector('[name="reference_dob"]'));
            dueDatebirth_date2.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                maxDate: "today",
                allowInput: true,
            });
            var dueDatebirth_date3 = $(form.querySelector('[name="policy_start"]'));
            dueDatebirth_date3.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                allowInput: true,
            });
            var dueDatebirth_date4 = $(form.querySelector('[name="policy_end"]'));
            dueDatebirth_date4.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                maxDate: dueDatebirth_date3.val()
                ,
                allowInput: true,
            });
            var dueDatebirth_date3 = $(form.querySelector('[name="license_expire_date"]'));
            dueDatebirth_date3.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                allowInput: true,
            });
            var dueDatebirth_date3 = $(form.querySelector('[name="join_date"]'));
            dueDatebirth_date3.flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
                allowInput: true,
            });
            validator.on('core.form.invalid', function (event) {
                const fields = validator.getFields();
                $.each(fields, function (element) {
                    validator.validateField(element)
                        .then(function (status) {
                            // status can be one of the following value
                            // 'NotValidated': The element is not yet validated
                            // 'Valid': The element is valid
                            // 'Invalid': The element is invalid
                            if (status == 'Invalid')
                                console.log(element);
                        });
                });
            });


            const RequiredInputList = {
                'name': 'input',
                'full_name': 'input',
                'address': 'input',
                'blood_type': 'select',
                'captin_id': 'input',
                'city_id': 'select',
                'assign_city_id': 'select',
                'bod': 'input',
                'mobile1': 'input',
                'vehicle_type': 'select',
                'fuel_type': 'select',
                'box_no': 'input',
                'sign_permission': 'select',
                'vehicle_model': 'input',
                'vehicle_year': 'input',
                'reference_name': 'input',
                'motor_cc': 'input',

            }


            for (var key in RequiredInputList) {
                // console.log("key " + key + " has value " + RequiredInputList[key]);
                var fieldName = $(RequiredInputList[key] + ["[name=" + key + "]"]).closest(".fv-row").find(
                    "label[data-input-name]").attr('data-input-name');

                const NameValidators = {
                    validators: {
                        notEmpty: {
                            message: fieldName + ' is required',
                        },
                    },
                };

                validator.addField(key, NameValidators);
                // validator.addField($(this).find('.constantNames').attr('name'),
                //                         NameValidators);
            }
            $(document).on('click', '#has_insurance_select', function (e) {
                //alert($('#has_insurance').val());
                if ($('#has_insurance').val() == 'on') {
                    $('#has_insurance').val('off');
                    $('#tab3').addClass('d-none');
                } else {
                    $('#has_insurance').val('on');
                    $('#tab3').removeClass('d-none');
                }
            });
            $(document).on('change', '.is_current_wrok', function (e) {
                //alert($('#has_insurance').val());

                if ($(this).val() === '1') {
                    $('.current_work').removeClass('d-none');
                } else {
                    $('.current_work').addClass('d-none');
                }
            });

            const submitButton = document.querySelector('[data-kt-captin-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();

                var formAddEdit = $("#kt_modal_constant_form");
                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');
                        if (status == 'Valid') {
                            console.log('valid!');
                            form.submit();
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are you missed some required fields, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    })
                }
            });


        }
    </script>
@endpush
