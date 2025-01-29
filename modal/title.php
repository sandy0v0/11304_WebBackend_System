<!-- modal/title.php -->
<h3 class="text-center" id="addTitleImageModalLabel">新增標題區圖片</h3>

<form action="api/insert.php" method="post" enctype="multipart/form-data">
    <div class="container mt-4">
        <div class="row mb-3">
            <label for="img" class="col-sm-2 col-form-label">標題區圖片：</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="img" id="img">
            </div>
        </div>
        <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">標題區替代文字：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="text" id="text">
            </div>
        </div>
        <div class="text-center">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit" class="btn btn-primary">新增</button>
            <button type="reset" class="btn btn-secondary">重置</button>
        </div>
    </div>
</form>