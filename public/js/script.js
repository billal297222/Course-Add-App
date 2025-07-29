
    document.addEventListener("DOMContentLoaded", function () {
    const quill = new Quill('#editor', { theme: 'snow' });
    const form = document.getElementById('courseForm');
    let moduleCount = 0;

    form.addEventListener('submit', () => {
        document.getElementById('description').value = quill.root.innerHTML;
    });

    document.getElementById('cancelBtn').addEventListener('click', () => {
        form.reset();
        document.getElementById('modules').innerHTML = '';
        moduleCount = 0;
        quill.setContents([]);
    });

    window.addModule = function () {
        const id = moduleCount++;
        const moduleWrapper = document.getElementById('modules');
        const html = `
            <div class="accordion-item" id="module-${id}">
                <h2 class="accordion-header" id="heading${id}">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse${id}" aria-expanded="false" aria-controls="collapse${id}">
                        <span>Module ${id + 1}</span>
                        <button type="button" class="remove-btn ms-auto" onclick="removeModule(${id})">&times;</button>
                    </button>
                </h2>
                <div id="collapse${id}" class="accordion-collapse collapse" aria-labelledby="heading${id}" data-bs-parent="#modules">
                    <div class="accordion-body">
                        <label class="form-label">Module Title</label>
                        <input type="text" class="form-control mb-2" name="modules[${id}][title]" required>
                        <div id="contents-${id}"></div>
                        <button type="button" class="btn btn-sm btn-outline-secondary mt-2" onclick="addContent(${id})">+ Add Content</button>
                    </div>
                </div>
            </div>`;
        moduleWrapper.insertAdjacentHTML('beforeend', html);
    };

    window.addContent = function (moduleId) {
        const contentsDiv = document.getElementById(`contents-${moduleId}`);
        const index = contentsDiv.querySelectorAll('.content').length;
        const html = `
            <div class="content border rounded p-3 mb-3 position-relative" id="content-${moduleId}-${index}">
                <button type="button" class="remove-btn position-absolute top-0 end-0" onclick="removeContent(${moduleId}, ${index})">&times;</button>
                <label class="form-label">Content Title</label>
                <input type="text" class="form-control mb-2" name="modules[${moduleId}][contents][${index}][content_title]" required>
                <label class="form-label">Video Source Type</label>
                <select class="form-select mb-2" name="modules[${moduleId}][contents][${index}][video_sources_type]">
                    <option value="">Choose...</option>
                    <option value="YouTube">YouTube</option>
                    <option value="Vimeo">Vimeo</option>
                </select>
                <label class="form-label">Video URL</label>
                <input type="text" class="form-control mb-2" name="modules[${moduleId}][contents][${index}][video_url]">
                <label class="form-label">Video Length</label>
                <input type="text" class="form-control" name="modules[${moduleId}][contents][${index}][video_length]">
            </div>`;
        contentsDiv.insertAdjacentHTML('beforeend', html);
    };

    window.removeModule = function (id) {
        const el = document.getElementById(`module-${id}`);
        if (el) el.remove();
    };

    window.removeContent = function (moduleId, index) {
        const el = document.getElementById(`content-${moduleId}-${index}`);
        if (el) el.remove();
    };
});
