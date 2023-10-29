
document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputName").value;
    document.getElementById("copyname").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputContact").value;
    document.getElementById("copycontact").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputDate").value;
    document.getElementById("copyDate").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputTime").value;
    document.getElementById("copyTime").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputLocation").value;
    document.getElementById("copyLocation").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputLocation").value;
    document.getElementById("copyLocation2").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputBarangay").value;
    document.getElementById("copyBarangay").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputStreet").value;
    document.getElementById("copyStreet").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputQty").value;
    document.getElementById("copyQty").textContent = modalInputData;
});

document.getElementById("copyButton").addEventListener("click", function() {
    var modalInputData = document.getElementById("inputLocation").value;

    if(modalInputData === "Baao"){
        document.getElementById("copylocationFee").textContent = 35;
    }
    if(modalInputData === "Iriga"){
        document.getElementById("copylocationFee").textContent = 84;
    }
    if(modalInputData === "Nabua"){
        document.getElementById("copylocationFee").textContent = 84;
    }
    if(modalInputData === "Pili"){
        document.getElementById("copylocationFee").textContent = 158;
    }
    if(modalInputData === "Bula"){
        document.getElementById("copylocationFee").textContent = 105;
    }
    if(modalInputData === "Bato"){
        document.getElementById("copylocationFee").textContent = 116;
    }
    if(modalInputData === "Buhi"){
        document.getElementById("copylocationFee").textContent = 140;
    }
    if(modalInputData === "Balatan"){
        document.getElementById("copylocationFee").textContent = 140;
    }
    if(modalInputData === "Naga"){
        document.getElementById("copylocationFee").textContent = 331;
    }
    
});


//</script>Total na babayaran 

// const number1Element = document.getElementById('copyQty');
const totalPriceElement = document.getElementById('totalPrice');
const calculateButton = document.getElementById('copyButton');
const displayResultElement = document.getElementById('displayResult');
var modalInputData = document.getElementById("inputLocation");

calculateButton.addEventListener('click', function() {
    // Get the numerical value of total price
    const totalPrice = parseFloat(totalPriceElement.innerText.replace('₱', '')) || 0;

    // Get the selected location and set the corresponding fee
    var locationFee = 0;
    if (modalInputData.value === "Baao") {
        locationFee = 35;
    } else if (modalInputData.value === "Nabua") {
        locationFee = 84;
    } else if (modalInputData.value === "Pili") {
        locationFee = 158;
    } else if (modalInputData.value === "Iriga") {
        locationFee = 84;
    } else if (modalInputData.value === "Buhi") {
        locationFee = 140;
    } else if (modalInputData.value === "Bato") {
        locationFee = 80;
    } else if (modalInputData.value === "Bula") {
        locationFee = 100;
    } else if (modalInputData.value === "Naga") {
        locationFee = 331;
    }else if (modalInputData.value === "Balatan") {
        locationFee = 140;
    }

    // Update the copy location fee element
    document.getElementById("copylocationFee").textContent = locationFee;

    // Calculate the sum
    const sum = totalPrice + locationFee;

    // Display the result
    displayResultElement.textContent = '₱' + sum;
});




$(document).ready(function() {
    // Select all input fields by class
    var inputs = $('.input');
    var typeCheckbox = $('#terms_and_conditions');
    var submitButton = $('#copyButton');

    // Function to check if any input field is empty or checkbox is unchecked
    function checkInputs() {
        var emptyInputExists = false;

        inputs.each(function() {
            if ($(this).val() === '') {
                emptyInputExists = true;
                return false; // Exit loop early
            }
        });

        var isCheckboxChecked = typeCheckbox.prop('checked');
        
        submitButton.prop('disabled', emptyInputExists || !isCheckboxChecked);
    }

    // Monitor input fields and checkbox for changes
    inputs.on('input', checkInputs);
    typeCheckbox.on('change', checkInputs);

    // Check inputs on page load
    checkInputs();
});


function changeFreebies(newSource) {
    // console.log('Changing freebies to:', newSource);
    let img = document.querySelector('#bannerImage');
    img.setAttribute("src", newSource);
 }
 