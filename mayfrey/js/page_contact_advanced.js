var PageContactForm = function () {
    return {
        //Contact Form
        initPageContactForm: function () {
	        // Validation
	        $("#formulario").validate({
	            // Rules for form validation
	            rules:
	            {
	                name:
	                {
	                    required: true
	                },
	                email:
	                {
	                    required: true,
	                    email: true
	                },
	                message:
	                {
	                    required: true,
	                    minlength: 10
	                },
	            },              
	            // Messages for form validation
	            messages:
	            {
	                name:
	                {
	                    required: 'Por favor introduzca su nombre',
	                },
	                email:
	                {
	                    required: 'Introduzca su dirección de correo electrónico',
	                    email: 'Por favor, introduzca un email válido'
	                },
	                message:
	                {
	                    required: 'Introduzca su mensaje'
	                }
	            },                  
	            // Ajax form submition                  
	            submitHandler: function(form)
	            {
	                $(form).ajaxSubmit(
	                {
	                    beforeSend: function()
	                    {
	                        $('#formulario button[type="submit"]').attr('disabled', true);
	                    },
	                    success: function()
	                    {
	                        $("#formulario").addClass('submited');
	                    }
	                });
	            },
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }
    };
}();
jQuery(document).ready(function() {
	PageContactForm.initPageContactForm();
});