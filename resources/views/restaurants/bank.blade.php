<div class="row">
    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2"
                   data-input-name="Bank Name">{{__('Bank Name')}}</label>
            <!--end::Label-->
            <!--begin::Input-->

            <select class="form-select form-select-solid mb-3 mb-lg-0" data-control="select2"
                    name="bank_name"
                    data-placeholder="Select an option">
                <option></option>
                @foreach ($BANKS as $BANK)
                    <option value="{{ $BANK->id }}"
                    @isset($restaurant)
                        @selected($restaurant->bank_name == $BANK->id)
                        @endisset>
                        {{ $BANK->name }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2" data-input-name="">{{__('Bank branch #')}}
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="bank_branch"
                   class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="" value="{{ isset($restaurant) ? $restaurant->bank_branch : '' }}"/>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2" data-input-name="Payment Type">
                {{__('Payment Type')}}
            </label>
            <!--end::Label-->
            <!--begin::Input-->

            <select class="form-select form-select-solid mb-3 mb-lg-0" data-control="select2"
                    name="payment_type"
                    data-placeholder="Select an option">
                <option></option>
                @foreach ($PAYMENT_TYPES as $p)
                    <option value="{{ $p->id }}"
                    @isset($restaurant)
                        @selected($restaurant->payment_type == $p->id)
                        @endisset>
                        {{ $p->name }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2" data-input-name="">{{__('IBAN')}}
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="iban" class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="" value="{{ isset($restaurant) ? $restaurant->iban : '' }}"/>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2" data-input-name="">{{__('VISA')}} %
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="visa" class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="" value="{{ isset($restaurant) ? $restaurant->visa : '' }}"/>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2" data-input-name="">{{__('CASH')}}%
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="cash" class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="" value="{{ isset($restaurant) ? $restaurant->cash : '' }}"/>
            <!--end::Input-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2" data-input-name="benficiary">{{__('Benficiary')}}
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="benficiary" class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="" value="{{ isset($restaurant) ? $restaurant->benficiary : '' }}"/>
            <!--end::Input-->
        </div>
    </div>

</div>
