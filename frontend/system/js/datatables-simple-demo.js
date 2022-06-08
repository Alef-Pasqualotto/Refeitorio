window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    data = document.getElementById("data-pesquisa");    
    data.addEventListener("focusout", ()=>{window.location.href = `../../../refeitorio/frontend/system/cardapio.php?data=${data.value}`});
});
