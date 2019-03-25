$(document).ready(function() {
  console.log('Teste');
  pegarEstatisticas();
});

const mesesDoAno = [
  'Janeiro',
  'Fevereiro',
  'Março',
  'Abril',
  'Maio',
  'Junho',
  'Julho',
  'Agosto',
  'Setembro',
  'Outubro',
  'Novembro',
  'Dezembro'
];

function pegarEstatisticas() {
  const url =
    'http://localhost/contas-condominio/requests/coletarEstatisticas.php';
  $.get(url, data => {
    const json = JSON.parse(data);
    const copasaMais = {
      mes: mesesDoAno[Number(json[0].dateInclusao.split('/')[1]) - 1],
      valor: json[0].copasa
    };
    const copasaMenos = {
      mes: mesesDoAno[Number(json[1].dateInclusao.split('/')[1]) - 1],
      valor: json[1].copasa
    };
    const cemigMais = {
      mes: mesesDoAno[Number(json[2].dateInclusao.split('/')[1]) - 1],
      valor: json[2].cemig
    };
    const cemigMenos = {
      mes: mesesDoAno[Number(json[3].dateInclusao.split('/')[1]) - 1],
      valor: json[3].cemig
    };
    console.log(json);
    console.log([copasaMais, copasaMenos, cemigMais, cemigMenos]);

    $('#campo-mais-agua').text(
      copasaMais.mes + ': R$ ' + copasaMais.valor + '.00'
    );
    $('#campo-mais-luz').text(
      cemigMais.mes + ': R$ ' + cemigMais.valor + '.00'
    );
    $('#campo-menos-agua').text(
      copasaMenos.mes + ': R$ ' + copasaMenos.valor + '.00'
    );
    $('#campo-menos-luz').text(
      cemigMenos.mes + ': R$ ' + cemigMenos.valor + '.00'
    );
    $('#campo-total').text('R$ ' + json[4].toFixed(2));
    $('#campo-moradores').text('R$ ' + json[5].toFixed(2));
  });
}
