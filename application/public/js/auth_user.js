/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
       $("#formlog").validate({
           errorLabelContainer: "#errorMessage",
           wrapper: "li",
           rules: {
                  email: "required",
                  password: "required"
           },
           messages: {
                  email: "Si us plau entra el teu email.",
                  password: "Si us plau entra el password."
           },
           submitHandler: function(form) {
                 form.submit();
           }
       });
    });
