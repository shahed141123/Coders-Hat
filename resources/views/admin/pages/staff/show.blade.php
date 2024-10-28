<x-admin-app-layout :title="'User Details of ' . $user->name">

    <div class="d-flex flex-column flex-lg-row">

        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

            <div class="card mb-5 mb-xl-8">

                <div class="card-body">


                    <div class="d-flex flex-center flex-column py-5">

                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="{{ asset('admin/assets/media/svg/avatars/blank-dark.svg') }}" alt="image" />
                        </div>


                        <a href="#"
                            class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $user->name }}</a>


                        <div class="mb-9">
                            @foreach ($user->getRoleNames() as $role)

                                <div class="badge badge-lg badge-light-primary d-inline">{{ $role }}</div>

                            @endforeach

                        </div>



                        <div class="fw-bolder mb-3">Assigned Tickets
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                data-bs-trigger="hover" data-bs-html="true"
                                data-bs-content="Number of support tickets assigned, closed and pending this week."></i>
                        </div>

                        <div class="d-flex flex-wrap flex-center">

                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bolder text-gray-700">
                                    <span class="w-75px">243</span>

                                    <span class="svg-icon svg-icon-3 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>

                                </div>
                                <div class="fw-bold text-muted">Total</div>
                            </div>


                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="fs-4 fw-bolder text-gray-700">
                                    <span class="w-50px">56</span>

                                    <span class="svg-icon svg-icon-3 svg-icon-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11" y="18" width="13" height="2"
                                                rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                            <path
                                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>

                                </div>
                                <div class="fw-bold text-muted">Solved</div>
                            </div>


                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bolder text-gray-700">
                                    <span class="w-50px">188</span>

                                    <span class="svg-icon svg-icon-3 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>

                                </div>
                                <div class="fw-bold text-muted">Open</div>
                            </div>

                        </div>

                    </div>



                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                            data-bs-target="#user_collapse_details_{{ $user->id }}" role="button"
                            aria-expanded="false" aria-controls="user_collapse_details_{{ $user->id }}">
                            Details
                            <span class="ms-2 rotate-180">

                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>

                            </span>
                        </div>
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit User Details">
                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                class="btn btn-sm btn-light-primary">Edit</a>
                        </span>
                    </div>

                    <div class="separator"></div>

                    <div class="collapse show" id="user_collapse_details_{{ $user->id }}">
                        <div class="pb-5 fs-6">

                            <div class="fw-bolder mt-5">Account ID</div>
                            <div class="text-gray-600">ID-45453423</div>


                            <div class="fw-bolder mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                            </div>


                            <div class="fw-bolder mt-5">Address</div>
                            <div class="text-gray-600">{{ $user->address }}</div>


                            <div class="fw-bolder mt-5">Language</div>
                            <div class="text-gray-600">English</div>


                            <div class="fw-bolder mt-5">Last Login</div>
                            <div class="text-gray-600">25 Jul 2022, 2:40 pm</div>

                        </div>
                    </div>


                </div>

            </div>


        </div>


        <div class="flex-lg-row-fluid ms-lg-15">

            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">

                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                        href="#kt_user_view_overview_tab">Overview</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                        href="#kt_user_view_overview_security">Security</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                        href="#kt_user_view_overview_events_and_logs_tab">Events &amp; Logs</a>
                </li>


                <li class="nav-item ms-auto">

                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions

                        <span class="svg-icon svg-icon-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                    fill="currentColor" />
                            </svg>
                        </span>


                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
                        data-kt-menu="true">


                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                        </div>


                        <div class="menu-item px-5">
                            <a href="javascript:void(0)" class="menu-link px-5">Reports</a>
                        </div>


                        <div class="menu-item px-5 my-1">
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="menu-link px-5">Account
                                Settings</a>
                        </div>


                        <div class="menu-item px-5">
                            <a href="{{ route('admin.user.destroy', $user->id) }}"
                                class="menu-link text-danger px-5 delete">Delete This User</a>
                        </div>

                    </div>


                </li>

            </ul>


            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                    @include('admin.pages.users.partials.overview')
                </div>


                <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">

                    @include('admin.pages.users.partials.security')

                </div>


                <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">

                    @include('admin.pages.users.partials.activity-logs')

                </div>

            </div>

        </div>

    </div>




    <div class="modal fade metronic_modal" id="update_email_{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bolder">Update Email</h2>

                     <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">

                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>

                    </div>

                </div>


                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <form class="form" method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">


                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                        fill="currentColor" />
                                    <rect x="11" y="14" width="7" height="2" rx="1"
                                        transform="rotate(-90 11 14)" fill="currentColor" />
                                    <rect x="11" y="17" width="2" height="2" rx="1"
                                        transform="rotate(-90 11 17)" fill="currentColor" />
                                </svg>
                            </span>



                            <div class="d-flex flex-stack flex-grow-1">

                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">Please note that a valid email address is required
                                        to complete the email verification.</div>
                                </div>

                            </div>

                        </div>


                        <div class="fv-row mb-7">

                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Email Address</span>
                            </label>


                            <input class="form-control form-control-solid" type="email"
                                placeholder="example@domain.com" name="email"
                                value="{{ old('email', $user->email) }}" />
                            <div class="invalid-feedback">
                                Please input valid Email.
                            </div>

                        </div>


                        <div class="text-center pt-15">
                            <x-metronic.button type="submit" class="primary">
                                {{ __('Save Changes') }}
                            </x-metronic.button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <div class="modal fade metronic_modal" id="update_password_{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="fw-bolder">Update User Password</h2>


                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">

                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>

                    </div>

                </div>

                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <form class="form" method="POST" action="{{ route('admin.user.update', $user->id) }}"
                        novalidate>
                        @csrf
                        @method('PATCH')

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Current Password</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="" name="current_password" autocomplete="off" required />
                            <div class="invalid-feedback">
                                Please input your current password.
                            </div>
                        </div>


                        <div class="mb-10 fv-row" data-kt-password-meter="true">

                            <div class="mb-1">

                                <label class="required form-label fw-bold fs-6 mb-2">New Password</label>


                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        placeholder="" name="password" autocomplete="off" required />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    Please input your new password.
                                </div>


                                <div class="d-flex align-items-center mb-3"
                                    data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>

                            </div>


                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                                symbols.</div>

                        </div>


                        <div class="fv-row mb-10">
                            <label class="required form-label fw-bold fs-6 mb-2">Confirm New Password</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="Retype your new password" name="password_confirmation"
                                autocomplete="off" required />
                            <div class="invalid-feedback">
                                Please Retype your new password.
                            </div>
                        </div>


                        <div class="text-center pt-15">
                            <x-metronic.button type="submit" class="primary">
                                {{ __('Save Changes') }}
                            </x-metronic.button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <div class="modal fade metronic_modal" id="update_role_{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="fw-bolder">Update User Role</h2>


                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">

                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>

                    </div>

                </div>


                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <form class="form" method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('PATCH')


                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">


                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                        fill="currentColor" />
                                    <rect x="11" y="14" width="7" height="2" rx="1"
                                        transform="rotate(-90 11 14)" fill="currentColor" />
                                    <rect x="11" y="17" width="2" height="2" rx="1"
                                        transform="rotate(-90 11 17)" fill="currentColor" />
                                </svg>
                            </span>



                            <div class="d-flex flex-stack flex-grow-1">

                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">Please note that reducing a user role rank, that
                                        user will lose all priviledges that was assigned to the previous role.</div>
                                </div>

                            </div>

                        </div>



                        <div class="fv-row mb-7">

                            <label class="fs-6 fw-bold form-label mb-5">
                                <span class="required">Select a user role</span>
                            </label>


                            @foreach ($roles as $role)

                                <div class="d-flex fv-row">

                                    <div class="form-check form-check-custom form-check-solid">

                                        <x-metronic.checkbox id="role-name-{{ $role->id }}" type="checkbox"
                                            name="roles[]" :value="$role->name" :checked="$user->roles->contains($role->id)" />

                                        <x-metronic.label for="role-name-{{ $role->id }}"
                                            class="form-check-label">{{ $role->name }}</x-metronic.label>
                                    </div>

                                </div>

                                <div class='separator separator-dashed my-5'></div>
                            @endforeach

                        </div>


                        <div class="text-center pt-15">
                            <x-metronic.button type="submit" class="primary">
                                {{ __('Save Changes') }}
                            </x-metronic.button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    {{--
    <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">

            <div class="modal-content">

                <div class="modal-header">

                    <h2 class="fw-bolder">Add Authenticator App</h2>


                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">

                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>

                    </div>

                </div>


                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <div class="fw-bolder d-flex flex-column justify-content-center mb-5">

                        <div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">Download the
                            <a href="#">Authenticator app</a>, add a new account, then scan this barcode to set
                            up your account.
                        </div>
                        <div class="text-center mb-5 d-none" data-kt-add-auth-action="text-code-label">Download the
                            <a href="#">Authenticator app</a>, add a new account, then enter this code to set up
                            your account.
                        </div>


                        <div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
                            <img src="assets/media/misc/qr.png" alt="Scan this QR code" />
                        </div>


                        <div class="border rounded p-5 d-flex flex-center d-none" data-kt-add-auth-action="text-code">
                            <div class="fs-1">gi2kdnb54is709j</div>
                        </div>

                    </div>


                    <div class="d-flex flex-center">
                        <div class="btn btn-light-primary" data-kt-add-auth-action="text-code-button">Enter code
                            manually</div>
                        <div class="btn btn-light-primary d-none" data-kt-add-auth-action="qr-code-button">Scan
                            barcode instead</div>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">

            <div class="modal-content">

                <div class="modal-header">

                    <h2 class="fw-bolder">Enable One Time Password</h2>


                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">

                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>

                    </div>

                </div>


                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <form class="form" id="kt_modal_add_one_time_password_form">

                        <div class="fw-bolder mb-9">Enter the new phone number to receive an SMS to when you log in.
                        </div>


                        <div class="fv-row mb-7">

                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Mobile number</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="A valid mobile number is required to receive the one-time password to validate your account login."></i>
                            </label>


                            <input type="text" class="form-control form-control-solid" name="otp_mobile_number"
                                placeholder="+6123 456 789" value="" />

                        </div>


                        <div class="separator saperator-dashed my-5"></div>


                        <div class="fv-row mb-7">

                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Email</span>
                            </label>


                            <input type="email" class="form-control form-control-solid" name="otp_email"
                                value="smith@kpmg.com" readonly="readonly" />

                        </div>


                        <div class="fv-row mb-7">

                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Confirm password</span>
                            </label>


                            <input type="password" class="form-control form-control-solid"
                                name="otp_confirm_password" value="" />

                        </div>


                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                data-kt-users-modal-action="cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div> --}}


</x-admin-app-layout>
