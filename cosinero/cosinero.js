function init() {
    listarpedidos();

}

function listarpedidos() {
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todo"]
            ],
            "aProcessing": true,
            "aServerSide": false,
            "language": {
                responsive: true,
                url: '../public/js/idioma.json'
            },

            "bDestroy": true,
            responsive: true,
            "iDisplayLength": 10, //Paginación

            "order": [
                [3, "desc"]
            ],

        }

        );
    });

}

init();