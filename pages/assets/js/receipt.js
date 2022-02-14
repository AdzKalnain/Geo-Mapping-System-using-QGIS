// const $btnPrint = document.querySelector("#btnPrint");
// $btnPrint.addEventListener("click", () => {
//     window.print();
// });

function PrintDiv(id) {
    var data=document.getElementById(id).innerHTML;
    var myWindow = window.open('', '', 'height=900,width=900');
    myWindow.document.write('<html><head><title></title>');
    //myWindow.document.write('<link rel="stylesheet" href="receipt.css" media="print" type="text/css" />');
    myWindow.document.write('</head><body >');
    myWindow.document.write(data);
    myWindow.document.write('</body></html>');
    myWindow.document.close(); // necessary for IE >= 10

    myWindow.onload=function(){ // necessary if the div contain images

        myWindow.focus(); // necessary for IE >= 10
        myWindow.print();
        myWindow.close();
    };
}