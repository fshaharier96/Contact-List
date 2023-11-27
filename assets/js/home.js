// $(document).ready(function(){
//   $.ajax({
//     url:'home_ajax_star_data.php',
//     type:'POST',
//     success:function(data){
//       $('.favourite-container').html(data)
//     }
//   });

// })


function  loadTable(page){
    $.ajax({
        url:'home_ajax_data.php',
        type:'POST',
        data:{page_no:page},
        success:function(data){
            $('.item-container').html(data);
            // let element=data;
            // let favourite = element.find('button').data('favour');
            // if(favourite==1){
            //   $(".favourite-container")
            // }
    
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
        // window.location=`trash.php?id=${data_id}`;
        $.ajax({
          url:"trash.php",
          type:'post',
          data:{contact_id:data_id},
          success:function(data){
            notifier.info(data)
          }
        })


      }
      let onCancel=()=>{
        notifier.info('You pressed Cancel');
       }
     notifier.confirm('your notification message',onOk,onCancel,{
      labels:{
            confirm:'Simple notification',
            confirmOk:'Move to trash',
            confirmCancel:'Cancel'
            
        },
       
      
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


$(document).on('click','tr td .mstar',function(){
   let favourite_check=$(this).data('favour');
   console.log("this is if block"+favourite_check)
   if(favourite_check==0){
    let favourite_id=$(this).data('star');
    $(this).removeClass("btn-warning");
    $(this).addClass("btn-info");
    $.ajax({
      url:"favourite.php",
      type:'post',
      data:{row_id:favourite_id,favourite:1},
      success:function(response){ 
        loadTable();
        new AWN().success("contact added to favourites")
      }
    })
 

   }else{
    console.log("this is else block"+favourite_check)
    let favourite_id=$(this).data('star');
    $(this).removeClass("btn-info");
    $(this).addClass("btn-warning");
    $.ajax({
      url:"favourite.php",
      type:'post',
      data:{row_id:favourite_id,favourite:0},
      success:function(response){
        loadTable();
        new AWN().warning("contact removed from favourites")
      }
    })

   }

})




/* home page left menu favourite button */
$('#favourite_items').click(function(){
  window.location="favourite_data.php";
})


/* home page  trash button*/

$('#trash_items').click(function(){
  window.location="trash_data.php";
})

