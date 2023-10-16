let file=$('#edit-file-id');
file.on("change",function(event){
    var x = URL.createObjectURL(event.target.files[0]);
    $('#edit-image-id').attr("src",x);
    $('#edit-image-id').css('display','block');
    $('.edit-img-icon').hide();

})