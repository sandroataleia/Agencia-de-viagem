export default "nada";
// LISTAR TODOS
export const setarQtdecheckin = (url) => {
  fetch(url)
  .then(response =>{
    if(!response.ok){
      throw new Error('Erro ao acessar endereço.');
    }
    return response.json();
  })
  .then(data =>{
    console.log(data.lenght);
    for(data; data)
    document.getElementById('qtde_checkin').innerText = data.length;
  })
  .catch(error => {
    console.error('Error:', error);
  });
}

//setInterval(setarQtdecheckin,5*1000);