
function  loadTable(page){
    $.ajax({
        url:'home_ajax_data.php',
        type:'POST',
        data:{page_no:page},
        success:function(data){
            $('.item-container').html(data);
        }
    })
}
loadTable();

$(document).on('click','#home-pagination a',function(e){
    e.preventDefault();
    var page_id=$(this).attr("id");
    loadTable(page_id);
})

$(document).on('click','tr td button',function(){
    let  id=$(this).attr('id');
    let data_id=$(this).data('role');
  
    if(id=='edit')
    {
    
      window.location=`edit.php?page=${data_id}`;
    }
    if(id=='delete')
    { 
      // let userConfirmation=confirm("Are you really want to delete the item?");
      // document.getElementById("delete").addEventListener('click',function(){
      //   let notifier = new AWN();
      //    notifier.confirm("Do you wan to delete this item");
    
      let notifier=new AWN();
      let onOk=()=>{
        window.location=`delete.php?page=${data_id}`;
      }
      let onCancel=()=>{
        notifier.info('You pressed Cancel');
       }
    
         notifier.confirm('your notification message',onOk,onCancel,{
        labels:{
            confirm:'Simple notification'
        }
    
      }) 

       
    
      // if(userConfirmation){
      //   window.location=`delete.php?page=${data_id}`;
      // }
     

    }
  })

  $(document).on('click','table tr .id_name',function(){
    
    let data_id=$(this).data('tdid');
  
      window.location=`details.php?page=${data_id}`;
  

  });
  
  $(document).on('mouseenter','tr',function(e){
      $(this).find('.button-star').show()
  })

  $(document).on('mouseleave','tr',function(){
    $(this).find('.button-star').hide()
})

var clickCheck = 0;
$(document).on('click','tr td button',function(){
  
   if(clickCheck==0){
    var favourite_id=$(this).data('star');
    $(this).find('i').removeClass('fa-regular');
    $(this).find('i').addClass('fa-solid');
    clickCheck=1;
    $.ajax({
      url:"favourite.php",
      type:'post',
      data:{row_id:favourite_id,favourite:1},
      success:function(response){
        
          
      }
    })
    // console.log("this is checkvalue"+clickCheck);
   }else{
    var favourite_id=$(this).data('star');
    $(this).find('i').removeClass('fa-solid');
    $(this).find('i').addClass('fa-regular');
    clickCheck=0
    $.ajax({
      url:"favourite.php",
      type:'post',
      data:{row_id:favourite_id,favourite:0},
      success:function(response){
            
      }
    })
    // console.log("this is checkvalue"+clickCheck);
   }

})