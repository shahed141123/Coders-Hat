<x-admin-app-layout :title="'Testimonials'">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-dark align-items-center d-flex justify-content-between">
                    <div>
                        <h1 class="mb-0 text-center w-100 text-white">Manage Your Testimonial</h1>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-white rounded-2" data-bs-toggle="modal"
                            data-bs-target="#testimonialAddModal">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                        fill="currentColor" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                        transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            Add Testimonial
                        </a>
                    </div>
                </div>
                <div class="card-body py-0">
                    <table class="table my-datatable table-striped table-row-bordered gy-5 gs-7">
                        <thead class="bg-light-danger">
                            <tr class="fw-semibold fs-6 text-gray-800">
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Attachment</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testimonial->title }}</td>
                                    <td>
                                        <div>
                                            <img width="100px" class="img-fluid"
                                                src="{{ asset('storage/' . $testimonial->image) }}" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ asset('storage/' . $testimonial->attachment) }}"
                                                download="">Download</a>
                                        </div>
                                    </td>
                                    <td>{{ $testimonial->url }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $testimonial->status == 'active' ? 'bg-primary' : 'bg-danger' }}">
                                            {{ ucfirst($testimonial->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#testimonialEditModal{{ $testimonial->id }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.testimonial.destroy') }}"
                                            class="btn btn-sm btn-warning delete">
                                            <i class="fa-solid fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Testimonial Modal --}}
    <div class="modal fade" id="testimonialAddModal" tabindex="-1" aria-labelledby="testimonialAddLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="testimonialAddLabel">Create Testimonial</h5>
                    <button class="btn btn-white btn-sm ps-4 pe-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="name"
                                    class="required fw-bold fs-6 mb-2">{{ __('Full Name') }}</x-metronic.label>
                                <x-metronic.input id="name" type="text" class="form-control-solid mb-3 mb-lg-0"
                                    name="name" :value="old('name')" placeholder="Enter Full Name"></x-metronic.input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="designation"
                                    class="fw-bold fs-6 mb-2">{{ __('Designation') }}</x-metronic.label>
                                <x-metronic.input id="designation" type="text"
                                    class="form-control-solid mb-3 mb-lg-0" name="designation" :value="old('designation')"
                                    placeholder="Enter Designation"></x-metronic.input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="company"
                                    class="fw-bold fs-6 mb-2">{{ __('Company') }}</x-metronic.label>
                                <x-metronic.input id="company" type="text" class="form-control-solid mb-3 mb-lg-0"
                                    name="company" :value="old('company')"
                                    placeholder="Enter Company Name"></x-metronic.input>
                            </div>
                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="image"
                                    class="fw-bold fs-6 mb-2">{{ __('Image') }}</x-metronic.label>
                                <x-metronic.file-input id="image" class="form-control-solid mb-3 mb-lg-0"
                                    name="image"></x-metronic.file-input>
                            </div>
                            
                            <div class="col-lg-12 mb-7">
                                <x-metronic.label for="message"
                                    class="required fw-bold fs-6 mb-2">{{ __('Testimonial Message') }}</x-metronic.label>
                                <x-metronic.textarea id="message" class="form-control-solid mb-3 mb-lg-0"
                                    name="message" rows="4"
                                    placeholder="Enter your testimonial">{{ old('message') }}</x-metronic.textarea>
                            </div>



                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="rating"
                                    class="fw-bold fs-6 mb-2">{{ __('Rating (1-5)') }}</x-metronic.label>
                                <x-metronic.input id="rating" type="number"
                                    class="form-control-solid mb-3 mb-lg-0" name="rating" min="1"
                                    max="5" :value="old('rating')" placeholder="Enter Rating"></x-metronic.input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="location"
                                    class="fw-bold fs-6 mb-2">{{ __('Location') }}</x-metronic.label>
                                <x-metronic.input id="location" type="text"
                                    class="form-control-solid mb-3 mb-lg-0" name="location" :value="old('location')"
                                    placeholder="Enter Location"></x-metronic.input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="video_url"
                                    class="fw-bold fs-6 mb-2">{{ __('Video URL') }}</x-metronic.label>
                                <x-metronic.input id="video_url" type="url"
                                    class="form-control-solid mb-3 mb-lg-0" name="video_url" :value="old('video_url')"
                                    placeholder="Enter Video URL"></x-metronic.input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="company_logo"
                                    class="fw-bold fs-6 mb-2">{{ __('Company Logo') }}</x-metronic.label>
                                <x-metronic.file-input id="company_logo" class="form-control-solid mb-3 mb-lg-0"
                                    name="company_logo"></x-metronic.file-input>
                            </div>

                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="website"
                                    class="fw-bold fs-6 mb-2">{{ __('Website') }}</x-metronic.label>
                                <x-metronic.input id="website" type="url"
                                    class="form-control-solid mb-3 mb-lg-0" name="website" :value="old('website')"
                                    placeholder="Enter Website URL"></x-metronic.input>
                            </div>
                            <div class="col-lg-6 mb-7">
                                <x-metronic.label for="status"
                                    class="fw-bold fs-6 mb-2">{{ __('Status') }}</x-metronic.label>
                                <select class="form-select" name="status" data-control="select2"
                                    data-hide-search="true" data-allow-clear="true" data-placeholder="Select status">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Testimonial Modals --}}
    @foreach ($testimonials as $testimonial)
        <div class="modal fade" id="testimonialEditModal{{ $testimonial->id }}" tabindex="-1"
            aria-labelledby="testimonialEditLabel{{ $testimonial->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="testimonialEditLabel{{ $testimonial->id }}">Edit
                            Testimonial</h5>
                        <button class="btn btn-white btn-sm ps-4 pe-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.testimonial.update', $testimonial->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="product_id{{ $testimonial->id }}"
                                        class="col-form-label required fw-bold fs-6">{{ __('Select Product') }}</x-metronic.label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-close-on-select="false" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple"
                                        id="product_id{{ $testimonial->id }}" name="product_id[]"
                                        data-hide-search="false" data-placeholder="Select an option">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ in_array($product->id, json_decode($testimonial->product_id)) ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="category_id{{ $testimonial->id }}"
                                        class="col-form-label required fw-bold fs-6">{{ __('Select Category') }}</x-metronic.label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-close-on-select="false" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple"
                                        id="category_id{{ $testimonial->id }}" name="category_id[]"
                                        data-hide-search="false" data-placeholder="Select an option">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, json_decode($testimonial->category_id)) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="brand_id{{ $testimonial->id }}"
                                        class="col-form-label required fw-bold fs-6">{{ __('Select Brand') }}</x-metronic.label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-close-on-select="false" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple"
                                        id="brand_id{{ $testimonial->id }}" name="brand_id[]"
                                        data-hide-search="false" data-placeholder="Select an option">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ in_array($brand->id, json_decode($testimonial->brand_id)) ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-8 mb-7">
                                    <x-metronic.label for="title{{ $testimonial->id }}"
                                        class="col-form-label required fw-bold fs-6">{{ __('Title') }}</x-metronic.label>
                                    <x-metronic.input id="title{{ $testimonial->id }}" type="text" name="title"
                                        placeholder="Enter the title" :value="$testimonial->title"></x-metronic.input>
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="status{{ $testimonial->id }}"
                                        class="col-form-label fw-bold fs-6">{{ __('Status') }}</x-metronic.label>
                                    <select class="form-select" name="status" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option value="active"
                                            {{ $testimonial->status == 'active' ? 'selected' : '' }}>active</option>
                                        <option value="inactive"
                                            {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="image{{ $testimonial->id }}"
                                        class="col-form-label fw-bold fs-6">{{ __('Image') }}</x-metronic.label>
                                    <x-metronic.file-input id="image{{ $testimonial->id }}" name="image"
                                        :value="$testimonial->image"></x-metronic.file-input>
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="attachment{{ $testimonial->id }}"
                                        class="col-form-label fw-bold fs-6">{{ __('Attachment (PDF)') }}</x-metronic.label>
                                    <input class="form-control" type="file" name="attachment" id="attachment"
                                        value="{{ old('attachment', $testimonial->attachment) }}">
                                    {{-- <x-metronic.file-input id="attachment{{ $testimonial->id }}" name="attachment"
                                        :value="$testimonial->attachment"></x-metronic.file-input> --}}
                                </div>
                                <div class="col-lg-4 mb-7">
                                    <x-metronic.label for="url{{ $testimonial->id }}"
                                        class="col-form-label fw-bold fs-6">{{ __('URL') }}</x-metronic.label>
                                    <x-metronic.input id="url{{ $testimonial->id }}" type="url" name="url"
                                        placeholder="Enter the URL" :value="$testimonial->url"></x-metronic.input>
                                </div>
                                <div class="col-xl-12">
                                    <div class="text-end">
                                        <x-metronic.button type="submit" class="dark">
                                            {{ __('Update') }}
                                        </x-metronic.button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-admin-app-layout>
