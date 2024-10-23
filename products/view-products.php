<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Products</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="addproduct.php" class="btn btn-primary brand-bg-color">Add Product</a>
                        <div class="page-title-right">
                            <form class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-light" id="custom-search" placeholder="Search...">
                                    <span class="input-group-text bg-primary border-primary text-white brand-bg-color">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <?php
                        require_once '../classes/product.class.php';
                        session_start();
                        $productObj = new Product();
                        $array = $productObj->showAll();
                    ?>
                    
                    <div class="table-responsive">
                        <table id="table-products" class="table table-hover table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Total Stocks</th>
                                    <th>Available Stocks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (empty($array)) {
                                ?>
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <p class="text-muted">No product found.</p>
                                        </td>
                                    </tr>
                                <?php
                                }
                                foreach ($array as $arr) {
                                    $available = $arr['stock_in'] - $arr['stock_out'];
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $arr['code'] ?></td>
                                        <td><?= $arr['name'] ?></td>
                                        <td><?= $arr['category_name'] ?></td>
                                        <td><?= number_format($arr['price'], 2) ?></td>
                                        <td><?= $arr['stock_in'] ?></td>
                                        <td>
                                            <span class="
                                                <?php
                                                if ($available < 1) {
                                                    echo 'badge rounded-pill bg-danger';
                                                } elseif ($available <= 5) {
                                                    echo 'badge rounded-pill bg-warning'; 
                                                }
                                                ?>
                                            ">
                                                <?= $available ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="../stocks/stocks.php?id=<?= $arr['id'] ?>" class="btn btn-sm btn-outline-primary me-2">Stock In/Out</a>
                                            <a href="../products/editproduct.php?id=<?= $arr['id'] ?>" class="btn btn-sm btn-outline-success me-2">Edit</a>
                                            <?php if (isset($_SESSION['account']['is_admin']) && $_SESSION['account']['is_admin']) { ?>
                                                <button class="btn btn-sm btn-outline-danger deleteBtn" data-id="<?= $arr['id'] ?>" data-name="<?= htmlspecialchars($arr['name']) ?>">Delete</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
