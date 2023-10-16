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