// $(document).ready(function(){
//   $.ajax({
//     url:'home_ajax_star_data.php',
//     type:'POST',
//     success:function(data){
//       $('.favourite-container').html(data)
//     }
//   });

// })
function loadStarTable(){
$.ajax({
  url:'home_ajax_star_data.php',
  type:'POST',
  success:function(data){
    $('.favourite-container').html(data);

  }
});
}
loadStarTable()
 

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

let clickCheck = 0;
$(document).on('click','tr td #star-id',function(){
  
   if(clickCheck==0){
    let favourite_id=$(this).data('star');
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
    let favourite_id=$(this).data('star');
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


/* home page  trash button*/

$('#trash_items').click(function(){
  window.location="trash_data.php";
})

