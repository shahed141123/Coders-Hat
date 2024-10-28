<div class="card card-flash mt-5">
    <div class="card-header border-0 cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"> {{ __('Update Password') }} </h3>
        </div>
    </div>
    <form class="form" method="post" action="{{ route('admin.password.update') }}">
        @csrf
        @method('put')
        <div class="card-body border-top p-9">
            <div class="row">
                <div class="mb-10 col-lg-4">
                    <x-metronic.label class="required form-label"
                        for="current_password">{{ __('Current Password') }}</x-metronic.label>
                    <x-metronic.input type="password" id="current_password" name="current_password"
                        class="form-control mb-2" placeholder="Current password" required
                        autocomplete="current-password"></x-metronic.input>
                </div>
                <div class="mb-10 col-lg-4">
                    <x-metronic.label class="required form-label"
                        for="password">{{ __('New Password') }}</x-metronic.label>
                    <x-metronic.input type="password" id="password" name="password" class="form-control mb-2"
                        placeholder="Enter your new password" required autocomplete="new-password"></x-metronic.input>
                </div>
                <div class="mb-10 col-lg-4">
                    <x-metronic.label class="required form-label"
                        for="password_confirmation">{{ __('Confirm Password') }}</x-metronic.label>
                    <x-metronic.input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control mb-2" placeholder="Enter your new password again" required
                        autocomplete="new-password"></x-metronic.input>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-3 px-9">
            {{-- <button type="submit" class="btn btn-primary fw-bold rounded-1">{{ __('Submit') }}</button> --}}
            <x-metronic.button type="submit" class="primary">
                {{ __('Submit') }}
            </x-metronic.button>
        </div>

    </form>


</div>
