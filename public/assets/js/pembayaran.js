var data = [
    {
        text: "Bank Options",
        children: [
            { id: 1, text: "Bank BCA", image: "assets/img/pembayaran/bca.png" },
            {
                id: 2,
                text: "Bank Briva",
                image: "assets/img/pembayaran/briva.png",
            },
            { id: 3, text: "Bank BNI", image: "assets/img/pembayaran/bni.png" },
            {
                id: 4,
                text: "Bank Permata",
                image: "assets/img/pembayaran/permata.png",
            },
            {
                id: 5,
                text: "Bank Mandiri",
                image: "assets/img/pembayaran/mandiri.png",
            },
            {
                id: 6,
                text: "Bank Alto",
                image: "assets/img/pembayaran/alto.png",
            },
            {
                id: 7,
                text: "Bank Prima",
                image: "assets/img/pembayaran/prima.png",
            },
            {
                id: 8,
                text: "ATM Bersama",
                image: "assets/img/pembayaran/atm-bersama.png",
            },
            {
                id: 9,
                text: "CIMB NIAGA",
                image: "assets/img/pembayaran/cimbniaga.png",
            },
        ],
    },
    {
        text: "E-Wallets",
        children: [
            { id: 1, text: "Gopay", image: "assets/img/pembayaran/gopay.svg" },
            { id: 2, text: "QRIS", image: "assets/img/pembayaran/qris.svg" },
            {
                id: 3,
                text: "Shopee Pay",
                image: "assets/img/pembayaran/shoopepay.svg",
            },
        ],
    },
    {
        text: "Counter",
        children: [
            {
                id: 1,
                text: "Indomaret",
                image: "assets/img/pembayaran/indomaret.svg",
            },
            {
                id: 2,
                text: "Alfamart",
                image: "assets/img/pembayaran/alfamart.svg",
            },
            {
                id: 3,
                text: "Dan+Dan",
                image: "assets/img/pembayaran/dandan.svg",
            },
        ],
    },
];

$(document).ready(function () {
    $("#myDropdown").select2({
        data: data,
        templateResult: formatOption,
        templateSelection: formatOption,
    });
});

function formatOption(option) {
    if (!option.id) {
        return option.text;
    }

    var imageSrc = option.image
        ? '<img class="option-image" src="' + option.image + '" />'
        : "";
    var $option = $(
        '<span class="option-container d-flex row ">' +
            imageSrc +
            '<span class="option-text col-md-7 fw-bold">' +
            option.text +
            "</span></span>"
    );

    return $option;
}
