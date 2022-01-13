function validateForm() {
    let x = document.forms["formlogin"]["username"].value;
    let y = document.forms["formlogin"]["password"].value;

    let invalidusername = document.getElementById("invalid1");
    let invalidpass = document.getElementById("invalid2");

    if (x == "") {
        
        invalidusername.innerHTML = "Username Tidak Boleh Kosong"
        return false;
    }

    if (y == "") {
        
        invalidpass.innerHTML = "password Tidak Boleh Kosong"
        return false;
      }
}