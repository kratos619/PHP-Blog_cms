tinymce.init({ selector:'textarea' });
$(document).ready(function(){
  $('#selectAllCheckbox').click(function(event){
    if(this.checked){
      $('.checkbox').each(function(){
        this.checked = true;
      });
    }else{
        $('.checkbox').each(function(){
        this.checked = false;
      });
    }

  });
});
