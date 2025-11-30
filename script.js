$(document).ready(function(){
  $('#registrationForm').on('submit', function(e){
    let valid = true;
    let msg = '';

    // Name validation
    const name = $('#name').val().trim();
    if(!/^[a-zA-Z .]+$/.test(name)) {
      valid = false; msg += 'Enter valid name. ';
    }
    // Email validation
    const email = $('#email').val().trim();
    if(!/^\S+@\S+\.\S+$/.test(email)) {
      valid = false; msg += 'Enter valid email. ';
    }
    // Phone validation
    const phone = $('#phone').val().trim();
    if(!/^[0-9]{10}$/.test(phone)) {
      valid = false; msg += 'Enter valid 10-digit phone. ';
    }
    // Course
    const course = $('#course').val().trim();
    if(!course) {
      valid = false; msg += 'Select a course. ';
    }
    // Gender
    if(!$('input[name="gender"]:checked').val()) {
      valid = false; msg += 'Select gender. ';
    }
    // DOB
    if(!$('#dob').val()) {
      valid = false; msg += 'Select date of birth. ';
    }
    // Address
    const address = $('#address').val().trim();
    if(!address) {
      valid = false; msg += 'Enter address. ';
    }

    if(!valid) {
      $('#formMessage').removeClass().addClass('error').text(msg).show();
      e.preventDefault();
    } else {
      $('#formMessage').removeClass().addClass('success').text('Form submitted, please wait...').show();
    }
  });
});
