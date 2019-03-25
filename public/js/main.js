$(document).ready(function() {
  criarOpcoesDoSelect();

  $('form').submit(function(event) {
    console.log('submit');
    event.preventDefault();
    let obj = {};
    $(this)
      .serializeArray()
      .forEach(el => {
        obj[el.name] = el.value;
      });

    incluirValores(obj);
    $(this).trigger('reset');
  });
});

function criarOpcoesDoSelect() {
  for (let index = 1; index <= 20; index++) {
    const option =
      '<option value="' + index.toString() + '">' + index + '</option>';

    $('#qtdMoradores').append(option);
  }
}

function incluirValores(data) {
  const url = 'http://localhost/contas-condominio/requests/incluirValores.php';
  $.post(url, data, (data, status) => {
    if (data == 1) {
      $('#alert-inclusao').fadeToggle();
      setTimeout(() => {
        $('#alert-inclusao').fadeToggle();
      }, 3000);
    }
  });
}
