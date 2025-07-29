<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Course</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>
<body class="container py-5">



<div class="card p-4">
    <h3 class="mb-4">Create a Course</h3>

    <a href="{{ url('/') }}" class="back-link">&lt; Back to course page</a>
    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" id="courseForm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Course Title</label>
                <input name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Feature Video</label>
                <input name="feature_video" class="form-control" value="{{ old('feature_video') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Level</label>
                <input name="level" class="form-control" value="{{ old('level') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">Choose...</option>
                    <option value="Programming">Programming</option>
                    <option value="Laravel">Laravel</option>
                    <option value="Web">Web</option>
                    <option value="Django">Django</option>
                    <option value="Design">Design</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Course Price</label>
                <input name="price" type="number" class="form-control" value="{{ old('price') }}">
                <small class="text-muted">If the course price is 0 tk, the user can enroll for free.</small>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Course Summary</label>
            <div id="editor">{!! old('description') !!}</div>
            <input type="hidden" name="description" id="description">
        </div>

        <div class="mb-4">
            <label class="form-label">Feature Image</label>
            <div class="dropzone" onclick="document.getElementById('imageUpload').click();">Drag and drop a file here or click</div>
            <input type="file" name="feature_image" class="d-none" id="imageUpload">
        </div>

        <div class="accordion mb-4" id="modules"></div>

        <button type="button" class="btn btn-outline-primary mb-3" onclick="addModule()">+ Add Module</button>

        <div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" id="cancelBtn">Cancel</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

 <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
