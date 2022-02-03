<div class="container vh-100">
    <h2 class="my-2 py-2">Update Product</h2>
    <form>
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductName" placeholder="Enter product name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputCategory">Options</label>
                    </div>
                    <select class="custom-select" id="inputCategory">
                        <option selected>Choose...</option>
                        <option value="1">Phones</option>
                        <option value="2">Laptops</option>
                        <option value="3">Tabs</option>
                        <option value="4">Watches</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Apple</option>
                        <option value="2">Samsung</option>
                        <option value="3">Xiaomi</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputImage">
                        <label class="custom-file-label" for="inputImage">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
