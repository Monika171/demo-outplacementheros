$(document).ready(function(){

// initialize the plugin

$('#frmParameter2').validate({
	rules: {
		
		cmbParameter2: {
			required: true
		},
		mytext: {
			required: true
		}
		
	}
});

// dynamically change the rules (add)

$('#cmbParameter2').on('change', function () {

	$('input[name="mytext"]').rules('remove');

	if ($(this).val() == 'Percentage') {  // Amount
		$('input[name="mytext"]').rules('add', {
			 
			required: true,
			range: [1, 100]
		});
	}else if ($(this).val() == 'CGPA(Scale of 10)') {  // Name
		$('input[name="mytext"]').rules('add', {
			 required: true,
			 range: [1, 10]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 9)') {  // Name
		$('input[name="mytext"]').rules('add', {
			  required: true,
			 range: [1, 9]
		   
		});
	}else if ($(this).val() == 'CGPA(Scale of 8)') {  // Name
		$('input[name="mytext"]').rules('add', {
							required: true,                 
			 range: [1, 8]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 7)') {  // Name
		$('input[name="mytext"]').rules('add', {
			 required: true,
			 range: [1, 7]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 5)') {  // Name
		$('input[name="mytext"]').rules('add', {
		   required: true,
			 range: [1, 5]
		});
	} else if ($(this).val() == 'CGPA(Scale of 4)') {  // Name
		$('input[name="mytext"]').rules('add', {
			 required: true,
			 range: [1, 4]
			
		});
	}
	
	$('input[name="mytext"]').valid();  // trigger validation of the text field (optional)

});

//edit performance
$('#frmParameter3').validate({
	rules: {	
		cmbParameter3: {
			required: true
		},
		mytext3: {
			required: true
			
		}
	}
});
// dynamically change the rules (edit)

$('#cmbParameter3').on('change', function () {

	$('input[name="mytext3"]').rules('remove');

	if ($(this).val() == 'Percentage') {  // 
		$('input[name="mytext3"]').rules('add', {
			 
			required: true,
			range: [1, 100]
		});
	}else if ($(this).val() == 'CGPA(Scale of 10)') {  // Name
			$('input[name="mytext3"]').rules('add', {
			 required: true,
			 range: [1, 10]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 9)') {  // Name
		$('input[name="mytext3"]').rules('add', {
			  required: true,
			 range: [1, 9]
		   
		});
	}else if ($(this).val() == 'CGPA(Scale of 8)') {  // Name
		$('input[name="mytext3"]').rules('add', {
			required: true,                 
			 range: [1, 8]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 7)') {  // Name
		$('input[name="mytext3"]').rules('add', {
			 required: true,
			 range: [1, 7]
			
		});
	}else if ($(this).val() == 'CGPA(Scale of 5)') {  // Name
		$('input[name="mytext3"]').rules('add', {
		   required: true,
			 range: [1, 5]
		});
	} else if ($(this).val() == 'CGPA(Scale of 4)') {  // Name
		$('input[name="mytext3"]').rules('add', {
			 required: true,
			 range: [1, 4]
			
		});
	}
	
	$('input[name="mytext3"]').valid();  // trigger validation of the text field (optional)
	//console.log("changeeee10");
});
	
	
	 // Add new Educational background
   	$(document).on('click', '#addNewEducation', function(event){ 
	event.preventDefault();
	//console.log('i was here');
	var qualification = $(this).parent().siblings().find('#addQualification');
	var course = $(this).parent().siblings().find('#addCourse');
	var specialization = $(this).parent().siblings().find('#addSpecialization');
	var institute = $(this).parent().siblings().find('#addInstitute');
	var c_type = $(this).parent().siblings().find('#addCourseType');
	var cmbParameter2 = $(this).parent().siblings().find('#cmbParameter2');
	var mytext = $(this).parent().siblings().find('#mytext');
   	var p_year = $(this).parent().siblings().find('#addPassingYear');

    $('.loading').show();
	    $.ajax({ 
	        type: 'post',
	        url: '/user/profile/education/store',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
				qualification:qualification.val(),
			  course:course.val(),
			  specialization:specialization.val(),
	          institute:institute.val(),
			  c_type:c_type.val(),
			  cmbParameter2:cmbParameter2.val(),
			  mytext:mytext.val(),
	          p_year:p_year.val(),
	        },success: function(data) { 
				//console.log('socus');
				qualification.val("");    
				course.val("");
				specialization.val("");
				institute.val("");
				c_type.val("");
				cmbParameter2.val("");
			 	mytext.val("");
	        	p_year.val("");
	            $('#educationBackgroundBody').load(' #educationBackgroundBody > div');
	            toastr.success(' ', 'Education Background Added', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
	});

   // Edit Educational Background
   $(document).on('click', '.editEducation', function(){ 
	   id = $(this).data('id');
	  
		var qualification = $(this).parent().siblings().find('#editQualification').val();
		var course = $(this).parent().siblings().find('#editCourse').val();
		var specialization = $(this).parent().siblings().find('#editSpecialization').val();
		var institute = $(this).parent().siblings().find('#editInstitute').val();
		var c_type = $(this).parent().siblings().find('#editCourseType').val();
		var cmbParameter2 = $(this).parent().siblings().find('#cmbParameter3').val();
		var mytext = $(this).parent().siblings().find('#mytext3').val();
		var p_year = $(this).parent().siblings().find('#editPassingYear').val();
   	
    $('.loading').show();
   		 $.ajax({ 
	        type: 'post',
	        url: '/user/profile/education/update',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	  
					id: id,
					qualification:qualification,
					course:course,
					specialization:specialization,
					institute:institute,
					c_type:c_type,
					cmbParameter2:cmbParameter2,
			 		mytext:mytext,
					p_year:p_year
	        },success: function(data) {    
	            $('#educationBackgroundBody').load(' #educationBackgroundBody > div');
	            toastr.success(' ', 'Education Background Updated', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
   });



   // Delete Educational Background
   $(document).on('click', '.deleteEducation', function(){ 
	
	   id = $(this).data('id');
	   
    $('.loading').show();
   		$.ajax({ 
	        type: 'post',
	        url: '/user/profile/education/delete',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	       	  id: id
	        },success: function(data) {  
	            $('#educationBackgroundBody').load(' #educationBackgroundBody > div');
	            toastr.success(' ', 'Deleted', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
  }); 	

	// Add Work Background
   $(document).on('click', '.addNewWorkButton', function(){ 
		var company = $(this).parent().siblings().find('#addCompany');
		var industry = $(this).parent().siblings().find('#addIndustry');
	   	var designation = $(this).parent().siblings().find('#addDesignation');
	   	var func = $(this).parent().siblings().find('#addFunc');
	   	var start_date = $(this).parent().siblings().find('#addStartDate');
	   	var end_date = $(this).parent().siblings().find('#addEndDate');
   		var description = $(this).parent().siblings().find('#addWorkDescription');
    $('.loading').show();
	    $.ajax({ 
	        type: 'post',
	        url: '/user/profile/work/store',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
				company: company.val(),
				industry: industry.val(),
				designation: designation.val(),
				func: func.val(),
				start_date: start_date.val(),
				end_date: end_date.val(),
				description: description.val()
	        },success: function(data) {     
	        	company.val("");
				industry.val("");
				designation.val("");
				func.val("");
				start_date.val("");
				end_date.val("");
	        	description.val("");
	            $('.workBackgroundBody').load(' .workBackgroundBody > div');
	            toastr.success(' ', 'New Work Added', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
	});


    // Edit Work Background
   $(document).on('click', '.editWorkBackground', function(){ 
   		var id = $(this).data('id');
   		var company = $(this).parent().siblings().find('#editCompany').val();
		var industry = $(this).parent().siblings().find('#editIndustry').val();
	   	var designation = $(this).parent().siblings().find('#editDesignation').val();
	   	var func = $(this).parent().siblings().find('#editFunc').val();
	   	var start_date = $(this).parent().siblings().find('#editStartDate').val();
	   	var end_date = $(this).parent().siblings().find('#editEndDate').val();
		var description = $(this).parent().siblings().find('#editWorkDescription').val();
		   
    $('.loading').show();
   		 $.ajax({ 
	        type: 'post',
	        url: '/user/profile/work/update',
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data: {
	       	  id: id,
				company:company,
				industry:industry,
				designation:designation,
				func:func,
				start_date:start_date,
				end_date:end_date,
	          	description:description
	        },success: function(data) {    
	            $('.workBackgroundBody').load(' .workBackgroundBody > div');
	            toastr.success(' ', 'Education Background Updated', {timeOut: 3000, positionClass: 'toast-top-center'});
	            $('.loading').hide();
	        }
	    });
   });

   // Delete Work Background
   $(document).on('click', '.deleteWork', function(){ 
   	var id = $(this).data('id');
		   		$.ajax({ 
			        type: 'post',
			        url: '/user/profile/work/delete',
			        headers: {
			          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },
			        data: {
			       	  id: id
			        },success: function(data) {  
			            $('.workBackgroundBody').load(' .workBackgroundBody > div');
			            toastr.success(' ', 'Deleted', {timeOut: 3000, positionClass: 'toast-top-center'});
			            $('.loading').hide();
			        }
			    });
  }); 	

});//document.ready