<?php
include "header.php";
if (!isset($_SESSION['username'])) {
    echo("<script>
window.location.href='index.php';
</script>;");
}
?>

    <div class="container">  <!-- Main Div content container -->
        <div class="row">  <!-- Main content row -->
            <div class="col-md-3">  <!-- start left navigation rail column -->
                <?php include 'side.php'; ?>
            </div>  <!-- end left navigation rail -->
            <div class="col-md-9">  <!-- start main content column -->

            </div>
        </div>

    </div>   <!-- end main content container -->

<?php
include "footer.php";
?>