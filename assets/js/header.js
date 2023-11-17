let btn=$(".header-add");
let url=window.location.pathname;
let filename=url.substring(url.lastIndexOf('/')+1);

if(filename=="create.php")
{
    btn.hide();
}
$(".header-add").on('click',function(){
    window.location='create.php';
})


$('#header-search').on("keyup",function(){
    // alert('this is input')
    let searchText= $(this).val();
    console.log(searchText);
  
    $.ajax({
        url:"search.php",
        type:'post',
        data:{text:searchText},
        success:function(data){
            $(".header-list-container").show();
            $('#tbl1').html(data);
        }    
    })

    $('#header-btn2').show();
})

$('#header-btn2').click(function(){
    $("#header-search").val("");
    $(".header-list-container").hide();
    $('#header-btn2').hide();

 })

 $(document).on('click',".header-search-item",function(){
    let pageId=$(this).data('trid');
    window.location = `details.php?page=${pageId}`;
  });

  $('#header-toggle-button').click(function(){
     $('#home-left-container').animate({
        width:'toggle'
     },200);
    
  })