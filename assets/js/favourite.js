$('#remove-favourite').click(function(){

    let favourite_id=$(this).data('id');
    alert(favourite_id);
    $.ajax({
      url:"favourite.php",
      type:'post',
      data:{row_id:favourite_id,favourite:0},
      success:function(response){ 
        if(response==1){
          window.location="favourite_data.php";
        }
      }
    })

})