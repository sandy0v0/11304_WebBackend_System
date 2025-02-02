<h3 class="text-center" id="addTitleImageModalLabel">更新動圖</h3>

<form action="api/update.php" method="post" enctype="multipart/form-data">
    <div class="container mt-4">
        <div class="row mb-3">
            <label for="img" class="col-sm-2 col-form-label">動畫圖片：</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="img" id="img">
            </div>
        </div>
        <div class="text-center">
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit" class="btn btn-success">更新</button>
            <button type="reset" class="btn btn-danger">重置</button>
        </div>
    </div>
</form>