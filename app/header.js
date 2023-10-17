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

    $('#header-btn1').show();
})

$('#header-btn1').click(function(){
    $("#header-search").val("");
    $(".header-list-container").hide();
    $('#header-btn1').hide();

 })

 $(document).on('click',".header-search-item",function(){
    let pageId=$(this).data('trid');
    window.location = `edit.php?page=${pageId}`;
  });