function addPhoneNumberField() {
    // Create a new input element
    var newInput = document.createElement("input");
    newInput.type = "text";
    newInput.className = "form-control col-sm-6 col-md-6 mg-t-2";
    newInput.style.display = "inline-block";
    newInput.required = true;
    newInput.placeholder = "Phone Number";
    newInput.name = "Phone Number";

    // Append the new input element to the container
    var container = document.querySelector(".input-container");
    container.appendChild(newInput);
}
