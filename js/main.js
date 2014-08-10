$(function() {
    /*
    $("button#submit").click(function(){
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: $('#product_form').serialize(),
            success: function(msg){
                //alert("success");
            },
            error: function(){
                //alert("failure");
            }
        });
    });
    */
    $('#navTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show');
    });
});
