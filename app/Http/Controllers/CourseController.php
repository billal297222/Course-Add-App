<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'level' => 'nullable|string|max:50',
            'feature_video' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'feature_image' => 'nullable|file|image|max:2048',

            'modules' => 'nullable|array',
            'modules.*.title' => 'required|string|max:255',

            'modules.*.contents' => 'nullable|array',
            'modules.*.contents.*.content_title' => 'required|string|max:255',
            'modules.*.contents.*.video_sources_type' => 'nullable|string|max:100',
            'modules.*.contents.*.video_url' => 'nullable|string|max:255',
            'modules.*.contents.*.video_length' => 'nullable|string|max:50',
        ]);

        DB::transaction(function () use ($validatedData) {

            $courseData = [
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'category' => $validatedData['category'],
                'level' => $validatedData['level'] ?? null,
                'feature_video' => $validatedData['feature_video'] ?? null,
                'price' => $validatedData['price'] ?? 0,
            ];

            if (request()->hasFile('feature_image')) {
                $path = request()->file('feature_image')->store('course_images', 'public');
                $courseData['feature_image'] = $path;
            }

            $course = Course::create($courseData);

            foreach ($validatedData['modules'] ?? [] as $moduleInput) {
                $module = $course->modules()->create([
                    'title' => $moduleInput['title'],
                ]);

                foreach ($moduleInput['contents'] ?? [] as $contentInput) {
                    $module->contents()->create([
                        'content_title' => $contentInput['content_title'],
                        'video_sources_type' => $contentInput['video_sources_type'] ?? null,
                        'video_url' => $contentInput['video_url'] ?? null,
                        'video_length' => $contentInput['video_length'] ?? null,
                    ]);
                }
            }
        });

        return redirect()->back()->with('success', 'Course created successfully.');
    }
}
