<x-admin-app-layout :title="'About Us'">
    <div class="card shadow-sm">
        <!--begin::Form-->
        <form class="form" action="{{ route('admin.about-us.updateOrCreate') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title">About Us</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.dashboard') }}"type="button" class="btn btn-sm btn-light">
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Alerts-->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!--end::Alerts-->
                <!--begin::Input group-->
                <div class="row">
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="image" class="col-form-label fw-bold fs-6 ">{{ __('About Us Photo') }}
                        </x-metronic.label>

                        <x-metronic.input id="image" type="file" name="image"
                            :value="old('image', optional($aboutUs)->image)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="title" class="col-form-label fw-bold fs-6 ">{{ __('Title') }}
                        </x-metronic.label>

                        <x-metronic.input id="title" type="text" name="title" placeholder="Enter the Title"
                            :value="old('title', optional($aboutUs)->title)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="badge" class="col-form-label fw-bold fs-6 ">{{ __('Badge') }}
                        </x-metronic.label>

                        <x-metronic.input id="badge" type="text" name="badge" placeholder="Enter the Badge"
                            :value="old('badge', optional($aboutUs)->badge)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="short_description"
                            class="col-form-label fw-bold fs-6 ">{{ __('Short Description') }}
                        </x-metronic.label>

                        <x-metronic.input id="short_description" type="text" name="short_description"
                            placeholder="Enter the Short Description" :value="old('short_description', optional($aboutUs)->short_description)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="button_name" class="col-form-label fw-bold fs-6 ">{{ __('Button Name') }}
                        </x-metronic.label>

                        <x-metronic.input id="button_name" type="text" name="button_name"
                            placeholder="Enter the Button Name" :value="old('button_name', optional($aboutUs)->button_name)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="button_link" class="col-form-label fw-bold fs-6 ">{{ __('Button Link') }}
                        </x-metronic.label>

                        <x-metronic.input id="button_link" type="url" name="button_link"
                            placeholder="Enter the Button Link" :value="old('button_link', optional($aboutUs)->button_link)"></x-metronic.input>
                    </div>
                </div>
                <!--end::Form-->
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>
                <!--end::Actions-->
            </div>
        </form>
    </div>
</x-admin-app-layout>
