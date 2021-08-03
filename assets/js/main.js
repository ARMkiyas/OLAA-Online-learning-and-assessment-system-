$(document).ready(function () {

 const url = 'https://restcountries.eu/rest/v2/all?fields=name'



  jQuery.ajax({
    url: url,
    type: "GET",
    success: function (result) {

        // console.log(country_list);
        for (let i = 0; i < result.length; i++) {
          update_country(result[i].name);
        }

        function search_country(input) {

          for (let i = 0; i < result.length; i++) {
            if (result[i].name == input) {

              return true;
              break;
            }
          }
        }

        jQuery.validator.addMethod("s", function (value, element) {
          if (value != 0 && search_country(value) && value != "") {
            return true;
          } else {
            return false;
          }
        }, "Select your country name");

    },
    error: function (error) {
      console.log("asdf");
    }
  })


 

  // setTimeout(function () {
  //   // console.log(country_list);
  //   for (let i = 0; i < country_list.length; i++) {
  //     update_country(country_list[i].name);
  //   }

  //   function search_country(input) {

  //     for (let i = 0; i < country_list.length; i++) {
  //       if (window.country_list[i].name == input) {

  //         return true;
  //         break;
  //       }
  //     }
  //   }

  //   jQuery.validator.addMethod("s", function (value, element) {
  //     if (value != 0 && search_country(value) && value != "") {
  //       return true;
  //     } else {
  //       return false;
  //     }
  //   }, "Select your country name");

  // }, 100)

  function update_country(country_name) {
    $(".custom-select").append("<option value=\"" + country_name + "\">" + country_name + "</option>");
  }



  let forgot = $("#fogot_password").find("#back_login");

  forgot.click(function () {
    $("#link_fogot").removeClass("active");
    forgot.removeClass("active");
  })


  $("#profile_pic").change(function () {
    let val = $("#profile_pic").val();
    $(".custom-file-label").html(val.split("\\").pop());
  })





  // valitavion for form 
  jQuery.validator.addMethod("email_valid", function (value, element) {
    let op = new RegExp(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
    return op.test(value);
  }, "Enter valid email address");


  $(".login_form").validate({
    errorClass: "invalid-feedback",
    rules: {
      login_email: {
        required: true,
        email_valid: true

      },
      login_password: {
        required: true,
        minlength: 8,

      }
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent(""))
    },
    highlight: function (element) {
      $(element).removeClass("is-valid").addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    }

  })

  jQuery.validator.addMethod("noSpace", function (value, element) {
    return value == '' || value.trim().length >= 6;
  }, "No space please and don't leave it empty");

  jQuery.validator.addMethod("pass_valid", function (value, element) {
    let re = new RegExp(/^(?=.*\d)(?=.*[A-Za-z])[0-9a-zA-Z]{8,}$/g);
    return re.test(value);
  }, "Your password must be Minimum eight characters, at least one letter and one number");


  jQuery.validator.addMethod("file_valid", function (value, element) {

    let fil = value.split(".").pop().toLowerCase();
    if (fil == "jpg" || fil == "png" || fil == "jpeg" || value.trim() == "") {
      return true;
    } else {
      return false;
    }
  }, "only png,jpg and jpeg image formats are allowed");

  jQuery.validator.addMethod("file_size", function (value, element) {
    if (!value == "") {

      let image_size = element.files[0]['size'];

      if (image_size < 5242880) {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    }
  })




  $(".signup_form").validate({
    errorClass: "invalid-feedback",
    rules: {
      user_name: {
        required: true,
        minlength: 6,
        noSpace: true
      },

      signup_email: {
        required: true,
        email_valid: true
      },
      country: {
        s: true,
      },
      user_phone: {
        number: true,
        maxlength: 10,
        minlength: 10
      },
      signup_password: {
        required: true,
        pass_valid: true,
      },
      con_signup_password: {
        required: true,
        equalTo: "#signup_password"
      },
      agree: "required",
      profile_pic: {
        file_valid: true,
        file_size: true
      }

    },
    messages: {
      con_signup_password: {
        equalTo: "Your password is not matching"
      },
      agree: {
        required: "",
      },

    },
    highlight: function (element) {
      $(element).removeClass("is-valid").addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    }

  })
  $("#forgot_password").validate({
    errorClass: "invalid-feedback",
    rules: {
      email: {
        required: true,
        email_valid: true
      },

    },
    highlight: function (element) {
      $(element).removeClass("is-valid").addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    }


  })


  // //
  // (function () {
  //   window.addEventListener("load", function () {
  //     let form = document.getElementsByClassName("login_form");
  //     let validation = Array.prototype.filter.call(form, function (form) {
  //       form.addEventListener("submit", function (event) {
  //         if (!form.checkValidity()) {
  //           event.preventDefault();
  //           event.stopPropagation();
  //         }
  //         $(".login_form").addClass("was-validated");
  //       })

  //     }, false)
  //   }, false);
  // }())

  // (function () {
  //   window.addEventListener("load", function () {
  //     let form = document.getElementsByClassName("signup_form");
  //     let validation = Array.prototype.filter.call(form, function (form) {
  //       form.addEventListener("submit", function (event) {
  //         if (!form.checkValidity()) {
  //           event.preventDefault();
  //           event.stopPropagation();
  //         }
  //         $(".signup_form").addClass("was-validated");
  //       })

  //     }, false)
  //   }, false);
  // }())
})