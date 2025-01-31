<h3 class="text-center" id="addTitleImageModalLabel">新增動態文字廣告</h3>

<form action="api/insert.php" method="post" enctype="multipart/form-data">
    <div class="container mt-4">
        <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">動態文字廣告：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="text" id="text">
            </div>
        </div>
        <div class="text-center">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit" class="btn btn-primary">新增</button>
            <button type="reset" class="btn btn-danger">重置</button>
        </div>
    </div>
</form>