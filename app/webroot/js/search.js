$(document).ready(function() {
	$("#x").autocomplete({
	    minLength: 2,
	    select: function(event, ui){
	        $('#x').val(ui.util.label);
	    },
	    source: function(request, response){
	        $.ajax({
	            url: basePath + "mangas/searchjson",
	            data: {
	                term: request.term
	            },
	            dataType: "json",
	            success: function(data){
	                response($.map(data,function(el, index){
	                    return {
	                        value: el.Manga.nombre,
	                        nombre: el.Manga.nombre,
	                        image: el.Manga.image,
	                    }
	                }));
	            }
	        });
	    }
	}).data("ui-autocomplete")._renderItem = function(ul, item){
	    return $("<li></li>")
	    .data("item.autocomplete", item)
	    .append("<a><img width='40' src='" + basePath + "/app/webroot/img/" + "/" + item.image + "'/>" + item.nombre +"</a>")
	    .appendTo(ul)
	};
});
