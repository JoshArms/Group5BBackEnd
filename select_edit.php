
<!--***********************
    Written by David Tullis
    Last Modified - 4/19/20
    ***********************-->

<!--A form that allows the quotes and comments to be modified -->
<form action="edit_modal.php" method="POST" id="insert_form">
    <div class="form-group">
        <label for="quote">Quote</label>
        <input type="quote" class="form-control" id="quote" name="quote" placeholder="Modify the quote">
    </div>

    <div class="form-group">
        <label for="comment">Comments</label>
        <input type="comment" class="form-control" id="comment" name="comment" placeholder="N/A">
    </div>

    <button type="submit" class="btn btn-primary">Finalize Changes</button>
</form>
    