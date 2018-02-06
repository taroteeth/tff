class contactForm {
  constructor(form) {
    this.form = form;
    this.fields = form.querySelectorAll('.field');
    this.fieldsArr = [];
    this.errors = false;

    for(var i = 0; i < this.fields.length; i++) {
      this.fieldsArr[i] = {
        'ele': this.fields[i],
        'name' : (this.fields[i].querySelector('input')) ? this.fields[i].querySelector('input').name : this.fields[i].querySelector('textarea').name,
        'input': (this.fields[i].querySelector('input')) ? this.fields[i].querySelector('input') : this.fields[i].querySelector('textarea'),
        'value': (this.fields[i].querySelector('input')) ? this.fields[i].querySelector('input').value : this.fields[i].querySelector('textarea').value,
        'inlineMsg': this.fields[i].querySelector('.inline-msg')
      }
    }

    console.log(this.fieldsArr);

    // Messages
    this.validationErrors = {
      'required': 'Required',
      'name': 'At least 4 characters',
      'email': 'Enter a valid email address',
      'invalid': 'invalid characters',
      'human': 'incorrect'
    }

    form.addEventListener('submit', function(evt) {
      evt.preventDefault();
      this.clearErrors();
      this.validateForm();
    }.bind(this));
  }

  clearErrors() {
    this.errors = false;
    for(var i = 0; i < this.fieldsArr.length; i++) {
      this.fieldsArr[i].ele.classList.remove('error');
      if(this.fieldsArr[i].inlineMsg) {
        this.fieldsArr[i].inlineMsg.innerHTML = '';
      }
    }
  }

  validateForm() {
    for(var i = 0; i < this.fieldsArr.length; i++) {
      var input = this.fieldsArr[i].input,
          value = input.value,
          inlineMsg = this.fieldsArr[i].inlineMsg;

      if(input.required && !value) {
        this.errors = true;
        inlineMsg.innerHTML = this.validationErrors.required;
        this.fieldsArr[i].ele.classList.add('error');
      }

      // if(!this.validateChars(value)) {
      //   this.errors = true;
      //   inlineMsg.innerHTML = this.validationErrors.invalid;
      //   this.fieldsArr[i].ele.classList.add('error');
      // }

      // TODO General special characters validation
      // TODO Better way to implement error class on fields

      switch(input.type) {
        case 'text':
          if(input.name == 'full_name'){
            if(!this.validateName(value)) {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.name;
              this.fieldsArr[i].ele.classList.add('error');
            }
          }
          if(input.name == 'not_human') {
            if(!value) {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.required;
              this.fieldsArr[i].ele.classList.add('error');
            } else if(value !== '9') {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.human;
              this.fieldsArr[i].ele.classList.add('error');
            }
          }
          break;
        case 'email':
          if(!this.validateEmail(value)) {
            this.errors = true;
            inlineMsg.innerHTML = this.validationErrors.email;
            this.fieldsArr[i].ele.classList.add('error');
          }
          break;
        case 'message':
          // TODO validate textarea
          break;
      }
    }

    if(!this.errors) {
      this.submitForm();
    }
  }

  validateName(value) {
    if(value){
      if(value.length <= 3) {
        return false;
      } else {
        return true;
      }
    }
  }

  validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  validateChars(value){
    var re = /[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g;
    return re.test(String(value).toLowerCase());
  }

  validateRequired() {

  }

  submitForm() {
    var data = {
      'action' : 'contact_form_submit'
    }

    for(var i = 0; i < this.fieldsArr.length; i++) {
      var name = this.fieldsArr[i].name,
          value = this.fieldsArr[i].input.value;

      data[name] = value;
    }

    jQuery.ajax({
			method : 'post',
			url : ajaxurl,
			data : data,
			error : function(xhr, status, error){
				console.log(xhr, status, error);
			},
			success : function(data, status, xhr){
        console.log(data);
			}
	  });
  }

}

if(document.getElementById('contact-form')) {
  var contactFormObj = new contactForm(document.getElementById('contact-form'));
}
