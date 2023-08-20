<!DOCTYPE html>
<html>
<head>
    <title>3-Step Form with jQuery Validation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="form-step" id="step1">
    <h2>Step 1</h2>
    <form id="form-step1">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <button id="nextStep1">Next</button>
    </form>
</div>

<div class="form-step" id="step2" style="display:none;">
    <h2>Step 2</h2>
    <form id="form-step2">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button id="prevStep2">Previous</button>
        <button id="nextStep2">Next</button>
    </form>
</div>

<div class="form-step" id="step3" style="display:none;">
    <h2>Step 3</h2>
    <form id="form-step3">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button id="prevStep3">Previous</button>
        <button id="submitForm">Submit</button>
    </form>
</div>

<script>
$(document).ready(function() {
    var currentStep = 1;
    
    function showStep(step) {
        $(".form-step").hide();
        $("#step" + step).show();
    }
    
    function validateStep(step) {
        if (step === 1) {
            // Validation for step 1 (Name)
            // You can add your custom validation logic here
            return $("#name").val() !== "";
        } else if (step === 2) {
            // Validation for step 2 (Email)
            // You can add your custom validation logic here
            return $("#email").val() !== "";
        } else if (step === 3) {
            // Validation for step 3 (Password)
            // You can add your custom validation logic here
            return $("#password").val() !== "";
        }
        return false;
    }
    
    function goToStep(step) {
        if (validateStep(currentStep)) {
            currentStep = step;
            showStep(currentStep);
        } else {
            alert("Please fill in all required fields.");
        }
    }
    
    $("#nextStep1").click(function(e) {
        e.preventDefault();
        goToStep(2);
    });
    
    $("#prevStep2").click(function(e) {
        e.preventDefault();
        goToStep(1);
    });
    
    $("#nextStep2").click(function(e) {
        e.preventDefault();
        goToStep(3);
    });
    
    $("#prevStep3").click(function(e) {
        e.preventDefault();
        goToStep(2);
    });
    
    $("#submitForm").click(function(e) {
        e.preventDefault();
        if (validateStep(currentStep)) {
            // Form is valid, you can submit it here
            alert("Form submitted successfully!");
        } else {
            alert("Please fill in all required fields.");
        }
    });
    
    showStep(currentStep);
});
</script>

</body>
</html>
