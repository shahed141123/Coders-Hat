<x-admin-app-layout :title="'Team Member Add'">
    <div class="card card-flash">
        <div class="card-body scroll-y mx-5 mx-xl-15 my-7">
            <form class="form" method="POST" action="{{ route('admin.team-member.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="name"
                            class="required fw-bold fs-6 mb-2">{{ __('Full Name') }}</x-metronic.label>
                        <x-metronic.input id="name" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="name" :value="old('name')" placeholder="Enter Full Name"></x-metronic.input>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="email"
                            class="required fw-bold fs-6 mb-2">{{ __('Email') }}</x-metronic.label>
                        <x-metronic.input id="email" type="email" class="form-control-solid mb-3 mb-lg-0"
                            name="email" :value="old('email')" placeholder="example@domain.com"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="phone"
                            class="fw-bold fs-6 mb-2">{{ __('Phone') }}</x-metronic.label>
                        <x-metronic.input id="phone" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="phone" :value="old('phone')" placeholder="Enter Phone Number"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="designation"
                            class="fw-bold fs-6 mb-2">{{ __('Designation') }}</x-metronic.label>
                        <x-metronic.input id="designation" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="designation" :value="old('designation')" placeholder="Enter Designation"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="image"
                            class="fw-bold fs-6 mb-2">{{ __('Photo') }}</x-metronic.label>
                        <x-metronic.file-input id="image" class="form-control-solid mb-3 mb-lg-0" name="image"
                            placeholder="Upload Photo"></x-metronic.file-input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="linked_in"
                            class="fw-bold fs-6 mb-2">{{ __('LinkedIn') }}</x-metronic.label>
                        <x-metronic.input id="linked_in" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="linked_in" :value="old('linked_in')"
                            placeholder="Enter LinkedIn Profile URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="instagram"
                            class="fw-bold fs-6 mb-2">{{ __('Instagram') }}</x-metronic.label>
                        <x-metronic.input id="instagram" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="instagram" :value="old('instagram')"
                            placeholder="Enter Instagram Profile URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="facebook"
                            class="fw-bold fs-6 mb-2">{{ __('Facebook') }}</x-metronic.label>
                        <x-metronic.input id="facebook" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="facebook" :value="old('facebook')"
                            placeholder="Enter Facebook Profile URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="youtube"
                            class="fw-bold fs-6 mb-2">{{ __('YouTube') }}</x-metronic.label>
                        <x-metronic.input id="youtube" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="youtube" :value="old('youtube')" placeholder="Enter YouTube Channel URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="tiktok"
                            class="fw-bold fs-6 mb-2">{{ __('TikTok') }}</x-metronic.label>
                        <x-metronic.input id="tiktok" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="tiktok" :value="old('tiktok')" placeholder="Enter TikTok Profile URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="github"
                            class="fw-bold fs-6 mb-2">{{ __('GitHub') }}</x-metronic.label>
                        <x-metronic.input id="github" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="github" :value="old('github')" placeholder="Enter GitHub Profile URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="website"
                            class="fw-bold fs-6 mb-2">{{ __('Website') }}</x-metronic.label>
                        <x-metronic.input id="website" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="website" :value="old('website')"
                            placeholder="Enter Personal Website URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="discord"
                            class="fw-bold fs-6 mb-2">{{ __('Discord') }}</x-metronic.label>
                        <x-metronic.input id="discord" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="discord" :value="old('discord')" placeholder="Enter Discord Username"></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="portfolio"
                            class="fw-bold fs-6 mb-2">{{ __('Portfolio') }}</x-metronic.label>
                        <x-metronic.input id="portfolio" type="url" class="form-control-solid mb-3 mb-lg-0"
                            name="portfolio" :value="old('portfolio')" placeholder="Enter Portfolio URL"></x-metronic.input>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="biography"
                            class="fw-bold fs-6 mb-2">{{ __('Biography') }}</x-metronic.label>
                        <x-metronic.textarea id="biography" class="form-control-solid mb-3 mb-lg-0" name="biography"
                            :value="old('biography')" placeholder="Enter Biography"></x-metronic.textarea>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="location"
                            class="fw-bold fs-6 mb-2">{{ __('Location') }}</x-metronic.label>
                        <x-metronic.input id="location" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="location" :value="old('location')" placeholder="Enter Location"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="start_date"
                            class="fw-bold fs-6 mb-2">{{ __('Start Date') }}</x-metronic.label>
                        <x-metronic.input id="start_date" type="date" class="form-control-solid mb-3 mb-lg-0"
                            name="start_date" :value="old('start_date')"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="status"
                            class="fw-bold fs-6 mb-2">{{ __('Status') }}</x-metronic.label>
                            <select class="form-select" name="status" data-control="select2" data-hide-search="true"
                            data-allow-clear="true" data-placeholder="Select status">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="on_leave" {{ old('status') == 'on_leave' ? 'selected' : '' }}>On Leave
                            </option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="language"
                            class="fw-bold fs-6 mb-2">{{ __('Language Proficiencies') }}</x-metronic.label>
                        <x-metronic.input id="language" type="text" class="form-control-solid mb-3 mb-lg-0"
                            name="language" :value="old('language')" placeholder="List Languages Spoken"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="order"
                            class="fw-bold fs-6 mb-2">{{ __('Display Order') }}</x-metronic.label>
                        <x-metronic.input id="order" type="number" class="form-control-solid mb-3 mb-lg-0"
                            name="order" :value="old('order')"
                            placeholder="Enter Display Order (optional)"></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="skills"
                            class="fw-bold fs-6 mb-2">{{ __('Skills') }}</x-metronic.label>
                        <x-metronic.textarea id="skills" class="form-control-solid mb-3 mb-lg-0" name="skills"
                            :value="old('skills')" placeholder="List Skills (comma separated)"></x-metronic.textarea>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="awards"
                            class="fw-bold fs-6 mb-2">{{ __('Awards/Recognition') }}</x-metronic.label>
                        <x-metronic.textarea id="awards" class="form-control-solid mb-3 mb-lg-0" name="awards"
                            :value="old('awards')" placeholder="List Awards or Recognition"></x-metronic.textarea>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="interests"
                            class="fw-bold fs-6 mb-2">{{ __('Interests/Hobbies') }}</x-metronic.label>
                        <x-metronic.textarea id="interests" class="form-control-solid mb-3 mb-lg-0" name="interests"
                            :value="old('interests')" placeholder="List Interests or Hobbies"></x-metronic.textarea>
                    </div>
                </div>
                <div class="text-center pt-15">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
