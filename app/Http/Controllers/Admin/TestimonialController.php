<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'testimonials' => Testimonial::latest('id')->get(),
        ];
        return view('admin.pages.testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'name'       => 'required|string|max:255',
                'designation' => 'nullable|string|max:100',
                'company'    => 'nullable|string|max:255',
                'message'    => 'required|string',
                'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'rating'     => 'nullable|integer|min:1|max:5',
                'location'   => 'nullable|string|max:100',
                'video_url'  => 'nullable|url|max:255',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'website'    => 'nullable|url|max:255',
                'status'     => 'required|in:active,inactive',
            ], [
                'name.required'       => 'The full name field is required.',
                'message.required'    => 'The testimonial message field is required.',
                'image.image'         => 'The uploaded file must be an image.',
                'image.mimes'         => 'The image must be a file of type: jpg, jpeg, png.',
                'image.max'           => 'The image may not be greater than 2MB.',
                'company_logo.image'  => 'The company logo must be an image.',
                'company_logo.mimes'  => 'The company logo must be a file of type: jpg, jpeg, png.',
                'company_logo.max'    => 'The company logo may not be greater than 2MB.',
                'rating.integer'      => 'The rating must be an integer.',
                'rating.min'          => 'The rating must be at least 1.',
                'rating.max'          => 'The rating may not be greater than 5.',
                // Add more custom messages as needed
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->all() as $message) {
                    Session::flash('error', $message);
                }
                return redirect()->back()->withInput();
            }

            // Handle file uploads
            $files = [
                'image'           => $request->file('image'),
                'company_logo'    => $request->file('company_logo'),
            ];
            $uploadedFiles = [];
            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'testimonial/' . $key;

                    $uploadedFiles[$key] = customUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }

            // Create the Testimonial model instance
            Testimonial::create([
                'name'          => $request->name,
                'designation'   => $request->designation,
                'company'       => $request->company,
                'message'       => $request->message,
                'image'         => isset($uploadedFiles['image']) ? $uploadedFiles['image']['file_path'] : null,
                'rating'        => $request->rating,
                'location'      => $request->location,
                'video_url'     => $request->video_url,
                'company_logo'  => isset($uploadedFiles['company_logo']) ? $uploadedFiles['company_logo']['file_path'] : null,
                'website'       => $request->website,
                'status'        => $request->status,
            ]);

            // Commit the database transaction
            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            // Rollback the database transaction in case of an error
            DB::rollback();
            Session::flash('error', 'An error occurred while creating the testimonial: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
