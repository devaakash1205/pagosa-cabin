<?php include('form-submit.php') ?>
<!-- add home page banner -->
<div class="modal fade" id="addBannerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-1">
                        <label for="Banner" class="form-label">Banner</label>
                        <input type="file" required class="form-control" name="banner" id="banner">
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary mt-3" name="upload_home_page_banner">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Upload Logo -->
<div class="modal fade" id="addLogoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-upload"></i> Upload Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-1">
                        <label for="Logo" class="form-label">Logo</label>
                        <input type="file" required class="form-control" name="logo" id="logo">
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary mt-3" name="upload_logo">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- addWeeklyRatesModal -->
<div class="modal fade" id="addWeeklyRatesModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Weekly Rates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="serviceForm" enctype="multipart/form-data" method="post">
                    <!-- Service Name -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required class="form-control" name="title" id="title"
                            placeholder="Enter Title">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" required name="description" id="description" rows="3"
                            placeholder="Enter Description"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="imageUrl" class="form-label">Service Image</label>
                        <input type="file" class="form-control" required name="image_url" id="imageUrl">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required="">
                            <option value="" selected>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <input type="submit" value="Submit" name="add_weekly_rates" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Image Upload modal -->
<div class="modal fade" id="addGalleryImageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" onsubmit="syncCKEditorContent('#editor')">
                    <div class="mb-1">
                        <label for="Image" class="form-label">Image</label>
                        <input type="file" required class="form-control" name="image_url" id="image_url">
                    </div>
                    <div class="mb-1">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-12">
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary mt-3" name="upload_gallery_image">
                </form>
            </div>
        </div>
    </div>
</div>