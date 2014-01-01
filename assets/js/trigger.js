$(document).ready(function(){
	$("#datepicker").datepicker();
	$("#e1").select2();
	$("#datatable").dataTable({
		"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
		"oLanguage": {
        	"sLengthMenu": "_MENU_",
                "sSearch": ""
    	}
	}).each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')
 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '90px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')

        // PAGINATE
        var paginate = datatable.closest('.dataTables_wrapper').find('div[id$=_paginate]');
        paginate.addClass('pagination');
    });
	$(nPaging).append(
    '<ul class="pagination">'+
        '<li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i> '+oLang.sPrevious+'</a></li>'+
        '<li class="next disabled"><a href="#">'+oLang.sNext+' <i class="icon-double-angle-right"></i></a></li>'+
    '</ul>'
	);
});