$(document).ready(function(){
  //SETAR QUANTIDADE CHECKIN
  const setarQtdecheckin = () => {
    fetch('http://localhost/erp/listarCheckin')
    .then(response =>{
      if(!response.ok){
        throw new Error('Erro ao acessar endereço.');
      }
      return response.json();
    })
    .then(data =>{
      console.log(data);
      document.getElementById('qtde_checkin').innerText = data.length;

      let html = '';
      for(let i=0;i<data.length;i++){
        html += 
        `
        
          <a href="#" class="dropdown-item">
             ${data[i].nome}
            <span class="float-right text-muted" id="cpf_checkin">${data[i].hora_embarque}</span>
          </a>
          <div class="dropdown-divider"></div>
          
        `;
      }
      $('#checkins').html(html);
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  setarQtdecheckin();
  setInterval(setarQtdecheckin,5*1000);


  //#####################  DATATABLE ################3
  let table = new DataTable('#datatable',{
      language:{
          url: '//cdn.datatables.net/plug-ins/2.0.5/i18n/pt-BR.json',
      },
      order: [0, 'desc']
  });

  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#celular').mask('(00) 0 0000-0000');
  $('#telefone').mask('(00) 0000-0000');
  $('#cep').mask('00000-000');


  $('.select2').select2(
      {
          theme: 'bootstrap4'
        }
  );
  $('#select2').select2({
      theme: 'bootstrap4'
    })
});