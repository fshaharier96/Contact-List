
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
