
var loggedIn = true;


let editButtons = document.querySelectorAll(".edit-button-js");
let cancelButtons = document.querySelectorAll(".cancel-button-js");
let submitButtons = document.querySelectorAll(".submit-button-js");
let inputs = document.querySelectorAll(".profile-info-js");

for (let i = 0;i<editButtons.length;i++){
    editButtons.item(i).addEventListener("click",() => {
        inputs.item(i).readOnly = !inputs.item(i).readOnly;
        editButtons.item(i).style.display = "none";
        cancelButtons.item(i).style.display = "inline-block";
        submitButtons.item(i).style.display = "inline-block";
        if (i === 2){
            document.getElementById("label-password").textContent = "New Password";
            document.getElementById("verify-password-div").style.display = "block";
            document.getElementById("old-password-div").style.display = "block";
        }
    })
    cancelButtons.item(i).addEventListener("click", () => {
        inputs.item(i).readOnly = !inputs.item(i).readOnly;
        cancelButtons.item(i).style.display = "none";
        submitButtons.item(i).style.display = "none";
        editButtons.item(i).style.display = "inline-block";
        if (i === 2){
            document.getElementById("label-password").textContent = "Password";
            document.getElementById("verify-password-div").style.display = "none";
            document.getElementById("old-password-div").style.display = "none";
        }
    })
    submitButtons.item(i).addEventListener("click", () => {
        inputs.item(i).readOnly = !inputs.item(i).readOnly;
        cancelButtons.item(i).style.display = "none";
        submitButtons.item(i).style.display = "none";
        editButtons.item(i).style.display = "inline-block";
        if (i === 2){
            document.getElementById("label-password").textContent = "Password";
            document.getElementById("verify-password-div").style.display = "none";
            document.getElementById("old-password-div").style.display = "none";
        }
    })
}

/*editButtons.forEach(button => {
    button.addEventListener("click", () => {
        document.getElementById(button.name).readOnly = !document.getElementById(button.name).readOnly;
        button.style.display = "none";
        console.log(cancelButtons.indexOf(i))
        /*gg = document.getElementById(button.name).value
        console.log(gg)
    })
})

cancelButtons.forEach( button => {
    button.addEventListener("click", () => {
        button.style.display = "none"
    })
})*/





/*var loggedIn = true;
var buttonClicked = false;
var editBtn = document.getElementById("edit-button");

console.log(editBtn.name + editBtn.id)
if (loggedIn){
    editBtn.style.display = "block";
}else{
    editBtn.style.display = "none";
}

updateReadOnly()


editBtn.addEventListener("click", function() {
    if (buttonClicked){
        buttonClicked = false;
    }else{
        buttonClicked = true;
    }
    updateReadOnly();
});

function updateReadOnly(){
    if (loggedIn && buttonClicked){
        document.getElementById("email").readOnly = false;
        document.getElementById("password").readOnly = false;
        document.getElementById("verify-password-div").hidden = false;
        document.getElementById("fname").readOnly = false;
        document.getElementById("lname").readOnly = false;
        document.getElementById("date").readOnly = false;
        document.getElementById("country").readOnly = false;
        document.getElementById("phone-number").readOnly = false;
        document.getElementById("cv").readOnly = false;
        document.getElementById("submit").style.display = "block";
    }else{
        document.getElementById("email").readOnly = true;
        document.getElementById("password").readOnly = true;
        document.getElementById("verify-password-div").hidden = true;
        document.getElementById("fname").readOnly = true;
        document.getElementById("lname").readOnly = true;
        document.getElementById("date").readOnly = true;
        document.getElementById("country").readOnly = true;
        document.getElementById("phone-number").readOnly = true;
        document.getElementById("cv").readOnly = true;
        document.getElementById("submit").style.display = "none";
    }
}*/

