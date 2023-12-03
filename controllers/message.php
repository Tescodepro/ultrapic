<?php
if (isset($_GET['type']) && $_GET['type'] == 'error') {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hoops!</strong>
        <?php echo $_GET['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<?php
if (isset($_GET['type']) && $_GET['type'] == 'success') {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Good!</strong>
        <?php echo $_GET['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>