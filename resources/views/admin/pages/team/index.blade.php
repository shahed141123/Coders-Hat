<x-admin-app-layout :title="'Team Member List'">
    <div class="card">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
            <h1 class="mb-0 text-white">Manage Your Team Member</h1>
            <a href="{{ route('admin.team-member.create') }}" class="btn btn-light-primary rounded-2">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                            fill="currentColor" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                            transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                            fill="currentColor" />
                    </svg>
                </span>
                <span class="pt-2">Add Team Member</span>
            </a>
        </div>
        <div class="card-body py-0">
            <table class="table my-datatable table-striped table-row-bordered gy-5 gs-7">
                <thead class="">
                    <tr class="fw-semibold fs-6 text-gray-800">
                        <th width="8%">SL No.</th>
                        <th width="12%">Image</th>
                        <th width="28%">Name</th>
                        <th width="15%">Designation</th>
                        <th width="12%">Order</th>
                        <th width="12%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="w-65px" src="{{ asset('storage/' . $team->image) }}" alt="">
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->designation }}</td>
                            <td>{{ $team->order }}</td>
                            <td>
                                <span class="badge {{ $team->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $team->status == 'active' ? 'Active' : 'InActive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.team-member.edit', $team->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.team-member.destroy', $team->id) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 delete">
                                    <i class="fa-solid fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('kt_docs_formvalidation_text');
                const submitButton = document.getElementById('kt_docs_formvalidation_text_submit');


                submitButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (validator) {
                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                submitButton.disabled = true;

                                const formData = new FormData(form);
                                fetch(form.action, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector(
                                                'meta[name="csrf-token"]').getAttribute(
                                                'content')
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        submitButton.removeAttribute('data-kt-indicator');
                                        submitButton.disabled = false;
                                        if (data.success) {
                                            Swal.fire({
                                                text: "Form has been successfully submitted!",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            }).then(function() {
                                                window.location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                text: data.message ||
                                                    "An error occurred. Please try again.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        submitButton.removeAttribute('data-kt-indicator');
                                        submitButton.disabled = false;
                                        Swal.fire({
                                            text: "An error occurred. Please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    });
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
