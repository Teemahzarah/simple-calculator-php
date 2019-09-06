var Calculator = new function () {
  this.documentObject = null
  this.onload = function (documentObject) {
    Calculator.documentObject = documentObject
    $('.calculator-keybord button', Calculator.documentObject).click(function () {
      var button = $(this).html()
      var display = $('.calculator-display-current', Calculator.documentObject).html()
      Calculator.processInput(display, button)
    })
  }
  this.processInput = function (display, button) {
    $.ajax({
      async: true,
      type: 'post',
      datatype: 'json',
      url: '/calculate',
      data: { display: display, button: button },
      success: function (result) {
        try {
          $('.calculator-display-current', Calculator.documentObject)
            .html(result.current)
        } catch (error) {
          console.error(error)
        }
      },
      error: function (error) {
        console.error(error)
      }
    });
  }
};