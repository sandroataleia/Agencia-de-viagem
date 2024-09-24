function excluir(id,url){
    if(confirm('Tem certeza que deseja excluir?')){
        window.location='http://localhost/erp/'+url+'/excluir/'+id;
    }
}

function preview(input) {
    
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#preview_image').attr('src', e.target.result)
          .width(168)
          .height(178);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

