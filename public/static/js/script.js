$(document).ready(function() {
  $('input').each(function() {
    if (this.type !== 'submit') {
      this.setCustomValidity('กรุณากรอกข้อมูลให้ครบถ้วน')
      if (this.type !== 'radio') {
        addEvent(this, 'input')
      } else {
        addEvent(this, 'click')
      }
    }
  })

  $('textarea').each(function() {
    this.setCustomValidity('กรุณากรอกข้อมูลให้ครบถ้วน')
    this.addEventListener('input', function() {
        if (this.value.trim() === '') {
          this.setCustomValidity('กรุณากรอกข้อมูลให้ครบถ้วน')
        } else {
          this.setCustomValidity('')
        }
      }, false)
  })
})

function removeValue(e) {
  var selectedId = $(e)
    .children(':selected')
    .attr('id')
  $('option.edu').each(function() {
    if (selectedId !== this.id && e.value === this.value) {
      $(this).remove()
    }
  })
  $(e).attr('disabled', true)
}

function setCustomValidate(name, message) {
  $('input[name="' + name + '"]').each(function() {
    this.setCustomValidity(message)
  })
}

function addEvent(element, event) {
  element.addEventListener(event, function() {
    if (element.value.trim() === '') {
      setCustomValidate(element.name, 'กรุณากรอกข้อมูลให้ครบถ้วน')
    } else {
      setCustomValidate(element.name, '')
    }
  }, false)
}