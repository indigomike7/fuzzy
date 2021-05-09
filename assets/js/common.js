/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	jQuery(document).on("click", ".deleteBagian", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteBagian",
			currentRow = $(this);
		
		var confirmation2 = confirm("Are you sure to delete this bagian tanaman ?");
		
		if(confirmation2)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Bagian successfully deleted"); }
				else if(data.status = false) { alert("Bagian deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	jQuery(document).on("click", ".deleteDiagnosa", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteDiagnosa",
			currentRow = $(this);
		
		var confirmation2 = confirm("Are you sure to delete this Diagnosa ?");
		
		if(confirmation2)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Diagnosa successfully deleted"); }
				else if(data.status = false) { alert("Diagnosa deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deletePenyakit", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletePenyakit",
			currentRow = $(this);
		
		var confirmation2 = confirm("Are you sure to delete this Penyakit ?");
		
		if(confirmation2)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Penyakit successfully deleted"); }
				else if(data.status = false) { alert("Penyakit deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteSolusi", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteSolusi",
			currentRow = $(this);
		
		var confirmation2 = confirm("Are you sure to delete this Solusi ?");
		
		if(confirmation2)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Solusi successfully deleted"); }
				else if(data.status = false) { alert("Solusi deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
