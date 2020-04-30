
<!--***********************
    Written by David Tullis
    Last Modified - 4/29/20
    ***********************-->

<!--A form that allows the quotes and comments to be modified -->
<form action="edit_modal.php" method="POST" id="insert_form">
    <div class="form-group">
        <label for="l1d">Line Description (1)</label>
        <input type="l1d" class="form-control" id="l1d" name="l1d" placeholder="Modify the description">
    </div>

    <div class="form-group">
        <label for="l1p">Line Price (1)</label>
        <input type="l1p" class="form-control" id="l1p" name="l1p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l2d">Line Description (2)</label>
        <input type="l2d" class="form-control" id="l2d" name="l2d" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l2p">Line Price (2)</label>
        <input type="l2p" class="form-control" id="l2p" name="l2p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l3d">Line Description (3)</label>
        <input type="l3d" class="form-control" id="l3d" name="l3d" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="l3p">Line Price (3)</label>
        <input type="l3p" class="form-control" id="l3p" name="l3p" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <input type="comment" class="form-control" id="comment" name="comment" placeholder="N/A">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="N/A">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php
session_start();
$_SESSION['qid'] = $_POST["q_id"];
?>

