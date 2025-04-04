<?php
echo '<form id="categoryForm" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" class="form-control" id="category" name="category" required>
        <div class="invalid-feedback">Please enter a category.</div>
    </div>
    <div class="form-group">
        <label for="metaDescription">Meta Description:</label>
        <textarea class="form-control" id="metaDescription" name="metaDescription" required></textarea>
        <div class="invalid-feedback">Please enter a meta description.</div>
    </div>
    <div class="form-group">
        <label for="metaTags">Meta Tags:</label>
        <input type="text" class="form-control" id="metaTags" name="metaTags" required>
        <div class="invalid-feedback">Please enter meta tags.</div>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" required>
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <div class="invalid-feedback">Please select a status.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>';
?>