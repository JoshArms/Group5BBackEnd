<?php  
 if(isset($_POST["customer_id"]))  
 {  
    $output = '';  
    $connect = mysqli_connect("localhost", "root", "");
    $sql = "SELECT quote, comment FROM customer_db WHERE id = '".$_POST["customer_id"]."'"; 
    mysqli_select_db($connect, 'sales_associates_db');
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }

 }

?>
<!doctype html>   
    <body>    
    <div class="table-responsive">  
        =<table class="table table-bordered">
            <form id="customer_edit_form">
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

    <script>
    $(document).ready(function(){
       
        $(document).on('submit', '#customer_edit_form', function(){
            var customer_edit_form=$(this);
            var form_data = JSON.stringify(customer_edit_form.serializeObject());

            // submit form data to api
            echo "here3";

        $.ajax({
            url: "http://localhost/467_final_proj/api/edit_modal.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result){
                location.href='http://localhost/467_final_proj/api/select.php'; 
                echo "here4";
        
            },
            error: function(xhr, resp, text){
                // on error, tell the user login has failed & empty the input boxes
                $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
                login_form.find('input').val('');
            }
        });
            return false;
        });

        $.fn.serializeObject = function(){
 
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

    });
    </script>
    </body>

</html> 
    
