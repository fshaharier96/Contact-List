

$(document).ready(function(){
$('tr td button').click(function(){
  // alert("button is clicked")
    let favourite_id=$(this).data("favour");
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

})