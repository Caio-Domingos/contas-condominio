$(document).ready(function() {
  // console.log('Teste');
  listarValores();
});

function listarValores() {
  const url = 'http://localhost/contas-condominio/requests/listarValores.php';
  $.get(url, (data, status) => {
    const json = JSON.parse(data);
    // console.log(json);

    json.forEach(el => {
        const linha = '<tr>' +
            '<td scope="row">' + el.dateInclusao + '</td>' +
            '<td>' + el.cemig + '</td>' +
            '<td>' + el.copasa + '</td>' +
            '<td>' + el.tarifa + '</td>' +
            '<td>' + el.limpeza + '</td>' +
            '<td>' + el.outros + '</td>' +
            '<td class="d-none d-md-block">' + el.qtdMoradores + '</td>' +
            '<td>' + el.resultado.toFixed(2) + '</td>' +
            '<td>' + el.resultadoPorMoradores.toFixed(2) + '</td>' +
        '</tr>';
    
        $('#corpo-tabela').append(linha)
    })
  });
}
