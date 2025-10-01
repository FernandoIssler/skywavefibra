"use strict";

// Class definition
var KTSignupGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // // Handle form
    // var handleForm = function (e) {
    //     // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    //     validator = FormValidation.formValidation(
    //         form,
    //         {
    //             fields: {
    //                 'first-name': {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'O nome é obrigatório'
    //                         }
    //                     }
    //                 },
    //                 'last-name': {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'O sobrenome é obrigatório'
    //                         }
    //                     }
    //                 },
    //                 'email': {
    //                     validators: {
    //                         regexp: {
    //                             regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
    //                             message: 'Este e-mail é inválido',
    //                         },
    //                         notEmpty: {
    //                             message: 'O e-mail é obrigatório'
    //                         }
    //                     }
    //                 },
    //                 'password': {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'A senha é orbigatória'
    //                         },
    //                         callback: {
    //                             message: 'Digite uma senha válida',
    //                             callback: function (input) {
    //                                 if (input.value.length > 0) {
    //                                     return validatePassword();
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 },
    //                 'confirm-password': {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'A confirmação da senha é obrigatória.'
    //                         },
    //                         identical: {
    //                             compare: function () {
    //                                 return form.querySelector('[name="password"]').value;
    //                             },
    //                             message: 'A senha e a confirmação não são iguais.'
    //                         }
    //                     }
    //                 },
    //                 'toc': {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'Você deve aceitar os termos e condições.'
    //                         }
    //                     }
    //                 }
    //             },
    //             plugins: {
    //                 trigger: new FormValidation.plugins.Trigger({
    //                     event: {
    //                         password: false
    //                     }
    //                 }),
    //                 bootstrap: new FormValidation.plugins.Bootstrap5({
    //                     rowSelector: '.fv-row',
    //                     eleInvalidClass: '',  // comment to enable invalid state icons
    //                     eleValidClass: '' // comment to enable valid state icons
    //                 })
    //             }
    //         }
    //     );

    //     // Handle form submit
    //     submitButton.addEventListener('click', function (e) {
    //         e.preventDefault();

    //         validator.revalidateField('password');

    //         validator.validate().then(function (status) {
    //             if (status == 'Valid') {
    //                 // Show loading indication
    //                 submitButton.setAttribute('data-kt-indicator', 'on');

    //                 // Disable button to avoid multiple click
    //                 submitButton.disabled = true;

    //                 // Simulate ajax request
    //                 setTimeout(function () {
    //                     // Hide loading indication
    //                     submitButton.removeAttribute('data-kt-indicator');

    //                     // Enable button
    //                     submitButton.disabled = false;

    //                     // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
    //                     Swal.fire({
    //                         text: "You have successfully reset your password!",
    //                         icon: "success",
    //                         buttonsStyling: false,
    //                         confirmButtonText: "Ok",
    //                         customClass: {
    //                             confirmButton: "btn btn-primary"
    //                         }
    //                     }).then(function (result) {
    //                         if (result.isConfirmed) {
    //                             form.reset();  // reset form
    //                             passwordMeter.reset();  // reset password meter
    //                             //form.submit();

    //                             //form.submit(); // submit form
    //                             var redirectUrl = form.getAttribute('data-kt-redirect-url');
    //                             if (redirectUrl) {
    //                                 location.href = redirectUrl;
    //                             }
    //                         }
    //                     });
    //                 }, 1500);
    //             } else {
    //                 // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
    //                 Swal.fire({
    //                     text: "Desculpe, parece que foram detectados alguns erros. Por favor, tente novamente.",
    //                     icon: "error",
    //                     buttonsStyling: false,
    //                     confirmButtonText: "Ok",
    //                     customClass: {
    //                         confirmButton: "btn btn-primary"
    //                     }
    //                 });
    //             }
    //         });
    //     });

    //     // Handle password input
    //     form.querySelector('input[name="password"]').addEventListener('input', function () {
    //         if (this.value.length > 0) {
    //             validator.updateFieldStatus('password', 'NotValidated');
    //         }
    //     });
    // }


    // Handle form ajax
    
    var handleFormAjax = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'first_name': {
                        validators: {
                            notEmpty: {
                                message: 'O nome é obrigatório'
                            }
                        }
                    },
                    'last_name': {
                        validators: {
                            notEmpty: {
                                message: 'O sobrenome é obrigatório'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Este e-mail é inválido',
                            },
                            notEmpty: {
                                message: 'O e-mail é obrigatório'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'A senha é obrigatória'
                            },
                            callback: {
                                message: 'Digite uma senha válida',
                                callback: function (input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'A confirmação da senha é obrgatória'
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'A senha e a confirmação não são iguais'
                            }
                        }
                    },
                    'agree': {
                        validators: {
                            notEmpty: {
                                message: 'Você precisa aceitar os termos e condições'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validator.revalidateField('password');

            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;


                    // Check axios library docs: https://axios-http.com/docs/intro
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {
                        const redirectUrl = response.data.redirect;
                        if (redirectUrl) {
                            form.reset();

                            if (redirectUrl) {
                                location.href = redirectUrl;
                            }
                        } else {
                            // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: response.data.message.text,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    }).catch(function (error) {
                        Swal.fire({
                            text: "Desculpe, parece que foram detectados alguns erros. Por favor, tente novamente.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }).then(() => {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;
                    });

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Desculpe, parece que foram detectados alguns erros. Por favor, tente novamente.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });

        // Handle password input
        form.querySelector('input[name="password"]').addEventListener('input', function () {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }


    // Password input validation
    var validatePassword = function () {
        return (passwordMeter.getScore() > 50);
    }

    var isValidUrl = function(url) {
        try {
            new URL(url);
            return true;
        } catch (e) {
            return false;
        }
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            // Elements
            form = document.querySelector('#kt_sign_up_form');
            submitButton = document.querySelector('#kt_sign_up_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            if (isValidUrl(submitButton.closest('form').getAttribute('action'))) {
                handleFormAjax();
            } else {
                handleForm();
            }
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
