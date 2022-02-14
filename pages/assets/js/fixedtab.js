// Script that prevent opening the default tab after refresh
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#order-tab a[href="' + activeTab + '"]').tab('show');
    }
});