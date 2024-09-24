//Fecth API 
const listarTodos = (url) => {
  fetch('http://localhost/erp/'+url)
  .then(response => response.json())
  .then(data => {
    
    let table = new DataTable('#myTable');
    table.rows.add(rows);
    console.log(data);
  })
  .catch((error) => console.error('Error:', error));
}