document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector("form");

    form.addEventListener("submit", function (event) {

        if (!validateForm()) {
            event.preventDefault(); 
        }
    });

    function validateForm() {
        var firstName = document.getElementById("first_name").value;
        var lastName = document.getElementById("last_name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var dob = document.getElementById("dob").value;
        var gender = document.querySelector("input[name='gender']:checked");
        var country = document.getElementById("country").value;
        var phone = document.getElementById("phone").value;
        var nid = document.getElementById("nid").value;
        var bloodType = document.getElementById("blood_type").value;

  
        if (!firstName || !lastName || !email || !password || !dob || !gender || !country || !phone || !nid || !bloodType) {
            alert("Please fill in all required fields.");
            return false;
        }

       
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email format.");
            return false;
        }


        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
            alert("Invalid phone number format.");
            return false;
        }

  

        return true; 
    }
});
